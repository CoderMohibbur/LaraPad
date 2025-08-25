{{-- resources/views/pages/leadgen-home.blade.php --}}
<x-guest-layout>
    {{-- If AOS already loaded elsewhere, you can remove these 3 lines --}}
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

    {{-- AWARDS — prettier cards + hover micro‑interactions --}}
    <section id="awards" class="py-10">
        <div class="max-w-screen-xl mx-auto px-4">

            <!-- headline -->
            <header class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Recognized for <span class="text-sky-600 dark:text-sky-400">Lead Generation</span>
                    & <span class="text-indigo-600 dark:text-indigo-400">Cold Email Excellence</span>
                </h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Our work in <strong>lead generation</strong> and <strong>cold email marketing</strong>
                    has been honored globally. From Clutch Global to Top 1000 awards,
                    we’re proud to be trusted by businesses worldwide.
                </p>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-7" data-aos="fade-up">
                @foreach ([
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_fall_2024.png', 'alt' => 'Clutch Global — B2B Lead Generation (Fall 2024)', 'label' => 'Clutch Global — B2B Lead Gen (Fall 2024)'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_spring_2024.png', 'alt' => 'Clutch Global — Cold Email (Spring 2024)', 'label' => 'Clutch Global — Cold Email (Spring 2024)'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/clutch_1000_2023_award.png', 'alt' => 'Clutch Top 1000 — 2023', 'label' => 'Clutch Top 1000 — 2023'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_2023.png', 'alt' => 'Clutch Global — Fall 2023', 'label' => 'Clutch Global — Fall 2023'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_fall_2024.png', 'alt' => 'Clutch Global — B2B Lead Generation (Fall 2024)', 'label' => 'Clutch Global — B2B Lead Gen (Fall 2024)'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_spring_2024.png', 'alt' => 'Clutch Global — Cold Email (Spring 2024)', 'label' => 'Clutch Global — Cold Email (Spring 2024)'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/clutch_1000_2023_award.png', 'alt' => 'Clutch Top 1000 — 2023', 'label' => 'Clutch Top 1000 — 2023'],
        ['src' => 'https://www.Searchbloom.com/wp-content/uploads/2024/12/global_award_2023.png', 'alt' => 'Clutch Global — Fall 2023', 'label' => 'Clutch Global — Fall 2023'],
    ] as $i => $a)
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200/70 dark:border-slate-700/60
               bg-white/90 dark:bg-slate-900/80 backdrop-blur
               ring-1 ring-black/5 dark:ring-white/5
               shadow-sm hover:shadow-2xl hover:shadow-sky-500/10
               transition-all duration-500
               hover:-translate-y-1 hover:scale-[1.015]"
                        data-aos="zoom-in" data-aos-delay="{{ $i * 60 }}">
                        {{-- shine swipe --}}
                        <div
                            class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full
                    transition-transform duration-700 ease-out
                    bg-gradient-to-tr from-transparent via-white/40 to-transparent opacity-40">
                        </div>

                        {{-- top image --}}
                        <div class="flex items-center h-auto lg:h-[250px] relative">
                            <img src="{{ $a['src'] }}" alt="{{ $a['alt'] }}"
                                class="w-[200px] lg:w-full h-auto p-6 mx-auto
                      transition-transform duration-500 group-hover:scale-105" />
                            {{-- subtle glow ring on hover --}}
                            <div
                                class="pointer-events-none absolute inset-3 rounded-2xl
                      ring-0 group-hover:ring-2 ring-sky-400/40 dark:ring-sky-500/30
                      transition-all duration-500">
                            </div>
                        </div>

                        {{-- label --}}
                        <div
                            class="flex items-center justify-center h-[100px] border-t dark:border-gray-700
                 bg-gradient-to-b from-white/60 to-white/30 dark:from-slate-900/40 dark:to-slate-900/20">
                            <p
                                class="text-base lg:text-xl font-semibold px-5 text-gray-800 dark:text-gray-200
                    transition-colors duration-300 group-hover:text-sky-600 dark:group-hover:text-sky-300">
                                {{ $a['label'] }}
                            </p>
                        </div>

                        {{-- corner badge accent --}}
                        <div
                            class="absolute right-3 top-3 px-2 py-1 rounded-full text-[10px] font-bold
                    bg-sky-100 text-sky-700 ring-1 ring-sky-300/40
                    dark:bg-sky-900/40 dark:text-sky-200 dark:ring-sky-400/30
                    opacity-0 group-hover:opacity-100 transition-opacity">
                            Verified
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- bullet columns: small hover polish --}}
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
                @php
                    $bulletsCol1 = [
                        'Top B2B Lead Generation Company — 2024',
                        'Best Cold Email Marketing Agency — 2024',
                        'Top Growth Marketing Partner — 2023',
                        'Client Favorite for B2B Prospecting — 2023',
                        'High Performer: Lead Gen & Email — 2022',
                        'Rising Star for Outbound — 2021',
                        'Verified Reviews: 4.9/5 from B2B Leaders',
                    ];
                    $bulletsCol2 = [
                        'Best Use of Personalization — 2024',
                        'Deliverability Excellence (SPF/DKIM/DMARC) — 2024',
                        'Top Outreach Copywriting Team — 2023',
                        'A/B Testing Champion — 2023',
                        'CRM Integration Partner (HubSpot/Salesforce) — 2022',
                        'Data Quality & Enrichment Badge — 2022',
                        'Trusted by SaaS, Agencies & Finance Teams',
                    ];
                    $bulletsCol3 = [
                        'Reply Rate Leader: 10–18% (multi‑step)',
                        'Avg. Open Rates: 55–65% with warm‑up',
                        'Compliance First: CAN‑SPAM/GDPR Ready',
                        'Inbox Health Monitoring & Seed Tests',
                        'ICP‑Driven List Building & Enrichment',
                        'Value‑Forward Copy & Human‑like Sends',
                        'CRM Handoff: HubSpot / Salesforce / Pipedrive',
                    ];
                @endphp

                {{-- col 1 --}}
                <div class="px-5 lg:pr-10" data-aos="fade-up">
                    <h3 class="text-xl font-semibold pb-5 text-gray-800 dark:text-white">Clutch Awards</h3>
                    <ul>
                        @foreach ($bulletsCol1 as $b)
                            <li class="group flex items-center gap-3 pb-3 transition-all">
                                <span class="rounded-full w-[15px] h-[12px] bg-[#31bcee]"></span>
                                <p
                                    class="text-gray-700 dark:text-gray-300 transition
                      group-hover:text-sky-700 dark:group-hover:text-sky-300 group-hover:translate-x-0.5">
                                    {{ $b }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- col 2 --}}
                <div class="lg:border-l-2 px-5 lg:pl-5 lg:pr-10 border-[#ecf1f8]" data-aos="fade-up"
                    data-aos-delay="80">
                    <h3 class="text-xl font-semibold pb-5 text-gray-800 dark:text-white">More Awards</h3>
                    <ul>
                        @foreach ($bulletsCol2 as $b)
                            <li class="group flex items-center gap-3 pb-3 transition-all">
                                <span class="rounded-full w-[15px] h-[12px] bg-[#31bcee]"></span>
                                <p
                                    class="text-gray-700 dark:text-gray-300 transition
                      group-hover:text-sky-700 dark:group-hover:text-sky-300 group-hover:translate-x-0.5">
                                    {{ $b }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- col 3 --}}
                <div class="border-l-2 pl-5 pr-10 border-[#ecf1f8]" data-aos="fade-up" data-aos-delay="160">
                    <h3 class="text-xl font-semibold pb-5 text-gray-800 dark:text-white">Performance Highlights</h3>
                    <ul>
                        @foreach ($bulletsCol3 as $b)
                            <li class="group flex items-center gap-3 pb-3 transition-all">
                                <span class="rounded-full w-[15px] h-[12px] bg-[#31bcee]"></span>
                                <p
                                    class="text-gray-700 dark:text-gray-300 transition
                      group-hover:text-sky-700 dark:group-hover:text-sky-300 group-hover:translate-x-0.5">
                                    {{ $b }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
