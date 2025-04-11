<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">💬 Discussion Settings</h2>
                <a href="{{ route('admin.discussion-settings.edit') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                    ✏️ Edit Settings
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 dark:text-gray-300">
                <!-- Default post settings -->
                <div><strong>Notify Linked Blogs:</strong> {{ $setting->notify_linked_blogs ? '✅ Yes' : '❌ No' }}</div>
                <div><strong>Allow Pingbacks:</strong> {{ $setting->allow_pingbacks ? '✅ Yes' : '❌ No' }}</div>
                <div><strong>Allow Comments:</strong> {{ $setting->allow_comments ? '✅ Yes' : '❌ No' }}</div>

                <!-- Other comment settings -->
                <div><strong>Require Name & Email:</strong> {{ $setting->require_name_email ? '✅' : '❌' }}</div>
                <div><strong>Registered Users Only:</strong> {{ $setting->require_registered_user ? '✅' : '❌' }}</div>
                <div><strong>Close Comments After (days):</strong> {{ $setting->comment_close_days ?? '—' }}</div>
                <div><strong>Threaded Comment Level:</strong> {{ $setting->threaded_comments_level ?? '—' }}</div>
                <div><strong>Break Comments Into Pages:</strong> {{ $setting->break_comments_pages ? '✅' : '❌' }}</div>
                <div><strong>Comments Per Page:</strong> {{ $setting->comments_per_page ?? '—' }}</div>
                <div><strong>Default Comment Page:</strong> {{ $setting->default_comment_page ?? '—' }}</div>

                <!-- Email me -->
                <div><strong>Email on Comment:</strong> {{ $setting->email_on_comment ? '✅' : '❌' }}</div>
                <div><strong>Email on Moderation:</strong> {{ $setting->email_on_moderation ? '✅' : '❌' }}</div>

                <!-- Before comment appears -->
                <div><strong>Manual Approval:</strong> {{ $setting->manual_approve ? '✅' : '❌' }}</div>
                <div><strong>Previously Approved Author:</strong> {{ $setting->previously_approved ? '✅' : '❌' }}</div>

                <!-- Avatars -->
                <div><strong>Show Avatars:</strong> {{ $setting->show_avatars ? '✅' : '❌' }}</div>
                <div><strong>Avatar Rating:</strong> {{ $setting->avatar_rating }}</div>
                <div><strong>Default Avatar:</strong> {{ ucfirst($setting->default_avatar) }}</div>
            </div>

            <!-- Moderation Areas -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-white">🛡️ Moderation Keys</h3>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded text-sm whitespace-pre-wrap">{{ $setting->moderation_keys ?? '—' }}</div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-white">🚫 Disallowed Keys</h3>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded text-sm whitespace-pre-wrap">{{ $setting->disallowed_keys ?? '—' }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
