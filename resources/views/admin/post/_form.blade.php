<div class="grid grid-cols-1 gap-4">
    <div>
        <label class="font-medium">Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="input input-bordered w-full" required>
    </div>

    <div>
        <label class="font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="input input-bordered w-full">
    </div>

    <div>
        <label class="font-medium">Excerpt</label>
        <textarea name="excerpt" class="input input-bordered w-full">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div>
        <label class="font-medium">Content</label>
        <textarea id="content-editor" name="content" rows="10" class="input input-bordered w-full">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div>
        <label class="font-medium">Status</label>
        <select name="status" class="input input-bordered w-full">
            <option value="draft" @selected(old('status', $post->status ?? '') == 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? '') == 'published')>Published</option>
        </select>
    </div>

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

    </div>

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

    </div>

    <div>
        <label class="font-medium">Featured Image URL</label>
        <input type="text" name="featured_image" value="{{ old('featured_image', $post->featured_image ?? '') }}" class="input input-bordered w-full">
    </div>

    <div>
        <label class="font-medium">Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta['title'] ?? '') }}" class="input input-bordered w-full">
    </div>

    <div>
        <label class="font-medium">Meta Description</label>
        <textarea name="meta_description" class="input input-bordered w-full">{{ old('meta_description', $post->meta['description'] ?? '') }}</textarea>
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
