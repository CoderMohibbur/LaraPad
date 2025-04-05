<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto space-y-4">
        <h2 class="text-3xl font-bold">{{ $post->title }}</h2>

        <div class="text-sm text-gray-500 mb-4">
            Status: <span class="font-medium">{{ ucfirst($post->status) }}</span> |
            Published by: {{ $post->author->name ?? 'Unknown' }} |
            Categories:
            @foreach($post->categories as $cat)
                <span class="text-blue-600">{{ $cat->name }}</span>
            @endforeach
        </div>

        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="rounded shadow w-full max-h-96 object-cover">
        @endif

        <div class="prose max-w-full dark:prose-invert">
            {!! $post->content !!}
        </div>

        @if($post->tags->count())
            <div class="mt-6">
                <h4 class="font-semibold">Tags:</h4>
                @foreach($post->tags as $tag)
                    <span class="inline-block bg-gray-200 dark:bg-gray-700 text-sm px-2 py-1 rounded mr-2">
                        #{{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @endif

        @if($post->meta)
            <div class="mt-6 text-gray-500 text-sm">
                <strong>Meta Title:</strong> {{ $post->meta['title'] ?? '-' }}<br>
                <strong>Meta Description:</strong> {{ $post->meta['description'] ?? '-' }}
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary ml-2">← Back to Posts</a>
        </div>
    </div>
</x-app-layout>
