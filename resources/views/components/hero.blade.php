
<!-- HERO — Tailwind only (no custom CSS) -->
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
        <div class="grid items-center gap-8 lg:gap-12 lg:grid-cols-2">

            <!-- Left: Content -->
            <div data-aos="fade-up">
                <p class="text-sm sm:text-base font-medium tracking-wide text-sky-600 dark:text-sky-400"
                    data-aos="fade-right" data-aos-delay="60">
                    Smart Lead Generation & Cold Email That Works
                </p>

                <h1 class="mt-2 font-extrabold tracking-tight text-slate-900 dark:text-white text-[clamp(2rem,6vw,3.75rem)] leading-[1.12]"
                    data-aos="fade-up" data-aos-delay="100">
                    More Conversations,
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-pink-500">
                        Close More Deals
                    </span>
                </h1>

                <p class="mt-4 text-[clamp(.98rem,2.5vw,1.125rem)] text-slate-600 dark:text-slate-300 max-w-xl"
                    data-aos="fade-up" data-aos-delay="160">
                    Imagine having the right prospects, the right message, and the right timing—every time.
                    That’s exactly what our <strong>lead generation</strong> and <strong>cold email marketing</strong>
                    do for you.
                    We don’t send “email blasts.” We start real conversations that open doors to real business.
                </p>

                <ul class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-[15px] text-slate-700 dark:text-slate-300"
                    data-aos="fade-up" data-aos-delay="220">
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Pin-point targeting (Title • Geo • Industry)</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Perfect deliverability setup (SPF/DKIM/DMARC)</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Multi-inbox rotation & human-like sending</li>
                    <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-sky-500"></span> Weekly updates & actionable insights</li>
                </ul>

                <div class="mt-6 flex flex-col sm:flex-row gap-3" data-aos="fade-up" data-aos-delay="280">
                    <a href="#get-sample"
                        class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-white font-semibold bg-gradient-to-r from-sky-500 to-pink-500 hover:opacity-95 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-sky-400 ring-offset-white dark:ring-offset-[#0b1220] transition-shadow shadow-[0_10px_30px_rgba(59,130,246,.25)]">
                        Get Sample Leads
                    </a>
                    <a href="/services#process"
                        class="inline-flex items-center justify-center rounded-xl px-5 py-3 font-semibold border border-slate-200 text-slate-800 hover:bg-white/60 dark:border-slate-700 dark:text-slate-100 dark:hover:bg-white/5 transition">
                        See How It Works
                    </a>
                </div>

                <div class="mt-8 hidden sm:flex flex-wrap items-center gap-5 opacity-90" data-aos="fade-up"
                    data-aos-delay="320">
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

            <!-- Right: Visual -->
            <div data-aos="fade-left" data-aos-delay="120">
                <div class="relative">
                    <div
                        class="rounded-[18px] bg-white/80 dark:bg-white/5 backdrop-blur ring-1 ring-black/5 dark:ring-white/10 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556157382-97eda2d62296?q=80&w=1600&auto=format&fit=crop"
                            alt="Campaign dashboard" fetchpriority="high" sizes="(max-width: 640px) 100vw, 600px"
                            class="w-full aspect-[4/3] sm:aspect-video object-cover">
                    </div>

                    <!-- floating cards (appear with AOS; no custom keyframes) -->
                    <div class="hidden sm:block">
                        <div class="sm:absolute sm:-bottom-8 sm:-left-6 sm:w-64 mt-3 sm:mt-0" data-aos="zoom-in-up"
                            data-aos-delay="220">
                            <div
                                class="rounded-2xl border border-slate-200 dark:border-slate-800 shadow-lg p-4 bg-white/90 dark:bg-[#0b1220]/85 backdrop-blur">
                                <div class="text-sm font-semibold text-slate-900 dark:text-slate-100 mb-2">ICP Profile
                                </div>
                                <div class="text-xs text-slate-700 dark:text-slate-300 space-y-1">
                                    <div class="flex justify-between"><span>Title</span><span>Head of Growth</span>
                                    </div>
                                    <div class="flex justify-between"><span>Industry</span><span>SaaS</span></div>
                                    <div class="flex justify-between"><span>Region</span><span>US</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:absolute sm:-top-6 sm:-right-6 sm:w-64 mt-3 sm:mt-0" data-aos="zoom-in-up"
                            data-aos-delay="260">
                            <div
                                class="rounded-2xl border border-slate-200 dark:border-slate-800 shadow-lg p-4 bg-white/90 dark:bg-[#0b1220]/85 backdrop-blur">
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
    </div>

    <!-- subtle divider -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-4" data-aos="fade-in">
        <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-800">
        </div>
    </div>
</section>
