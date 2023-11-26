<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <form action="{{ route('prescriptions.store') }}" method="POST">
        <div class="py-6 flex">
            @csrf
            <div class="sm:px-6 lg:px-8" style="width: 40%;">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="field" align="left">
                        <h3 class="mx-6 mt-4">Upload your images</h3>
                        <input class="mx-6 mt-4 mb-6" type="file" id="files" name="files[]" multiple />
                    </div>
                </div>
            </div>
            <div class="sm:px-6 lg:px-12" style="width: 60%;">
                <div style="display:flex">
                    <!-- Adress -->
                    <div style="width: 50%;">
                        <x-input-label for="delivery_address" :value="__('Delivery Address')" />
                        <x-text-input id="delivery_address" class="block mt-1 w-full" type="text" name="delivery_address" :value="old('delivery_address')" required autofocus autocomplete="delivery_address" />
                        <x-input-error :messages="$errors->get('delivery_address')" class="mt-2" />
                    </div>

                    <!-- Date and Time -->
                    <div style="margin-left: 30px;width: 50%;">
                        <x-input-label for="delivery_time" :value="__('Delivery Time')" />
                        <x-text-input id="delivery_time" class="block mt-1 w-full" type="datetime-local" name="delivery_time" :value="old('delivery_time')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('delivery_time')" class="mt-2" />
                    </div>
                </div>

                <div style="display:flex" class="mt-4">
                    <!-- Note -->
                    <div style="width: 100%;">
                        <x-input-label for="note" :value="__('Note')" />
                        <x-text-input id="note" class="block mt-1 w-full" type="text" name="note" :value="old('note')" required autofocus autocomplete="note" />
                        <x-input-error :messages="$errors->get('note')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </form>


    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });

                            // Old code here
                            /*$("<img></img>", {
                              class: "imageThumb",
                              src: e.target.result,
                              title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

                        });
                        fileReader.readAsDataURL(f);
                    }
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>


</x-app-layout>