{{-- resources/views/components/sections/approach-leadgen.blade.php --}}
<section id="approach-leadgen" class="relative border-y-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- BG auras -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-blue-400/20 blur-3xl dark:from-cyan-400/10 dark:to-blue-500/10"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-indigo-300/20 to-fuchsia-300/20 blur-3xl dark:from-indigo-400/10 dark:to-fuchsia-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8 py-12">
    <!-- Title -->
    <header class="text-center max-w-3xl mx-auto">
      <h2 class="text-[#2ca8d9] text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight" data-aos="fade-up">
        Our Tried-and-True Method for Lead Generation and Cold Email Marketing
      </h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed" data-aos="fade-up" data-aos-delay="120">
        We create <strong>dependable lead pipelines</strong> through <strong>cold email campaigns</strong> that land in the inbox, spark real replies, and drive conversions.
        From ICP research to deliverability, personalization, and cadence design—every step is carefully crafted with ROI in mind.
      </p>
    </header>

    <div class="mt-12 grid lg:grid-cols-3 gap-8 items-start">
      <!-- Left: Trust / Proof -->
      <aside class="order-2 lg:order-1 space-y-6">
        <!-- Metric 1 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md ring-1 ring-black/5 dark:ring-white/5 p-6" data-aos="zoom-in">
          <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.59-3.3-3.3 1.42-1.42L13 13.34l3.88-3.88 1.42 1.42Z"/></svg>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Avg. Reply Rate</p>
          </div>
          <p class="mt-3 text-3xl font-extrabold text-gray-900 dark:text-white"><span class="count" data-target="18">0</span>%</p>
          <p class="text-sm text-gray-500 dark:text-gray-400">across B2B campaigns (last 90 days)</p>
        </div>
        <!-- Metric 2 -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md ring-1 ring-black/5 dark:ring-white/5 p-6" data-aos="zoom-in" data-aos-delay="80">
          <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-teal-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2Zm1 14.59-3.3-3.3 1.42-1.42L13 13.34l3.88-3.88 1.42 1.42Z"/></svg>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">Qualified Leads / Month</p>
          </div>
          <p class="mt-3 text-3xl font-extrabold text-gray-900 dark:text-white">~<span class="count" data-target="120">0</span></p>
          <p class="text-sm text-gray-500 dark:text-gray-400">for SMB & mid-market clients</p>
        </div>
        <!-- Badges -->
        <div class="flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="160">
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">DMARC/SPF/DKIM</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">Warm-up & Inboxing</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">Hyper-Personalization</span>
          <span class="px-3 py-1 rounded-full bg-white dark:bg-gray-800 shadow ring-1 ring-black/5 dark:ring-white/5 text-xs text-gray-700 dark:text-gray-200">A/B Copy Testing</span>
        </div>
      </aside>

      <!-- Right: Accordion (native details/summary) -->
      <div class="order-1 lg:order-2 lg:col-span-2">
        <div id="lg-accordion" class="space-y-4" data-single data-aos="fade-left">
          {{-- Item 1 (open by default) --}}
          <details class="acc-item group border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-900" open>
            <summary class="acc-btn flex list-none cursor-pointer items-center justify-between px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 select-none focus:outline-none focus:ring-2 focus:ring-sky-400">
              <span>ICP Research &amp; Laser-Targeted List Building</span>
              <svg class="chev h-4 w-4 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </summary>
            <div class="acc-body flow-root px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
              <p>We define your <strong>Ideal Customer Profile (ICP)</strong> using firmographics, technographics, and real buying intent—so every lead actually fits your offer.
              Then we source and verify <strong>work emails only</strong>, and enrich each record with role, location, tools used, and live signals that improve reply and conversion rates.</p>
              <ul class="list-disc pl-5">
                <li><strong>Data sources:</strong> LinkedIn, vetted vendor databases, ethical landing-page research, and relevant job boards</li>
                <li><strong>Validation:</strong> syntax + MX + catch-all checks with bounce-safe thresholds for better deliverability</li>
              </ul>
            </div>
          </details>

          {{-- Item 2 --}}
          <details class="acc-item group border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-900">
            <summary class="acc-btn flex list-none cursor-pointer items-center justify-between px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 select-none focus:outline-none focus:ring-2 focus:ring-sky-400">
              <span>Deliverability: Domains, DNS &amp; Warm-up</span>
              <svg class="chev h-4 w-4 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </summary>
            <div class="acc-body flow-root px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
              <p>We make sure your <strong>cold email campaigns</strong> actually land in the inbox—not spam.
              With correct <strong>SPF, DKIM, DMARC</strong> setup, custom tracking domains, and safe mailbox warm-ups, your sender reputation stays strong.
              Our emails are lightweight with proper plain-text support, so they look and feel human.</p>
              <ul class="list-disc pl-5">
                <li>Seed tests & spam-placement checks for every campaign</li>
                <li>Daily inbox health monitoring with auto-pause if deliverability dips</li>
              </ul>
            </div>
          </details>

          {{-- Item 3 --}}
          <details class="acc-item group border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-900">
            <summary class="acc-btn flex list-none cursor-pointer items-center justify-between px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 select-none focus:outline-none focus:ring-2 focus:ring-sky-400">
              <span>Personalized Copy &amp; Multi-Step Cadence</span>
              <svg class="chev h-4 w-4 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </summary>
            <div class="acc-body flow-root px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
              <p>Nobody replies to copy-paste templates. Our <strong>cold email outreach</strong> reads like a real conversation.
              We personalize subject lines, first lines, and value propositions—then schedule <strong>4–7 touches over 14–21 days</strong> (optionally with social bumpers).</p>
              <ul class="list-disc pl-5">
                <li>A/B testing on subject, CTA, and angle</li>
                <li>Human-like send windows, time-zone aware</li>
              </ul>
            </div>
          </details>

          {{-- Item 4 --}}
          <details class="acc-item group border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-900">
            <summary class="acc-btn flex list-none cursor-pointer items-center justify-between px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 select-none focus:outline-none focus:ring-2 focus:ring-sky-400">
              <span>Compliance &amp; Opt-out Hygiene</span>
              <svg class="chev h-4 w-4 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </summary>
            <div class="acc-body flow-root px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
              <p>We respect local regulations and best practices: clear sender identity, easy opt-out, and no misleading headers.
              Your list stays clean and safe so campaigns keep performing.</p>
              <ul class="list-disc pl-5">
                <li>Auto-suppress bounces, complainers, and inactive contacts</li>
                <li>Role accounts & risky domains filtered out</li>
              </ul>
            </div>
          </details>

          {{-- Item 5 --}}
          <details class="acc-item group border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-900">
            <summary class="acc-btn flex list-none cursor-pointer items-center justify-between px-6 py-4 text-base md:text-lg font-semibold text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-800 select-none focus:outline-none focus:ring-2 focus:ring-sky-400">
              <span>Pipeline, Routing &amp; Analytics</span>
              <svg class="chev h-4 w-4 transition-transform duration-300 group-open:rotate-180" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </summary>
            <div class="acc-body flow-root px-6 py-5 text-gray-600 dark:text-gray-400 space-y-3">
              <p>We sync replies to your CRM, auto-route meetings, and track source → deal. Weekly reports show opens, clicks, replies, interest, meetings booked, and revenue—so you always know your ROI.</p>
              <ul class="list-disc pl-5">
                <li>Native/SMTP piping with CRM enrichment</li>
                <li>Weekly optimization sprints</li>
              </ul>
            </div>
          </details>
        </div>

        <!-- CTA -->
        <div class="mt-8 flex flex-col sm:flex-row items-center gap-3" data-aos="fade-up">
          <a href="/contact" class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-[#2ca8d9] text-white font-semibold shadow hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800 active:scale-95">
            Get a Lead Gen Plan
          </a>
          <a href="#case-studies" class=" hidden inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 font-semibold shadow ring-1 ring-black/5 dark:ring-white/5 hover:shadow-lg active:scale-95">
            See Cold Email Case Studies
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Tiny script: single-open mode for <details> + AOS + counters -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // AOS safe-init
      if (window.AOS && !window.__aosInitialized) {
        AOS.init({ duration: 800, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 80 });
        window.__aosInitialized = true;
      }

      // Single-open for details
      const wrap = document.getElementById('lg-accordion');
      if (wrap) {
        wrap.addEventListener('toggle', (e) => {
          const t = e.target;
          if (t.tagName !== 'DETAILS' || !t.open) return;
          if (wrap.hasAttribute('data-single')) {
            wrap.querySelectorAll('details[open]').forEach(d => { if (d !== t) d.removeAttribute('open'); });
          }
        });
      }

      // Counters
      const counters = document.querySelectorAll('#approach-leadgen .count');
      if (counters.length) {
        const io = new IntersectionObserver((ents) => {
          ents.forEach(ent => {
            if (!ent.isIntersecting) return;
            const el = ent.target, target = +el.dataset.target || 0, dur = 900, t0 = performance.now();
            const tick = (t)=>{ const p=Math.min((t-t0)/dur,1); el.textContent=Math.floor(target*p); if(p<1)requestAnimationFrame(tick); };
            requestAnimationFrame(tick); io.unobserve(el);
          });
        }, { threshold: 0.35 });
        counters.forEach(c => io.observe(c));
      }
    });
  </script>

  <style>
    /* Marker hide */
    summary::-webkit-details-marker { display: none; }

    /* Chev rotate fallback (if Tailwind group-open absent) */
    details[open] .chev { transform: rotate(180deg); }
    .acc-btn .chev { transition: transform .3s ease; }

    /* Join header + body nicely when open */
    details.acc-item[open] { background-color:#ffffff; }
    .dark details.acc-item[open] { background-color:#0b1220; } /* match dark container */
    details.acc-item[open] > summary{
      border-bottom:1px solid rgba(0,0,0,.08);
      background:#f9fafb;
      border-bottom-left-radius:0;border-bottom-right-radius:0;
    }
    .dark details.acc-item[open] > summary{
      border-bottom-color: rgba(255,255,255,.12);
      background:#1f2937; /* dark:bg-gray-800 */
    }
    details.acc-item[open] > .acc-body{
      border-bottom-left-radius:.75rem; /* rounded-xl */
      border-bottom-right-radius:.75rem;
    }

    /* Margin collapsing fix so 2nd time open looks same as first time */
    details.acc-item > .acc-body > *:first-child { margin-top:0 !important; }
    details.acc-item > .acc-body > *:last-child  { margin-bottom:0 !important; }
  </style>
</section>
