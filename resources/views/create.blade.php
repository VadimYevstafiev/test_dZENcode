<x-app-layout>
    <div class="flex-1 h-screen overflow-scroll">
            <div class="flex-1 ">
                @if (is_null($parent))
                    <h1 class= "text-2xl font-bold mb-6 text-center">Create new comment</h1>
                @else
                    <h1 class= "text-2xl font-bold mb-6 text-center">Add comment to:</h1>
                @endif
                <form class="w-full max-w-[50%] mx-auto bg-white p-8 rounded-md shadow-md"
                        id="createNoteForm"
                        action="{{route('store')}}"
                        method="POST">
                @csrf
                @if (!is_null($parent))
                    <div class="mb-4">
                        <x-note-grid :user="$parent['user']" :content="$parent['content']"/> 
                        <input type="hidden" id="parent_id" name="parent_id" value="{{ $parent['id'] }}">
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Enter comment</label>
                    <textarea
                            rows="4"
                            name="content"
                            id="content"
                            placeholder="Enter your comment"
                            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    ></textarea>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user_name">User Name</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="user_name" name="user_name" placeholder="{{ Auth::user()->user_name }}">
                    <x-input-error :messages="$errors->get('user_name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="email" name="email" placeholder="{{ Auth::user()->email }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="home_page">Home Page</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="home_page" name="home_page" placeholder="{{ Auth::user()->home_page }}">
                    <x-input-error :messages="$errors->get('home_page')" class="mt-2" />
                </div>

                <div class="mb-4">
                        <div class="g-recaptcha" data-sitekey="6Le3bRwpAAAAAJsfzMtyip4d3weLlTRaVUuUyyCM"></div>
                        <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
                </div>

                <x-button action="submit" type="button" class="w-full m-0 font-bold">
                Send
                </x-button>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {

            $("#createNoteForm").on("submit", function (event) {
                event.preventDefault()
                let
                 captcha = grecaptha.getResponse();

                if (captcha.length) {
                    let dataForm = $(this).serialize()

                    $.ajax({
                        url: '',
                        method: 'post',
                        dataType: 'html',
                        data: dataForm,
                        sucsess: function(data){
                            console.log(data);

                            grecaptha.reset();
                        }

                    });
                }
            })

        })

    </script>
</x-app-layout>
