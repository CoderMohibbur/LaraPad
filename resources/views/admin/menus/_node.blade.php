<li data-id="{{ $node->id }}" class="border rounded p-2">
  <div class="flex items-center gap-2">
    <span class="drag-handle cursor-grab select-none">☰</span>
    <span class="font-medium">{{ $node->title }}</span>
    <span class="text-xs px-2 py-0.5 rounded bg-gray-100 dark:bg-gray-800">{{ $node->menu_type }}</span>
    <span class="text-xs px-2 py-0.5 rounded bg-gray-100 dark:bg-gray-800">{{ $node->location }}</span>
    <span class="text-xs px-2 py-0.5 rounded {{ $node->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
      {{ $node->is_active ? 'Active' : 'Inactive' }}
    </span>
    <div class="ml-auto flex items-center gap-2">
      <form method="POST" action="{{ route('admin.menus.toggle', $node) }}">
        @csrf
        <button class="text-xs px-2 py-1 border rounded">{{ $node->is_active ? 'Disable' : 'Enable' }}</button>
      </form>
      <form method="POST" action="{{ route('admin.menus.destroy', $node) }}" onsubmit="return confirm('Delete?')">
        @csrf @method('DELETE')
        <button class="text-xs px-2 py-1 border rounded text-rose-600">Delete</button>
      </form>
    </div>
  </div>

  @if($node->children->count())
    <ul class="mt-2 space-y-2 pl-5 border-l">
      @foreach($node->children as $child)
        @include('admin.menus._node', ['node'=>$child])
      @endforeach
    </ul>
  @endif
</li>
