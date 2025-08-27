<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-900 dark:text-white">Create Gallery Item</h1>

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md">
                <strong>🚫 Error:</strong> {{ session('error') }}
            </div>
        @endif


        <form method="POST" action="{{ route('gallery-items.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Upload Image --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Upload Image
                    (optional)</label>
                <input type="file" name="image"
                    class="block w-full rounded-lg py-1.5 border-2 border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Accepted: jpg/jpeg/png/webp; max 4MB</p>
                @error('image')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image Path
      <div>
       <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
  Image Path (optional, if no file uploaded)
</label>
        <input type="text" name="image_path" value="{{ old('image_path') }}"
               placeholder="/storage/uploads/gallery/xxx.jpg"
               class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
        @error('image_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div> --}}

            {{-- Caption + Alt --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Caption</label>
                    <input type="text" name="caption" value="{{ old('caption') }}"
                        class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alt</label>
                    <input type="text" name="alt" value="{{ old('alt') }}"
                        class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                </div>
            </div>

            {{-- Tag + Year + Position --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tag</label>
                    <input type="text" name="tag" value="{{ old('tag') }}" placeholder="Awards / Team"
                        class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
                    <input type="number" name="year" value="{{ old('year') }}"
                        class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Position</label>
                    <input type="number" name="position" value="{{ old('position', 0) }}"
                        class="block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-sky-500 focus:ring-sky-500" />
                </div>
            </div>

            {{-- Active Checkbox --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" id="is_active" checked
                    class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-900" />
                <label for="is_active" class="text-sm text-gray-700 dark:text-gray-300">Active</label>
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
