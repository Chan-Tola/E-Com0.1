<nav class="ml-64 bg-white border-[#11120F] border-b dark:bg-[#11120F] dark:border-white">
    <div class="flex  items-center justify-between mx-auto p-4">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
            @yield('name_feature')
        </span>
        <section class="flex justify-center items-center dark:text-white">
            <button class="w-7 h-7 flex items-center justify-center">
                <i class='bx bx-search-big text-xl'></i>
            </button>
            <button class="w-7 h-7 flex items-center justify-center">
                <i class='bx bx-notification text-xl'></i>
            </button>
            <button class="w-7 h-7 flex items-center justify-center">
                <i class='bx bx-cog text-xl'></i>
            </button>
            <button @click="toggleTheme()"
                class="w-7 h-7 flex items-center justify-center rounded-lg text-lg font-medium dark:text-white">
                <i class='bx bx-moon text-xl' x-show="!dark"></i>
                <i class='bx bx-sun text-xl' x-show="dark"></i>
            </button>
        </section>
    </div>
</nav>
