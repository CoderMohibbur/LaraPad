<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">➕ Add New User</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Create a new user and assign a role.</p>
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

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white dark:bg-gray-800 p-6 rounded-xl shadow">
                <div class="space-y-6">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Password</label>
                        <input type="password" name="password"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                    </div>
                </div>

               <div class="space-y-6">
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-200">Role</label>
                        <select name="role" class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
                            <option value="">-- Optional Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}"
                                    @if(old('role') == $role->name || (isset($user) && $user->hasRole($role->name))) selected @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    💾 Create User
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
