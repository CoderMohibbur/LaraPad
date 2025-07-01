<x-app-layout>
    <div class="p-6 bg-white dark:bg-gray-900 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">📄 All Pages</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage and edit your site pages.</p>
            </div>
        </div>

        <table class="min-w-full table-auto border">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Slug</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $page['title'] }}</td>
                        <td class="px-4 py-2">{{ $page['slug'] }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.pages.edit', $page['slug']) }}"
                               class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded shadow">
                                ✏️ Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-6">No pages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
