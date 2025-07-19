<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Add New Slider</h1>

        <form action="{{ route('admin.sliders.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            <!-- Author Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Author Name</label>
                <input type="text" name="author_name" value="{{ old('author_name') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Author Designation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Author Designation</label>
                <input type="text" name="author_designation" value="{{ old('author_designation') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rating (1-5)</label>
                <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Image URL</label>
                <input type="text" name="image" value="{{ old('image') }}" required
                    placeholder="uploads/2025/04/example.jpg"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <!-- Buttons -->
            <div class="md:col-span-2 flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.sliders.index') }}"
                   class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 shadow">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white shadow">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
