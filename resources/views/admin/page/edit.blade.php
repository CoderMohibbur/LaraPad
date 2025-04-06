<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-8 bg-white dark:bg-gray-900 shadow-xl rounded-2xl">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">✏️ Edit Page</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Update your custom page content.</p>
            </div>
            <a href="{{ route('pages.index') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">
                ← All Pages
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pages.update', $page) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @include('admin.page._form', ['page' => $page])
            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-green-600 hover:bg-green-700 rounded-lg shadow-md transition">
                    ✅ Update Page
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
