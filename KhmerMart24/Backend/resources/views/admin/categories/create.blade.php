<form class="p-4 md:p-5" action="{{ route('category.store') }}", method="POST">
    @csrf
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::NAME }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                Name</label>
            <input type="text" name="{{ \App\Models\Category::NAME }}" id="{{ \App\Models\Category::NAME }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Category Name" required="">
        </div>
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::NAME_KH }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Khmer
                Name</label>
            <input type="text" name="{{ \App\Models\Category::NAME_KH }}" id="{{ \App\Models\Category::NAME_KH }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="សូមដាក់ឈ្មោះCategory" required="">
        </div>
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::SLUG }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SLUG
                Name</label>
            <input type="{{ \App\Models\Category::SLUG }}" name="{{ \App\Models\Category::SLUG }}"
                id="{{ \App\Models\Category::SLUG }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter SLUG" required="">
        </div>
        {{-- note: option main categories --}}
        <div class="col-span-2 sm:col-span-1">
            <label for="{{ \App\Models\Category::PARENT_ID }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select id="{{ \App\Models\Category::PARENT_ID }}" name="{{ \App\Models\Category::PARENT_ID }}"
                :disabled="activeTab === 'main'"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="">Select category</option>
                @foreach ($categories as $index => $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit"
        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class='bx bx-plus text-sm mr-2'></i>
        Add new product
    </button>
</form>
