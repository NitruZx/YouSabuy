<div>
    {{-- table --}}
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live.debounce.150ms="search" 
            type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Room ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Client Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reg Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Create At
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regs as $reg)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="accordion-collapse{{$reg->client_id}}" data-accordion="collapse">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" data-accordion-target="#accordion-collapse-body-{{$reg->client_id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$reg->client_id}}">
                            {{$reg->room_id}}
                        </th>
                        <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$reg->client_id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$reg->client_id}}">
                            {{$reg->client->firstname}} {{$reg->client->lastname}}
                        </td>
                        <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$reg->client_id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$reg->client_id}}">
                            {{$reg->startdate}}
                        </td>
                        <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$reg->client_id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$reg->client_id}}">
                            {{$reg->reg_status}}
                        </td>
                        <td class="px-6 py-4" data-accordion-target="#accordion-collapse-body-{{$reg->client_id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$reg->client_id}}">
                            {{$reg->created_at}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div id="accordion-collapse-body-{{$reg->client_id}}" class="hidden">
                                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                                        Firstname : {{$reg->client->firstname}}<br>Lastname : {{$reg->client->lastname}}<br>
                                        Status : {{$reg->reg_status}}
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- table --}}
    <div class="py-4 px-3">
        <div class="flex ">
            <div class="flex space-x-4 items-center mb-3">
                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                <select
                    wire:model.live="perPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        {{ $regs->links() }}
    </div>

</div>
