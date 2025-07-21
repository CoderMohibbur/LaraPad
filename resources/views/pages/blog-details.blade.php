<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto px-4">
            {{-- 🔥 Featured Image --}}
            @if ($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                     class="w-full h-[400px] object-cover rounded shadow mb-8">
            @endif

            {{-- 📝 Title --}}
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ $post->title }}</h1>

            {{-- 📅 Meta Info --}}
            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400 mb-6">
                <span>📂 {{ $post->category?->name ?? 'Uncategorized' }}</span>
                <span>✍️ {{ $post->author?->name ?? 'Admin' }}</span>
                <span>📅 {{ $post->published_at->format('F j, Y') }}</span>
            </div>

            {{-- 🧾 Short Description --}}
            @if ($post->short_description)
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ $post->short_description }}
                </p>
            @endif

            {{-- 📄 Full Content --}}
            <div class="prose dark:prose-invert max-w-none">
                {!! $post->description !!}
            </div>

            {{-- 🔙 Back to Blog --}}
            <div class="mt-10">
                <a href="{{ url('/blog') }}"
                   class="inline-block text-sm text-blue-600 hover:underline dark:text-blue-400">
                    ← Back to Blog
                </a>
            </div>
        </div>
    </section>
</x-guest-layout>
