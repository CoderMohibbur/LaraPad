<x-app-layout>
    <x-slot name="header">Visual Page Editor</x-slot>

    <div class="max-w-6xl mx-auto py-10">
        <div id="editor" contenteditable="true" class="border p-6 rounded shadow bg-white min-h-[300px] prose max-w-none">
            {!! $content !!}
        </div>

        <div class="mt-4 text-right">
            <x-button onclick="saveContent()">Save</x-button>
        </div>
    </div>

    <script>
        function saveContent() {
            const content = document.getElementById('editor').innerHTML;

            fetch("{{ route('page.editor.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ content })
            })
            .then(res => res.json())
            .then(res => alert('Saved successfully!'));
        }
    </script>
</x-app-layout>