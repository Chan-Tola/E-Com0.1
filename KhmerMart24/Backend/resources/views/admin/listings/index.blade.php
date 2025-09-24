@extends('layout.admin')
@section('tittle', 'Product Listings')
@section('name_feature', 'Products Management')
@section('listings_content')
    <main class="min-h-screen bg-gray-50 dark:bg-[#11120F]" x-data="{ activeTap: 'relations' }">
        {{-- note: Header Section --}}
        <header>
            <section
                class="flex w-full items-center border-b border-[#11120F] justify-between bg-white p-5 text-left text-lg font-semibold text-gray-900 dark:bg-[#11120F] dark:text-white dark:border-white">
                <section>
                    <button @click = " activeTap = 'relations'"
                        :class="{ 'border-blue-500 text-blue-600': activeTap === 'relations', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTap !== 'relations' }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        User & Category Relations
                    </button>
                    <button @click = " activeTap = 'details'"
                        :class="{ 'border-blue-500 text-blue-600': activeTap === 'details', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTap !== 'details' }"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Product Details
                    </button>
                </section>
                {{-- note: dont forget to do dynamic button add new --}}
                <button type="button"
                    class="me-2 mb-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 focus:outline-none dark:border-gray-600 dark:bg-[#11120F] dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Add
                    new</button>
            </section>
        </header>

        {{-- note: Main Content Section --}}
        <section>
            <div class="relative overflow-x-auto shadow-md">
                {{-- note: Products Table --}}
                <table x-show="activeTap === 'relations'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    {{-- note: head table --}}
                    <thead
                        class="bg-gray-50 text-xs border-b border-[#11120F] text-gray-700 uppercase dark:bg-[#1A1A18] dark:border-white dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Listing ID</th>
                            <th class="px-6 py-3">User Information</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Created Date</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- note: table --}}
                        @foreach ($listings as $index => $listing)
                            <tr
                                class="border-b border-[#11120F] bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-[#11120F] dark:hover:bg-gray-600">
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listing->id }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listing->user->fullname }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listing->category->name }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listing->status }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listing->created_at->format('Y-m-d') }}</th>
                                {{-- note: action button --}}
                                <td class="px-6 py-4">
                                    <button class="font-medium text-blue-600  dark:text-blue-500">Edit</button>
                                    <button class="font-medium text-red-600  dark:text-red-500 ml-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <table x-show="activeTap === 'details'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                    {{-- note: head table --}}
                    <thead
                        class="bg-gray-50 text-xs border-b border-[#11120F] text-gray-700 uppercase dark:bg-[#1A1A18] dark:border-white dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">Image</th>
                            <th class="px-6 py-3">Product</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3">Condition</th>
                            <th class="px-6 py-3">Location</th>
                            <th class="px-6 py-3">Views</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- note: table --}}
                        @foreach ($listings as $index => $listingDetail)
                            <tr
                                class="border-b border-[#11120F] bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-[#11120F] dark:hover:bg-gray-600">
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->images }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->title }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->price }} $</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->condition }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->location }}</th>
                                <th class="px-6 py-4 font-medium whitespace-nowrap text-gray-900 dark:text-white">
                                    {{ $listingDetail->view_count }}</th>
                                {{-- note: action button --}}
                                <td class="px-6 py-4">
                                    <button class="font-medium text-blue-600  dark:text-blue-500">Edit</button>
                                    <button class="font-medium text-red-600  dark:text-red-500 ml-4">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </main>

@endsection
