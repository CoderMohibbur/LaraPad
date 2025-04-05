<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">All Categories</h2>
            <a href="{{ route('categories.create') }}"
            class="px-4 py-2 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700 transition-all dark:bg-indigo-500 dark:hover:bg-indigo-600">
             ➕ Add Category
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
                @foreach($categories as $cat)
                    <tr class="border-b">
                        <td class="p-2">{{ $cat->name }}</td>
                        <td class="p-2">{{ $cat->slug }}</td>
                        <td class="p-2 flex space-x-2">
                            <a href="{{ route('categories.edit', $cat) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('categories.destroy', $cat) }}">
                                @csrf @method('DELETE')
                                <button class="text-red-600" onclick="return confirm('Delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $categories->links() }}</div>
    </div>
</x-app-layout>
