<!-- ========== Section: As Featured In / Press Logos (Dark-mode tuned) ========== -->
<section class="relative overflow-hidden py-8 sm:py-10">
  <div class="mx-auto max-w-7xl px-4">
    <h2 class="text-center text-[#5d7183] dark:text-gray-300 text-lg sm:text-xl lg:text-2xl font-semibold will-reveal">
      Our results have been talked about by:
    </h2>

    <!-- Desktop / Tablet: grid -->
    <ul class="mt-6 hidden sm:grid grid-cols-3 md:grid-cols-6 gap-3 sm:gap-4 will-reveal reveal-stagger">
      <li style="--i:0" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/fobes.png"
             alt="Forbes" loading="lazy" decoding="async" class="press-logo">
      </li>
      <li style="--i:1" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/usa-today.png"
             alt="USA Today" loading="lazy" decoding="async" class="press-logo" data-dark="clean">
      </li>
      <li style="--i:2" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/the-wall-street-journal.png"
             alt="The Wall Street Journal" loading="lazy" decoding="async" class="press-logo" data-dark="invert">
      </li>
      <li style="--i:3" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/inc.png"
             alt="Inc." loading="lazy" decoding="async" class="press-logo" data-dark="invert">
      </li>
      <li style="--i:4" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/entrepreneur.png"
             alt="Entrepreneur" loading="lazy" decoding="async" class="press-logo">
      </li>
      <li style="--i:5" class="press-card">
        <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/yahoo.png"
             alt="Yahoo" loading="lazy" decoding="async" class="press-logo">
      </li>
    </ul>

    <!-- Mobile: marquee slider -->
    <div class="sm:hidden mt-6 will-reveal">
      <div class="marquee">
        <div class="marquee-track">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/fobes.png" alt="Forbes" class="press-logo mx-2">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/usa-today.png" alt="USA Today" class="press-logo mx-2" data-dark="clean">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/the-wall-street-journal.png" alt="The Wall Street Journal" class="press-logo mx-2" data-dark="invert">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/inc.png" alt="Inc." class="press-logo mx-2" data-dark="invert">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/entrepreneur.png" alt="Entrepreneur" class="press-logo mx-2">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/yahoo.png" alt="Yahoo" class="press-logo mx-2">
          <!-- repeat (seamless) -->
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/fobes.png" alt="" aria-hidden="true" class="press-logo mx-2">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/usa-today.png" alt="" aria-hidden="true" class="press-logo mx-2" data-dark="clean">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/the-wall-street-journal.png" alt="" aria-hidden="true" class="press-logo mx-2" data-dark="invert">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/inc.png" alt="" aria-hidden="true" class="press-logo mx-2" data-dark="invert">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/entrepreneur.png" alt="" aria-hidden="true" class="press-logo mx-2">
          <img src="https://www.Searchbloom.com/wp-content/uploads/2018/07/yahoo.png" alt="" aria-hidden="true" class="press-logo mx-2">
        </div>
      </div>
    </div>
  </div>

  <!-- subtle divider -->
  <div class="mt-8 mx-auto max-w-7xl px-4">
    <div class="h-px w-full bg-gradient-to-r from-transparent via-slate-200 to-transparent dark:via-slate-800"></div>
  </div>
</section>

<!-- Local styles for press section -->
<style>
  /* Uniform card surface (light stays same, dark a bit brighter + inner glow) */
  .press-card{
    position: relative;
    overflow: hidden;
    border-radius: 14px;
    padding: 14px 16px;
    display: flex; align-items: center; justify-content: center;
    background: #ffffff;
    box-shadow: 0 6px 18px rgba(0,0,0,.06);
    outline: 1px solid rgba(0,0,0,.05);
  }
  .dark .press-card{
    background: rgba(255,255,255,.06);
    outline: 1px solid rgba(255,255,255,.14);
    box-shadow: 0 12px 40px rgba(0,0,0,.25);
    backdrop-filter: blur(4px);
  }
  /* soft spotlight behind logo (only dark) */
  .dark .press-card::after{
    content:""; position:absolute; inset:0; pointer-events:none;
    background: radial-gradient(120px 60px at 50% 50%, rgba(255,255,255,.14), rgba(255,255,255,0) 70%);
    opacity:.6;
  }

  /* Consistent logo sizing */
  .press-logo{ height: 50px; width:auto; max-width: 160px; }

  /* Light-mode base */
  .press-logo{
    filter: grayscale(100%) contrast(1.05) brightness(0.92);
    opacity:.82;
    transition: filter .25s ease, opacity .25s ease, transform .25s ease;
    will-change: filter, opacity, transform;
  }

  /* Dark-mode default: brighten strongly + screen blend (most cases fix) */
  .dark .press-logo{
    mix-blend-mode: screen;
    filter: grayscale(100%) brightness(1.55) contrast(1.25) saturate(1)
            drop-shadow(0 0 6px rgba(255,255,255,.10));
    opacity:.98;
  }

  /* If a logo becomes too washed out with "screen", use data-dark="clean" (no blend, just lift) */
  .dark .press-logo[data-dark="clean"]{
    mix-blend-mode: normal;
    filter: grayscale(100%) brightness(1.25) contrast(1.2)
            drop-shadow(0 0 6px rgba(255,255,255,.10));
    opacity:.95;
  }

  /* If still too dark (dense wordmarks), use data-dark="invert" */
  .dark .press-logo[data-dark="invert"]{
    mix-blend-mode: normal;
    filter: grayscale(100%) invert(1) brightness(1.05) contrast(1.12)
            drop-shadow(0 0 8px rgba(255,255,255,.14));
    opacity:.98;
  }

  /* Hover: pop slightly (both themes) */
  .press-logo:hover{
    filter: grayscale(0) contrast(1) brightness(1);
    opacity:1; transform: translateY(-1px);
  }
  .dark .press-logo:hover{
    /* keep it readable but not neon */
    filter: grayscale(0) brightness(1.15) contrast(1.15)
            drop-shadow(0 0 10px rgba(255,255,255,.18));
  }

  /* Mobile marquee */
  .marquee{ position: relative; overflow: hidden; }
  .marquee-track{ display:flex; align-items:center; gap:.25rem; padding:.25rem 0; }
  @media (prefers-reduced-motion: no-preference){
    .marquee-track{ animation: marquee 18s linear infinite; }
    @keyframes marquee{ 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
    .marquee:hover .marquee-track{ animation-play-state: paused; }
  }
</style>
