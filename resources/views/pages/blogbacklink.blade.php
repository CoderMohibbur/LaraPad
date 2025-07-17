<x-guest-layout>

<!-- Blog Detail -->
<section class="border-b dark:border-gray-700">
    <div class="max-w-screen-xl mx-auto px-3">
        <div class="flex flex-col lg:flex-row gap-8 my-10">
            <!-- Main Blog Content -->
            <div class="w-full lg:w-2/3 h-dvh overflow-y-auto">
                <a href="#">
                    <img src="https://www.Searchbloom.com/wp-content/uploads/2019/01/4-Ways-to-Keep-Your-PPC-Ads-Fresh.jpg" alt="Blog Cover Image" class="w-full rounded">
                </a>
                <div class="mt-4 text-sm space-x-2">
                    <a href="#" class="text-sky-600 dark:text-sky-400 font-semibold hover:underline">Google Ads</a>
                    <a href="#" class="text-sky-600 dark:text-sky-400 font-semibold hover:underline">Google Shopping</a>
                    <a href="#" class="text-sky-600 dark:text-sky-400 font-semibold hover:underline">Pay Per Click</a>
                </div>
                <h2 class="text-3xl font-bold py-2 text-gray-900 dark:text-white hover:text-yellow-500">4 Ways to Keep Your PPC Ads Fresh</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <a href="#" class="hover:underline text-sky-600 dark:text-sky-400 font-semibold">Cody C. Jensen</a>
                    <span>। September 4, 2024</span>
                </p>

                <!-- Colored Line -->
                <div class="flex h-1 w-full mt-5">
                    <div class="bg-sky-500 w-1/6"></div>
                    <div class="bg-green-500 w-1/6"></div>
                    <div class="bg-yellow-400 w-1/6"></div>
                    <div class="bg-orange-400 w-1/6"></div>
                    <div class="bg-red-600 w-1/6"></div>
                    <div class="bg-purple-600 w-1/6"></div>
                </div>

                <!-- Blog Content -->
                <article class="text-gray-800 dark:text-gray-200">
                    <p class="py-5">One great thing about a PPC ad is that you can get a lot of life out of it...</p>

                    <h4 class="py-4 font-semibold">1. Rotate Ads Indefinitely</h4>
                    <p>In the ad customizers feature, you can set up a rotation...</p>

                    <h4 class="py-4 font-semibold">2. Only Advertise When It Makes Sense</h4>
                    <p>Let’s say you have a brick and mortar business and you’re open from 10 a.m. to 6 p.m...</p>

                    <h4 class="py-4 font-semibold">3. Leverage Ad Customizers</h4>
                    <p>Take advantage of ad customizers to dynamically update your ad content...</p>

                    <h4 class="py-4 font-semibold">4. Change the Color of an Ad Element</h4>
                    <p>Even a small visual change—like a color update—can grab user attention again...</p>

                    <p class="py-5">These tips are especially useful in remarketing campaigns...</p>
                </article>

                <!-- Author -->
                <h2 class="text-2xl font-bold py-5 text-gray-900 dark:text-white">About the Author</h2>
                <div class="flex flex-col lg:flex-row gap-5">
                    <div class="w-full lg:w-1/3">
                        <img src="https://www.Searchbloom.com/wp-content/uploads/2019/08/Cody-Jensen.jpg" alt="Cody Jensen" class="rounded w-full h-auto">
                    </div>
                    <div class="w-full lg:w-2/3">
                        <h3 class="font-bold text-xl hover:underline text-gray-800 dark:text-gray-200">Cody Jensen</h3>
                        <p class="text-gray-700 dark:text-gray-400 mt-2">
                            Cody Jensen began his career with Google Inc. and has been in Search Engine Marketing ever since...
                        </p>
                        <a href="#">
                            <img src="https://www.Searchbloom.com/wp-content/uploads/2019/08/linkedin-brands.svg" alt="LinkedIn" class="w-8 h-8 my-4">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="w-full lg:w-1/3">
                <!-- Search -->
                <form method="GET" action="#" class="flex mb-6">
                    <input type="text" name="search" placeholder="Search" class="w-full border px-4 py-3 text-gray-800 dark:text-white bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:outline-none">
                    <button type="submit" class="text-gray-700 dark:text-gray-200 px-4 py-3 border border-l-0 dark:border-gray-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                        </svg>
                    </button>
                </form>

                <!-- Topics -->
                <h2 class="font-bold text-md my-3 text-gray-900 dark:text-white">Topics</h2>
                <div class="border dark:border-gray-700 rounded">
                    <ul>
                        @foreach(['Content Marketing', 'CRO', 'E-Commerce SEO', 'Google Ads', 'Local SEO', 'Technical SEO'] as $topic)
                            <li class="border-b dark:border-gray-700 hover:border-black dark:hover:border-white hover:text-orange-500 duration-300 group">
                                <a href="#" class="py-4 block">
                                    <div class="flex items-center">
                                        <div class="rounded-full border border-black dark:border-white ml-4 w-3 h-3 group-hover:bg-blue-500 group-hover:border-blue-500 duration-300"></div>
                                        <span class="pl-4 text-sm text-gray-800 dark:text-gray-300">{{ $topic }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

</x-guest-layout>
