    <div id="leadgen-hero" x-data="leadGenHero()" x-init="init()"
        class="relative overflow-hidden isolate bg-white dark:bg-[#0b1220]">

        <!-- Decorative gradient blobs (GPU-accelerated) -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-24 -left-20 h-72 w-72 rounded-full blur-3xl opacity-40 dark:opacity-30"
                style="background: radial-gradient(50% 50% at 50% 50%, rgba(59,130,246,.35) 0%, rgba(59,130,246,0) 70%);">
            </div>
            <div class="absolute -bottom-24 -right-20 h-80 w-80 rounded-full blur-3xl opacity-40 dark:opacity-30"
                style="background: radial-gradient(50% 50% at 50% 50%, rgba(236,72,153,.35) 0%, rgba(236,72,153,0) 70%);">
            </div>
        </div>

        <!-- Container -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-20 pb-14 md:pt-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                <!-- Left: Copy -->
                <div class="lg:col-span-7 order-2 lg:order-1 reveal">
                    <p
                        class="inline-flex items-center gap-2 text-xs md:text-sm font-semibold tracking-wide uppercase text-sky-600 dark:text-sky-300">
                        <span class="i-dot w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                        Lead Generation • Cold Email Marketing
                    </p>

                    <h1
                        class="mt-3 text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-slate-900 dark:text-white">
                        Grow with <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-fuchsia-500">Targeted
                            Leads</span>
                        & Conversion‑Ready <span class="whitespace-nowrap">Cold Emails</span>
                    </h1>

                    <p class="mt-4 max-w-2xl text-base md:text-lg text-slate-600 dark:text-slate-300">
                        We design <strong>ROI-first lead generation</strong> systems and run
                        <strong>inbox‑safe cold email campaigns</strong> that open conversations with your best‑fit
                        buyers.
                        Zero fluff—just measurable pipeline growth.
                    </p>

                    <!-- Benefit bullets -->
                    <ul class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3 text-slate-700 dark:text-slate-200">
                        <li class="flex items-start gap-3">
                            <span
                                class="mt-1 inline-block w-5 h-5 rounded-full bg-sky-500/10 ring-1 ring-sky-500/30 flex items-center justify-center"><svg
                                    class="w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3">
                                    <path d="m20 6-11 11-5-5" />
                                </svg></span>
                            High‑intent ICP lists (hand‑curated + verified)
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="mt-1 inline-block w-5 h-5 rounded-full bg-sky-500/10 ring-1 ring-sky-500/30 flex items-center justify-center"><svg
                                    class="w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3">
                                    <path d="m20 6-11 11-5-5" />
                                </svg></span>
                            Deliverability‑first cold email warmup & routing
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="mt-1 inline-block w-5 h-5 rounded-full bg-sky-500/10 ring-1 ring-sky-500/30 flex items-center justify-center"><svg
                                    class="w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3">
                                    <path d="m20 6-11 11-5-5" />
                                </svg></span>
                            Multi‑touch sequences that feel human
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="mt-1 inline-block w-5 h-5 rounded-full bg-sky-500/10 ring-1 ring-sky-500/30 flex items-center justify-center"><svg
                                    class="w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3">
                                    <path d="m20 6-11 11-5-5" />
                                </svg></span>
                            Transparent reporting: replies, meetings, revenue
                        </li>
                    </ul>

                    <!-- CTAs -->
                    <div class="mt-8 flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="#lead-form" @mousemove="ripple($event)"
                            class="ripple inline-flex items-center justify-center px-6 py-3 rounded-xl bg-sky-600 text-white font-semibold shadow hover:shadow-lg hover:bg-sky-700 transition focus:outline-none focus:ring-4 focus:ring-sky-300 dark:focus:ring-sky-800">
                            Get Your Free Action Plan
                        </a>
                        <a href="#how-it-works"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-slate-300 dark:border-slate-700 text-slate-800 dark:text-slate-100 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition">
                            See How It Works
                        </a>
                    </div>

                    <!-- Trust strip -->
                    <div class="mt-8 flex flex-wrap items-center gap-6 opacity-80">
                        <img class="h-8 md:h-10" loading="lazy" src="/logos/top-seo.svg" alt="Top B2B Lead Gen" />
                        <img class="h-8 md:h-10" loading="lazy" src="/logos/top-ppc.svg" alt="Email Marketing Award" />
                        <img class="h-8 md:h-10" loading="lazy" src="/logos/singular.svg"
                            alt="Trusted by 100+ brands" />
                    </div>
                </div>

                <!-- Right: Carded form + mini feature chips -->
                <div class="lg:col-span-5 order-1 lg:order-2 reveal">
                    <div id="lead-form"
                        class="relative rounded-2xl p-5 sm:p-6 lg:p-8 bg-gradient-to-b from-sky-500 to-sky-600 dark:from-sky-700 dark:to-sky-800 shadow-xl ring-1 ring-white/10">
                        <h2 class="text-white font-semibold text-xl md:text-2xl text-center">Get a Free Lead Gen Plan
                        </h2>
                        <p class="mt-1 text-sky-100 text-center text-sm">We’ll audit ICP, messaging & deliverability
                            within 24–48h.</p>

                        <form class="mt-5 grid grid-cols-1 gap-3" @submit.prevent="submit()">
                            <label class="block">
                                <span class="text-white/90 text-sm font-medium">Your Name</span>
                                <input type="text" x-model="form.name" required placeholder="Jane Miller"
                                    class="mt-1 w-full rounded-lg border-0 px-4 py-2.5 text-slate-900 focus:ring-2 focus:ring-sky-300" />
                            </label>
                            <label class="block">
                                <span class="text-white/90 text-sm font-medium">Work Email</span>
                                <input type="email" x-model="form.email" required placeholder="jane@company.com"
                                    class="mt-1 w-full rounded-lg border-0 px-4 py-2.5 text-slate-900 focus:ring-2 focus:ring-sky-300" />
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <label class="block">
                                    <span class="text-white/90 text-sm font-medium">Website</span>
                                    <input type="url" x-model="form.site" placeholder="https://yourdomain.com"
                                        class="mt-1 w-full rounded-lg border-0 px-4 py-2.5 text-slate-900 focus:ring-2 focus:ring-sky-300" />
                                </label>
                                <label class="block">
                                    <span class="text-white/90 text-sm font-medium">Monthly Lead Goal</span>
                                    <input type="number" min="1" x-model="form.goal" placeholder="50"
                                        class="mt-1 w-full rounded-lg border-0 px-4 py-2.5 text-slate-900 focus:ring-2 focus:ring-sky-300" />
                                </label>
                            </div>
                            <label class="block">
                                <span class="text-white/90 text-sm font-medium">Ideal Customer Profile</span>
                                <textarea rows="3" x-model="form.icp" placeholder="Industry, title, geo, ACV…"
                                    class="mt-1 w-full rounded-lg border-0 px-4 py-2.5 text-slate-900 focus:ring-2 focus:ring-sky-300"></textarea>
                            </label>

                            <button type="submit" @mousemove="ripple($event)" :disabled="submitting"
                                class="ripple mt-1 inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white text-slate-900 font-semibold shadow hover:shadow-lg hover:bg-slate-50 transition disabled:opacity-60">
                                <svg x-show="!submitting" class="w-5" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M22 2L11 13" />
                                    <path d="M22 2l-7 20-4-9-9-4 20-7Z" />
                                </svg>
                                <svg x-show="submitting" class="w-5 animate-spin" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" class="opacity-25" />
                                    <path d="M4 12a8 8 0 0 1 8-8" />
                                </svg>
                                <span x-text="submitting ? 'Sending…' : 'Send My Plan'"></span>
                            </button>
                            <p class="text-xs text-sky-100/90 text-center">We hate spam. Unsubscribe anytime.</p>
                        </form>

                        
                        <!-- Floating chips (slightly shifted; no overlap; non-interactive) -->
                        <div class="hidden md:block pointer-events-none select-none" aria-hidden="true">
                            <div class="floating-chip -left-20 top-[22%]">Lead Quality ↑</div>
                            <div class="floating-chip -right-20 top-[12%]">Open Rate 60%+</div>
                            <div class="floating-chip -right-20 bottom-[18%]">Reply Rate 8–15%</div>
                        </div>

                    </div>

                    <!-- Two feature cards to match the reference image -->
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <article
                            class="rounded-2xl bg-white dark:bg-slate-900 shadow ring-1 ring-slate-200/70 dark:ring-slate-800/70 p-4 reveal">
                            <h3 class="text-xs font-bold text-sky-600">LEAD</h3>
                            <h4 class="text-lg font-extrabold text-slate-900 dark:text-white">GENERATION</h4>
                            <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Find & prioritize perfect
                                prospects. Grow faster with intent‑driven lists.</p>
                        </article>
                        <article
                            class="rounded-2xl bg-white dark:bg-slate-900 shadow ring-1 ring-slate-200/70 dark:ring-slate-800/70 p-4 reveal delay-200">
                            <h3 class="text-xs font-bold text-slate-900 dark:text-white">COLD EMAIL</h3>
                            <h4 class="text-lg font-extrabold text-amber-500">MARKETING</h4>
                            <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">Reach decision‑makers directly.
                                Generate qualified meetings.</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>

        <!-- How it works (SEO content fold) -->
        <div id="how-it-works" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16">
            <div class="mt-4 grid md:grid-cols-3 gap-6">
                <div class="step reveal">
                    <div class="step-num">1</div>
                    <h3 class="step-title">ICP & Data Enrichment</h3>
                    <p class="step-text">We profile your ideal buyers, then enrich with verified emails, firmographics,
                        tech‑stack and triggers.</p>
                </div>
                <div class="step reveal delay-150">
                    <div class="step-num">2</div>
                    <h3 class="step-title">Deliverability & Warmup</h3>
                    <p class="step-text">Custom domains, DNS (SPF, DKIM, DMARC), rotation & warmup to land in
                        Primary—never spam.</p>
                </div>
                <div class="step reveal delay-300">
                    <div class="step-num">3</div>
                    <h3 class="step-title">Human‑First Sequencing</h3>
                    <p class="step-text">Short, relevant, value‑led emails + soft CTAs. Multithreaded follow‑ups that
                        feel like real people.</p>
                </div>
            </div>
        </div>

        <!-- Minimal CSS for animation + ripple (inline for speed) -->
        <style>
            #leadgen-hero .reveal {
                opacity: 0;
                transform: translateY(14px);
                will-change: transform, opacity
            }

            #leadgen-hero .reveal.show {
                opacity: 1;
                transform: none;
                transition: all .7s cubic-bezier(.21, 1, .21, 1)
            }

            #leadgen-hero .reveal.delay-150 {
                transition-delay: .15s
            }

            #leadgen-hero .reveal.delay-200 {
                transition-delay: .2s
            }

            #leadgen-hero .reveal.delay-300 {
                transition-delay: .3s
            }

            .floating-chip {
                position: absolute;
                background: rgba(255, 255, 255, .9);
                color: #0f172a;
                padding: .5rem .7rem;
                border-radius: 9999px;
                box-shadow: 0 10px 25px rgba(2, 10, 28, .15);
                font-size: .75rem;
                font-weight: 700
            }

            @media (prefers-color-scheme:dark) {
                .floating-chip {
                    background: rgba(15, 23, 42, .85);
                    color: #e2e8f0
                }
            }

            .step {
                border-radius: 1rem;
                padding: 1rem;
                background: linear-gradient(180deg, rgba(241, 245, 249, .7), rgba(241, 245, 249, 0));
                border: 1px solid rgba(203, 213, 225, .6)
            }

            .dark .step {
                background: linear-gradient(180deg, rgba(15, 23, 42, .55), rgba(15, 23, 42, 0));
                border-color: rgba(51, 65, 85, .6)
            }

            .step-num {
                width: 2rem;
                height: 2rem;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 9999px;
                background: rgba(56, 189, 248, .15);
                color: #0369a1;
                font-weight: 800
            }

            .step-title {
                margin-top: .6rem;
                font-weight: 800;
                color: #0f172a
            }

            .dark .step-title {
                color: #fff
            }

            .step-text {
                margin-top: .25rem;
                color: #334155
            }

            .dark .step-text {
                color: #cbd5e1
            }

            .ripple {
                position: relative;
                overflow: hidden
            }

            .ripple:after {
                content: "";
                position: absolute;
                width: 0;
                height: 0;
                border-radius: 9999px;
                background: rgba(255, 255, 255, .35);
                transform: translate(-50%, -50%);
                pointer-events: none;
                opacity: 0
            }

            .ripple.active:after {
                opacity: 1;
                width: 220px;
                height: 220px;
                transition: width .45s ease, height .45s ease, opacity .8s ease;
                opacity: 0
            }
        </style>

        <!-- Alpine component -->
        <script>
            function leadGenHero() {
                return {
                    submitting: false,
                    form: {
                        name: '',
                        email: '',
                        site: '',
                        goal: '',
                        icp: ''
                    },
                    init() {
                        const obs = new IntersectionObserver((ents) => {
                            ents.forEach(e => {
                                if (e.isIntersecting) {
                                    e.target.classList.add('show');
                                    obs.unobserve(e.target);
                                }
                            });
                        }, {
                            threshold: .16
                        });
                        document.querySelectorAll('#leadgen-hero .reveal').forEach(el => obs.observe(el));
                    },
                    ripple(e) {
                        const t = e.currentTarget;
                        const r = t.getBoundingClientRect();
                        t.style.setProperty('--x', (e.clientX - r.left) + 'px');
                        t.style.setProperty('--y', (e.clientY - r.top) + 'px');
                        t.classList.remove('active');
                        void t.offsetWidth;
                        t.classList.add('active');
                    },
                    async submit() {
                        this.submitting = true; // TODO: wire to backend or Livewire/Axios
                        await new Promise(res => setTimeout(res, 900));
                        this.submitting = false;
                        alert('Thanks! We\'ll send your free plan shortly.');
                    }
                }
            }
        </script>

        <!-- SEO: JSON-LD for FAQ (inline, adjust Q/A as needed) -->
        <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is lead generation?",
        "acceptedAnswer": {"@type": "Answer","text": "Lead generation is the process of identifying and qualifying potential buyers for your product or service. We focus on ICP definition, data enrichment and compliant outreach to book meetings."}
      },
      {
        "@type": "Question",
        "name": "Is cold email marketing legal and safe?",
        "acceptedAnswer": {"@type": "Answer","text": "Yes, when done with consent best-practices (legitimate interest, opt-outs) and strong deliverability (SPF/DKIM/DMARC, warmup, rotation). Our emails are short, relevant and respectful."}
      }
    ]
  }
  </script>
    </div>
