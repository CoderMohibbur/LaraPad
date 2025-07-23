<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">✏️ Edit Tag</h2>

        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf @method('PUT')

            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Tag Name</label>
            <input type="text" name="name" required value="{{ old('name', $tag->name) }}"
                   class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white mb-4" />

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                Update Tag
            </button>
        </form>
    </div>
</x-app-layout>
