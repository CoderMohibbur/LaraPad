<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">👥 All Users</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage registered users and their roles.</p>
            </div>
            <a href="{{ route('users.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md dark:bg-blue-500 dark:hover:bg-blue-600">
                ➕ Add User
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 text-sm rounded dark:bg-green-900 dark:text-green-300">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y dark:divide-gray-700">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <td class="px-6 py-4 text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 text-xs rounded bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 space-x-3 flex justify-end items-center">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="text-blue-600 hover:underline dark:text-blue-400 dark:hover:text-blue-300 transition">Edit</a>
                                <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this user?')"
                                        class="text-red-600 hover:underline dark:text-red-400 dark:hover:text-red-300 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
