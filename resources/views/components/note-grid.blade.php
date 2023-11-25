        <div class="flex mb-4 cursor-pointer bg-white rounded-lg p-3 gap-3 grid grid-cols-1" style="margin-left: {{ $left }}rem;">
            <div class="flex w-full ">
                <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                    <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                </div>
                <h1 class="text-2xl font-semibold">{{ $user }}</h1>
            </div>
            <div class="flex w-full ps-9">
                <p class="text-gray-700">{{ $content }}</p>
            </div>
        </div>
