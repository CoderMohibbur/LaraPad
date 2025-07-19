<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Testimonial Sliders</h1>
            <a href="{{ route('admin.sliders.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
                + Add Slider
            </a>
        </div>

        @if(session('success'))
            <x-success-message :message="session('success')" />
        @endif

        <div class="overflow-x-auto rounded border border-gray-200 dark:border-gray-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Image</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Title</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Author</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Rating</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                    @forelse ($sliders as $index => $slider)
                        <tr>
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset($slider->image) }}" alt="Slider Image" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="px-4 py-3">{{ $slider->title }}</td>
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $slider->author_name }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $slider->author_designation }}</div>
                            </td>
                            <td class="px-4 py-3">
                                {{ str_repeat('⭐', $slider->rating) }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex gap-2">
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded shadow text-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-gray-500 dark:text-gray-400">
                                No sliders found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
