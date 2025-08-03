<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">📝 Create New Post</h2>

        <x-success-message />

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published At -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Published At</label>
                    @php
                        $dt = old('published_at')
                            ? \Carbon\Carbon::parse(old('published_at'))->setTimezone('Asia/Dhaka')
                            : now()->setTimezone('Asia/Dhaka');
                    @endphp
                    <input type="datetime-local" name="published_at" value="{{ $dt->format('Y-m-d\\TH:i') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                    <select name="category_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
                    <select name="tags[]" multiple
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="md:flex md:items-start md:justify-between md:gap-6">
                <!-- Image Upload -->
                <div class="md:w-1/2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                    <input type="file" name="image"
                        class="mt-1 block w-full text-sm rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm cursor-pointer focus:ring focus:ring-blue-300">
                </div>

                <!-- Short Description -->
                <div class="md:w-1/2 mt-6 md:mt-0">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short Description</label>
                    <textarea name="short_description" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">{{ old('short_description') }}</textarea>
                </div>
            </div>

            <!-- Full Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="description" id="description" rows="6"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">{{ old('description') }}</textarea>
            </div>

            <!-- Meta Section -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Meta Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                </div>



                <!-- Meta Keywords -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">
                </div>


                <!-- Meta Description -->
                <div class="md:col-span-2 mt-6 md:mt-0">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                    <textarea name="meta_description" rows="2"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-blue-300">{{ old('meta_description') }}</textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md shadow-sm">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm">
                    Publish
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
