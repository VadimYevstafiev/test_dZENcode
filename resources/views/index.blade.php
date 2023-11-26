<x-app-layout>

    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                <tr>
                                        <th class="flex flex-row flow-root px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                User Name
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                <div>
                                                    <input type="radio" name="option" id="1" value="1" class="peer hidden" onclick="changeRadio(11)" />
                                                    <label for="1" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">ASC</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="option" id="12" value="12" class="peer hidden" onclick="changeRadio(12)"  />
                                                    <label for="12" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">DESC</label>
                                                </div>
                                            
                                            </div>
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                Email
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                <div>
                                                    <input type="radio" name="option" id="21" value="21" class="peer hidden"  onclick="changeRadio(21)" />
                                                    <label for="21" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">ASC</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="option" id="22" value="22" class="peer hidden"  onclick="changeRadio(22)" />
                                                    <label for="22" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">DESC</label>
                                                </div>
                                            </div>
                                        </th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            <div class="float-left">
                                                Created at
                                            </div>
                                            <div class="w-1/4 mr-auto float-right">
                                                <div>
                                                    <input type="radio" name="option" id="31" value="31" class="peer hidden"  onclick="changeRadio(31)" />
                                                    <label for="31" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">ASC</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="option" id="32" value="32" class="peer hidden"  onclick="changeRadio(32)" />
                                                    <label for="32" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">DESC</label>
                                                </div>
                                           
                                            </div>
                                        </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($heads as $item)
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
                        </div>
                    </div>
                </div>
                {{ $heads->links() }}
            </div>
        </div>
    </div>

    <script>
        function changeRadio(id)
        {
            let url = "{{ route('index', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }

        document.onreadystatechange = function(){
            if(document.readyState === 'complete'){
            radiobtn = document.getElementById(id);
            alert(radiobtn);
            radiobtn.checked = true;
            }
        }
    </script>
</x-app-layout>
