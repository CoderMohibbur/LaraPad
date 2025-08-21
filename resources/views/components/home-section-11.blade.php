{{-- resources/views/components/sections/leadgen-coldemail-replace-ppc.blade.php --}}
<section id="leadgen-coldemail-replace-ppc" class="relative border-t-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- Ambient glow -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -left-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-sky-400/20 blur-3xl dark:from-cyan-400/10 dark:to-sky-500/10"></div>
    <div class="absolute -bottom-24 -right-24 h-80 w-80 rounded-full bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20 blur-3xl dark:from-fuchsia-400/10 dark:to-indigo-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto py-12 px-6 lg:px-8">
    <!-- Title / SEO intro -->
    <header class="text-center max-w-3xl mx-auto">
      <h2 class="text-[#2ca8d9] text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight">
        Lead Generation & Cold Email Marketing
      </h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
        Stop wasting ad spend. Build a <strong>predictable pipeline</strong> with <strong>cold email</strong> that inboxes, gets replies, and books meetings—without paying per click.
      </p>
    </header>

    <div class="mt-12 flex flex-col lg:flex-row items-center gap-10">
      <!-- Left: Content -->
      <div class="w-full lg:w-1/2 order-2 lg:order-1 space-y-6">
        <p class="text-[#8b939b] dark:text-gray-400 text-lg font-medium">
          Our custom strategy treats your sender reputation and domains like assets we own. We monitor deliverability daily and make real‑time adjustments—just like a trader protects capital.
        </p>

        <!-- Reframed A.C.E. for Cold Email -->
        <div class="rounded-2xl bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 p-6">
          <h3 class="text-xl font-bold text-gray-900 dark:text-white">A.C.E. Methodology for Cold Email</h3>
          <ul class="mt-4 space-y-4 text-[#29435a] dark:text-slate-200 text-base md:text-lg font-semibold">
            <li class="flex gap-3 items-start">
              <span class="check">✓</span>
              <div>
                Assets <span class="font-normal text-[#5d7183]">— Verified lists, warming inboxes, custom tracking domains, lean HTML & plain‑text.</span>
              </div>
            </li>
            <li class="flex gap-3 items-start">
              <span class="check">✓</span>
              <div>
                Control <span class="font-normal text-[#5d7183]">— DMARC/SPF/DKIM, send windows, throttling, and reply‑routing. No set‑and‑forget.</span>
              </div>
            </li>
            <li class="flex gap-3 items-start">
              <span class="check">✓</span>
              <div>
                Experimentation <span class="font-normal text-[#5d7183]">— A/B subject & CTA tests, angle trials, and first‑line personalization at scale.</span>
              </div>
            </li>
          </ul>
        </div>

        <!-- Chips -->
        <div class="flex flex-wrap gap-2">
          <span class="chip">ICP Research</span>
          <span class="chip">Warm‑up & Inboxing</span>
          <span class="chip">Hyper‑Personalization</span>
          <span class="chip">A/B Copy Testing</span>
          <span class="chip">CRM Sync</span>
        </div>

        <!-- Metrics -->
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
          <a href="#case-studies" class="btn-secondary ripple">See Cold Email Wins</a>
        </div>
      </div>

      <!-- Right: Visual -->
      <div class="w-full lg:w-1/2 order-1 lg:order-2 lg:pr-10">
        <figure class="relative group">
          <img src="/images/cold-email-dashboard.png" alt="Cold Email Dashboard"
               class="w-full rounded-2xl shadow-lg ring-1 ring-black/5 dark:ring-white/5 transition-transform duration-700 group-hover:scale-[1.04] object-cover min-h-[260px]" />
          <figcaption class="sr-only">Cold email performance dashboard</figcaption>
          <div class="absolute -top-4 -left-4 bg-white dark:bg-gray-800 rounded-xl shadow px-3 py-2 ring-1 ring-black/5 dark:ring-white/5 text-xs font-semibold text-gray-700 dark:text-gray-200">
            Inbox Placement ↑
          </div>
        </figure>
      </div>
    </div>
  </div>

  <style>
    /* atoms */
    #leadgen-coldemail-replace-ppc .chip{padding:.35rem .6rem;border-radius:9999px;background:rgba(255,255,255,.9);backdrop-filter:blur(4px);box-shadow:0 6px 18px rgba(2,10,28,.08);border:1px solid rgba(0,0,0,.06);color:#334155}
    @media (prefers-color-scheme:dark){#leadgen-coldemail-replace-ppc .chip{background:rgba(17,24,39,.9);border-color:rgba(255,255,255,.08);color:#e5e7eb}}
    #leadgen-coldemail-replace-ppc .check{display:inline-flex;align-items:center;justify-content:center;height:1.5rem;width:1.5rem;border-radius:9999px;background:#2ca8d9;color:white;font-weight:800}
    #leadgen-coldemail-replace-ppc .metric{background:rgba(255,255,255,.9);border-radius:1rem;padding:1rem;box-shadow:0 10px 26px rgba(2,10,28,.10);border:1px solid rgba(0,0,0,.05)}
    @media (prefers-color-scheme:dark){#leadgen-coldemail-replace-ppc .metric{background:rgba(17,24,39,.9);border-color:rgba(255,255,255,.06)}}
    #leadgen-coldemail-replace-ppc .metric-value{font-size:1.8rem;line-height:1.2;font-weight:800;color:#0f172a}
    #leadgen-coldemail-replace-ppc .metric-label{font-size:.85rem;color:#64748b}
    @media (prefers-color-scheme:dark){#leadgen-coldemail-replace-ppc .metric-value{color:#fff}#leadgen-coldemail-replace-ppc .metric-label{color:#9ca3af}}

    /* Buttons */
    #leadgen-coldemail-replace-ppc .btn-primary{display:inline-flex;align-items:center;justify-content:center;padding:.9rem 1.2rem;border-radius:1rem;background:#2ca8d9;color:#fff;font-weight:700;box-shadow:0 10px 24px rgba(44,168,217,.28)}
    #leadgen-coldemail-replace-ppc .btn-primary:hover{box-shadow:0 16px 36px rgba(44,168,217,.4);transform:translateY(-1px);transition:all .25s ease}
    #leadgen-coldemail-replace-ppc .btn-secondary{display:inline-flex;align-items:center;justify-content:center;padding:.9rem 1.2rem;border-radius:1rem;background:#fff;color:#111827;font-weight:700;box-shadow:0 10px 18px rgba(2,10,28,.08);border:1px solid rgba(0,0,0,.06)}
    @media (prefers-color-scheme:dark){#leadgen-coldemail-replace-ppc .btn-secondary{background:#111827;color:#e5e7eb;border-color:rgba(255,255,255,.08)}}

    /* Ripple */
    .ripple{position:relative;overflow:hidden}
    .ripple::after{content:"";position:absolute;inset:auto;width:0;height:0;border-radius:9999px;background:rgba(255,255,255,.35);transform:translate(-50%,-50%);pointer-events:none;opacity:0}
    .ripple:active::after{left:var(--x);top:var(--y);opacity:1;width:220px;height:220px;transition:width .45s ease,height .45s ease,opacity .9s ease;opacity:0}
  </style>

  <script>
    // ripple feedback
    document.querySelectorAll('#leadgen-coldemail-replace-ppc .ripple').forEach(btn=>{
      btn.addEventListener('click',e=>{const r=btn.getBoundingClientRect();btn.style.setProperty('--x',(e.clientX-r.left)+'px');btn.style.setProperty('--y',(e.clientY-r.top)+'px');});
    });

    // count-up metrics when visible
    const counters=document.querySelectorAll('#leadgen-coldemail-replace-ppc .count');
    const obs=new IntersectionObserver((entries)=>{ entries.forEach(entry=>{ if(entry.isIntersecting){ const el=entry.target; const target=+el.dataset.target; const t0=performance.now(); const dur=900; const tick=(t)=>{ const p=Math.min((t-t0)/dur,1); el.textContent=Math.floor(target*p); if(p<1) requestAnimationFrame(tick); }; requestAnimationFrame(tick); obs.unobserve(el); } }); },{threshold:.35});
    counters.forEach(c=>obs.observe(c));
  </script>
</section>
