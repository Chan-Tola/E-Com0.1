@extends('layout.admin')
@section('tittle', 'Category Page')
@section('name_feature', 'Categories Management')
@section('listings_content')
    {{-- note: Main categories --}}
    <main class="min-h-screen bg-gray-50 dark:bg-[#11120F]" x-data= "{ activeTab:'main' }">
        <!-- Header Section -->
        <header>
            <section
                class="flex w-full items-center border-b border-[#11120F] justify-between bg-white p-5 text-left text-lg font-semibold text-gray-900 dark:bg-[#11120F] dark:text-white dark:border-white">
                <section>
                    <button @click = " activeTab = 'main'"
                        :class="{ 'border-blue-500 text-blue-600': activeTab === 'main', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'main' }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Main Categories
                    </button>
                    <!-- Sub Categories Button -->
                    <button @click = " activeTab = 'sub'"
                        :class="{
                            'border-blue-500 text-blue-600': activeTab === 'sub',
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'sub'
                        }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Sub Categories
                    </button>
                </section>
                {{-- note: dont forget to do dynamic button add new --}}
                <button type="button" data-action="show" data-modal-url="{{ route('category.create') }}"
                    data-title="Create Category" :data-type="activeTab"
                    class="me-2 mb-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 focus:outline-none dark:border-gray-600 dark:bg-[#11120F] dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                    Add new
                </button>
            </section>
        </header>

        <section>
            <div class="relative overflow-x-auto shadow-md">
                {{-- note: Main Categories --}}
                <table x-show="activeTab === 'main'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    {{-- note: head table --}}
                    <thead
                        class="bg-gray-50 text-xs border-b border-[#11120F] text-gray-700 uppercase dark:bg-[#1A1A18] dark:border-white dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Category Name</th>
                            <th scope="col" class="px-6 py-3">Khmer Name</th>
                            <th scope="col" class="px-6 py-3">Slug</th>
                            <th scope="col" class="px-6 py-3">Sub-Categories Count</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- note: table --}}
                        @foreach ($mainCategories as $index => $mainCategory)
                            <tr
                                class="border-b border-[#11120F] bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-[#11120F] dark:hover:bg-gray-600">

                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    <span>
                                        {{ $mainCategory->name }}
                                    </span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    <span>
                                        {{ $mainCategory->name_kh }}</span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    {{ $mainCategory->slug }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    <span>
                                        {{ $mainCategory->children->count() }} sub-categories
                                    </span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                        {{ $mainCategory->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </th>
                                {{-- note: button action --}}
                                <td class="px-6 py-4">
                                    <button type="button" data-action="show" data-title="Edit Category"
                                        data-modal-url="{{ route('category.edit', $mainCategory->id) }}"
                                        class="font-medium text-blue-600  dark:text-blue-500">Edit</button>
                                    <button type="button" data-action="show" data-title="Deleted" data-type="delete"
                                        data-item-name="{{ $mainCategory->name }}"
                                        data-modal-url="{{ route('category.destroy', $mainCategory->id) }}"
                                        class="font-medium text-red-600  dark:text-red-500 ml-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- note: Sub Categories --}}
                <table x-show="activeTab === 'sub'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    {{-- note: head table --}}
                    <thead
                        class="bg-gray-50 text-xs border-b border-[#11120F] text-gray-700 uppercase dark:bg-[#1A1A18] dark:border-white dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Category Name</th>
                            <th class="px-6 py-3">Khmer Name</th>
                            <th class="px-6 py-3">Parent Category</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Sort Order</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- note: table --}}
                        @foreach ($subCategories as $index => $subCategory)
                            <tr
                                class="border-b border-[#11120F] bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-[#11120F] dark:hover:bg-gray-600">

                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    <span>
                                        {{ $subCategory->name }}
                                    </span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    <span>
                                        {{ $subCategory->name_kh }}</span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    <span>
                                        {{ $subCategory->parent->name }}
                                    </span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                        {{ $subCategory->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-500 dark:text-white">
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                        {{ $subCategory->sort_order }}
                                    </span>
                                </th>
                                {{-- note: button action --}}
                                <td class="px-6 py-4">
                                    <button class="font-medium text-blue-600  dark:text-blue-500" type="button"
                                        data-action="show" data-title="Edit Category"
                                        data-modal-url="{{ route('category.edit', $subCategory->id) }}">Edit</button>
                                    <button type="button" data-action="show" data-title="Deleted" data-type="delete"
                                        data-item-name="{{ $subCategory->name }}"
                                        data-modal-url="{{ route('category.destroy', $subCategory->id) }}"
                                        class="font-medium text-red-600  dark:text-red-500  ml-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>

        <section>
            @include('admin.components.modal')
        </section>
    </main>

@endsection
