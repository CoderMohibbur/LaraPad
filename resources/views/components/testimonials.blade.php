{{-- resources/views/components/sections/testimonials.blade.php --}}
<section
  id="testimonials"
  class="relative overflow-hidden w-full border-y border-gray-200/70 dark:border-gray-700/70 bg-gray-50 dark:bg-gray-900">

  <!-- Background orbs -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden select-none">
    <div class="absolute -top-24 -right-20 h-72 w-72 rounded-full bg-gradient-to-tr from-amber-300/20 to-rose-300/20 blur-3xl dark:from-amber-400/10 dark:to-rose-400/10"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gradient-to-tr from-indigo-300/20 to-fuchsia-300/20 blur-3xl dark:from-indigo-400/10 dark:to-fuchsia-400/10"></div>
  </div>

  <!-- Slider viewport -->
  <div class="relative max-w-[1600px] mx-auto">
    <div class="relative overflow-hidden" role="region" aria-roledescription="carousel" aria-label="Client testimonials">
      <ul id="t-slider-track" class="flex will-change-transform select-none" style="transform: translate3d(0,0,0);">

        {{-- Fake demo data --}}
        @php
          $testimonials = [
            [
              'image' => '/uploads/2025/04/demo1.png',
              'name' => 'John Doe',
              'quote' => '“This team is absolutely <span class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded">amazing</span> to work with.”',
              'description' => 'They delivered our lead generation campaign flawlessly and boosted our cold email marketing ROI within weeks.',
              'designation' => 'Marketing Director',
              'company' => 'Growthify Ltd.',
              'rating' => 5,
            ],
            [
              'image' => '/uploads/2025/04/demo2.png',
              'name' => 'Sarah Smith',
              'quote' => '“Their cold email marketing <span class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded">outperformed</span> all our expectations.”',
              'description' => 'From copywriting to delivery, every detail was handled with care. Our sales pipeline doubled in two months.',
              'designation' => 'CEO',
              'company' => 'EmailBoost Co.',
              'rating' => 5,
            ],
            [
              'image' => '/uploads/2025/04/demo3.png',
              'name' => 'David Lee',
              'quote' => '“If you want to scale <span class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded">lead generation</span>, this is the agency.”',
              'description' => 'Super responsive, creative and data-driven. They helped us close enterprise clients quickly.',
              'designation' => 'Head of Sales',
              'company' => 'B2B Hub',
              'rating' => 4,
            ],
          ];
        @endphp

        @foreach ($testimonials as $t)
        <li class="slide shrink-0 w-full">
          <article class="mx-auto max-w-screen-xl px-3 md:px-6 lg:px-10 py-12 md:py-16 flex flex-col md:flex-row items-center justify-evenly gap-8">
            <div class="w-full md:w-1/3 flex justify-center">
              <figure class="relative group">
                <img src="{{ asset($t['image']) }}" alt="{{ $t['name'] }}" loading="lazy" decoding="async"
                     class="w-[320px] sm:w-[360px] h-[400px] sm:h-[420px] object-cover rounded-2xl shadow-[0_10px_26px_rgba(2,10,28,.12)] ring-1 ring-black/5 dark:ring-white/5 transition-transform duration-700 ease-out group-hover:scale-[1.02]" />
              </figure>
            </div>

            <div class="md:w-2/3 text-center md:text-left">
              <h2 class="text-2xl md:text-4xl font-bold tracking-tight text-gray-900 dark:text-white leading-snug">{!! $t['quote'] !!}</h2>
              <p class="mt-4 text-base md:text-lg text-gray-700 dark:text-gray-300">{{ $t['description'] }}</p>

              <div class="mt-6 flex flex-col sm:flex-row items-center sm:items-end gap-2">
                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{!! str_repeat('⭐', $t['rating']) !!}</p>
                <span class="text-gray-400">•</span>
                <p class="text-base font-medium text-gray-700 dark:text-gray-300">{{ $t['name'] }}</p>
                <span class="text-gray-500/80 dark:text-gray-400/80 text-sm italic">{{ $t['designation'] }}, {{ $t['company'] }}</span>
              </div>
            </div>
          </article>
        </li>
        @endforeach
      </ul>

      <!-- Controls -->
      <div class="absolute inset-y-0 left-0 flex items-center">
        <button id="t-prev" class="text-2xl sm:text-3xl bg-white/70 dark:bg-gray-700/70 hover:bg-white/90 dark:hover:bg-gray-700/90 text-gray-800 dark:text-white px-3 sm:px-4 py-2 rounded-r-xl shadow">❮</button>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center">
        <button id="t-next" class="text-2xl sm:text-3xl bg-white/70 dark:bg-gray-700/70 hover:bg-white/90 dark:hover:bg-gray-700/90 text-gray-800 dark:text-white px-3 sm:px-4 py-2 rounded-l-xl shadow">❯</button>
      </div>
    </div>
  </div>
</section>
