<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class ImageService
{
    protected $image;

    public function __construct()
    {
        // Use GD or imagick as available
        $this->image = new ImageManager(Driver::class); // ✅ Just pass the driver as string
    }

    public function handleUpload($file, $userId = null)
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getMimeType();
        $size = $file->getSize();

        $now = Carbon::now();
        $folder = $now->format('Y/m');
        $uploadPath = public_path("uploads/{$folder}");
        $sizesPath = $uploadPath . '/sizes';

        File::makeDirectory($uploadPath, 0755, true, true);
        File::makeDirectory($sizesPath, 0755, true, true);

        $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $extension;
        $file->move($uploadPath, $filename);

        $metaData = [];
        if (Str::startsWith($mimeType, 'image/')) {
            $metaData = $this->generateSizes($uploadPath, $sizesPath, $filename);

            $webpAvif = $this->convertToWebpAndAvif("uploads/{$folder}/{$filename}");
            $metaData = array_merge($metaData, $webpAvif);
        }

        return Media::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'mime_type' => $mimeType,
            'size' => $size,
            'folder' => $folder,
            'uploaded_by' => $userId ?? auth()->id(),
            'meta_data' => $metaData,
        ]);
    }

    protected function generateSizes($uploadPath, $sizesPath, $filename)
    {
        $sizes = [
            'thumbnail'      => [150, 150],
            'small'          => [320, null],
            'medium'         => [480, 360], // ✅ force 4:3 ratio (480x360)
            'large'          => [1024, null],
            'retina-medium'  => [960, null],
            'square'         => [600, 600],
            'avatar'         => [100, 100],
            'tiny-blur'      => [20, 20],
            'banner-strip'   => [1600, 400],
        ];
    
        $meta = [];
    
        foreach ($sizes as $key => [$width, $height]) {
            $img = $this->image->read("{$uploadPath}/{$filename}");
    
            if ($key === 'square') {
                // 🔲 Crop to square
                $img->cover(width: $width, height: $height);
            } elseif ($key === 'medium') {
                // 📐 Force 4:3 crop (480x360)
                $img->cover(width: $width, height: $height);
            } else {
                // 🪄 Just resize proportionally
                $img->resize(width: $width, height: $height);
            }
    
            $newName = "{$key}-{$filename}";
    
            $img->toJpeg(85)->save("{$sizesPath}/{$newName}");
    
            $meta[$key] = "uploads/{$this->getFolderPath()}/sizes/{$newName}";
        }
    
        return $meta;
    }
    

    
    


    public function replaceImage(Media $media, $newImage)
    {
        @unlink(public_path("uploads/{$media->folder}/{$media->filename}"));

        if (is_array($media->meta_data)) {
            foreach ($media->meta_data as $path) {
                @unlink(public_path($path));
            }
        }

        $media->filename = Str::slug(pathinfo($newImage->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . uniqid() . '.' . $newImage->getClientOriginalExtension();
        $media->original_name = $newImage->getClientOriginalName();
        $media->mime_type = $newImage->getMimeType();
        $media->size = $newImage->getSize();

        $folder = $media->folder;
        $uploadPath = public_path("uploads/{$folder}");
        $sizesPath = "{$uploadPath}/sizes";

        File::makeDirectory($uploadPath, 0755, true, true);
        File::makeDirectory($sizesPath, 0755, true, true);

        $newImage->move($uploadPath, $media->filename);

        $media->meta_data = $this->generateSizes($uploadPath, $sizesPath, $media->filename);
        $media->save();
    }


    public function applyTransformations(Media $media, array $transform)
    {
        $path = public_path("uploads/{$media->folder}/{$media->filename}");
    
        $img = $this->image->read($path);
    
        // ✅ Rotate
        if (!empty($transform['rotate'])) {
            $img->rotate((int) $transform['rotate']);
        }
    
        // ✅ Resize
        if (!empty($transform['resize_width']) && !empty($transform['resize_height'])) {
            $img->resize((int)$transform['resize_width'], (int)$transform['resize_height']);
        }
    
        // ✅ Crop
        if (!empty($transform['crop'])) {
            $cropRatio = $transform['crop'];
            [$w, $h] = match ($cropRatio) {
                '1:1' => [600, 600],
                '4:3' => [800, 600],
                '16:9' => [1280, 720],
                default => [null, null],
            };
    
            if ($w && $h) {
                $img->cover($w, $h);
            }
        }
    
        // ✅ Save Over Original
        $img->toJpeg(85)->save($path);
    
        // ✅ Regenerate Sizes
        $uploadPath = public_path("uploads/{$media->folder}");
        $sizesPath = $uploadPath . '/sizes';
        $metaData = $this->generateSizes($uploadPath, $sizesPath, $media->filename);
    
        $media->meta_data = $metaData;
        $media->save();
    }
    

    public function convertToWebpAndAvif($path)
    {
        $image = $this->image->read(public_path($path));

        $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $path);
        $avifPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.avif', $path);

        $image->toWebp(85)->save(public_path($webpPath));
        $image->toAvif(85)->save(public_path($avifPath));

        return [
            'webp' => "uploads/{$this->getFolderPath()}/" . basename($webpPath),
            'avif' => "uploads/{$this->getFolderPath()}/" . basename($avifPath),
        ];
    }

    protected function getFolderPath()
    {
        return now()->format('Y/m');
    }
}
