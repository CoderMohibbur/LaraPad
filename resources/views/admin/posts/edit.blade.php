<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">✏️ Edit Post</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Update and manage your blog post.</p>
            </div>
            <a href="{{ route('blog.posts.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">←
                All Posts</a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('blog.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                        class="mt-1 rounded-lg w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                </div>

                {{-- Category --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                    <select name="category_id"
                        class="mt-1 rounded-lg w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Short Description --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Short Description</label>
                    <textarea name="short_description" rows="3"
                        class="mt-1 rounded-lg w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('short_description', $post->short_description) }}</textarea>
                </div>

                {{-- Content --}}
                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Content</label>
                    <textarea id="content-editor" name="description" rows="12"
                        class="mt-1 rounded-lg w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">{{ old('description', $post->description) }}</textarea>
                </div>

                {{-- Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Image</label>

                    @if ($post->image_url)
                        <div class="mb-3">
                            <img src="{{ asset($post->image_url) }}" alt="Current Image"
                                class="w-40 h-32 object-cover rounded-lg border dark:border-gray-700">
                        </div>
                    @endif

                    <input type="file" name="image" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-700 rounded-lg cursor-pointer bg-white dark:bg-gray-800" />
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Leave empty to keep the current image.</p>
                </div>

            </div>

            <div class="flex justify-end mt-8">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Post
                </button>
            </div>
        </form>
    </div>

    {{-- TinyMCE --}}
    @push('scripts')
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#content-editor',
                height: 400,
                plugins: 'link image code lists table',
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
                skin: document.documentElement.classList.contains('dark') ? 'oxide-dark' : 'oxide',
                content_css: document.documentElement.classList.contains('dark') ? 'dark' : 'default'
            });
        </script>
    @endpush
</x-app-layout>
