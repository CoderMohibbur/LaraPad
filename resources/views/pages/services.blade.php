{{-- resources/views/pages/services.blade.php --}}
<x-guest-layout>
  {{-- AOS (animations) --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded',()=>{ if(window.AOS){ AOS.init({ duration: 800, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 80 }); } });
  </script>

  {{-- Theme + Brand tokens (Light & Dark) --}}
  <style>
    :root{
      --brand:#4374BA;              /* primary (logo blue) */
      --brand-2:#00A3FF;            /* cyan accent */
      --brand-3:#22C55E;            /* emerald accent */
      --ink:#0b1220;                /* heading */
      --muted:#475569;              /* body */
      --surface:#ffffff;            /* page bg */
      --card:#ffffff;               /* card bg */
      --border:#e5e7eb;             /* border */
      --glow1: rgba(67,116,186,.18);
      --glow2: rgba(0,163,255,.18);
      --glow3: rgba(34,197,94,.16);
    }
    .dark{
      --ink:#e5e7eb;
      --muted:#94a3b8;
      --surface:#0b1220;
      --card:#0f172a;
      --border:#1f2937;
      --glow1: rgba(67,116,186,.22);
      --glow2: rgba(0,163,255,.22);
      --glow3: rgba(34,197,94,.20);
    }
    /* Utility classes bound to tokens */
    .text-ink{color:var(--ink)}
    .text-muted{color:var(--muted)}
    .bg-surface{background:var(--surface)}
    .bg-card{background:var(--card)}
    .border-default{border-color:var(--border)}
    .btn-primary{background:var(--brand); color:#fff;}
    .btn-primary:hover{filter:brightness(1.08)}
    .btn-ghost{background:var(--surface); color:var(--brand); box-shadow:inset 0 0 0 2px var(--brand)}
    .text-gradient{ background:linear-gradient(90deg,var(--brand),var(--brand-2) 50%,var(--brand-3)); -webkit-background-clip:text; background-clip:text; color:transparent; }
  </style>

  <!-- ===================== THEME TOGGLE (optional) ===================== -->


  <!-- ===================== HERO ===================== -->
  <section id="hero" class="relative overflow-hidden border-b border-default bg-surface">
    <!-- auras -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
      <div class="absolute -top-20 -left-24 h-72 w-72 rounded-full" style="background:radial-gradient(50% 50% at 50% 50%, var(--glow1) 0%, transparent 70%);"></div>
      <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full" style="background:radial-gradient(50% 50% at 50% 50%, var(--glow2) 0%, transparent 70%);"></div>
    </div>

    <div class="max-w-screen-xl mx-auto px-6 lg:px-10 py-16 lg:py-24 grid gap-10 lg:grid-cols-12 items-center">
      <header class="lg:col-span-7" data-aos="fade-up">
        <p class="inline-flex items-center gap-2 text-[13px] tracking-wide uppercase" style="color:var(--brand)">
          <span>Growth Studio</span> <span class="h-1 w-1 rounded-full" style="background:var(--brand)"></span> <span>Lead Generation & Cold Email</span>
        </p>
        <h1 class="mt-4 text-4xl md:text-5xl font-extrabold leading-[1.1] text-ink">
          Unlock growth with <span class="text-gradient">Lead Generation</span> & <span class="text-gradient">Cold Email Marketing</span>
        </h1>
        <p class="mt-5 text-lg text-muted max-w-2xl">We align Website, SEO, Ads, Social and Email into one conversion system. Data‑driven campaigns deliver <strong>verified B2B leads</strong> and <strong>higher ROI</strong>.</p>
        <div class="mt-8 flex flex-col sm:flex-row gap-3">
          <a href="#contact" class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow transition active:scale-[.98]">Get a Free Growth Plan →</a>
          <a href="#services" class="btn-ghost inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold transition active:scale-[.98]">Explore Services</a>
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
          <div class="absolute -inset-4 rounded-3xl" style="background:radial-gradient(60% 60% at 50% 50%, var(--glow3) 0%, transparent 60%);"></div>
          <div class="relative bg-card rounded-3xl p-6 shadow-xl border border-default">
            <div class="grid grid-cols-2 gap-3">
              <div class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]"><h3 class="font-semibold text-ink">Lead Finder</h3><p class="text-sm text-muted">ICP fit, firmographic & tech signals</p></div>
              <div class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]"><h3 class="font-semibold text-ink">Cold Email</h3><p class="text-sm text-muted">Warmup, A/B copy, SPF/DKIM</p></div>
              <div class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]"><h3 class="font-semibold text-ink">Landing Pages</h3><p class="text-sm text-muted">High‑speed, high‑intent layouts</p></div>
              <div class="rounded-2xl p-4 border border-default bg-surface hover:shadow-md transition group active:scale-[.99]"><h3 class="font-semibold text-ink">CRM & Automation</h3><p class="text-sm text-muted">HubSpot/Zoho + Zapier flows</p></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== SERVICES ===================== -->
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
        <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up" data-aos-delay="50">
          <h3 class="font-bold text-ink">2) Strategy</h3>
          <p class="text-muted mt-2">Channel prioritization: SEO, Ads, Cold Email, Social.</p>
        </div>
        <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up" data-aos-delay="100">
          <h3 class="font-bold text-ink">3) Build & Launch</h3>
          <p class="text-muted mt-2">High‑speed pages, tracking, automations, inbox‑ready domains.</p>
        </div>
        <div class="rounded-2xl bg-card p-6 border border-default shadow-sm" data-aos="fade-up" data-aos-delay="150">
          <h3 class="font-bold text-ink">4) Optimize & Scale</h3>
          <p class="text-muted mt-2">A/B copy & creatives, sequencing, lower CPL, higher revenue.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PRIMARY CTA ===================== -->
  <section id="cta" class="relative py-14 bg-surface">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-10">
      <div class="relative overflow-hidden rounded-3xl p-8 md:p-10 border border-default shadow-sm" style="background:linear-gradient(135deg, rgba(67,116,186,.10), rgba(0,163,255,.10));" data-aos="zoom-in">
        <div class="absolute -top-10 -right-10 h-44 w-44 rounded-full" style="background:radial-gradient(50% 50% at 50% 50%, var(--glow3) 0%, transparent 70%);"></div>
        <div class="relative">
          <h3 class="text-2xl md:text-3xl font-extrabold text-ink">Free Mini Audit: Lead Gen & Cold Email Readiness</h3>
          <p class="mt-2 text-muted max-w-3xl">We review domain authentication (SPF/DKIM/DMARC), deliverability, copy, offer, and landing speed—then give you 3–5 actionable improvements.</p>
          <div class="mt-6 flex flex-col sm:flex-row gap-3">
            <a href="#contact" class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow">Claim Your Audit</a>
            <a href="#faq" class="btn-ghost inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold">See FAQs</a>
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

      <div x-data="{ open:-1, toggle(i){ this.open = this.open===i ? -1 : i } }" class="mt-10 max-w-3xl mx-auto">
        @php $faqs = [
          ['q'=>'What data do you include in lead lists?', 'a'=>'Based on your ICP: company, full name, title, professional email, LinkedIn URL, and phone (if required). We cross‑verify across 2–3 sources.'],
          ['q'=>'How do you keep cold email safe?', 'a'=>'We set up SPF/DKIM/DMARC, do inbox warmup, send in small batches, A/B test copy with spintax, and respect per‑inbox send limits.'],
          ['q'=>'What does the timeline look like?', 'a'=>'Discovery & strategy 3–5 days, build 7–14 days, then ongoing launch & optimization. Scope can vary per project.'],
          ['q'=>'Can you improve website speed significantly?', 'a'=>'With proper build we target Core Web Vitals (LCP/CLS). Many cases see 50–200% speed improvements depending on baseline.'],
        ]; @endphp

        @foreach($faqs as $i => $f)
          <div class="rounded-2xl border border-default bg-card mb-3 overflow-hidden">
            <button type="button" @click="toggle({{ $i }})" class="w-full flex items-center justify-between gap-6 px-5 py-4 text-left">
              <span class="font-semibold text-ink">{{ $f['q'] }}</span>
              <svg :class="open==={{ $i }} ? 'rotate-180' : ''" class="h-5 w-5 transition-transform" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
            </button>
            <div class="px-5 pb-4 grid transition-all duration-300" :style="open==={{ $i }} ? 'grid-template-rows: 1fr; opacity:1' : 'grid-template-rows: 0fr; opacity:.0'">
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
          <p class="mt-2 text-muted">In a 15‑minute call, we’ll map a focused plan to get results fast with Lead Gen and Cold Email.</p>
          <ul class="mt-4 text-muted space-y-1 text-sm">
            <li>• Replies within ~24h</li>
            <li>• No spam. No pressure.</li>
          </ul>
        </div>
        <div class="lg:col-span-3" data-aos="fade-left">
          {{-- Replace with your Livewire/Blade form component --}}
          <form class="bg-card rounded-2xl p-6 border border-default shadow-sm grid gap-3">
            <div class="grid md:grid-cols-2 gap-3">
              <input required type="text" name="name" placeholder="Your name" class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
              <input required type="email" name="email" placeholder="Work email" class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
            </div>
            <input type="text" name="company" placeholder="Company" class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]">
            <textarea name="needs" placeholder="What do you want to achieve? (e.g., 500 B2B leads/mo, cold email setup, SEO growth…)" rows="4" class="w-full rounded-xl border border-default bg-surface text-ink px-4 py-3 focus:outline-none focus:[box-shadow:0_0_0_2px_var(--brand)]"></textarea>
            <button class="btn-primary inline-flex items-center justify-center px-5 py-3 rounded-xl font-semibold shadow">Send Inquiry</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== Sticky Mobile CTA ===================== -->
  <div class="fixed bottom-4 left-0 right-0 px-4 sm:hidden">
    <a href="#contact" class="block text-center btn-primary px-5 py-3 rounded-xl font-semibold shadow-xl">Start Lead Gen & Cold Email</a>
  </div>

</x-guest-layout>
