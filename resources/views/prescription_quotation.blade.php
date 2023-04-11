@php
    use App\Models\Drugs;

    $drug_names = Drugs::drug_names();
@endphp
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
                                            <table id="table" class="text-sm text-left text-gray-500 dark:text-gray-400 ml-10">
                                                {{-- <form action="{{url('prescription_upload')}}" method="POST" onsubmit="form_submit()"> --}}
                                                    {{-- @csrf --}}
                                                    <input type="hidden" id="images_id" name="images_id" value="{{$images_upload[0]['images_id']}}">
                                                <thead class="text-sm text-gray-700 uppercase  dark:text-gray-400">
                                                    <tr>
                                                        <th class="pr-2 pl-4">Drug</th>
                                                        <th class="px-3">Quantity</th>
                                                        <th class="px-3">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="pt-5 pl-20">Total</td>
                                                        <td class="pt-5"><input type="text" name="total" id="total" class="outline-none border-none"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                           </td>
    
                                        <tr>
                                            <td>
                                                <div>
                                                    <div class="flex justify-end p-2">
                                                        <label for="drug" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">DRUG</label>
                                                        <select name="drug" id="drug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Drug" required>
                                                                    <option value="">Select a Drug</option>
                                                                @foreach ($drug_names as $key => $drug_name)
                                                                    <option data-value="{{$drug_name['drug_name']}}" data-id="{{$drug_name['id']}}" value="{{$drug_name['drug_price']}}">{{$drug_name['drug_name']}}</option>
                                                                @endforeach
                                                        </select>
                                                        {{-- <input type="text" name="drug" list="drug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Drug" required>
                                                            <datalist id="drug">
                                                                @foreach ($drug_names as $key => $drug_name)
                                                                    <option value="{{$drug_name['drug_price']}}">{{$drug_name['drug_name']}}</option>
                                                                @endforeach
                                                            </datalist> --}}
                                                    </div>
                                                </div>
                                                <div >
                                                    <div class="flex justify-end p-2">
                                                        <label for="quantity" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">QUANTITY</label>
                                                        <input type="number" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Quantity" required>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end p-2">
                                                    <a onclick="load_table()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-center">ADD</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                               <td colspan="2" class="border-4 border-slate-300 px-2 py-4">
                                    <div class="flex justify-end mx-5">
                                        <input type="hidden" id="count" name="count">
                                        <button class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="form_submit()">SEND QUOTATION</button>
                                    </div>
                               </td>
                            </tr>
                        </table>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            <table id="table">

            </table>
        </div>
        <script>
            function form_validate()
            {
                valid = true;

                    if($('#drug_name_'+1) == ' ')
                    {
                        valid = false;
                    }

                return valid;
            }
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

            var val = 0;
            var count = 1;

            function load_table()
            {
                var drug = $('#drug').val();
                var drug_id = $('select#drug').find(':selected').data('id');
                var drug_name = $('select#drug').find(':selected').data('value');
                var quantity = $('#quantity').val();
                var amount = drug * quantity;

                if(drug != '' && quantity != '')
                {

                    $('#table tbody').append('<tr><td><input type="hidden" id="drug_id_'+count+'" value="'+drug_id+'"><input type="text" id="drug_name_'+count+'" name="'+drug_name[count]+'" value="'+drug_name+'" class="outline-none border-none"></td><td><input type="text" id="quantity_'+count+'" name="'+quantity[count]+'" value="'+quantity+'" class="outline-none border-none"></td><td><input type="text" id="amount_'+count+'" name="amount_'+count+'" value="'+amount+'" class="outline-none border-none w-24"></td></tr>');

                    val += amount;
                    $('#total').val(val);
                    $('#drug_name_'+count).val(drug_name);
                    $('#quantity_'+count).val(quantity);
                    $('#amount_'+count).val(amount);
                    console.log($('#drug_name_'+count).val());

                    $('#count').val(count);

                    count++;

                }else{
                    alert("Enter drug and quantity values");
                }

            }

            function form_submit()
            {
                var count = $('#count').val();

                for(var i =1; i<=count; i++)
                {
                    if(form_validate())
                    {
                        console.log($('#quantity_'+i).val());
                        $.ajax({
                            type : "GET",
                            url : "{{url('prescription_upload')}}",
                            data : {
                                '_token' : '{{csrf_token()}}',
                                'prescritpion_id' : $('#images_id').val(),
                                'drug_id' : $('#drug_id_'+i).val(),
                                'drug_qty' : $('#quantity_'+i).val(),
                                'amount' : $('#amount_'+i).val(),
                                'total' : $('#total').val(),
                            }
                        });
                    }else{
                        alert('No data to save');
                    }
                }
            }
            // function find_drug()
            // {
            //     $.ajax({
            //         type: "GET",
            //         url: "{{url('drug_search')}}",
            //         data:{
            //             "_token" : "{{csrf_token()}}",
            //             "drug" : $('#drug').val()
            //         },
            //         success: function(data)
            //         {
            //             console.log(data);
            //             $('#drug').append("<option>"+data['drug_name']+"</option>");
            //         }
            //     });
            // }

        </script>
    </div>
</x-app-layout>
