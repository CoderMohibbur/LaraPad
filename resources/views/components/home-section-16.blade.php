{{-- resources/views/components/sections/latest-leadgen-posts.blade.php --}}
<section id="latest-leadgen-posts" class="relative py-12 border-t-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
    <!-- ambient glow -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
        <div
            class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-sky-400/20 blur-3xl dark:from-cyan-400/10 dark:to-sky-500/10">
        </div>
        <div
            class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20 blur-3xl dark:from-fuchsia-400/10 dark:to-indigo-400/10">
        </div>
    </div>

    <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8">
        <!-- Heading -->
        <header class="text-center max-w-3xl mx-auto">
            <h2 class="text-[#2ca8d9] text-3xl lg:text-5xl font-extrabold tracking-tight">Lead Generation & Cold Email —
                Latest Insights</h2>
            <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
                Playbooks, deliverability tips, and real experiments to help you build a <strong>predictable lead
                    pipeline</strong> with <strong>cold email marketing</strong>.
            </p>
        </header>

        @php
            $posts = [
                [
                    'title' => 'Cold Email Deliverability in 2025: DMARC, SPF, DKIM & Inboxing Checklist',
                    'slug' => 'cold-email-deliverability-2025',
                    'excerpt' =>
                        'Sender reputation, sub-domain strategy, and warm-up that actually works—our field guide to landing in Primary, not Promotions.',
                    'author' => 'Ayesha Rahman',
                    'avatar' => 'https://i.pravatar.cc/80?img=21',
                    // Email security / deliverability themed
                    'cover' =>
                        'https://images.pexels.com/photos/1181343/pexels-photo-1181343.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&dpr=1',
                    'read' => 7,
                    'date' => '2025-08-10',
                    'tags' => ['Deliverability', 'DMARC', 'Warm-up'],
                ],
                [
                    'title' => 'Personalized First Lines at Scale: 4–7 Touch Cadence That Gets Replies',
                    'slug' => 'personalized-first-lines-cadence',
                    'excerpt' =>
                        'How to craft value-forward copy, rotate angles, and schedule human-like sends for consistent reply rates.',
                    'author' => 'Khalid Hossain',
                    'avatar' => 'https://i.pravatar.cc/80?img=22',
                    // Outreach personalization workspace
                    'cover' =>
                        'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&dpr=1',
                    'read' => 6,
                    'date' => '2025-08-05',
                    'tags' => ['Copywriting', 'Cadence', 'Personalization'],
                ],
                [
                    'title' => 'ICP Research & List Building: Verified Work Emails with Buying Signals',
                    'slug' => 'icp-research-list-building',
                    'excerpt' =>
                        'Firmographics + technographics + intent: the data stack behind laser-targeted lead generation.',
                    'author' => 'Nabila Akter',
                    'avatar' => 'https://i.pravatar.cc/80?img=23',
                    // B2B meeting / research
                    'cover' =>
                        'https://images.pexels.com/photos/1181645/pexels-photo-1181645.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&dpr=1',
                    'read' => 5,
                    'date' => '2025-07-28',
                    'tags' => ['Lead Generation', 'ICP', 'Prospecting'],
                ],
            ];
        @endphp


        <!-- Grid -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $p)
                <article
                    class="group bg-white dark:bg-gray-800 border border-gray-200/70 dark:border-gray-700/70 rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden ring-1 ring-black/5 dark:ring-white/5">
                    <a href="{{ url('/blog/' . $p['slug']) }}" class="block">
                        <figure class="relative overflow-hidden">
                            <img src="{{ $p['cover'] }}" alt="{{ $p['title'] }}"
                                class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-[1.04]"
                                loading="lazy" decoding="async" />
                            <div class="absolute top-3 left-3 flex gap-2">
                                @foreach ($p['tags'] ?? [] as $tag)
                                    <span
                                        class="px-2 py-0.5 rounded-full text-xs bg-white/90 dark:bg-gray-900/80 text-gray-700 dark:text-gray-200 ring-1 ring-black/5 dark:ring-white/10 backdrop-blur">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </figure>

                        <div class="px-6 pt-5 pb-6">
                            <h3
                                class="text-2xl font-semibold text-gray-900 dark:text-white leading-snug group-hover:text-[#2ca8d9] transition-colors">
                                {{ $p['title'] }}</h3>
                            <div class="mt-3 flex items-center gap-3">
                                <img src="{{ $p['avatar'] }}" alt="{{ $p['author'] }}"
                                    class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover" />
                                <div class="text-sm text-gray-600 dark:text-gray-300">{{ $p['author'] }}</div>
                                <span class="text-gray-400">•</span>
                                <time datetime="{{ $p['date'] }}"
                                    class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($p['date'])->format('M d, Y') }}</time>
                                <span class="text-gray-400">•</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $p['read'] }} min
                                    read</span>
                            </div>
                            <p class="mt-3 text-gray-600 dark:text-gray-300 leading-relaxed">{{ $p['excerpt'] }}</p>

                            <div class="mt-5 flex items-center justify-between">
                                <span class="inline-flex items-center text-[#2ca8d9] font-semibold">Read More
                                    <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-0.5"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13 5l7 7-7 7M5 12h14" />
                                    </svg>
                                </span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Lead Gen · Cold Email</span>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        <!-- CTA -->
        <div class="mt-12 text-center">
            <a href="{{ url('/blog') }}"
                class="ripple inline-block text-base md:text-lg font-bold uppercase text-[#03b9f1] border-2 border-[#03b9f1] hover:text-white hover:bg-[#03b9f1] transition duration-500 ease-in-out rounded-xl py-3 px-6">More
                Articles</a>
        </div>
    </div>
</section>
