<form class="p-4 md:p-5" action="{{ route('listing.store') }}", method="POST">
    @csrf
    <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="{{ \App\Models\Listing::TITLE }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titile Product</label>
            <input type="text" name="{{ \App\Models\Listing::TITLE }}" id="{{ \App\Models\Listing::TITLE }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Title" required="">
        </div>
        <div class="col-span-2">
            <label for="{{ \App\Models\Listing::DESCRIPTION }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discription</label>
            <input type="text" name="{{ \App\Models\Listing::DESCRIPTION }}"
                id="{{ \App\Models\Listing::DESCRIPTION }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Description" required="">
        </div>
        <div class="col-span-2">
            <label for="{{ \App\Models\Listing::PRICE }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodcut Price </label>
            <input type="text" name="{{ \App\Models\Listing::PRICE }}" id="{{ \App\Models\Listing::PRICE }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Price" required="">
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="{{ \App\Models\Listing::CONDITION }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Condition</label>
            <select id="{{ \App\Models\Listing::CONDITION }}" name="{{ \App\Models\Listing::CONDITION }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected="">Select category</option>
                <option value="{{ \App\Models\Listing::CONDITION_NEW }}">New</option>
                <option value="{{ \App\Models\Listing::CONDITION_USED }}">Used</option>
            </select>
        </div>
        {{-- note: place enter image --}}


        <div class="col-span-2">
            <label for="{{ \App\Models\Listing::CONTACT_PHONE }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contacts</label>
            <input type="{{ \App\Models\Listing::CONTACT_PHONE }}" name="{{ \App\Models\Listing::CONTACT_PHONE }}"
                id="{{ \App\Models\Listing::CONTACT_PHONE }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Contacts" required="">
        </div>
        
        <div class="col-span-2">
            <label for="{{ \App\Models\Listing::LOCATION }}"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Locations</label>
            <input type="{{ \App\Models\Listing::LOCATION }}" name="{{ \App\Models\Listing::LOCATION }}"
                id="{{ \App\Models\Listing::LOCATION }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Enter Location" required="">
        </div>
  
    </div>
    <button type="submit"
        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class='bx bx-plus text-sm mr-2'></i>
        Add new product
    </button>
</form>
