<x-guest-layout>
    <div class="max-w-5xl mx-auto px-4 py-12">
        <div class="mb-8 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 dark:text-white leading-tight">
                {{ $post->title }}
            </h1>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ $post->created_at->format('F j, Y') }} by <span class="font-medium text-blue-600 dark:text-blue-400">{{ $post->author->name ?? 'Admin' }}</span>
            </p>
        </div>

        @if($post->featured_image)
            <div class="mb-10">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="rounded-lg w-full max-h-[500px] object-cover shadow-md">
            </div>
        @endif

        <div class="prose lg:prose-lg dark:prose-invert max-w-none">
            {!! $post->content !!}
        </div>

        {{-- @if($post->tags->count())
            <div class="mt-10 flex flex-wrap gap-2">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tag.show', $tag->slug) }}"
                       class="px-3 py-1 text-sm bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-full hover:bg-blue-500 hover:text-white dark:hover:bg-blue-600 transition">
                        #{{ $tag->name }}
                    </a>
                @endforeach
            </div>
        @endif --}}

        <div class="mt-12 border-t pt-6">
            <a href="{{ route('blog.index') }}"
               class="inline-block text-blue-600 dark:text-blue-400 hover:underline">
                ← Back to Blog
            </a>
        </div>
    </div>
</x-guest-layout>
