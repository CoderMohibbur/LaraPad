@if (session('success'))
    <div class="mb-4 text-green-700 bg-green-100 border border-green-300 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif
