<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">✏️ Edit Reading Settings</h2>

            <form action="{{ route('admin.reading-settings.update') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Homepage Display -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">🏠 Your Homepage Displays:</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="homepage_display" value="latest_posts"
                                   @checked($setting->homepage_display === 'latest_posts')
                                   class="form-radio text-blue-600">
                            <span class="ml-2">Your latest posts</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="homepage_display" value="static_page"
                                   @checked($setting->homepage_display === 'static_page')
                                   class="form-radio text-blue-600">
                            <span class="ml-2">A static page</span>
                        </label>
                    </div>
                </div>

                <!-- Homepage ID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4" x-data="{ staticSelected: '{{ $setting->homepage_display }}' === 'static_page' }">
                    <div>
                        <label for="homepage_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            🗂 Homepage Page ID
                        </label>
                        <input type="number" id="homepage_id" name="homepage_id"
                               value="{{ old('homepage_id', $setting->homepage_id) }}"
                               class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <!-- Posts Page ID -->
                    <div>
                        <label for="posts_page_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            📄 Posts Page ID
                        </label>
                        <input type="number" id="posts_page_id" name="posts_page_id"
                               value="{{ old('posts_page_id', $setting->posts_page_id) }}"
                               class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>

                <!-- Blog Page Limit -->
                <div>
                    <label for="blog_page_limit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        📰 Blog Pages Show At Most
                    </label>
                    <input type="number" id="blog_page_limit" name="blog_page_limit"
                           value="{{ old('blog_page_limit', $setting->blog_page_limit) }}"
                           class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>

                <!-- Feed Limit -->
                <div>
                    <label for="feed_limit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        📢 Syndication Feeds Show Most Recent
                    </label>
                    <input type="number" id="feed_limit" name="feed_limit"
                           value="{{ old('feed_limit', $setting->feed_limit) }}"
                           class="w-full form-input rounded-md border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>

                <!-- Post Feed Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">📥 Each Post in Feed Includes:</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="post_feed_type" value="full_text"
                                   @checked($setting->post_feed_type === 'full_text')
                                   class="form-radio text-blue-600">
                            <span class="ml-2">Full text</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="post_feed_type" value="excerpt"
                                   @checked($setting->post_feed_type === 'excerpt')
                                   class="form-radio text-blue-600">
                            <span class="ml-2">Excerpt</span>
                        </label>
                    </div>
                </div>

                <!-- Search Engine Visibility -->
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="search_engine_visibility" value="1"
                               @checked($setting->search_engine_visibility)
                               class="form-checkbox text-blue-600">
                        <span class="ml-2">🔍 Discourage search engines from indexing this site</span>
                    </label>
                    <p class="text-sm text-gray-500 dark:text-gray-400 ml-6">
                        It is up to search engines to honor this request.
                    </p>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-lg">
                        💾 Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
