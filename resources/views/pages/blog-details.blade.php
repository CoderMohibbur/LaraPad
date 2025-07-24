<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto px-4">

            {{-- 🔥 Featured Image --}}
            @if ($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                     class="w-full h-[400px] object-cover rounded-lg shadow mb-8 transition hover:scale-[1.01]">
            @endif

            {{-- 📝 Title --}}
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight mb-4">
                {{ $post->title }}
            </h1>

            {{-- 📅 Meta Info --}}
            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                @if ($post->category)
                    <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-2 py-1 rounded text-xs">
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
                            <span class="text-sm px-3 py-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 🔗 Social Share --}}
            <div class="mt-10">
                <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Share this post:</h3>
                <div class="flex space-x-3">
                    @php
                        $url = urlencode(request()->fullUrl());
                        $title = urlencode($post->title);
                    @endphp
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank"
                       class="text-blue-600 hover:text-blue-800 text-xl"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?text={{ $title }}&url={{ $url }}" target="_blank"
                       class="text-sky-500 hover:text-sky-700 text-xl"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $url }}" target="_blank"
                       class="text-blue-700 hover:text-blue-900 text-xl"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            {{-- 🔁 Related Posts --}}
            @if (isset($relatedPosts) && $relatedPosts->count())
                <div class="mt-14">
                    <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">🧩 Related Posts</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($relatedPosts as $related)
                            <a href="{{ route('blog.show', $related->slug) }}"
                               class="bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
                                <h4 class="text-lg font-semibold text-gray-800 dark:text-white">
                                    {{ $related->title }}
                                </h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                    {{ Str::limit(strip_tags($related->short_description ?? $related->description), 100) }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 💬 Comments (Disqus or custom) --}}
            <div class="mt-14">
                <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">💬 Comments</h3>

                {{-- 👉 Disqus Embed --}}
                <div id="disqus_thread"></div>
                <script>
                    var disqus_config = function () {
                        this.page.url = "{{ request()->fullUrl() }}";
                        this.page.identifier = "post-{{ $post->id }}";
                    };
                    (function () {
                        var d = document, s = d.createElement('script');
                        s.src = 'https://YOUR_DISQUS_SHORTNAME.disqus.com/embed.js'; // ⛔ Replace with your shortname!
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the comments.</noscript>
            </div>

            {{-- 🔙 Back to Blog --}}
            <div class="mt-10">
                <a href="{{ route('blog.index') }}"
                   class="inline-block text-sm text-blue-600 hover:underline dark:text-blue-400">
                    ← Back to Blog
                </a>
            </div>

        </div>
    </section>
</x-guest-layout>
