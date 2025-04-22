<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Post</h2>

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Validation --}}
        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.post._form', ['post' => $post])

            {{-- Featured Image (manual section, override _form) --}}
            <div class="mt-6">
                <label class="block font-medium text-gray-700 dark:text-white">Featured Image</label>
                <div class="flex items-center gap-4">
                    <input type="text" id="featured_image" name="featured_image"
                           class="input input-bordered w-full dark:bg-gray-900 dark:text-white"
                           value="{{ old('featured_image', $post->featured_image ?? '') }}">
                    <button type="button" onclick="openMediaImageModal()"
                            class="px-3 py-2 bg-blue-600 text-white rounded">Choose</button>
                </div>
                @error('featured_image')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <div id="image-preview" class="mt-2">
                    @if(!empty($post->featured_image))
                        <img src="{{ $post->image_url }}" class="h-24 rounded border shadow">
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Post
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
