@props(['review' => null, 'action' => '#', 'method' => 'POST'])

<form method="POST" action="{{ $action }}" class="space-y-6">
    @csrf
    @if (in_array(strtoupper($method), ['PUT','PATCH','DELETE']))
        @method($method)
    @endif

    {{-- Rating + Order --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">
                Rating (0–5) <span class="text-red-500">*</span>
            </label>
            <input type="number" step="0.1" min="0" max="5" name="rating" required
                   value="{{ old('rating', $review->rating ?? 5.0) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('rating') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Order</label>
            <input type="number" min="0" name="order"
                   value="{{ old('order', $review->order ?? 0) }}"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('order') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Quote --}}
    <div>
        <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">
            Quote <span class="text-red-500">*</span>
        </label>
        <textarea name="quote" rows="4" required
                  class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                         focus:ring-sky-500 focus:border-sky-500
                         dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400"
                  placeholder="“Clear communication, fast iteration...”">{{ old('quote', $review->quote ?? '') }}</textarea>
        @error('quote') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Reviewer + Verified label --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">
                Reviewer <span class="text-red-500">*</span>
            </label>
            <input type="text" name="reviewer" required
                   value="{{ old('reviewer', $review->reviewer ?? '') }}"
                   placeholder="Marketing Coordinator, Healthcare Provider"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('reviewer') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Verified Badge</label>
            <input type="text" name="verified_label"
                   value="{{ old('verified_label', $review->verified_label ?? 'Verified Review') }}"
                   class="mt-2 block w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                          focus:ring-sky-500 focus:border-sky-500
                          dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
            @error('verified_label') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Empty রাখলে ব্যাজ লাইনটা হাইড হবে।</p>
        </div>
    </div>

    {{-- Active --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1"
               @checked(old('is_active', ($review->is_active ?? true)) )
               class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500
                      dark:border-gray-700 dark:bg-gray-800" />
        <label class="text-sm text-gray-800 dark:text-gray-100">Active</label>
    </div>

    {{-- Actions --}}
    <div class="flex items-center gap-3 pt-2">
        <button type="submit"
                class="inline-flex items-center px-5 py-2.5 rounded-lg bg-sky-600 text-white font-medium
                       hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
            {{ $review ? 'Update' : 'Create' }}
        </button>
        <a href="{{ route('reviews.index') }}"
           class="inline-flex items-center px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50
                  dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800">
            Cancel
        </a>
    </div>
</form>
