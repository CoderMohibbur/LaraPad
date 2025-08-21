<!-- Section Three (full-bleed bg + centered content) -->
<section class="relative py-12 overflow-hidden">
  <!-- full-bleed animated bg (covers entire width) -->
  <div aria-hidden="true"
       class="absolute inset-y-0 left-1/2 -translate-x-1/2 w-screen
              bg-gradient-to-r from-indigo-100 via-pink-50 to-emerald-100
              dark:from-gray-900 dark:via-gray-800 dark:to-gray-900
              opacity-40 animate-pulse"></div>

  <!-- content container -->
  <div class="relative max-w-screen-xl mx-auto px-4">
    <h1 class="text-center text-slate-700 dark:text-gray-300 text-2xl lg:text-3xl font-bold tracking-wide pb-10">
      Our results have been talked about by:
    </h1>

    <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-6">
      <!-- item -->
      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/fobes.png" alt="Forbes"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>

      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp delay-100">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/usa-today.png" alt="USA Today"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>

      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp delay-200">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/the-wall-street-journal.png" alt="WSJ"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>

      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp delay-300">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/inc.png" alt="Inc"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>

      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp delay-400">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/entrepreneur.png" alt="Entrepreneur"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>

      <li class="bg-white dark:bg-gray-800 p-4 flex items-center justify-center rounded-2xl shadow-md
                 hover:shadow-xl transition-all duration-500 ease-out animate-fadeInUp delay-500">
        <img loading="lazy" src="https://www.Searchbloom.com/wp-content/uploads/2018/07/yahoo.png" alt="Yahoo"
             class="w-[150px] grayscale hover:grayscale-0 transition duration-500">
      </li>
    </ul>
  </div>

  <!-- animations -->
  <style>
    @keyframes fadeInUp {
      0% { opacity:0; transform: translateY(20px); }
      100% { opacity:1; transform: translateY(0); }
    }
    .animate-fadeInUp { animation: fadeInUp 1s ease forwards; }
    .delay-100 { animation-delay: .1s; }
    .delay-200 { animation-delay: .2s; }
    .delay-300 { animation-delay: .3s; }
    .delay-400 { animation-delay: .4s; }
    .delay-500 { animation-delay: .5s; }
  </style>
</section>
