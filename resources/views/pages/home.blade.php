<x-guest-layout>
    {{-- LeadGen & Cold Email – Drop-in Section (Blade/Tailwind/Alpine)
     Fast, responsive, animated, and SEO-focused.
     Replace your old SEARCH ENGINE section with this. --}}

    @include('components.hero')

    @include('components.testimonials', ['testimonials' => $testimonials ?? []])



    <!-- Section Three Start -->
    @include('components.home-section-3')

    @include('components.home-section-4')
    @include('components.home-section-5')
    @include('components.home-section-6')

    @include('components.home-section-8')
    @include('components.home-section-9')

    @include('components.home-section-15')
    @include('components.home-section-16', ['posts' => $latestPosts ?? []])
    





    <!-- Tiny ripple effect for buttons (optional) -->
    <style>
        .ripple {
            position: relative;
            overflow: hidden
        }

        .ripple:after {
            content: '';
            position: absolute;
            inset: auto;
            width: 0;
            height: 0;
            border-radius: 9999px;
            background: rgba(255, 255, 255, .35);
            transform: translate(-50%, -50%);
            pointer-events: none;
            opacity: 0
        }

        .ripple:active:after {
            left: var(--x);
            top: var(--y);
            opacity: 1;
            width: 200px;
            height: 200px;
            transition: width .4s ease, height .4s ease, opacity .8s ease;
            opacity: 0
        }

        @keyframes drift {
            0% {
                transform: translateX(0)
            }

            50% {
                transform: translateX(-25%)
            }

            100% {
                transform: translateX(0)
            }
        }
    </style>
    <script>
        // Intersection Observer reveal + stagger delays
        (function() {
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReduced) return; // respect user's motion preference

            const els = document.querySelectorAll('[data-animate]');
            const io = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        target.classList.add('is-visible');
                        // set stagger delays
                        target.querySelectorAll('.stagger>*').forEach((child, i) => {
                            child.style.transitionDelay = (i * 90) + 'ms';
                        });
                        io.unobserve(target);
                    }
                })
            }, {
                threshold: 0.18
            });
            els.forEach(el => io.observe(el));

            // ripple click coords
            document.addEventListener('pointerdown', (e) => {
                const btn = e.target.closest('.ripple');
                if (!btn) return;
                const rect = btn.getBoundingClientRect();
                btn.style.setProperty('--x', (e.clientX - rect.left) + 'px');
                btn.style.setProperty('--y', (e.clientY - rect.top) + 'px');
            });
        })();
    </script>

</x-guest-layout>
