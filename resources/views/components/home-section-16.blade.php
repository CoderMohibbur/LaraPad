{{-- resources/views/components/sections/latest-leadgen-posts.blade.php --}}
<section id="latest-leadgen-posts" class="relative py-12 border-t-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- ambient glow -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-sky-400/20 blur-3xl dark:from-cyan-400/10 dark:to-sky-500/10"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20 blur-3xl dark:from-fuchsia-400/10 dark:to-indigo-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8">
    <!-- Heading -->
    <header class="text-center max-w-3xl mx-auto">
      <h2 class="text-[#2ca8d9] text-3xl lg:text-5xl font-extrabold tracking-tight">Lead Generation & Cold Email — Latest Insights</h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
        Playbooks, deliverability tips, and real experiments to help you build a <strong>predictable lead pipeline</strong> with <strong>cold email marketing</strong>.
      </p>
    </header>

    @php
      // If controller didn't pass $posts, use SEO-focused fake demo data
      $hasPosts = isset($posts) && count($posts) > 0;
      if (!$hasPosts) {
        $posts = [
          [
            'title' => 'Cold Email Deliverability in 2025: DMARC, SPF, DKIM & Inboxing Checklist',
            'slug' => 'cold-email-deliverability-2025',
            'excerpt' => 'Sender reputation, sub‑domain strategy, and warm‑up that actually works—our field guide to landing in Primary, not Promotions.',
            'author' => 'Ayesha Rahman',
            'avatar' => '/images/authors/ayesha.png',
            'cover'  => '/images/blog/deliverability-checklist.jpg',
            'read'   => 7,
            'date'   => '2025-08-10',
            'tags'   => ['Deliverability','DMARC','Warm‑up'],
          ],
          [
            'title' => 'Personalized First Lines at Scale: 4–7 Touch Cadence That Gets Replies',
            'slug' => 'personalized-first-lines-cadence',
            'excerpt' => 'How to craft value‑forward copy, rotate angles, and schedule human‑like sends for consistent reply rates.',
            'author' => 'Khalid Hossain',
            'avatar' => '/images/authors/khalid.png',
            'cover'  => '/images/blog/personalization-cadence.jpg',
            'read'   => 6,
            'date'   => '2025-08-05',
            'tags'   => ['Copywriting','Cadence','Personalization'],
          ],
          [
            'title' => 'ICP Research & List Building: Verified Work Emails with Buying Signals',
            'slug' => 'icp-research-list-building',
            'excerpt' => 'Firmographics + technographics + intent: the data stack behind laser‑targeted lead generation.',
            'author' => 'Nabila Akter',
            'avatar' => '/images/authors/nabila.png',
            'cover'  => '/images/blog/icp-list-building.jpg',
            'read'   => 5,
            'date'   => '2025-07-28',
            'tags'   => ['Lead Generation','ICP','Prospecting'],
          ],
        ];
      }
    @endphp

    <!-- Grid -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($posts as $p)
      <article class="group bg-white dark:bg-gray-800 border border-gray-200/70 dark:border-gray-700/70 rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden ring-1 ring-black/5 dark:ring-white/5">
        <a href="{{ url('/blog/'.$p['slug']) }}" class="block">
          <figure class="relative overflow-hidden">
            <img src="{{ asset($p['cover']) }}" alt="{{ $p['title'] }}"
                 class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-[1.04]" loading="lazy" decoding="async" />
            <div class="absolute top-3 left-3 flex gap-2">
              @foreach (($p['tags'] ?? []) as $tag)
                <span class="px-2 py-0.5 rounded-full text-xs bg-white/90 dark:bg-gray-900/80 text-gray-700 dark:text-gray-200 ring-1 ring-black/5 dark:ring-white/10 backdrop-blur">{{ $tag }}</span>
              @endforeach
            </div>
          </figure>

          <div class="px-6 pt-5 pb-6">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white leading-snug group-hover:text-[#2ca8d9] transition-colors">{{ $p['title'] }}</h3>
            <div class="mt-3 flex items-center gap-3">
              <img src="{{ asset($p['avatar']) }}" alt="{{ $p['author'] }}" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover" />
              <div class="text-sm text-gray-600 dark:text-gray-300">{{ $p['author'] }}</div>
              <span class="text-gray-400">•</span>
              <time datetime="{{ $p['date'] }}" class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($p['date'])->format('M d, Y') }}</time>
              <span class="text-gray-400">•</span>
              <span class="text-sm text-gray-500 dark:text-gray-400">{{ $p['read'] }} min read</span>
            </div>
            <p class="mt-3 text-gray-600 dark:text-gray-300 leading-relaxed">{{ $p['excerpt'] }}</p>

            <div class="mt-5 flex items-center justify-between">
              <span class="inline-flex items-center text-[#2ca8d9] font-semibold">Read More
                <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="currentColor"><path d="M13 5l7 7-7 7M5 12h14"/></svg>
              </span>
              <span class="text-xs text-gray-500 dark:text-gray-400">Lead Gen · Cold Email</span>
            </div>
          </div>
        </a>
      </article>
      @endforeach
    </div>

    <!-- CTA -->
    <div class="mt-12 text-center">
      <a href="{{ url('/blog') }}" class="ripple inline-block text-base md:text-lg font-bold uppercase text-[#03b9f1] border-2 border-[#03b9f1] hover:text-white hover:bg-[#03b9f1] transition duration-500 ease-in-out rounded-xl py-3 px-6">More Articles</a>
    </div>
  </div>

  <!-- Optional JSON‑LD for a Blog list (basic) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Lead Generation & Cold Email Blog",
    "blogPost": [
      @foreach ($posts as $idx => $p)
      {
        "@type": "BlogPosting",
        "headline": "{{ $p['title'] }}",
        "author": {"@type":"Person","name":"{{ $p['author'] }}"},
        "datePublished": "{{ $p['date'] }}",
        "image": "{{ url(asset($p['cover'])) }}",
        "url": "{{ url('/blog/'.$p['slug']) }}",
        "timeRequired": "PT{{ max(1, (int)$p['read']) }}M"
      }@if($idx < count($posts)-1),@endif
      @endforeach
    ]
  }
  </script>

  <style>
    /* ripple feedback */
    .ripple{position:relative;overflow:hidden}
    .ripple::after{content:'';position:absolute;inset:auto;width:0;height:0;border-radius:9999px;background:rgba(255,255,255,.35);transform:translate(-50%,-50%);pointer-events:none;opacity:0}
    .ripple:active::after{left:var(--x);top:var(--y);opacity:1;width:220px;height:220px;transition:width .45s ease,height .45s ease,opacity .9s ease;opacity:0}
  </style>

  <script>
    // ripple
    document.querySelectorAll('#latest-leadgen-posts .ripple').forEach(btn=>{
      btn.addEventListener('click',e=>{const r=btn.getBoundingClientRect();btn.style.setProperty('--x',(e.clientX-r.left)+'px');btn.style.setProperty('--y',(e.clientY-r.top)+'px');});
    });
  </script>
</section>
