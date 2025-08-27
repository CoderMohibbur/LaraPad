{{-- resources/views/pages/gallery/edit.blade.php --}}
<x-app-layout>
  <section class="py-8">
    <div class="max-w-3xl mx-auto px-4">

      {{-- Title + Back --}}
      <div class="flex items-start justify-between gap-4 mb-6">
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Edit Gallery Item</h1>
          <p class="text-gray-600 dark:text-gray-300">Update image, caption, tags & visibility.</p>
        </div>
        <a href="{{ route('gallery-items.index') }}"
           class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-3 py-2 text-gray-700 hover:bg-gray-50
                  dark:border-gray-700 dark:text-gray-100 dark:hover:bg-gray-800">
          ← Back
        </a>
      </div>

      {{-- Flash / Errors --}}
      @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800
                    dark:border-red-800 dark:bg-red-900/20 dark:text-red-200">
          <strong class="font-semibold">Please fix the following:</strong>
          <ul class="mt-2 list-disc space-y-1 pl-5">
            @foreach ($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('gallery-items.update', $item) }}" enctype="multipart/form-data"
            class="space-y-6">
        @csrf @method('PUT')

        {{-- Current Preview --}}
        <div class="rounded-2xl overflow-hidden border border-gray-200 bg-white shadow-sm
                    dark:border-gray-700 dark:bg-gray-900">
          <div class="p-4 border-b border-gray-100 dark:border-gray-800">
            <h2 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Current Image</h2>
          </div>
          <div class="p-4">
            <div class="w-full max-h-80 rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-800">
              <img src="{{ $item->image_path }}" alt="{{ $item->alt }}"
                   class="w-full h-full object-cover">
            </div>
            @if($item->image_path)
              <p class="mt-2 text-xs text-gray-500 dark:text-gray-400 break-all">{{ $item->image_path }}</p>
            @endif
          </div>
        </div>

        {{-- Inputs Card --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm p-5
                    dark:border-gray-700 dark:bg-gray-900">

          {{-- Upload OR Path (both optional; one is enough) --}}
          <div class="grid grid-cols-1 gap-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Replace Image (optional)
              </label>
              <input type="file" name="image"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Accepted: jpg/jpeg/png/webp; max 4MB
              </p>
              @error('image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Image Path (optional, if you don't upload a file)
              </label>
              <input type="text" name="image_path" value="{{ old('image_path', $item->image_path) }}"
                     placeholder="/storage/uploads/gallery/your-image.jpg"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('image_path') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div> --}}
          </div>

          {{-- Caption / Alt --}}
          <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Caption</label>
              <input type="text" name="caption" value="{{ old('caption', $item->caption) }}"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('caption') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Alt</label>
              <input type="text" name="alt" value="{{ old('alt', $item->alt) }}"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('alt') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
          </div>

          {{-- Tag / Year / Position --}}
          <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tag</label>
              <input type="text" name="tag" value="{{ old('tag', $item->tag) }}"
                     placeholder="Awards / Team"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('tag') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Year</label>
              <input type="number" name="year" value="{{ old('year', $item->year) }}"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('year') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Position</label>
              <input type="number" name="position" value="{{ old('position', $item->position) }}"
                     class="block w-full rounded-lg border-gray-300 shadow-sm
                            focus:border-sky-500 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950 dark:text-gray-100" />
              @error('position') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>
          </div>

          {{-- Active --}}
          <div class="mt-6">
            <label class="inline-flex items-center gap-2 text-sm">
              <input type="checkbox" name="is_active" value="1"
                     class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500
                            dark:border-gray-700 dark:bg-gray-950"
                     {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
              <span class="text-gray-700 dark:text-gray-300">Active</span>
            </label>
            @error('is_active') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
          </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-between">
          <a href="{{ route('gallery-items.index') }}"
             class="inline-flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2 text-gray-700 hover:bg-gray-50
                    dark:border-gray-700 dark:text-gray-100 dark:hover:bg-gray-800">Cancel</a>

          <button type="submit"
                  class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-5 py-2.5 font-medium text-white
                         hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
            Update
          </button>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>
