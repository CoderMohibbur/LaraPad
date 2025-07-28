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
<script src="https://cdn.tiny.cloud/1/uqurlqg2nd5f6hzvyzse6jjdhs564baqictaegbhm0wf6b49/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>



</head>
@stack('scripts')

<body class="font-sans antialiased">
    @include('layouts.header')
    <div class="flex items-start pt-16">
        <div class="lg:!block hidden">
            @include('layouts.sidebar')

            {{-- <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif --}}
        </div>
        <main class="overflow-y-auto relative w-full h-full bg-gray-50 dark:bg-gray-900 lg:ml-64">
            <div class="px-4 pt-6">
                {{ $slot }}
            </div>

        </main>
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
