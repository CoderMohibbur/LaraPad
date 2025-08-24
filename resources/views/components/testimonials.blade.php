@props(['testimonials' => []])

@php
    $uid = uniqid('tst_');
@endphp

<section id="testimonials-{{ $uid }}" class="relative overflow-hidden w-full border border-y dark:border-gray-500 bg-gray-50 dark:bg-gray-900" tabindex="0">
    <!-- Slider Track -->
    <div id="testimonial-slider" class="slider-track flex transition-transform duration-700 ease-in-out" style="width: 200%;">

        @forelse ($testimonials as $testimonial)
            <div class="slide max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3">
                <div class="w-full md:w-1/3 flex justify-center">
                    @php $dynamicTestimonialImage = $testimonial->image; @endphp

                    @if ($dynamicTestimonialImage && file_exists(public_path($dynamicTestimonialImage)))
                        <img src="{{ asset($dynamicTestimonialImage) }}" alt="{{ $testimonial->name }}" class="w-[360px] h-[420px] object-cover">
                    @else
                        <img src="{{ asset('/uploads/2025/04/default-testimonial.png') }}" alt="{{ $testimonial->name }}" class="w-[360px] h-[420px] object-cover">
                    @endif
                </div>
                <div class="md:w-2/3 text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white leading-snug mb-4">{!! $testimonial->quote !!}</h1>
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-4">{{ $testimonial->description }}</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{!! str_repeat('⭐', $testimonial->rating) !!} – {{ $testimonial->name }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                        {{ $testimonial->designation }}{{ $testimonial->company ? ', ' . $testimonial->company : '' }}
                    </p>
                </div>
            </div>
        @empty
            {{-- Static Fallback Testimonials --}}
            <div class="slide max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3">
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('/uploads/2025/04/mahamudul.png') }}" alt="Mohibbur Rohman" class="w-[360px] h-[420px] object-cover">
                </div>
                <div class="md:w-2/3 text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white leading-snug mb-4">
                        “The way they <span class="bg-blue-100 dark:bg-blue-800 px-1 rounded">pitch</span> their
                        services is <span class="bg-blue-100 dark:bg-blue-800 px-1 rounded">exactly what you get</span>.”
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-4">
                        Unlike most SEO companies, they set clear expectations and deliver on them. It’s rare to
                        find such transparency and commitment.
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">⭐⭐⭐⭐⭐ – Mohibbur Rohman</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">CEO & CTO, Japan Bangladesh IT</p>
                </div>
            </div>

            <div class="slide max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-evenly gap-8 px-3">
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('/uploads/2025/04/mahamudull.png') }}" alt="Mahamudul Islam" class="w-[360px] h-[420px] object-cover">
                </div>
                <div class="md:w-2/3 text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white leading-snug mb-4">
                        “Their SEO approach <span class="bg-blue-100 dark:bg-blue-800 px-1 rounded">delivers results</span>
                        and their communication is <span class="bg-blue-100 dark:bg-blue-800 px-1 rounded">transparent</span>.”
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-4">
                        We saw results within weeks. The clarity, communication, and effectiveness of their work were top-notch.
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">⭐⭐⭐⭐⭐ – Mahamudul Islam</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Developer, Khalid IT</p>
                </div>
            </div>
        @endforelse

    </div>

    <!-- Controls (ভিজ্যুয়াল একদম অপরিবর্তিত) -->
    <div class="absolute inset-y-0 left-0 flex items-center">
        <button onclick="prevSlide_{{ $uid }}()"
            class="text-3xl bg-white dark:bg-gray-700 bg-opacity-70 hover:bg-opacity-90 text-gray-800 dark:text-white px-4 py-2 rounded-r shadow">❮</button>
    </div>
    <div class="absolute inset-y-0 right-0 flex items-center">
        <button onclick="nextSlide_{{ $uid }}()"
            class="text-3xl bg-white dark:bg-gray-700 bg-opacity-70 hover:bg-opacity-90 text-gray-800 dark:text-white px-4 py-2 rounded-l shadow">❯</button>
    </div>
</section>

{{-- Slider logic (স্কোপড, কনফ্লিক্ট-ফ্রি) --}}
<script>
(() => {
    const root = document.getElementById('testimonials-{{ $uid }}');
    if (!root) return;

    const track  = root.querySelector('.slider-track');
    const slides = Array.from(root.querySelectorAll('.slide'));
    const total  = slides.length;
    if (total <= 1) return;

    let index = 0;
    let autoTimer = null;
    const AUTO_MS = 6000;
    let hovering = false;

    function layout() {
        const w = root.clientWidth;
        slides.forEach(s => s.style.width = w + 'px');
        track.style.width = (w * total) + 'px';
        // animate=false on layout
        go(index, false);
    }

    function go(i, animate = true) {
        index = (i + total) % total;
        track.style.transitionDuration = animate ? '700ms' : '0ms';
        const offset = -index * root.clientWidth;
        // GPU-accelerated translate
        track.style.transform = `translate3d(${offset}px,0,0)`;
    }

    function next(){ go(index + 1); }
    function prev(){ go(index - 1); }

    function startAuto() {
        stopAuto();
        autoTimer = setInterval(() => { if (!hovering) next(); }, AUTO_MS);
    }
    function stopAuto() {
        if (autoTimer) clearInterval(autoTimer);
        autoTimer = null;
    }

    // Hover pause/resume
    root.addEventListener('mouseenter', () => hovering = true);
    root.addEventListener('mouseleave', () => hovering = false);

    // Touch swipe
    let startX = 0, dx = 0;
    track.addEventListener('touchstart', e => {
        stopAuto();
        startX = e.touches[0].clientX; dx = 0;
    }, { passive: true });
    track.addEventListener('touchmove', e => {
        dx = e.touches[0].clientX - startX;
    }, { passive: true });
    track.addEventListener('touchend', () => {
        if (Math.abs(dx) > 40) (dx < 0 ? next() : prev());
        startAuto();
    });

    // Keyboard support
    root.addEventListener('keydown', e => {
        if (e.key === 'ArrowRight') next();
        if (e.key === 'ArrowLeft')  prev();
    });

    // Public API for this instance (buttons' onclick)
    window['nextSlide_{{ $uid }}'] = () => { next(); stopAuto(); startAuto(); };
    window['prevSlide_{{ $uid }}'] = () => { prev(); stopAuto(); startAuto(); };

    // Init
    window.addEventListener('resize', layout);
    layout();
    startAuto();
})();
</script>





{{-- Slider logic scoped to this instance --}}
<script>
    (() => {
        const root = document.getElementById('testimonials-{{ $uid }}');
        if (!root) return;

        const track = root.querySelector('.slider-track');
        const slides = [...root.querySelectorAll('.slide')];
        const dotsC = root.querySelector('#t-dots-{{ $uid }}');
        const prevB = root.querySelector('[data-prev]');
        const nextB = root.querySelector('[data-next]');

        const total = slides.length;
        if (total <= 1) return; // single slide → no slider

        let index = 0,
            auto, hovering = false;

        function layout() {
            const viewportW = root.clientWidth; // container width
            slides.forEach(s => s.style.width = viewportW + 'px');
            track.style.width = (viewportW * total) + 'px';
            go(index, false);
        }

        function drawDots() {
            dotsC.innerHTML = '';
            for (let i = 0; i < total; i++) {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = 'h-2.5 w-2.5 rounded-full transition ' + (i === index ? 'bg-sky-500' :
                    'bg-slate-300 dark:bg-slate-600');
                b.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                b.addEventListener('click', () => go(i));
                dotsC.appendChild(b);
            }
        }

        function go(i, animate = true) {
            index = (i + total) % total;
            track.style.transitionDuration = animate ? '700ms' : '0ms';
            const offset = -index * root.clientWidth;
            track.style.transform = `translate3d(${offset}px,0,0)`;
            drawDots();
        }

        function start() {
            stop();
            auto = setInterval(() => {
                if (!hovering) go(index + 1);
            }, 6000);
        }

        function stop() {
            if (auto) clearInterval(auto);
        }

        // events
        nextB.addEventListener('click', () => go(index + 1));
        prevB.addEventListener('click', () => go(index - 1));
        root.addEventListener('mouseenter', () => hovering = true);
        root.addEventListener('mouseleave', () => hovering = false);

        // touch swipe
        let startX = 0,
            dx = 0;
        track.addEventListener('touchstart', e => {
            stop();
            startX = e.touches[0].clientX;
            dx = 0;
        }, {
            passive: true
        });
        track.addEventListener('touchmove', e => {
            dx = e.touches[0].clientX - startX;
        }, {
            passive: true
        });
        track.addEventListener('touchend', () => {
            Math.abs(dx) > 40 ? go(index + (dx < 0 ? 1 : -1)) : start();
        });

        // keyboard
        root.setAttribute('tabindex', '0');
        root.addEventListener('keydown', e => {
            if (e.key === 'ArrowRight') go(index + 1);
            if (e.key === 'ArrowLeft') go(index - 1);
        });

        // init
        window.addEventListener('resize', layout);
        layout();
        drawDots();
        start();
    })();
</script>
