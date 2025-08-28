{{-- resources/views/components/sections/latest-leadgen-posts.blade.php --}}
@props(['posts' => collect()])

@php
  // ডায়নামিক আছে?
  $hasDynamic = (is_countable($posts) && count($posts));

  // Fallback (picsum সহ) — ঠিক ৩টা কার্ড
  $fallback = collect([
    [
      'title'   => 'Cold Email Deliverability in 2025: DMARC, SPF, DKIM',
      'slug'    => 'cold-email-deliverability-2025',
      'excerpt' => 'Stop landing in Promotions. Reputation, sub-domain strategy & warm-up.',
      'author'  => 'Ayesha Rahman',
      'cover'   => 'https://picsum.photos/seed/leadgen1/800/600',
      'read'    => 7,
      'date'    => '2025-08-10',
      'tags'    => ['Deliverability','DMARC','Warm-up'],
    ],
    [
      'title'   => 'First Lines at Scale: 4–7 Touch Cadence',
      'slug'    => 'personalized-first-lines-cadence',
      'excerpt' => 'Value-first copy, angle rotation & human-like sends.',
      'author'  => 'Khalid Hossain',
      'cover'   => 'https://picsum.photos/seed/leadgen2/800/600',
      'read'    => 6,
      'date'    => '2025-08-05',
      'tags'    => ['Copywriting','Cadence','Personalization'],
    ],
    [
      'title'   => 'ICP Research & List Building',
      'slug'    => 'icp-research-list-building',
      'excerpt' => 'Firmographics + technographics + intent for laser targeting.',
      'author'  => 'Nabila Akter',
      'cover'   => 'https://picsum.photos/seed/leadgen3/800/600',
      'read'    => 5,
      'date'    => '2025-07-28',
      'tags'    => ['Lead Generation','ICP','Prospecting'],
    ],
  ]);

  // ঠিক ৩টা কার্ড নিশ্চিত: ডায়নামিক > fallback ফিল-আপ
  $dyn = ($posts instanceof \Illuminate\Support\Collection) ? $posts : collect($posts);
  if ($dyn->count() === 0) {
      $list = $fallback->take(3);
  } else {
      $list = $dyn->take(3);
      if ($list->count() < 3) {
          $list = $list->concat($fallback->take(3 - $list->count()));
      }
  }
@endphp

<section id="latest-leadgen-posts" class="relative py-12 border-t-2 bg-gray-50 dark:bg-gray-900 overflow-hidden">
  <!-- ambient glow (optional) -->
  <div aria-hidden="true" class="absolute inset-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-gradient-to-tr from-cyan-300/20 to-sky-400/20 blur-3xl dark:from-cyan-400/10 dark:to-sky-500/10"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20 blur-3xl dark:from-fuchsia-400/10 dark:to-indigo-400/10"></div>
  </div>

  <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8">
    <!-- Heading -->
    <header class="text-center max-w-3xl mx-auto">
      <h2 class="text-[#2ca8d9] text-3xl lg:text-5xl font-extrabold tracking-tight">
        Lead Generation & Cold Email — Latest Insights
      </h2>
      <p class="mt-5 text-[#5d7183] dark:text-gray-300 text-lg md:text-xl leading-relaxed">
        Proven <strong>lead generation</strong> & <strong>cold email</strong> playbooks for better replies.
      </p>
    </header>

    <!-- Grid -->
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($list as $p)
        @php
          $isArray = is_array($p);

          // title, slug, excerpt
          $title   = $isArray ? ($p['title'] ?? '') : ($p->title ?? '');
          $slug    = $isArray ? ($p['slug']  ?? '#') : ($p->slug  ?? '#');
          $excerpt = $isArray
                      ? ($p['excerpt'] ?? '')
                      : ($p->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($p->content ?? ''), 140));

          // date
          $publishedRaw = $isArray ? ($p['date'] ?? now()) : ($p->published_at ?? $p->created_at ?? now());
          $published    = \Carbon\Carbon::parse($publishedRaw);

          // tags
          $tags = $isArray ? ($p['tags'] ?? []) : ($p->tags?->pluck('name')->all() ?? []);

          // author name
          $authorName = $isArray ? ($p['author'] ?? 'Team') : (optional($p->author)->name ?? 'Team');

          // -------- COVER RESOLVER (Absolute URL বানানো) --------
          $rawCover = null;

          if ($isArray) {
              $rawCover = $p['cover'] ?? null; // picsum for fallback
          } else {
              // URL columns first
              foreach (['cover_image_url','cover_url','image_url','featured_image_url','banner_url','hero_image_url','og_image_url'] as $col) {
                  if (!empty($p->{$col})) { $rawCover = $p->{$col}; break; }
              }
              // Path columns next
              if (!$rawCover) {
                  foreach (['cover_image','cover','image','featured_image','thumbnail','banner','hero_image','og_image'] as $col) {
                      if (!empty($p->{$col})) { $rawCover = $p->{$col}; break; }
                  }
              }
          }

          $cover = null;
          if ($rawCover) {
              $path = ltrim($rawCover, '/');

              if (\Illuminate\Support\Str::startsWith($path, ['http://','https://','//'])) {
                  $cover = $rawCover; // already full
              } elseif (\Illuminate\Support\Str::startsWith($path, 'storage/')) {
                  $cover = url($path); // /storage/... → full
              } elseif (\Illuminate\Support\Str::startsWith($path, 'public/')) {
                  $cover = url(\Illuminate\Support\Facades\Storage::url(substr($path, 7))); // public/... → /storage/...
              } else {
                  // uploads/... or images/... etc → /storage/uploads/... via Storage::url
                  $cover = url(\Illuminate\Support\Facades\Storage::url($path));
              }
          }

          // যদি ডায়নামিকে কভারই না থাকে → neutral placeholder (picsum নয়)
          if (!$cover) {
              if ($isArray) {
                  $seed  = 'leadgen'.$loop->iteration;
                  $cover = "https://picsum.photos/seed/{$seed}/800/600"; // fallback mode
              } else {
                  $cover = 'data:image/svg+xml;utf8,' .
                           rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="800" height="600"><rect width="800" height="600" fill="#e5e7eb"/></svg>');
              }
          }

          // ✅ Avatar = same as blog cover (তোমার চাওয়া মতো)
          $authorAvatar = $cover;
        @endphp

        <article
          class="group bg-white dark:bg-gray-800 border border-gray-200/70 dark:border-gray-700/70 rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden ring-1 ring-black/5 dark:ring-white/5">
          <a href="{{ url('/blog/'.$slug) }}" class="block">
            <figure class="relative overflow-hidden">
              <img src="{{ $cover }}" alt="{{ $title }}"
                   class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-[1.04]"
                   loading="lazy" decoding="async" />
              <div class="absolute top-3 left-3 flex gap-2">
                @foreach ($tags as $tag)
                  <span class="px-2 py-0.5 rounded-full text-xs bg-white/90 dark:bg-gray-900/80 text-gray-700 dark:text-gray-200 ring-1 ring-black/5 dark:ring-white/10 backdrop-blur">
                    {{ $tag }}
                  </span>
                @endforeach
              </div>
            </figure>

            <div class="px-6 pt-5 pb-6">
              <h3 class="text-2xl font-semibold text-gray-900 dark:text-white leading-snug group-hover:text-[#2ca8d9] transition-colors">
                {{ $title }}
              </h3>

              <div class="mt-3 flex items-center gap-3">
                <img src="{{ $authorAvatar }}" alt="{{ $authorName }}"
                     class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-gray-800 object-cover" />
                <div class="text-sm text-gray-600 dark:text-gray-300">{{ $authorName }}</div>
                <span class="text-gray-400">•</span>
                <time datetime="{{ $published->toDateString() }}" class="text-sm text-gray-500 dark:text-gray-400">
                  {{ $published->format('M d, Y') }}
                </time>
                <span class="text-gray-400">•</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                  {{ $isArray ? ($p['read'] ?? 6) : 6 }} min read
                </span>
              </div>

              <p class="mt-3 text-gray-600 dark:text-gray-300 leading-relaxed">{{ $excerpt }}</p>

              <div class="mt-5 flex items-center justify-between">
                <span class="inline-flex items-center text-[#2ca8d9] font-semibold">
                  Read the Playbook
                  <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M13 5l7 7-7 7M5 12h14" />
                  </svg>
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
      <a href="{{ url('/blog') }}"
         class="inline-block text-base md:text-lg font-bold uppercase text-[#03b9f1] border-2 border-[#03b9f1] rounded-xl py-3 px-6
                hover:bg-[#03b9f1] hover:text-white active:scale-95 transition">
        More Articles
      </a>
    </div>
  </div>
</section>
