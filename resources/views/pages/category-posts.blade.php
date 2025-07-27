<x-guest-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6">Category: {{ $category->name }}</h1>

        @if ($posts->count())
            <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($posts as $index => $post)
                            <div class="relative bg-white dark:bg-gray-800 rounded shadow hover:shadow-md transition">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}"
                                        class="w-full object-cover rounded-t">
                                    @if ($post->category)
                                        <p
                                            class="absolute top-4 left-4 bg-[#2ba8e2] text-white px-4 py-1 text-sm font-semibold rounded">
                                            {{ $post->category->name }}
                                        </p>
                                    @endif
                                </a>
                                <div class="p-4">
                                    <div class="mb-1">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('blog.show', $tag->slug) }}"
                                                class="hover:underline text-[#2ba8e2] text-sm font-semibold mr-1">
                                                {{ $tag->name }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                    <h2 class="text-2xl font-bold hover:text-[#fca900] py-2">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <a href="#" class="hover:underline text-[#2ba8e2] font-semibold">
                                            {{ $post->author->name ?? 'Admin' }}
                                        </a>
                                        <span>। {{ $post->created_at->format('F d, Y') }}</span>
                                    </p>
                                    <div class="flex h-1 w-full mt-5">
                                        <div class="bg-sky-500 w-1/6"></div>
                                        <div class="bg-green-500 w-1/6"></div>
                                        <div class="bg-yellow-400 w-1/6"></div>
                                        <div class="bg-orange-400 w-1/6"></div>
                                        <div class="bg-red-600 w-1/6"></div>
                                        <div class="bg-purple-600 w-1/6"></div>
                                    </div>
                                </div>
                            </div>
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
