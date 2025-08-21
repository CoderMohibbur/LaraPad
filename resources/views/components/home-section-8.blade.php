{{-- resources/views/components/sections/leadgen-coldemail.blade.php --}}
<section id="leadgen-coldemail" class="relative border-t-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- Ambient background for classic lively feel -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-28 -right-24 h-80 w-80 rounded-full bg-gradient-to-tr from-cyan-300/20 to-sky-400/20 blur-3xl dark:from-cyan-400/10 dark:to-sky-500/10"></div>
    <div class="absolute -bottom-28 -left-24 h-96 w-96 rounded-full bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20 blur-3xl dark:from-fuchsia-400/10 dark:to-indigo-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8 py-14">
    <!-- Title / Intro (SEO: Lead Generation + Cold Email Marketing) -->
    <header class="text-center max-w-4xl mx-auto">
      <h2 class="text-[#2ca8d9] text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight">
        Lead Generation & Cold Email Marketing — Predictable Pipeline, Real Revenue
      </h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
        We build <strong>ROI-first lead generation</strong> systems powered by <strong>cold email campaigns</strong> that inbox, get replies, and convert to meetings. From ICP research to deliverability and cadence optimization—every step is engineered for scale.
      </p>
    </header>

    <!-- Content Grid -->
    <div class="mt-12 grid lg:grid-cols-2 gap-10 items-center">
      <!-- Left: Value bullets + chips -->
      <div class="order-2 lg:order-1 space-y-8">
        <!-- Trust chips -->
        <div class="flex flex-wrap gap-2">
          <span class="chip">DMARC / SPF / DKIM</span>
          <span class="chip">Custom Tracking Domains</span>
          <span class="chip">Warm‑up & Inboxing</span>
          <span class="chip">Hyper‑Personalization</span>
          <span class="chip">A/B Copy Testing</span>
          <span class="chip">CRM Sync & Routing</span>
        </div>

        <!-- Benefits list -->
        <ul class="space-y-5">
          @foreach ([
            ['title' => 'Laser‑Targeted Lead Generation', 'desc' => 'ICP‑driven prospecting with verified work emails, intent, and technographics for higher connect rates.'],
            ['title' => 'Cold Email That Lands & Converts', 'desc' => 'Deliverability‑first setup, human‑like send windows, and value‑forward copy for more replies.'],
            ['title' => 'Personalized Cadence Design', 'desc' => '4–7 touch sequences over 14–21 days with first‑line personalization and optional social bumpers.'],
            ['title' => 'Analytics, Attribution & Scale', 'desc' => 'End‑to‑end tracking—opens, replies, interest, meetings, revenue. Weekly optimization sprints.'],
          ] as $row)
          <li class="flex gap-4">
            <span class="check">✓</span>
            <div>
              <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white">{{ $row['title'] }}</h3>
              <p class="mt-1 text-gray-600 dark:text-gray-400">{{ $row['desc'] }}</p>
            </div>
          </li>
          @endforeach
        </ul>

        <!-- Metrics (count‑up) -->
        <div class="grid grid-cols-2 gap-4">
          <div class="metric">
            <p class="metric-value"><span class="count" data-target="18">0</span>%</p>
            <p class="metric-label">Avg. Reply Rate</p>
          </div>
          <div class="metric">
            <p class="metric-value">~<span class="count" data-target="120">0</span></p>
            <p class="metric-label">Qualified Leads / Month</p>
          </div>
        </div>

        <!-- CTA -->
        <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
          <a href="#contact" class="btn-primary ripple">Get Your Lead Gen Plan</a>
          <a href="#case-studies" class="btn-secondary ripple">See Cold Email Case Studies</a>
        </div>
      </div>

      <!-- Right: Illustration / Image -->
      <div class="order-1 lg:order-2">
        <figure class="relative group">
          <img src="/images/leadgen-coldemail-illustration.png" alt="Lead Generation & Cold Email Marketing"
               class="w-full rounded-2xl shadow-lg ring-1 ring-black/5 dark:ring-white/5 transition-transform duration-700 group-hover:scale-[1.03] object-cover min-h-[260px]" />
          <figcaption class="sr-only">Lead Gen & Cold Email pipeline illustration</figcaption>

          <!-- subtle floating badge -->
          <div class="absolute -top-4 -left-4 bg-white dark:bg-gray-800 rounded-xl shadow px-3 py-2 ring-1 ring-black/5 dark:ring-white/5 text-xs font-semibold text-gray-700 dark:text-gray-200">
            Inbox Placement ↑
          </div>
        </figure>
      </div>
    </div>

    <!-- Process Accordion -->
    <div class="mt-14" id="lgce-accordion">
      @php
        $steps = [
          ['title' => 'ICP Research & List Building', 'body' => 'Define Ideal Customer Profile by firmographics, technographics & intent. Verify contacts (syntax + MX + catch‑all) and enrich with role, location, and buying signals.'],
          ['title' => 'Deliverability Setup', 'body' => 'Sub‑domains, DMARC/SPF/DKIM, custom tracking domain, gradual warm‑up, seed tests & spam checks. HTML kept lightweight with proper plain‑text.'],
          ['title' => 'Personalized Copy & Cadence', 'body' => 'First‑line personalization, value‑forward messaging. 4–7 touch sequences, time‑zone aware windows. A/B test subject, CTA, and angles.'],
          ['title' => 'Compliance & Opt‑out Hygiene', 'body' => 'Clear sender identity, simple opt‑out, no misleading headers. Auto‑suppress bounces, complainers, and risky role accounts.'],
          ['title' => 'CRM Sync, Routing & Analytics', 'body' => 'Pipe replies into CRM, auto‑route meetings, attribute revenue. Track opens, clicks, replies, interested, meetings, deals.'],
        ];
      @endphp

      <div class="space-y-4">
        @foreach ($steps as $i => $step)
        <div class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden">
          <button type="button" class="acc-btn flex items-center justify-between w-full px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800" aria-expanded="{{ $i===0 ? 'true' : 'false' }}">
            <span>{{ $step['title'] }}</span>
            <svg class="h-4 w-4 transition-transform duration-300 {{ $i===0 ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div class="acc-panel {{ $i===0 ? 'max-h-96' : 'max-h-0' }} overflow-hidden transition-all duration-500 ease-in-out bg-white dark:bg-gray-900">
            <div class="px-6 py-5 text-gray-600 dark:text-gray-400">{{ $step['body'] }}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <style>
    /* UI atoms */
    #leadgen-coldemail .chip{padding:.35rem .6rem;border-radius:9999px;background:rgba(255,255,255,.8);backdrop-filter:blur(4px);box-shadow:0 6px 18px rgba(2,10,28,.08);border:1px solid rgba(0,0,0,.06);color:#334155}
    @media (prefers-color-scheme:dark){#leadgen-coldemail .chip{background:rgba(17,24,39,.8);border-color:rgba(255,255,255,.08);color:#e5e7eb}}
    #leadgen-coldemail .check{display:inline-flex;align-items:center;justify-content:center;height:1.65rem;width:1.65rem;border-radius:9999px;background:#22c55e;color:white;font-weight:700}
    #leadgen-coldemail .metric{background:rgba(255,255,255,.9);border-radius:1rem;padding:1rem;box-shadow:0 10px 26px rgba(2,10,28,.10);border:1px solid rgba(0,0,0,.05)}
    @media (prefers-color-scheme:dark){#leadgen-coldemail .metric{background:rgba(17,24,39,.9);border-color:rgba(255,255,255,.06)}}
    #leadgen-coldemail .metric-value{font-size:1.8rem;line-height:1.2;font-weight:800;color:#0f172a}
    #leadgen-coldemail .metric-label{font-size:.85rem;color:#64748b}
    @media (prefers-color-scheme:dark){#leadgen-coldemail .metric-value{color:#fff}#leadgen-coldemail .metric-label{color:#9ca3af}}

    /* Buttons */
    #leadgen-coldemail .btn-primary{display:inline-flex;align-items:center;justify-content:center;padding:.9rem 1.2rem;border-radius:1rem;background:#2ca8d9;color:#fff;font-weight:700;box-shadow:0 10px 24px rgba(44,168,217,.28)}
    #leadgen-coldemail .btn-primary:hover{box-shadow:0 16px 36px rgba(44,168,217,.4);transform:translateY(-1px);transition:all .25s ease}
    #leadgen-coldemail .btn-secondary{display:inline-flex;align-items:center;justify-content:center;padding:.9rem 1.2rem;border-radius:1rem;background:#fff;color:#111827;font-weight:700;box-shadow:0 10px 18px rgba(2,10,28,.08);border:1px solid rgba(0,0,0,.06)}
    @media (prefers-color-scheme:dark){#leadgen-coldemail .btn-secondary{background:#111827;color:#e5e7eb;border-color:rgba(255,255,255,.08)}}

    /* Ripple */
    .ripple{position:relative;overflow:hidden}
    .ripple::after{content:"";position:absolute;inset:auto;width:0;height:0;border-radius:9999px;background:rgba(255,255,255,.35);transform:translate(-50%,-50%);pointer-events:none;opacity:0}
    .ripple:active::after{left:var(--x);top:var(--y);opacity:1;width:220px;height:220px;transition:width .45s ease,height .45s ease,opacity .9s ease;opacity:0}
  </style>

  <script>
    // Ripple feedback
    document.querySelectorAll('#leadgen-coldemail .ripple').forEach(btn=>{
      btn.addEventListener('click',e=>{const r=btn.getBoundingClientRect();btn.style.setProperty('--x',(e.clientX-r.left)+'px');btn.style.setProperty('--y',(e.clientY-r.top)+'px');});
    });

    // Accordion logic
    document.querySelectorAll('#lgce-accordion .acc-btn').forEach(btn=>{
      btn.addEventListener('click',()=>{
        const panel=btn.nextElementSibling; const expanded=btn.getAttribute('aria-expanded')==='true';
        btn.setAttribute('aria-expanded',!expanded); btn.querySelector('svg').classList.toggle('rotate-180');
        if(!expanded){ panel.style.maxHeight=panel.scrollHeight+'px'; } else { panel.style.maxHeight='0px'; }
      });
    });

    // Count-up metrics when visible
    const counters=document.querySelectorAll('#leadgen-coldemail .count');
    const obs=new IntersectionObserver((entries)=>{ entries.forEach(entry=>{ if(entry.isIntersecting){ const el=entry.target; const target=+el.dataset.target; const t0=performance.now(); const dur=900; const tick=(t)=>{ const p=Math.min((t-t0)/dur,1); el.textContent=Math.floor(target*p); if(p<1) requestAnimationFrame(tick); }; requestAnimationFrame(tick); obs.unobserve(el); } }); },{threshold:.35});
    counters.forEach(c=>obs.observe(c));
  </script>
</section>
