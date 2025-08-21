<!-- Section Ten Start (Final Lead Gen + Cold Email Marketing Redesign) -->
<section id="section-ten" class="relative isolate overflow-hidden border-t-2 bg-gradient-to-b from-white to-gray-50 dark:from-gray-950 dark:to-gray-900">
  <!-- background accents -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-20 left-[10%] h-72 w-72 rounded-full bg-sky-400/15 blur-3xl"></div>
    <div class="absolute -bottom-20 right-[15%] h-80 w-80 rounded-full bg-indigo-400/15 blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto py-16 px-5 md:px-10" data-animate>
    <!-- Heading -->
    <div class="text-center max-w-3xl mx-auto">
      <h1 class="reveal-up text-3xl md:text-4xl lg:text-5xl font-extrabold leading-tight">
        <span class="bg-gradient-to-r from-sky-400 via-indigo-300 to-sky-500 bg-clip-text text-transparent">Lead Generation & Cold Email Marketing</span>
      </h1>
      <p class="reveal-up mt-5 text-gray-600 dark:text-gray-300 text-base sm:text-lg lg:text-xl leading-relaxed">
        Fill your pipeline with qualified leads using personalized cold email outreach. We combine strategy, tech, and creative to book you more meetings with your ideal customers.
      </p>
    </div>

    <!-- Grid Content -->
    <div class="mt-14 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
      <!-- Left: service copy -->
      <div class="space-y-6 order-2 lg:order-1">
        <div class="reveal-up">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Audience Research</h3>
          <p class="mt-2 text-gray-600 dark:text-gray-300 text-base">Define and enrich your ICP with verified contacts, intent signals, and trigger events.</p>
        </div>
        <div class="reveal-up">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Personalized Messaging</h3>
          <p class="mt-2 text-gray-600 dark:text-gray-300 text-base">Custom first‑lines and offer‑driven sequences that resonate and drive responses.</p>
        </div>
        <div class="reveal-up">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Deliverability & Tech</h3>
          <p class="mt-2 text-gray-600 dark:text-gray-300 text-base">SPF, DKIM, DMARC, warmup, rotation, and monitoring—engineered for inbox placement.</p>
        </div>
        <div class="reveal-up">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Optimization & Reporting</h3>
          <p class="mt-2 text-gray-600 dark:text-gray-300 text-base">A/B testing, reply tracking, and CRM handoff to keep pipeline and sales aligned.</p>
        </div>
      </div>

      <!-- Right: image/visual -->
      <div class="order-1 lg:order-2">
        <img src="https://www.searchbloom.com/wp-content/uploads/2020/04/ecommerce-seo-image.jpg" alt="Lead generation outreach" class="w-full rounded-2xl shadow-xl">
      </div>
    </div>

    <!-- Metrics row -->
    <div class="mt-14 grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div class="reveal-up rounded-xl bg-white dark:bg-[#0b1220]/80 border border-gray-200 dark:border-white/10 shadow p-6 text-center">
        <p class="text-3xl font-extrabold text-sky-500">40%+</p>
        <p class="mt-1 text-gray-600 dark:text-gray-300 text-sm">Open Rates</p>
      </div>
      <div class="reveal-up rounded-xl bg-white dark:bg-[#0b1220]/80 border border-gray-200 dark:border-white/10 shadow p-6 text-center">
        <p class="text-3xl font-extrabold text-sky-500">15%+</p>
        <p class="mt-1 text-gray-600 dark:text-gray-300 text-sm">Reply Rates</p>
      </div>
      <div class="reveal-up rounded-xl bg-white dark:bg-[#0b1220]/80 border border-gray-200 dark:border-white/10 shadow p-6 text-center">
        <p class="text-3xl font-extrabold text-sky-500">SQLs</p>
        <p class="mt-1 text-gray-600 dark:text-gray-300 text-sm">Sales Qualified Leads Delivered</p>
      </div>
    </div>

    <!-- CTA -->
    <div class="reveal-up mt-12 flex flex-col sm:flex-row justify-center items-center gap-4">
      <a href="#contact" class="ripple inline-flex items-center justify-center rounded-2xl bg-sky-500/90 px-8 py-3 text-white font-semibold shadow-lg hover:bg-sky-600 transition-transform hover:-translate-y-0.5">
        Get a Free Lead Plan
      </a>
      <a href="#cases" class="ripple inline-flex items-center justify-center rounded-2xl bg-white/10 px-8 py-3 text-sky-700 dark:text-sky-300 font-semibold backdrop-blur border border-white/20 hover:bg-white/20">
        See Case Studies
      </a>
    </div>
  </div>
</section>
<!-- Section Ten End -->

<style>
  .reveal-up{opacity:0;transform:translateY(20px);transition:opacity .7s ease,transform .7s ease}
  .is-visible .reveal-up{opacity:1;transform:none}
  .ripple{position:relative;overflow:hidden}
  .ripple:after{content:'';position:absolute;inset:auto;width:0;height:0;border-radius:9999px;background:rgba(255,255,255,.35);transform:translate(-50%,-50%);pointer-events:none;opacity:0}
  .ripple:active:after{left:var(--x);top:var(--y);opacity:1;width:200px;height:200px;transition:width .4s ease,height .4s ease,opacity .8s ease;opacity:0}
</style>
<script>
  (function(){
    const prefersReduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const root=document.querySelector('#section-ten [data-animate]');
    if(root){
      if(!prefersReduced){
        const io=new IntersectionObserver((entries)=>{
          entries.forEach(entry=>{if(entry.isIntersecting){root.classList.add('is-visible');io.unobserve(root);}})
        },{threshold:0.18}); io.observe(root);
      } else {root.classList.add('is-visible');}
    }
    document.addEventListener('pointerdown',(e)=>{const btn=e.target.closest('.ripple');if(!btn)return;const rect=btn.getBoundingClientRect();btn.style.setProperty('--x',(e.clientX-rect.left)+'px');btn.style.setProperty('--y',(e.clientY-rect.top)+'px');});
  })();
</script>
