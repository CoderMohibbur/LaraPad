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



    <!-- Add TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/uqurlqg2nd5f6hzvyzse6jjdhs564baqictaegbhm0wf6b49/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    {{-- Style for mobile nav --}}
    <style>
        /* Ensure the sidebar transition */
        #sidebar {
            transition: transform 0.3s ease-in-out;
            z-index: 40;
            /* Ensure the sidebar is on top of other content */
        }

        /* Hide sidebar by default */
        #sidebar.hidden {
            transform: translateX(-100%);
        }

        /* Hide sidebar on small devices */
        @media (max-width: 640px) {
            #sidebar {
                position: fixed;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                /* ✅ Smooth Animation */
            }

            #sidebar.open {
                transform: translateX(0);
            }

            #content {
                margin-left: 0 !important;
            }
        }

        /* ✅ Smooth Overlay Animation */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 30;
            /* Ensure the overlay is below the sidebar but above other content */
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out;
        }

        .overlay.show {
            opacity: 1;
            visibility: visible;
        }
    </style>


    {{-- Dropdown rotate 180deg --}}
    <style>
        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
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
<script>
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
