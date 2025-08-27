<x-guest-layout>
  {{-- AOS (if not global) --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (window.AOS) AOS.init({ duration: 900, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
    });
  </script>

  <style>
    /* subtle, premium vibes — no color change */
    @keyframes pulseGlow{0%,100%{opacity:.25;filter:blur(42px)}50%{opacity:.55;filter:blur(64px)}}
    .glass{backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);
           background:linear-gradient(160deg,rgba(255,255,255,.85),rgba(255,255,255,.60))}
    .dark .glass{background:linear-gradient(160deg,rgba(14,22,37,.72),rgba(14,22,37,.5));border-color:rgba(148,163,184,.24)}
    .ring-focus:focus{outline:none;box-shadow:0 0 0 3px rgba(14,165,233,.35)}
    .heading-balance{text-wrap:balance}
    .soft-shadow{box-shadow:0 12px 35px -8px rgba(2,6,23,.25)}
    .dark .soft-shadow{box-shadow:0 12px 35px -10px rgba(0,0,0,.6)}
    .field{transition: box-shadow .2s ease, transform .08s ease}
    .field:focus{box-shadow:0 0 0 2px rgba(56,189,248,.35), 0 8px 22px -10px rgba(2,6,23,.35); transform:translateY(-1px)}
    /* graceful max-width for left copy */
    .copy-max{max-width:46rem}
    /* thin accent under heading */
    .h-underline{position:relative}
    .h-underline:after{content:"";position:absolute;left:0;bottom:-10px;height:3px;width:120px;
      background:linear-gradient(90deg,#22d3ee,#6366f1,#a855f7);border-radius:9999px;opacity:.7}
  </style>

  <!-- =================== CONTACT HERO =================== -->
  <section class="relative overflow-hidden border-b bg-white dark:bg-[#0b1220] dark:border-gray-800">
    <!-- ambient glows (unchanged colors) -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
      <div class="absolute -top-28 -left-28 w-96 h-96 rounded-full bg-cyan-300/25 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
      <div class="absolute -bottom-32 -right-32 w-[32rem] h-[32rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]"></div>
    </div>

    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 pt-24 pb-12 lg:pt-12">
      <div class="grid lg:grid-cols-12 gap-12 items-center">
        <!-- Left copy -->
        <div class="lg:col-span-7" data-aos="fade-right">
          <p class="uppercase tracking-wider text-[12px] font-semibold text-cyan-600">Talk to Growth Experts</p>

          <h1 class="h-underline heading-balance mt-2 copy-max text-4xl md:text-6xl lg:text-[64px] font-extrabold leading-[1.08]
                     text-slate-900 dark:text-white">
            Contact Us for
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-indigo-600">Lead Generation</span>
            & <span class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-purple-500">Cold Email Marketing</span>
          </h1>
        </div>

        <!-- Form card -->
        <div class="lg:col-span-5" data-aos="fade-left">
          <div class="glass soft-shadow border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-6 md:p-7">
            <h2 class="text-center text-xl md:text-2xl font-semibold text-slate-900 dark:text-white">Get Your Free Action Plan</h2>
            <p class="mt-1 text-center text-sm text-slate-500 dark:text-slate-400">No pressure. No spam. Just useful ideas.</p>

            <form method="POST" action="#" class="mt-5 space-y-4">
              @csrf
              <input type="text" name="company_field" class="hidden" tabindex="-1" autocomplete="off">

              <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your Name</label>
                <input id="name" name="name" type="text" required
                  class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                  placeholder="Jane Doe">
              </div>

              <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Work Email</label>
                <input id="email" name="email" type="email" required
                  class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                  placeholder="jane@company.com">
              </div>

              <div>
                <label for="website" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Website</label>
                <input id="website" name="website" type="url"
                  class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                  placeholder="https://yourwebsite.com">
              </div>

              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="service" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">I’m interested in</label>
                  <select id="service" name="service"
                    class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5">
                    <option>Lead Generation</option>
                    <option>Cold Email Marketing</option>
                    <option>Both (Recommended)</option>
                  </select>
                </div>
                <div>
                  <label for="budget" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Monthly Budget</label>
                  <select id="budget" name="budget"
                    class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5">
                    <option>৳50k – ৳100k</option>
                    <option>৳100k – ৳250k</option>
                    <option>৳250k+</option>
                  </select>
                </div>
              </div>

              <div>
                <label for="message" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your Goals</label>
                <textarea id="message" name="message" rows="4"
                  class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                  placeholder="Tell us about your ICP, current channels, and expected timeline…"></textarea>
              </div>

              <button type="submit"
                class="w-full inline-flex justify-center items-center gap-2 text-white font-semibold py-3 rounded-xl
                       bg-gradient-to-r from-cyan-500 to-indigo-600 shadow-lg hover:shadow-xl active:scale-[.98] transition">
                Get Free Plan
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </button>

              <p class="text-[12px] text-slate-500 dark:text-slate-400 text-center">
                By submitting, you agree to our <a href="/privacy" class="underline hover:text-cyan-600">Privacy Policy</a>.
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ========== Contact Info Footer Section ========== -->
<div class="relative bg-white dark:bg-[#0b1220] border-t border-slate-200 dark:border-slate-700">
  <div class="max-w-7xl mx-auto px-6 py-12 grid gap-10 md:grid-cols-3 lg:grid-cols-3">

    <!-- Talk to Us -->
    <div>
      <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Talk to Us</h3>
      <ul class="space-y-2 text-slate-600 dark:text-slate-400 text-[15px]">
        <li class="flex items-center gap-2">
          <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2 8.5C2 5.46 5.46 2 8.5 2h7A6.5 6.5 0 0 1 22 8.5v7A6.5 6.5 0 0 1 15.5 22h-7A6.5 6.5 0 0 1 2 15.5v-7Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 8h.01M12 16.5a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Z"/></svg>
          <a href="tel:+8801404282727" class="hover:text-cyan-600">+8801404282727</a>
        </li>
        <li class="flex items-center gap-2">
          <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l9 6 9-6M21 8v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8"/></svg>
          <a href="mailto:admin@khanit.com.bd" class="hover:text-cyan-600">admin@khanit.com.bd</a>
        </li>
      </ul>
    </div>

    <!-- Business Hour -->
    <div>
      <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Business Hour</h3>
      <ul class="space-y-2 text-slate-600 dark:text-slate-400 text-[15px]">
        <li class="flex items-center gap-2">
          <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
          Sat–Wed: 10 AM – 7 PM
        </li>
        <li class="flex items-center gap-2">
          <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
          Thu: 9 AM – 1 PM
        </li>
        <li class="flex items-center gap-2">
          <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"/></svg>
          Friday: Closed
        </li>
      </ul>
    </div>

    <!-- Visit Us -->
    <div>
      <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Visit Us</h3>
      <p class="flex items-center gap-2 text-slate-600 dark:text-slate-400 text-[15px]">
        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21c4.97-4.418 8-7.731 8-11a8 8 0 1 0-16 0c0 3.269 3.03 6.582 8 11z"/><circle cx="12" cy="10" r="3"/></svg>
        Dhaka, Bangladesh
      </p>
    </div>
  </div>
</div>

</x-guest-layout>
