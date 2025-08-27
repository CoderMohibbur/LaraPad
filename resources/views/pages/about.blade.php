{{-- resources/views/pages/about-khalid-it.blade.php --}}
<x-guest-layout>
  <!-- AOS Animation -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (window.AOS) {
        AOS.init({
          duration: 900,
          easing: 'cubic-bezier(.2,.7,.2,1)',
          once: true,
          offset: 100
        });
      }
    });
  </script>

  <!-- ================== About Section ================== -->
  <section id="about-khalid-it" class="relative overflow-hidden bg-white dark:bg-[#0b1220] py-24">
    <!-- Ambient Glow -->
    <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
      <div class="absolute -top-28 -right-28 h-80 w-80 rounded-full blur-3xl
                  bg-gradient-to-tr from-sky-300/30 to-cyan-400/30
                  dark:from-cyan-400/20 dark:to-sky-500/20"></div>
      <div class="absolute -bottom-28 -left-28 h-96 w-96 rounded-full blur-3xl
                  bg-gradient-to-tr from-fuchsia-300/20 to-indigo-300/20
                  dark:from-fuchsia-400/20 dark:to-indigo-400/20"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 lg:px-12 space-y-20">
      <!-- Intro -->
      <header class="text-center space-y-6" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white">
          🟢 About <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-cyan-400">Khalid <span class="text-orange-400">IT</span></span>
        </h1>
        <p class="max-w-3xl mx-auto text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
          Khalid IT is a full-service digital agency helping businesses grow online through 
          website development, digital marketing, and lead generation solutions.
        </p>
      </header>

      <!-- Mission + What we do -->
      <div class="grid md:grid-cols-2 gap-14 items-start">
        <div class="space-y-8" data-aos="fade-right">
          <h2 class="text-2xl font-bold text-slate-800 dark:text-white">🎯 Our Mission</h2>
          <p class="text-slate-600 dark:text-slate-300">
            To make digital growth simple, effective, and result-driven for every business.
          </p>

          <h2 class="text-2xl font-bold text-slate-800 dark:text-white">✅ What We Do</h2>
          <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
            <li>Build fast, mobile-friendly websites</li>
            <li>Run Facebook, Google & email marketing campaigns</li>
            <li>Generate B2B leads with verified data</li>
            <li>Improve online visibility through SEO</li>
            <li>Provide strategy and tools to grow online</li>
          </ul>
        </div>

        <div class="relative" data-aos="fade-left">
          <div class="bg-gradient-to-tr from-sky-500 to-cyan-400 dark:from-indigo-500 dark:to-fuchsia-500
                      text-white rounded-3xl shadow-2xl p-10 space-y-5 hover:scale-[1.02] transition">
            <h3 class="text-xl font-bold">🤝 Why Choose Us</h3>
            <p class="leading-relaxed">
              At Khalid IT, we believe in long-term partnerships and real results—not just promises.
              You tell us your goals—we’ll help you reach them.
            </p>
          </div>
        </div>
      </div>

      <!-- Counters -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="zoom-in">
        <div>
          <p class="text-4xl font-extrabold text-sky-500">120+</p>
          <p class="text-slate-600 dark:text-slate-400">Projects Delivered</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">85+</p>
          <p class="text-slate-600 dark:text-slate-400">Happy Clients</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">8+</p>
          <p class="text-slate-600 dark:text-slate-400">Years Experience</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">24/7</p>
          <p class="text-slate-600 dark:text-slate-400">Client Support</p>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="relative bg-gradient-to-r from-sky-500 to-cyan-400 dark:from-indigo-600 dark:to-fuchsia-600
                  rounded-3xl shadow-xl px-8 py-14 text-center text-white space-y-6"
           data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-extrabold">🚀 Let’s Grow Together</h2>
        <p class="max-w-2xl mx-auto text-lg opacity-90">
          You bring the vision, we’ll bring the strategy & execution. Together, let’s create digital growth that lasts.
        </p>
        <a href="/contact" 
           class="inline-block bg-white text-sky-600 font-semibold px-6 py-3 rounded-full shadow hover:scale-105 transition">
          Start Your Project
        </a>
      </div>
    </div>
  </section>
</x-guest-layout>
