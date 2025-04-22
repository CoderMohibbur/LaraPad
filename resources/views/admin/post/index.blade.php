<x-app-layout>
    <div class="max-w-8xl mx-auto px-6 py-8">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">📚 All Posts</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your published and draft blog posts.</p>
            </div>
            <a href="{{ route('posts.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg shadow-md transition dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Add New
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300 rounded-lg shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-200">
                <thead class="bg-gray-100 dark:bg-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Author</th>
                        <th class="px-6 py-3">Image</th>
                        <th class="px-6 py-3">Categories</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-6 py-4 font-medium">{{ $post->title }}</td>

                            <td class="px-6 py-4">
                                <span class="inline-block px-2 py-1 text-xs rounded
                                    {{ $post->status === 'published'
                                        ? 'bg-green-200 text-green-800 dark:bg-green-700 dark:text-white'
                                        : 'bg-yellow-200 text-yellow-800 dark:bg-yellow-700 dark:text-white' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4">{{ optional($post->author)->name ?? '-' }}</td>

                            <td class="px-6 py-4">
                                @if(!empty($post->image_url))
                                    <img src="{{ $post->image_url }}" class="w-16 h-12 object-cover rounded">
                                @else
                                    <span class="text-sm text-gray-400">No Image</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 space-x-1">
                                @if($post->categories && count($post->categories))
                                    @foreach($post->categories as $cat)
                                        <span class="inline-block px-2 py-0.5 text-xs bg-blue-100 text-blue-800 dark:bg-blue-700 dark:text-white rounded">
                                            {{ $cat->name }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-sm text-gray-400">No Category</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('posts.edit', $post) }}"
                                   class="text-sm text-blue-600 hover:underline dark:text-blue-400">Edit</a>

                                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-sm text-red-600 hover:underline dark:text-red-400">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">
                                No posts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($posts, 'links'))
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
