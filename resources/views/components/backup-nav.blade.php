<!-- Navbar -->
<section class="shadow fixed top-0 left-0 right-0 z-50 border-b-2 dark:border-gray-500 bg-white dark:bg-gray-900">
    <header class="max-w-screen-xl mx-auto">
        <div class="px-4 py-4 flex justify-between items-center bg-white dark:bg-gray-900">

            <!-- Logo -->
            <a href="/">
                <img src="{{ \App\Http\Controllers\Admin\ReadingSettingController::headerLogoUrl() }}" alt="Logo"
                    class="w-[250px] h-[70px] object-contain">
            </a>



            <!-- Mobile Toggle -->
            <button id="mobile-toggle" class="md:hidden text-gray-800 dark:text-white focus:outline-none">
                <svg id="hamburger-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-8 items-center text-gray-800 dark:text-gray-100">

                <!-- Home -->
                <a href="/" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">Home</a>
                <!-- Services -->
                <a href="/services" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">Services</a>




                {{-- <!-- Free Tools -->
                <div class="relative group">
                    <button class="font-semibold flex items-center gap-1 hover:text-blue-600 dark:hover:text-blue-400">
                        Free Tools
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 bg-white dark:bg-gray-800 shadow-xl p-6 w-56 rounded-lg border border-gray-200 dark:border-gray-700
                                invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                        <h4 class="font-bold mb-2 text-blue-600 dark:text-blue-400">SEO Tools</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Keyword Research
                                    Tool</a></li>
                            <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Backlink
                                    Checker</a></li>
                            <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">SEO Audit
                                    Tool</a></li>
                            <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Rank Tracker</a>
                            </li>
                            <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400">Website Speed
                                    Test</a></li>
                        </ul>
                    </div>
                </div> --}}



                <!-- Blog -->
                <a href="/blog" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">Blog</a>
                <!-- Company -->
                <div class="relative group">
                    <button class="font-semibold flex items-center gap-1 hover:text-blue-600 dark:hover:text-blue-400">
                        Company
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 bg-white dark:bg-gray-800 shadow-xl p-6 w-56 rounded-lg border border-gray-200 dark:border-gray-700
                                invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">

                            <li><a href="/awards" class="hover:text-blue-600 dark:hover:text-blue-400">Award</a></li>
                            <li><a href="/team" class="hover:text-blue-600 dark:hover:text-blue-400">Our Team</a></li>
                            <li><a href="/careers" class="hover:text-blue-600 dark:hover:text-blue-400">Careers</a></li>
                            <li><a href="/member-info" class="hover:text-blue-600 dark:hover:text-blue-400">Member
                                    Info</a></li>
                            <li><a href="/reviews" class="hover:text-blue-600 dark:hover:text-blue-400">Reviews</a>
                            </li>
                            {{-- <li><a href="" class="hover:text-blue-600 dark:hover:text-blue-400">Contact Us</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>






                <a href="/about" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">About Us</a>

                <!-- Contact us -->
                <a href="/contact" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">Contact Us</a>

                <!-- Free Action Plan -->
                <a href="#"
                    class="ml-6 px-6 py-2 uppercase font-bold italic text-lg bg-white dark:bg-gray-900 text-[#ff5056] border-2 border-[#ff5056] rounded hover:text-white hover:bg-[#ff5056] transition duration-500 ease-in-out">
                    Free Action Plan
                </a>

                <!-- Theme Toggle -->
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
            x-data="{ openServices: false, openLocal: false, openCompany: false }">
            <ul class="space-y-2">


                <!-- Home -->
                <a href="/" class="font-semibold hover:text-blue-600 dark:hover:text-blue-400">Home</a>

                <!-- Services -->
                <li class="border-b border-gray-200 dark:border-gray-800 py-2">
                    <button type="button" class="w-full flex items-center justify-between font-semibold py-2"
                        @click="openServices = !openServices" :aria-expanded="openServices.toString()"
                        aria-controls="m-services">
                        <span>Services</span>
                        <svg class="w-5 h-5 transition-transform" :class="openServices ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="m-services" x-show="openServices" x-transition.opacity class="pl-3">
                        <ul class="space-y-1 text-sm">

                            <!-- Local SEO (has submenu) -->
                            <li class="py-1">
                                <button type="button"
                                    class="w-full flex items-center justify-between hover:text-blue-600 dark:hover:text-blue-400"
                                    @click="openLocal = !openLocal" :aria-expanded="openLocal.toString()"
                                    aria-controls="m-local-seo">
                                    <span>Local SEO</span>
                                    <svg class="w-4 h-4 transition-transform" :class="openLocal ? 'rotate-90' : ''"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <ul id="m-local-seo" x-show="openLocal" x-transition.opacity
                                    class="mt-2 ml-3 space-y-1">
                                    <li><a href="#"
                                            class="block px-2 py-1 rounded hover:bg-gray-100 dark:hover:bg-gray-800">GMB
                                            Optimization</a></li>
                                    <li><a href="#"
                                            class="block px-2 py-1 rounded hover:bg-gray-100 dark:hover:bg-gray-800">Map
                                            Pack Ranking</a></li>
                                </ul>
                            </li>

                            <!-- Ecommerce SEO -->
                            <li class="py-1">
                                <a href="#" class="block hover:text-blue-600 dark:hover:text-blue-400">Ecommerce
                                    SEO</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Company -->
                <li class="border-b border-gray-200 dark:border-gray-800 py-2">
                    <button type="button" class="w-full flex items-center justify-between font-semibold py-2"
                        @click="openCompany = !openCompany" :aria-expanded="openCompany.toString()"
                        aria-controls="m-company">
                        <span>Company</span>
                        <svg class="w-5 h-5 transition-transform" :class="openCompany ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="m-company" x-show="openCompany" x-transition.opacity class="pl-3">
                        <ul class="space-y-1 text-sm">
                            <li><a href="/" class="block">About Us</a></li>
                            <li><a href="/awards" class="block">Award</a></li>
                            <li><a href="/team" class="block">Our Team</a></li>
                            <li><a href="/careers" class="block">Careers</a></li>
                            <li><a href="/member-info" class="block">Member Info</a></li>
                            <li><a href="/reviews" class="block">Reviews</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Others (simple links) -->
                <li><a href="/contact"
                        class="block font-semibold py-2 hover:text-blue-600 dark:hover:text-blue-400">Contact Us</a>
                </li>
                <li><a href="/blog"
                        class="block font-semibold py-2 hover:text-blue-600 dark:hover:text-blue-400">Blog</a></li>
            </ul>
        </div>

    </header>

    <!-- ✅ JS: Mobile Toggle -->
    <script>
        document.getElementById('mobile-toggle')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
            document.getElementById('hamburger-icon')?.classList.toggle('hidden');
            document.getElementById('close-icon')?.classList.toggle('hidden');
        });
    </script>
</section>
