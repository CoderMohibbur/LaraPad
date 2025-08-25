<x-guest-layout>
  {{-- AOS (remove if already global) --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (window.AOS) AOS.init({ duration: 900, easing: 'cubic-bezier(.2,.7,.2,1)', once: true, offset: 90 });
    });
  </script>

  <style>
    @keyframes pulseGlow{0%,100%{opacity:.3;filter:blur(40px)}50%{opacity:.6;filter:blur(65px)}}
    @keyframes floatY{0%{transform:translateY(0)}50%{transform:translateY(-10px)}100%{transform:translateY(0)}}
    .glass{backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px);
           background:linear-gradient(160deg,rgba(255,255,255,.75),rgba(255,255,255,.55))}
    .dark .glass{background:linear-gradient(160deg,rgba(14,22,37,.7),rgba(14,22,37,.45));border-color:rgba(148,163,184,.25)}
    .tilt{transform:perspective(900px) rotateX(0) rotateY(0) translateZ(0);transition:transform .35s ease,box-shadow .35s ease}
    .tilt:hover{transform:perspective(900px) rotateX(3deg) rotateY(-4deg) translateZ(8px)}
  </style>

  <!-- ====================== BANNER ====================== -->
  <section class="relative overflow-hidden border-b bg-white dark:bg-[#0b1220] dark:border-gray-800">
    <!-- ambient glow -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
      <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-cyan-300/25 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
      <div class="absolute -bottom-28 -right-28 w-[28rem] h-[28rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]"></div>
    </div>

    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-16 lg:py-24">
      <div class="grid lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-7" data-aos="fade-right">
          <p class="uppercase tracking-wider text-[12px] font-semibold text-cyan-600">Khalid IT Reviews</p>
          <h1 class="mt-3 text-4xl md:text-6xl font-extrabold leading-tight text-slate-900 dark:text-white">
            What Clients Say About Our
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-indigo-600">Lead Generation</span>
            & <span class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-purple-500">Cold Email Marketing</span>
          </h1>
          <p class="mt-6 text-lg md:text-xl text-slate-600 dark:text-slate-300 max-w-2xl">
            Real outcomes. Real partnerships. From predictable pipeline to higher reply rates—our clients trust us for
            ethical <strong>lead generation</strong> and high‑deliverability <strong>cold email marketing</strong>.
            Here’s how they describe the experience.
          </p>

          <!-- trust badges -->
          <div class="mt-8 flex flex-wrap items-center gap-3 text-sm">
            <span class="px-3 py-1.5 rounded-full border border-emerald-400/50 text-emerald-600 dark:text-emerald-300">Avg. Rating 4.9/5</span>
            <span class="px-3 py-1.5 rounded-full border border-amber-400/50 text-amber-600 dark:text-amber-300">95+ Verified Reviews</span>
            <span class="px-3 py-1.5 rounded-full border border-cyan-400/50 text-cyan-600 dark:text-cyan-300">Clutch • Google</span>
          </div>
        </div>

        <!-- demo image -->
        <div class="lg:col-span-5 relative" data-aos="fade-left">
          <div class="absolute -inset-6 rounded-3xl bg-gradient-to-tr from-cyan-400/10 to-fuchsia-400/10 blur-2xl"></div>
          <img
            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?q=80&w=1600&auto=format&fit=crop"
            alt="Clients reviewing lead generation & cold email performance"
            class="relative z-10 w-full h-auto rounded-2xl shadow-2xl tilt">
        </div>
      </div>
    </div>
  </section>

  <!-- ====================== INTRO COPY (Human + SEO) ====================== -->
  <section class="bg-white dark:bg-[#0b1220]">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-10">
      <div class="grid lg:grid-cols-12 gap-10">
        <div class="lg:col-span-10" data-aos="fade-up">
          <p class="text-lg text-slate-700 dark:text-slate-300">
            On independent platforms like <strong>Clutch</strong> and <strong>Google</strong>, partners highlight how our
            <em>ICP research</em>, <em>list enrichment</em>, and <em>reply‑worthy cold email sequences</em> translate into
            qualified conversations and lower CAC. Transparency, speed of iteration, and respectful outreach are the reasons
            they return—and refer us.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ====================== AGGREGATE HEADER ====================== -->
  <section class="py-4">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
      <a href="#all-reviews" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 group">
        <div class="flex flex-wrap items-center gap-3" data-aos="fade-right">
          <h2 class="text-xl sm:text-2xl font-semibold text-slate-900 dark:text-slate-100 group-hover:underline">
            Verified Client Reviews
          </h2>
          <div class="text-emerald-600 dark:text-emerald-400 font-bold text-lg sm:text-xl">4.9</div>
          <div class="flex text-amber-500 text-base" aria-label="5 out of 5 stars">
            <span>★★★★★</span>
          </div>
          <div class="text-sm text-sky-600 font-semibold">95 REVIEWS</div>
        </div>
        <div class="text-sm text-slate-500 dark:text-slate-400" data-aos="fade-left">
          Powered by <span class="font-bold">Clutch</span> & <span class="font-bold">Google</span>
        </div>
      </a>
    </div>
  </section>

  <!-- ====================== REVIEWS GRID ====================== -->
  <section id="all-reviews" class="py-10 bg-white dark:bg-[#0b1220]">
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
          $reviews = [
            [
              'rating' => '5.0',
              'quote'  => 'Clear communication, fast iteration, and steady performance gains across campaigns.',
              'role'   => 'Marketing Coordinator, Healthcare Provider'
            ],
            [
              'rating' => '5.0',
              'quote'  => 'Our partnership keeps growing—more qualified demos from targeted cold outreach.',
              'role'   => 'Sales & Marketing Executive, Corporate Gifts'
            ],
            [
              'rating' => '5.0',
              'quote'  => 'They proactively follow up, align on ICP, and keep deliverability spotless.',
              'role'   => 'National Sales Manager, CPG Brand'
            ],
            [
              'rating' => '5.0',
              'quote'  => 'They listened to concerns and refined sequences until replies felt human.',
              'role'   => 'Marketing Manager, Beverage Retail'
            ],
            [
              'rating' => '5.0',
              'quote'  => 'Their PPC + email combo unlocked pipeline we could forecast with confidence.',
              'role'   => 'Sr. BizDev Manager, Pharma'
            ],
            [
              'rating' => '5.0',
              'quote'  => 'SEO depth plus ethical outreach—most impressive mix we’ve worked with.',
              'role'   => 'Field Marketing Manager, Software'
            ],
          ];
        @endphp

        @foreach($reviews as $i => $r)
          <article
            class="glass border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-5
                   shadow-[0_10px_40px_-10px_rgba(2,6,23,0.12)]
                   hover:shadow-[0_15px_50px_-10px_rgba(2,6,23,0.25)]
                   transition relative overflow-hidden"
            data-aos="fade-up" data-aos-delay="{{ 60 + ($i*60) }}">
            <!-- soft aura -->
            <div class="pointer-events-none absolute -top-10 -right-10 w-44 h-44 rounded-full bg-cyan-400/20 blur-3xl animate-[floatY_6s_ease-in-out_infinite]"></div>

            <div class="text-lg font-semibold text-slate-900 dark:text-white"> {{ $r['rating'] }}
              <span class="text-amber-500">★★★★★</span>
            </div>
            <p class="mt-3 text-slate-700 dark:text-slate-300">“{{ $r['quote'] }}”</p>
            <div class="mt-4 text-sm text-slate-500 dark:text-slate-400">{{ $r['role'] }}</div>
            <div class="mt-3 text-sky-600 text-sm flex items-center gap-1">
              <span>✔</span><span>Verified Review</span>
            </div>
          </article>
        @endforeach
      </div>

      <!-- CTA -->
      <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-5">
        <p class="text-slate-600 dark:text-slate-300" data-aos="fade-right">
          Want reviews with results? See how we run <strong>lead gen</strong> & <strong>cold email</strong> the right way.
        </p>
        <div class="flex gap-3" data-aos="fade-left">
          <a href="/case-studies" class="px-5 py-2.5 rounded-lg font-semibold border-2 border-cyan-500 text-cyan-700 dark:text-cyan-300 hover:bg-cyan-500 hover:text-white transition">
            Read Case Studies
          </a>
          <a href="/contact" class="px-5 py-2.5 rounded-lg font-semibold text-white bg-gradient-to-r from-cyan-500 to-indigo-600 shadow-lg hover:shadow-xl transition">
            Start a Project
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ====================== JSON-LD (SEO) ====================== -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Khalid IT",
    "url": "{{ url('/') }}",
    "sameAs": ["https://www.google.com","https://clutch.co"],
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "4.9",
      "reviewCount": "95",
      "bestRating": "5",
      "worstRating": "1"
    },
    "review": [
      {
        "@type": "Review",
        "reviewRating": {"@type": "Rating","ratingValue": "5"},
        "author": {"@type": "Person","name": "Marketing Coordinator"},
        "reviewBody": "Clear communication, fast iteration, and steady performance gains across campaigns."
      },
      {
        "@type": "Review",
        "reviewRating": {"@type": "Rating","ratingValue": "5"},
        "author": {"@type": "Person","name": "Sales & Marketing Executive"},
        "reviewBody": "More qualified demos from targeted cold outreach. Partnership keeps growing."
      }
    ]
  }
  </script>
</x-guest-layout>
