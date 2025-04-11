<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">📝 Writing Settings</h2>
                <a href="{{ route('admin.writing-settings.edit') }}"
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    ✏️ Edit Settings
                </a>
            </div>

            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <div>
                    <span class="font-medium">📂 Default Post Category:</span>
                    <span>{{ $setting->default_post_category ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">🧩 Default Post Format:</span>
                    <span>{{ $setting->default_post_format ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">📧 Mail Server:</span>
                    <span>{{ $setting->mail_server ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">🔌 Port:</span>
                    <span>{{ $setting->mail_port ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">👤 Login Name:</span>
                    <span>{{ $setting->login_name ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">📬 Default Mail Category:</span>
                    <span>{{ $setting->default_mail_category ?? '—' }}</span>
                </div>

                <div>
                    <span class="font-medium">🔔 Update Services:</span>
                    @if ($setting->update_services)
                        <ul class="list-disc list-inside mt-1 text-sm">
                            @foreach (explode(PHP_EOL, $setting->update_services) as $service)
                                <li>{{ $service }}</li>
                            @endforeach
                        </ul>
                    @else
                        <span>—</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
