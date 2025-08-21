{{-- resources/views/components/sections/approach-leadgen.blade.php --}}
<section id="approach-leadgen" class="relative border-y-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- Background auras for classic-lively feel -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-blue-400/20 blur-3xl dark:from-cyan-400/10 dark:to-blue-500/10"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-indigo-300/20 to-fuchsia-300/20 blur-3xl dark:from-indigo-400/10 dark:to-fuchsia-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8 py-12">
    <!-- Title / Intro (SEO: Lead Generation + Cold Email Marketing) -->
    <header class="text-center max-w-3xl mx-auto">
      <h2 class="text-[#2ca8d9] text-4xl lg:text-5xl font-extrabold tracking-tight">
        Lead Generation & Cold Email Marketing — Our Proven Approach
      </h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
        We build <strong>predictable lead pipelines</strong> with <strong>cold email campaigns</strong> that inbox, get replies, and convert. From ICP research to deliverability, personalization, and cadence design—every step is engineered for ROI.
      </p>
    </header>

    <div class="mt-12 grid lg:grid-cols-3 gap-8 items-start">
      <!-- Left: Trust / Proof (cards) -->
      <aside class="order-2 lg:order-1 space-y-6">
        <!-- Metric card 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md ring-1 ring-black/5 dark:ring-white/5 p-6">
          <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.59-3.3-3.3 1.42-1.42L13 13.34l3.88-3.88 1.42 1.42Z"/></svg>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Avg. Reply Rate</p>
          </div>
          <p class="mt-3 text-3xl font-extrabold text-gray-900 dark:text-white"><span class="count" data-target="18">0</span>%</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">across B2B campaigns (last 90 days)</p>
        </div>
        <!-- Metric card 2 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md ring-1 ring-black/5 dark:ring-white/5 p-6">
          <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-teal-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.59-3.3-3.3 1.42-1.42L13 13.34l3.88-3.88 1.42 1.42Z"/></svg>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Qualified Leads / Month</p>
          </div>
          <p class="mt-3 text-3xl font-extrabold text-gray-900 dark:text-white">~<span class="count" data-target="120">0</span></p>
          <p class="text-sm text-gray-500 dark:text-gray-400">for SMB & mid-market clients</p>
        </div>
        <!-- Mini badges -->
        <div class="flex flex-wrap gap-3">
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">DMARC/SPF/DKIM</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">Warm-up & Inboxing</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">Hyper-Personalization</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">A/B Copy Testing</span>
        </div>
      </aside>

      <!-- Right: Accordion Process -->
      <div class="order-1 lg:order-2 lg:col-span-2">
        <div id="lg-accordion" class="space-y-4">
          <!-- Step 1 -->
          <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
            <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="true">
              <span>ICP Research & Laser-Targeted List Building</span>
              <svg class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="acc-panel max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
              <div class="px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
                <p>Define Ideal Customer Profile by firmographics, technographics & intent. We source & verify contacts (work email only), enrich with role, location, tools used, and buying signals.</p>
                <ul class="list-disc pl-5">
                  <li>Data sources: LinkedIn, vendor databases, landing-page scrapes (ethical), job boards</li>
                  <li>Validation: syntax + MX + catch-all checks, bounce-safe thresholds</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Step 2 -->
          <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
            <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="false">
              <span>Deliverability: Domains, DNS & Warm-up</span>
              <svg class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="acc-panel max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
              <div class="px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
                <p>We set up <strong>DMARC, SPF, DKIM</strong>, custom tracking domains, and warm mailboxes gradually to protect sender reputation. HTML is lightweight, no heavy images, correct plain-text parts.</p>
                <ul class="list-disc pl-5">
                  <li>Seed tests + spam placement checks</li>
                  <li>Daily health monitoring & auto-pauses on dip</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Step 3 -->
          <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
            <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="false">
              <span>Personalized Copy & Multi‑Step Cadence</span>
              <svg class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="acc-panel max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
              <div class="px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
                <p>We craft first‑line personalization and value-forward copy. Cadence spans 4–7 touches over 14–21 days with social bumpers (optional).</p>
                <ul class="list-disc pl-5">
                  <li>A/B testing: subject, CTA, angle</li>
                  <li>Human-like send windows, time‑zone aware</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Step 4 -->
          <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
            <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="false">
              <span>Compliance & Opt‑out Hygiene</span>
              <svg class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="acc-panel max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
              <div class="px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
                <p>Respect local regulations and best practices: clear sender identity, simple opt‑out, no misleading headers.</p>
                <ul class="list-disc pl-5">
                  <li>Auto‑suppress bounces, complainers, and inactive</li>
                  <li>Role accounts & risky domains filtered out</li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Step 5 -->
          <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
            <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="false">
              <span>Pipeline, Routing & Analytics</span>
              <svg class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="acc-panel max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
              <div class="px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
                <p>We sync replies to your CRM, auto‑route meetings, and track source → deal. Reporting covers opens, clicks, replies, interested, meetings booked, and revenue.</p>
                <ul class="list-disc pl-5">
                  <li>Native/SMTP piping + CRM enrichment</li>
                  <li>Weekly optimization sprints</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- CTA -->
        <div class="mt-8 flex flex-col sm:flex-row items-center gap-3">
          <a href="#contact" class="btn ripple inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-[#2ca8d9] text-white font-semibold shadow hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
            Get a Lead Gen Plan
          </a>
          <a href="#case-studies" class="btn ripple inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 font-semibold shadow ring-1 ring-black/5 dark:ring-white/5 hover:shadow-lg">
            See Cold Email Case Studies
          </a>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Ripple click/touch feedback */
    .ripple{position:relative;overflow:hidden}
    .ripple::after{content:'';position:absolute;inset:auto;width:0;height:0;border-radius:9999px;background:rgba(255,255,255,.35);transform:translate(-50%,-50%);pointer-events:none;opacity:0}
    .ripple:active::after{left:var(--x);top:var(--y);opacity:1;width:220px;height:220px;transition:width .45s ease,height .45s ease,opacity .9s ease;opacity:0}
  </style>

  <script>
    // Accordion logic
    document.querySelectorAll('#lg-accordion .acc-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const rect=e.currentTarget.getBoundingClientRect();
        e.currentTarget.style.setProperty('--x', (e.clientX-rect.left)+'px');
        e.currentTarget.style.setProperty('--y', (e.clientY-rect.top)+'px');

        const panel = btn.nextElementSibling;
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!expanded));
        btn.querySelector('svg').classList.toggle('rotate-180');
        if (!expanded) {
          panel.style.maxHeight = panel.scrollHeight + 'px';
        } else {
          panel.style.maxHeight = '0px';
        }
      });
    });

    // Count-up metrics on view
    const counters = document.querySelectorAll('#approach-leadgen .count');
    const obs = new IntersectionObserver((entries)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          const el = entry.target; const target = +el.dataset.target; let cur=0; const dur=900; const t0=performance.now();
          const tick=(t)=>{ const p=Math.min((t-t0)/dur,1); cur=Math.floor(target*p); el.textContent=cur; if(p<1) requestAnimationFrame(tick); };
          requestAnimationFrame(tick);
          obs.unobserve(el);
        }
      });
    },{threshold:.35});
    counters.forEach(c=>obs.observe(c));
  </script>
</section>
