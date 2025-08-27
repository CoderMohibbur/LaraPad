{{-- resources/views/pages/awards-index.blade.php --}}
<x-app-layout>
    {{-- Optional AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script defer src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.AOS) AOS.init({ duration: 700, once: true, offset: 64 });
        });
    </script>

    <section class="py-10">
        <div class="max-w-screen-xl mx-auto px-4">

            <!-- Top Bar -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6" data-aos="fade-up">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Awards</h1>
                    <p class="text-gray-600 dark:text-gray-300">Manage awards (title, image, year, order).</p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('awards.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M11 11V6h2v5h5v2h-5v5h-2v-5H6v-2z"/></svg>
                        Add New Award
                    </a>
                </div>
            </div>

            {{-- Flash --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-900 dark:bg-green-900/30 dark:text-green-200" data-aos="fade-up">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700 dark:border-red-900 dark:bg-red-900/30 dark:text-red-200" data-aos="fade-up">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $e) <li class="text-sm">{{ $e }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <!-- Filters -->
            <form method="GET" class="mb-5" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                    <div class="md:col-span-2">
                        <label class="sr-only">Search</label>
                        <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Search by title or year"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500" />
                    </div>
                    <div>
                        <label class="sr-only">Status</label>
                        <select name="status"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
                            <option value="all"      @selected(($status ?? 'all')==='all')>All</option>
                            <option value="active"   @selected(($status ?? 'all')==='active')>Active</option>
                            <option value="inactive" @selected(($status ?? 'all')==='inactive')>Inactive</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <select name="sort"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
                            <option value="order"   @selected(($sort ?? 'order')==='order')>Sort: Order</option>
                            <option value="year"    @selected(($sort ?? 'order')==='year')>Sort: Year</option>
                            <option value="created" @selected(($sort ?? 'order')==='created')>Sort: Created</option>
                        </select>
                        <select name="dir"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
                            <option value="asc"  @selected(($dir ?? 'asc')==='asc')>Asc</option>
                            <option value="desc" @selected(($dir ?? 'asc')==='desc')>Desc</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <select name="per_page"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
                            @foreach ([6,12,24,48] as $n)
                                <option value="{{ $n }}" @selected(($perPage ?? 12)===$n)>{{ $n }}/page</option>
                            @endforeach
                        </select>
                        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">
                            Apply
                        </button>
                    </div>
                </div>
            </form>

            <!-- Table -->
            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-800/60">
                            <tr class="text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Year</th>
                                <th class="px-4 py-3">Order</th>
                                <th class="px-4 py-3">Active</th>
                                <th class="px-4 py-3">Created</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            @forelse ($awards as $a)
                                <tr class="text-sm text-gray-800 dark:text-gray-200 hover:bg-gray-50/70 dark:hover:bg-gray-800/50 transition">
                                    <td class="px-4 py-3">
                                        @php $src = $a->image_src; @endphp
                                        @if($src)
                                            <img src="{{ $src }}" alt="{{ $a->title }}" class="h-10 w-10 object-contain bg-white dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-700">
                                        @else
                                            <span class="text-xs text-gray-500 dark:text-gray-400">No image</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="font-medium line-clamp-2">{{ $a->title }}</div>
                                        @if($a->image_url)
                                            <a href="{{ $a->image_url }}" target="_blank" rel="noopener" class="text-xs text-sky-600 hover:underline">image_url</a>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $a->year ?? '—' }}</td>
                                    <td class="px-4 py-3">{{ $a->order }}</td>
                                    <td class="px-4 py-3">
                                        @if($a->is_active)
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Active</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">
                                        {{ $a->created_at?->format('Y-m-d') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <!-- Desktop actions -->
                                        <div class="hidden sm:flex items-center justify-end gap-2">
                                            <a href="{{ route('awards.edit', $a) }}"
                                               class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('awards.destroy', $a) }}"
                                                  onsubmit="return confirm('Delete this award?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1.5 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 dark:border-red-800 dark:text-red-300 dark:hover:bg-red-900/20">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Mobile actions (kebab) -->
                                        <div class="relative sm:hidden flex justify-end">
                                            <details class="group">
                                                <summary class="list-none inline-flex items-center justify-center h-8 w-8 rounded-md border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
                                                    ⋮
                                                </summary>
                                                <div class="absolute right-0 mt-2 w-36 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-lg p-1">
                                                    <a href="{{ route('awards.edit', $a) }}"
                                                       class="block px-3 py-2 rounded-md hover:bg-gray-50 dark:hover:bg-gray-800 text-sm">Edit</a>
                                                    <form method="POST" action="{{ route('awards.destroy', $a) }}"
                                                          onsubmit="return confirm('Delete this award?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 text-sm text-red-600 dark:text-red-300">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </details>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-10">
                                        <div class="text-center">
                                            <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-300 flex items-center justify-center">⭐</div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">No awards yet</h3>
                                            <p class="text-gray-600 dark:text-gray-300 mt-1">Click below to add your first award.</p>
                                            <a href="{{ route('awards.create') }}"
                                               class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                                                Add New Award
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
                {{ $awards->links() }}
            </div>

            {{-- Quick preview grid --}}
            @if($awards->count())
                <div class="mt-10" data-aos="fade-up">
                    <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Quick Preview</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @foreach ($awards as $a)
                            @php $src = $a->image_src; @endphp
                            <figure class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 flex flex-col items-center gap-2">
                                @if($src)
                                    <img src="{{ $src }}" alt="{{ $a->title }}" class="h-16 object-contain" />
                                @else
                                    <div class="h-16 w-full flex items-center justify-center text-xs text-gray-400">No image</div>
                                @endif
                                <figcaption class="text-xs text-center">
                                    <div class="font-medium line-clamp-2 text-gray-800 dark:text-gray-200">{{ $a->title }}</div>
                                    <div class="text-gray-500 dark:text-gray-400">{{ $a->year ?? '—' }}</div>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
</x-app-layout>
