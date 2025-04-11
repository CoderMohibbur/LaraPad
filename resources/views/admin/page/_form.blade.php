<div class="space-y-6">
    {{-- 🔤 Title --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Title <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-800 dark:text-white @error('title') border-red-500 @enderror" required>
        @error('title')
            <p class="text-sm text-red-500 mt-1">❗ {{ $message }}</p>
        @enderror
    </div>

    {{-- 🔗 Slug --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Slug <span class="text-red-500">*</span></label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-800 dark:text-white @error('slug') border-red-500 @enderror" required>
        @error('slug')
            <p class="text-sm text-red-500 mt-1">❗ {{ $message }}</p>
        @enderror
    </div>

    {{-- ✏️ Excerpt --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Excerpt</label>
        <textarea name="excerpt" class="input input-bordered w-full dark:bg-gray-800 dark:text-white">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    {{-- 📝 Content (TinyMCE) --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Content</label>
        <textarea id="content-editor" name="content" rows="10"
                  class="input input-bordered w-full dark:bg-gray-800 dark:text-white">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    {{-- 📤 Featured Image --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Featured Image URL</label>
        <input type="text" name="featured_image" value="{{ old('featured_image', $post->featured_image ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
    </div>

    {{-- 📌 Status --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Status <span class="text-red-500">*</span></label>
        <select name="status" class="input input-bordered w-full dark:bg-gray-800 dark:text-white @error('status') border-red-500 @enderror" required>
            <option value="">-- Select --</option>
            <option value="draft" @selected(old('status', $post->status ?? '') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Published</option>
        </select>
        @error('status')
            <p class="text-sm text-red-500 mt-1">❗ {{ $message }}</p>
        @enderror
    </div>

    {{-- 🧱 Post Type --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Post Type</label>
        <select name="post_type" class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
            <option value="post" @selected(old('post_type', $post->post_type ?? '') === 'post')>Post</option>
            <option value="page" @selected(old('post_type', $post->post_type ?? '') === 'page')>Page</option>
            <option value="custom" @selected(old('post_type', $post->post_type ?? '') === 'custom')>Custom</option>
        </select>
    </div>

    {{-- 🏷️ Categories --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Categories</label>
        <select name="categories[]" multiple class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @if(isset($post) && $post->categories->contains($cat->id)) selected @endif>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- 🏷️ Tags --}}
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Tags</label>
        <select name="categories[]" multiple class="input input-bordered w-full">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    @if(isset($post) && $post->categories->contains($cat->id)) selected @endif>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

    </div>

    {{-- 🌐 SEO --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-200 dark:border-gray-700">
        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta['title'] ?? '') }}"
                   class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">Meta Description</label>
            <textarea name="meta_description" class="input input-bordered w-full dark:bg-gray-800 dark:text-white">{{ old('meta_description', $post->meta['description'] ?? '') }}</textarea>
        </div>

        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords ?? '') }}"
                   class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">Canonical URL</label>
            <input type="text" name="canonical_url" value="{{ old('canonical_url', $post->canonical_url ?? '') }}"
                   class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">OG Title</label>
            <input type="text" name="og_title" value="{{ old('og_title', $post->og_title ?? '') }}"
                   class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
        </div>

        <div>
            <label class="font-medium text-gray-700 dark:text-gray-200">OG Description</label>
            <textarea name="og_description" class="input input-bordered w-full dark:bg-gray-800 dark:text-white">{{ old('og_description', $post->og_description ?? '') }}</textarea>
        </div>

        <div class="md:col-span-2">
            <label class="font-medium text-gray-700 dark:text-gray-200">OG Image URL</label>
            <input type="text" name="og_image" value="{{ old('og_image', $post->og_image ?? '') }}"
                   class="input input-bordered w-full dark:bg-gray-800 dark:text-white">
        </div>
    </div>
</div>

{{-- ✅ TinyMCE --}}
@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content-editor',
        height: 400,
        plugins: 'link image code lists table',
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
        content_css: document.documentElement.classList.contains('dark') ? 'dark' : 'default'
    });
</script>
@endpush
