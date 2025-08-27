<x-app-layout>
    <section class="py-10">
        <div class="max-w-3xl mx-auto px-4">
            <header class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Edit Review</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-1">Update review content.</p>
                </div>

                <form method="POST" action="{{ route('reviews.destroy', $review) }}"
                      onsubmit="return confirm('Delete this review?');">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 rounded-lg border border-red-300 text-red-600 hover:bg-red-50
                                   dark:border-red-800 dark:text-red-300 dark:hover:bg-red-900/30">
                        Delete
                    </button>
                </form>
            </header>

            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700
                            dark:border-red-800 dark:bg-red-900/40 dark:text-red-200">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error) <li class="text-sm">{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6
                        dark:border-gray-700 dark:bg-gray-900">
                @include('pages.reviews._form', [
                    'review' => $review,
                    'action' => route('reviews.update', $review),
                    'method' => 'PUT'
                ])
            </div>
        </div>
    </section>
</x-app-layout>
