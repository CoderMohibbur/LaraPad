<aside id="sidebar"
    class="fixed top-0 left-0 z-40 w-18 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">


            <li>
                <a href="/dashboard"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i data-lucide="layout-dashboard"></i>
                    <span class="menu-text hidden ms-3">Dashboard</span>
                </a>
            </li>

            {{-- User Management --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="user-dropdown" data-collapse-toggle="user-dropdown" aria-expanded="false">

                    <i data-lucide="users"></i>

                    <span class="menu-text hidden flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">User
                        Management</span>
                    <svg sidebar-toggle-item="" class="menu-text hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="user-dropdown" class="space-y-2 hidden">
                    <li>
                        <a href="/users/"
                            class="menu-text text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Users</a>
                    </li>

                    <li>
                        <a href="/users/roles"
                            class="menu-text text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Roles</a>
                    </li>


                    {{-- <li>
                        <a href="/users/sales-commissions"
                            class="menu-text text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Sales
                            & Commissions</a>
                    </li> --}}
                </ul>
            </li>

            {{-- Blog post Management --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="account-dropdown" data-collapse-toggle="account-dropdown" aria-expanded="false">

                    <i data-lucide="briefcase"></i>
                    <span class="menu-text hidden flex-1 ml-3 text-left whitespace-nowrap"
                        sidebar-toggle-item="">Post</span>
                    <svg sidebar-toggle-item="" class="menu-text hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="account-dropdown" class="space-y-2 hidden">
                    <li>
                        <a href="/admin/posts/"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">All
                            Post</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Add
                            New Post</a>
                    </li>
                    <li>
                        <a href="/categories"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Catagories</a>
                    </li>
                    <li>
                        <a href="/tags"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Tags</a>
                    </li>
                </ul>
            </li>


            {{-- Image Media Management --}}
            {{-- <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="media" data-collapse-toggle="media" aria-expanded="false">

                    <i data-lucide="briefcase"></i>
                    <span class="menu-text hidden flex-1 ml-3 text-left whitespace-nowrap"
                        sidebar-toggle-item="">Media</span>
                    <svg sidebar-toggle-item="" class="menu-text hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="media" class="space-y-2 hidden">
                    <li>
                        <a href="/admin/users/"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700 ">Libary</a>
                    </li>
                </ul>
            </li> --}}




            {{-- Slider Management --}}
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                    aria-controls="slider" data-collapse-toggle="slider" aria-expanded="false">

                    <i data-lucide="briefcase"></i>
                    <span class="menu-text hidden flex-1 ml-3 text-left whitespace-nowrap"
                        sidebar-toggle-item="">Sliders</span>
                    <svg sidebar-toggle-item="" class="menu-text hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="slider" class="space-y-2 hidden">
                    <li>
                        <a href="/testimonials"
                            class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">Add
                            New Sliders</a>
                    </li>
                </ul>
            </li>



            {{-- Setting --}}
            <li>
                <a href="admin/logo"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                    <i data-lucide="settings"></i>
                    <span class="menu-text hidden flex-1 ms-3 whitespace-nowrap">Setting</span>
                </a>
            </li>
            
        </ul>
        
    </div>
</aside>
