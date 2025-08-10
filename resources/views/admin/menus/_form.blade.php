<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
  <div>
    <label class="block text-sm mb-1">Title</label>
    <input type="text" name="title" class="w-full border rounded px-3 py-2" required value="{{ old('title') }}">
    @error('title')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">URL</label>
    <input type="text" name="url" class="w-full border rounded px-3 py-2" value="{{ old('url') }}">
    @error('url')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Parent</label>
    <select name="parent_id" class="w-full border rounded px-3 py-2">
      <option value="">— Top level —</option>
      @foreach($parents as $p)
        <option value="{{ $p->id }}" @selected(old('parent_id') == $p->id)>{{ $p->title }}</option>
      @endforeach
    </select>
    @error('parent_id')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Menu Type</label>
    <select name="menu_type" class="w-full border rounded px-3 py-2" required>
      <option value="link" @selected(old('menu_type')==='link')>Link</option>
      <option value="dropdown" @selected(old('menu_type')==='dropdown')>Dropdown</option>
      <option value="mega" @selected(old('menu_type')==='mega')>Mega</option>
    </select>
    @error('menu_type')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Location</label>
    <select name="location" class="w-full border rounded px-3 py-2" required>
      <option value="header" @selected(old('location')==='header')>Header</option>
      <option value="footer" @selected(old('location')==='footer')>Footer</option>
      <option value="both" @selected(old('location')==='both')>Both</option>
    </select>
    @error('location')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Target</label>
    <select name="target" class="w-full border rounded px-3 py-2" required>
      <option value="_self" @selected(old('target')==='_self')>Same Tab</option>
      <option value="_blank" @selected(old('target')==='_blank')>New Tab</option>
    </select>
    @error('target')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Sort Order (optional)</label>
    <input type="number" name="sort_order" class="w-full border rounded px-3 py-2" value="{{ old('sort_order', 0) }}">
    @error('sort_order')<div class="text-sm text-rose-600">{{ $message }}</div>@enderror
  </div>

  <div class="flex items-center gap-2">
    <input id="is_active" type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
    <label for="is_active">Active</label>
  </div>
</div>
