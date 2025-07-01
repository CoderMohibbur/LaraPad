<x-app-layout>
    <x-slot name="header">Editing: {{ $slug }}.blade.php</x-slot>

    <div class="max-w-6xl mx-auto py-6">
        <div id="editor" contenteditable="true" class="bg-white p-6 border rounded shadow min-h-[300px] prose max-w-none">
            {!! $content !!}
        </div>

        <div class="mt-4 text-right">
            <x-button onclick="saveContent()">💾 Save</x-button>
        </div>
    </div>

    <script>
        function saveContent() {
            fetch("{{ route('admin.pages.update', $slug) }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    content: document.getElementById('editor').innerHTML
                })
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) alert('Saved!');
                else alert('Error: ' + res.error);
            });
        }
    </script>
</x-app-layout>
