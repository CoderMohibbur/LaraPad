<x-guest-layout>

<!-- Banner -->
<section class="border-b dark:border-gray-700">
    <div class="py-16 max-w-screen-xl mx-auto text-center lg:text-left px-3">
        <h1 class="font-bold text-5xl lg:text-7xl text-gray-900 dark:text-white">Khalid IT Mission:</h1>
        <p class="text-xl lg:text-2xl text-[#5d7183] dark:text-gray-300 pt-6">
            We are the
            <strong class="bg-[#bceaf7] dark:bg-[#1f2937] dark:text-white px-1 rounded">most trusted</strong>,
            <strong class="bg-[#bceaf7] dark:bg-[#1f2937] dark:text-white px-1 rounded">transparent</strong>, and
            <strong class="bg-[#bceaf7] dark:bg-[#1f2937] dark:text-white px-1 rounded">results-driven</strong>
            search engine marketing company in the industry.
        </p>
    </div>
</section>

<!-- Our Leadership Team -->
<section class="border-b dark:border-gray-700">
    <div class="max-w-screen-xl mx-auto px-6 my-10">
        <div class="text-center lg:px-20">
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white">Our Leadership Team</h1>
            <p class="my-8 text-xl text-gray-700 dark:text-gray-300">
                Through careful selection, we’ve curated a group of digital marketing experts that are not only
                knowledgeable and experienced but ultimately care about providing the most value to our partners,
                regardless of their size, scope, or industry. Whether you’re a small business owner, a marketing guru,
                or growing a national brand, our team is here to help you maximize your online presence and receive the
                maximum return on investment.
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 lg:px-20">
            @for($i = 0; $i < 6; $i++)
                <div class="text-center mx-auto">
                    <a href="#">
                        <img src="https://www.Searchbloom.com/wp-content/uploads/2019/08/Cody-Jensen.jpg"
                             alt="Team Member"
                             class="w-full h-auto lg:w-[320px] lg:h-[350px] object-cover rounded-md shadow-sm">
                    </a>
                    <h2 class="text-xl font-bold pt-3 text-gray-800 dark:text-white">Cody C. Jensen</h2>
                    <p class="text-[#5c7183] dark:text-gray-400 font-semibold py-1">CEO & Founder</p>
                </div>
            @endfor
        </div>
    </div>
</section>

</x-guest-layout>
