<x-layouts.guest>
    @include('components.layouts.carousel')
    <section class="w-[90%] mx-auto my-8">
        <h2 class="text-xl text-slate-800">Trending Categories</h2>
        <div class="flex items-center justify-between my-6">
            <div
                class="w-[25%] max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="/placeholder.svg?height=200&width=300" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            Category Name</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="w-[90%] mx-auto my-8 flex justify-between">
        <div
            class="w-[48%] text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Work fast from anywhere</h5>
            <img src="/placeholder.svg?height=200&width=400" alt="Work fast" class="w-full p-8 rounded-t-lg">
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="#"
                    class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Buy Now</div>
                    </div>
                </a>
            </div>
        </div>

        <div
            class="w-[48%] text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Work fast from anywhere</h5>
            <img src="/placeholder.svg?height=200&width=400" alt="Work fast" class="w-full p-8 rounded-t-lg">
            <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="#"
                    class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                    <div class="text-left rtl:text-right">
                        <div class="mb-1 text-xs">Buy Now</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-layouts.guest>
