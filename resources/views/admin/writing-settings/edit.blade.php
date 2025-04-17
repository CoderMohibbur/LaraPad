<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">✏️ Edit Writing Settings</h2>

            <form action="{{ route('admin.writing-settings.update') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Default Post Category -->
                    <div>
                        <label for="default_post_category" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            📂 Default Post Category
                        </label>
                        <input type="text" id="default_post_category" name="default_post_category"
                            value="{{ old('default_post_category', $setting->default_post_category) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Default Post Format -->
                    <div>
                        <label for="default_post_format" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            🧩 Default Post Format
                        </label>
                        <input type="text" id="default_post_format" name="default_post_format"
                            value="{{ old('default_post_format', $setting->default_post_format) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Mail Server -->
                    <div>
                        <label for="mail_server" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            📧 Mail Server
                        </label>
                        <input type="text" id="mail_server" name="mail_server"
                            value="{{ old('mail_server', $setting->mail_server) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Mail Port -->
                    <div>
                        <label for="mail_port" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            🔌 Port
                        </label>
                        <input type="number" id="mail_port" name="mail_port"
                            value="{{ old('mail_port', $setting->mail_port) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Login Name -->
                    <div>
                        <label for="login_name" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            👤 Login Name
                        </label>
                        <input type="text" id="login_name" name="login_name"
                            value="{{ old('login_name', $setting->login_name) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            🔒 Password
                        </label>
                        <input type="password" id="password" name="password"
                            value="{{ old('password', $setting->password) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Default Mail Category -->
                    <div class="md:col-span-2">
                        <label for="default_mail_category" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            📬 Default Mail Category
                        </label>
                        <input type="text" id="default_mail_category" name="default_mail_category"
                            value="{{ old('default_mail_category', $setting->default_mail_category) }}"
                            class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">
                    </div>

                    <!-- Update Services -->
                    <div class="md:col-span-2">
                        <label for="update_services" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">
                            🔔 Update Services <span class="text-xs text-gray-500">(one per line)</span>
                        </label>
                        <textarea id="update_services" name="update_services" rows="4"
                            class="w-full form-textarea rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring focus:ring-blue-500">{{ old('update_services', $setting->update_services) }}</textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-lg">
                        💾 Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
