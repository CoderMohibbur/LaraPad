<x-guest-layout>
    {{-- (Optional) AOS for soft reveal — remove if globally loaded --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) AOS.init({ duration: 850, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
        });
    </script>

    <style>
        /* ---- Micro-polish: dark-friendly, fast animations (no backend change) ---- */
        @keyframes aura {0%,100%{opacity:.28;filter:blur(46px)}50%{opacity:.55;filter:blur(70px)}}
        @keyframes floatY {0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
        .tilt{transform:perspective(1000px) rotateX(0) rotateY(0) translateZ(0);transition:transform .35s, box-shadow .35s}
        .tilt:hover{transform:perspective(1000px) rotateX(2deg) rotateY(-3deg) translateZ(8px)}
        .text-grad{color:transparent;background-clip:text;-webkit-background-clip:text;background-image:linear-gradient(90deg,#06b6d4,#6366f1)}
        .glass{backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);background:linear-gradient(160deg,rgba(255,255,255,.75),rgba(255,255,255,.55))}
        .dark .glass{background:linear-gradient(160deg,rgba(10,15,25,.7),rgba(10,15,25,.5));border-color:rgba(148,163,184,.25)}
        .ring-focus:focus{outline:none;box-shadow:0 0 0 3px rgba(14,165,233,.35)}
        .prose-custom :where(h2,h3){scroll-margin-top:90px}
        .prose-custom a{color:#0284c7}
        .prose-custom a:hover{text-decoration:underline}
        .badge-soft{background:linear-gradient(90deg,rgba(14,165,233,.12),rgba(99,102,241,.12));border:1px solid rgba(148,163,184,.25)}
        .dark .badge-soft{background:linear-gradient(90deg,rgba(14,165,233,.15),rgba(99,102,241,.12));border-color:rgba(148,163,184,.25)}
        .divider-grad{height:1px;background:linear-gradient(90deg,transparent,#22d3ee33,#6366f133,transparent)}
        .shadow-smooth{box-shadow:0 10px 35px -12px rgba(2,6,23,.18)}
        .shadow-smooth-lg{box-shadow:0 18px 50px -14px rgba(2,6,23,.30)}
    </style>

    <section class="relative bg-white dark:bg-gray-950 py-12">
        <!-- ambient aura (visual only) -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-cyan-300/18 blur-3xl animate-[aura_8s_ease-in-out_infinite]"></div>
            <div class="absolute -bottom-28 -right-32 w-[30rem] h-[30rem] rounded-full bg-fuchsia-300/14 blur-3xl animate-[aura_9s_ease-in-out_infinite]"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row gap-10">
            <!-- 📝 Main Post Section -->
            <div class="w-full lg:w-2/3">
                {{-- 🔥 Featured Image (unchanged binding) --}}
                @if ($post->image_url)
                    <div class="rounded-xl overflow-hidden shadow-smooth tilt mb-8" data-aos="fade-up">
                        <img
                            src="{{ asset('storage/' . $post->image_url) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-[420px] md:h-[460px] object-cover">
                    </div>
                @endif

                {{-- 📝 Title --}}
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-3 text-gray-900 dark:text-white" data-aos="fade-up">
                    <span class="text-grad">{{ $post->title }}</span>
                </h1>

                <div class="divider-grad mb-5"></div>

                {{-- 📅 Meta Info --}}
                <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600 dark:text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="50">
                    @if ($post->category)
                        <span class="badge-soft text-blue-700 dark:text-blue-300 px-2.5 py-1 rounded-full text-[12px] font-semibold">
                            {{ $post->category->name }}
                        </span>
                    @endif
                    <span class="px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-800/70 text-gray-700 dark:text-gray-300">✍️ {{ $post->author->name ?? 'Admin' }}</span>
                    <span class="px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-800/70 text-gray-700 dark:text-gray-300">📅 {{ $post->published_at->format('F j, Y') }}</span>
                </div>

                {{-- 📄 Content --}}
                @if ($post->short_description)
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 leading-relaxed" data-aos="fade-up" data-aos-delay="70">
                        {{ $post->short_description }}
                    </p>
                @endif

                <div class="prose prose-custom prose-lg max-w-none dark:prose-invert" data-aos="fade-up" data-aos-delay="90">
                    {!! $post->description !!}
                </div>

                {{-- 🔗 Tags --}}
                @if ($post->tags->count())
                    <div class="mt-10" data-aos="fade-up" data-aos-delay="110">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Tags:</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($post->tags as $tag)
                                <span class="text-sm px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800/70 text-gray-800 dark:text-gray-100 border border-gray-200/50 dark:border-gray-700/60">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- subtle divider -->
                <div class="divider-grad my-10"></div>

                {{-- 💬 Comments (Form + List) --}}
                <div class="mt-8" data-aos="fade-up" data-aos-delay="130">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Leave a Comment</h3>

                    @if (session('success'))
                        <div class="mb-4 text-emerald-500 font-semibold">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Comment</label>
                            <textarea
                                name="comment"
                                rows="4"
                                required
                                class="mt-1 block w-full p-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm text-sm text-gray-900 dark:text-white focus:ring-sky-500 focus:border-sky-500"
                            ></textarea>
                            @error('comment')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-sky-500 to-indigo-600 hover:opacity-95 text-white rounded-lg shadow-smooth text-sm">
                                Submit Comment
                            </button>
                        </div>
                    </form>

                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-10 mb-4">
                        💬 Comments ({{ $comments->count() }})
                    </h3>

                    @forelse ($comments as $comment)
                        <div class="mb-4 p-4 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-200/70 dark:border-gray-800 shadow-smooth" data-aos="fade-up" data-aos-delay="60">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $comment->user->name ?? 'Guest' }}
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $comment->created_at->format('d M Y, h:i A') }}
                                </span>
                            </div>
                            <p class="text-gray-800 dark:text-gray-100 text-sm leading-relaxed">
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
                {{-- 🔁 Related Posts (unchanged binding) --}}
                @if (isset($relatedPosts) && $relatedPosts->count())
                    <div class="mb-10" data-aos="fade-left">
                        <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">🧩 Related Posts</h3>
                        <div class="space-y-5">
                            @foreach ($relatedPosts as $related)
                                <a href="{{ route('blog.show', $related->slug) }}"
                                   class="flex gap-4 rounded-xl bg-white/70 dark:bg-gray-900/70 border border-gray-200/70 dark:border-gray-800 p-4 shadow-smooth hover:shadow-smooth-lg transition">
                                    <div class="w-20 h-20 shrink-0 rounded overflow-hidden">
                                        <img src="{{ asset('storage/' . $related->image_url) }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-[15px] font-semibold text-gray-900 dark:text-white leading-snug">
                                            {{ $related->title }}
                                        </h4>
                                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1 line-clamp-2">
                                            {{ Str::limit(strip_tags($related->short_description ?? $related->description), 80) }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- 📌 Topics (unchanged binding) --}}
                @if ($topics->count())
                    <div class="glass border border-gray-200/70 dark:border-gray-700/60 rounded-2xl p-5" data-aos="fade-left" data-aos-delay="60">
                        <h3 class="text-md font-bold text-gray-900 dark:text-white mb-3">📚 Topics</h3>
                        <ul class="space-y-2">
                            @foreach ($topics as $topic)
                                <li>
                                    <a href="{{ route('category.show', $topic->slug) }}"
                                       class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-orange-500">
                                        <span class="w-2.5 h-2.5 mr-3 rounded-full bg-gradient-to-r from-sky-500 to-indigo-600 animate-[floatY_6s_ease-in-out_infinite]"></span>
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
