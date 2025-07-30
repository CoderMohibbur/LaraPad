<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>



    <!-- ✅ drag and drop CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>



    <!-- ✅ TinyMCE Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        /* ✅ Remove TinyMCE Border */
        .tox .tox-editor-container,
        .tox .tox-tinymce {
            border: #374151 !important;
            box-shadow: none !important;
            background: transparent !important;
        }

        /* ✅ Remove Extra Padding */
        .tox .tox-tinymce {
            padding: 0 !important;
        }

        /* ✅ Fix TinyMCE Toolbar & Statusbar Background in Dark Mode */
        .tox .tox-toolbar,
        .tox .tox-statusbar,
        .tox .tox-toolbar-overlord {

            border: none !important;
        }

        /* ✅ Fix TinyMCE Editor Background in Dark Mode */
        .tox .tox-edit-area__iframe {
            background-color: #374151 !important;
            /* Dark Mode Background */
            color: white !important;
            /* Dark Mode Text */
        }

        /* ✅ Remove "Upgrade" Button & Premium Alerts */
        .tox .tox-notification,
        .tox .tox-statusbar__branding,
        .tox .tox-promotion {
            display: none !important;
        }
    </style>

</head>
@stack('scripts')

<body class="font-sans antialiased">

    <div
        class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 rounded-lg shadow">
        @include('layouts.admin-nav')
        <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
            @include('layouts.admin-sidebar')
        </div>

        <!-- Page Heading -->
        <div id="content" class="mx-auto px-8 pt-6 transition-all duration-300 dark:border-gray-900">
            <div class="p-4 border-2  border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                @if (isset($header))
                    <header>
                        {{ $header }}
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


</body>

</html>


{{-- tyncme intrigade all blade --}}
{{-- <script>
    tinymce.init({
        selector: 'textarea[name=content]',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help',

        // 👉 এই দুইটি লাইন dark mode সাপোর্টের জন্য
        skin: 'oxide-dark',
        content_css: 'dark',

        content_style: 'body { font-family:Inter,sans-serif; font-size:14px }'
    });
</script> --}}

<!-- ✅ Modal Load & TinyMCE Initialize করার জন্য JavaScript -->
<script>
    function openModal(url) {
        document.getElementById('orderModal').classList.remove('hidden');
        document.getElementById('orderModal').classList.add('flex');

        // ✅ Modal Content লোড করা (Create / Edit Page)
        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('modalContent').innerHTML = data;

                // ✅ TinyMCE Reinitialize (পুরানো instance remove করে নতুন করে initialize করো)
                setTimeout(() => {
                    if (document.getElementById("description")) {
                        tinymce.remove();
                        initTinyMCE(); // ✅ Dark Mode সহ Initialize করো
                    }
                }, 100);
            })
            .catch(error => console.error("Error loading page:", error));
    }

    function closeModal() {
        document.getElementById('orderModal').classList.add('hidden');

        // ✅ Modal বন্ধ হলে TinyMCE Destroy করো
        if (tinymce.get("description")) {
            tinymce.remove("#description");
        }
    }

    // ✅ Modal Click করলে Close হবে
    document.addEventListener("click", function(event) {
        let modal = document.getElementById("orderModal");
        if (event.target === modal) {
            closeModal();
        }
    });

    // ✅ Escape Press করলে Modal বন্ধ হবে
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    // ✅ TinyMCE Dark Mode Support সহ Initialization
    function initTinyMCE() {
        let isDarkMode = document.documentElement.classList.contains('dark'); // Dark Mode চেক করা

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
                // ✅ Remove "Upgrade" Button & Premium Alerts
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

    // ✅ প্রথমবার চালানো
    initTinyMCE();

    // ✅ Dark Mode Change হলে TinyMCE Reinitialize করো
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            setTimeout(() => {
                tinymce.remove();
                initTinyMCE();
            }, 100);
        });
    }
</script>

{{-- Dark Mode light mode --}}
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>

{{-- drag and drop --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.getElementById('fileInput');
        const uploadForm = document.getElementById('uploadForm');

        // ✅ Click to open file selector
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // ✅ Auto submit when file is selected
        fileInput.addEventListener('change', () => {
            uploadForm.submit();
        });

        // ✅ Drag & Drop behavior
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-blue-400', 'bg-blue-50');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('border-blue-400', 'bg-blue-50');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-blue-400', 'bg-blue-50');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files; // Set dropped file
                uploadForm.submit(); // Submit form
            }
        });
    });
</script>



{{-- upload progress bar in media Library --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropZone = document.getElementById("dropZone");
        const uploadFileInput = document.getElementById("uploadFile");
        const progressWrapper = document.getElementById("progressWrapper");
        const progressBar = document.getElementById("uploadProgress");
        const progressText = document.getElementById("progressText");

        // ✅ Drop Zone Click => Open File Picker
        dropZone.addEventListener("click", () => uploadFileInput.click());

        // ✅ File Picker
        uploadFileInput.addEventListener("change", () => {
            if (uploadFileInput.files.length > 0) {
                uploadFile(uploadFileInput.files[0]);
            }
        });

        // ✅ Drag & Drop Events
        dropZone.addEventListener("dragover", e => {
            e.preventDefault();
            dropZone.classList.add("border-blue-600", "bg-blue-50");
        });

        dropZone.addEventListener("dragleave", () => {
            dropZone.classList.remove("border-blue-600", "bg-blue-50");
        });

        dropZone.addEventListener("drop", e => {
            e.preventDefault();
            dropZone.classList.remove("border-blue-600", "bg-blue-50");
            const file = e.dataTransfer.files[0];
            if (file) uploadFile(file);
        });

        // ✅ Upload Function with Progress
        function uploadFile(file) {
            const formData = new FormData();
            formData.append("file", file);

            // Show Progress Bar
            progressWrapper.classList.remove("hidden");

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('admin.media.upload') }}", true);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

            xhr.upload.addEventListener("progress", e => {
                if (e.lengthComputable) {
                    const percent = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = percent + "%";
                    progressText.innerText = percent + "%";
                }
            });

            xhr.onload = function() {
                if (xhr.status === 200) {
                    progressText.innerText = "Uploaded ✅";

                    setTimeout(() => {
                        progressWrapper.classList.add("hidden");
                        progressBar.style.width = "0%";
                        progressText.innerText = "0%";

                        // ✅ Optional: Reload or dynamically add new image to grid
                        location.reload();
                    }, 1000);
                } else {
                    alert("Upload failed!");
                    progressWrapper.classList.add("hidden");
                }
            };

            xhr.send(formData);
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById("sidebar");
        const menuText = document.querySelectorAll(".menu-text");
        const toggleButton = document.getElementById("toggle-button");
        const content = document.getElementById("content");

        // ✅ লোকালস্টোরেজ থেকে স্টেট লোড
        let isSidebarOpen = localStorage.getItem("isSidebarOpen") === "true";
        updateSidebar();

        // ✅ টগল বাটনে ক্লিক ইভেন্ট
        toggleButton.addEventListener("click", function(event) {
            event.stopPropagation();
            isSidebarOpen = !isSidebarOpen;
            localStorage.setItem("isSidebarOpen", isSidebarOpen);
            updateSidebar();

            if (window.innerWidth <= 640) {
                sidebar.classList.toggle("open");
            }
        });

        // ✅ ছোট ডিভাইসে বাইরে ক্লিক করলে সাইডবার বন্ধ
        document.addEventListener("click", function(event) {
            if (
                window.innerWidth <= 640 &&
                isSidebarOpen &&
                !sidebar.contains(event.target) &&
                event.target !== toggleButton
            ) {
                sidebar.style.transition = "transform 0.3s ease-in-out";
                sidebar.classList.remove("open");
                isSidebarOpen = false;
                localStorage.setItem("isSidebarOpen", isSidebarOpen);
                updateSidebar();
            }
        });

        // ✅ হোভার করলে সাইডবার এক্সপ্যান্ড (শুধু যদি ম্যানুয়ালি ওপেন না করা হয়)
        sidebar.addEventListener("mouseenter", function() {
            if (!isSidebarOpen && localStorage.getItem("isSidebarOpen") !== "true") {
                sidebar.classList.add("w-64");
                sidebar.classList.remove("w-20");
                content.classList.add("sm:ml-64");
                content.classList.remove("sm:ml-20");
                menuText.forEach(text => text.classList.remove("hidden"));
            }
        });

        // ✅ হোভার ছাড়লে সাইডবার কোল্যাপস (শুধু যদি ম্যানুয়ালি ওপেন না করা হয়)
        sidebar.addEventListener("mouseleave", function() {
            if (!isSidebarOpen && localStorage.getItem("isSidebarOpen") !== "true") {
                sidebar.classList.add("w-20");
                sidebar.classList.remove("w-64");
                content.classList.add("sm:ml-20");
                content.classList.remove("sm:ml-64");
                menuText.forEach(text => text.classList.add("hidden"));
            }
        });

        // ✅ আপডেট ফাংশন
        function updateSidebar() {
            if (isSidebarOpen) {
                sidebar.classList.add("w-64");
                sidebar.classList.remove("w-20");
                if (window.innerWidth > 640) {
                    content.classList.add("sm:ml-64");
                    content.classList.remove("sm:ml-20");
                }
                menuText.forEach(text => text.classList.remove("hidden"));
            } else {
                sidebar.classList.add("w-20");
                sidebar.classList.remove("w-64");
                if (window.innerWidth > 640) {
                    content.classList.add("sm:ml-20");
                    content.classList.remove("sm:ml-64");
                }
                menuText.forEach(text => text.classList.add("hidden"));
            }
        }
    });
</script>


{{-- Drop Down menu --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleButtons = document.querySelectorAll("[data-collapse-toggle]");

        toggleButtons.forEach(function(btn) {
            const targetId = btn.getAttribute("data-collapse-toggle");
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                btn.addEventListener("click", function() {
                    // Toggle hidden class
                    targetElement.classList.toggle("hidden");

                    // Optionally: toggle rotate class on arrow icon (if any)
                    const arrowIcon = btn.querySelector("svg:last-child");
                    if (arrowIcon) {
                        arrowIcon.classList.toggle("rotate-180");
                    }
                });
            }
        });
    });
</script>
