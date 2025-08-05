<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">✏️ Edit User</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Update user details and roles.</p>
            </div>
            <a href="{{ route('users.index') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">← Back to Users</a>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 text-sm text-red-800 bg-red-100 dark:bg-red-900 dark:text-red-300 rounded-lg shadow">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>❗ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf @method('PUT')

            @include('admin.users._form', ['user' => $user])

            <div class="flex justify-end items-center gap-4 mt-8">
                <a href="{{ route('users.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg shadow transition">
                    ❌ Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow transition">
                    💾 Update User
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
