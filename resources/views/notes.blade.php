<x-app-layout>
    <div class="flex-1 h-screen overflow-hidden">
        <div class="flex-1">           
            <div class="h-screen overflow-y-auto p-4 pb-36">                
                @foreach($notes as $item)
                <div class="flex mb-4 cursor-pointer bg-white rounded-lg p-3 gap-3 grid grid-cols-1" style="margin-left: {{ $item['left'] }}rem;">
                    <x-note-grid :user="$item['user']" :content="$item['content']"/> 
                    <div class="flex items-center justify-end">
                        <a href="{{ route('create', $item['id']) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Add comment</a>
                    </div>
                </div> 
                @endforeach
                {{ $notes->links() }}
            </div>

        </div>

    </div>
    <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-full">
        <div class="flex items-center justify-end">
            <a href="{{ route('create'), 0 }}" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send comment</a>
        </div>
    </footer>
</x-app-layout>