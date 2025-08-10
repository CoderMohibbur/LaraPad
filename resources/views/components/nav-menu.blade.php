@php
    $hasMenu = isset($menuTree) && $menuTree->isNotEmpty();
@endphp

@if (!$hasMenu)
    {{-- Dynamic menu খালি হলে স্ট্যাটিক ব্যাকআপ দেখাও --}}
    @include('components.backup-nav')
    @php return; @endphp
@endif



<!-- Navbar -->
<section class="shadow fixed top-0 left-0 right-0 z-50 border-b-2 dark:border-gray-500 bg-white dark:bg-gray-900">
    <header class="max-w-screen-xl mx-auto">
        <div class="px-4 py-4 flex justify-between items-center bg-white dark:bg-gray-900">
            {{-- 
            <!-- Logo -->
            <a href="/">
                @php
                    $dynamicLogo = \App\Http\Controllers\Admin\ReadingSettingController::getLogo();
                @endphp

                @if ($dynamicLogo && file_exists(public_path($dynamicLogo)))
                    <img src="{{ asset($dynamicLogo) }}" alt="Logo" class="w-[250px] h-[70px] object-contain">
                @else
                    <img src="{{ asset('/uploads/2025/04/khalidit-logo-removebg-preview.png') }}" alt="Logo"
                        class="w-[250px] h-[70px] object-contain">
                @endif
            </a> --}}

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


            <!-- Desktop Menu (Dynamic) -->
            <nav class="hidden md:flex items-center text-gray-800 dark:text-gray-100 gap-3">

                {{-- Dynamic header menu roots --}}
                @foreach ($menuTree as $root)
                    @if (($root->children?->count() ?? 0) === 0)
                        {{-- Leaf/Link or CTA (icon=cta) --}}
                        <x-nav-node :node="$root" :is-mobile="false" :level="0" />
                    @else
                        {{-- Has children: dropdown/mega --}}
                        <div class="relative">
                            <ul class="flex items-center">
                                <x-nav-node :node="$root" :is-mobile="false" :level="0" />
                            </ul>
                        </div>
                    @endif
                @endforeach


                <!-- ✅ Static CTA Button -->
                <a href="#"
                    class="ml-6 px-6 py-2 uppercase font-bold italic text-lg bg-white dark:bg-gray-900 text-[#ff5056] border-2 border-[#ff5056] rounded hover:text-white hover:bg-[#ff5056] transition duration-500 ease-in-out">
                    Free Action Plan
                </a>

                <!-- Theme Toggle (kept separate, same behaviour) -->
                <button id="theme-toggle" type="button"
                    class="ml-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-full text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z" />
                    </svg>
                </button>
            </nav>
        </div>

        <!-- Mobile Menu (Dynamic) -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 bg-white dark:bg-gray-900 text-gray-800 dark:text-white"
            x-data>
            <ul class="space-y-2">
                @foreach ($menuTree as $root)
                    <x-nav-node :node="$root" :is-mobile="true" :level="0" />
                @endforeach
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
