<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Tag</h2>
        <form method="POST" action="{{ route('tags.update', $tag) }}">
            @csrf
            @method('PUT')
            @include('admin.tag._form', ['tag' => $tag])
            <button class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</x-app-layout>
