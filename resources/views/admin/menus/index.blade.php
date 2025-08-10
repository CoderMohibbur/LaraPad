<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Menu Builder</h2>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Tree (drag & drop) --}}
        <div class="bg-white dark:bg-gray-900 p-4 rounded shadow menu-tree">
            <div class="flex items-center justify-between mb-3">
                <h3 class="font-semibold">Structure</h3>
                <button id="btn-save-order" class="px-3 py-1.5 rounded bg-blue-600 text-white">Save Order</button>
            </div>

            <ul id="menu-root" class="space-y-2">
                @foreach ($menus as $node)
                    @include('admin.menus._node', ['node' => $node])
                @endforeach
            </ul>
        </div>

        {{-- Create / Edit --}}
        <div class="bg-white dark:bg-gray-900 p-4 rounded shadow">
            <h3 class="font-semibold mb-3">Create / Edit</h3>

            <form method="POST" action="{{ route('admin.menus.store') }}">
                @csrf
                @include('admin.menus._form', ['parents' => $parents])
                <div class="mt-3">
                    <button class="px-4 py-2 bg-emerald-600 text-white rounded">Create</button>
                </div>
            </form>
        </div>
    </div>

    {{-- SortableJS --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    <script>
        // init for all UL (including nested)
        function initSortables(scope) {
            scope.querySelectorAll('ul').forEach(ul => {
                new Sortable(ul, {
                    group: 'menus',
                    animation: 150,
                    handle: '.drag-handle',
                    fallbackOnBody: true,
                    swapThreshold: 0.65,
                });
            });
        }
        initSortables(document);

        function buildTree(ul) {
            return [...ul.children].map((li, idx) => {
                const childUl = li.querySelector(':scope > ul');
                return {
                    id: Number(li.dataset.id),
                    sort_order: idx,
                    children: childUl ? buildTree(childUl) : []
                };
            });
        }

        document.getElementById('btn-save-order').addEventListener('click', async () => {
            const root = document.getElementById('menu-root');
            const payload = buildTree(root);
            const res = await fetch('{{ route('admin.menus.reorder') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            });
            if (res.ok) {
                alert('Order saved ✅');
                // পেজ reload না করেই চলবে; কেবল cache invalidate সার্ভার সাইডে হচ্ছে
            } else {
                alert('Save failed');
            }
        });
    </script>
</x-app-layout>
