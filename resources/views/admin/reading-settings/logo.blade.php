<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">Update Logo</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.reading-settings.update-logo') }}" enctype="multipart/form-data">
            @csrf

            <!-- বর্তমান লোগো -->
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 mb-2">Current Logo</label>
                <img src="{{ \App\Http\Controllers\Admin\ReadingSettingController::getLogo() }}"
                     alt="Current Logo" class="h-20 mb-2 border p-2 rounded-lg">
            </div>

            <!-- নতুন লোগো আপলোড -->
            <input type="file" name="logo" accept="image/*"
                   class="mb-4 block w-full border rounded-lg p-2 dark:bg-gray-900 dark:text-gray-200">

            @error('logo') 
                <span class="text-red-500 text-sm">{{ $message }}</span> 
            @enderror

            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update Logo
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
