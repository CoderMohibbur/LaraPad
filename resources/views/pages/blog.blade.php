{{-- <x-guest-layout>
    <!-- Blog Banner -->
    <section class="border-b">
        <div class="py-16 max-w-screen-xl mx-auto text-center lg:text-left">
            <h1 class="font-bold text-5xl lg:text-7xl">Blog</h1>
            <p class="text-xl lg:text-2xl text-[#5d7183] pt-6">
                Explore our latest posts and insights on digital marketing, design, and tech trends.
            </p>
        </div>
    </section>

    <section class="border-b pt-20">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-10">

                <!-- 📌 Left Side (Posts) -->
                {{-- <div class="w-full lg:w-2/3">
                    <!-- 🔥 Featured Post -->
                    @if(isset($featured) && $featured && $featured->image_url)
                        <div class="relative mb-10 rounded-lg overflow-hidden shadow-md">
                            <a href="{{ route('blog.show', $featured->slug) }}">
                                <img src="{{ asset($featured->image_url) }}" alt="{{ $featured->title }}" class="w-full h-80 object-cover">
                            </a>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                                <h2 class="text-white text-3xl font-bold">
                                    <a href="{{ route('blog.show', $featured->slug) }}">{{ $featured->title }}</a>
                                </h2>
                            </div>
                        </div>
                    @endif

                    <!-- 📰 All Posts Serially -->
                    @if($posts->count())
                        <div class="space-y-10">
                            @foreach($posts as $index => $post)
                                <div class="flex gap-6 border-b pb-6">
                                    <div class="w-32 h-32 shrink-0 rounded overflow-hidden">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                        </a>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 mb-1">
                                            #{{ $index + 1 }} —
                                            {{ $post->category->name ?? 'Uncategorized' }} •
                                            {{ $post->created_at->format('M d, Y') }}
                                        </p>
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white hover:text-blue-600">
                                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-lg py-8">No blog posts found.</p>
                    @endif
                </div> --}}

                <!-- 📚 Right Sidebar -->
                {{-- <div class="w-full lg:w-1/3">
                    <!-- 🔍 Search -->
                    <form method="GET" action="{{ route('blog.index') }}" class="flex mb-6">
                        <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}"
                               class="w-full border px-4 py-3 focus:outline-none rounded-l-md">
                        <button type="submit" class="text-white bg-blue-600 px-4 py-3 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </button>
                    </form>

                    <!-- 🏷️ Topics -->
                    <h2 class="font-bold text-md mb-2">Topics</h2>
                    <ul class="space-y-2">
                        @foreach($topics as $topic)
                            <li>
                                <a href="{{ route('category.show', $topic->slug) }}" class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-blue-500">
                                    <div class="w-2.5 h-2.5 mr-3 rounded-full bg-blue-500"></div>
                                    {{ $topic->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div> --}}
{{--
            </div>
        </div>
    </section>
</x-guest-layout> --}} --}}







<x-guest-layout>
    <!-- Blog Banner -->
    <section class="border-b">
     <div class="py-16 max-w-screen-xl mx-auto text-center lg:text-left">
         <h1 class="font-bold text-5xl lg:text-7xl">Blog</h1>
         <p class="text:xl lg:text-2xl text-[#5d7183] pt-6">Level up your Search Engine Marketing efforts with extensive tips and insights on our Blog.</p>
     </div>
 </section>
 <!-- Blog -->
 <section class="border-b">
    <div class="max-w-screen-xl mx-auto px-3">
        <div class="flex flex-col lg:flex-row gap-8 my-10">
            <div class="w-full lg:w-2/3 h-dvh overflow-y-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($posts as $index => $post)
                        <div class="relative">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-[250px] object-cover rounded">
                                @if($post->category)
                                    <p class="absolute top-4 left-4 bg-[#2ba8e2] text-white px-4 py-1 text-sm font-semibold rounded">
                                        {{ $post->category->name }}
                                    </p>
                                @endif
                            </a>
                            <div class="mt-3">
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('blog.show', $tag->slug) }}" class="hover:underline text-[#2ba8e2] text-sm font-semibold mr-1">
                                        {{ $tag->name }}@if(!$loop->last),@endif
                                    </a>
                                @endforeach
                            </div>
                            <h2 class="text-2xl font-bold hover:text-[#fca900] py-2">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <a href="#" class="hover:underline text-[#2ba8e2] font-semibold">{{ $post->author->name ?? 'Admin' }}</a>
                                <span>। {{ $post->created_at->format('F d, Y') }}</span>
                            </p>
                            <div class="flex h-1 w-full mt-5">
                                <div class="bg-sky-500 w-1/6"></div>
                                <div class="bg-green-500 w-1/6"></div>
                                <div class="bg-yellow-400 w-1/6"></div>
                                <div class="bg-orange-400 w-1/6"></div>
                                <div class="bg-red-600 w-1/6"></div>
                                <div class="bg-purple-600 w-1/6"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <!-- 🔍 Search -->
                <form method="GET" action="{{ route('blog.index') }}" class="flex mb-6">
                    <input type="text" name="search" placeholder="Search" value="{{ request('search') }}"
                        class="w-full border px-4 py-3 focus:outline-none">
                    <button type="submit" class="text-gray-700 px-4 py-3 border border-l-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </button>
                </form>

                <!-- 📌 Topics -->
                <h2 class="font-bold text-md my-3">Topics</h2>
                <div class="border">
                    <ul>
                        @foreach($topics as $topic)
                            <li class="border-b hover:border-black hover:text-orange-500 duration-500 group">
                                <a href="{{ route('category.show', $topic->slug) }}" class="py-4 block">
                                    <div class="flex items-center">
                                        <div class="rounded-full border border-black duration-500 ml-4 w-3 h-3 group-hover:bg-blue-500 group-hover:border-blue-500"></div>
                                        <span class="pl-4 text-sm">{{ $topic->name }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

 </x-guest-layout>
