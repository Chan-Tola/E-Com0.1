<section id="modal"
    class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        {{-- note: Modal content  --}}
        <div class="relative bg-gray-200 rounded-lg shadow-sm dark:bg-gray-700">
            {{-- note: Modal header --}}
            <section
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="title"></h3>
                <button id="close-modal" type="button">
                    <i class='bx  bx-x text-2xl text-gray-900 dark:text-white'></i>
                </button>
            </section>
            {{-- note: Modal body --}}
            <section id="modal-body">

            </section>
        </div>
    </div>
</section>
