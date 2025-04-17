        <!-- Navbar -->
        <section class="shadow fixed top-0 left-0 right-0 z-50 bg-white">
            <header class="max-w-screen-xl mx-auto">
                <div class="mx-auto px-4 py-4 flex justify-between items-center">
                    <img src="https://www.searchbloom.com/wp-content/uploads/2019/07/logo-1.png" alt="image" class="w-[110px] h-[50px]">
                    <button id="mobile-toggle" class="md:hidden text-gray-800 focus:outline-none">
                        <svg id="hamburger-icon" class="w-6 h-6 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <nav class="hidden md:flex space-x-8 items-center">
                        <div class="relative group">
                            <button class="dropdown-toggle font-semibold flex items-center gap-1">
                                Services
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute left-0 top-full bg-white shadow-xl p-6 w-56 rounded-lg border border-gray-200 hidden">
                                <div>
                                    <h4 class="font-bold mb-2 text-blue-600">SEO Services</h4>
                                    <ul class="space-y-1 text-sm text-gray-700">
                                        <li class="relative group">
                                            <a href="#" class="submenu-toggle hover:text-blue-600 flex justify-between items-center">
                                                Local SEO
                                                <svg class="chevron-icon w-4 h-4 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                            <ul class="absolute hidden left-full top-0 bg-white shadow-lg p-4 w-56 border border-gray-200 text-sm">
                                                <li><a href="#" class="hover:text-blue-600">GMB Optimization</a></li>
                                                <li><a href="#" class="hover:text-blue-600">Map Pack Ranking</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="hover:text-blue-600">Ecommerce SEO</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Updated Free Tools Link -->
                        <div class="relative group">
                            <button class="dropdown-toggle font-semibold flex items-center gap-1">
                                Free Tools
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute left-0 top-full bg-white shadow-xl p-6 w-56 rounded-lg border border-gray-200 hidden">
                                <div>
                                    <h4 class="font-bold mb-2 text-blue-600">SEO Tools</h4>
                                    <ul class="space-y-1 text-sm text-gray-700">
                                        <li><a href="#" class="hover:text-blue-600">Keyword Research Tool</a></li>
                                        <li><a href="#" class="hover:text-blue-600">Backlink Checker</a></li>
                                        <li><a href="#" class="hover:text-blue-600">SEO Audit Tool</a></li>
                                        <li><a href="#" class="hover:text-blue-600">Rank Tracker</a></li>
                                        <li><a href="#" class="hover:text-blue-600">Website Speed Test</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Company Link with Submenu -->
                        <div class="relative group">
                            <button class="dropdown-toggle font-semibold flex items-center gap-1">
                                Company
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute hidden left-0 top-full bg-white shadow-xl p-6 w-56 rounded-lg border border-gray-200">
                                <ul class="space-y-2 text-sm text-gray-700">
                                    <li><a href="#" class="hover:text-blue-600">About Us</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Careers</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Our Team</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Mission & Values</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Privacy Policy</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Terms & Conditions</a></li>
                                    <li><a href="#" class="hover:text-blue-600">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="font-semibold hover:text-blue-600">Case Studies</a>
                        <a href="#" class="ml-6 px-6 py-2 uppercase font-bold italic text-lg bg-white text-[#ff5056] border-2 border-[#ff5056] rounded hover:text-white hover:bg-[#ff5056] transition duration-500 ease-in-out">
                            Free Action Plan
                        </a>
                    </nav>
                </div>
                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
                    <ul class="space-y-3">
                        <li>
                            <button class="mobile-submenu-toggle w-full text-left font-semibold flex justify-between items-center">
                                Services
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul class="hidden ml-4 mt-2 space-y-2 text-sm">
                                <li>
                                    <button class="mobile-submenu-toggle w-full text-left flex justify-between items-center">
                                        Local SEO
                                        <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <ul class="hidden ml-4 mt-1 space-y-1">
                                        <li><a href="#" class="block">GMB Optimization</a></li>
                                        <li><a href="#" class="block">Map Pack Ranking</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="block">Ecommerce SEO</a></li>
                            </ul>
                        </li>
                        <!-- Free Tools Link (Mobile) -->
                        <li>
                            <button class="mobile-submenu-toggle w-full text-left font-semibold flex justify-between items-center">
                                Free Tools
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul class="hidden ml-4 mt-2 space-y-2 text-sm">
                                <li><a href="#" class="block">Keyword Research Tool</a></li>
                                <li><a href="#" class="block">Backlink Checker</a></li>
                                <li><a href="#" class="block">SEO Audit Tool</a></li>
                                <li><a href="#" class="block">Rank Tracker</a></li>
                                <li><a href="#" class="block">Website Speed Test</a></li>
                            </ul>
                        </li>
                        <!-- Company Link with Mobile Submenu -->
                        <li>
                            <button class="mobile-submenu-toggle w-full text-left font-semibold flex justify-between items-center">
                                Company
                                <svg class="chevron-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul class="hidden ml-4 mt-2 space-y-2 text-sm">
                                <li><a href="#" class="block">About Us</a></li>
                                <li><a href="#" class="block">Careers</a></li>
                                <li><a href="#" class="block">Our Team</a></li>
                                <li><a href="#" class="block">Mission & Values</a></li>
                                <li><a href="#" class="block">Privacy Policy</a></li>
                                <li><a href="#" class="block">Terms & Conditions</a></li>
                                <li><a href="#" class="block">Contact Us</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="block font-semibold">Case Studies</a></li>
                    </ul>
                </div>
            </header>
        </section>
