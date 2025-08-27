<x-guest-layout>
    {{-- Remove AOS includes if already loaded globally --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        if (window.AOS) AOS.init({ duration: 900, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
      });
    </script>

    <style>
      @keyframes pulseGlow{0%,100%{opacity:.25;filter:blur(42px)}50%{opacity:.55;filter:blur(64px)}}
      @keyframes floatY{0%{transform:translateY(0)}50%{transform:translateY(-10px)}100%{transform:translateY(0)}}
      .glass{backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
             background:linear-gradient(160deg,rgba(255,255,255,.85),rgba(255,255,255,.62))}
      .dark .glass{background:linear-gradient(160deg,rgba(14,22,37,.72),rgba(14,22,37,.5));border-color:rgba(148,163,184,.24)}
      .tilt{transform:perspective(900px) rotateX(0) rotateY(0) translateZ(0);transition:transform .35s ease, box-shadow .35s ease}
      .tilt:hover{transform:perspective(900px) rotateX(2deg) rotateY(-3deg) translateZ(6px)}
      .ring-focus:focus{outline:none; box-shadow:0 0 0 3px rgba(14,165,233,.35)}
    </style>

    <!-- =================== CONTACT HERO (SEO: Lead Generation + Cold Email) =================== -->
    <section class="relative overflow-hidden border-b bg-white dark:bg-[#0b1220] dark:border-gray-800">
      <!-- ambient glows -->
      <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute -top-28 -left-28 w-96 h-96 rounded-full bg-cyan-300/25 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
        <div class="absolute -bottom-32 -right-32 w-[32rem] h-[32rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]"></div>
      </div>

      <div class="max-w-screen-xl mx-auto px-6 lg:px-12 pt-24 pb-10 lg:pt-36">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-12">
          <!-- Left copy -->
          <div class="lg:w-3/5" data-aos="fade-right">
            <p class="uppercase tracking-wider text-[12px] font-semibold text-cyan-600">Talk to Growth Experts</p>
            <h1 class="mt-2 text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight text-slate-900 dark:text-white">
              Contact Us for
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-indigo-600">Lead Generation</span>
              & <span class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-purple-500">Cold Email Marketing</span>
            </h1>
            <p class="mt-5 text-lg md:text-xl text-slate-600 dark:text-slate-300 lg:pr-10">
              Ready to turn traffic into qualified conversations? Get a free action plan tailored to your ICP, offer,
              and funnel. We’ll review your website, deliverability, and outreach to map a predictable pipeline.
            </p>

            <!-- trust bullets -->
            <ul class="mt-6 grid sm:grid-cols-3 gap-3 text-sm text-slate-600 dark:text-slate-300">
              <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> ICP & list strategy</li>
              <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-amber-400"></span> Reply‑worthy sequences</li>
              <li class="flex items-center gap-2"><span class="h-2 w-2 rounded-full bg-cyan-400"></span> Inbox & deliverability audit</li>
            </ul>
          </div>

          <!-- Form card -->
          <div class="lg:w-2/5 w-full" data-aos="fade-left">
            <div class="glass border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-5 md:p-6 lg:p-7 shadow-[0_10px_40px_-10px_rgba(2,6,23,0.15)] tilt">
              <h2 class="text-center text-xl md:text-2xl font-semibold text-slate-900 dark:text-white">Get Your Free Action Plan</h2>
              <p class="mt-1 text-center text-sm text-slate-500 dark:text-slate-400">No pressure. No spam. Just useful ideas.</p>

              <form method="POST" action="#" class="mt-6 space-y-4">
                @csrf
                {{-- Honeypot for spam bots --}}
                <input type="text" name="company_field" class="hidden" tabindex="-1" autocomplete="off">

                <div>
                  <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your Name</label>
                  <input id="name" name="name" type="text" required
                         class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus"
                         placeholder="Jane Doe">
                </div>

                <div>
                  <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Work Email</label>
                  <input id="email" name="email" type="email" required
                         class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus"
                         placeholder="jane@company.com">
                </div>

                <div>
                  <label for="website" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Website</label>
                  <input id="website" name="website" type="url"
                         class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus"
                         placeholder="https://yourwebsite.com">
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                  <div>
                    <label for="service" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">I’m interested in</label>
                    <select id="service" name="service"
                            class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus">
                      <option>Lead Generation</option>
                      <option>Cold Email Marketing</option>
                      <option>Both (Recommended)</option>
                    </select>
                  </div>
                  <div>
                    <label for="budget" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Monthly Budget</label>
                    <select id="budget" name="budget"
                            class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus">
                      <option>৳50k – ৳100k</option>
                      <option>৳100k – ৳250k</option>
                      <option>৳250k+</option>
                    </select>
                  </div>
                </div>

                <div>
                  <label for="message" class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your Goals</label>
                  <textarea id="message" name="message" rows="4"
                            class="mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/70 dark:bg-slate-900/40 px-4 py-2.5 ring-focus"
                            placeholder="Tell us about your ICP, current channels, and expected timeline…"></textarea>
                </div>

                <button type="submit"
                        class="w-full inline-flex justify-center items-center gap-2 text-white font-semibold py-3 rounded-xl
                               bg-gradient-to-r from-cyan-500 to-indigo-600 shadow-lg hover:shadow-xl transition">
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

        <!-- micro trust row -->
        <div class="mt-12 flex flex-wrap items-center gap-4 text-sm text-slate-500 dark:text-slate-400" data-aos="fade-up">
          <span class="px-3 py-1.5 rounded-full border border-emerald-400/40 text-emerald-600 dark:text-emerald-300">Avg. Reply Rate ↑</span>
          <span class="px-3 py-1.5 rounded-full border border-amber-400/40 text-amber-600 dark:text-amber-300">Deliverability Safe</span>
          <span class="px-3 py-1.5 rounded-full border border-cyan-400/40 text-cyan-600 dark:text-cyan-300">Transparent Reporting</span>
        </div>
      </div>
    </section>

    <!-- =================== FAQ (SEO content + long-tail) =================== -->
    <section class="py-14 bg-slate-50 dark:bg-[#0b1220]">
      <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white" data-aos="fade-up">
          Frequently Asked Questions
        </h2>
        <div class="mt-6 grid md:grid-cols-2 gap-6">
          <!-- item -->
          <details class="group rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-5" data-aos="fade-up">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-2">
              <span class="font-semibold text-slate-900 dark:text-white">How do you build a lead generation plan?</span>
              <span class="text-slate-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="mt-3 text-slate-600 dark:text-slate-300">
              We start with ICP research, offer mapping, and channel fit. Then we design <strong>cold email sequences</strong>,
              validate deliverability, and run A/B tests on copy, timing, and CTAs. You’ll get a clear plan with timelines and KPIs.
            </p>
          </details>

          <details class="group rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-5" data-aos="fade-up" data-aos-delay="60">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-2">
              <span class="font-semibold text-slate-900 dark:text-white">Will you help with inbox warmup & domain setup?</span>
              <span class="text-slate-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="mt-3 text-slate-600 dark:text-slate-300">
              Yes. We configure sending domains, SPF/DKIM/DMARC, custom tracking, and warmup to protect sender reputation and maximize inbox placement.
            </p>
          </details>

          <details class="group rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-5" data-aos="fade-up">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-2">
              <span class="font-semibold text-slate-900 dark:text-white">What results should we expect?</span>
              <span class="text-slate-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="mt-3 text-slate-600 dark:text-slate-300">
              It depends on your offer and market. Most teams see early replies within 2–4 weeks and steady pipeline growth within 60–90 days as data compounds.
            </p>
          </details>

          <details class="group rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 p-5" data-aos="fade-up" data-aos-delay="60">
            <summary class="flex cursor-pointer list-none items-center justify-between gap-2">
              <span class="font-semibold text-slate-900 dark:text-white">Do you work outside Bangladesh?</span>
              <span class="text-slate-500 group-open:rotate-180 transition">⌄</span>
            </summary>
            <p class="mt-3 text-slate-600 dark:text-slate-300">
              Absolutely. We run campaigns for clients worldwide across SaaS, IT services, e‑commerce and more.
            </p>
          </details>
        </div>
      </div>
    </section>

    <!-- =================== ContactPage JSON‑LD =================== -->
    <script type="application/ld+json">
    {
      "@context":"https://schema.org",
      "@type":"ContactPage",
      "name":"Contact Khalid IT - Lead Generation & Cold Email Marketing",
      "url":"{{ url()->current() }}",
      "description":"Get a free action plan for lead generation and cold email marketing. We review ICP, deliverability and outreach to build predictable pipeline.",
      "inLanguage":"en",
      "publisher":{"@type":"Organization","name":"Khalid IT","url":"{{ url('/') }}"}
    }
    </script>
</x-guest-layout>
