<!-- Navbar -->
<section class="shadow fixed top-0 left-0 right-0 z-50 bg-white dark:bg-gray-900">
    <header class="max-w-screen-xl mx-auto">
        <div class="px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/">
                <img src="https://www.searchbloom.com/wp-content/uploads/2019/07/logo-1.png"
                     alt="Logo" class="w-[110px] h-[50px] object-contain">
            </a>

            <!-- Mobile Toggle -->
            <button id="mobile-toggle" class="md:hidden text-gray-800 dark:text-white focus:outline-none">
                <svg id="hamburger-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex space-x-8 items-center">
                <!-- Services -->
                <div class="relative group">
                    <button class="font-semibold flex items-center gap-1">
                        Services
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute top-full left-0 bg-white dark:bg-gray-800 shadow-xl p-6 w-56 rounded-lg border border-gray-200 dark:border-gray-700
                                invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                        <h4 class="font-bold mb-2 text-blue-600">SEO Services</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-200">
                            <li class="relative group">
                                <a href="#" class="hover:text-blue-600 flex justify-between items-center">
                                    Local SEO
                                    <svg class="w-4 h-4 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                <ul class="absolute top-0 left-full bg-white dark:bg-gray-800 shadow-lg p-4 w-56 border border-gray-200 dark:border-gray-700 text-sm
                                           invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200">
                                    <li><a href="#" class="hover:text-blue-600">GMB Optimization</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Map Pack Ranking</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="hover:text-blue-600">Ecommerce SEO</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Free Tools -->
                <div class="relative group">
                    <button class="font-semibold flex items-center gap-1">
                        Free Tools
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute top-full left-0 bg-white dark:bg-gray-800 shadow-xl p-6 w-56 rounded-lg border border-gray-200 dark:border-gray-700
                                invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                        <h4 class="font-bold mb-2 text-blue-600">SEO Tools</h4>
                        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-200">
                            <li><a href="#" class="hover:text-blue-600">Keyword Research Tool</a></li>
                            <li><a href="#" class="hover:text-blue-600">Backlink Checker</a></li>
                            <li><a href="#" class="hover:text-blue-600">SEO Audit Tool</a></li>
                            <li><a href="#" class="hover:text-blue-600">Rank Tracker</a></li>
                            <li><a href="#" class="hover:text-blue-600">Website Speed Test</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Company -->
                <div class="relative group">
                    <button class="font-semibold flex items-center gap-1">
                        Company
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute top-full left-0 bg-white dark:bg-gray-800 shadow-xl p-6 w-56 rounded-lg border border-gray-200 dark:border-gray-700
                                invisible opacity-0 group-hover:visible group-hover:opacity-100 transition duration-200 z-50">
                        <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <li><a href="/" class="hover:text-blue-600">About Us</a></li>
                            <li><a href="/awards" class="hover:text-blue-600">Award</a></li>
                            <li><a href="/team" class="hover:text-blue-600">Our Team</a></li>
                            <li><a href="/careers" class="hover:text-blue-600">Careers</a></li>
                            <li><a href="/member-info" class="hover:text-blue-600">member-info</a></li>
                            <li><a href="/reviews" class="hover:text-blue-600">Reviews</a></li>
                            <li><a href="/contact" class="hover:text-blue-600">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Links -->
                <a href="/blog" class="font-semibold hover:text-blue-600">Blog</a>
                <a href="#"
                   class="ml-6 px-6 py-2 uppercase font-bold italic text-lg bg-white text-[#ff5056] border-2 border-[#ff5056] rounded hover:text-white hover:bg-[#ff5056] transition duration-500 ease-in-out">
                    Free Action Plan
                </a>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <ul class="space-y-3">
                <li><a href="#" class="block font-semibold">Services</a></li>
                <li><a href="#" class="block font-semibold">Free Tools</a></li>
                <li><a href="#" class="block font-semibold">Company</a></li>
                <li><a href="#" class="block font-semibold">Case Studies</a></li>
            </ul>
        </div>
    </header>

    <!-- ✅ JS: Mobile Toggle -->
    <script>
        document.getElementById('mobile-toggle')?.addEventListener('click', function () {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
            document.getElementById('hamburger-icon')?.classList.toggle('hidden');
            document.getElementById('close-icon')?.classList.toggle('hidden');
        });
    </script>
</section>
