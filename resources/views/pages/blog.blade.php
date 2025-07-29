<x-guest-layout>
    <!-- Blog Banner -->
    <section class="border-b dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
        <div class="py-16 max-w-screen-xl mx-auto px-3 text-center lg:text-left">
            <h1 class="font-bold text-5xl lg:text-7xl">Blog</h1>
            <p class="text-xl lg:text-2xl text-gray-600 dark:text-gray-300 pt-6">
                Level up your Search Engine Marketing efforts with extensive tips and insights on our Blog.
            </p>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="border-b dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-100">
        <div class="max-w-screen-xl mx-auto px-3">
            <div class="flex flex-col lg:flex-row gap-8 my-10">

                <!-- Left Side: Posts -->
                <div class="w-full lg:w-2/3 h-dvh overflow-y-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach ($posts as $index => $post)
                            <div class="relative bg-white dark:bg-gray-800 rounded shadow hover:shadow-md transition">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->title }}"
                                        class="w-full h-[250px] object-cover rounded-t">
                                    @if ($post->category)
                                        <p
                                            class="absolute top-4 left-4 bg-[#2ba8e2] text-white px-4 py-1 text-sm font-semibold rounded">
                                            {{ $post->category->name }}
                                        </p>
                                    @endif
                                </a>
                                <div class="p-4">
                                    <div class="mb-1">
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('blog.show', $tag->slug) }}"
                                                class="hover:underline text-[#2ba8e2] text-sm font-semibold mr-1">
                                                {{ $tag->name }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                    <h2 class="text-2xl font-bold dark:text-gray-400 py-2">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <a href="#" class="hover:underline text-[#2ba8e2] font-semibold">
                                            {{ $post->author->name ?? 'Admin' }}
                                        </a>
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
                            </div>
                        @endforeach
                    </div>

                    <!-- ✅ Pagination -->
                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>

                </div>

                <!-- Right Side: Sidebar -->
                <div class="w-full lg:w-1/3">
                    <!-- 🔍 Search -->
                    <form method="GET" action="{{ route('blog.index') }}" class="flex mb-6 shadow-sm">
                        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}"
                            class="w-full border border-gray-300 dark:border-gray-700 px-4 py-3 focus:outline-none focus:ring-0 focus:border-blue-400 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400 rounded-l">
                        <button type="submit"
                            class="text-gray-700 dark:text-white bg-gray-100 dark:bg-gray-700 border border-l-0 border-gray-300 dark:border-gray-700 px-4 py-3 rounded-r">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </button>
                    </form>

                    <!-- 📌 Topics -->
                    <h2 class="font-bold text-md my-3 text-gray-900 dark:text-white">Topics</h2>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-md overflow-hidden">
                        <ul>
                            @foreach ($topics as $topic)
                                <li
                                    class="border-b border-gray-200 dark:border-gray-700 hover:border-blue-500 group transition duration-300">
                                    <a href="{{ route('category.show', $topic->slug) }}"
                                        class="py-4 block px-4 text-gray-800 dark:text-gray-200 hover:text-orange-500">
                                        <div class="flex items-center">
                                            <div
                                                class="rounded-full border border-gray-800 dark:border-white w-3 h-3 transition duration-300 group-hover:bg-blue-500 group-hover:border-blue-500">
                                            </div>
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
