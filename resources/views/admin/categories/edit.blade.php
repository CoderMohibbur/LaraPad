<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">✏️ Edit Category</h2>

        <x-success-message />

        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                       class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white border-gray-300">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('categories.index') }}"
                   class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-md">Cancel</a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
