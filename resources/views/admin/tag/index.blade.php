<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">All Tags</h2>
            <a href="{{ route('tags.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg shadow transition-all dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
             <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
             </svg>
             Add Tag
         </a>
                 </div>

        @if(session('success'))
            <div class="text-green-600 mb-2">{{ session('success') }}</div>
        @endif

        <table class="w-full text-left border">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr>
                    <th class="p-2">Name</th>
                    <th class="p-2">Slug</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr class="border-b">
                        <td class="p-2">{{ $tag->name }}</td>
                        <td class="p-2">{{ $tag->slug }}</td>
                        <td class="p-2 flex space-x-2">
                            <a href="{{ route('tags.edit', $tag) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('tags.destroy', $tag) }}">
                                @csrf @method('DELETE')
                                <button class="text-red-600" onclick="return confirm('Delete this tag?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $tags->links() }}</div>
    </div>
</x-app-layout>
