<x-app-layout>
    <section class="py-10">
        <div class="max-w-screen-xl mx-auto px-4">

            {{-- Top Bar --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Reviews</h1>
                    <p class="text-gray-600 dark:text-gray-300">Manage customer reviews.</p>
                </div>
                <a href="{{ route('reviews.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                    + Add New Review
                </a>
            </div>

            {{-- Flash --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800
                            dark:border-green-900 dark:bg-green-900/30 dark:text-green-200">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filters --}}
            <form method="GET" class="mb-5">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                    <div class="md:col-span-2">
                        <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Search quote / reviewer / badge"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500" />
                    </div>
                    <div>
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
                            <option value="rating"  @selected(($sort ?? 'order')==='rating')>Sort: Rating</option>
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
                        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Apply</button>
                    </div>
                </div>
            </form>

            {{-- Table --}}
            <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                        <thead class="bg-gray-50 dark:bg-gray-800/60">
                            <tr class="text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                                <th class="px-4 py-3">Rating</th>
                                <th class="px-4 py-3">Quote</th>
                                <th class="px-4 py-3">Reviewer</th>
                                <th class="px-4 py-3">Verified</th>
                                <th class="px-4 py-3">Order</th>
                                <th class="px-4 py-3">Active</th>
                                <th class="px-4 py-3">Created</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            @forelse ($reviews as $r)
                                <tr class="text-sm text-gray-800 dark:text-gray-200 hover:bg-gray-50/70 dark:hover:bg-gray-800/50 transition">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold">{{ number_format($r->rating, 1) }}</span>
                                            <div class="flex">
                                                @for($i=1; $i<=5; $i++)
                                                    @php $filled = $i <= floor($r->rating); @endphp
                                                    <svg class="h-4 w-4 {{ $filled ? 'text-amber-400' : 'text-gray-400 dark:text-gray-600' }}" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.801 2.035a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.801-2.035a1 1 0 00-1.176 0l-2.801 2.035c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.463a1 1 0 00.95-.69l1.07-3.292z"/>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="line-clamp-2">{{ $r->quote }}</div>
                                    </td>
                                    <td class="px-4 py-3">{{ $r->reviewer }}</td>
                                    <td class="px-4 py-3">
                                        @if($r->verified_label)
                                            <span class="text-violet-600 dark:text-violet-400">✓ {{ $r->verified_label }}</span>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $r->order }}</td>
                                    <td class="px-4 py-3">
                                        @if($r->is_active)
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Active</span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-400">{{ $r->created_at?->format('Y-m-d') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="hidden sm:flex items-center justify-end gap-2">
                                            <a href="{{ route('reviews.edit', $r) }}"
                                               class="px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Edit</a>
                                            <form method="POST" action="{{ route('reviews.destroy', $r) }}" onsubmit="return confirm('Delete this review?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 rounded-lg border border-red-300 text-red-600 hover:bg-red-50 dark:border-red-800 dark:text-red-300 dark:hover:bg-red-900/20">Delete</button>
                                            </form>
                                        </div>
                                        <div class="relative sm:hidden flex justify-end">
                                            <details class="group">
                                                <summary class="list-none inline-flex items-center justify-center h-8 w-8 rounded-md border border-gray-300 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">⋮</summary>
                                                <div class="absolute right-0 mt-2 w-36 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 shadow-lg p-1">
                                                    <a href="{{ route('reviews.edit', $r) }}" class="block px-3 py-2 rounded-md hover:bg-gray-50 dark:hover:bg-gray-800 text-sm">Edit</a>
                                                    <form method="POST" action="{{ route('reviews.destroy', $r) }}" onsubmit="return confirm('Delete this review?');">
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
                                            <div class="mx-auto mb-3 h-12 w-12 rounded-full bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-300 flex items-center justify-center">⭐</div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">No reviews yet</h3>
                                            <p class="text-gray-600 dark:text-gray-300 mt-1">Click below to add your first review.</p>
                                            <a href="{{ route('reviews.create') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                                                Add New Review
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
                {{ $reviews->links() }}
            </div>

            {{-- Quick Preview cards (optional eye-candy) --}}
            @if($reviews->count())
                <div class="mt-10">
                    <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Quick Preview</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($reviews as $r)
                            <article class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-900">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">{{ number_format($r->rating,1) }}</span>
                                    <div class="flex">
                                        @for($i=1;$i<=5;$i++)
                                            @php $filled = $i <= floor($r->rating); @endphp
                                            <svg class="h-4 w-4 {{ $filled ? 'text-amber-400' : 'text-gray-400 dark:text-gray-600' }}" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.801 2.035a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.801-2.035a1 1 0 00-1.176 0l-2.801 2.035c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.463a1 1 0 00.95-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                </div>
                                <blockquote class="text-gray-900 dark:text-gray-100 italic line-clamp-3">“{{ $r->quote }}”</blockquote>
                                <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">{{ $r->reviewer }}</p>
                                @if($r->verified_label)
                                  <p class="mt-2 text-sm font-medium text-violet-600 dark:text-violet-400">✓ {{ $r->verified_label }}</p>
                                @endif
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
</x-app-layout>
