@php
use App\Models\images_upload;

$last_upload = images_upload::findlastUpload();

@endphp
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}



    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <!-- Heading -->
                    <h2 class="font-semibold text-xl text-gray-800 text-center my-6 font-serif">
                        {{ __(strtoupper('Prescription Upload')) }}
                    </h2>
                    <form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Images -->
                        <div class="py-4">
                            <x-input-label for="images" :value="__(strtoupper('Images'))" />
                            <x-text-input id="images" onclick="checkAvailable(<?php echo $last_upload; ?>)" class="block mt-1 w-full images" type="file" name="images[]" :value="old('images')" required autofocus autocomplete="images" multiple/>
                            <x-input-error :messages="$errors->get('images')" class="mt-2" />
                        </div>
                
                        <!--Note -->
                        <div class="py-4">
                            <x-input-label for="note" :value="__(strtoupper('Note'))" />
                            <x-text-area id="note" class="block mt-1 w-full" type="text" name="note" :value="old('note')" required autocomplete="note" />
                            <x-input-error :messages="$errors->get('note')" class="mt-2" />
                        </div>
                
                        <!-- Delivery Address -->
                        <div class="py-4">
                            <x-input-label for="delivery_address" :value="__(strtoupper('Delivery Address'))" />
                            <x-text-input id="delivery_address" class="block mt-1 w-full" type="text" name="delivery_address" :value="old('delivery_address')" required autocomplete="delivery_address" />
                            <x-input-error :messages="$errors->get('delivery_address')" class="mt-2" />
                        </div>
                
                         <!-- Delivery Time -->
                         <div class="py-4">
                            <x-input-label for="delivery_time" :value="__(strtoupper('Delivery Time'))" />
                            <x-text-input id="delivery_time" class="block mt-1 w-full" type="time" name="delivery_time" :value="old('delivery_time')" required autocomplete="delivery_time" />
                            <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __(strtoupper('Upload')) }}
                            </x-primary-button>
                            <x-danger-button class="ml-4">
                                {{ __(strtoupper('Reset')) }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module">
        $(document).ready(function(){
            $('#images').change(function(){
                var limit = 5;
                console.log(limit);
                var files = $(this)[0].files;
                if(files.length > limit){
                    alert("Image count can't exceed " +limit+ " amount")
                    $('#images').val('');
                    return false;
                }else{
                    return true;
                }

            });
        });
        </script>
        <script>
            function checkAvailable(val)
                {
                    if(val == null)
                    {
                        alert('Try after 2 hours from your last upload');

                        // const element = document.getElementById("images");
                        // element.addEventListener('click', event => event.preventDefault());
                        $(document).on('click', '#images', function(event) {
                            event.preventDefault();
                            event.stopImmediatePropagation();
                        });
                    }
                }
        </script>
</x-app-layout>
