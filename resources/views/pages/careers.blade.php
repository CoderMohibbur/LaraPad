<x-guest-layout>
    {{-- AOS (remove if already global) --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) {
                AOS.init({ duration: 900, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
            }
        });
    </script>

    <style>
        /* Soft floating blobs */
        @keyframes floatY { 0%{transform:translateY(0)} 50%{transform:translateY(-10px)} 100%{transform:translateY(0)} }
        @keyframes pulseGlow { 0%,100%{opacity:.35; filter: blur(40px);} 50%{opacity:.6; filter: blur(60px);} }
        @keyframes sparkle { 0%{transform:translateY(0) translateX(0); opacity:.1}
                              50%{transform:translateY(-6px) translateX(6px); opacity:.35}
                              100%{transform:translateY(0) translateX(0); opacity:.1}}
        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: linear-gradient(160deg, rgba(255,255,255,.7), rgba(255,255,255,.45));
        }
        .dark .glass {
            background: linear-gradient(160deg, rgba(14,22,37,.7), rgba(14,22,37,.45));
            border-color: rgba(148,163,184,.25);
        }
        .tilt-hover{ transform: perspective(900px) rotateX(0) rotateY(0) translateZ(0); transition: transform .35s ease, box-shadow .35s ease; }
        .tilt-hover:hover{ transform: perspective(900px) rotateX(3deg) rotateY(-4deg) translateZ(8px); }
    </style>

    {{-- ===================== HERO ===================== --}}
    <section class="relative overflow-hidden border-b dark:border-gray-800
                    bg-gradient-to-br from-sky-50 via-white to-sky-100
                    dark:from-[#0b1220] dark:via-[#0b1220] dark:to-[#0b1220]">
        <!-- ambient blobs -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-sky-300/25 blur-3xl animate-[pulseGlow_6s_ease-in-out_infinite]"></div>
            <div class="absolute -bottom-28 -right-28 w-96 h-96 rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
            <!-- sparkles -->
            <div class="absolute top-10 right-1/4 w-2 h-2 rounded-full bg-sky-400/70 animate-[sparkle_4.6s_linear_infinite]"></div>
            <div class="absolute bottom-16 left-1/3 w-2 h-2 rounded-full bg-rose-400/70 animate-[sparkle_5.2s_linear_infinite]"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-16 lg:py-20 grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left -->
            <div data-aos="fade-right">
                <p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wider uppercase text-sky-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-sky-500 animate-ping"></span> We’re hiring
                </p>
                <h1 class="mt-3 text-4xl md:text-6xl font-extrabold leading-tight text-slate-900 dark:text-white">
                    Careers in <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-indigo-600">Lead Generation</span>
                    & <span class="underline decoration-wavy decoration-4 decoration-rose-400 underline-offset-4">Cold Email Marketing</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-slate-600 dark:text-slate-300 max-w-2xl">
                    Join Khalid IT to build predictable pipeline with <strong>lead generation</strong> excellence and
                    high‑deliverability <strong>cold email marketing</strong>. Grow fast, ship bold, and turn prospects into revenue.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#open-positions"
                       class="group relative inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold
                              text-white bg-gradient-to-r from-sky-500 to-indigo-600
                              shadow-lg hover:shadow-xl transition">
                        <span
                          class="absolute inset-0 rounded-xl ring-2 ring-sky-300/0 group-hover:ring-sky-300/40 transition"></span>
                        Explore Open Positions
                        <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#culture"
                       class="px-6 py-3 rounded-xl font-semibold border-2 border-sky-500 text-sky-700 dark:text-sky-300
                              hover:bg-sky-500 hover:text-white transition">
                        Why Work With Us
                    </a>
                </div>

                <!-- SEO bullets -->
                <ul class="mt-8 grid sm:grid-cols-3 gap-3 text-sm text-slate-600 dark:text-slate-300">
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> B2B Lead Gen</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-400"></span> Cold Email Sequences</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-400"></span> Deliverability + Warmup</li>
                </ul>
            </div>

            <!-- Right (Demo Image with tilt) -->
            <div class="relative" data-aos="fade-left">
                <div class="absolute -inset-6 bg-gradient-to-tr from-sky-400/10 to-fuchsia-400/10 rounded-3xl blur-2xl"></div>
                <img
                    src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=1600&auto=format&fit=crop"
                    alt="Lead Generation & Cold Email Marketing Team"
                    class="relative z-10 w-full h-auto rounded-2xl shadow-2xl tilt-hover">
            </div>
        </div>
    </section>

    {{-- ===================== OPEN POSITIONS ===================== --}}
    <section id="open-positions" class="relative py-20 border-b dark:border-gray-800 bg-white dark:bg-gray-900">
        <!-- soft aura -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute left-1/2 -translate-x-1/2 -top-16 w-[70vw] h-40 bg-gradient-to-r from-sky-300/20 to-indigo-300/20 blur-3xl"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white" data-aos="fade-up">
                Open Roles in Lead Gen & Cold Email
            </h2>
            <p class="mt-4 text-lg text-slate-600 dark:text-slate-300 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="60">
                Help us design, automate, and scale predictable pipelines. Work with data, craft persuasive copies, and launch campaigns that convert.
            </p>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $jobs = [
                        ['title' => 'Cold Email Marketing Specialist', 'team' => 'Outbound Campaigns',
                         'desc' => 'Own ICP research, list-building, sequence strategy, A/B copy, and reply handling to generate qualified B2B leads.'],
                        ['title' => 'Lead Generation Strategist', 'team' => 'Demand Generation',
                         'desc' => 'Design inbound + outbound funnels, map buyer journeys, and align messaging for consistent SQL growth.'],
                        ['title' => 'Automation & Data Analyst', 'team' => 'Tech + Growth',
                         'desc' => 'Improve deliverability, manage warmup, enrich data, and build dashboards for pipeline visibility.'],
                    ];
                @endphp

                @foreach($jobs as $i => $job)
                    <div class="group glass border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-6
                                shadow-[0_10px_40px_-10px_rgba(2,6,23,0.12)]
                                hover:shadow-[0_15px_50px_-10px_rgba(2,6,23,0.25)]
                                transition relative overflow-hidden"
                         data-aos="fade-up" data-aos-delay="{{ 80 + ($i*60) }}">
                        <!-- card glow -->
                        <div class="pointer-events-none absolute -top-10 -right-10 w-44 h-44 rounded-full bg-sky-400/20 blur-3xl animate-[floatY_6s_ease-in-out_infinite]"></div>

                        <h3 class="text-xl font-semibold text-slate-900 dark:text-white group-hover:text-sky-400 transition">
                            {{ $job['title'] }}
                        </h3>
                        <p class="mt-1 text-sky-600 font-medium">{{ $job['team'] }}</p>
                        <p class="mt-4 text-slate-600 dark:text-slate-300">{{ $job['desc'] }}</p>

                        <div class="mt-6 flex items-center justify-between">
                            <a href="#apply" class="inline-flex items-center gap-2 font-semibold
                                                  text-sky-600 hover:text-sky-700 dark:text-sky-300">
                                Learn More & Apply
                                <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </a>

                            <span class="text-xs px-2.5 py-1 rounded-full border border-emerald-400/40 text-emerald-600 dark:text-emerald-300">
                                Full‑time · Remote
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- (Optional) CULTURE teaser for anchor #culture --}}
    <section id="culture" class="py-16 bg-slate-50 dark:bg-[#0b1220]">
        <div class="max-w-screen-xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div data-aos="fade-right">
                    <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">
                        Culture built for Growth: Lead Gen + Cold Email
                    </h3>
                    <p class="mt-4 text-slate-600 dark:text-slate-300">
                        We value deep work, rapid iteration, and human‑first messaging. From ICP research to deliverability hygiene,
                        our playbooks help you execute campaigns that convert and careers that compound.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600 dark:text-slate-300">
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> SDR‑friendly tooling & automations</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span> Copy frameworks that get replies</li>
                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-sky-400"></span> Data enrichment & list QA standards</li>
                    </ul>
                    <a href="#open-positions"
                       class="mt-6 inline-flex items-center gap-2 px-5 py-2.5 rounded-lg font-semibold
                              border-2 border-indigo-500 text-indigo-600 dark:text-indigo-300
                              hover:bg-indigo-500 hover:text-white transition">
                        See Roles
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
                <div data-aos="fade-left" class="relative">
                    <div class="absolute -inset-5 rounded-2xl bg-gradient-to-tr from-indigo-400/10 to-fuchsia-400/10 blur-2xl"></div>
                    <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1600&auto=format&fit=crop"
                         alt="Team Collaboration"
                         class="relative z-10 w-full h-auto rounded-2xl shadow-2xl tilt-hover">
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
