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
          website development, cold email marketing, digital marketing, and lead generation solutions.
        </p>
      </header>

      <!-- About CEO -->
      <div class="grid md:grid-cols-2 gap-14 items-start">
        <div class="space-y-8" data-aos="fade-right">
          <h2 class="text-2xl font-bold text-slate-800 dark:text-white">👤 About The CEO</h2>
          <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
            I am <strong>Khalid Hasan</strong>, and I am an individual driven by a relentless passion for personal and professional growth.  
            Born and raised in a background of extreme poverty, I pursued a Diploma in Civil Engineering, but destiny led me into the BPO sector.
          </p>
          <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
            My journey towards success truly began in 2018 with a small $5 order on Fiverr. From there, I kept learning, working, and growing. 
            Eventually, I founded <strong>Khalid IT</strong>, which now proudly serves <span class="font-semibold text-sky-500">1600+ companies across 68 countries</span>, completing over <span class="font-semibold text-sky-500">5000+ projects</span>.
          </p>
          <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
            Currently, I am a <strong>Level Two Seller on Fiverr</strong>, a <strong>Top-Rated Plus Freelancer on Upwork</strong>, 
            with earnings of <span class="font-semibold text-sky-500">$147,000+</span> on Fiverr, <span class="font-semibold text-sky-500">$40,000+</span> on Upwork, 
            and <span class="font-semibold text-sky-500">$100,000+</span> from other marketplaces.
          </p>
          <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
            My story shows that with hard work, determination, and a willingness to learn, it is possible to overcome any obstacle and achieve success. 
          </p>
        </div>
        <div class="relative" data-aos="fade-left">
          <div class="bg-gradient-to-tr from-sky-500 to-cyan-400 dark:from-indigo-500 dark:to-fuchsia-500
                      text-white rounded-3xl shadow-2xl p-10 space-y-5 hover:scale-[1.02] transition">
            <h3 class="text-xl font-bold">📈 Key Milestones</h3>
            <ul class="space-y-2 text-white/90 list-disc pl-5">
              <li>2018 – First $5 Fiverr order</li>
              <li>1600+ Clients Served Worldwide</li>
              <li>5000+ Projects Completed</li>
              <li>$180,000+ Freelance Earnings</li>
              <li>Top-Rated Plus Upwork Freelancer</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Mission -->
      <div class="space-y-6" data-aos="fade-up">
        <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white text-center">🎯 Our Mission</h2>
        <p class="max-w-4xl mx-auto text-lg text-slate-600 dark:text-slate-300 leading-relaxed text-center">
          At Khalid IT, our mission is to empower businesses of all sizes to grow and succeed in the digital world.  
          We believe in simple, effective, and results-driven solutions—whether through lead generation, cold email marketing, 
          or full-scale digital strategy.
        </p>
      </div>

      <!-- Vision -->
      <div class="space-y-6" data-aos="fade-up">
        <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white text-center">🌍 Our Vision</h2>
        <p class="max-w-4xl mx-auto text-lg text-slate-600 dark:text-slate-300 leading-relaxed text-center">
          Our vision is to become a <strong>global leader in IT services</strong>, not just by size, but by trust and impact.  
          Within 5 years, we aim to expand into <span class="text-sky-500">web development, web design, and graphics design</span>—becoming a one-stop partner for digital growth.
        </p>
        <p class="max-w-4xl mx-auto text-lg text-slate-600 dark:text-slate-300 leading-relaxed text-center">
          We want Khalid IT to be a place where clients achieve long-term success, and young professionals find opportunities to innovate, learn, and grow.
        </p>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-aos="zoom-in">
        <div>
          <p class="text-4xl font-extrabold text-sky-500">5000+</p>
          <p class="text-slate-600 dark:text-slate-400">Projects Completed</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">1600+</p>
          <p class="text-slate-600 dark:text-slate-400">Clients Served</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">68+</p>
          <p class="text-slate-600 dark:text-slate-400">Countries Reached</p>
        </div>
        <div>
          <p class="text-4xl font-extrabold text-sky-500">$180k+</p>
          <p class="text-slate-600 dark:text-slate-400">Freelance Earnings</p>
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
