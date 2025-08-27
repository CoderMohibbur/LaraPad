{{-- resources/views/pages/services.blade.php --}}
<x-guest-layout>
    {{-- AOS (animations) --}}
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

    {{-- Theme + Brand tokens (Light & Dark) --}}
    <style>
        :root {
            --brand: #4374BA;
            /* primary (logo blue) */
            --brand-2: #00A3FF;
            /* cyan accent */
            --brand-3: #30C55E;
            /* emerald accent */
            --ink: #0b1300;
            /* heading */
            --muted: #475569;
            /* body */
            --surface: #ffffff;
            /* page bg */
            --card: #ffffff;
            /* card bg */
            --border: #e5e7eb;
            /* border */
            --glow1: rgba(67, 116, 186, .18);
            --glow2: rgba(0, 163, 255, .18);
            --glow3: rgba(34, 197, 94, .16);
        }

        .dark {
            --ink: #e5e7eb;
            --muted: #94a3b8;
            --surface: #0b1300;
            --card: #0f172a;
            --border: #1f2937;
            --glow1: rgba(67, 116, 186, .30);
            --glow2: rgba(0, 163, 255, .30);
            --glow3: rgba(34, 197, 94, .20);
        }

        /* Utility classes bound to tokens */
        .text-ink {
            color: var(--ink)
        }

        .text-muted {
            color: var(--muted)
        }

        .bg-surface {
            background: var(--surface)
        }

        .bg-card {
            background: var(--card)
        }

        .border-default {
            border-color: var(--border)
        }

        .btn-primary {
            background: var(--brand);
            color: #fff;
        }

        .btn-primary:hover {
            filter: brightness(1.08)
        }

        .btn-ghost {
            background: var(--surface);
            color: var(--brand);
            box-shadow: inset 0 0 0 2px var(--brand)
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--brand), var(--brand-2) 50%, var(--brand-3));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>

    <!-- ===================== THEME TOGGLE (optional) ===================== -->


    <!-- ===================== HERO ===================== -->
    <section id="hero" class="relative overflow-hidden border-b border-default bg-surface">
        <!-- auras -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-20 -left-24 h-72 w-72 rounded-full"
                style="background:radial-gradient(50% 50% at 50% 50%, var(--glow1) 0%, transparent 70%);"></div>
            <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full"
                style="background:radial-gradient(50% 50% at 50% 50%, var(--glow2) 0%, transparent 70%);"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 lg:px-10 py-16 lg:py-24 grid gap-10 lg:grid-cols-12 items-center">
            <header class="lg:col-span-7" data-aos="fade-up">
                <p class="inline-flex items-center gap-2 text-[13px] tracking-wide uppercase"
                    style="color:var(--brand)">
                    <span>Growth Studio</span> <span class="h-1 w-1 rounded-full"
                        style="background:var(--brand)"></span> <span>Lead Generation & Cold Email</span>
                </p>
                <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-[1.1] text-ink">
                    Unlock growth with <span class="text-gradient">Lead Generation</span> & <span
                        class="text-gradient">Cold Email Marketing</span>
                </h1>
                <p class="mt-5 text-lg text-muted max-w-2xl">We align Website, SEO, Ads, Social and Email into one
                    conversion system. Data‑driven campaigns deliver <strong>verified B2B leads</strong> and
                    <strong>higher ROI</strong>.</p>
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    <a href="#contact"
                        class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow transition active:scale-[.98]">Get
                        a Free Growth Plan →</a>
                    <a href="#services"
                        class="btn-ghost inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold transition active:scale-[.98]">Explore
                        Services</a>
                </div>
                <ul class="mt-6 flex flex-wrap gap-4 text-[13px] text-muted" aria-label="Trust badges">
                    <li class="inline-flex items-center gap-2">✅ 200+ Projects Delivered</li>
                    <li class="inline-flex items-center gap-2">⚡ Core Web Vitals Friendly</li>
                    <li class="inline-flex items-center gap-2">🛡️ Multi‑source Verified Contacts</li>
                </ul>
            </header>

            <div class="lg:col-span-5" data-aos="fade-left">
                <!-- Hero visual -->
                <div class="relative">
                    <div class="absolute -inset-4 rounded-3xl"
                        style="background:radial-gradient(60% 60% at 50% 50%, var(--glow3) 0%, transparent 60%);"></div>
                    <div class="relative bg-card rounded-3xl p-6 shadow-xl border border-default">
                        <div class="grid grid-cols-2 gap-3">
                            <div
                                class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]">
                                <h3 class="font-semibold text-ink">Lead Finder</h3>
                                <p class="text-sm text-muted">ICP fit, firmographic & tech signals</p>
                            </div>
                            <div
                                class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]">
                                <h3 class="font-semibold text-ink">Cold Email</h3>
                                <p class="text-sm text-muted">Warmup, A/B copy, SPF/DKIM</p>
                            </div>
                            <div
                                class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]">
                                <h3 class="font-semibold text-ink">Landing Pages</h3>
                                <p class="text-sm text-muted">High‑speed, high‑intent layouts</p>
                            </div>
                            <div
                                class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]">
                                <h3 class="font-semibold text-ink">CRM & Automation</h3>
                                <p class="text-sm text-muted">HubSpot/Zoho + Zapier flows</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- ===================== SERVICES ===================== -->
  <section id="services" class="relative overflow-hidden py-14 bg-surface">
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full" style="background:radial-gradient(50% 50% at 50% 50%, var(--glow1) 0%, transparent 70%);"></div>
      <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full" style="background:radial-gradient(50% 50% at 50% 50%, var(--glow2) 0%, transparent 70%);"></div>
    </div>

    <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
      <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-extrabold text-ink">Our Services</h2>
        <p class="mt-3 text-muted">Your growth stack: Design → Traffic → Leads → Sales.</p>
      </div>

      <div class="mt-10 grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- Website & Branding -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in">
          <h3 class="text-xl font-bold text-ink">Website & Branding</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Website Design & Development</li>
            <li>• E‑commerce Website Development</li>
            <li>• UI/UX Design</li>
            <li>• Website Speed Optimization</li>
            <li>• Maintenance & Support</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">SEO & speed ready →</div>
        </article>

        <!-- Search Marketing -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="50">
          <h3 class="text-xl font-bold text-ink">Search Marketing (SEO & Ads)</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Search Engine Optimization (SEO)</li>
            <li>• Local SEO Services</li>
            <li>• Technical SEO Audit</li>
            <li>• Google Ads / PPC</li>
            <li>• YouTube Video Ads Management</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">Intent‑driven traffic →</div>
        </article>

        <!-- Social Media Marketing -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="100">
          <h3 class="text-xl font-bold text-ink">Social Media Marketing (SMM)</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Facebook & LinkedIn Marketing</li>
            <li>• Social Media Content Creation</li>
            <li>• Influencer Marketing (Optional)</li>
            <li>• Google Ads Retargeting</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">Community & reach →</div>
        </article>

        <!-- Lead Generation Services (Primary) -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition ring-1 ring-transparent hover:[box-shadow:0_0_0_2px_var(--brand)_inset]" data-aos="zoom-in">
          <div class="absolute -top-3 right-4 text-[11px] px-2 py-1 rounded-full" style="background:#e6f4ff; color:#0b63ce">★ Primary Focus</div>
          <h3 class="text-xl font-bold text-ink">Lead Generation Services</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• B2B Lead Generation</li>
            <li>• LinkedIn Lead Generation</li>
            <li>• Email List Building</li>
            <li>• Cold Outreach Campaign Setup</li>
            <li>• Verified Contact Data (Name, Email, LinkedIn, Phone)</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-3)">ICP‑fit, multi‑source verified →</div>
        </article>

        <!-- Content & Creative -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="50">
          <h3 class="text-xl font-bold text-ink">Content & Creative</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Copywriting (Website + Ads)</li>
            <li>• Blog Writing & SEO Articles</li>
            <li>• Ad Creative Design (Image + Video)</li>
            <li>• Social Media Post Design</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">Message‑market fit →</div>
        </article>

        <!-- Email & CRM Automation -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="100">
          <h3 class="text-xl font-bold text-ink">Email & CRM Automation</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Email Marketing (Mailchimp, Sendinblue, etc.)</li>
            <li>• Email Automation Setup</li>
            <li>• CRM Integration (HubSpot, Zoho, etc.)</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">Lifecycle automation →</div>
        </article>

        <!-- Marketing Consultancy -->
        <article class="group relative rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition" data-aos="zoom-in" data-aos-delay="150">
          <h3 class="text-xl font-bold text-ink">Marketing Consultancy</h3>
          <ul class="mt-4 space-y-2 text-muted">
            <li>• Go‑to‑Market Strategy</li>
            <li>• Positioning & Messaging</li>
            <li>• Analytics & Conversion Audit</li>
          </ul>
          <div class="mt-5 inline-flex items-center gap-2 text-[13px]" style="color:var(--brand-2)">Senior guidance →</div>
        </article>
      </div>
    </div>
  </section> --}}

    <!-- ===================== SERVICES ===================== -->
    <section id="services" class="relative overflow-hidden py-14 bg-surface">
        <style>
            .svc-ico {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                height: 60px;
                width: 60px;
                border-radius: 14px;
                background: linear-gradient(145deg, #ffffff, #f3f4f6);
                box-shadow: 0 8px 18px -6px rgba(2, 6, 23, .12);
                transition: transform .25s ease, box-shadow .25s ease, background .25s ease;
            }

            .dark .svc-ico {
                background: linear-gradient(145deg, #0b1220, #0e1729);
                box-shadow: 0 10px 22px -10px rgba(59, 130, 246, .45),
                    inset 0 0 0 1px rgba(148, 163, 184, .18);
            }

            .svc:hover .svc-ico {
                transform: translateY(-2px) scale(1.05)
            }

            .svc-ico svg {
                width: 32px;
                height: 32px
            }
        </style>

        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-ink">Our Services</h2>
                <p class="mt-3 text-muted">Your growth stack: Design → Traffic → Leads → Sales.</p>
            </div>

            <div class="mt-10 grid gap-6 md:gap-8 md:grid-cols-2 lg:grid-cols-3">

                <!-- Website & Branding -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in">
                    <div class="svc-ico">
                        <!-- monitor colorful -->
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="4" width="18" height="12" rx="2" fill="#3B82F6" />
                            <path d="M8 20h8M12 16v4" stroke="#0EA5E9" stroke-width="2" />
                            <circle cx="18" cy="7" r="2" fill="#F59E0B" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Website & Branding</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Website Design & Development</li>
                        <li>• E-commerce Website Development</li>
                        <li>• UI/UX Design</li>
                        <li>• Website Speed Optimization</li>
                        <li>• Maintenance & Support</li>
                    </ul>
                </article>

                <!-- Search Marketing -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in" data-aos-delay="50">
                    <div class="svc-ico">
                        <!-- Google Ads style -->
                        <svg viewBox="0 0 24 24">
                            <path d="M4 20L13 4" stroke="#34A853" stroke-width="3" stroke-linecap="round" />
                            <circle cx="5" cy="19" r="3" fill="#FBBC05" />
                            <path d="M12 4L20 20" stroke="#4285F4" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Search Marketing (SEO & Ads)</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Search Engine Optimization (SEO)</li>
                        <li>• Local SEO Services</li>
                        <li>• Technical SEO Audit</li>
                        <li>• Google Ads / PPC</li>
                        <li>• YouTube Video Ads Management</li>
                    </ul>
                </article>

                <!-- Social Media Marketing -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="svc-ico">
                        <!-- network nodes colorful -->
                        <svg viewBox="0 0 24 24">
                            <circle cx="6" cy="12" r="3" fill="#3B82F6" />
                            <circle cx="18" cy="6" r="3" fill="#EC4899" />
                            <circle cx="18" cy="18" r="3" fill="#10B981" />
                            <path d="M8.5 12l7-6M8.5 12l7 6" stroke="#6B7280" stroke-width="1.6" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Social Media Marketing (SMM)</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Facebook & LinkedIn Marketing</li>
                        <li>• Social Media Content Creation</li>
                        <li>• Influencer Marketing</li>
                        <li>• Google Ads Retargeting</li>
                    </ul>
                </article>

                <!-- Lead Generation Services -->
                <article
                    class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition ring-1 ring-transparent hover:[box-shadow:0_0_0_2px_var(--brand)_inset]"
                    data-aos="zoom-in">
                    <div class="svc-ico">
                        <!-- target colorful -->
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke="#6366F1" stroke-width="2"
                                fill="none" />
                            <circle cx="12" cy="12" r="5" stroke="#8B5CF6" stroke-width="2"
                                fill="none" />
                            <circle cx="12" cy="12" r="2.5" fill="#F43F5E" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Lead Generation Services</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• B2B Lead Generation</li>
                        <li>• LinkedIn Lead Generation</li>
                        <li>• Email List Building</li>
                        <li>• Cold Outreach Campaign Setup</li>
                        <li>• Verified Contact Data</li>
                    </ul>
                </article>

                <!-- Content & Creative -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in" data-aos-delay="50">
                    <div class="svc-ico">
                        <!-- pen colorful -->
                        <svg viewBox="0 0 24 24">
                            <path d="M4 20l5-1 9-9-4-4-9 9-1 5z" fill="#F59E0B" />
                            <path d="M14 4l6 6" stroke="#F97316" stroke-width="2" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Content & Creative</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Copywriting (Website + Ads)</li>
                        <li>• Blog Writing & SEO Articles</li>
                        <li>• Ad Creative Design</li>
                        <li>• Social Media Post Design</li>
                    </ul>
                </article>

                <!-- Email & CRM Automation -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="svc-ico">
                        <!-- mail + gear colorful -->
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="2" fill="#0EA5E9" />
                            <path d="M3 7l9 6 9-6" stroke="#38BDF8" stroke-width="2" />
                            <circle cx="19" cy="18" r="3" fill="#F43F5E" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Email & CRM Automation</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Email Marketing</li>
                        <li>• Email Automation Setup</li>
                        <li>• CRM Integration</li>
                    </ul>
                </article>

                <!-- Marketing Consultancy -->
                <article class="svc rounded-2xl border border-default bg-card p-6 shadow-sm hover:shadow-md transition"
                    data-aos="zoom-in" data-aos-delay="150">
                    <div class="svc-ico">
                        <!-- bulb colorful -->
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="10" r="6" fill="#FACC15" />
                            <path d="M9 18h6v2H9z" fill="#F59E0B" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-ink">Marketing Consultancy</h3>
                    <ul class="mt-4 space-y-2 text-muted">
                        <li>• Go-to-Market Strategy</li>
                        <li>• Positioning & Messaging</li>
                        <li>• Analytics & Conversion Audit</li>
                    </ul>
                </article>

            </div>
        </div>
    </section>




    <!-- ===================== PROCESS ===================== -->
    <section id="process" class="py-16 bg-surface border-y border-default">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-ink">How We Work</h2>
                <p class="mt-3 text-muted">Simple, fast, outcome‑driven.</p>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up">
                    <h3 class="font-bold text-ink">1) Discover</h3>
                    <p class="text-muted mt-2">ICP, market, offer & goals alignment. Asset audit.</p>
                </div>
                <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up"
                    data-aos-delay="50">
                    <h3 class="font-bold text-ink">2) Strategy</h3>
                    <p class="text-muted mt-2">Channel prioritization: SEO, Ads, Cold Email, Social.</p>
                </div>
                <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3 class="font-bold text-ink">3) Build & Launch</h3>
                    <p class="text-muted mt-2">High‑speed pages, tracking, automations, inbox‑ready domains.</p>
                </div>
                <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up"
                    data-aos-delay="150">
                    <h3 class="font-bold text-ink">4) Optimize & Scale</h3>
                    <p class="text-muted mt-2">A/B copy & creatives, sequencing, lower CPL, higher revenue.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== PRIMARY CTA ===================== -->
    <section id="cta" class="relative py-14 bg-surface">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
            <div class="relative overflow-hidden rounded-3xl p-8 md:p-10 border border-default shadow-sm"
                style="background:linear-gradient(135deg, rgba(67,116,186,.10), rgba(0,163,255,.10));"
                data-aos="zoom-in">
                <div class="absolute -top-10 -right-10 h-44 w-44 rounded-full"
                    style="background:radial-gradient(50% 50% at 50% 50%, var(--glow3) 0%, transparent 70%);"></div>
                <div class="relative">
                    <h3 class="text-2xl md:text-3xl font-extrabold text-ink">Free Mini Audit: Lead Gen & Cold Email
                        Readiness</h3>
                    <p class="mt-2 text-muted max-w-3xl">We review domain authentication (SPF/DKIM/DMARC),
                        deliverability, copy, offer, and landing speed—then give you 3–5 actionable improvements.</p>
                    <div class="mt-6 flex flex-col sm:flex-row gap-3">
                        <a href="#contact"
                            class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow">Claim
                            Your Audit</a>
                        <a href="#faq"
                            class="btn-ghost inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold">See
                            FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== FAQ (height-safe) ===================== -->
    <section id="faq" class="py-16 border-t border-default bg-surface">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
            <div class="text-center max-w-2xl mx-auto" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-ink">FAQ</h2>
                <p class="mt-3 text-muted">Answers to common questions</p>
            </div>

            <div x-data="{ open: -1, toggle(i) { this.open = this.open === i ? -1 : i } }" class="mt-10 max-w-3xl mx-auto">
                @php $faqs = [['q' => 'What data do you include in lead lists?', 'a' => 'Based on your ICP: company, full name, title, professional email, LinkedIn URL, and phone (if required). We cross‑verify across 2–3 sources.'], ['q' => 'How do you keep cold email safe?', 'a' => 'We set up SPF/DKIM/DMARC, do inbox warmup, send in small batches, A/B test copy with spintax, and respect per‑inbox send limits.'], ['q' => 'What does the timeline look like?', 'a' => 'Discovery & strategy 3–5 days, build 7–14 days, then ongoing launch & optimization. Scope can vary per project.'], ['q' => 'Can you improve website speed significantly?', 'a' => 'With proper build we target Core Web Vitals (LCP/CLS). Many cases see 50–200% speed improvements depending on baseline.']]; @endphp

                @foreach ($faqs as $i => $f)
                    <div class="rounded-2xl border border-default bg-card mb-3 overflow-hidden">
                        <button type="button" @click="toggle({{ $i }})"
                            class="w-full flex items-center justify-between gap-6 px-5 py-4 text-left">
                            <span class="font-semibold text-ink">{{ $f['q'] }}</span>
                            <svg :class="open === {{ $i }} ? 'rotate-180' : ''"
                                class="h-5 w-5 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="px-5 pb-4 grid transition-all duration-300"
                            :style="open === {{ $i }} ? 'grid-template-rows: 1fr; opacity:1' :
                                'grid-template-rows: 0fr; opacity:.0'">
                            <div class="overflow-hidden text-muted">{{ $f['a'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===================== CONTACT ===================== -->
    <section id="contact" class="py-16 bg-surface border-t border-default">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
            <div class="grid gap-8 lg:grid-cols-5">
                <div class="lg:col-span-2" data-aos="fade-right">
                    <h3 class="text-2xl font-extrabold text-ink">Let’s Talk</h3>
                    <p class="mt-2 text-muted">In a 15‑minute call, we’ll map a focused plan to get results fast with
                        Lead Gen and Cold Email.</p>
                    <ul class="mt-4 text-muted space-y-1 text-sm">
                        <li>• Replies within ~24h</li>
                        <li>• No spam. No pressure.</li>
                    </ul>
                </div>
                <div class="lg:col-span-3" data-aos="fade-left">
                    {{-- Replace with your Livewire/Blade form component --}}
                    <form class="bg-card rounded-2xl p-6 border border-default shadow-sm grid gap-3">
                        <div class="grid md:grid-cols-2 gap-3">
                            <input required type="text" name="name" placeholder="Your name"
                                class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
                            <input required type="email" name="email" placeholder="Work email"
                                class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
                        </div>
                        <input type="text" name="company" placeholder="Company"
                            class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
                        <textarea name="needs"
                            placeholder="What do you want to achieve? (e.g., 500 B2B leads/mo, cold email setup, SEO growth…)" rows="4"
                            class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]"></textarea>
                        <button
                            class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow">Send
                            Inquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== Sticky Mobile CTA ===================== -->
    <div class="fixed bottom-4 left-0 right-0 px-4 sm:hidden">
        <a href="#contact" class="block text-center btn-primary px-5 py-3 rounded-xl font-semibold shadow-xl">Start
            Lead Gen & Cold Email</a>
    </div>

</x-guest-layout>
