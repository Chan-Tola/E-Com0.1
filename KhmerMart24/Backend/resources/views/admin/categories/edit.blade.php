<form class="p-4 md:p-5" action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid gap-4 mb-4 grid-cols-2">
        {{-- note:english name --}}
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::NAME }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Category Name (English)
            </label>
            <input type="text" name="{{ \App\Models\Category::NAME }}" id="{{ \App\Models\Category::NAME }}"
                value="{{ $category->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Category name in English" required>
        </div>
        {{-- note:khmer name --}}
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::NAME_KH }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Category Name (KHR)
            </label>
            <input type="text" name="{{ \App\Models\Category::NAME_KH }}" id="{{ \App\Models\Category::NAME_KH }}"
                value="{{ $category->name_kh }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Category name in English" required>
        </div>
        <!-- Slug -->
        <div class="col-span-2">
            <label for="{{ \App\Models\Category::SLUG }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
            <input type="text" name="{{ \App\Models\Category::SLUG }}" id="{{ \App\Models\Category::SLUG }}"
                value="{{ $category->slug }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="category-slug" required>
        </div>


                {{-- Parent Category Selection --}}
        <div class="col-span-2 sm:col-span-1">
            <label for="{{ \App\Models\Category::PARENT_ID }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parent Category</label>
            <select id="{{ \App\Models\Category::PARENT_ID }}" name="{{ \App\Models\Category::PARENT_ID }}"
                :disabled="activeTab === 'main'"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="{{ $category->parent_id }}">Select Parent Category</option>
                 @foreach($parentCategories as $index => $item)
                    <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach 
            </select>
        </div>

        <!-- Display Validation Errors -->
        @if (session('error'))
            <div class="mb-4 p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                {{ session('error') }}
            </div>
        @endif

        <button type="submit"
            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            Update Category
        </button>
    </div>
</form>
