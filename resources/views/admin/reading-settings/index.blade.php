<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">📖 Reading Settings</h2>
                <a href="{{ route('admin.reading-settings.edit') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                    ✏️ Edit Settings
                </a>
            </div>

            <div class="space-y-4 text-gray-700 dark:text-gray-300">

                <!-- Homepage Display -->
                <div>
                    <span class="font-medium">🏠 Homepage Displays:</span>
                    <span class="ml-1">
                        {{ $setting->homepage_display === 'static_page' ? 'A Static Page' : 'Your Latest Posts' }}
                    </span>
                </div>

                @if($setting->homepage_display === 'static_page')
                    <div>
                        <span class="font-medium">🗂 Homepage Page ID:</span>
                        <span>{{ $setting->homepage_id ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="font-medium">📄 Posts Page ID:</span>
                        <span>{{ $setting->posts_page_id ?? '—' }}</span>
                    </div>
                @endif

                <!-- Blog Page Limit -->
                <div>
                    <span class="font-medium">📰 Blog Pages Show At Most:</span>
                    <span>{{ $setting->blog_page_limit }} posts</span>
                </div>

                <!-- Feed Limit -->
                <div>
                    <span class="font-medium">📢 Syndication Feed Shows Most Recent:</span>
                    <span>{{ $setting->feed_limit }} items</span>
                </div>

                <!-- Post Feed Type -->
                <div>
                    <span class="font-medium">📥 Each Post in Feed Includes:</span>
                    <span>{{ $setting->post_feed_type === 'excerpt' ? 'Excerpt' : 'Full Text' }}</span>
                </div>

                <!-- Search Engine Visibility -->
                <div>
                    <span class="font-medium">🔍 Search Engine Visibility:</span>
                    <span>
                        {{ $setting->search_engine_visibility ? '✔️ Discouraged from Indexing' : '❌ Visible to Search Engines' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
