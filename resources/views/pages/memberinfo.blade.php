<x-guest-layout>
    {{-- AOS load (remove if already global) --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) {
                AOS.init({
                    duration: 900,
                    easing: 'cubic-bezier(.2,.7,.2,1)',
                    once: true,
                    offset: 90
                });
            }
        });
    </script>

    <style>
        @keyframes pulseGlow {
            0%, 100% { opacity:.3; filter:blur(40px) }
            50% { opacity:.6; filter:blur(65px) }
        }
        .tilt {
            transform: perspective(900px) rotateX(0) rotateY(0) translateZ(0);
            transition: transform .35s ease, box-shadow .35s ease;
        }
        .tilt:hover {
            transform: perspective(900px) rotateX(3deg) rotateY(-4deg) translateZ(8px);
        }
    </style>

    <!-- ================== MISSION HERO ================== -->
    <section class="relative overflow-hidden border-b bg-white dark:bg-[#0b1220] dark:border-gray-800">
        <!-- background glow -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-cyan-300/25 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]"></div>
            <div class="absolute -bottom-28 -right-28 w-[28rem] h-[28rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]"></div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-14 lg:py-24 grid lg:grid-cols-12 gap-10 items-center">
            <!-- Left content -->
            <div class="lg:col-span-7" data-aos="fade-right">
                <p class="uppercase tracking-wider text-[12px] font-semibold text-cyan-600">
                    Khalid IT Mission
                </p>

                <h1 class="mt-3 text-4xl md:text-6xl font-extrabold leading-tight text-slate-900 dark:text-white">
                    Trusted Growth through
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-indigo-600">
                        Lead Generation
                    </span>
                    &
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-fuchsia-400 to-purple-500">
                        Cold Email Marketing
                    </span>
                </h1>

                <p class="mt-6 text-lg md:text-xl text-slate-600 dark:text-slate-300 max-w-2xl">
                    Our mission is simple: build predictable pipelines with ethical <strong>lead generation</strong>,
                    human-first messaging, and high-deliverability <strong>cold email marketing</strong>. 
                    We combine data, creativity, and transparency to turn ideal prospects into long-term customers—consistently.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#team-lead"
                       class="group relative inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold text-white
                              bg-gradient-to-r from-cyan-500 to-indigo-600 shadow-lg hover:shadow-xl transition">
                        Meet the Team Lead
                        <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#open-positions"
                       class="px-6 py-3 rounded-xl font-semibold border-2 border-cyan-500 text-cyan-700 dark:text-cyan-300 hover:bg-cyan-500 hover:text-white transition">
                        Explore Careers
                    </a>
                </div>
            </div>

            <!-- Right demo image -->
            <div class="lg:col-span-5 relative" data-aos="fade-left">
                <div class="absolute -inset-6 rounded-3xl bg-gradient-to-tr from-cyan-400/10 to-fuchsia-400/10 blur-2xl"></div>
                <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=1600&auto=format&fit=crop"
                     alt="Lead Generation & Cold Email Marketing Dashboard"
                     class="relative z-10 w-full h-auto rounded-2xl shadow-2xl tilt">
            </div>
        </div>
    </section>

    <!-- ================== TEAM LEAD ================== -->
    <section id="team-lead" class="relative bg-white dark:bg-[#0b1220]">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 py-14 lg:py-20 grid lg:grid-cols-12 gap-10 items-center">
            <!-- Photo -->
            <div class="lg:col-span-4" data-aos="zoom-in">
                <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?q=80&w=1200&auto=format&fit=crop"
                     alt="Head of Lead Generation & Cold Email"
                     class="w-full h-auto rounded-xl shadow-lg tilt">
            </div>

            <!-- Bio -->
            <div class="lg:col-span-8" data-aos="fade-left">
                <h2 class="text-3xl md:text-5xl font-bold text-slate-900 dark:text-white">
                    Head of Lead Generation & Cold Email
                </h2>
                <p class="mt-3 text-base md:text-lg text-slate-500 dark:text-slate-400">
                    Driving predictable pipeline with ethical outreach, deliverability best-practices, and conversion-first copy.
                </p>

                <p class="mt-5 md:text-lg text-slate-600 dark:text-slate-300">
                    With over a decade of B2B growth experience, our team lead has built repeatable <strong>lead generation</strong>
                    engines across SaaS, IT services, and e-commerce. From ICP validation, list enrichment, and offer testing
                    to <strong>cold email marketing</strong> frameworks that spark real replies—our playbooks are data-driven,
                    privacy-conscious, and human-first. The result? Higher intent, lower CAC, and a pipeline you can forecast.
                </p>

                <div class="mt-8">
                    <a href="#open-positions"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg font-semibold border-2 border-indigo-500 text-indigo-600 dark:text-indigo-300 hover:bg-indigo-500 hover:text-white transition">
                        Work With Us
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
