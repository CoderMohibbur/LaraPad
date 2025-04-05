<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-8 bg-white dark:bg-gray-900 shadow-xl rounded-2xl">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">🏷️ Add New Tag</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create a tag to organize your posts.</p>
            </div>
            <a href="{{ route('tags.index') }}"
               class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                ← All Tags
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 dark:bg-green-900 dark:text-green-300 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
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
        <form method="POST" action="{{ route('tags.store') }}" class="space-y-6">
            @csrf

            @include('admin.tag._form', ['tag' => null])

            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    💾 Save Tag
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
