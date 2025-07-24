<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
            👁️ Viewing Revision #{{ $revision->id }} of: {{ $post->title }}
        </h2>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-4">

            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Title:</p>
                <p class="text-gray-900 dark:text-white">{{ $revision->title }}</p>
            </div>

            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Short Description:</p>
                <p class="text-gray-800 dark:text-gray-200">{{ $revision->short_description }}</p>
            </div>

            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Full Description:</p>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($revision->description)) !!}
                </div>
            </div>

            <div>
                <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Meta Info:</p>
                <ul class="text-gray-700 dark:text-gray-200 text-sm list-disc pl-5">
                    <li><strong>Meta Title:</strong> {{ $revision->meta['meta_title'] ?? '—' }}</li>
                    <li><strong>Meta Description:</strong> {{ $revision->meta['meta_description'] ?? '—' }}</li>
                    <li><strong>Meta Keywords:</strong> {{ $revision->meta['meta_keywords'] ?? '—' }}</li>
                </ul>
            </div>

            <form method="POST" action="{{ route('posts.revisions.restore', [$post, $revision]) }}"
                  onsubmit="return confirm('Are you sure you want to restore this revision?');">
                @csrf
                <button type="submit"
                        class="mt-4 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-md">
                    ♻️ Restore This Version
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
