<x-guest-layout>
    {{-- AOS (if not global) --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer="" src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) AOS.init({
                duration: 900,
                easing: 'cubic-bezier(.2,.7,.2,1)',
                once: true,
                offset: 90
            });
        });
    </script>

    <style>
        @keyframes pulseGlow {

            0%,
            100% {
                opacity: .25;
                filter: blur(42px)
            }

            50% {
                opacity: .55;
                filter: blur(64px)
            }
        }

        .glass {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: linear-gradient(160deg, rgba(255, 255, 255, .85), rgba(255, 255, 255, .60))
        }

        .dark .glass {
            background: linear-gradient(160deg, rgba(14, 22, 37, .72), rgba(14, 22, 37, .5));
            border-color: rgba(148, 163, 184, .24)
        }

        .ring-focus:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, .35)
        }

        .heading-balance {
            text-wrap: balance
        }

        .soft-shadow {
            box-shadow: 0 12px 35px -8px rgba(2, 6, 23, .25)
        }

        .dark .soft-shadow {
            box-shadow: 0 12px 35px -10px rgba(0, 0, 0, .6)
        }

        .field {
            transition: box-shadow .2s ease, transform .08s ease
        }

        .field:focus {
            box-shadow: 0 0 0 2px rgba(56, 189, 248, .35), 0 8px 22px -10px rgba(2, 6, 23, .35);
            transform: translateY(-1px)
        }

        .copy-max {
            max-width: 46rem
        }

        .h-underline {
            position: relative
        }

        .h-underline:after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            height: 3px;
            width: 120px;
            background: linear-gradient(90deg, #22d3ee, #6366f1, #a855f7);
            border-radius: 9999px;
            opacity: .7
        }

        /* ▼ Placeholder tune */
        .ph::placeholder {
            color: rgb(100 116 139 / .7);
        }

        /* text-slate-500 @ 70% */
        .dark .ph::placeholder {
            color: rgb(148 163 184 / .55);
        }

        /* text-slate-400 @ 55% */

        /* small reveal animation for info cards */
        @keyframes riseIn {
            0% {
                opacity: 0;
                transform: translateY(16px)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .rise {
            animation: riseIn .6s cubic-bezier(.2, .7, .2, 1) .05s both
        }
    </style>

    <!-- =================== CONTACT HERO =================== -->
    <section class="relative overflow-hidden border-b bg-white dark:bg-[#0b1220] dark:border-gray-800">
        <grammarly-extension data-grammarly-shadow-root="true"
            style="position: absolute; top: 0px; left: 0px; pointer-events: none; --rem: 16;"
            class="dnXmp"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true"
            style="position: absolute; top: 0px; left: 0px; pointer-events: none; --rem: 16;"
            class="dnXmp"></grammarly-extension>
        <!-- ambient glows -->
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div
                class="absolute -top-28 -left-28 w-96 h-96 rounded-full bg-cyan-300/25 blur-3xl animate-[pulseGlow_7s_ease-in-out_infinite]">
            </div>
            <div
                class="absolute -bottom-32 -right-32 w-[32rem] h-[32rem] rounded-full bg-fuchsia-300/20 blur-3xl animate-[pulseGlow_8s_ease-in-out_infinite]">
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 pt-24 pb-12 lg:pt-12">
            <div class="grid lg:grid-cols-12 gap-12 items-start lg:items-center">
                <!-- Left copy -->
                <div class="lg:col-span-7 aos-init aos-animate" data-aos="fade-right">
                    <p class="uppercase tracking-wider text-[12px] font-semibold text-cyan-600">Talk to Growth Experts
                    </p>

                    <h1
                        class="h-underline heading-balance mt-2 copy-max text-4xl md:text-6xl lg:text-[64px] font-extrabold leading-[1.08]
                     text-slate-900 dark:text-white">
                        Contact Us for
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-indigo-600">Lead
                            Generation</span>
                        & <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from/fuchsia-400 to-purple-500">Cold
                            Email Marketing</span>
                    </h1>

                    <!-- ▼ Info footer panel under the title -->
                    <div class="mt-8 glass soft-shadow border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-6 rise aos-init aos-animate"
                        data-aos="fade-up" data-aos-delay="60">
                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            <!-- Talk to Us -->
                            <div>
                                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-3">Talk to Us</h3>
                                <ul class="space-y-2 text-[15px] text-slate-600 dark:text-slate-400">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2 8.5C2 5.46 5.46 2 8.5 2h7A6.5 6.5 0 0 1 22 8.5v7A6.5 6.5 0 0 1 15.5 22h-7A6.5 6.5 0 0 1 2 15.5v-7Z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 8h.01M12 16.5a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Z"></path>
                                        </svg>
                                        <a href="tel:+8801404282727" class="hover:text-cyan-600">+8801404282727</a>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 8l9 6 9-6M21 8v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8"></path>
                                        </svg>
                                        <a href="mailto:khalid@khalidit.com"
                                            class="hover:text-cyan-600">khalid@khalidit.com</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Business Hour -->
                            <div>
                                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-3">Business Hour
                                </h3>
                                <ul class="space-y-2 text-[15px] text-slate-600 dark:text-slate-400">
                                    <li class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                                        </svg>
                                        Sat–Wed: 10 AM – 7 PM
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                                        </svg>
                                        Thu: 9 AM – 1 PM
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2"></path>
                                        </svg>
                                        Friday: Closed
                                    </li>
                                </ul>
                            </div>

                            <!-- Visit Us -->
                            <div>
                                <h3 class="text-base font-semibold text-slate-900 dark:text-white mb-3">Visit Us</h3>
                                <p class="flex items-center gap-2 text-[15px] text-slate-600 dark:text-slate-400">
                                    <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 21c4.97-4.418 8-7.731 8-11a8 8 0 1 0-16 0c0 3.269 3.03 6.582 8 11z">
                                        </path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    Dhaka, Bangladesh
                                </p>
                            </div>

                        </div>
                    </div>
                    <!-- ▲ /info panel -->
                </div>

                <!-- Form card -->
                <div class="lg:col-span-5 aos-init aos-animate" data-aos="fade-left">
                    <div
                        class="glass soft-shadow border border-slate-200/60 dark:border-slate-700/50 rounded-2xl p-6 md:p-7">
                        <h2 class="text-center text-xl md:text-2xl font-semibold text-slate-900 dark:text-white">Get
                            Your Free Action Plan</h2>
                        <p class="mt-1 text-center text-sm text-slate-500 dark:text-slate-400">No pressure. No spam.
                            Just useful ideas.</p>

                        {{-- ✅ Alerts (success / error) --}}
                        @if (session('ok'))
                            <div
                                class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-50 text-emerald-700 px-4 py-3 dark:bg-emerald-900/30 dark:text-emerald-200">
                                {{ session('ok') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div
                                class="mb-4 rounded-lg border border-red-500/30 bg-red-50 text-red-700 px-4 py-3 dark:bg-red-900/30 dark:text-red-200">
                                {{ $errors->first() }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('submit.submit') }}" class="mt-5 space-y-4">
                            @csrf
                            <input type="text" name="company_field" class="hidden" tabindex="-1"
                                autocomplete="off">

                            <div>
                                <label for="name"
                                    class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your
                                    Name</label>
                                <input id="name" name="name" type="text" required=""
                                    class="field ph mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                    placeholder="Name" fdprocessedid="hgqh4d">
                            </div>

                            <div>
                                <label for="email"
                                    class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Work
                                    Email</label>
                                <input id="email" name="email" type="email" required=""
                                    class="field ph mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                    placeholder="name@company.com" fdprocessedid="ro47">
                            </div>

                            <div>
                                <label for="website"
                                    class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Website</label>
                                <input id="website" name="website" type="url"
                                    class="field ph mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                    placeholder="https://site.com">
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="service"
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-200">I’m
                                        interested in</label>
                                    <select id="service" name="service"
                                        class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                        fdprocessedid="xbox2m">
                                        <option>Lead Generation</option>
                                        <option>Cold Email Marketing</option>
                                        <option>Both</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="budget"
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Monthly
                                        Budget</label>
                                    <select id="budget" name="budget"
                                        class="field mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                        fdprocessedid="j2j9u">
                                        <option>৳50k–৳100k</option>
                                        <option>৳100k–৳250k</option>
                                        <option>৳250k+</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="message"
                                    class="block text-sm font-semibold text-slate-700 dark:text-slate-200">Your
                                    Goals</label>
                                <textarea id="message" name="message" rows="4"
                                    class="field ph mt-1 w-full rounded-lg border border-slate-300 dark:border-slate-600 bg-white/75 dark:bg-slate-900/40 px-4 py-2.5"
                                    placeholder="Key goals…" spellcheck="false"
                                    aria-label="To enrich screen reader interactions, please activate Accessibility in Grammarly extension settings"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full inline-flex justify-center items-center gap-2 text-white font-semibold py-3 rounded-xl
                       bg-gradient-to-r from-cyan-500 to-indigo-600 shadow-lg hover:shadow-xl active:scale-[.98] transition"
                                fdprocessedid="paezwt">
                                Get Free Plan
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            <p class="text-[12px] text-slate-500 dark:text-slate-400 text-center">
                                By submitting, you agree to our <a href="/privacy"
                                    class="underline hover:text-cyan-600">Privacy Policy</a>.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <grammarly-extension-vbars data-grammarly-shadow-root="true" class="dnXmp"
            style="display: contents; --rem: 16;"></grammarly-extension-vbars>


        {{-- ✅ Subtle top toast for success --}}
        @if (session('ok'))
            <script>
                (() => {
                    const msg = @json(session('ok'));
                    const bar = document.createElement('div');
                    bar.className =
                        'fixed left-1/2 -translate-x-1/2 top-5 z-[60] px-4 py-2 rounded-xl bg-emerald-600 text-white shadow-lg';
                    bar.setAttribute('role', 'status');
                    bar.textContent = msg;
                    document.body.appendChild(bar);
                    setTimeout(() => bar.remove(), 4200);
                })();
            </script>
        @endif



    </section>
</x-guest-layout>
