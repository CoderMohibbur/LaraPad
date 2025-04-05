<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">All Posts</h2>
            <a href="{{ route('posts.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg shadow-md transition dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
             <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
             </svg>
             Add New
         </a>
                 </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="p-2">Title</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Author</th>
                        <th class="p-2">Categories</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr class="border-b">
                            <td class="p-2">{{ $post->title }}</td>
                            <td class="p-2">
                                <span class="px-2 py-1 text-xs rounded
                                    {{ $post->status == 'published' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="p-2">{{ $post->author->name ?? '-' }}</td>
                            <td class="p-2">
                                @foreach($post->categories as $cat)
                                    <span class="text-sm bg-blue-100 text-blue-800 px-2 py-0.5 rounded">{{ $cat->name }}</span>
                                @endforeach
                            </td>
                            <td class="p-2 flex space-x-2">
                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-4 text-center">No posts found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
