<x-guest-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6">Category: {{ $category->name }}</h1>

        @if ($posts->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">{{ $post->short_description }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-300">No posts found in this category.</p>
        @endif
    </div>
</x-guest-layout>
