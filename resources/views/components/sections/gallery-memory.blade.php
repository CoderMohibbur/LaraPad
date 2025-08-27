{{-- resources/views/components/sections/gallery-advanced.blade.php --}}
@props([
    // যদি items না পাঠাও, কম্পোনেন্ট নিজে DB থেকে নিয়ে নেবে (active()->ordered())
    // items: array of ['src','alt','caption','tag','year']
    'items' => [],
    'title' => 'Our Gallery',
    'subtitle' => 'Moments we are proud of — awards, milestones & everyday wins.',
    'cols' => 4, // 3–6
    'autofetch' => true, // :autofetch="false" দিলে DB থেকে আনবে না
    'limit' => null, // নির্দিষ্ট লিমিট দরকার হলে সংখ্যা
    'useStorage' => true, // image_path যদি "uploads/..." বা "gallery/..." হয়, তাহলে Storage::url() ব্যবহার করবে
])

@php
    use App\Models\GalleryItem;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage;

    $uid = uniqid('gal_');
    $cols = max(3, min((int) $cols, 6));

    // props থেকে কালেকশন বানাই
    $items = collect($items);

    // DB থেকে আনবো যদি props ফাঁকা হয়
    if ($items->isEmpty() && $autofetch) {
        $q = GalleryItem::query()
            ->when(method_exists(GalleryItem::class, 'scopeActive'), fn($x) => $x->active())
            ->when(method_exists(GalleryItem::class, 'scopeOrdered'), fn($x) => $x->ordered());

        // URL ?tag= / ?year= থাকলে সার্ভার সাইডে প্রাথমিক ফিল্টার
        if ($tag = request('tag')) {
            $q->where('tag', $tag);
        }
        if ($yr = request('year')) {
            $q->where('year', (int) $yr);
        }

        if (!empty($limit)) {
            $q->limit((int) $limit);
        }

        $fetched = $q->get(['image_path', 'alt', 'caption', 'tag', 'year'])->map(function ($m) use ($useStorage) {
            $src = $m->image_path;

            // storage URL সমাধান: e.g. "uploads/gallery/..", "public/..", "/storage/.."
            if ($useStorage) {
                if (Str::startsWith($src, ['http://', 'https://', '/'])) {
                    // already full/absolute path
                } else {
                    // e.g. 'uploads/gallery/x.jpg' or 'public/gallery/x.jpg'
                    $src = Storage::url($src);
                }
            }

            return [
                'src' => $src,
                'alt' => $m->alt,
                'caption' => $m->caption,
                'tag' => $m->tag,
                'year' => $m->year,
            ];
        });

        $items = $fetched->values();
    }

    // fallback data (DB/props খালি হলে)
    if ($items->isEmpty()) {
        $fallback = [
            // নোট: এখানে কখনোই 'public/' দিও না, কাঁচা ফাইলপাথ দাও
            [
                'src' => 'uploads/2025/04/rohan.png',
                'alt' => 'Award Ceremony 2021',
                'caption' => 'Award Ceremony • 2021',
                'tag' => 'Awards',
                'year' => 2021,
            ],
            [
                'src' => 'uploads/2025/04/mahamudull.png',
                'alt' => 'Team at work',
                'caption' => 'Team @ R&D Lab',
                'tag' => 'Team',
                'year' => 2022,
            ],
            [
                'src' => 'uploads/2025/04/khalid.png',
                'alt' => 'Client onboarding',
                'caption' => 'Client Onboarding Day',
                'tag' => 'Clients',
                'year' => 2023,
            ],
        ];

        $items = collect($fallback)->map(function ($it) {
            $src = $it['src'] ?? '';

            // 1) backslash -> slash
            $src = str_replace('\\', '/', $src);

            // 2) 'public/' দিলে কেটে দাও (browser-এ public/ লাগে না)
            if (Str::startsWith($src, 'public/')) {
                $src = Str::after($src, 'public/'); // e.g. 'uploads/...'
            }

            // 3) যদি storage path না হয় এবং http(s)/leading-slash না থাকে → asset()
            if (Str::startsWith($src, ['http://', 'https://', '/'])) {
                // keep as-is
            } else {
                // ধরে নিলাম public/uploads বা public/storage সাপেক্ষে আছে
                $src = asset($src); // -> http://127.0.0.1:8000/uploads/...
            }

            // 4) সেট করে দাও
            $it['src'] = $src;
            return $it;
        });
    }

@endphp

<div id="{{ $uid }}" class="relative overflow-hidden py-12 bg-white dark:bg-[#0b1220]" x-data="gallery_{{ $uid }}()"
    x-init="init()">

    {{-- Ambient glows --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0">
        <div class="absolute -top-28 -left-20 h-72 w-72 rounded-full blur-3xl bg-cyan-300/20 dark:bg-cyan-400/10"></div>
        <div
            class="absolute -bottom-28 -right-28 h-80 w-80 rounded-full blur-3xl bg-fuchsia-300/20 dark:bg-fuchsia-400/10">
        </div>
    </div>

    <div class="relative max-w-screen-xl mx-auto px-6 lg:px-8">
        {{-- Heading --}}
        <header class="text-center max-w-3xl mx-auto mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100">
                {{ $title }}</h2>
            @if ($subtitle)
                <p class="mt-3 text-slate-600 dark:text-slate-300">{{ $subtitle }}</p>
            @endif
        </header>

        {{-- Filters --}}
        <div class="flex flex-wrap items-center justify-center gap-3 mb-8">
            <button @click="setFilter('all')" :class="btnClass(filter === 'all')"
                class="btn-chip dark:text-gray-300">All</button>
            <template x-for="t in tags" :key="t">
                <button @click="setFilter(t)" :class="btnClass(filter === t)" class="btn-chip dark:text-gray-300"
                    x-text="t"></button>
            </template>

            <div class="mx-3 w-px h-6 bg-slate-200 dark:bg-slate-700/70"></div>

            <template x-for="y in years" :key="y">
                <button @click="setYear(y)" :class="btnClass(year === y)" class="btn-chip dark:text-gray-300"
                    x-text="y"></button>
            </template>
            <button @click="setYear('all')" :class="btnClass(year === 'all')" class="btn-chip dark:text-gray-300">Any
                Year</button>
        </div>

        {{-- Grid --}}
        <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-{{ $cols }} gap-4 md:gap-5">
            @foreach ($items as $i => $it)
                @php $delay = ($i % 12) * 30; @endphp
                <li class="group relative overflow-hidden rounded-2xl
                 border border-slate-200/70 dark:border-slate-700/60
                 bg-white/90 dark:bg-slate-900/70 backdrop-blur
                 ring-1 ring-black/5 dark:ring-white/5
                 shadow-sm hover:shadow-2xl hover:shadow-sky-500/10
                 transition-all duration-500 hover:-translate-y-1"
                    style="transition-delay: {{ $delay }}ms" x-show="visible({{ $i }})" x-transition>
                    {{-- shine --}}
                    <div
                        class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full
                      transition-transform duration-700 ease-out
                      bg-gradient-to-tr from-transparent via-white/50 to-transparent opacity-40 dark:via-white/20">
                    </div>

                    <button
                        class="block focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/80 dark:focus-visible:ring-sky-500/70"
                        @click="open({{ $i }})" aria-label="{{ $it['alt'] ?? 'Open image' }}">
                        <div class="aspect-[4/3] overflow-hidden bg-slate-100 dark:bg-slate-800">
                            <img src="{{ $it['src'] }}" alt="{{ $it['alt'] ?? '' }}" loading="lazy" decoding="async"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105" />
                        </div>
                    </button>

                    <figcaption
                        class="px-3 py-2 text-sm text-slate-700 dark:text-slate-200 flex items-center justify-between">
                        <span class="truncate">{{ $it['caption'] ?? '' }}</span>
                        <span
                            class="ml-3 inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full
                         bg-slate-100 text-slate-700
                         dark:bg-slate-800 dark:text-slate-200">
                            {{ $it['tag'] ?? 'Memory' }}
                        </span>
                    </figcaption>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Lightbox Modal --}}
    <div x-show="modal" x-transition.opacity
        class="fixed inset-0 z-[60] bg-black/80 backdrop-blur-sm flex items-center justify-center p-4"
        @keydown.escape.window="close()" @click.self="close()">
        <div class="relative max-w-5xl w-full mt-10">
            <button class="absolute -top-10 right-0 text-white/90 hover:text-white text-2xl" @click="close()"
                aria-label="Close">✕</button>

            <div class="relative overflow-hidden rounded-2xl bg-black/40 ring-1 ring-white/10">
                <img :src="current().src" :alt="current().alt"
                    class="w-full h-auto max-h-[80vh] object-contain select-none" draggable="false"
                    @load="loaded=true" />

                <div class="absolute inset-0 flex items-center justify-between px-2">
                    <button @click.stop="prev()"
                        class="p-3 rounded-full bg-white/10 hover:bg-white/20 text-white
                         focus:outline-none focus-visible:ring-2 focus-visible:ring-white/60"
                        aria-label="Previous">‹</button>
                    <button @click.stop="next()"
                        class="p-3 rounded-full bg-white/10 hover:bg-white/20 text-white
                         focus:outline-none focus-visible:ring-2 focus-visible:ring-white/60"
                        aria-label="Next">›</button>
                </div>

                <div
                    class="absolute bottom-0 inset-x-0 p-3 text-center text-white/90 text-sm bg-gradient-to-t from-black/50 to-transparent">
                    <span x-text="current().caption"></span>
                    <span class="mx-2" x-show="current().tag">•</span>
                    <span x-text="current().tag"></span>
                    <span class="mx-2" x-show="current().year">•</span>
                    <span x-text="current().year"></span>
                </div>
            </div>

            {{-- Thumbs --}}
            <div class="mt-3 grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 gap-2 max-h-24 overflow-y-auto">
                <template x-for="(t, idx) in items" :key="idx">
                    <button
                        class="relative rounded-lg overflow-hidden ring-1 ring-white/10 focus:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/80 dark:focus-visible:ring-sky-500/70"
                        :class="idx === index ? 'ring-2 ring-sky-400 dark:ring-sky-500' : ''" @click="go(idx)">
                        <img :src="t.src" :alt="t.alt" class="h-16 w-full object-cover"
                            loading="lazy" decoding="async">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <style>
        .btn-chip {
            @apply inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-sm border border-slate-200 dark:border-slate-700/70 bg-white/80 text-slate-700 shadow-sm hover:shadow-md hover:bg-white dark:bg-slate-900/70 dark:text-slate-200 dark:hover:bg-slate-900/80 transition;
        }
    </style>

    <script>
        function gallery_{{ $uid }}() {
            return {
                items: @js($items->values()->all()),
                filter: 'all',
                year: 'all',
                tags: [],
                years: [],
                modal: false,
                index: 0,
                loaded: false,
                init() {
                    // ইউনিক ট্যাগ ও ইয়ার
                    const tset = new Set(this.items.map(i => i.tag || 'Memory'));
                    this.tags = [...tset];

                    const yset = new Set(this.items.map(i => i.year || '').filter(Boolean));
                    this.years = [...yset].sort((a, b) => b - a);

                    // URL query থাকলে প্রি-সিলেক্ট
                    const qp = new URLSearchParams(window.location.search);
                    const qTag = qp.get('tag');
                    const qYear = qp.get('year');
                    if (qTag) this.filter = qTag;
                    if (qYear) this.year = isNaN(+qYear) ? 'all' : +qYear;

                    // কিবোর্ড ন্যাভ (মোডালে)
                    window.addEventListener('keydown', (e) => {
                        if (!this.modal) return;
                        if (e.key === 'ArrowRight') this.next();
                        if (e.key === 'ArrowLeft') this.prev();
                    });
                },
                btnClass(active) {
                    return active ?
                        'ring-1 ring-sky-400/80 bg-sky-50 text-sky-700 dark:bg-sky-900/30 dark:text-sky-300 dark:ring-sky-500/60' :
                        '';
                },
                setFilter(t) {
                    this.filter = t;
                },
                setYear(y) {
                    this.year = y;
                },
                visible(i) {
                    const it = this.items[i];
                    const tagOk = (this.filter === 'all') || (it.tag === this.filter);
                    const yearOk = (this.year === 'all') || (it.year === this.year);
                    return tagOk && yearOk;
                },
                open(i) {
                    this.index = i;
                    this.modal = true;
                    this.loaded = false;
                    document.body.classList.add('overflow-hidden');
                },
                close() {
                    this.modal = false;
                    document.body.classList.remove('overflow-hidden');
                },
                current() {
                    return this.items[this.index] || {};
                },
                next() {
                    this.index = (this.index + 1) % this.items.length;
                },
                prev() {
                    this.index = (this.index - 1 + this.items.length) % this.items.length;
                },
                go(i) {
                    this.index = i;
                }
            }
        }
    </script>
</div>
