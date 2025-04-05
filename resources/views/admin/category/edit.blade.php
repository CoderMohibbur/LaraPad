<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Category</h2>
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')
            @include('admin.category._form', ['category' => $category])
            <button class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
</x-app-layout>
