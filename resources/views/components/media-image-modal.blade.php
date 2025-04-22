<!-- 📁 Modal: Select Image From Library -->
<div id="mediaImageModal" class="fixed inset-0 z-50 hidden bg-black/60 items-center justify-center">
    <!-- এইটা মিডিয়া চুস করার Modal -->
<div id="mediaImageModal" class="fixed inset-0 z-50 hidden bg-black/60 items-center justify-center">
    <div class="bg-white dark:bg-gray-800 w-full max-w-4xl rounded-lg shadow-lg p-6 relative">
        <button onclick="closeMediaImageModal()"
                class="absolute top-2 right-2 text-xl text-gray-700 dark:text-white hover:text-red-600">&times;</button>

        <h2 class="text-lg font-bold mb-4 text-gray-800 dark:text-gray-100">📁 Select Image from Library</h2>

        <div class="grid grid-cols-3 gap-4 overflow-y-auto max-h-[70vh]">
            @foreach ($media as $item)
                <img src="{{ asset($item->meta_data['medium'] ?? $item->url) }}"
                     onclick="selectMediaImage('{{ asset($item->meta_data['medium'] ?? $item->url) }}')"
                     class="w-full h-28 object-cover border rounded cursor-pointer hover:opacity-75"
                     title="{{ $item->title }}">
            @endforeach
        </div>
    </div>
</div>



</div>

<script>
    function openMediaImageModal() {
        document.getElementById('mediaImageModal').classList.remove('hidden');
    }

    function closeMediaImageModal() {
        document.getElementById('mediaImageModal').classList.add('hidden');
    }

    function selectMediaImage(url) {
        document.getElementById('featured_image').value = url;
        document.getElementById('image-preview').innerHTML = `<img src="${url}" class="h-24 border shadow rounded">`;
        closeMediaImageModal();
    }
</script>
{{-- ✅ Scripts --}}
<script>
    function openMediaImageModal() {
        document.getElementById('mediaImageModal').classList.remove('hidden');
    }

    function closeMediaImageModal() {
        document.getElementById('mediaImageModal').classList.add('hidden');
    }

    function selectMediaImage(url) {
        document.getElementById('featured_image').value = url;
        document.getElementById('image-preview').innerHTML = `<img src="${url}" class="h-32 rounded shadow border">`;
        closeMediaImageModal();
    }

    function searchMediaImages(keyword) {
        const grid = document.getElementById('mediaImageGrid');
        const items = grid.querySelectorAll('img');
        keyword = keyword.toLowerCase();

        items.forEach(img => {
            const title = img.getAttribute('title').toLowerCase();
            img.style.display = title.includes(keyword) ? '' : 'none';
        });
    }
</script>

<script>
    function syncImages() {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch("{{ route('admin.media.sync') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`${data.synced} image(s) synced successfully!`);

                // ✅ Reload modal content
                fetch("{{ route('admin.media.insert-modal') }}")
                    .then(res => res.text())
                    .then(html => {
                        document.getElementById('mediaImageModal').innerHTML = html;
                    });
            }
        })
        .catch(err => {
            console.error(err);
            alert("Sync failed. See console.");
        });
    }
</script>
