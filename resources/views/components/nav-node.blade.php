@props(['node', 'isMobile' => false, 'level' => 0])

@php
    $hasChildren = $node->children && $node->children->count() > 0;
@endphp

<li @if ($isMobile) x-data="{open:false}" 
  @else
    x-data="{ openLeft:false }"
    @mouseenter="
      // inner submenu হলে ডানদিকে থাকলে বামে ফ্লিপ করব
      (() => {
        if ({{ $level }} > 0) {
          const btn = $el.querySelector('.node-trigger');
          if (!btn) { openLeft=false; return; }
          const rect = btn.getBoundingClientRect();
          const vw = window.innerWidth || document.documentElement.clientWidth;
          // ডানদিকে 320px জায়গা না থাকলে বামে খুলো
          openLeft = (vw - rect.right) < 280;
        } else {
          openLeft = false;
        }
      })()
    " @endif
    class="relative list-none mt-3">

    {{-- Trigger / Link --}}
    @if ($hasChildren)
        @if ($isMobile)
            <button type="button" class="w-full text-left flex items-center justify-between font-semibold py-2"
                @click="open = !open" :aria-expanded="open.toString()">
                <span>{{ $node->title }}</span>
                <svg class="w-5 h-5 transition-transform" :class="open ? 'rotate-180' : ''" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        @else
            <button type="button"
                class="node-trigger peer block w-full text-left flex items-center ml-2 px-3 py-2 gap-1 font-semibold hover:text-blue-600 dark:hover:text-blue-400">
                {{ $node->title }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        @endif
    @else
        {{-- Leaf link --}}
        @if ($isMobile)
            <a href="{{ $node->url ?? '#' }}" target="{{ $node->target ?? '_self' }}"
                class="block px-2 py-2 hover:text-blue-600 dark:hover:text-blue-400">
                {{ $node->title }}
            </a>
        @else
            <a href="{{ $node->url ?? '#' }}" target="{{ $node->target ?? '_self' }}"
                class="block whitespace-nowrap px-3 py-1 font-semibold hover:text-blue-600 dark:hover:text-blue-400">
                {{ $node->title }}
            </a>
        @endif
    @endif

    {{-- Children --}}
    @if ($hasChildren)
        @if ($isMobile)
            <ul x-show="open" x-transition.opacity
                class="pl-3 border-l border-gray-200 dark:border-gray-700 list-none">
                @foreach ($node->children as $child)
                    <x-nav-node :node="$child" :is-mobile="true" :level="$level + 1" />
                @endforeach
            </ul>
        @else
            @php
                // root submenu = নিচে; inner submenu = ডানে (অথবা ফ্লিপে বামে)
                $rootPos = 'top-full left-0';
            @endphp

            @if ($node->menu_type === 'mega' && $level === 0)
                {{-- Mega at root --}}
                <div
                    class="absolute {{ $rootPos }} min-w-[720px] max-w-[90vw] bg-white dark:bg-gray-800 shadow-xl rounded-lg border border-gray-200 dark:border-gray-700
                    opacity-0 invisible pointer-events-none transition duration-200 p-6
                    peer-hover:opacity-100 peer-hover:visible peer-hover:pointer-events-auto
                    hover:opacity-100 hover:visible hover:pointer-events-auto">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($node->children as $col)
                            <div>
                                <div class="font-bold mb-2 text-blue-600 dark:text-blue-400 px-1">{{ $col->title }}
                                </div>
                                <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300 list-none">
                                    @foreach ($col->children as $link)
                                        <li>
                                            <a href="{{ $link->url ?? '#' }}" target="{{ $link->target ?? '_self' }}"
                                                class="block px-2 py-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700 whitespace-nowrap">
                                                {{ $link->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                {{-- Normal dropdown --}}
                <ul class="absolute min-w-56 max-w-[90vw] bg-white dark:bg-gray-800 shadow-xl rounded-lg border border-gray-200 dark:border-gray-700
                 opacity-0 invisible pointer-events-none transition duration-200 list-none py-2
                 peer-hover:opacity-100 peer-hover:visible peer-hover:pointer-events-auto
                 hover:opacity-100 hover:visible hover:pointer-events-auto"
                    :class="{
                        // root: নিচে ড্রপ
                        '{{ $level === 0 ? 'top-full left-0' : '' }}': true,
                        // inner: ডিফল্ট ডানে, ফ্লিপ হলে বামে
                        'top-0 left-full ml-2': {{ $level }} > 0 && !openLeft,
                        'top-0 right-full mr-2': {{ $level }} > 0 && openLeft
                    }">
                    @foreach ($node->children as $child)
                        <x-nav-node :node="$child" :is-mobile="false" :level="$level + 1" />
                    @endforeach
                </ul>
            @endif
        @endif
    @endif
</li>
