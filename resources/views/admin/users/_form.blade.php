<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
               class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
               class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
        <input type="password" name="password"
               class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
    </div>

    <div>
        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation"
               class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
    </div>

    <div class="md:col-span-2">
        <label class="block font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
        <select name="role"
                class="w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            <option value="">-- Select Role --</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" @if(isset($user) && $user->hasRole($role->name)) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
