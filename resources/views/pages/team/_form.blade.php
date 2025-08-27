@props(['member' => null, 'action' => '#', 'method' => 'POST'])

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
  @csrf
  @if(in_array(strtoupper($method), ['PUT','PATCH','DELETE'])) @method($method) @endif

  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Name <span class="text-red-500">*</span></label>
      <input type="text" name="name" required
             value="{{ old('name', $member->name ?? '') }}"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
      @error('name') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Role/Title</label>
      <input type="text" name="role"
             value="{{ old('role', $member->role ?? '') }}"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
      @error('role') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Image URL</label>
      <input type="url" name="image_url"
             value="{{ old('image_url', $member->image_url ?? '') }}"
             placeholder="https://..."
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
      @error('image_url') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Upload Image</label>
      <input type="file" name="image" accept="image/*"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900
                    file:mr-3 file:rounded-md file:border-0 file:bg-sky-600 file:px-3 file:py-1.5 file:text-white
                    hover:file:bg-sky-700 focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100" />
      @error('image') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
      <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">You can provide either Image URL or upload a file.</p>
    </div>
  </div>

  <div>
    <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">
      Skills/Tags (comma separated)
    </label>
    <input type="text" name="tags_input"
           value="{{ old('tags_input', isset($member) && is_array($member->tags) ? implode(', ', $member->tags) : '') }}"
           placeholder="Lead Gen Strategy, Cold Email Deliverability, CRM & Revenue Analytics"
           class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                  focus:border-sky-500 focus:ring-sky-500
                  dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
    @error('tags_input') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Order</label>
      <input type="number" name="order" min="0"
             value="{{ old('order', $member->order ?? 0) }}"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
      @error('order') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">LinkedIn</label>
      <input type="url" name="linkedin_url"
             value="{{ old('linkedin_url', $member->linkedin_url ?? '') }}"
             placeholder="https://linkedin.com/in/username"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100">Twitter/X</label>
      <input type="url" name="twitter_url"
             value="{{ old('twitter_url', $member->twitter_url ?? '') }}"
             placeholder="https://twitter.com/username"
             class="mt-2 w-full rounded-lg border border-gray-300 bg-white text-gray-900 placeholder-gray-400
                    focus:border-sky-500 focus:ring-sky-500
                    dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-400" />
    </div>
  </div>

  <div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1"
           @checked(old('is_active', ($member->is_active ?? true)))
           class="h-4 w-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500 dark:border-gray-700 dark:bg-gray-800">
    <label class="text-sm text-gray-800 dark:text-gray-100">Active</label>
  </div>

  @php $preview = old('image_url', $member->image_src ?? ''); @endphp
  @if($preview)
    <div>
      <label class="block text-sm font-medium text-gray-800 dark:text-gray-100 mb-2">Preview</label>
      <img src="{{ $preview }}" class="h-40 rounded border border-gray-200 bg-white object-cover
                                     dark:border-gray-700 dark:bg-gray-800" alt="Preview">
    </div>
  @endif

  <div class="flex items-center gap-3 pt-2">
    <button class="px-5 py-2.5 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:ring-2 focus:ring-sky-500">
      {{ $member ? 'Update' : 'Create' }}
    </button>
    <a href="{{ route('team.index') }}"
       class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50
              dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800">Cancel</a>
  </div>
</form>
