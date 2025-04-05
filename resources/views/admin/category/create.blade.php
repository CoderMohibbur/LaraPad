<x-app-layout>
    <div class="max-w-2xl mx-auto px-6 py-8 bg-white dark:bg-gray-900 shadow rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">➕ Add New Category</h2>
            <a href="{{ route('categories.index') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">← All Categories</a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('categories.store') }}" class="space-y-6">
            @csrf

            {{-- Reusable Form --}}
            @include('admin.category._form', ['category' => null])

            <div class="flex justify-end">
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition">
                    💾 Save Category
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
