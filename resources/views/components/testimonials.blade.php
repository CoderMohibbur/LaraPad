@props(['testimonials' => []])

{{-- ===== AOS (Animate On Scroll) – include once if not global ===== --}}
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
<script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    if (window.AOS?.init) {
      AOS.init({
        duration: 800,
        easing: 'cubic-bezier(.2,.7,.2,1)',
        once: true,
        offset: 80,
      });
    }
  });
</script>

@php
  $uid = uniqid('tst_');
  $items = collect($testimonials);

  if ($items->isEmpty()) {
      $items = collect([
          (object)['name'=>'Mahmud Hasan','quote'=>'“They delivered exactly what they promised — fast, clean and SEO-friendly.”','description'=>'Super thoughtful communication and measurable growth in a few weeks.','designation'=>'Founder','company'=>'Pixel Hive','rating'=>5,'image'=>'/uploads/2025/04/mahamudul.png'],
          (object)['name'=>'Nusaiba Akter','quote'=>'“Top-notch reporting and crystal clear milestones. Loved the transparency!”','description'=>'I always knew what was coming next — rare in this industry.','designation'=>'Marketing Lead','company'=>'Growthly','rating'=>5,'image'=>'/uploads/2025/04/default-testimonial.png'],
          (object)['name'=>'Rafi Chowdhury','quote'=>'“Our rankings moved in weeks — not months.”','description'=>'Technical SEO + content cadence = results. Simple as that.','designation'=>'CTO','company'=>'DevNest','rating'=>5,'image'=>'/uploads/2025/04/mahamudull.png'],
          (object)['name'=>'Sadia Karim','quote'=>'“Design feels premium and the site flies.”','description'=>'From wireframe to launch, the experience was smooth.','designation'=>'Product Manager','company'=>'Nimbus','rating'=>5,'image'=>'/uploads/2025/04/default-testimonial.png'],
          (object)['name'=>'Tanvir Ahmed','quote'=>'“Clear KPIs, weekly syncs, and consistent delivery.”','description'=>'They run like a product team, not a random agency.','designation'=>'Head of Growth','company'=>'BrightLoop','rating'=>5,'image'=>'/uploads/2025/04/mahamudul.png'],
          (object)['name'=>'Momena Jahan','quote'=>'“Finally an SEO team that talks business, not buzzwords.”','description'=>'Revenue-focused, not vanity metrics. Highly recommended.','designation'=>'COO','company'=>'Aster','rating'=>5,'image'=>'/uploads/2025/04/mahamudull.png'],
      ]);
  }

  $slidesDesk = $items->chunk(3); // desktop: 3-per-slide
  $slidesMob  = $items->chunk(1); // mobile: 1-per-slide
@endphp

{{-- ============== MOBILE (1 per slide) ============== --}}
<section id="tst-{{ $uid }}-mob"
  class="tst-root block lg:hidden relative overflow-hidden w-full border-y dark:border-gray-700
         bg-gradient-to-b from-gray-50 via-white to-gray-100
         dark:from-[#0b1220] dark:via-gray-900 dark:to-gray-800"
  tabindex="0" aria-roledescription="carousel" aria-label="Testimonials (Mobile)"
  data-aos="fade-up">

  <!-- Ambient auras -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-gradient-to-tr from-sky-300/30 to-blue-400/30 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-gradient-to-tr from-fuchsia-300/25 to-indigo-400/25 blur-3xl"></div>
  </div>

  <div class="tst-track flex transition-transform duration-700 ease-in-out will-change-transform">
    @foreach($slidesMob as $group)
      <div class="tst-slide w-full">
        <div class="max-w-screen-sm mx-auto px-5 py-14 grid gap-10 grid-cols-1">
          @foreach($group as $t)
            @php
              $img = $t->image && file_exists(public_path($t->image)) ? asset($t->image) : asset('/uploads/2025/04/default-testimonial.png');
              $rating = (int)($t->rating ?? 5);
            @endphp
            <article class="tst-card flex flex-col items-center text-center"
                     style="--i: {{ $loop->index }};"
                     data-aos="fade-up"
                     data-aos-delay="{{ $loop->index * 120 }}">
              <div class="relative group w-40 h-40 mb-6">
                <span class="pointer-events-none absolute -inset-4 rounded-[20px] bg-[radial-gradient(circle_at_30%_20%,rgba(56,189,248,.35),transparent_60%),radial-gradient(circle_at_70%_80%,rgba(99,102,241,.35),transparent_55%)] blur-2xl opacity-60 group-hover:opacity-90 transition"></span>
                <img src="{{ $img }}" alt="{{ $t->name }}" class="relative w-full h-full object-cover rounded-2xl shadow-lg transition-transform duration-500 group-hover:scale-105 group-hover:shadow-2xl" loading="lazy">
                <div class="absolute inset-0 rounded-2xl ring-2 ring-sky-400/40 group-hover:ring-sky-500/80 transition"></div>
              </div>
              <h3 class="text-xl font-bold text-gray-900 dark:text-white leading-snug mb-3">{!! $t->quote !!}</h3>
              @if(!empty($t->description))
                <p class="text-base text-gray-600 dark:text-gray-300 mb-4">{{ $t->description }}</p>
              @endif
              <p class="text-base font-semibold text-sky-600 dark:text-sky-400 tracking-wide mb-1">{!! str_repeat('⭐', $rating) !!} – {{ $t->name }}</p>
              <p class="text-sm text-gray-500 dark:text-gray-400 italic">{{ $t->designation }}{{ !empty($t->company) ? ', '.$t->company : '' }}</p>
            </article>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <button type="button" aria-label="Previous slide" class="tst-prev absolute left-3 top-1/2 -translate-y-1/2 bg-gradient-to-r from-sky-400 to-blue-500 hover:from-sky-500 hover:to-blue-600 text-white rounded-full w-11 h-11 grid place-items-center shadow-lg transition-transform hover:scale-110">❮</button>
  <button type="button" aria-label="Next slide"     class="tst-next absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-to-l from-sky-400 to-blue-500 hover:from-sky-500 hover:to-blue-600 text-white rounded-full w-11 h-11 grid place-items-center shadow-lg transition-transform hover:scale-110">❯</button>

  <div class="tst-dots absolute inset-x-0 bottom-8 flex items-center justify-center gap-2"></div>
  <div class="tst-progress absolute left-1/2 -translate-x-1/2 bottom-4 h-0.5 w-40 bg-slate-300/60 dark:bg-slate-600/60 rounded">
    <div class="tst-bar h-full w-0 bg-sky-500 dark:bg-sky-400 rounded"></div>
  </div>
</section>

{{-- ============== DESKTOP (3 per slide) ============== --}}
<section id="tst-{{ $uid }}-desk"
  class="tst-root hidden lg:block relative overflow-hidden w-full border-y dark:border-gray-700
         bg-gradient-to-b from-gray-50 via-white to-gray-100
         dark:from-[#0b1220] dark:via-gray-900 dark:to-gray-800"
  tabindex="0" aria-roledescription="carousel" aria-label="Testimonials (Desktop)"
  data-aos="fade-up">

  <!-- Ambient auras -->
  <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
    <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-gradient-to-tr from-sky-300/30 to-blue-400/30 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-gradient-to-tr from-fuchsia-300/25 to-indigo-400/25 blur-3xl"></div>
  </div>

  <div class="tst-track flex transition-transform duration-700 ease-in-out will-change-transform">
    @foreach($slidesDesk as $group)
      <div class="tst-slide w-full">
        <div class="max-w-screen-xl mx-auto px-5 py-14 grid gap-10 grid-cols-3">
          @foreach($group as $t)
            @php
              $img = $t->image && file_exists(public_path($t->image)) ? asset($t->image) : asset('/uploads/2025/04/default-testimonial.png');
              $rating = (int)($t->rating ?? 5);
            @endphp
            <article class="tst-card flex flex-col items-center text-center"
                     style="--i: {{ $loop->index }};"
                     data-aos="fade-up"
                     data-aos-delay="{{ $loop->index * 120 }}">
              <div class="relative group w-44 h-44 md:w-52 md:h-52 mb-6">
                <span class="pointer-events-none absolute -inset-4 rounded-[20px] bg-[radial-gradient(circle_at_30%_20%,rgba(56,189,248,.35),transparent_60%),radial-gradient(circle_at_70%_80%,rgba(99,102,241,.35),transparent_55%)] blur-2xl opacity-60 group-hover:opacity-90 transition"></span>
                <img src="{{ $img }}" alt="{{ $t->name }}" class="relative w-full h-full object-cover rounded-2xl shadow-lg transition-transform duration-500 group-hover:scale-105 group-hover:shadow-2xl" loading="lazy">
                <div class="absolute inset-0 rounded-2xl ring-2 ring-sky-400/40 group-hover:ring-sky-500/80 transition"></div>
              </div>
              <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white leading-snug mb-3">{!! $t->quote !!}</h3>
              @if(!empty($t->description))
                <p class="text-base text-gray-600 dark:text-gray-300 mb-4">{{ $t->description }}</p>
              @endif
              <p class="text-base font-semibold text-sky-600 dark:text-sky-400 tracking-wide mb-1">{!! str_repeat('⭐', $rating) !!} – {{ $t->name }}</p>
              <p class="text-sm text-gray-500 dark:text-gray-400 italic">{{ $t->designation }}{{ !empty($t->company) ? ', '.$t->company : '' }}</p>
            </article>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <button type="button" aria-label="Previous slide" class="tst-prev absolute left-3 top-1/2 -translate-y-1/2 bg-gradient-to-r from-sky-400 to-blue-500 hover:from-sky-500 hover:to-blue-600 text-white rounded-full w-11 h-11 grid place-items-center shadow-lg transition-transform hover:scale-110">❮</button>
  <button type="button" aria-label="Next slide"     class="tst-next absolute right-3 top-1/2 -translate-y-1/2 bg-gradient-to-l from-sky-400 to-blue-500 hover:from-sky-500 hover:to-blue-600 text-white rounded-full w-11 h-11 grid place-items-center shadow-lg transition-transform hover:scale-110">❯</button>

  <div class="tst-dots absolute inset-x-0 bottom-8 flex items-center justify-center gap-2"></div>
  <div class="tst-progress absolute left-1/2 -translate-x-1/2 bottom-4 h-0.5 w-52 bg-slate-300/60 dark:bg-slate-600/60 rounded">
    <div class="tst-bar h-full w-0 bg-sky-500 dark:bg-sky-400 rounded"></div>
  </div>
</section>

<style>
/* Slide enter/exit */
@keyframes tst-enter-right { from { opacity:.0; transform: translate3d(40px,0,0) scale(.98);} to {opacity:1; transform: translate3d(0,0,0) scale(1);} }
@keyframes tst-enter-left  { from { opacity:.0; transform: translate3d(-40px,0,0) scale(.98);} to {opacity:1; transform: translate3d(0,0,0) scale(1);} }
@keyframes tst-exit-right  { from { opacity:1; transform: translate3d(0,0,0);} to {opacity:0; transform: translate3d(40px,0,0);} }
@keyframes tst-exit-left   { from { opacity:1; transform: translate3d(0,0,0);} to {opacity:0; transform: translate3d(-40px,0,0);} }

/* Card stagger inside a slide */
.tst-slide .tst-card { opacity: 0; transform: translateY(16px) scale(.98); }
.tst-slide.is-active .tst-card {
  animation: tst-card-in .6s cubic-bezier(.2,.7,.2,1) forwards;
  animation-delay: calc(var(--i, 0) * 120ms);
}
@keyframes tst-card-in { to { opacity:1; transform: translateY(0) scale(1);} }

/* Apply enter direction on the active slide */
.tst-slide.anim-in-right { animation: tst-enter-right .6s cubic-bezier(.2,.7,.2,1); }
.tst-slide.anim-in-left  { animation: tst-enter-left  .6s cubic-bezier(.2,.7,.2,1); }

/* optional exit */
.tst-slide.anim-out-right { animation: tst-exit-right .4s ease; }
.tst-slide.anim-out-left  { animation: tst-exit-left  .4s ease; }

/* Dots focus */
.tst-dots button { outline: none; }
.tst-dots button:focus-visible { box-shadow: 0 0 0 3px rgba(56,189,248,.45); border-radius:9999px; }

/* Progress bar animation */
.tst-progress .tst-bar.run { animation: tst-progress linear forwards var(--tst-interval, 6000ms); }
@keyframes tst-progress { from {width:0%} to {width:100%} }

/* Reduced motion */
@media (prefers-reduced-motion: reduce) {
  .tst-slide.anim-in-right, .tst-slide.anim-in-left,
  .tst-slide.anim-out-right, .tst-slide.anim-out-left,
  .tst-slide.is-active .tst-card,
  .tst-progress .tst-bar.run {
    animation: none !important;
  }
  .tst-slide .tst-card { opacity: 1; transform: none; }
}
</style>

<script>
(() => {
  // Make every .tst-root behave like a separate slider
  document.querySelectorAll('#tst-{{ $uid }}-mob, #tst-{{ $uid }}-desk').forEach((root) => {
    const track    = root.querySelector('.tst-track');
    const slides   = Array.from(root.querySelectorAll('.tst-slide'));
    const prevBtn  = root.querySelector('.tst-prev');
    const nextBtn  = root.querySelector('.tst-next');
    const dotsBox  = root.querySelector('.tst-dots');
    const bar      = root.querySelector('.tst-progress .tst-bar');

    const total = slides.length;
    if (total <= 1) { prevBtn && (prevBtn.style.display = 'none'); nextBtn && (nextBtn.style.display = 'none'); }

    let index = 0;
    let timer = null;
    let hovering = false;
    const INTERVAL = 6000;

    if (bar) bar.style.setProperty('--tst-interval', INTERVAL + 'ms');

    function layout() {
      const w = root.clientWidth;
      slides.forEach(s => s.style.width = w + 'px');
      track.style.width = (w * total) + 'px';
      go(index, false);
    }

    function buildDots() {
      if (!dotsBox) return;
      dotsBox.innerHTML = '';
      for (let i = 0; i < total; i++) {
        const b = document.createElement('button');
        b.type = 'button';
        b.className = 'h-2.5 w-2.5 rounded-full transition ' + (i === index ? 'bg-sky-500' : 'bg-slate-300 dark:bg-slate-600');
        b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        b.addEventListener('click', () => { go(i); restart(); });
        dotsBox.appendChild(b);
      }
    }

    function setActiveSlideClasses(prev, curr, dir) {
      slides.forEach(s => s.classList.remove('is-active','anim-in-left','anim-in-right','anim-out-left','anim-out-right'));
      if (prev != null) {
        slides[prev].classList.add(dir === 'right' ? 'anim-out-left' : 'anim-out-right');
      }
      slides[curr].classList.add('is-active', dir === 'right' ? 'anim-in-right' : 'anim-in-left');
    }

    function resetProgress() {
      if (!bar) return;
      bar.classList.remove('run');
      bar.offsetWidth; // reflow
      bar.classList.add('run');
    }

    function go(i, animate = true) {
      const prev = index;
      const target = (i + total) % total;
      const dir = (target > prev || (prev === 0 && target === total - 1)) ? 'right' : 'left';

      index = target;
      track.style.transitionDuration = animate ? '700ms' : '0ms';
      const offset = -index * root.clientWidth;
      track.style.transform = `translate3d(${offset}px,0,0)`;

      setActiveSlideClasses(prev, index, dir);
      buildDots();
      resetProgress();

      // refresh AOS after DOM changes (optional but keeps timing tidy)
      if (window.AOS?.refreshHard) AOS.refreshHard();
    }

    function start(){ stop(); resetProgress(); timer = setInterval(() => { if (!hovering) go(index + 1); }, INTERVAL); }
    function stop(){ if (timer) clearInterval(timer); timer = null; }
    function restart(){ stop(); start(); }

    prevBtn && prevBtn.addEventListener('click', () => { go(index - 1); restart(); });
    nextBtn && nextBtn.addEventListener('click', () => { go(index + 1); restart(); });

    root.addEventListener('mouseenter', () => { hovering = true; });
    root.addEventListener('mouseleave', () => { hovering = false; });

    root.addEventListener('keydown', e => {
      if (e.key === 'ArrowLeft')  { go(index - 1); restart(); }
      if (e.key === 'ArrowRight') { go(index + 1); restart(); }
    });

    // touch swipe
    let sx = 0, dx = 0;
    track.addEventListener('touchstart', e => { stop(); sx = e.touches[0].clientX; dx = 0; }, {passive:true});
    track.addEventListener('touchmove',  e => { dx = e.touches[0].clientX - sx; }, {passive:true});
    track.addEventListener('touchend',   () => { if (Math.abs(dx) > 40) go(index + (dx < 0 ? 1 : -1)); start(); });

    window.addEventListener('resize', layout, { passive: true });

    // init
    layout();
    buildDots();
    setActiveSlideClasses(null, index, 'right');
    start();
  });
})();
</script>
