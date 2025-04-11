<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">✏️ Edit Discussion Settings</h2>

            <form action="{{ route('admin.discussion-settings.update') }}" method="POST" class="space-y-6">
                @csrf

                {{-- ✅ Default post settings --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">📝 Default Post Settings</h3>
                    <div class="space-y-2">
                        @foreach ([
                            'notify_linked_blogs' => 'Attempt to notify any blogs linked to from the post',
                            'allow_pingbacks' => 'Allow link notifications from other blogs (pingbacks and trackbacks)',
                            'allow_comments' => 'Allow people to submit comments on new posts',
                        ] as $name => $label)
                            <label class="flex items-center">
                                <input type="checkbox" name="{{ $name }}" value="1"
                                       @checked($setting->$name)
                                       class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- ✅ Other comment settings --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">💬 Other Comment Settings</h3>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="require_name_email" value="1" @checked($setting->require_name_email) class="form-checkbox text-blue-600 rounded">
                            <span class="ml-2 text-sm">Comment author must fill out name and email</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" name="require_registered_user" value="1" @checked($setting->require_registered_user) class="form-checkbox text-blue-600 rounded">
                            <span class="ml-2 text-sm">Users must be registered and logged in to comment</span>
                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Close comments on posts older than (days)</label>
                                <input type="number" name="comment_close_days" value="{{ $setting->comment_close_days }}" class="form-input w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Threaded comments (levels deep)</label>
                                <input type="number" name="threaded_comments_level" value="{{ $setting->threaded_comments_level }}" class="form-input w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Comments per page</label>
                                <input type="number" name="comments_per_page" value="{{ $setting->comments_per_page }}" class="form-input w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Default comment page</label>
                                <input type="number" name="default_comment_page" value="{{ $setting->default_comment_page }}" class="form-input w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div class="col-span-2">
                                <label class="flex items-center mt-2">
                                    <input type="checkbox" name="break_comments_pages" value="1" @checked($setting->break_comments_pages) class="form-checkbox text-blue-600 rounded">
                                    <span class="ml-2 text-sm">Break comments into pages</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ✅ Email notifications --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">📧 Email Me Whenever</h3>
                    <div class="space-y-2">
                        @foreach ([
                            'email_on_comment' => 'Anyone posts a comment',
                            'email_on_moderation' => 'A comment is held for moderation',
                        ] as $name => $label)
                            <label class="flex items-center">
                                <input type="checkbox" name="{{ $name }}" value="1" @checked($setting->$name) class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- ✅ Comment approval --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">🛡️ Before a Comment Appears</h3>
                    <div class="space-y-2">
                        @foreach ([
                            'manual_approve' => 'Comment must be manually approved',
                            'previously_approved' => 'Comment author must have a previously approved comment',
                        ] as $name => $label)
                            <label class="flex items-center">
                                <input type="checkbox" name="{{ $name }}" value="1" @checked($setting->$name) class="form-checkbox text-blue-600 rounded">
                                <span class="ml-2 text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- ✅ Moderation areas --}}
                <div>
                    <label class="block text-sm font-medium text-gray-800 dark:text-white mb-1">🚫 Comment Moderation Keys</label>
                    <textarea name="moderation_keys" rows="3" class="form-textarea w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">{{ $setting->moderation_keys }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-800 dark:text-white mb-1">⛔ Disallowed Comment Keys</label>
                    <textarea name="disallowed_keys" rows="3" class="form-textarea w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">{{ $setting->disallowed_keys }}</textarea>
                </div>

                {{-- ✅ Avatar section --}}
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-white mb-2">👤 Avatars</h3>
                    <label class="flex items-center mb-2">
                        <input type="checkbox" name="show_avatars" value="1" @checked($setting->show_avatars) class="form-checkbox text-blue-600 rounded">
                        <span class="ml-2 text-sm">Show Avatars</span>
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Maximum Rating</label>
                            <select name="avatar_rating" class="form-select w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                                @foreach(['G', 'PG', 'R', 'X'] as $rate)
                                    <option value="{{ $rate }}" @selected($setting->avatar_rating === $rate)>{{ $rate }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Default Avatar</label>
                            <select name="default_avatar" class="form-select w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                                @foreach(['mystery', 'blank', 'gravatar', 'identicon', 'monsterid', 'wavatar', 'retro'] as $avatar)
                                    <option value="{{ $avatar }}" @selected($setting->default_avatar === $avatar)>{{ ucfirst($avatar) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- ✅ Submit --}}
                <div class="pt-6">
                    <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg">
                        💾 Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
