<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-8 bg-white dark:bg-gray-900 shadow-xl rounded-2xl">

        {{-- Page Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">📝 Add New Post</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create and publish a new blog post.</p>
            </div>
            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                ← Back to All Posts
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
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-8">
            @csrf

            {{-- রিইউজেবল ফর্ম --}}
            @include('admin.post._form', ['post' => null])

            <div class="flex justify-end mt-8">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                    Publish Post
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
