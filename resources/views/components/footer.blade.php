{{-- resources/views/components/layout/footer.blade.php
<footer class="relative isolate overflow-hidden text-slate-700 dark:text-slate-300">
  <!-- glowing bg -->
  <div aria-hidden="true" class="absolute inset-0 -z-10">
    <div class="absolute inset-0 bg-gradient-to-br from-sky-50 via-white to-cyan-50 dark:from-[#0b1220] dark:via-[#0c1527] dark:to-[#0e1729]"></div>
    <div class="absolute -top-40 -left-40 h-[26rem] w-[26rem] rounded-full blur-3xl bg-gradient-to-tr from-sky-400/25 to-cyan-400/25 dark:from-sky-600/20 dark:to-cyan-500/20 animate-pulse"></div>
    <div class="absolute -bottom-44 -right-48 h-[28rem] w-[28rem] rounded-full blur-3xl bg-gradient-to-tr from-fuchsia-300/25 to-indigo-300/25 dark:from-fuchsia-500/15 dark:to-indigo-500/15 animate-pulse"></div>
  </div>

  <!-- CTA Banner -->
  <section class="relative">
    <div class="max-w-7xl mx-auto px-6 py-14">
      <div class="rounded-3xl p-10 text-center shadow-xl ring-1 ring-slate-200/70 dark:ring-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl">
        <h2 class="font-extrabold text-slate-900 dark:text-white leading-tight tracking-tight
                   [text-wrap:balance] drop-shadow-sm"
            style="font-size:clamp(2rem,4.5vw,3.2rem);">
          🚀 Scale Faster with <span class="bg-clip-text text-transparent bg-gradient-to-r from-sky-600 via-cyan-500 to-indigo-500">Lead Generation</span> & <span class="bg-clip-text text-transparent bg-gradient-to-r from-fuchsia-500 to-pink-500">Cold Email Marketing</span>
        </h2>
        <p class="mt-5 text-lg md:text-xl text-slate-600 dark:text-slate-300/90 max-w-3xl mx-auto">
          From verified lists to inbox-ready domains, copy that sparks replies, and sequences that book calls — all under one roof.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <a href="#"
             class="relative inline-flex items-center gap-3 rounded-full px-8 py-3 text-lg font-semibold text-white shadow-lg
                    bg-gradient-to-r from-sky-600 via-cyan-600 to-indigo-600
                    hover:from-sky-500 hover:to-indigo-500 active:scale-[.97] transition">
            <span>💡 Get Free Audit</span>
          </a>
          <a href="#"
             class="inline-flex items-center gap-2 rounded-full px-8 py-3 text-lg font-semibold
                    ring-2 ring-sky-400/50 hover:bg-sky-50 dark:hover:bg-sky-900/20 transition">
            📅 Book Strategy Call
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Core grid -->
  <section class="relative">
    <div class="max-w-7xl mx-auto px-6 py-14 grid gap-12 md:grid-cols-2 lg:grid-cols-4">
      <!-- Brand -->
      <div>
        <img src="{{ asset('uploads/2025/04/khalidit-logo-removebg-preview.png') }}" alt="Khalid IT" class="w-52 drop-shadow mb-4">
        <p class="text-sm text-slate-600 dark:text-slate-400 max-w-sm">
          Helping B2B brands generate qualified leads and close deals with <b>Lead Generation</b> & <b>Cold Email Marketing</b>.
        </p>
      </div>

      <!-- Lead Gen -->
      <div>
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Lead Generation</h3>
        <ul class="space-y-2 text-[15px]">
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">ICP & Market Research</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">B2B List Building</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">Data Enrichment</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">CRM Setup</a></li>
        </ul>
      </div>

      <!-- Cold Email -->
      <div>
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Cold Email</h3>
        <ul class="space-y-2 text-[15px]">
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">Domain Warmup</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">Personalized Copy</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">Sequencing & A/B Test</a></li>
          <li><a href="#" class="hover:text-sky-600 dark:hover:text-sky-400">Reply Handling</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Contact</h3>
        <ul class="space-y-2 text-[15px]">
          <li>📍 Jashore 7400, Bangladesh</li>
          <li>✉️ <a href="mailto:khalid@khalidit.com" class="hover:text-sky-600">khalid@khalidit.com</a></li>
          <li>📞 <a href="tel:+8801927802206" class="hover:text-sky-600">+880 1927-802206</a></li>
        </ul>
        <div class="mt-4 flex gap-4">
          <a href="https://facebook.com/khaliditGlobal" target="_blank"><img src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-facebook.svg" class="w-6 hover:scale-110 transition" alt="Facebook"></a>
          <a href="https://linkedin.com/company/khaliditglobal" target="_blank"><img src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-linkedin.svg" class="w-6 hover:scale-110 transition" alt="LinkedIn"></a>
          <a href="https://instagram.com/khaliditglobal" target="_blank"><img src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-instagram.svg" class="w-6 hover:scale-110 transition" alt="Instagram"></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Bottom -->
  <div class="border-t border-slate-200/70 dark:border-slate-700/50">
    <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
      <p class="text-xs text-slate-500 dark:text-slate-400">© 2025 Khalid IT — Lead Generation & Cold Email Marketing</p>
      <ul class="flex flex-wrap gap-4 text-xs">
        <li><a href="#" class="hover:text-sky-600">Company</a></li>
        <li><a href="#" class="hover:text-sky-600">Case Studies</a></li>
        <li><a href="#" class="hover:text-sky-600">Sitemap</a></li>
        <li><a href="#" class="hover:text-sky-600">Terms</a></li>
        <li><a href="#" class="hover:text-sky-600">Privacy</a></li>
      </ul>
    </div>
  </div>
</footer> --}}



{{-- new footer --}}
{{-- resources/views/components/layout/footer.blade.php --}}
<footer class="relative isolate overflow-hidden text-slate-700 dark:text-slate-300">
    <!-- glowing bg (unchanged) -->
    <div aria-hidden="true" class="absolute inset-0 -z-10">
        <div
            class="absolute inset-0 bg-gradient-to-br from-sky-50 via-white to-cyan-50 dark:from-[#0b1220] dark:via-[#0c1527] dark:to-[#0e1729]">
        </div>
        <div
            class="absolute -top-40 -left-40 h-[26rem] w-[26rem] rounded-full blur-3xl bg-gradient-to-tr from-sky-400/25 to-cyan-400/25 dark:from-sky-600/20 dark:to-cyan-500/20 animate-pulse">
        </div>
        <div
            class="absolute -bottom-44 -right-48 h-[28rem] w-[28rem] rounded-full blur-3xl bg-gradient-to-tr from-fuchsia-300/25 to-indigo-300/25 dark:from-fuchsia-500/15 dark:to-indigo-500/15 animate-pulse">
        </div>
    </div>

    <!-- CTA Banner (unchanged) -->
    <section class="relative">
        <div class="max-w-7xl mx-auto px-6 py-14">
            <div
                class="rounded-3xl p-10 text-center shadow-xl ring-1 ring-slate-200/70 dark:ring-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-xl">
                <h2 class="font-extrabold text-slate-900 dark:text-white leading-tight tracking-tight [text-wrap:balance] drop-shadow-sm"
                    style="font-size:clamp(2rem,4.5vw,3.2rem);">
                    🚀 Scale Faster with
                    <span
                        class="bg-clip-text text-transparent bg-gradient-to-r from-sky-600 via-cyan-500 to-indigo-500">Lead
                        Generation</span> &
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-fuchsia-500 to-pink-500">Cold Email
                        Marketing</span>
                </h2>
                <p class="mt-5 text-lg md:text-xl text-slate-600 dark:text-slate-300/90 max-w-3xl mx-auto">
                    From verified lists to inbox-ready domains, copy that sparks replies, and sequences that book calls
                    — all under one roof.
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a href="https://calendly.com/khalidmdop/15-minutes-free-consultation?back=1&month=2025-08"
                        class="inline-flex items-center gap-2 rounded-full px-8 py-3 text-lg font-semibold
                    ring-2 ring-sky-400/50 hover:bg-sky-50 dark:hover:bg-sky-900/20 transition">
                        📅 Book Strategy Call
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Structure (centered like screenshot, bg same as before) -->
    <section class="relative text-center">
        <div class="max-w-5xl mx-auto px-6 py-14">

            <!-- Short intro -->
            <p class="max-w-3xl mx-auto text-[15px] leading-relaxed text-slate-600 dark:text-slate-400">
                Helping B2B brands generate qualified leads and close deals with
                <b>Lead Generation</b> & <b>Cold Email Marketing</b>.
                We also cover SEO, content & performance campaigns that grow your brand.
            </p>

            <!-- Nav links inline -->
            <div class="mt-8 flex flex-wrap justify-center gap-x-8 gap-y-3 text-[15px] font-medium">
                <a href="/" class="hover:text-sky-600 dark:hover:text-sky-400">Home</a>
                <a href="/services" class="hover:text-sky-600 dark:hover:text-sky-400">Services</a>
                <a href="/blog" class="hover:text-sky-600 dark:hover:text-sky-400">Blogs</a>
                <a href="/careers" class="hover:text-sky-600 dark:hover:text-sky-400">Careers</a>
                <a href="/reviews" class="hover:text-sky-600 dark:hover:text-sky-400">Reviews</a>
                <a href="/about" class="hover:text-sky-600 dark:hover:text-sky-400">About</a>
                <a href="/about" class="hover:text-sky-600 dark:hover:text-sky-400">Contact Us</a>
                {{-- <a href="/terms" class="hover:text-sky-600 dark:hover:text-sky-400">Terms</a> --}}
            </div>

            <!-- Phone -->
            <div class="mt-10 text-3xl md:text-4xl font-extrabold flex items-center justify-center gap-3">
                <span class="text-green-500"></span>
                <a href="/">
                    <img src="{{ \App\Http\Controllers\Admin\ReadingSettingController::headerLogoUrl() }}"
                        alt="Logo" class="w-[250px] h-[70px] object-contain">
                </a>
            </div>

            <!-- Address + Email -->
            <div class="mt-6 text-sm text-slate-500 dark:text-slate-400 space-y-2">
                <p> Jashore 7400, Bangladesh</p>
                <p> <a href="mailto:khalid@khalidit.com" class="underline hover:text-sky-600">khalid@khalidit.com</a>
                </p>
            </div>

            <!-- Divider -->
            <div class="mt-10">
                <hr class="border-slate-200/70 dark:border-slate-700" />
            </div>

            <!-- Bottom row -->
            <div class="mt-6 flex flex-col items-center gap-4">
                <p class="text-xs text-slate-500 dark:text-slate-400">© 2025 Khalid IT — Lead Generation & Cold Email
                    Marketing</p>
                <div class="flex gap-4">
                    <a href="https://facebook.com/khaliditGlobal" target="_blank"><img
                            src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-facebook.svg"
                            class="w-6 hover:scale-110 transition" alt="Facebook"></a>
                    <a href="https://linkedin.com/company/khaliditglobal" target="_blank"><img
                            src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-linkedin.svg"
                            class="w-6 hover:scale-110 transition" alt="LinkedIn"></a>
                    <a href="https://instagram.com/khaliditglobal" target="_blank"><img
                            src="https://www.Searchbloom.com/wp-content/uploads/2019/12/SB-social-instagram.svg"
                            class="w-6 hover:scale-110 transition" alt="Instagram"></a>
                </div>
            </div>
        </div>
    </section>
</footer>
