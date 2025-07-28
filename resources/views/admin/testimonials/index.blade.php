<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">🗣️ Testimonial List</h2>
            <a href="{{ route('testimonials.create') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                ➕ Add Testimonial
            </a>
        </div>

        <x-success-message />

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Image</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Designation</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Company</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Rating</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded object-cover">
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-200">{{ $testimonial->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $testimonial->designation }}</td>
                            <td class="px-4 py-2 text-sm text-gray-600 dark:text-gray-300">{{ $testimonial->company }}</td>
                            <td class="px-4 py-2 text-sm text-yellow-500">{{ str_repeat('⭐', $testimonial->rating) }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('testimonials.edit', $testimonial) }}"
                                    class="px-3 py-1 bg-green-600 text-white text-xs font-semibold rounded hover:bg-green-700 shadow">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded hover:bg-red-700 shadow">
                                        🗑️ Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($testimonials->isEmpty())
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                No testimonials found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
