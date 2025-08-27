resources/views/pages/front/gallery.blade.php
<x-app-layout>
  <section class="py-10">
    <div class="max-w-screen-xl mx-auto px-4">
      <header class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Gallery</h1>
        <p class="text-gray-600 dark:text-gray-300">Moments from our journey — awards, team, clients & more.</p>
      </header>

      {{-- Search + Sort --}}
      <form method="GET" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
          <div class="md:col-span-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search caption/tag"
              class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500" />
          </div>
          <div>
            <select name="sort"
              class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="order"   @selected(request('sort','order')==='order')>Sort: Order</option>
              <option value="year"    @selected(request('sort')==='year')>Sort: Year</option>
              <option value="created" @selected(request('sort')==='created')>Sort: Created</option>
            </select>
          </div>
          <div>
            <select name="dir"
              class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="asc"  @selected(request('dir','asc')==='asc')>Asc</option>
              <option value="desc" @selected(request('dir')==='desc')>Desc</option>
            </select>
          </div>
          <div>
            <select name="per_page"
              class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              @foreach ([12,24,48] as $n)
                <option value="{{ $n }}" @selected((int)request('per_page', $perPage)===$n)>{{ $n }}/page</option>
              @endforeach
            </select>
          </div>
          <div>
            <button class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Apply</button>
          </div>
        </div>
      </form>

      {{-- Our reusable component --}}
      <x-sections.gallery-grid :items="$items" :tags="$tags" :years="$years" />
    </div>
  </section>
</x-app-layout>
