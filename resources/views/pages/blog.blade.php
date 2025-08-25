<x-guest-layout>
    {{-- If AOS is global in layout, remove the next 3 lines --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) AOS.init({ duration: 900, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
        });
    </script>

    <style>
        /* --- polish & micro-interactions (no backend change) --- */
        @keyframes pulseGlow{0%,100%{opacity:.28;filter:blur(42px)}50%{opacity:.55;filter:blur(64px)}}
        .tilt{transform:perspective(900px) rotateX(0) rotateY(0) translateZ(0);transition:transform .35s,box-shadow .35s,opacity .2s}
        .tilt:hover{transform:perspective(900px) rotateX(2deg) rotateY(-3deg) translateZ(10px)}
        .text-gradient{color:transparent;background-clip:text;-webkit-background-clip:text;background-image:linear-gradient(90deg,#06b6d4,#6366f1)}
        .chip{display:inline-flex;align-items:center;gap:.35rem;padding:.3rem .6rem;border-radius:999px;font-weight:600;font-size:.72rem;border:1px solid rgba(2,6,23,.08);background:rgba(2,6,23,.035)}
        .dark .chip{border-color:rgba(148,163,184,.18);background:rgba(148,163,184,.12)}
        .chip-dot{width:.35rem;height:.35rem;border-radius:999px;background:#06b6d4}
        .taglink:hover .chip-dot{background:#f59e0b}
        .glass{backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);background:linear-gradient(160deg,rgba(255,255,255,.76),rgba(255,255,255,.55))}
        .dark .glass{background:linear-gradient(160deg,rgba(14,22,37,.7),rgba(14,22,37,.45));border-color:rgba(148,163,184,.25)}
        .line-clamp-2{display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
        .line-clamp-3{display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
        /* pretty scrollbar for post list only */
        .scrolly::-webkit-scrollbar{width:8px}
        .scrolly::-webkit-scrollbar-thumb{background:linear-gradient(#94a3b8,#64748b);border-radius:999px}
        .dark .scrolly::-webkit-scrollbar-thumb{background:linear-gradient(#334155,#475569)}
        /* image aspect for stability */
        .aspect-16x10{position:relative;padding-bottom:62.5%}
        .aspect-16x10>img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
        /* soft border ring on focus */
        .ring-focus:focus{outline:none;box-shadow:0 0 0 3px rgba(14,165,233,.35)}
    </style>

    <!-- ==================== Blog Banner ==================== -->
    <section class="relative border-b dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
        <!-- ambient aura -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-cyan-300/20 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
            <div class="absolute -bottom-28 -right-32 w-[28rem] h-[28rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]"></div>
        </div>

        <div class="py-16 max-w-screen-xl mx-auto px-3 text-center lg:text-left">
            <h1 class="font-extrabold text-5xl lg:text-7xl">
                <span class="text-gradient">Blog</span>
            </h1>
            <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 pt-6 max-w-4xl" data-aos="fade-up" data-aos-delay="60">
                Level up your <strong>lead generation</strong> and <strong>cold email marketing</strong>. Practical playbooks on ICP, copy, deliverability,
                and analytics—everything you need to scale Search Engine Marketing with confidence.
            </p>
        </div>
    </section>

    <!-- ==================== Blog Section ==================== -->
    <section class="border-b dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">
        <div class="max-w-screen-xl mx-auto px-3">
            <div class="flex flex-col lg:flex-row gap-8 my-10">

                <!-- Left: Posts (BACKEND LOOPS/ROUTES UNCHANGED) -->
                <div class="w-full lg:w-2/3 h-dvh overflow-y-auto scrolly">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach ($posts as $index => $post)
                            <div class="relative rounded-2xl border border-gray-200/70 dark:border-gray-700/60 bg-white dark:bg-gray-800 shadow-sm hover:shadow-2xl transition tilt" data-aos="fade-up" data-aos-delay="{{ 40 * ($index % 6) }}">
                                <a href="{{ route('blog.show', $post->slug) }}" class="block ring-focus">
                                    <div class="aspect-16x10 rounded-t-2xl overflow-hidden">
                                        <img
                                            src="{{ asset('storage/' . $post->image_url) }}"
                                            alt="{{ $post->title }}"
                                            loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-black/0 to-transparent opacity-0 hover:opacity-100 transition"></div>
                                    </div>

                                    @if ($post->category)
                                        <p class="absolute top-4 left-4 px-3 py-1 text-[11px] tracking-wide font-semibold rounded-full bg-gradient-to-r from-sky-500 to-indigo-600 text-white shadow">
                                            {{ $post->category->name }}
                                        </p>
                                    @endif
                                </a>

                                <div class="p-5">
                                    <!-- tags (routes unchanged) -->
                                    <div class="mb-3 -mx-1 flex flex-wrap items-center gap-2">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('blog.show', $tag->slug) }}" class="taglink">
                                                <span class="chip">
                                                    <span class="chip-dot"></span>{{ $tag->name }}
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>

                                    <h2 class="text-[1.35rem] leading-tight font-bold text-gray-900 dark:text-white py-1 line-clamp-2">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:underline ring-focus">
                                            {{ $post->title }}
                                        </a>
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        <a href="#" class="hover:underline text-sky-600 dark:text-sky-400 font-semibold">
                                            {{ $post->author->name ?? 'Admin' }}
                                        </a>
                                        <span> · {{ $post->created_at->format('F d, Y') }}</span>
                                    </p>

                                    <!-- accent rainbow bar -->
                                    <div class="flex h-1 w-full mt-5 overflow-hidden rounded">
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

                    <!-- ✅ Pagination (exactly as given) -->
                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>

                <!-- Right: Sidebar (BACKEND HOOKS UNCHANGED) -->
                <div class="w-full lg:w-1/3">
                    <!-- 🔍 Search (same method/action/params) -->
                    <form method="GET" action="{{ route('blog.index') }}" class="flex mb-6 shadow-sm" role="search">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search posts (lead gen, cold email, SEO...)"
                            value="{{ request('search') }}"
                            class="w-full border border-gray-300 dark:border-gray-700 px-4 py-3 focus:outline-none focus:ring-0 focus:border-sky-400 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400 rounded-l">
                        <button type="submit"
                            class="text-gray-700 dark:text-white bg-gray-100 dark:bg-gray-700 border border-l-0 border-gray-300 dark:border-gray-700 px-4 py-3 rounded-r"
                            aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                            </svg>
                        </button>
                    </form>

                    <!-- 📌 Topics (same routes/loops) -->
                    <h2 class="font-bold text-md my-3 text-gray-900 dark:text-white">Topics</h2>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-md overflow-hidden glass">
                        <ul>
                            @foreach ($topics as $topic)
                                <li class="border-b border-gray-200 dark:border-gray-700 hover:bg-slate-50 dark:hover:bg-slate-800/60 transition">
                                    <a href="{{ route('category.show', $topic->slug) }}"
                                       class="py-4 block px-4 text-gray-800 dark:text-gray-200 hover:text-orange-500">
                                        <div class="flex items-center">
                                            <div class="rounded-full border border-gray-800 dark:border-white w-3 h-3 transition group-hover:bg-sky-500 group-hover:border-sky-500"></div>
                                            <span class="pl-4 text-sm">{{ $topic->name }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-guest-layout>
