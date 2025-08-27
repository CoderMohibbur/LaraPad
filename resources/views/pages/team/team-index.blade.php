<x-app-layout>
  <section class="py-10">
    <div class="max-w-screen-xl mx-auto px-4">

      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
          <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">Team</h1>
          <p class="text-gray-600 dark:text-gray-300">Manage your team members.</p>
        </div>
        <a href="{{ route('team.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white font-medium hover:bg-sky-700 focus:ring-2 focus:ring-sky-500">
          + Add New Member
        </a>
      </div>

      @if(session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800
                    dark:border-green-900 dark:bg-green-900/30 dark:text-green-200">
          {{ session('success') }}
        </div>
      @endif

      <form method="GET" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
          <div class="md:col-span-2">
            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Search by name or role"
                   class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
          </div>
          <div>
            <select name="status" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              <option value="all" @selected(($status ?? 'all')==='all')>All</option>
              <option value="active" @selected(($status ?? 'all')==='active')>Active</option>
              <option value="inactive" @selected(($status ?? 'all')==='inactive')>Inactive</option>
            </select>
          </div>
          <div class="flex gap-2">
            <select name="per_page" class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-sky-500 focus:border-sky-500">
              @foreach([6,12,24,48] as $n)
                <option value="{{ $n }}" @selected(($perPage ?? 12)===$n)>{{ $n }}/page</option>
              @endforeach
            </select>
            <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-800">Apply</button>
          </div>
        </div>
      </form>

      @if($members->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($members as $m)
            <article class="rounded-2xl overflow-hidden border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-900">
              <div class="aspect-[4/5] bg-gray-100 dark:bg-gray-800">
                @php $src = $m->image_src; @endphp
                @if($src)
                  <img src="{{ $src }}" alt="{{ $m->name }}" class="w-full h-full object-cover">
                @endif
              </div>
              <div class="p-4">
                <h3 class="text-base font-semibold text-gray-900 dark:text-white text-center">{{ $m->name }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300 text-center">{{ $m->role }}</p>

                @if(is_array($m->tags) && count($m->tags))
                  <div class="mt-3 flex flex-wrap items-center justify-center gap-2">
                    @foreach($m->tags as $tag)
                      <span class="px-2.5 py-1 rounded-full text-xs border border-gray-200 bg-white text-gray-700
                                   dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200">
                        {{ $tag }}
                      </span>
                    @endforeach
                  </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                  <div>
                    @if($m->is_active)
                      <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Active</span>
                    @else
                      <span class="inline-flex items-center px-2 py-0.5 text-xs rounded-full bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-200">Inactive</span>
                    @endif
                  </div>
                  <div class="flex items-center gap-2">
                    <a href="{{ route('team.edit', $m) }}"
                       class="px-3 py-1.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50
                              dark:border-gray-700 dark:text-gray-100 dark:hover:bg-gray-800">Edit</a>
                    <form method="POST" action="{{ route('team.destroy', $m) }}" onsubmit="return confirm('Delete this member?');">
                      @csrf @method('DELETE')
                      <button class="px-3 py-1.5 rounded-lg border border-red-300 text-red-600 hover:bg-red-50
                                     dark:border-red-800 dark:text-red-300 dark:hover:bg-red-900/20">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </article>
          @endforeach
        </div>

        <div class="mt-6">{{ $members->links() }}</div>
      @else
        <div class="rounded-xl border border-dashed border-gray-300 dark:border-gray-700 p-10 text-center">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">No team members yet</h3>
          <p class="text-gray-600 dark:text-gray-300 mt-1">Click below to add your first team member.</p>
          <a href="{{ route('team.create') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-sky-700">Add New Member</a>
        </div>
      @endif

    </div>
  </section>
</x-app-layout>
