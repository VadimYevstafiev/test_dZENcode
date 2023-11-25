<x-app-layout>
    <div class="flex-1 h-screen overflow-hidden">
        <div class="flex-1">           
            <div class="h-screen overflow-y-auto p-4 pb-36">                
                @foreach($notes as $item)    
                    <x-note-grid :user="$item['user']" :content="$item['content']" :left="$item['left']"/> 
                @endforeach
                {{ $notes->links() }}
            </div>

        </div>

    </div>
    <!-- Note Input -->
    <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-full">
        <div class="flex items-center">
            <input type="text" placeholder="Type a message..." class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
            <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
        </div>
    </footer>
</x-app-layout>