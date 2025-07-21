<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <x-success-message />

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">📝 All Blog Posts</h2>
            <a href="{{ route('blog.posts.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                + New Post
            </a>
        </div>

        <div class="overflow-x-auto rounded shadow">
            <table class="w-full table-auto text-left border border-gray-200 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <tr class="text-sm text-center">
                        <th class="p-3">#</th>
                        <th class="p-3">Image</th>
                        <th class="p-3">Title</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Author</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 text-center">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3 text-center">
                                @if ($post->image_url && Str::startsWith($post->image_url, '/storage/') && file_exists(public_path($post->image_url)))
                                    <img src="{{ asset($post->image_url) }}" alt="{{ $post->title }}"
                                        class="w-16 h-12 object-cover rounded mx-auto">
                                @else
                                    <span class="text-gray-400 italic">No image</span>
                                @endif
                            </td>

                            <td class="p-3 font-semibold">
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">
                                    {{ Str::limit($post->title, 40) }}
                                </a>
                            </td>
                            <td class="p-3">
                                {{ $post->category?->name ?? '-' }}
                            </td>
                           
                            <td class="p-3">
                                {{ $post->author?->name ?? 'Admin' }}
                            </td>
                           
                            <td class="p-3">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('blog.posts.edit', $post) }}"
                                        class="text-yellow-500 hover:text-yellow-600 font-semibold text-sm">Edit</a>
                                    <form method="POST" action="{{ route('blog.posts.destroy', $post) }}"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-700 font-semibold text-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-500 dark:text-gray-400">No blog posts
                                found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
