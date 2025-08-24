{{-- resources/views/components/sections/leadgen-coldemail.blade.php --}}
<section id="leadgen-coldemail" class="relative overflow-hidden bg-white dark:bg-[#0b1220]">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16" data-lc-root>
        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- LEFT: Text content --}}
            <div>
                <header class="reveal-left">
                    <p class="inline-block tracking-wide uppercase text-[13px] font-semibold text-[#2ca8d9]">Lead Gen •
                        Cold Email</p>
                    <h2 class="mt-2 font-extrabold leading-tight text-slate-900 dark:text-white"
                        style="font-size:clamp(2rem,3.2vw,3.25rem); letter-spacing:-.015em;">
                        Predictable Pipeline, <span class="underline-accent">Real Revenue</span>
                    </h2>
                    <p class="mt-4 text-slate-600 dark:text-slate-300 text-lg">
                        ROI-first <strong>lead generation</strong> with <strong>deliverability-safe cold email</strong>.
                        We research ICP, build clean lists, set up infra (SPF/DKIM/DMARC), and craft sequences that
                        actually get replies.
                    </p>
                </header>

                {{-- STEPS: vertical timeline --}}
                <ol class="mt-10 space-y-8 border-l border-slate-200 dark:border-white/10 pl-6">
                    @foreach ([['Laser-targeted Lead Gen', 'ICP → intent → technographics. Clean, verified emails.'], ['Inbox-first Cold Email', 'Setup that lands: sub-domains, warm-up, seed tests.'], ['Personalized Cadences', '4–7 touches, timezone aware, first-line personalization.'], ['Analytics & Handoff', 'Replies, meetings, revenue. CRM sync to HubSpot/Salesforce.']] as $i => $row)
                        <li class="reveal-step">
                            <div class="step-dot" aria-hidden="true">{{ $i + 1 }}</div>
                            <h3 class="step-title ml-3">{{ $row[0] }}</h3>
                            <p class="step-desc">{{ $row[1] }}</p>
                        </li>
                    @endforeach
                </ol>

                {{-- METRICS + CTA --}}
                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <div class="kpi reveal-up">
                        <div class="kpi-value"><span class="count" data-target="18">0</span>%</div>
                        <div class="kpi-label">Avg. Reply Rate</div>
                    </div>
                    <div class="kpi reveal-up">
                        <div class="kpi-value">~<span class="count" data-target="120">0</span></div>
                        <div class="kpi-label">Qualified Leads / Month</div>
                    </div>

                    <div class="grow"></div>

                    <a href="#contact" class="btn-primary ripple reveal-up">Get a Lead Plan</a>
                </div>
            </div>

            {{-- RIGHT: Sticky preview + Accordion --}}
            <aside class="lg:sticky lg:top-20">
                <figure class="preview-card tilt reveal-right" data-tilt>
                    <img class="preview-img" loading="lazy" decoding="async" width="1200" height="800"
                        alt="Lead Gen & Cold Email (placeholder)"
                        src="data:image/svg+xml;utf8,
    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1600 1000'>
      <defs>
        <linearGradient id='g' x1='0' y1='0' x2='1' y2='1'>
          <stop stop-color='%23e6f7fd' offset='0%25'/>
          <stop stop-color='%23f1f5f9' offset='100%25'/>
        </linearGradient>
      </defs>
      <rect fill='url(%23g)' width='1600' height='1000'/>
      <g opacity='0.6'>
        <circle cx='1400' cy='-50' r='300' fill='%232ca8d9'/>
        <circle cx='0' cy='900' r='260' fill='%23a5f3fc'/>
      </g>
      <text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle'
            font-family='Inter,system-ui,Segoe UI,Roboto,Helvetica,Arial,sans-serif'
            font-size='48' fill='%23475569'>Lead Gen Preview</text>
      <text x='50%25' y='58%25' dominant-baseline='middle' text-anchor='middle'
            font-family='Inter,system-ui,Segoe UI,Roboto,Helvetica,Arial,sans-serif'
            font-size='28' fill='%23647589'>Dummy image (replace later)</text>
    </svg>" />
                    <figcaption class="sr-only">Lead Generation & Cold Email Marketing</figcaption>
                    <div class="shine" aria-hidden="true"></div>
                    <div class="preview-note">Domain warm-up ✓</div>
                </figure>

                {{-- Native details/summary accordion --}}
                <div class="mt-8 space-y-3" aria-label="Leadgen process breakdown">
                    @php
                        $steps = [
                            [
                                'ICP Research & List Building',
                                'Define ICP (firmographics, technographics & intent). Verify contacts (syntax + MX + catch-all) and enrich.',
                            ],
                            [
                                'Deliverability Setup',
                                'Sub-domains, DMARC/SPF/DKIM, tracking domain, warm-up, seed tests, spam checks.',
                            ],
                            [
                                'Copy & Cadence',
                                'First-line personalization, value-forward angles. A/B subject, CTA, send windows.',
                            ],
                            [
                                'Compliance & Opt-out',
                                'Clear identity, easy opt-out. Auto-suppress bounces/complainers.',
                            ],
                            ['CRM & Analytics', 'Pipe to CRM, route meetings, attribute revenue.'],
                        ];
                    @endphp

                    @foreach ($steps as $i => $s)
                        <details class="acc-item reveal-up" {{ $i === 0 ? 'open' : '' }}>
                            <summary class="acc-btn">
                                <span>{{ $s[0] }}</span>
                                <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="acc-panel">
                                <div class="acc-body">{{ $s[1] }}</div>
                            </div>
                        </details>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>

    {{-- Scoped Styles --}}
    <style>
        #leadgen-coldemail {
            --brand: #2ca8d9;
            --ink: #0f172a;
            --muted: #475569;
        }

        /* underline accent */
        #leadgen-coldemail .underline-accent {
            background: linear-gradient(0deg, transparent 60%, rgba(44, 168, 217, .22) 60%);
            padding-bottom: .1em;
        }

        /* === Timeline (desktop default) === */
        #leadgen-coldemail .reveal-step {
            position: relative;
            padding-left: .25rem;
        }

        #leadgen-coldemail .step-dot {
            position: absolute;
            left: -1.1rem;
            top: .1rem;
            height: 1.7rem;
            width: 1.7rem;
            border-radius: 9999px;
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: .85rem;
            color: #fff;
            background: var(--brand);
            box-shadow: 0 6px 18px rgba(44, 168, 217, .35);
        }

        #leadgen-coldemail .step-title {
            font-weight: 700;
            color: var(--ink);
        }

        .dark #leadgen-coldemail .step-title {
            color: #fff;
        }

        #leadgen-coldemail .step-desc {
            color: var(--muted);
        }

        .dark #leadgen-coldemail .step-desc {
            color: #94a3b8;
        }

        /* === Mobile fixes (prevent overlap, better layout) === */
        @media (max-width:640px) {
            #leadgen-coldemail ol {
                padding-left: .75rem !important;
            }

            /* smaller indent than pl-6 */
            #leadgen-coldemail ol li.reveal-step {
                display: grid !important;
                grid-template-columns: 2.25rem 1fr;
                /* dot + content */
                column-gap: .75rem;
                align-items: start;
                padding-left: 0 !important;
                margin-left: 0 !important;
            }

            #leadgen-coldemail .step-dot {
                position: static !important;
                transform: none !important;
                width: 2rem;
                height: 2rem;
                line-height: 2rem;
                text-align: center;
                font-size: .95rem;
                border: 2px solid rgba(255, 255, 255, .65);
                background: radial-gradient(circle at 30% 30%, var(--brand) 0%, var(--brand) 60%, #1f8cb6 100%);
                justify-self: center;
                align-self: start;
                margin-left: -1.1rem;
                /* pull a bit into the border line */
                box-shadow: 0 6px 20px rgba(44, 168, 217, .45);
            }

            .dark #leadgen-coldemail .step-dot {
                border-color: rgba(255, 255, 255, .45);
            }

            #leadgen-coldemail .step-title {
                grid-column: 2;
                margin: 0;
            }

            #leadgen-coldemail .step-desc {
                grid-column: 2;
                margin: .25rem 0 0 0;
            }

            #leadgen-coldemail ol li.reveal-step+li.reveal-step {
                margin-top: 1.1rem;
            }
        }

        /* KPI */
        #leadgen-coldemail .kpi {
            border: 1px solid rgba(148, 163, 184, .35);
            border-radius: 14px;
            padding: .9rem 1.1rem;
            background: #fff;
            box-shadow: 0 8px 22px rgba(2, 6, 23, .08);
        }

        .dark #leadgen-coldemail .kpi {
            background: #0f172a;
            border-color: rgba(255, 255, 255, .1);
        }

        #leadgen-coldemail .kpi-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--ink);
        }

        .dark #leadgen-coldemail .kpi-value {
            color: #fff;
        }

        #leadgen-coldemail .kpi-label {
            font-size: .82rem;
            color: #64748b;
        }

        .dark #leadgen-coldemail .kpi-label {
            color: #9ca3af;
        }

        /* Buttons */
        #leadgen-coldemail .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .95rem 1.25rem;
            border-radius: 12px;
            background: var(--brand);
            color: #fff;
            font-weight: 800;
            box-shadow: 0 10px 26px rgba(44, 168, 217, .35);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        #leadgen-coldemail .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px rgba(44, 168, 217, .5);
        }

        /* Preview card */
        #leadgen-coldemail .preview-card {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            background: linear-gradient(180deg, #ffffff, #fafafa);
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 18px 60px rgba(2, 6, 23, .12);
        }

        .dark #leadgen-coldemail .preview-card {
            background: linear-gradient(180deg, #0f172a, #0b1220);
            border-color: rgba(255, 255, 255, .08);
            box-shadow: 0 20px 66px rgba(0, 0, 0, .55);
        }

        #leadgen-coldemail .preview-img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
            min-height: 260px;
        }

        #leadgen-coldemail .preview-note {
            position: absolute;
            right: .8rem;
            bottom: .8rem;
            font-size: .72rem;
            font-weight: 700;
            padding: .35rem .55rem;
            border-radius: .65rem;
            background: #fff;
            color: #0f172a;
            border: 1px solid rgba(0, 0, 0, .06);
        }

        .dark #leadgen-coldemail .preview-note {
            background: #111827;
            color: #e5e7eb;
            border-color: rgba(255, 255, 255, .08);
        }

        #leadgen-coldemail .shine {
            position: absolute;
            inset: 0;
            background: linear-gradient(75deg, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, .4) 40%, rgba(255, 255, 255, 0) 60%);
            transform: translateX(-120%);
            pointer-events: none;
            opacity: .35;
        }

        #leadgen-coldemail .preview-card:hover .shine {
            animation: shine 1400ms ease;
        }

        /* Accordion (details/summary) */
        #leadgen-coldemail .acc-item {
            border: 1px solid rgba(148, 163, 184, .35);
            border-radius: 14px;
            background: #fff;
            overflow: hidden;
        }

        .dark #leadgen-coldemail .acc-item {
            background: #0f172a;
            border-color: rgba(255, 255, 255, .1);
        }

        #leadgen-coldemail .acc-item>summary::-webkit-details-marker {
            display: none;
        }

        #leadgen-coldemail .acc-btn {
            list-style: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            padding: .9rem 1rem;
            font-weight: 700;
            color: #0f172a;
            outline: none;
        }

        .dark #leadgen-coldemail .acc-btn {
            color: #e5e7eb;
        }

        #leadgen-coldemail .chev {
            height: 1rem;
            width: 1rem;
            transition: transform .3s ease;
        }

        #leadgen-coldemail details[open] .chev {
            transform: rotate(180deg);
        }

        #leadgen-coldemail .acc-panel {
            border-top: 1px solid rgba(148, 163, 184, .25);
        }

        .dark #leadgen-coldemail .acc-panel {
            border-color: rgba(255, 255, 255, .08);
        }

        #leadgen-coldemail .acc-body {
            padding: .9rem 1rem;
            color: #475569;
        }

        .dark #leadgen-coldemail .acc-body {
            color: #94a3b8;
        }

        /* Animations */
        #leadgen-coldemail .reveal-left {
            opacity: 0;
            transform: translateX(-24px);
            transition: opacity .6s, transform .6s;
        }

        #leadgen-coldemail .reveal-right {
            opacity: 0;
            transform: translateX(24px);
            transition: opacity .6s, transform .6s;
        }

        #leadgen-coldemail .reveal-up {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .6s, transform .6s;
        }

        #leadgen-coldemail .visible {
            opacity: 1;
            transform: none;
        }

        #leadgen-coldemail .tilt {
            transform-style: preserve-3d;
            transition: transform .15s ease;
        }

        #leadgen-coldemail .ripple {
            position: relative;
            overflow: hidden;
        }

        #leadgen-coldemail .ripple:after {
            content: "";
            position: absolute;
            inset: auto;
            width: 0;
            height: 0;
            border-radius: 9999px;
            background: rgba(255, 255, 255, .35);
            transform: translate(-50%, -50%);
            pointer-events: none;
            opacity: 0;
        }

        #leadgen-coldemail .ripple:active:after {
            left: var(--x);
            top: var(--y);
            opacity: 1;
            width: 220px;
            height: 220px;
            transition: width .45s, height .45s, opacity .9s;
            opacity: 0;
        }

        @keyframes shine {
            0% {
                transform: translateX(-120%)
            }

            100% {
                transform: translateX(120%)
            }
        }
    </style>

    {{-- Scoped Scripts (no JS for accordion; rest unchanged) --}}
    <script>
        (function() {
            const root = document.querySelector('#leadgen-coldemail [data-lc-root]');
            if (!root) return;
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            // ripple coords
            root.querySelectorAll('.ripple').forEach(btn => {
                btn.addEventListener('pointerdown', e => {
                    const r = btn.getBoundingClientRect();
                    btn.style.setProperty('--x', (e.clientX - r.left) + 'px');
                    btn.style.setProperty('--y', (e.clientY - r.top) + 'px');
                }, {
                    passive: true
                });
            });

            // intersection reveals
            const IO = new IntersectionObserver((ents) => {
                ents.forEach(ent => {
                    if (ent.isIntersecting) {
                        ent.target.classList.add('visible');
                        IO.unobserve(ent.target);
                    }
                });
            }, {
                threshold: .2
            });
            ['.reveal-left', '.reveal-right', '.reveal-up', '.reveal-step', '.kpi', '.tilt'].forEach(sel => {
                root.querySelectorAll(sel).forEach(el => prefersReduced ? el.classList.add('visible') : IO
                    .observe(el));
            });

            // count up
            const counters = root.querySelectorAll('.count');
            const run = el => {
                const target = +el.dataset.target || 0;
                const start = performance.now(),
                    dur = prefersReduced ? 0 : 900;
                const step = t => {
                    const p = dur ? Math.min((t - start) / dur, 1) : 1;
                    el.textContent = Math.floor(target * p);
                    if (p < 1) requestAnimationFrame(step);
                };
                requestAnimationFrame(step);
            };
            const CO = new IntersectionObserver(ents => {
                ents.forEach(ent => {
                    if (ent.isIntersecting) {
                        run(ent.target);
                        CO.unobserve(ent.target);
                    }
                });
            }, {
                threshold: .3
            });
            counters.forEach(c => CO.observe(c));

            // subtle tilt (no lib)
            if (!prefersReduced) {
                const clamp = (n, min, max) => Math.max(min, Math.min(n, max));
                root.querySelectorAll('[data-tilt]').forEach(card => {
                    let raf = null;
                    const move = e => {
                        const r = card.getBoundingClientRect();
                        const x = (e.clientX - r.left) / r.width - .5,
                            y = (e.clientY - r.top) / r.height - .5;
                        const rx = clamp(-y * 4, -6, 6),
                            ry = clamp(x * 4, -6, 6);
                        raf && cancelAnimationFrame(raf);
                        raf = requestAnimationFrame(() => card.style.transform =
                            `rotateX(${rx}deg) rotateY(${ry}deg)`);
                    };
                    const leave = () => {
                        raf && cancelAnimationFrame(raf);
                        card.style.transform = '';
                    };
                    card.addEventListener('pointermove', move);
                    card.addEventListener('pointerleave', leave);
                });
            }
        })();
    </script>
</section>
