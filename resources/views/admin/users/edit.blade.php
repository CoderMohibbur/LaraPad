<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">✏️ Edit User</h2>
            <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline dark:text-blue-400">← Back to Users</a>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-6">
            @csrf @method('PUT')
            @include('admin.users._form', ['user' => $user ?? null])
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">💾 Update User</button>
            </div>
        </form>
    </div>
</x-app-layout>
