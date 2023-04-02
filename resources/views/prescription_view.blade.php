<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <!-- Heading -->
                    <h2 class="font-semibold text-xl text-gray-800 text-center my-6 font-serif">
                        {{ __(strtoupper('Prescription View')) }}
                    </h2>
                    <div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 datatable">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            USER NAME
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NOTE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DELEIVERY ADDRESS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DELIVERY PRICE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($images_upload as $details)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               {{$details->name}}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$details->note}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$details->delivery_address}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$details->delivery_time}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{url('prescription_quotation/'.$details->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline pr-3">VIEW</a>
                                                {{-- <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">DELETE</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @push('scripts')
                {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                @endpush --}}
            </div>
        </div>
    </div>
</x-app-layout>
