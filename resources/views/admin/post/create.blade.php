<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">📝 Add New Post</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create and publish a new blog post.</p>
            </div>
            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                ← Back to All Posts
            </a>
        </div>

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Validation --}}
        @if ($errors->any())
            <div class="mb-6 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Left Column: Main Content --}}
                <div class="md:col-span-2 space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                        @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Slug <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" value="{{ old('slug') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                        @error('slug')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Excerpt</label>
                        <textarea name="excerpt" rows="3" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('excerpt') }}</textarea>
                        @error('excerpt')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Content</label>
                        <textarea id="content-editor" name="content" rows="12"
                                  class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('content') }}</textarea>
                        @error('content')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Right Column: Settings + SEO --}}
                <div class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Post Type</label>
                        <select name="post_type" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                            <option value="post" selected>Post</option>
                            <option value="page">Page</option>
                            <option value="custom">Custom</option>
                        </select>
                        @error('post_type')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <select name="status" class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                            <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                            <option value="published" @selected(old('status') == 'published')>Published</option>
                        </select>
                        @error('status')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Categories</label>
                        <select name="categories[]" multiple class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(old('categories') && in_array($category->id, old('categories'))) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Tags</label>
                        <select name="tags[]" multiple class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" @if(old('tags') && in_array($tag->id, old('tags'))) selected @endif>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="featured_image" class="block mb-2 text-sm font-medium">Featured Image</label>
                        <input type="file" name="featured_image" id="featured_image"
                               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer">
                        @error('featured_image')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                        @error('meta_title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Meta Description</label>
                        <textarea name="meta_description" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('meta_description') }}</textarea>
                        @error('meta_description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    Publish Post
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
                toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
                content_css: document.documentElement.classList.contains('dark') ? 'dark' : 'default'
            });
        </script>
    @endpush
</x-app-layout>
