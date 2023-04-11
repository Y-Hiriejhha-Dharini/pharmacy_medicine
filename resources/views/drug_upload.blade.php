<x-app-layout>
    <div>
        <div class="py-12">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-gray-900">
                        <!-- Heading -->
                        <h2 class="font-semibold text-xl text-gray-800 text-center my-6 font-serif">
                            {{ __(strtoupper('Prescription Upload')) }}
                        </h2>
                        <form action="{{url('csv_upload')}}" method="POST" enctype="multipart/form-data" onsubmit="check_file_availability()">
                            @csrf
                            <div class="py-4">
                                <x-input-label for="drugs" :value="__(strtoupper('drugs upload'))" />
                                <x-text-input id="drugs" class="block mt-1 w-full images" type="file" name="drugs" :value="old('drugs')" autofocus autocomplete="drugs"/>
                                <x-input-error :messages="$errors->get('drugs')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <div class="form-group">
                                    <a class="btn btn-info" href="{{ route('csv_download') }}">Download File</a>
                                </div> 
                                <x-primary-button class="ml-4" onclick="check_file_availability()">
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
        <script>
            function check_file_availability()
            {
                if($('#drugs').val() == '')
                {
                    Swal.fire({
                        title:'Error',
                        text:'Please upload a drug file',
                        icon:'error',
                        buttons: {
                            cancel:{
                                text: 'OK',
                                btnClass: 'btn-red',
                                action: function()
                                {
                                    // location.reload();
                                    event.preventDefault();
                                }
                            }
                        }
                    });
                    return false;
                }
            }
        </script>
    </div>
</x-app-layout>