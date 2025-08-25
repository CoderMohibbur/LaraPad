@forelse ($testimonials as $t)
  <div class="slide w-full shrink-0">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3 py-8 md:py-10">
      
      {{-- LEFT: Dummy Illustration (no profile image) --}}
      <div class="w-full md:w-5/12 flex justify-center" data-aos="fade-right">
        <div class="relative w-[240px] h-[280px] md:w-[260px] md:h-[300px] rounded-2xl p-[2px]
                    bg-gradient-to-tr from-sky-500 via-cyan-400 to-fuchsia-500 dark:from-indigo-500 dark:via-fuchsia-600 dark:to-cyan-500
                    shadow-[0_10px_30px_-8px_rgba(0,0,0,.35)]">
          <div class="w-full h-full rounded-2xl bg-white/90 dark:bg-[#0f172a]/80 backdrop-blur
                      flex items-center justify-center relative overflow-hidden">
            <!-- ambient blobs -->
            <span class="absolute -top-10 -left-10 w-28 h-28 rounded-full blur-2xl bg-sky-400/20"></span>
            <span class="absolute -bottom-12 -right-8 w-32 h-32 rounded-full blur-2xl bg-fuchsia-400/20"></span>
            <!-- inline abstract dummy (no face) -->
            <svg viewBox="0 0 160 160" class="relative w-28 h-28 opacity-90">
              <defs>
                <linearGradient id="g1" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0" stop-color="#38bdf8"/>
                  <stop offset="1" stop-color="#a78bfa"/>
                </linearGradient>
              </defs>
              <!-- abstract badge -->
              <circle cx="80" cy="80" r="60" fill="url(#g1)" opacity=".18"/>
              <rect x="40" y="60" width="80" height="45" rx="10" fill="url(#g1)" opacity=".35"/>
              <rect x="52" y="70" width="56" height="8" rx="4" fill="#0ea5e9" opacity=".7"/>
              <rect x="52" y="86" width="38" height="8" rx="4" class="dark:fill-fuchsia-400" fill="#22d3ee" opacity=".7"/>
              <circle cx="80" cy="38" r="12" fill="#22d3ee" opacity=".8"/>
            </svg>
            <!-- verified pill -->
            <span class="absolute top-2 right-2 text-[10px] tracking-wide px-2 py-0.5 rounded-full
                         bg-gradient-to-r from-sky-500 to-cyan-400 text-white shadow">
              VERIFIED
            </span>
          </div>
        </div>
      </div>

      {{-- RIGHT: Copy (compact, classic) --}}
      <div class="md:w-7/12 text-center md:text-left space-y-3 md:space-y-4" data-aos="fade-up" data-aos-delay="120">
        <h2 class="text-[20px] md:text-[28px] font-bold text-gray-800 dark:text-white leading-snug">
          {!! $t->quote !!}
        </h2>

        <p class="text-base md:text-[17px] text-gray-600 dark:text-gray-300 leading-relaxed">
          {{ $t->description }}
        </p>

        <div class="flex flex-col sm:flex-row sm:items-center gap-1.5 sm:gap-3">
          <p class="text-sm md:text-base font-semibold text-gray-700 dark:text-gray-200">
            {!! str_repeat('⭐', (int) $t->rating) !!} – {{ $t->name }}
          </p>
          <span class="hidden sm:inline text-gray-400">•</span>
          <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400 italic">
            {{ $t->designation }}{{ $t->company ? ', ' . $t->company : '' }}
          </p>
        </div>
      </div>
    </div>
  </div>
@empty
  {{-- Static Fallback (dummy illustration, no profile image) --}}
  <div class="slide w-full shrink-0">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3 py-8 md:py-10">
      <div class="w-full md:w-5/12 flex justify-center" data-aos="fade-right">
        <div class="relative w-[240px] h-[280px] md:w-[260px] md:h-[300px] rounded-2xl p-[2px]
                    bg-gradient-to-tr from-sky-500 via-cyan-400 to-fuchsia-500 dark:from-indigo-500 dark:via-fuchsia-600 dark:to-cyan-500
                    shadow-[0_10px_30px_-8px_rgba(0,0,0,.35)]">
          <div class="w-full h-full rounded-2xl bg-white/90 dark:bg-[#0f172a]/80 backdrop-blur
                      flex items-center justify-center relative overflow-hidden">
            <span class="absolute -top-10 -left-10 w-28 h-28 rounded-full blur-2xl bg-sky-400/20"></span>
            <span class="absolute -bottom-12 -right-8 w-32 h-32 rounded-full blur-2xl bg-fuchsia-400/20"></span>
            <svg viewBox="0 0 160 160" class="relative w-28 h-28 opacity-90">
              <defs>
                <linearGradient id="g1-fb" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0" stop-color="#38bdf8"/>
                  <stop offset="1" stop-color="#a78bfa"/>
                </linearGradient>
              </defs>
              <circle cx="80" cy="80" r="60" fill="url(#g1-fb)" opacity=".18"/>
              <rect x="40" y="60" width="80" height="45" rx="10" fill="url(#g1-fb)" opacity=".35"/>
              <rect x="52" y="70" width="56" height="8" rx="4" fill="#0ea5e9" opacity=".7"/>
              <rect x="52" y="86" width="38" height="8" rx="4" class="dark:fill-fuchsia-400" fill="#22d3ee" opacity=".7"/>
              <circle cx="80" cy="38" r="12" fill="#22d3ee" opacity=".8"/>
            </svg>
            <span class="absolute top-2 right-2 text-[10px] tracking-wide px-2 py-0.5 rounded-full
                         bg-gradient-to-r from-sky-500 to-cyan-400 text-white shadow">
              VERIFIED
            </span>
          </div>
        </div>
      </div>

      <div class="md:w-7/12 text-center md:text-left space-y-3 md:space-y-4" data-aos="fade-up" data-aos-delay="120">
        <h2 class="text-[20px] md:text-[28px] font-bold text-gray-800 dark:text-white leading-snug">
          “They don’t spray & pray—<span class="bg-blue-100 dark:bg-blue-800/60 px-1 rounded">they talk like humans</span> and get replies.”
        </h2>
        <p class="text-base md:text-[17px] text-gray-600 dark:text-gray-300">
          Clear ICP, clean domains (SPF/DKIM/DMARC), and copy that sounds like a real person. Our calendar finally looks alive.
        </p>
        <div class="flex flex-col sm:flex-row sm:items-center gap-1.5 sm:gap-3">
          <p class="text-sm md:text-base font-semibold text-gray-700 dark:text-gray-200">⭐⭐⭐⭐⭐ – Mohibbur Rohman</p>
          <span class="hidden sm:inline text-gray-400">•</span>
          <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400 italic">CEO & CTO, Japan Bangladesh IT</p>
        </div>
      </div>
    </div>
  </div>

  <div class="slide w-full shrink-0">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3 py-8 md:py-10">
      <div class="w-full md:w-5/12 flex justify-center" data-aos="fade-right">
        <div class="relative w-[240px] h-[280px] md:w-[260px] md:h-[300px] rounded-2xl p-[2px]
                    bg-gradient-to-tr from-sky-500 via-cyan-400 to-fuchsia-500 dark:from-indigo-500 dark:via-fuchsia-600 dark:to-cyan-500
                    shadow-[0_10px_30px_-8px_rgba(0,0,0,.35)]">
          <div class="w-full h-full rounded-2xl bg-white/90 dark:bg-[#0f172a]/80 backdrop-blur
                      flex items-center justify-center relative overflow-hidden">
            <span class="absolute -top-10 -left-10 w-28 h-28 rounded-full blur-2xl bg-sky-400/20"></span>
            <span class="absolute -bottom-12 -right-8 w-32 h-32 rounded-full blur-2xl bg-fuchsia-400/20"></span>
            <svg viewBox="0 0 160 160" class="relative w-28 h-28 opacity-90">
              <defs>
                <linearGradient id="g1-fb2" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0" stop-color="#38bdf8"/>
                  <stop offset="1" stop-color="#a78bfa"/>
                </linearGradient>
              </defs>
              <circle cx="80" cy="80" r="60" fill="url(#g1-fb2)" opacity=".18"/>
              <rect x="40" y="60" width="80" height="45" rx="10" fill="url(#g1-fb2)" opacity=".35"/>
              <rect x="52" y="70" width="56" height="8" rx="4" fill="#0ea5e9" opacity=".7"/>
              <rect x="52" y="86" width="38" height="8" rx="4" class="dark:fill-fuchsia-400" fill="#22d3ee" opacity=".7"/>
              <circle cx="80" cy="38" r="12" fill="#22d3ee" opacity=".8"/>
            </svg>
            <span class="absolute top-2 right-2 text-[10px] tracking-wide px-2 py-0.5 rounded-full
                         bg-gradient-to-r from-sky-500 to-cyan-400 text-white shadow">
              VERIFIED
            </span>
          </div>
        </div>
      </div>

      <div class="md:w-7/12 text-center md:text-left space-y-3 md:space-y-4" data-aos="fade-up" data-aos-delay="120">
        <h2 class="text-[20px] md:text-[28px] font-bold text-gray-800 dark:text-white leading-snug">
          “Warm‑up, rotation, and <span class="bg-blue-100 dark:bg-blue-800/60 px-1 rounded">reply‑first copy</span>—results came fast.”
        </h2>
        <p class="text-base md:text-[17px] text-gray-600 dark:text-gray-300">
          From zero to consistent meetings. The reporting is honest and the process is clean—exactly what we needed.
        </p>
        <div class="flex flex-col sm:flex-row sm:items-center gap-1.5 sm:gap-3">
          <p class="text-sm md:text-base font-semibold text-gray-700 dark:text-gray-200">⭐⭐⭐⭐⭐ – Mahamudul Islam</p>
          <span class="hidden sm:inline text-gray-400">•</span>
          <p class="text-xs md:text-sm text-gray-500 dark:text-gray-400 italic">Developer, Khalid IT</p>
        </div>
      </div>
    </div>
  </div>
@endforelse
