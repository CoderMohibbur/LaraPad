<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <x-success-message />

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">🏷️ All Tags</h2>
            <a href="{{ route('tags.create') }}"
               class="inline-flex px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                ＋ New Tag
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Slug</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y dark:divide-gray-700 text-sm">
                    @forelse ($tags as $tag)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $tag->name }}</td>
                            <td class="p-3 text-gray-500">{{ $tag->slug }}</td>
                            <td class="p-3">
                                <a href="{{ route('tags.edit', $tag) }}" class="text-yellow-500 hover:underline">Edit</a>
                                <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-4 text-center text-gray-500">No tags found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $tags->links() }}</div>
    </div>
</x-app-layout>
