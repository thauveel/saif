<x-print-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Logo</th>
                <th scope="col" class="px-3 py-3.5 text-left text-md font-semibold text-gray-900">{{ $team->name}} | {{$team->email}} {{$team->phone}} </th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                    <span class="sr-only">Edit</span>
                </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr >
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                        <img class="w-24 h-auto object-cover" src="{{ asset('storage/' . $team->logo) }}"/>
                    </div>
                    </td>
                   
                   
                
                </tr>
            </tbody>
        </table>
            
        </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Photo</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ID/PPN</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Jersey Number</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"></th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                    Verification Doc
                </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($team->players as $player )
                    
                
                <tr>
                <td>
                    <img class="w-12 h-auto" src="{{ asset('storage/' . $player['photo']) }}" alt="">
                </td>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $player->id_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $player->player_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $player->jersey_number }}</td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                    <a href="{{ asset('storage/' . $player->verification_document) }}" class="text-indigo-600 hover:text-indigo-900">Download</a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    
    </div>

    <!-- officials -->

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
        <h2>Officials</h2>
        </table>
            
        </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Photo</th>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">ID/PPN</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($team->officials as $official )
                    
                
                <tr>
                <td>
                    <img class="w-12 h-auto" src="{{ asset('storage/' . $official['photo']) }}" alt="">
                </td>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $official->id_number }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $official->official_name }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $official->official_type }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $official->phone }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    
    </div>

</x-print-layout>