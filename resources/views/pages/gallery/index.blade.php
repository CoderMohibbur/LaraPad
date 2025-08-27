{{-- resources/views/admin/gallery-items/index.blade.php --}}
<x-app-layout>
  <section class="py-10">
    <div class="max-w-screen-xl mx-auto px-4">

      {{-- Top Bar --}}
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Gallery Items</h1>
          <p class="text-gray-600 dark:text-gray-300">Manage photos, captions, tags & visibility.</p>
        </div>
        <a href="{{ route('gallery-items.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
          + Add New Item
        </a>
      </div>

      {{-- Flash --}}
      @if (session('ok'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800
                    dark:border-green-900 dark:bg-green-900/30 dark:text-green-200">
          {{ session('ok') }}
        </div>
      @endif

      {{-- Filters --}}
      <form method="GET" class="mb-5">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
          <div class="md:col-span-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search caption / tag / alt"
                   class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500" />
          </div>

          <div>
            <select name="tag"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="">All Tags</option>
              @foreach($tags as $t)
                <option value="{{ $t }}" @selected(request('tag')===$t)>{{ $t }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <select name="year"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="">Any Year</option>
              @foreach($years as $y)
                <option value="{{ $y }}" @selected(request('year')==$y)>{{ $y }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <select name="is_active"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="">Any Status</option>
              <option value="1" @selected(request('is_active')==='1')>Active</option>
              <option value="0" @selected(request('is_active')==='0')>Inactive</option>
            </select>
          </div>

          <div class="flex gap-2">
            <select name="sort"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="order"   @selected(request('sort','order')==='order')>Sort: Order</option>
              <option value="year"    @selected(request('sort')==='year')>Sort: Year</option>
              <option value="created" @selected(request('sort')==='created')>Sort: Created</option>
            </select>
            <select name="dir"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="asc"  @selected(request('dir','asc')==='asc')>Asc</option>
              <option value="desc" @selected(request('dir')==='desc')>Desc</option>
            </select>
          </div>

          <div class="flex gap-2 md:col-span-2">
            <select name="per_page"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              @foreach ([8,12,24,48] as $n)
                <option value="{{ $n }}" @selected((int)request('per_page',12)===$n)>{{ $n }}/page</option>
              @endforeach
            </select>
            <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Apply</button>
            @if(request()->hasAny(['search','tag','year','is_active','sort','dir','per_page']))
              <a href="{{ route('gallery-items.index') }}"
                 class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Reset</a>
            @endif
          </div>
        </div>
      </form>

      {{-- Table --}}
      <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-800/60">
              <tr class="text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                <th class="px-4 py-3">Image</th>
                <th class="px-4 py-3">Caption</th>
                <th class="px-4 py-3">Tag</th>
                <th class="px-4 py-3">Year</th>
                <th class="px-4 py-3">Order</th>
                <th class="px-4 py-3">Active</th>
                <th class="px-4 py-3">Created</th>
                <th class="px-4 py-3 text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
              @forelse ($items as $it)
                <tr class="text-sm text-gray-800 dark:text-gray-200 hover:bg-gray-50/70 dark:hover:bg-gray-800/50 transition">
                  <td class="px-4 py-3">
                    <div class="h-14 w-20 overflow-hidden rounded-md bg-gray-100 dark:bg-gray-800">
                      <img src="{{ $it->image_path }}" alt="{{ $it->alt }}" class="h-full w-full object-cover">
                    </div>
                  </td>
                  <td class="px-4 py-3">
                    <div class="font-medium line-clamp-2">{{ $it->caption ?: '—' }}</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ $it->alt ?: '' }}</div>
                  </td>
                  <td class="px-4 py-3">{{ $it->tag ?: '—' }}</td>
                  <td class="px-4 py-3">{{ $it->year ?: '—' }}</td>
                  <td class="px-4 py-3">{{ $it->position ?? $it->order ?? '—' }}</td>
                  <td class="px-4 py-3">
                    @if($it->is_active)
                      <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Active</span>
                    @else
                      <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200">Inactive</span>
                    @endif
                  </td>
                  <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">{{ $it->created_at?->format('Y-m-d') }}</td>
                  <td class="px-4 py-3">
                    <div class="hidden sm:flex items-center justify-end gap-2">
                      <a href="{{ route('gallery-items.edit', $it) }}"
                         class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Edit</a>
                      <form method="POST" action="{{ route('gallery-items.destroy', $it) }}" onsubmit="return confirm('Delete this item?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 dark:border-red-800 dark:text-red-300 dark:hover:bg-red-900/20">Delete</button>
                      </form>
                    </div>
                    <div class="relative sm:hidden flex justify-end">
                      <details class="group">
                        <summary class="list-none inline-flex items-center justify-center h-8 w-8 rounded-md border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">⋮</summary>
                        <div class="absolute right-0 mt-2 w-36 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-lg p-1">
                          <a href="{{ route('gallery-items.edit', $it) }}" class="block px-3 py-2 rounded-md hover:bg-gray-50 dark:hover:bg-gray-800 text-sm">Edit</a>
                          <form method="POST" action="{{ route('gallery-items.destroy', $it) }}" onsubmit="return confirm('Delete this item?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full text-left px-3 py-2 rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 text-sm text-red-600 dark:text-red-300">Delete</button>
                          </form>
                        </div>
                      </details>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="px-4 py-10">
                    <div class="text-center">
                      <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-300 flex items-center justify-center">🖼️</div>
                      <h3 class="text-lg font-semibold text-gray-900 dark:text-white">No gallery items yet</h3>
                      <p class="text-gray-600 dark:text-gray-300 mt-1">Click below to add your first item.</p>
                      <a href="{{ route('gallery-items.create') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                        Add New Item
                      </a>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      {{-- Pagination --}}
      <div class="mt-6">
        {{ $items->withQueryString()->links() }}
      </div>

      {{-- Quick Preview (cards) --}}
      @if($items->count())
        <div class="mt-10">
          <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Quick Preview</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($items as $g)
              <article class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">
                <div class="h-40 w-full overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800 mb-3">
                  <img src="{{ $g->image_path }}" alt="{{ $g->alt }}" class="h-full w-full object-cover">
                </div>
                <h3 class="font-semibold text-gray-900 dark:text-white line-clamp-1">{{ $g->caption ?: '—' }}</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $g->tag ?: '—' }} • {{ $g->year ?: '—' }}</p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400 line-clamp-2">{{ $g->alt ?: '' }}</p>
              </article>
            @endforeach
          </div>
        </div>
      @endif

    </div>
  </section>
</x-app-layout>
