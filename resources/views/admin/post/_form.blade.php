<div class="grid grid-cols-1 gap-4">
    {{-- 🔸 Title --}}
    <div>
        <label class="font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="input input-bordered w-full" required>
        @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Slug --}}
    <div>
        <label class="font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="input input-bordered w-full">
        @error('slug')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Excerpt --}}
    <div>
        <label class="font-medium">Excerpt</label>
        <textarea name="excerpt" class="input input-bordered w-full">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        @error('excerpt')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Content --}}
    <div>
        <label class="font-medium">Content</label>
        <textarea id="content-editor" name="content" rows="10" class="input input-bordered w-full">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Status --}}
    <div>
        <label class="font-medium">Status</label>
        <select name="status" class="input input-bordered w-full">
            <option value="draft" @selected(old('status', $post->status ?? '') == 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? '') == 'published')>Published</option>
        </select>
        @error('status')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Categories --}}
    <div>
        <label class="font-medium">Categories</label>
        <select name="categories[]" multiple class="input input-bordered w-full">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @if(isset($post) && $post->categories->contains($cat->id)) selected @endif>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('categories')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Tags --}}
    <div>
        <label class="font-medium">Tags</label>
        <select name="tags[]" multiple class="input input-bordered w-full">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                    @if(isset($post) && $post->tags->contains($tag->id)) selected @endif>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        @error('tags')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Featured Image --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-white">Featured Image</label>
        <div class="flex items-center gap-4">
            <input type="file" id="featured_image" name="featured_image"
                   class="input input-bordered w-full dark:bg-gray-900 dark:text-white"
                   value="{{ old('featured_image', $post->featured_image ?? '') }}">
            <button type="button" onclick="openMediaImageModal()"
                    class="px-3 py-2 bg-blue-600 text-white rounded">Choose</button>
        </div>
        <div id="image-preview" class="mt-2">
            @if(!empty($post->featured_image))
                <img src="{{ $post->image_url }}" class="h-24 rounded border shadow">
            @endif
        </div>
        @error('featured_image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Meta Title --}}
    <div>
        <label class="font-medium">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta['title'] ?? '') }}" class="input input-bordered w-full">
        @error('meta_title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- 🔸 Meta Description --}}
    <div>
        <label class="font-medium">Meta Description</label>
        <textarea name="meta_description" class="input input-bordered w-full">{{ old('meta_description', $post->meta['description'] ?? '') }}</textarea>
        @error('meta_description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

{{-- TinyMCE Initialization --}}
@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content-editor',
        height: 400,
        plugins: 'link image code lists table',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        content_css: document.documentElement.classList.contains('dark') ? 'dark' : 'default'
    });
</script>
@endpush
