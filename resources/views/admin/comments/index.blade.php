<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">💬 All Comments</h2>
            <a href="{{ route('comments.index', ['filter' => 'pending']) }}"
               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded shadow">
                ⏳ View Pending
            </a>
        </div>

        <x-success-message />

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Post</th>
                        <th class="px-4 py-2 text-left">User</th>
                        <th class="px-4 py-2 text-left">Comment</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($comments as $comment)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-2 text-blue-600 dark:text-blue-300">
                                {{ Str::limit($comment->post->title, 40) }}
                            </td>
                            <td class="px-4 py-2 text-gray-700 dark:text-gray-300">
                                {{ $comment->user->name ?? 'Guest' }}
                            </td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-100">
                                {{ Str::limit($comment->comment, 60) }}
                            </td>
                            <td class="px-4 py-2">
                                @if ($comment->approved)
                                    <span class="text-green-600 font-semibold">✅ Approved</span>
                                @else
                                    <span class="text-yellow-500 font-semibold">⏳ Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    @if (! $comment->approved)
                                        <form action="{{ route('comments.approve', $comment) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded shadow">
                                                ✅ Approve
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                          onsubmit="return confirm('Delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded shadow">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center px-4 py-4 text-gray-500 dark:text-gray-400">No comments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $comments->links() }}
        </div>
    </div>
</x-app-layout>
