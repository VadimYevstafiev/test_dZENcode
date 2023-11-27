<x-app-layout>
<div class="flex-1 h-screen overflow-hidden">
        <div class="flex-1">           
            <div class="h-screen overflow-y-auto p-4 pb-36"> 
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                        <th class="flex flex-row flow-root px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                User Name
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                @foreach(array("11", "12") as $number)
                                                    @if ($number == $id)
                                                        <x-checked-selector :number="$number"/>
                                                    @else
                                                        <x-selector :number="$number"/>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                Email
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                @foreach(array("21", "22") as $number)
                                                    @if ($number == $id)
                                                        <x-checked-selector :number="$number"/>
                                                    @else
                                                        <x-selector :number="$number"/>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                Created at
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                @foreach(array("31", "32") as $number)
                                                    @if ($number == $id)
                                                        <x-checked-selector :number="$number"/>
                                                    @else
                                                        <x-selector :number="$number"/>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ $item->user_name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ $item->email }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-row justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{ $item->created_at }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>

    <script>
        function changeRadio(id)
        {
            url = `${window.location.href}?id=${id}`;
            document.location.href=url;
        }

    </script>
</x-app-layout>
