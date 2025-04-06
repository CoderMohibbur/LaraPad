<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">➕ Add New Page</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create a custom static page for your site.</p>
            </div>
            <a href="{{ route('pages.index') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">
                ← All Pages
            </a>
        </div>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 text-red-800 text-sm rounded dark:bg-red-900 dark:text-red-300 shadow">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pages.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Left: Main Content --}}
                <div class="md:col-span-2 space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Slug <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" value="{{ old('slug') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Content</label>
                        <textarea id="content-editor" name="content" rows="12"
                                  class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('content') }}</textarea>
                    </div>
                </div>

                {{-- Right: SEO + Settings --}}
                <div class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Post Type</label>
                        <input type="text" name="post_type" value="page" readonly
                               class="input input-bordered w-full bg-gray-100 dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <select name="status" class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                            <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                            <option value="published" @selected(old('status') == 'published')>Published</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Featured Image URL</label>
                        <input type="text" name="featured_image" value="{{ old('featured_image') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Meta Description</label>
                        <textarea name="meta_description" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('meta_description') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Canonical URL</label>
                        <input type="text" name="canonical_url" value="{{ old('canonical_url') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">OG Title</label>
                        <input type="text" name="og_title" value="{{ old('og_title') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">OG Description</label>
                        <textarea name="og_description" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">{{ old('og_description') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">OG Image URL</label>
                        <input type="text" name="og_image" value="{{ old('og_image') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition">
                    💾 Publish Page
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
