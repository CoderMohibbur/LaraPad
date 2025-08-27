@props(['award' => null, 'action' => '#', 'method' => 'POST'])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if (in_array(strtoupper($method), ['PUT','PATCH','DELETE']))
        @method($method)
    @endif

    {{-- Title --}}
    <div>
        <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">
            Title <span class="text-red-500">*</span>
        </label>
        <input type="text" name="title" required
               value="{{ old('title', $award->title ?? '') }}"
               placeholder="e.g. Clutch Global — B2B Lead Gen (Fall 2024)"
               class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                      focus:ring-sky-500 focus:border-sky-500
                      dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
        @error('title') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Year + Order --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Year</label>
            <input type="number" name="year" min="1900" max="2100"
                   value="{{ old('year', $award->year ?? '') }}"
                   placeholder="2024"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('year') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Order</label>
            <input type="number" name="order" min="0"
                   value="{{ old('order', $award->order ?? 0) }}"
                   placeholder="0"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('order') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Image URL OR Upload --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Image URL</label>
            <input type="url" name="image_url"
                   value="{{ old('image_url', $award->image_url ?? '') }}"
                   placeholder="https://..."
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('image_url') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Upload Image</label>
            <input type="file" name="image" accept="image/*"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900
                          file:mr-3 file:rounded-md file:border-0 file:bg-sky-600 file:px-3 file:py-1.5 py-1.5 file:text-white
                          hover:file:bg-sky-700 focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100" />
            @error('image') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                You can provide either Image URL or upload a file.
            </p>
        </div>
    </div>

    {{-- Is Active --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1"
               @checked(old('is_active', ($award->is_active ?? true)) )
               class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500
                      dark:border-gray-700 dark:bg-gray-800" />
        <label class="text-sm text-gray-800 dark:text-gray-100">Active</label>
    </div>

    {{-- Preview --}}
    @php $preview = old('image_url', $award->image_src ?? ''); @endphp
    @if ($preview)
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-2">Current Preview</label>
            <img src="{{ $preview }}" alt="Preview"
                 class="h-32 rounded border border-gray-200 bg-white object-contain p-2
                        dark:border-gray-700 dark:bg-gray-800">
        </div>
    @endif

    {{-- Actions --}}
    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 rounded-lg bg-sky-600 text-white font-medium
                       hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
            {{ $award ? 'Update' : 'Create' }}
        </button>

        <a href="{{ route('awards.index') }}"
           class="inline-flex items-center px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700
                  hover:bg-gray-50
                  dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800">
            Cancel
        </a>
    </div>
</form>
