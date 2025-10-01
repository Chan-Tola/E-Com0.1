<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 h-screen w-64 -translate-x-full border-r border-[#11120F] bg-white pt-5 transition-transform sm:translate-x-0 dark:border-white dark:bg-[#11120F]"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-white px-3 pb-4 dark:bg-[#11120F]">
        <ul class="space-y-2 font-medium">
            <button type="button" class="flex items-center gap-3 rounded-full  px-3 py-2 text-white">
                <!-- Name and username -->
                <div class="flex flex-col text-left">
                    <span class="font-semibold text-xl dark:text-white text-gray-900">Mr.John Doe</span>
                    <span class="text-md dark:text-gray-300 text-gray-500">admin</span>
                </div>
            </button>
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bxr  bx-dashboard text-2xl'></i>
                    </span>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bx  bx-cube text-2xl'></i>
                    </span>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Product Managments</span>
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bx  bx-caret-down text-xl'></i>
                    </span>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('category.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('listing.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Product
                            Lists</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bx  bx-shopping-bag-alt text-2xl'></i>
                    </span>
                    <span class="ms-3 flex-1 whitespace-nowrap">Order</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bx  bx-user text-2xl'></i>
                    </span>
                    <span class="ms-3 flex-1 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="group flex items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span
                        class="shrink-0 w-5 h-5  text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                        <i class='bx  bx-arrow-out-left-square-half text-2xl'></i>
                    </span>
                    <span class="ms-3 flex-1 whitespace-nowrap">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
