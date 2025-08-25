{{-- resources/views/pages/khalid-it-mission.blade.php --}}
<x-guest-layout>
    {{-- Remove these 3 lines if AOS is already loaded globally --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) {
                AOS.init({ duration: 800, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 80 });
            }
        });
    </script>

    <!-- Mission Banner (compact, human-written + SEO) -->
    <section class="relative overflow-hidden border-b dark:border-gray-700">
        <!-- bg accents -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 left-[10%] h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
            <div class="absolute -bottom-28 right-[8%] h-96 w-96 rounded-full bg-indigo-400/15 blur-3xl"></div>
            <svg class="absolute inset-0 h-full w-full opacity-[0.06] dark:opacity-[0.12]" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-m" width="24" height="24" patternUnits="userSpaceOnUse">
                        <path d="M24 0H0V24" fill="none" stroke="currentColor" stroke-width=".7" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-m)" />
            </svg>
        </div>

        <div class="py-12 md:py-14 max-w-screen-xl mx-auto text-center lg:text-left px-4">
            <h1
                class="font-extrabold text-slate-900 dark:text-white tracking-tight
                text-[clamp(1.8rem,4vw,3rem)] leading-[1.15] max-w-2xl lg:max-w-xl mx-auto lg:mx-0"
                data-aos="fade-up">
                Khalid IT Mission
                <span
                    class="block mt-1 text-transparent bg-clip-text bg-gradient-to-r from-sky-500 via-cyan-400 to-indigo-500
                    text-[clamp(1.3rem,3.2vw,2.25rem)] leading-tight">
                    We help you win more meetings with honest Lead Generation & Cold Email marketing
                </span>
            </h1>

            <p
                class="mt-4 md:mt-5 max-w-2xl text-[#5d7183] dark:text-gray-300
               text-[clamp(1rem,1.6vw,1.125rem)] leading-relaxed"
                data-aos="fade-up" data-aos-delay="100">
                We’re a small, hands‑on team that builds <strong>predictable B2B pipelines</strong>.  
                We research your ICP, find and verify real decision‑makers, set up <strong>SPF/DKIM/DMARC</strong> the right way,
                warm new inboxes, and write <em>human</em> emails that sound like you. The goal is simple: more replies,
                more qualified calls, and revenue you can track back to <strong>cold email</strong>.
            </p>

            <!-- SEO chips (compact) -->
            <div class="mt-5 flex flex-wrap items-center gap-2.5 justify-center sm:justify-start" data-aos="zoom-in" data-aos-delay="160">
                <span class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-sky-700 dark:text-sky-300 ring-1 ring-sky-200/60 dark:ring-sky-900/40">B2B Lead Generation</span>
                <span class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-indigo-700 dark:text-indigo-300 ring-1 ring-indigo-200/60 dark:ring-indigo-900/40">Cold Email Marketing</span>
                <span class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-emerald-700 dark:text-emerald-300 ring-1 ring-emerald-200/60 dark:ring-emerald-900/40">Inbox Deliverability</span>
                <span class="px-2.5 py-1 rounded-full text-[12px] bg-white dark:bg-gray-800 text-fuchsia-700 dark:text-fuchsia-300 ring-1 ring-fuchsia-200/60 dark:ring-fuchsia-900/40">Personalized Sequences</span>
            </div>
        </div>

        <!-- divider -->
        <div class="mx-auto max-w-screen-xl px-4 pb-3">
            <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-800"></div>
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
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-white" data-aos="fade-up">
                    Meet Our Leadership Team
                </h2>
                <p
                    class="my-5 md:my-6 text-[clamp(1rem,1.5vw,1.125rem)] text-gray-700 dark:text-gray-300 max-w-4xl mx-auto"
                    data-aos="fade-up" data-aos-delay="80">
                    We’re strategists, copywriters, and deliverability nerds who care about outcomes.  
                    Our promise: helpful messaging, respectful outreach, and clean CRM hand‑offs—so your sales team talks to
                    the right people at the right time.
                </p>
            </div>

            <!-- team grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5 lg:px-20">
                @for ($i = 0; $i < 6; $i++)
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
                        bg-gradient-to-tr from-transparent via-white/40 to-transparent opacity-40"></div>

                        <a href="#" class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-400 rounded-2xl">
                            <figure class="relative">
                                <img
                                    src="https://www.Searchbloom.com/wp-content/uploads/2019/08/Cody-Jensen.jpg"
                                    alt="Leadership — Lead Generation & Cold Email Expert"
                                    class="w-full h-auto lg:h-[350px] object-cover rounded-t-2xl
                            transition-transform duration-500 group-hover:scale-[1.03]"
                                    loading="lazy" decoding="async">
                                <!-- glow ring -->
                                <div
                                    class="pointer-events-none absolute inset-2 rounded-[1.1rem]
                            ring-0 group-hover:ring-2 ring-sky-400/40 dark:ring-sky-500/30
                            transition-all duration-500"></div>
                                <!-- badge -->
                                <span
                                    class="absolute right-3 top-3 text-[10px] font-bold px-2 py-1 rounded-full
                             bg-cyan-100 text-cyan-700 ring-1 ring-cyan-300/50
                             dark:bg-cyan-900/40 dark:text-cyan-200 dark:ring-cyan-400/30
                             opacity-0 group-hover:opacity-100 transition-opacity">
                                    Leadership
                                </span>
                            </figure>
                        </a>

                        <div class="text-center px-4 py-4">
                            <h3 class="text-base md:text-lg font-bold text-gray-900 dark:text-white">Cody C. Jensen</h3>
                            <p class="text-xs md:text-sm font-medium text-[#5c7183] dark:text-gray-400 mt-1">
                                CEO &amp; Founder
                            </p>

                            <!-- expertise chips -->
                            <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
                                <span
                                    class="px-2 py-0.5 text-[11px] md:text-xs rounded-full bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-200 ring-1 ring-slate-200/70 dark:ring-slate-700/60">Lead Gen Strategy</span>
                                <span
                                    class="px-2 py-0.5 text-[11px] md:text-xs rounded-full bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-200 ring-1 ring-slate-200/70 dark:ring-slate-700/60">Cold Email Deliverability</span>
                                <span
                                    class="px-2 py-0.5 text-[11px] md:text-xs rounded-full bg-white dark:bg-gray-800 text-slate-700 dark:text-slate-200 ring-1 ring-slate-200/70 dark:ring-slate-700/60">CRM &amp; Revenue Analytics</span>
                            </div>
                        </div>
                    </article>
                @endfor
            </div>

            <!-- trust strip (compact) -->
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3 opacity-90" data-aos="fade-up" data-aos-delay="120">
                <span class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">Respectful Outreach</span>
                <span class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">GDPR / CAN‑SPAM Ready</span>
                <span class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">HubSpot • Salesforce Sync</span>
                <span class="text-[11px] px-3 py-1 rounded-full bg-white dark:bg-gray-800 ring-1 ring-black/5 dark:ring-white/10 text-gray-700 dark:text-gray-300">A/B Copy & Cadence Tests</span>
            </div>
        </div>
    </section>
</x-guest-layout>
