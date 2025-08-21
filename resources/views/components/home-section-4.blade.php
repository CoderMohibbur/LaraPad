    <!-- Section Four Start -->
    <div id="section-four" class="relative isolate overflow-hidden">
        <!-- Background image + gradient overlay -->
        <div class="absolute inset-0 -z-10 bg-cover bg-center"
            style="background-image:url('https://www.searchbloom.com/wp-content/uploads/2020/04/nextstep-bg.png')">
        </div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-slate-900/70 via-slate-900/60 to-slate-900/80"></div>

        <!-- Soft orbs for depth -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-20 -right-24 h-80 w-80 rounded-full bg-indigo-400/20 blur-3xl"></div>
            <div class="absolute -bottom-24 -left-20 h-96 w-96 rounded-full bg-rose-400/20 blur-3xl"></div>
        </div>

        <!-- Decorative particles -->
        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0)
                }

                50% {
                    transform: translateY(-16px)
                }
            }

            @keyframes drift {
                0% {
                    transform: translateX(0)
                }

                50% {
                    transform: translateX(10px)
                }

                100% {
                    transform: translateX(0)
                }
            }

            @keyframes rise {
                0% {
                    opacity: .0;
                    transform: translateY(14px)
                }

                100% {
                    opacity: 1;
                    transform: translateY(0)
                }
            }

            /* reveal helpers */
            .reveal-up {
                opacity: 0;
                transform: translateY(22px);
                transition: opacity .7s ease, transform .7s ease
            }

            .is-visible .reveal-up {
                opacity: 1;
                transform: none
            }

            .stagger>* {
                opacity: 0;
                transform: translateY(10px);
                transition: opacity .6s ease, transform .6s ease
            }

            .is-visible .stagger>* {
                opacity: 1;
                transform: none
            }

            /* prefers-reduced-motion */
            @media (prefers-reduced-motion: reduce) {

                .reveal-up,
                .stagger>* {
                    transition: none !important;
                    opacity: 1 !important;
                    transform: none !important
                }

                .particle {
                    animation: none !important
                }
            }
        </style>

        <!-- floating particles -->
        <div class="absolute inset-0 -z-10">
            <span class="particle absolute top-24 left-[12%] h-2 w-2 rounded-full bg-white/50"
                style="animation: float 6s ease-in-out infinite, drift 9s ease-in-out infinite"></span>
            <span class="particle absolute top-40 left-[72%] h-1.5 w-1.5 rounded-full bg-white/40"
                style="animation: float 7s ease-in-out infinite, drift 10s ease-in-out infinite"></span>
            <span class="particle absolute top-1/2 left-[8%] h-1.5 w-1.5 rounded-full bg-white/40"
                style="animation: float 8s ease-in-out infinite, drift 12s ease-in-out infinite"></span>
            <span class="particle absolute top-[68%] left-[48%] h-2 w-2 rounded-full bg-white/40"
                style="animation: float 6.5s ease-in-out infinite, drift 10.5s ease-in-out infinite"></span>
            <span class="particle absolute top-[22%] left-[42%] h-1.5 w-1.5 rounded-full bg-white/30"
                style="animation: float 7.5s ease-in-out infinite, drift 11.5s ease-in-out infinite"></span>
        </div>

        <!-- Content -->
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 md:py-24" data-animate>
            <div class="max-w-3xl mx-auto text-center">
                <p class="reveal-up text-xs tracking-[0.22em] uppercase text-white/70">Lead Generation • Cold Email
                    Marketing</p>

                <h1 class="reveal-up mt-4 text-3xl sm:text-4xl md:text-5xl font-semibold leading-tight text-white">
                    Dedicated Analyst · Custom Strategies · No Lengthy Contracts
                </h1>

                <p class="reveal-up mt-5 text-base sm:text-lg text-white/80">
                    Classic, conversion‑ready design with lively yet tasteful animations to keep attention where it
                    matters.
                </p>

                <!-- Feature pills -->
                <div class="stagger mt-8 flex flex-wrap items-center justify-center gap-3">
                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-white text-sm backdrop-blur">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        ROI‑Focused Campaigns
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-white text-sm backdrop-blur">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Inbox‑First Deliverability
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full bg-white/10 px-4 py-2 text-white text-sm backdrop-blur">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        ICP‑Accurate Targeting
                    </span>
                </div>

                <!-- CTAs -->
                <div class="reveal-up mt-8 flex items-center justify-center gap-4">
                    <a href="#contact"
                        class="ripple inline-flex items-center justify-center rounded-xl bg-indigo-500 px-6 py-3 text-white font-semibold shadow-lg shadow-indigo-900/30 hover:bg-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        Get a Free Proposal
                    </a>
                    <a href="#cases"
                        class="ripple inline-flex items-center justify-center rounded-xl bg-white/10 px-6 py-3 text-white font-semibold backdrop-blur border border-white/20 hover:bg-white/20 focus:outline-none focus:ring-4 focus:ring-white/30">
                        See Case Studies
                    </a>
                </div>

                <!-- Quick trust row -->
                <div class="reveal-up mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6 text-white/70 text-xs">
                    <div class="rounded-lg border border-white/15 bg-white/5 p-3 text-center">SPF/DKIM Setup</div>
                    <div class="rounded-lg border border-white/15 bg-white/5 p-3 text-center">Warmup & Rotation</div>
                    <div class="rounded-lg border border-white/15 bg-white/5 p-3 text-center">A/B Testing</div>
                    <div class="rounded-lg border border-white/15 bg-white/5 p-3 text-center">CRM Handoff</div>
                </div>
            </div>
        </div>

        <!-- Subtle animated wave separator -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]" aria-hidden="true">
            <svg class="block w-[200%] translate-x-0 motion-safe:animate-[drift_16s_linear_infinite]"
                viewBox="0 0 1440 80" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="waveGrad" x1="0" x2="0" y1="0" y2="1">
                        <stop offset="0%" stop-color="rgba(255,255,255,0.35)" />
                        <stop offset="100%" stop-color="rgba(255,255,255,0.0)" />
                    </linearGradient>
                </defs>
                <path fill="url(#waveGrad)"
                    d="M0,64L60,53.3C120,43,240,21,360,16C480,11,600,21,720,37.3C840,53,960,75,1080,69.3C1200,64,1320,32,1380,16L1440,0L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z">
                </path>
            </svg>
        </div>
    </div>
    <!-- Section Four End -->