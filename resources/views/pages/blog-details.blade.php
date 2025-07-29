<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row gap-10">

            <!-- 📝 Main Post Section -->
            <div class="w-full lg:w-2/3">
                {{-- 🔥 Featured Image --}}
                @if ($post->image_url)
                    <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}"
                        class="w-full h-[400px] object-cover rounded-lg shadow mb-8 transition hover:scale-[1.01]">
                @endif

                {{-- 📝 Title --}}
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight mb-4">
                    {{ $post->title }}
                </h1>

                {{-- 📅 Meta Info --}}
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                    @if ($post->category)
                        <span
                            class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded text-xs">
                            {{ $post->category->name }}
                        </span>
                    @endif
                    <span>✍️ {{ $post->author->name ?? 'Admin' }}</span>
                    <span>📅 {{ $post->published_at->format('F j, Y') }}</span>
                </div>

                {{-- 📄 Content --}}
                @if ($post->short_description)
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        {{ $post->short_description }}
                    </p>
                @endif

                <div class="prose dark:prose-invert max-w-none prose-lg">
                    {!! $post->description !!}
                </div>

                {{-- 🔗 Tags --}}
                @if ($post->tags->count())
                    <div class="mt-8">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tags:</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <span
                                    class="text-sm px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-full">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif


                {{-- 💬 Comments (Disqus or custom) --}}
                <!-- 💬 Comment Form -->
                <div class="mt-10">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Leave a Comment</h3>

                    @if (session('success'))
                        <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <div>
                            <label for="comment"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Comment</label>
                            <textarea name="comment" rows="4" required
                                class="mt-1 block w-full p-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm text-sm text-gray-900 dark:text-white focus:ring-blue-500 focus:border-blue-500"></textarea>
                            @error('comment')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow text-sm">
                                Submit Comment
                            </button>
                        </div>
                    </form>

                    <!-- Comments Section -->
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mt-10 mb-4">
                        💬 Comments ({{ $comments->count() }})
                    </h3>
                    @forelse ($comments as $comment)
                        <div class="mb-4 p-4 rounded-md bg-gray-100 dark:bg-gray-800">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    {{ $comment->user->name ?? 'Guest' }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $comment->created_at->format('d M Y, h:i A') }}
                                </span>
                            </div>
                            <p class="text-gray-800 dark:text-gray-100 text-sm">
                                {{ $comment->comment }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400">No comments yet.</p>
                    @endforelse

                </div>

            </div>

            <!-- 📚 Sidebar -->
            <div class="w-full lg:w-1/3">
                {{-- 🔁 Related Posts --}}
                @if (isset($relatedPosts) && $relatedPosts->count())
                    <div class="mb-10">
                        <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">🧩 Related Posts</h3>
                        <div class="space-y-6">
                            @foreach ($relatedPosts as $related)
                                <a href="{{ route('blog.show', $related->slug) }}"
                                    class="flex gap-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
                                    <div class="w-20 h-20 shrink-0 rounded overflow-hidden">
                                        <img src="{{ asset('storage/' . $related->image_url) }}"
                                            alt="{{ $related->title }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-md font-semibold text-gray-800 dark:text-white">
                                            {{ $related->title }}
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                                            {{ Str::limit(strip_tags($related->short_description ?? $related->description), 80) }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- 📌 Topics (optional reuse) --}}
                @if ($topics->count())
                    <div>
                        <h3 class="text-md font-bold text-gray-900 dark:text-white mb-3">📚 Topics</h3>
                        <ul class="space-y-2">
                            @foreach ($topics as $topic)
                                <li>
                                    <a href="{{ route('category.show', $topic->slug) }}"
                                        class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-blue-500">
                                        <div class="w-2.5 h-2.5 mr-3 rounded-full bg-blue-500"></div>
                                        {{ $topic->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-guest-layout>
