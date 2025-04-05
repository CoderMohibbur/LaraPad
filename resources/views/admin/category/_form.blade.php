<div class="space-y-4">
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-800 dark:text-white" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-200">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-800 dark:text-white" required>
    </div>
</div>
