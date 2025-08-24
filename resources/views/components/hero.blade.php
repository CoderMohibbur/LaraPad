<!-- ========== MOBILE-FIRST TUNING (keep once in layout – extends previous helpers) ========== -->
<style>
    /* Safe tap targets & container pads */
    :root {
        --pad-x: 1rem;
        --pad-y: 1.25rem;
    }

    @media (min-width:640px) {
        :root {
            --pad-x: 1.25rem;
            --pad-y: 1.75rem;
        }
    }

    @media (min-width:1024px) {
        :root {
            --pad-x: 1.5rem;
            --pad-y: 2rem;
        }
    }

    /* Mobile-friendly type (clamp) */
    .clamp-display {
        font-size: clamp(2rem, 6vw, 3.75rem);
        line-height: 1.15;
    }

    .clamp-sub {
        font-size: clamp(1rem, 2.9vw, 1.25rem);
    }

    /* Mobile reveals softer (shorter distance) */
    @media (max-width: 640px) {
        html.reveal-ready .will-reveal:not(.is-revealed) {
            transform: translateY(16px) !important;
        }

        .reveal-stagger>* {
            transition-delay: calc(var(--i, 0) * 70ms) !important;
        }
    }

    /* Mobile blobs smaller */
    @media (max-width: 640px) {
        .blob-sm {
            filter: blur(40px) !important;
            opacity: .35 !important;
        }
    }

    /* Floating cards: stack on mobile (no overflow) */
    .float-card {
        animation: float 7s ease-in-out infinite;
    }

    @media (max-width: 640px) {
        .float-wrap {
            position: static !important;
        }

        .float-card {
            position: relative !important;
            inset: auto !important;
            margin-top: .75rem;
            animation: none;
        }
    }

    /* Prevent horizontal scroll due to transforms */
    body {
        overflow-x: hidden
    }
</style>

<script>
    /* Disable heavy effects on touch devices (mobile/tablet) */
    (function() {
        const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        if (!isTouch) return;
        // Disable parallax + tilt set earlier
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-parallax]').forEach(el => el.removeAttribute('data-parallax'));
            document.querySelectorAll('[data-tilt]').forEach(el => el.removeAttribute('data-tilt'));
        });
    })();
</script>

<!-- ========== HERO (Mobile-First, Super Responsive) ========== -->
<!-- HERO v4 — Lead Generation & Cold Email (Ultra‑Responsive + Motion‑Safe) -->
<section id="hero" class="relative overflow-hidden">
    <!-- background gradient + pattern -->
    <div aria-hidden="true" class="absolute inset-0 -z-10">
        <div
            class="absolute inset-0 bg-gradient-to-b from-white via-white to-slate-50 dark:from-[#0b1220] dark:via-[#0b1220] dark:to-[#0b1220]">
        </div>
        <!-- soft blobs -->
        <div class="absolute -top-24 -left-28 h-72 w-72 rounded-full blur-3xl opacity-40"
            style="background:radial-gradient(50% 50% at 50% 50%, rgba(96,165,250,.35) 0%, rgba(96,165,250,0) 70%);">
        </div>
        <div class="absolute -bottom-28 -right-32 h-80 w-80 rounded-full blur-3xl opacity-40"
            style="background:radial-gradient(50% 50% at 50% 50%, rgba(236,72,153,.35) 0%, rgba(236,72,153,0) 70%);">
        </div>
        <!-- tiny grid pattern -->
        <svg class="absolute inset-0 h-full w-full opacity-[0.08] dark:opacity-[0.12]"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="p" width="24" height="24" patternUnits="userSpaceOnUse">
                    <path d="M24 0H0V24" fill="none" stroke="currentColor" stroke-width=".7" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#p)" />
        </svg>
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 sm:pt-24 lg:pt-28 pb-10">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left: Copy -->
            <div class="order-2 lg:order-2">
                <p class="text-sm sm:text-base font-medium tracking-wide text-sky-600 dark:text-sky-400">Lead Generation
                    & Cold Email</p>
                <h1
                    class="mt-2 font-extrabold tracking-tight text-slate-900 dark:text-white
                   text-[clamp(2rem,6vw,3.75rem)] leading-[1.12]">
                    Book More Meetings,
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-pink-500">
                        Close More Pipeline
                    </span>
                </h1>

                <p class="mt-4 text-[clamp(.98rem,2.5vw,1.125rem)] text-slate-600 dark:text-slate-300 max-w-xl">
                    Targeted B2B lists + deliverability‑first sending + reply‑oriented copy.
                    Clean setup (SPF/DKIM/DMARC, warm‑up, rotation) = real conversations.
                </p>

                <!-- bullets -->
                <ul class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-[15px] text-slate-700 dark:text-slate-300">
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Title •
                        Geo • Tech‑stack targeting</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span>
                        SPF/DKIM/DMARC + Warm‑up</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span>
                        Multi‑inbox rotation & tracking</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Weekly
                        reporting & handover</li>
                </ul>

                <!-- CTAs -->
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="#get-sample"
                        class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-white font-semibold
                    bg-gradient-to-r from-sky-500 to-pink-500 hover:opacity-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-sky-400 ring-offset-white dark:ring-offset-[#0b1220]
                    transition-shadow shadow-[0_10px_30px_rgba(59,130,246,.25)]">
                        Get Sample Leads
                    </a>
                    <a href="#how-it-works"
                        class="inline-flex items-center justify-center rounded-xl px-5 py-3 font-semibold
                    border border-slate-200 text-slate-800 hover:bg-white/60
                    dark:border-slate-700 dark:text-slate-100 dark:hover:bg-white/5 transition">
                        See How It Works
                    </a>
                </div>

                <!-- trust strip -->
                <div class="mt-8 hidden sm:flex flex-wrap items-center gap-5 opacity-90">
                    <img src="https://www.Searchbloom.com/wp-content/uploads/2024/11/Searchbloom-Best-SEO-Services-Of-2024-2024-PNG.png"
                        class="h-10 sm:h-12" alt="Award" loading="lazy">
                    <img src="https://www.Searchbloom.com/wp-content/uploads/2024/12/SEO-Singular.png"
                        class="h-10 sm:h-12" alt="Recognition" loading="lazy">
                    <img src="https://www.Searchbloom.com/wp-content/uploads/2020/07/top-seo-companies.svg"
                        class="h-8 sm:h-10" alt="Top SEO" loading="lazy">
                    <img src="https://www.Searchbloom.com/wp-content/uploads/2020/07/top-ppc-agencies.svg"
                        class="h-8 sm:h-10" alt="Top PPC" loading="lazy">
                </div>
            </div>

            <!-- Right: Visual (mobile-first stack, desktop collage) -->
            <div class="order-2 lg:order-2">
                <div class="relative">
                    <!-- base mock -->
                    <div
                        class="rounded-[18px] bg-white/85 dark:bg-white/5 backdrop-blur ring-1 ring-black/5 dark:ring-white/10 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=1600&auto=format&fit=crop"
                            alt="Campaign dashboard" fetchpriority="high" sizes="(max-width: 640px) 100vw, 600px"
                            class="w-full aspect-[4/3] sm:aspect-video object-cover motion-safe:animate-hero-zoom">
                    </div>

                    <!-- floating cards (stack on mobile) -->
                    <div class="mt-3 hidden sm:block">
                        <!-- ICP -->
                        <div
                            class="rounded-2xl border border-slate-200 dark:border-slate-800 shadow-lg p-4 bg-white/90 dark:bg-[#0b1220]/85 backdrop-blur
                        sm:absolute sm:-bottom-8 sm:-left-6 sm:w-64 motion-safe:animate-float">
                            <div class="text-sm font-semibold text-slate-900 dark:text-slate-100 mb-2">ICP Profile</div>
                            <div class="text-xs text-slate-700 dark:text-slate-300 space-y-1">
                                <div class="flex justify-between"><span>Title</span><span>Head of Growth</span></div>
                                <div class="flex justify-between"><span>Industry</span><span>SaaS</span></div>
                                <div class="flex justify-between"><span>Region</span><span>US</span></div>
                            </div>
                        </div>

                        <!-- Inbox -->
                        <div
                            class="rounded-2xl border border-slate-200 dark:border-slate-800 shadow-lg p-4 bg-white/90 dark:bg-[#0b1220]/85 backdrop-blur
                        sm:absolute sm:-top-6 sm:-right-6 sm:w-64 mt-3 sm:mt-0 motion-safe:animate-float2">
                            <div class="text-sm font-semibold text-slate-900 dark:text-slate-100 mb-2">Inbox Health
                            </div>
                            <ul class="text-xs text-slate-700 dark:text-slate-300 space-y-1">
                                <li class="flex items-center gap-2"><span
                                        class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> SPF/DKIM/DMARC</li>
                                <li class="flex items-center gap-2"><span
                                        class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Warm‑up Active</li>
                                <li class="flex items-center gap-2"><span
                                        class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Rotation On</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- subtle divider -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-4">
        <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-800">
        </div>
    </div>
</section>

<!-- Minimal CSS animations (motion-safe) -->
<style>
    @media (prefers-reduced-motion: no-preference) {
        .motion-safe\:animate-hero-zoom {
            animation: heroZoom 14s ease-in-out both
        }

        @keyframes heroZoom {
            0% {
                transform: scale(1.02)
            }

            50% {
                transform: scale(1.06)
            }

            100% {
                transform: scale(1.02)
            }
        }

        .motion-safe\:animate-float {
            animation: float 7.2s ease-in-out infinite
        }

        .motion-safe\:animate-float2 {
            animation: float 6.4s ease-in-out infinite
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-7px)
            }
        }
    }
</style>
