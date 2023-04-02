<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <!-- Heading -->
                    <h2 class="font-semibold text-xl text-gray-800 text-center my-6 font-serif">
                        {{ __(strtoupper('Prescription Quotation')) }}
                    </h2>
                    <div>
                     <table class="border-4 border-green-500 border-spacing-2" width="100%">
                        <tr>
                            <td class="border-4 border-slate-300 p-2">
                                <table class="border-collapse table-auto border border-black border-spacing-4" >
                                    {{-- <tr class="border border-slate-300 flex content-center py-3 px-2">  --}}
                                        <div class="mx-auto mb-4 max-w-sm bg-white border border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <a href="#">
                                                <img class="rounded-t-lg m-2" height="70%" width="60%" src="{{asset('storage/images/'.$images_upload[0]['path'])}}" class="mx-auto" alt="" />
                                            </a>
                                        </div>
                                    {{-- </tr> --}}
                                    <tr>
                                        
                                    </tr><td class="border border-slate-300"><a href=""> <img height="40%" width="60%" src="{{ $images_upload[1]['path'] ? asset('storage/images/'.$images_upload[1]['path']) : null }}" class="mx-auto" alt=""></a></td>
                                        <td class="border border-slate-300"><a href=""> <img height="40%" width="60%" src="{{ $images_upload[2]['path'] ? asset('storage/images/'.$images_upload[2]['path']) : null}}" class="mx-auto" alt=""></a></td>
                                        <td class="border border-slate-300"><a href=""> <img height="40%" width="60%" src="{{ $images_upload[3]['path'] ? asset('storage/images/'.$images_upload[3]['path']) : null}}" class="mx-auto" alt=""></a></td>
                                        <td class="border border-slate-300"><a href=""> <img height="40%" width="60%" src="{{ $images_upload[4]['path'] ? asset('storage/images/'.$images_upload[4]['path']) : null}}" class="mx-auto" alt=""></a></td>
                                </table>
                            </td>
                            <td class="border-4 border-slate-300  p-5">
                                <table  >
                                    <tr>
                                        {{-- <textarea name="test_area" id="text_area" cols="50" rows="10">
                                        </textarea> --}}
                                        
                                       <td class="border-2 border-slate-400 w-80 h-80">
                                        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-sm text-gray-700 uppercase  dark:text-gray-400">
                                                <tr>
                                                    <th>Drug</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                       </td>

                                    <tr>
                                        <td>
                                            <div>
                                                <div class="flex justify-end p-2">
                                                    <label for="drug" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">DRUG</label>
                                                    <input type="text" id="drug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Drug" required>
                                                </div>
                                            </div>
                                            <div >
                                                <div class="flex justify-end p-2">
                                                    <label for="quantity" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">QUANTITY</label>
                                                    <input type="text" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Quantity" required>
                                                </div>
                                            </div>
                                            <div class="flex justify-end p-2">
                                                <button onclick="load_table()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">ADD</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                           <td colspan="2" class="border-4 border-slate-300 px-2 py-4">
                                <div class="flex justify-end mx-5">
                                    <button class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SEND QUOTATION</button>
                                </div>
                           </td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
            <table id="table">

            </table>
        </div>
        <script>
            function table_header()
            {
            var table = document.getElementById("table");
            var header = table.createTHead();
            var row = header.insertRow(0);
            var column = row.insertCell(0);
            var column1 = row.insertCell(1);
            var column2 = row.insertCell(2);

            column.innerHTML ="<b> Drug </b>";
            column1.innerHTML ="<b> Quantity </b>";
            column2.innerHTML ="<b> Amount </b>";

            }

            function load_table()
            {
                var drug = $('#drug').val();
                var quantity = $('#quantity').val();
                var amount = drug * quantity;


                if(drug != '' && quantity != '')
                {
                    $('#table tbody').append("<tr><td>" +drug+"<td><td>"+quantity+"<td><td>"+amount+"<td><tr>");
                }else{
                    alert("Enter drug and quantity values");
                }

            }
        </script>
    </div>
</x-app-layout>
