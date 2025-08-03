<x-app-layout>
    <div class="p-6 bg-white dark:bg-gray-900 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">📄 All Pages</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage and edit your site pages.</p>
            </div>
            <a href="{{ route('pages.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700 transition-all dark:bg-blue-500 dark:hover:bg-blue-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add New Page
            </a>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div
                class="mb-6 p-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-300 shadow">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Pages Table --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
            <table class="w-full table-auto text-left">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left font-medium text-gray-700 dark:text-gray-200">Title</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-700 dark:text-gray-200">Slug</th>
                        <th class="px-6 py-3 text-left font-medium text-gray-700 dark:text-gray-200">Status</th>
                        <th class="px-6 py-3 text-right font-medium text-gray-700 dark:text-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                    {{-- Static Pages --}}
                    @php
                        $staticPages = [
                            ['title' => 'Home', 'slug' => 'home', 'editable' => true],
                            ['title' => 'Contact', 'slug' => 'contact', 'editable' => true],
                            ['title' => 'Awards', 'slug' => 'awards', 'editable' => true],
                            ['title' => 'Blog', 'slug' => 'blog', 'editable' => false],
                            ['title' => 'Blog Backlink', 'slug' => 'blogbacklink', 'editable' => true],
                            ['title' => 'Careers', 'slug' => 'careers', 'editable' => true],
                            ['title' => 'Member Info', 'slug' => 'member-info', 'editable' => true],
                            ['title' => 'Reviews', 'slug' => 'reviews', 'editable' => true],
                            ['title' => 'Team', 'slug' => 'team', 'editable' => true],
                        ];
                    @endphp

                   {{-- Static Pages --}}
@foreach ($staticPages as $page)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
            {{ $page['title'] }}
        </td>
        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
            {{ $page['slug'] }}
        </td>
        <td class="px-6 py-4">
            <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-200">
                Static
            </span>
        </td>
        <td class="px-6 py-4 text-right">
            @if ($page['editable'])
                <a href="{{ route('admin.pages.edit', ['slug' => $page['slug']]) }}"
                   class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400"
                   data-editable="true">
                    ✏️ Edit
                </a>
            @else
                <span class="text-sm text-gray-400 dark:text-gray-500 italic" data-editable="false">
                    🔒 Not Editable
                </span>
            @endif
        </td>
    </tr>
@endforeach

{{-- Dynamic Pages from DB --}}
@forelse($pages as $page)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
            {{ is_array($page) ? $page['title'] : $page->title }}
        </td>
        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
            {{ is_array($page) ? $page['slug'] : $page->slug }}
        </td>
<td class="px-6 py-4">
    @php
        $status = is_array($page) ? ($page['status'] ?? 'draft') : ($page->status ?? 'draft');
    @endphp

    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium
        {{ $status === 'published'
            ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-200'
            : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-200' }}">
        {{ ucfirst($status) }}
    </span>
</td>

        <td class="px-6 py-4 text-right space-x-2">
            <a href="{{ route('admin.pages.edit', is_array($page) ? $page['slug'] : $page->slug) }}"
               class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                ✏️ Edit
            </a>
            <form action="{{ route('pages.destroy', is_array($page) ? $page['slug'] : $page) }}" method="POST" class="inline-block">
                @csrf @method('DELETE')
                <button onclick="return confirm('Are you sure?')"
                        class="text-sm text-red-600 hover:underline dark:text-red-400">
                    🗑️ Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">
            No pages found.
        </td>
    </tr>
@endforelse

                </tbody>
            </table>
        </div>

        {{-- Pagination
        <div class="mt-6">
            {{ $pages->links() }}
        </div> --}}
    </div>
</x-app-layout>
