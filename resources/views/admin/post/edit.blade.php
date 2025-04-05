<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.post._form', ['post' => $post])

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </div>
</x-app-layout>
