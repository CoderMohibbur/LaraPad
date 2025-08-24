<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>


    <!-- Styles -->
    @livewireStyles

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>


<body class="relative">

    <!-- ✅ Include Fixed Navbar -->
    @include('components.nav-menu')

    <!-- ✅ Prevent content from hiding under navbar -->
    <div class="pt-[100px] font-sans text-gray-900 bg-white dark:bg-gray-900 antialiased">
        {{ $slot }}

    </div>

    <!-- ✅ Include Footer from components -->
    @include('components.footer')

    @livewireScripts
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>




    {{-- annimation 7-10 section --}}
    <!-- =====================================================
Lead Generation + Cold Email (Sections 7–10)
De-duplicated, lively animations, classic feel, superfast
TailwindCSS + plain JS. Drop anywhere inside a Blade view.
===================================================== -->


    <!-- ============== Shared (once) – atoms + animations ============== -->
    <style>
        /* Reveal-on-view */
        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .7s ease, transform .7s ease
        }

        .is-visible .reveal {
            opacity: 1;
            transform: none
        }


        /* Stagger container: add .stagger on parent */
        .stagger>* {
            opacity: 0;
            transform: translateY(14px)
        }

        .is-visible .stagger>* {
            animation: stg .65s ease forwards
        }

        .is-visible .stagger>*:nth-child(1) {
            animation-delay: .05s
        }

        .is-visible .stagger>*:nth-child(2) {
            animation-delay: .12s
        }

        .is-visible .stagger>*:nth-child(3) {
            animation-delay: .19s
        }

        .is-visible .stagger>*:nth-child(4) {
            animation-delay: .26s
        }

        .is-visible .stagger>*:nth-child(5) {
            animation-delay: .33s
        }

        .is-visible .stagger>*:nth-child(6) {
            animation-delay: .40s
        }

        @keyframes stg {
            to {
                opacity: 1;
                transform: none
            }
        }


        /* Ripple (click/touch feedback) */
        .ripple {
            position: relative;
            overflow: hidden
        }

        .ripple::after {
            content: "";
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

        .ripple:active::after {
            left: var(--x);
            top: var(--y);
            opacity: 1;
            width: 220px;
            height: 220px;
            transition: width .45s ease, height .45s ease, opacity .9s ease;
            opacity: 0
        }
    </style>


    <script>
        (function() {
            // Intersection reveal (one observer for all sections)
            const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!prefersReduced) {
                const io = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            io.unobserve(entry.target);
                        }
                    })
                }, {
                    threshold: .2
                });
                document.querySelectorAll('[data-animate]')?.forEach(el => io.observe(el));
            } else {
                document.querySelectorAll('[data-animate]')?.forEach(el => el.classList.add('is-visible'));
            }


            // Ripple feedback (delegated)
            document.addEventListener('pointerdown', e => {
                const btn = e.target.closest('.ripple');
                if (!btn) return;
                const r = btn.getBoundingClientRect();
                btn.style.setProperty('--x', (e.clientX - r.left) + 'px');
                btn.style.setProperty('--y', (e.clientY - r.top) + 'px');
            });


            // Simple accordion (anywhere): .acc-btn + .acc-panel
            document.addEventListener('click', e => {
                const btn = e.target.closest('.acc-btn');
                if (!btn) return;
                const panel = btn.nextElementSibling;
                const expanded = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !expanded);
                const icon = btn.querySelector('svg');
                if (icon) icon.classList.toggle('rotate-180');
                panel.style.maxHeight = expanded ? '0px' : panel.scrollHeight + 'px';
            });
        })();
    </script>



    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/8801927802206"
        class="fixed z-50 bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg transition duration-300"
        target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp--v1.png" alt="WhatsApp" class="w-6 h-6">

    </a>

</body>

</html>
