{{-- resources/views/pages/khalid-it-mission.blade.php --}}
<x-guest-layout>
    {{-- Remove these 3 lines if AOS is already loaded globally --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) {
                AOS.init({
                    duration: 800,
                    easing: 'cubic-bezier(.2,.7,.2,1)',
                    once: true,
                    offset: 80
                });
            }
        });
    </script>

<!-- Mission Banner (compact, human-written + SEO) -->
<section class="relative overflow-hidden border-b dark:border-gray-700">
    <!-- bg accents -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute -top-24 left-[10%] h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
        <div class="absolute -bottom-28 right-[8%] h-96 w-96 rounded-full bg-indigo-400/15 blur-3xl"></div>
        <svg class="absolute inset-0 h-full w-full opacity-[0.06] dark:opacity-[0.12]"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid-m" width="24" height="24" patternUnits="userSpaceOnUse">
                    <path d="M24 0H0V24" fill="none" stroke="currentColor" stroke-width=".7" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid-m)" />
        </svg>
    </div>

    <div class="py-12 md:py-14 max-w-screen-xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <!-- Left Text Content -->
        <div class="text-center lg:text-left">
            <h1 class="font-extrabold text-slate-900 dark:text-white tracking-tight
                text-[clamp(1.8rem,4vw,3rem)] leading-[1.15] max-w-2xl mx-auto lg:mx-0"
                data-aos="fade-up">
                <span class="text-[#007CAA]">Khalid</span> <span class="text-orange-400">IT</span> Mission
                <span
                    class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-sky-500 via-cyan-400 to-indigo-500
                    text-[clamp(1.3rem,3.2vw,2.25rem)] leading-tight">
                    We help you win more meetings with honest Lead Generation & Cold Email marketing
                </span>
            </h1>

            <p class="mt-4 md:mt-5 max-w-2xl text-[#5d7183] dark:text-gray-300
               text-[clamp(1rem,1.6vw,1.125rem)] leading-relaxed mx-auto lg:mx-0"
                data-aos="fade-up" data-aos-delay="100">
                We’re a small, hands-on team that builds <strong>predictable B2B pipelines</strong>.
                We research your ICP, find and verify real decision-makers, set up <strong>SPF/DKIM/DMARC</strong> the
                right way,
                warm new inboxes, and write <em>human</em> emails that sound like you. The goal is simple: more replies,
                more qualified calls, and revenue you can track back to <strong>cold email</strong>.
            </p>

            <!-- SEO chips (compact) -->
            <div class="mt-5 flex flex-wrap items-center gap-2.5 justify-center lg:justify-start"
                data-aos="zoom-in" data-aos-delay="160">
                <span
                    class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-sky-700 dark:text-sky-300 ring-1 ring-sky-200/60 dark:ring-sky-900/40">B2B
                    Lead Generation</span>
                <span
                    class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-indigo-700 dark:text-indigo-300 ring-1 ring-indigo-200/60 dark:ring-indigo-900/40">Cold
                    Email Marketing</span>
                <span
                    class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-emerald-700 dark:text-emerald-300 ring-1 ring-emerald-200/60 dark:ring-emerald-900/40">Inbox
                    Deliverability</span>
                <span
                    class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-fuchsia-700 dark:text-fuchsia-300 ring-1 ring-fuchsia-200/60 dark:ring-fuchsia-900/40">Personalized
                    Sequences</span>
            </div>
        </div>

        <!-- Right Image -->
        <div class="flex justify-center lg:justify-end" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('images/career.png') }}" 
                 alt="Khalid IT Mission Visual"
                 class="max-w-md w-full rounded-2xl shadow-lg">
        </div>
    </div>

    <!-- divider -->
    <div class="mx-auto max-w-screen-xl px-4 pb-3">
        <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-800">
        </div>
    </div>
</section>


    <!-- Our Leadership Team (human-written copy) -->
    <section class="relative border-b dark:border-gray-700 overflow-hidden">
        <!-- bg aura -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-20 -right-16 h-64 w-64 rounded-full bg-sky-400/10 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-16 h-72 w-72 rounded-full bg-purple-400/10 blur-3xl"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 py-14">
            <div class="text-center lg:px-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white"
                    data-aos="fade-up">
                    Meet Our Leadership Team
                </h2>
                <p class="my-5 md:my-6 text-[clamp(1rem,1.5vw,1.125rem)] text-gray-700 dark:text-gray-300 max-w-4xl mx-auto"
                    data-aos="fade-up" data-aos-delay="80">
                    We’re strategists, copywriters, and deliverability nerds who care about outcomes.
                    Our promise: helpful messaging, respectful outreach, and clean CRM hand‑offs—so your sales team
                    talks to
                    the right people at the right time.
                </p>
            </div>

            <!-- team grid -->
            {{-- resources/views/pages/team/grid.blade.php --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5 lg:px-20">
                @foreach ($teamCards as $i => $m)
                    <article
                        class="group relative overflow-hidden rounded-2xl
               border border-slate-200/70 dark:border-slate-700/60
               bg-white/90 dark:bg-slate-900/80 backdrop-blur
               ring-1 ring-black/5 dark:ring-white/5
               shadow-sm hover:shadow-2xl hover:shadow-sky-500/10
               transition-all duration-500 hover:-translate-y-1"
                        data-aos="zoom-in" data-aos-delay="{{ ($i % 3) * 80 }}">

                        <!-- shine -->
                        <div
                            class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full
                    transition-transform duration-700 ease-out
                    bg-gradient-to-tr from-transparent via-white/40 to-transparent opacity-40">
                        </div>

                        <a href="#"
                            class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 rounded-2xl">
                            <figure class="relative">
                                @if (!empty($m['src']))
                                    <img src="{{ $m['src'] }}" alt="{{ $m['name'] }} — {{ $m['role'] }}"
                                        class="w-full h-auto lg:h-[350px] object-cover rounded-t-2xl
                          transition-transform duration-500 group-hover:scale-[1.03]"
                                        loading="lazy" decoding="async">
                                @endif

                                <!-- glow ring -->
                                <div
                                    class="pointer-events-none absolute inset-2 rounded-[1.1rem]
                        ring-0 group-hover:ring-2 ring-sky-400/40 dark:ring-sky-500/30
                        transition-all duration-500">
                                </div>

                                <!-- badge -->
                                @if (!empty($m['badge']))
                                    <span
                                        class="absolute right-3 top-3 text-[10px] font-bold px-2 py-1 rounded-full
                           bg-cyan-100 text-cyan-700 ring-1 ring-cyan-300/50
                           dark:bg-cyan-900/40 dark:text-cyan-200 dark:ring-cyan-400/30
                           opacity-0 group-hover:opacity-100 transition-opacity">
                                        {{ $m['badge'] }}
                                    </span>
                                @endif
                            </figure>
                        </a>

                        <div class="text-center px-4 py-4">
                            <h3 class="text-base md:text-lg font-bold text-gray-900 dark:text-white">{{ $m['name'] }}
                            </h3>
                            <p class="text-xs md:text-sm font-medium text-[#5c7183] dark:text-gray-400 mt-1">
                                {{ $m['role'] }}
                            </p>

                            <!-- expertise chips -->
                            @if (!empty($m['tags']))
                                <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
                                    @foreach ($m['tags'] as $tag)
                                        <span
                                            class="px-2 py-0.5 text-[11px] md:text-xs rounded-full
                             bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-200
                             ring-1 ring-slate-200/70 dark:ring-slate-700/60">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        {{-- social icons --}}
                        @if (!empty($m['linkedin']) || !empty($m['facebook']))
                            <div class="my-4 flex items-center justify-center gap-3">
                                @if (!empty($m['linkedin']))
                                    <a href="{{ $m['linkedin'] }}" target="_blank" rel="noopener" aria-label="LinkedIn"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-full
                border border-slate-200/70 bg-white text-slate-600
                hover:border-sky-300 hover:text-sky-600 hover:shadow
                dark:border-slate-700/60 dark:bg-slate-800 dark:text-slate-300
                dark:hover:text-sky-300 transition">
                                        {{-- LinkedIn SVG --}}
                                        <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.8v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4V15.5c0-1.78-.03-4.07-2.48-4.07-2.48 0-2.86 1.93-2.86 3.94V23h-4V8z" />
                                        </svg>
                                    </a>
                                @endif

                                @if (!empty($m['facebook']))
                                    <a href="{{ $m['facebook'] }}" target="_blank" rel="noopener" aria-label="Facebook"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-full
                border border-slate-200/70 bg-white text-slate-600
                hover:border-indigo-300 hover:text-indigo-600 hover:shadow
                dark:border-slate-700/60 dark:bg-slate-800 dark:text-slate-300
                dark:hover:text-indigo-300 transition">
                                        {{-- Facebook SVG --}}
                                        <svg viewBox="0 0 24 24" class="w-5 h-5" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M22.675 0h-21.35C.595 0 0 .595 0 1.326v21.348C0 23.405.595 24 1.326 24H12.82v-9.294H9.692V11.02h3.128V8.413c0-3.1 1.893-4.788 4.658-4.788 1.325 0 2.464.099 2.796.143v3.241l-1.919.001c-1.505 0-1.797.716-1.797 1.767v2.319h3.592l-.468 3.686h-3.124V24h6.127C23.405 24 24 23.405 24 22.674V1.326C24 .595 23.405 0 22.675 0z" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endif

                    </article>
                @endforeach
            </div>


            <!-- trust strip (compact) -->
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3 opacity-90" data-aos="fade-up"
                data-aos-delay="120">
                <span
                    class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">Respectful
                    Outreach</span>
                <span
                    class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">GDPR
                    / CAN‑SPAM Ready</span>
                <span
                    class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">HubSpot
                    • Salesforce Sync</span>
                <span
                    class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">A/B
                    Copy & Cadence Tests</span>
            </div>
        </div>



@php
  $items = \App\Models\GalleryItem::where('is_active', true)
            ->orderBy('position')->orderByDesc('id')
            ->limit(12)->get();
@endphp

@include('components.sections.gallery-memory', [
  'items' => $items,
  'title' => 'Our Moments',
  'cols'  => 'grid-cols-2 md:grid-cols-4'
])


    </section>
</x-guest-layout>
