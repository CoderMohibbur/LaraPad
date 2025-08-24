<!-- Section Four Start -->
<div id="section-four" class="relative isolate overflow-hidden">

  <!-- BG image (unchanged in light) -->
  <div class="absolute inset-0 -z-10 bg-cover bg-center"
       style="background-image:url('https://www.searchbloom.com/wp-content/uploads/2020/04/nextstep-bg.png')"></div>

  <!-- Overlay: light as-is, dark matches HERO (#0b1220) -->
  <div class="absolute inset-0 -z-10 bg-gradient-to-b
              from-white/70 via-white/60 to-white/70
              dark:from-[#0b1220] dark:via-[#0b1220] dark:to-[#0b1220]"></div>

  <!-- Dark-only tiny grid pattern (no change in light) -->
  <svg class="absolute inset-0 -z-10 h-full w-full hidden dark:block opacity-[0.12]"
       xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <defs>
      <pattern id="p4" width="24" height="24" patternUnits="userSpaceOnUse">
        <path d="M24 0H0V24" fill="none" stroke="currentColor" stroke-width=".7"/>
      </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#p4)"/>
  </svg>

  <!-- Soft orbs for depth (light unchanged; dark tuned a bit like hero) -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-20 -right-24 h-80 w-80 rounded-full
                bg-slate-900/10 dark:bg-sky-500/15 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-20 h-96 w-96 rounded-full
                bg-slate-900/10 dark:bg-pink-500/15 blur-3xl"></div>
  </div>


  <!-- Decorative particles + animations (unchanged) -->
  <style>
    @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }
    @keyframes drift { 0%{transform:translateX(0)} 50%{transform:translateX(10px)} 100%{transform:translateX(0)} }
    @keyframes rise  { 0%{opacity:0; transform:translateY(14px)} 100%{opacity:1; transform:translateY(0)} }
    .reveal-up{opacity:0; transform:translateY(22px); transition:opacity .7s ease, transform .7s ease}
    .is-visible .reveal-up{opacity:1; transform:none}
    .stagger>*{opacity:0; transform:translateY(10px); transition:opacity .6s ease, transform .6s ease}
    .is-visible .stagger>*{opacity:1; transform:none}
    .ripple{position:relative; overflow:hidden}
    .ripple:after{content:""; position:absolute; inset:auto; width:0; height:0; border-radius:9999px;
      background:rgba(255,255,255,.35); transform:translate(-50%,-50%); pointer-events:none; opacity:0}
    .ripple.is-press:after{opacity:1; width:220px; height:220px; transition:width .45s, height .45s, opacity .9s}
    @media (prefers-reduced-motion: reduce){
      .reveal-up,.stagger>*{transition:none!important; opacity:1!important; transform:none!important}
      .particle{animation:none!important}
    }
  </style>

  <!-- floating particles (unchanged) -->
  <div class="absolute inset-0 -z-10">
    <span class="particle absolute top-24 left-[12%] h-2 w-2 rounded-full
                 bg-slate-700/40 dark:bg-white/50"
          style="animation: float 6s ease-in-out infinite, drift 9s ease-in-out infinite"></span>
    <span class="particle absolute top-40 left-[72%] h-1.5 w-1.5 rounded-full
                 bg-slate-700/30 dark:bg-white/40"
          style="animation: float 7s ease-in-out infinite, drift 10s ease-in-out infinite"></span>
    <span class="particle absolute top-1/2 left-[8%] h-1.5 w-1.5 rounded-full
                 bg-slate-700/30 dark:bg-white/40"
          style="animation: float 8s ease-in-out infinite, drift 12s ease-in-out infinite"></span>
    <span class="particle absolute top-[68%] left-[48%] h-2 w-2 rounded-full
                 bg-slate-700/30 dark:bg-white/40"
          style="animation: float 6.5s ease-in-out infinite, drift 10.5s ease-in-out infinite"></span>
    <span class="particle absolute top-[22%] left-[42%] h-1.5 w-1.5 rounded-full
                 bg-slate-700/20 dark:bg-white/30"
          style="animation: float 7.5s ease-in-out infinite, drift 11.5s ease-in-out infinite"></span>
  </div>

  <!-- ====== Content (unchanged light; dark colors already had classes) ====== -->
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 md:py-24" data-animate>
    <div class="max-w-3xl mx-auto text-center">

      <p class="reveal-up text-xs tracking-[0.22em] uppercase
                text-slate-700/80 dark:text-white/70">
        Lead Generation • Cold Email Marketing
      </p>

      <h1 class="reveal-up mt-4 text-3xl sm:text-4xl md:text-5xl font-semibold leading-tight
                 text-slate-900 dark:text-white">
        Dedicated Analyst · Custom Strategies · No Lengthy Contracts
      </h1>

      <p class="reveal-up mt-5 text-base sm:text-lg
                text-slate-700/80 dark:text-white/80">
        Classic, conversion-ready design with lively yet tasteful animations to keep attention where it matters.
      </p>

      <!-- Feature pills -->
      <div class="stagger mt-8 flex flex-wrap items-center justify-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-full
                     bg-slate-900/5 text-slate-800 border border-slate-900/10
                     px-4 py-2 text-sm backdrop-blur
                     dark:bg-white/10 dark:text-white dark:border-white/20">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          ROI-Focused Campaigns
        </span>

        <span class="inline-flex items-center gap-2 rounded-full
                     bg-slate-900/5 text-slate-800 border border-slate-900/10
                     px-4 py-2 text-sm backdrop-blur
                     dark:bg-white/10 dark:text-white dark:border-white/20">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Inbox-First Deliverability
        </span>

        <span class="inline-flex items-center gap-2 rounded-full
                     bg-slate-900/5 text-slate-800 border border-slate-900/10
                     px-4 py-2 text-sm backdrop-blur
                     dark:bg-white/10 dark:text-white dark:border-white/20">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          ICP-Accurate Targeting
        </span>
      </div>

      <!-- CTAs -->
      <div class="reveal-up mt-8 flex items-center justify-center gap-4">
        <a href="#contact"
           class="ripple inline-flex items-center justify-center rounded-xl
                  bg-indigo-600 px-6 py-3 text-white font-semibold shadow
                  hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300">
          Get a Free Proposal
        </a>
        <a href="#cases"
           class="ripple inline-flex items-center justify-center rounded-xl
                  bg-slate-900/5 text-slate-900 border border-slate-900/10
                  px-6 py-3 font-semibold hover:bg-slate-900/10
                  focus:outline-none focus:ring-4 focus:ring-slate-200
                  dark:bg-white/10 dark:text-white dark:border-white/20
                  dark:hover:bg-white/20 dark:focus:ring-white/30">
          See Case Studies
        </a>
      </div>

      <!-- Quick trust row -->
      <div class="reveal-up mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6
                  text-slate-700 text-xs dark:text-white/70">
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center
                    dark:border-white/15 dark:bg-white/5">SPF/DKIM Setup</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center
                    dark:border-white/15 dark:bg-white/5">Warmup & Rotation</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center
                    dark:border-white/15 dark:bg-white/5">A/B Testing</div>
        <div class="rounded-lg border border-slate-900/10 bg-white/60 p-3 text-center
                    dark:border-white/15 dark:bg-white/5">CRM Handoff</div>
      </div>
    </div>
  </div>

  <!-- Subtle animated wave separator (kept) -->
  <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]" aria-hidden="true">
    <!-- Light (unchanged) -->
    <svg class="block w-[200%] translate-x-0 motion-safe:animate-[drift_16s_linear_infinite] dark:hidden"
         viewBox="0 0 1440 80" preserveAspectRatio="none">
      <defs>
        <linearGradient id="waveGradLight" x1="0" x2="0" y1="0" y2="1">
          <stop offset="0%" stop-color="rgba(0,0,0,0.15)"/>
          <stop offset="100%" stop-color="rgba(0,0,0,0.0)"/>
        </linearGradient>
      </defs>
      <path fill="url(#waveGradLight)"
            d="M0,64L60,53.3C120,43,240,21,360,16C480,11,600,21,720,37.3C840,53,960,75,1080,69.3C1200,64,1320,32,1380,16L1440,0L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z">
      </path>
    </svg>

    <!-- Dark (slightly brighter stroke like hero) -->
    <svg class="hidden dark:block w-[200%] translate-x-0 motion-safe:animate-[drift_16s_linear_infinite]"
         viewBox="0 0 1440 80" preserveAspectRatio="none">
      <defs>
        <linearGradient id="waveGradDark" x1="0" x2="0" y1="0" y2="1">
          <stop offset="0%" stop-color="rgba(255,255,255,0.35)"/>
          <stop offset="100%" stop-color="rgba(255,255,255,0.0)"/>
        </linearGradient>
      </defs>
      <path fill="url(#waveGradDark)"
            d="M0,64L60,53.3C120,43,240,21,360,16C480,11,600,21,720,37.3C840,53,960,75,1080,69.3C1200,64,1320,32,1380,16L1440,0L1440,80L1380,80C1320,80,1200,80,1080,80C960,80,840,80,720,80C600,80,480,80,360,80C240,80,120,80,60,80L0,80Z">
      </path>
    </svg>
  </div>
</div>
<!-- Section Four End -->

<script>
  // simple theme toggle + aria-state (kept)
  (function(){
    const btn = document.getElementById('theme-toggle');
    if(!btn) return;
    const setPressed = () => btn.setAttribute('aria-pressed', String(document.documentElement.classList.contains('dark')));
    setPressed();
    const onToggle = () => {
      const isDark = document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      setPressed();
    };
    btn.addEventListener('click', onToggle);
    btn.addEventListener('keydown', (e)=>{ if(e.key==='Enter' || e.key===' ') { e.preventDefault(); onToggle(); } });
  })();

  // intersection animation helper (kept)
  (function(){
    const host = document.querySelector('#section-four [data-animate]');
    if(!host) return;
    const io = new IntersectionObserver((ents)=>{
      ents.forEach(ent=>{
        if(ent.isIntersecting){
          ent.target.classList.add('is-visible');
          io.unobserve(ent.target);
        }
      });
    }, {threshold:.2});
    io.observe(host);
  })();

  // ripple press effect (kept)
  (function(){
    const btns = document.querySelectorAll('#section-four .ripple');
    btns.forEach(b=>{
      b.addEventListener('pointerdown', e=>{
        const r = b.getBoundingClientRect();
        b.style.setProperty('--x', (e.clientX - r.left) + 'px');
        b.style.setProperty('--y', (e.clientY - r.top) + 'px');
        b.classList.add('is-press');
        setTimeout(()=> b.classList.remove('is-press'), 450);
      }, {passive:true});
    });
  })();
</script>
