{{-- resources/views/components/sections/section-seven.blade.php --}}
<!-- AOS একবার লোড করা থাকলে বাদ দিন -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
<script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    if(window.AOS){
      AOS.init({ duration:800, easing:'cubic-bezier(.2,.7,.2,1)', once:true, offset:80 });
    }
  });
</script>

<!-- Section Seven -->
<section id="section-seven" class="relative isolate overflow-hidden">
  <!-- soft bg accents -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 left-[8%] h-72 w-72 rounded-full bg-cyan-400/15 blur-3xl"></div>
    <div class="absolute -bottom-24 right-[8%] h-96 w-96 rounded-full bg-indigo-400/15 blur-3xl"></div>
  </div>

  <div class="relative text-center py-14 px-5 md:px-8 max-w-7xl mx-auto">
    <!-- Title -->
    <h2 class="mx-auto max-w-5xl text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight"
        data-aos="fade-up">
      <span class="bg-gradient-to-r from-cyan-400 via-sky-400 to-indigo-500 bg-clip-text text-transparent">Lead Generation</span>
      <span class="mx-1 md:mx-2 text-slate-900 dark:text-white">&</span>
      <span class="bg-gradient-to-r from-violet-400 via-sky-400 to-cyan-400 bg-clip-text text-transparent">Cold Email Marketing</span>
      <span aria-hidden="true" class="block h-2 mt-2 mx-auto max-w-[520px] rounded-full
                   bg-gradient-to-r from-cyan-500/25 via-sky-400/25 to-cyan-500/25"></span>
    </h2>

    <!-- subtitle -->
    <p class="mt-4 text-base sm:text-lg text-slate-700 dark:text-gray-300 max-w-3xl mx-auto"
       data-aos="fade-up" data-aos-delay="120">
      We find the right people, write to them like humans, and earn replies.  
      No lock-ins. No fluff. Just conversations that turn into meetings.
    </p>

    <!-- quick process chips -->
    <ol class="mt-6 flex flex-wrap items-center justify-center gap-2 text-xs sm:text-sm text-slate-700 dark:text-gray-300"
        data-aos="zoom-in" data-aos-delay="180">
      <li class="rounded-full border border-slate-400/35 bg-white/60 dark:border-white/15 dark:bg-white/10 px-3 py-1">Who you help &amp; why they care</li>
      <li class="rounded-full border border-slate-400/35 bg-white/60 dark:border-white/15 dark:bg-white/10 px-3 py-1">Real people, verified</li>
      <li class="rounded-full border border-slate-400/35 bg-white/60 dark:border-white/15 dark:bg-white/10 px-3 py-1">Inbox over spam—always</li>
      <li class="rounded-full border border-slate-400/35 bg-white/60 dark:border-white/15 dark:bg-white/10 px-3 py-1">Follow-ups that feel natural</li>
      <li class="rounded-full border border-slate-400/35 bg-white/60 dark:border-white/15 dark:bg-white/10 px-3 py-1">Keep what works. Drop what doesn’t.</li>
    </ol>

    <!-- services grid -->
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <!-- Card 1 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="0">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-cyan-500/15 text-cyan-600 dark:text-cyan-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 21l-4.35-4.35"/><circle cx="11" cy="11" r="8"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">ICP Research &amp; Offer</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          Know exactly who to reach and what to say. We map your ideal buyers, surface objections, and shape offers that feel relevant—before the first email goes out.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Signals we watch (niche, timing, intent)</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Your core message, not buzzwords</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Objections listed—answers ready</li>
        </ul>
      </article>

      <!-- Card 2 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="60">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-indigo-500/15 text-indigo-600 dark:text-indigo-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 5h18M3 10h18M3 15h18M3 20h18"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">List Building &amp; Enrichment</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          Every record is a real person with a reason to talk to you. We enrich with role, tech stack, revenue band, and trigger events—so you start warm, not cold.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Multiple sources, one clean list</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Live email checks before sending</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Sensible filters (GDPR-friendly)</li>
        </ul>
      </article>

      <!-- Card 3 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="120">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-500/15 text-emerald-600 dark:text-emerald-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">Deliverability Setup</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          Inbox first. We set up SPF/DKIM/DMARC, warm new inboxes, and rotate safely. Messages stay light and readable—no spammy tricks.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Dedicated sending domains</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Warm-up &amp; rotation on schedule</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Reputation watched daily</li>
        </ul>
      </article>

      <!-- Card 4 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="180">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-pink-500/15 text-pink-600 dark:text-pink-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 20l-7-7a5 5 0 017-7l0 0a5 5 0 017 7l-7 7z"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">Smart Personalization</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          Short, specific, and respectful. We write like people, not tools—so your emails sound like you and get treated that way.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>First-line that actually fits</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Variants by role &amp; use-case</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Compliant, friendly tone</li>
        </ul>
      </article>

      <!-- Card 5 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="240">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-amber-500/15 text-amber-600 dark:text-amber-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 12h14M5 6h14M5 18h14"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">Sequencing &amp; A/B Testing</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          Follow-ups matter. We test subject lines and calls-to-action, then keep what works. Timing respects time-zones and busy calendars.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Try two ideas, keep the winner</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Auto-pause when they reply</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Scale the proven version</li>
        </ul>
      </article>

      <!-- Card 6 -->
      <article class="rounded-2xl p-5 ring-1 ring-slate-300/35 bg-white/80 backdrop-blur shadow-md
                      hover:-translate-y-0.5 hover:shadow-xl transition
                      dark:ring-white/10 dark:bg-gradient-to-br dark:from-gray-900/90 dark:to-slate-800/85 dark:shadow-black/50"
               data-aos="fade-up" data-aos-delay="300">
        <div class="flex items-center gap-3">
          <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-purple-500/15 text-purple-600 dark:text-purple-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="M7 13l3 3 7-7"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900 dark:text-white">Reporting &amp; CRM Handoff</h3>
        </div>
        <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">
          You’ll see what moved the needle—replies, meetings, and revenue. We sync cleanly with your CRM, so your team picks it up without drama.
        </p>
        <ul class="mt-3 grid gap-1.5 text-sm text-slate-700 dark:text-slate-200 list-none">
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Track replies &amp; booked calls</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Tag by stage (MQL/SQL)</li>
          <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-current opacity-70"></span>Clean pipeline updates</li>
        </ul>
      </article>
    </div>

    <!-- CTA -->
    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="360">
      <a href="#contact"
         class="inline-flex items-center justify-center rounded-2xl bg-cyan-600 px-7 py-3 text-white font-semibold shadow-xl shadow-cyan-900/20 ring-1 ring-white/10 transition
                hover:-translate-y-0.5 hover:bg-cyan-500 active:scale-95 focus:outline-none focus:ring-4 focus:ring-cyan-300 dark:focus:ring-cyan-800">
        Show me my Lead Plan
      </a>
      <a href="#cases"
         class="inline-flex items-center justify-center rounded-2xl bg-white/10 px-7 py-3 text-cyan-700 dark:text-cyan-300 font-semibold backdrop-blur border border-white/20 ring-1 ring-white/10 transition
                hover:bg-white/20 active:scale-95">
        See what worked for others
      </a>
    </div>

    <p class="mt-3 text-xs text-slate-600 dark:text-gray-400" data-aos="fade-up" data-aos-delay="420">
      SPF/DKIM • Dedicated Domains • Warmup • Reply Detection • CRM Sync
    </p>
  </div>

  <!-- wave separator -->
  <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]" aria-hidden="true">
    <svg class="block w-full" viewBox="0 0 1440 100" preserveAspectRatio="none">
      <defs>
        <linearGradient id="waveGrad7_s7" x1="0" x2="0" y1="0" y2="1">
          <stop offset="0%" stop-color="rgba(45,122,184,0.25)"/>
          <stop offset="100%" stop-color="rgba(45,122,184,0.0)"/>
        </linearGradient>
      </defs>
      <path fill="url(#waveGrad7_s7)" d="M0,60L60,55C120,50,240,40,360,36C480,32,600,36,720,46C840,56,960,72,1080,70C1200,68,1320,52,1380,44L1440,36L1440,100L0,100Z"></path>
    </svg>
  </div>
</section>
