<!-- AOS একবার লোড করা থাকলে বাদ দিন -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
<script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>document.addEventListener('DOMContentLoaded',()=>{ if(window.AOS){ AOS.init({duration:800,easing:'cubic-bezier(.2,.7,.2,1)',once:true,offset:80}); }});</script>

<!-- ========== Section Four (Tailwind-only, no custom CSS) ========== -->
<div id="section-four" class="relative isolate overflow-hidden">

  <!-- BG image -->
  <div class="absolute inset-0 -z-10 bg-cover bg-center"
       style="background-image:url('https://www.searchbloom.com/wp-content/uploads/2020/04/nextstep-bg.png')"></div>

  <!-- Overlay: light as-is, dark like HERO -->
  <div class="absolute inset-0 -z-10 bg-gradient-to-b
              from-white/70 via-white/60 to-white/70
              dark:from-[#0b1220] dark:via-[#0b1220] dark:to-[#0b1220]"></div>

  <!-- Dark-only tiny grid -->
  <svg class="absolute inset-0 -z-10 h-full w-full hidden dark:block opacity-[0.12]"
       xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <defs>
      <pattern id="p4" width="24" height="24" patternUnits="userSpaceOnUse">
        <path d="M24 0H0V24" fill="none" stroke="currentColor" stroke-width=".7"/>
      </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#p4)"/>
  </svg>

  <!-- Soft orbs -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-20 -right-24 h-80 w-80 rounded-full bg-slate-900/10 dark:bg-sky-500/15 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-20 h-96 w-96 rounded-full bg-slate-900/10 dark:bg-pink-500/15 blur-3xl"></div>
  </div>

  <!-- Content -->
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    <div class="max-w-3xl mx-auto text-center">
      <p class="text-xs tracking-[0.22em] uppercase text-slate-700/80 dark:text-white/70"
         data-aos="fade-up">
        Lead Generation • Cold Email Marketing
      </p>

      <h1 class="mt-4 text-3xl sm:text-4xl md:text-5xl font-semibold leading-tight text-slate-900 dark:text-white"
          data-aos="fade-up" data-aos-delay="100">
       Committed Analyst  Tailored Plans  No Prolonged Agreements
      </h1>

      <p class="mt-5 text-base sm:text-lg text-slate-700/80 dark:text-white/80"
         data-aos="fade-up" data-aos-delay="180">
       Classic, conversion-ready design with elegant yet dynamic animations to maintain focus where it counts.
      </p>

      <!-- Feature pills -->
      <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-full bg-slate-900/5 text-slate-800 border border-slate-900/10 px-4 py-2 text-sm backdrop-blur dark:bg-white/10 dark:text-white dark:border-white/20"
              data-aos="zoom-in" data-aos-delay="0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          ROI‑Focused Campaigns
        </span>
        <span class="inline-flex items-center gap-2 rounded-full bg-slate-900/5 text-slate-800 border border-slate-900/10 px-4 py-2 text-sm backdrop-blur dark:bg-white/10 dark:text-white dark:border-white/20"
              data-aos="zoom-in" data-aos-delay="80">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          Inbox‑First Deliverability
        </span>
        <span class="inline-flex items-center gap-2 rounded-full bg-slate-900/5 text-slate-800 border border-slate-900/10 px-4 py-2 text-sm backdrop-blur dark:bg-white/10 dark:text-white dark:border-white/20"
              data-aos="zoom-in" data-aos-delay="160">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          ICP‑Accurate Targeting
        </span>
      </div>

      <!-- CTAs -->
      <div class="mt-8 flex items-center justify-center gap-4">
        <a href="#contact"
           class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-6 py-3 text-white font-semibold shadow transition
                  hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300 active:scale-95"
           data-aos="fade-up" data-aos-delay="240">
          Get a Free Proposal
        </a>
        <a href="#cases"
           class="inline-flex items-center justify-center rounded-xl bg-slate-900/5 text-slate-900 border border-slate-900/10 px-6 py-3 font-semibold transition
                  hover:bg-slate-900/10 focus:outline-none focus:ring-4 focus:ring-slate-200
                  dark:bg-white/10 dark:text-white dark:border-white/20 dark:hover:bg-white/20 dark:focus:ring-white/30 active:scale-95"
           data-aos="fade-up" data-aos-delay="280">
          See Case Studies
        </a>
      </div>

      <!-- Quick trust row -->
      <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6 text-slate-700 text-xs dark:text-white/70">
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center dark:border-white/15 dark:bg-white/5"
             data-aos="fade-up" data-aos-delay="0">SPF/DKIM Setup</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center dark:border-white/15 dark:bg-white/5"
             data-aos="fade-up" data-aos-delay="80">Warmup & Rotation</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center dark:border-white/15 dark:bg-white/5"
             data-aos="fade-up" data-aos-delay="160">A/B Testing</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center dark:border-white/15 dark:bg-white/5"
             data-aos="fade-up" data-aos-delay="240">CRM Handoff</div>
      </div>
    </div>
  </div>

  <!-- Wave separator (static; no custom keyframes) -->
  <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]" aria-hidden="true">
    <!-- Light -->
    <svg class="block w-full dark:hidden" viewBox="0 0 1440 80" preserveAspectRatio="none">
      <defs><linearGradient id="waveGradLight" x1="0" x2="0" y1="0" y2="1"><stop offset="0%" stop-color="rgba(0,0,0,0.15)"/><stop offset="100%" stop-color="rgba(0,0,0,0.0)"/></linearGradient></defs>
      <path fill="url(#waveGradLight)"
            d="M0,64L60,53.3C120,43,240,21,360,16C480,11,600,21,720,37.3C840,53,960,75,1080,69.3C1200,64,1320,32,1380,16L1440,0L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z">
      </path>
    </svg>
    <!-- Dark -->
    <svg class="hidden dark:block w-full" viewBox="0 0 1440 80" preserveAspectRatio="none">
      <defs><linearGradient id="waveGradDark" x1="0" x2="0" y1="0" y2="1"><stop offset="0%" stop-color="rgba(255,255,255,0.35)"/><stop offset="100%" stop-color="rgba(255,255,255,0.0)"/></linearGradient></defs>
      <path fill="url(#waveGradDark)"
            d="M0,64L60,53.3C120,43,240,21,360,16C480,11,600,21,720,37.3C840,53,960,75,1080,69.3C1200,64,1320,32,1380,16L1440,0L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z">
      </path>
    </svg>
  </div>
</div>
<!-- ========== Section Four End ========== -->
