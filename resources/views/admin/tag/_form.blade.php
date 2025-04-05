<div class="space-y-4">
    <div>
        <label class="font-medium">Tag Name</label>
        <input type="text" name="name" value="{{ old('name', $tag->name ?? '') }}" class="input input-bordered w-full" required>
    </div>
    <div>
        <label class="font-medium">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $tag->slug ?? '') }}" class="input input-bordered w-full" required>
    </div>
</div>
