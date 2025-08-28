{{-- resources/views/components/sections/leadgen-coldemail.blade.php --}}
<section id="leadgen-coldemail" class="relative overflow-hidden bg-white dark:bg-[#0b1220]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16" data-lc-root>
        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- LEFT: Text content --}}
            <div>
                <header data-aos="fade-right">
                    <p class="inline-block tracking-wide uppercase text-[13px] font-semibold text-[#2ca8d9]">
                        Lead Gen • Cold Email
                    </p>
                    <h2
                        class="mt-2 font-extrabold leading-tight text-slate-900 dark:text-white
                     [letter-spacing:-.015em] text-[clamp(2rem,3.2vw,3.25rem)]">
                        Predictable Pipeline,
                        <span class="relative inline-block px-1">
                            <span class="absolute inset-x-0 bottom-0 h-3 bg-cyan-400/25 rounded"></span>
                            <span class="relative">Real Revenue</span>
                        </span>
                    </h2>
                    <p class="mt-4 text-slate-600 dark:text-slate-300 text-lg">
                        Tired of sending emails that never get replies?
                        We build <strong>lead generation campaigns</strong> that actually feel human.
                        Clean lists, safe deliverability (SPF/DKIM/DMARC), and simple messages that land in the inbox—so
                        you get real conversations, not spam complaints.
                    </p>
                </header>

                {{-- STEPS: vertical timeline --}}
                <ol class="mt-10 space-y-8 border-l border-slate-200 dark:border-white/10 pl-6" data-aos="fade-up"
                    data-aos-delay="100">
                    @foreach ([['Laser-targeted Lead Gen', 'We start with clarity: who you want to reach, why they care, and when they’re ready. That means verified decision-makers—not random emails.'], ['Inbox-first Cold Email', 'Inbox over spam, always. Sub-domains, safe warm-up, and daily health checks keep your sender reputation strong.'], ['Personalized Cadences', 'No templates. Every sequence has 4–7 touches, timezone-aware follow-ups, and opening lines that sound personal.'], ['Analytics & Handoff', 'We track replies, meetings, and pipeline value. Everything syncs neatly to your CRM—HubSpot, Salesforce, Pipedrive—so scaling feels easy.']] as $i => $row)
                        <li
                            class="relative sm:pl-6
                       grid grid-cols-[2.25rem_1fr] sm:block items-start gap-3">
                            <!-- dot -->
                            <div
                                class="col-start-1 row-start-1 sm:absolute sm:-left-[1.15rem] sm:top-0
                          h-7 w-7 sm:h-7 sm:w-7 rounded-full grid place-items-center
                          font-extrabold text-white text-[0.85rem]
                          bg-cyan-500 shadow-[0_6px_18px_rgba(14,165,233,.35)]">
                                {{ $i + 1 }}
                            </div>
                            <div class="col-start-2 sm:col-start-auto">
                                <h3 class="font-bold text-slate-900 dark:text-white">{{ $row[0] }}</h3>
                                <p class="mt-1 text-slate-600 dark:text-slate-400">{{ $row[1] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>

                {{-- METRICS + CTA --}}
                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <div class="rounded-xl border border-slate-300/35 bg-white shadow
                      px-4 py-3 dark:bg-slate-900 dark:border-white/10"
                        data-aos="zoom-in">
                        <div class="text-3xl font-extrabold text-slate-900 dark:text-white">
                            <span class="count" data-target="18">0</span>%
                        </div>
                        <div class="text-[.82rem] text-slate-500 dark:text-slate-400">Avg. Reply Rate</div>
                    </div>

                    <div class="rounded-xl border border-slate-300/35 bg-white shadow
                      px-4 py-3 dark:bg-slate-900 dark:border-white/10"
                        data-aos="zoom-in" data-aos-delay="80">
                        <div class="text-3xl font-extrabold text-slate-900 dark:text-white">~<span class="count"
                                data-target="120">0</span></div>
                        <div class="text-[.82rem] text-slate-500 dark:text-slate-400">Qualified Leads / Month</div>
                    </div>

                    <div class="grow"></div>

                    <a href="/contact"
                        class="inline-flex items-center gap-2 rounded-xl bg-[#2ca8d9] px-5 py-3 text-white font-extrabold
                    shadow-[0_10px_26px_rgba(44,168,217,.35)] transition
                    hover:-translate-y-0.5 hover:shadow-[0_18px_36px_rgba(44,168,217,.5)]
                    active:scale-95 focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800"
                        data-aos="fade-up" data-aos-delay="140">
                        Show Me My Lead Plan
                    </a>
                </div>
            </div>

            {{-- RIGHT: Sticky preview + Accordion --}}
            <aside class="lg:sticky lg:top-20">
                <!-- Preview card -->
                <figure
                    class="group relative overflow-hidden rounded-2xl border border-slate-900/10 bg-gradient-to-b from-white to-slate-50 shadow-2xl
                       dark:from-slate-900 dark:to-[#0b1220] dark:border-white/10"
                    data-aos="fade-left">
                    <img class="block w-full h-auto object-cover min-h-[260px]" loading="lazy" decoding="async"
                        width="1200" height="800" alt="Lead Generation & Cold Email Campaign Preview"
                        src="data:image/svg+xml;utf8,<?xml version='1.0' encoding='UTF-8'?><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 1000'><defs><linearGradient id='g' x1='0' y1='0' x2='1' y2='1'><stop stop-color='%23e6f7fd' offset='0%25'/><stop stop-color='%23f1f5f9' offset='100%25'/></linearGradient></defs><rect fill='url(%23g)' width='1600' height='1000'/><g opacity='0.6'><circle cx='1400' cy='-50' r='300' fill='%232ca8d9'/><circle cx='0' cy='900' r='260' fill='%23a5f3fc'/></g><text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-family='Inter,system-ui,Segoe UI,Roboto,Helvetica,Arial,sans-serif' font-size='48' fill='%23475569'>Lead Gen Preview</text><text x='50%25' y='58%25' dominant-baseline='middle' text-anchor='middle' font-family='Inter,system-ui,Segoe UI,Roboto,Helvetica,Arial,sans-serif' font-size='28' fill='%23647589'>Replace with real screenshot</text></svg>">
                    <!-- Shine -->
                    <div
                        class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out
                      bg-gradient-to-tr from-transparent via-white/40 to-transparent opacity-40">
                    </div>
                    <figcaption class="sr-only">Lead Generation & Cold Email Marketing</figcaption>
                    <div
                        class="absolute right-2 bottom-2 text-[.72rem] font-bold px-2 py-1.5 rounded bg-white text-slate-900 border border-black/10
                      dark:bg-slate-900 dark:text-slate-200 dark:border-white/10">
                        Domain warm-up ✓
                    </div>
                </figure>

                <!-- Accordion -->
                <div class="mt-8 space-y-3" aria-label="Leadgen process breakdown">
                    @php
                        $steps = [
                            [
                                'ICP Research & List Building',
                                'We define your Ideal Customer Profile, then hand-pick prospects who fit. Every email is verified and enriched with role, tech stack, revenue band, and trigger events—so outreach feels relevant, not random.',
                            ],
                            [
                                'Deliverability Setup',
                                'Inbox first, spam never. We configure SPF/DKIM/DMARC, set up sub-domains, warm up inboxes, and run seed tests. Your reputation stays clean and safe.',
                            ],
                            [
                                'Copy & Cadence',
                                'People reply to people—not robots. We craft short, personal copy with clear value. A/B test subjects and CTAs, adjust send times, and follow up respectfully.',
                            ],
                            [
                                'Compliance & Opt-out',
                                'We play by the rules. Clear identity, easy opt-out, and automatic suppression of bounces or complainers keep your brand trusted and campaigns compliant.',
                            ],
                            [
                                'CRM & Analytics',
                                'Every reply, meeting, and deal is tracked. We sync cleanly to HubSpot, Salesforce, or Pipedrive—so your sales team can act fast and scale smoothly.',
                            ],
                        ];
                    @endphp

                    @foreach ($steps as $i => $s)
                        <details
                            class="group border border-slate-300/35 rounded-xl bg-white overflow-hidden
                            dark:bg-slate-900 dark:border-white/10"
                            {{ $i === 0 ? 'open' : '' }} data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                            <summary
                                class="flex items-center justify-between gap-2 px-4 py-3 font-bold text-slate-900 dark:text-slate-100 cursor-pointer select-none focus:outline-none">
                                <span>{{ $s[0] }}</span>
                                <svg class="h-4 w-4 transition-transform duration-300 group-open:rotate-180"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="border-t border-slate-200 dark:border-white/10">
                                <div class="px-4 py-3 text-slate-600 dark:text-slate-400">{{ $s[1] }}</div>
                            </div>
                        </details>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>

    {{-- Lightweight JS: counters --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            const counters = document.querySelectorAll('#leadgen-coldemail .count');
            if (!counters.length) return;

            const io = new IntersectionObserver((ents) => {
                ents.forEach(ent => {
                    if (!ent.isIntersecting) return;
                    const el = ent.target,
                        target = +el.dataset.target || 0;
                    const dur = prefersReduced ? 0 : 900,
                        t0 = performance.now();

                    function tick(t) {
                        const p = dur ? Math.min((t - t0) / dur, 1) : 1;
                        el.textContent = Math.floor(target * p);
                        if (p < 1) requestAnimationFrame(tick);
                    }
                    requestAnimationFrame(tick);
                    io.unobserve(el);
                });
            }, {
                threshold: .35
            });

            counters.forEach(c => io.observe(c));
        });
    </script>
</section>
