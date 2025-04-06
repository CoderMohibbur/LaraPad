<x-app-layout>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4 dark:text-gray-200 text-gray-800">📁 Media Library</h2>

        {{-- Filter/Search --}}
        <form method="GET" class="mb-4 flex flex-wrap gap-2 items-center">
            <input type="text" name="search" placeholder="🔍 Search..." value="{{ request('search') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 px-3 py-2">

            <select name="type"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 px-2 py-2">
                <option value="">All Types</option>
                <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Images</option>
                <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Videos</option>
                <option value="application" {{ request('type') == 'application' ? 'selected' : '' }}>PDFs</option>
            </select>

            <select name="month"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 px-2 py-2">
                <option value="">All Months</option>
                @foreach ($months as $month)
                    <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                        {{ $month }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Filter</button>
        </form>


        {{-- drag and drop start here --}}
        <!-- Upload Form -->
        <div id="dropZone"
            class="mb-6 border-2 border-dashed border-blue-400 rounded-lg p-10 text-center bg-gray-50 dark:bg-gray-800 cursor-pointer">
            <p class="text-gray-600 dark:text-gray-300">📤 Drag & drop your image here or click to select</p>
            <input type="file" id="uploadFile" class="hidden" />
        </div>

        <!-- ✅ Progress Bar -->
        <div id="progressWrapper" class="mt-4 hidden">
            <div class="w-full bg-gray-200 rounded-full h-3 dark:bg-gray-700">
                <div id="uploadProgress"
                    class="bg-blue-600 h-3 rounded-full w-0 transition-all duration-300 ease-in-out"></div>
            </div>
            <div id="progressText" class="text-sm mt-1 text-center text-gray-600 dark:text-gray-300">0%</div>
        </div>





        {{-- Media Grid --}}
        {{-- ✅ Delete Selected Form (media grid only) --}}
        <form method="POST" action="{{ route('admin.media.bulk-delete') }}">
            @csrf
            @method('DELETE')

            {{-- Bulk delete button --}}
            <div class="mb-4">
                <button type="submit" onclick="return confirm('Are you sure to delete selected?')"
                    class="bg-blue-600 text-white px-3 py-1 rounded">
                    🗑️ Delete Selected
                </button>
            </div>

            {{-- card grid --}}
            <div class="media-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @forelse ($media as $item)
                    <div class="media-item border border-gray-200 rounded shadow-sm bg-gray-50 dark:bg-gray-800 dark:border-gray-700 overflow-hidden relative cursor-pointer group"
                        onclick="openMediaModal({{ $item->id }})" data-id="{{ $item->id }}" draggable="true">

                        {{-- Checkbox --}}
                        <input type="checkbox" name="ids[]" value="{{ $item->id }}"
                            onclick="event.stopPropagation();" class="absolute top-2 left-2 z-10">

                        {{-- Image / Preview --}}
                        @if (Str::startsWith($item->mime_type, 'image/'))
                            <img onclick="event.stopPropagation(); openGallery({{ $loop->index }})"
                                src="{{ asset($item->meta_data['medium'] ?? $item->url) }}"
                                class="w-full h-32 object-center rounded mx-auto group-hover:opacity-80" />
                        @else
                            <div
                                class="w-full h-32 flex items-center justify-center bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-300">
                                {{ strtoupper($item->mime_type) }}
                            </div>
                        @endif

                        {{-- Filename --}}
                        <div class="p-2 text-xs text-gray-600 dark:text-gray-300 truncate">
                            {{ $item->title }}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 col-span-full text-center">No media found.</p>
                @endforelse
            </div>
        </form>

        {{-- left image right side content --}}
        @foreach ($media as $item)
            <div id="media-modal-{{ $item->id }}"
                class="fixed inset-0 bg-black/60 z-50 hidden flex items-center justify-center p-4">
                <div
                    class="bg-white dark:bg-gray-800 dark:text-gray-200 w-full max-w-5xl rounded shadow-lg overflow-auto relative max-h-[90vh]">
                    {{-- Close Button --}}
                    <button onclick="closeMediaModal({{ $item->id }})"
                        class="absolute top-1 right-2 text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white text-xl">✖</button>

                    <div class="grid grid-cols-1 md:grid-cols-2">
                        {{-- Left: Image --}}
                        <div class="p-4 border-r dark:border-gray-700">
                            <img src="{{ asset($item->meta_data['medium'] ?? $item->url) }}"
                                class="w-full h-auto max-h-[70vh] object-contain rounded"
                                alt="{{ $item->alt_text }}" />

                            <div class="mt-4 text-sm text-gray-600 dark:text-gray-300 space-y-1">
                                <p><strong>🖼️ Title:</strong> {{ $item->title }}</p>
                                <p><strong>📏 Dimensions:</strong> {{ $item->meta_data['width'] ?? 'N/A' }} x
                                    {{ $item->meta_data['height'] ?? 'N/A' }}</p>
                                <p><strong>💾 Size:</strong> {{ number_format($item->size / 1024, 2) }} KB</p>
                                <p><strong>📁 Type:</strong> {{ $item->mime_type }}</p>
                                <p><strong>📅 Uploaded:</strong>
                                    {{ $item->created_at->timezone('Asia/Dhaka')->format('d M, Y h:i A') }}
                                </p>
                            </div>
                        </div>

                        {{-- Right: Form --}}
                        <div class="p-4">
                            <form method="POST" action="{{ route('admin.media.update', $item->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Title --}}
                                <div class="mb-3">
                                    <label class="block text-sm font-medium dark:text-gray-300">📝 Title</label>
                                    <input type="text" name="title" value="{{ $item->title }}"
                                        class="w-full border rounded px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                </div>

                                {{-- Alt Text --}}
                                <div class="mb-3">
                                    <label class="block text-sm font-medium dark:text-gray-300">🔖 Alt Text</label>
                                    <input type="text" name="alt_text" value="{{ $item->alt_text }}"
                                        class="w-full border rounded px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                </div>

                                {{-- Description --}}
                                <div class="mb-3">
                                    <label class="block text-sm font-medium dark:text-gray-300">🧾 Description</label>
                                    <textarea name="description" id="description" rows="2"
                                        class="w-full border rounded px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">{{ $item->description }}</textarea>

                                    <!-- Button to open modal -->
                                    <button type="button"
                                        onclick="openModal('{{ route('admin.media.insert-modal') }}')"
                                        class="text-blue-600 dark:text-blue-400 underline mt-2">
                                        📷 Insert Image from Library
                                    </button>
                                </div>

                                {{-- Tags --}}
                                <div class="mb-3">
                                    <label class="block text-sm font-medium dark:text-gray-300">🏷️ Tags (comma
                                        separated)</label>
                                    <input type="text" name="tags"
                                        value="{{ is_array($item->tags) ? implode(',', $item->tags) : '' }}"
                                        class="w-full border rounded px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                </div>

                                {{-- Replace --}}
                                <div class="mb-3">
                                    <label class="block text-sm font-medium dark:text-gray-300">🔄 Replace Image</label>
                                    <input type="file" name="new_image"
                                        class="w-full border px-2 py-1 rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                </div>

                                {{-- Transform --}}
                                <div class="mb-3 grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-1 dark:text-gray-300">🔁
                                            Rotate</label>
                                        <select name="transform[rotate]"
                                            class="w-full border px-2 py-1 rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            <option value="">None</option>
                                            <option value="90">90°</option>
                                            <option value="180">180°</option>
                                            <option value="270">270°</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1 dark:text-gray-300">📐 Resize
                                            (W×H)
                                        </label>
                                        <div class="flex gap-2">
                                            <input type="number" name="transform[resize_width]" placeholder="Width"
                                                class="w-1/2 border px-2 py-1 rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            <input type="number" name="transform[resize_height]"
                                                placeholder="Height"
                                                class="w-1/2 border px-2 py-1 rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                        </div>
                                    </div>

                                    <div class="col-span-2">
                                        <label class="block text-sm font-medium mb-1 dark:text-gray-300">📸 Crop Aspect
                                            Ratio</label>
                                        <select name="transform[crop]"
                                            class="w-full border px-2 py-1 rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                                            <option value="">None</option>
                                            <option value="1:1">Square (1:1)</option>
                                            <option value="4:3">4:3</option>
                                            <option value="16:9">16:9</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Save --}}
                                <div class="text-right mt-4">
                                    <button type="submit"
                                        class="bg-blue-600 dark:bg-blue-500 text-white px-4 py-2 rounded">
                                        💾 Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        {{-- ✅ Step 8: Gallery Modal --}}
        <div id="galleryModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 px-4 py-6">
            <div class="relative w-full max-w-4xl bg-white rounded shadow-lg">
                <button onclick="closeGallery()"
                    class="absolute top-2 right-2 text-white bg-black px-2 py-1 rounded hover:bg-red-600">✖</button>

                <div class="flex justify-between items-center p-4">
                    <button onclick="prevImage()" class="text-lg font-bold text-gray-700 hover:text-black">⏪
                        Prev</button>
                    <div class="w-full flex justify-center">
                        <img id="galleryImage" src="" class="max-h-[70vh] rounded" alt="">
                    </div>
                    <button onclick="nextImage()" class="text-lg font-bold text-gray-700 hover:text-black">Next
                        ⏩</button>
                </div>

                <div class="text-center py-2 text-sm text-gray-600" id="galleryCaption"></div>
            </div>
        </div>



        {{-- store Gallery Modal for editor --}}
        <!-- Modal Structure (admin layout blade file এ থাকবে) -->
        <div id="orderModal" class="fixed inset-0 z-50 bg-black/60 hidden items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl p-6" id="modalContent">
                <!-- ajax content loaded here -->
            </div>
        </div>
        {{-- Modal Structure End --}}


        {{-- Pagination --}}
        <div class="mt-6">
            {{ $media->links() }}
        </div>
    </div>


</x-app-layout>


<script>
    function openMediaModal(id) {
        document.querySelectorAll('[id^="media-modal-"]').forEach(m => m.classList.add('hidden'));
        document.getElementById('media-modal-' + id).classList.remove('hidden');
    }

    function closeMediaModal(id) {
        document.getElementById('media-modal-' + id).classList.add('hidden');
    }
</script>


{{-- drag and drop image --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const grid = document.querySelector(".media-grid");

        if (!grid) return;

        new Sortable(grid, {
            animation: 150,
            ghostClass: 'bg-yellow-100',
            onEnd: function() {
                const orderedIds = Array.from(grid.querySelectorAll("[data-id]"))
                    .map(el => el.dataset.id);

                fetch("/admin/media/sort", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']")
                                .getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            ids: orderedIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Sorted:", data);
                    })
                    .catch(error => console.error("Sort failed:", error));
            }
        });
    });
</script>


{{-- galary view --}}
<script>
    let currentImageIndex = 0;
    const images = Array.from(document.querySelectorAll('.media-grid img'));

    function openGallery(index) {
        currentImageIndex = index;
        const image = images[index];
        const src = image.getAttribute('src');
        const caption = image.closest('.media-item').querySelector('.truncate')?.innerText || '';

        document.getElementById('galleryImage').src = src;
        document.getElementById('galleryCaption').innerText = caption;
        document.getElementById('galleryModal').classList.remove('hidden');
        document.getElementById('galleryModal').classList.add('flex');
    }

    function closeGallery() {
        document.getElementById('galleryModal').classList.add('hidden');
        document.getElementById('galleryModal').classList.remove('flex');
    }

    function prevImage() {
        if (currentImageIndex > 0) {
            openGallery(currentImageIndex - 1);
        }
    }

    function nextImage() {
        if (currentImageIndex < images.length - 1) {
            openGallery(currentImageIndex + 1);
        }
    }

    // Escape চাপলে গ্যালারী বন্ধ হবে
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeGallery();
        }
    });
</script>

<!-- ✅ TinyMCE Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>



{{-- tinymce editor dark mood and light mood  --}}
{{-- <script>
    // ✅ চেক করো dark mode কি enable করা আছে
    function isDarkMode() {
        return document.documentElement.classList.contains('dark');
    }

    // ✅ TinyMCE ইনিশিয়ালাইজ ফাংশন
    function initTinyMCE() {
        tinymce.init({
            selector: '#description',
            plugins: 'lists link image table code wordcount',
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            height: 250,
            menubar: false,
            branding: false,
            skin: isDarkMode() ? 'oxide-dark' : 'oxide',
            content_css: isDarkMode() ? 'dark' : 'default',
            content_style: `
                body {
                    background-color: ${isDarkMode() ? '#1f2937' : 'white'};
                    color: ${isDarkMode() ? '#e5e7eb' : '#111827'};
                    font-size: 16px;
                    font-family: Arial, sans-serif;
                }
            `,
            setup: function(editor) {
                editor.on('init', function() {
                    setTimeout(() => {
                        document.querySelectorAll(
                            '.tox-notification, .tox-statusbar__branding, .tox-promotion'
                        ).forEach(el => el.style.display = 'none');
                    }, 500);
                });
            }
        });
    }

    // ✅ প্রথমবার পেজ লোডে TinyMCE চালাও
    initTinyMCE();

    // ✅ থিম টগল বাটন (Dark/Light Switch)
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // ✅ Load সময়ে চেক করে কোন আইকন দেখাবে
    if (localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        themeToggleDarkIcon.classList.remove('hidden');
    }

    // ✅ Toggle বাটনে ক্লিক করলে মোড বদলাবে
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // ✅ LocalStorage অনুযায়ী মোড পরিবর্তন
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }

            // ✅ মোড পরিবর্তনের পর TinyMCE Re-init
            setTimeout(() => {
                tinymce.remove(); // পুরানো TinyMCE বন্ধ করো
                initTinyMCE(); // আবার চালাও
            }, 200);
        });
    }
</script> --}}


<script>
    function isDarkMode() {
        return document.documentElement.classList.contains('dark');
    }

    document.getElementById('theme-toggle')?.addEventListener('click', () => {
        tinymce.remove();
        setTimeout(initTinyMCE, 300); // আবার রি-ইনিশিয়ালাইজ
    });

    document.getElementById('theme-toggle')?.addEventListener('click', () => {
        tinymce.remove();
        setTimeout(initTinyMCE, 300); // আবার রি-ইনিশিয়ালাইজ
    });

    function initTinyMCE() {
        tinymce.init({
            selector: '#description',
                plugins: 'lists link image table code wordcount',
                toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                height: 250,
                menubar: true,
                branding: false,
                skin: isDarkMode ? 'oxide-dark' : 'oxide', // ✅ Dark Mode হলে Dark Theme
                content_css: isDarkMode ? 'dark' : 'default', // ✅ Dark Mode হলে Custom CSS
                content_style: `
                body {
                    background-color: ${isDarkMode ? '#374151' : 'white'};
                    color: ${isDarkMode ? 'white' : 'black'};
                    font-size: 16px;
                    font-family: Arial, sans-serif;
                }
            `,
            setup: function(editor) {
                editor.on('init', function() {
                    setTimeout(() => {
                        document.querySelectorAll(
                            '.tox-statusbar__branding, .tox-promotion').forEach(el => el
                            .style.display = 'none');
                    }, 500);
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', initTinyMCE);
</script>
