<div class="p-4">
    <h2 class="text-lg font-semibold mb-3">📁 Insert Image from Library</h2>

    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4">
        @foreach ($media as $item)
            <img src="{{ asset($item->meta_data[''] ?? $item->url) }}"
                onclick="insertImageToEditor('{{ asset($item->meta_data[''] ?? $item->url) }}')"
                class="w-full h-28 object-cover border rounded cursor-pointer hover:opacity-75"
                title="{{ $item->title }}" />
        @endforeach
    </div>
</div>


<script>
    function insertImageToEditor(url) {
        if (typeof tinymce !== 'undefined' && tinymce.activeEditor) {
            tinymce.activeEditor.execCommand('mceInsertContent', false, `<img src="${url}" alt="" />`);
            document.getElementById('orderModal').classList.add('hidden'); // মডাল বন্ধ
        }
    }
</script>
