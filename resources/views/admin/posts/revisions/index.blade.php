<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
            📜 Revision History for: {{ $post->title }}
        </h2>

        <x-success-message />

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Revision ID</th>
                        <th class="px-4 py-2 text-left">Edited By</th>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Updated At</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($revisions as $revision)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 text-gray-800 dark:text-white">#{{ $revision->id }}</td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $revision->editor->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-gray-900 dark:text-white">
                                {{ Str::limit($revision->title, 50) }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">{{ $revision->updated_at->format('M d, Y H:i') }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.revisions.show', [$post, $revision]) }}"
                                       class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded shadow">
                                        👁️ View
                                    </a>
                                    <form method="POST" action="{{ route('posts.revisions.restore', [$post, $revision]) }}"
                                          onsubmit="return confirm('Restore this revision?');">
                                        @csrf
                                        <button type="submit"
                                                class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded shadow">
                                            ♻️ Restore
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">No revisions found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $revisions->links() }}
        </div>
    </div>
</x-app-layout>
