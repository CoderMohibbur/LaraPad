<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">➕ Add New Testimonial</h2>

        <x-success-message />

        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                        required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Designation -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Designation</label>
                    <input type="text" name="designation" value="{{ old('designation') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    @error('designation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Company</label>
                    <input type="text" name="company" value="{{ old('company') }}"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image <span
                            class="text-red-500">*</span></label>
                    <input type="file" name="image" accept="image/*" required
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white file:border-0 file:bg-blue-600 file:text-white file:rounded file:px-4 file:py-2 file:shadow-sm file:hover:bg-blue-700 dark:file:bg-blue-500 dark:file:hover:bg-blue-600">
                    @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rating (1 to 5)</label>
                    <input type="number" name="rating" value="{{ old('rating', 5) }}" min="1" max="5"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    @error('rating')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Serial -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Serial (Display
                        Order)</label>
                    <input type="number" name="serial" value="{{ old('serial', 1) }}" min="1"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    @error('serial')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Quote -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quote (with <span>span</span>
                    tag)</label>
                <textarea name="quote" rows="2"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">{{ old('quote') }}</textarea>
                @error('quote')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" rows="4"
                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('testimonials.index') }}"
                    class="px-4 py-2 rounded-md bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-white hover:bg-gray-400 dark:hover:bg-gray-600 shadow">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 shadow">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
