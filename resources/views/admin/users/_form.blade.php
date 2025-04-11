<div class="grid grid-cols-1 gap-6">
    <div>
        <label class="font-medium">Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
    </div>

    <div>
        <label class="font-medium">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
               class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
    </div>

    <div>
        <label class="font-medium">Password</label>
        <input type="password" name="password"
               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
    </div>

    <div>
        <label class="font-medium">Confirm Password</label>
        <input type="password" name="password_confirmation"
               class="input input-bordered w-full dark:bg-gray-900 dark:text-white">
    </div>

    <div>
        <label class="font-medium">Role</label>
        <select name="role" class="input input-bordered w-full dark:bg-gray-900 dark:text-white" required>
            <option value="">-- Select Role --</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}" @if(isset($user) && $user->hasRole($role->name)) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
