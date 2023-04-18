@extends('welcome')

@section('content')
    @if (Auth::check() && Auth::user()->roles === 1)
        <section class="bg-white dark:bg-gray-900 h-[81.25rem] ">

            <div class="pt-6">
                <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">

                </div>
            </div>
            <div class="p-3 float-right">
                <a href="{{ route('vehicules.index') }}" class="bg-cyan-500 rounded-md px-3 py-2 ">Go Back</a>
            </div>
            <div class="flex justify-center ">
                <div class="  ">


                    <div class="pr-6 lg:pt-0 md:pt-5 ">

                        <div
                            class=" max-w-sm p-10 first-letter bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <form class="space-y-6 " action="{{ route('vehicules.update',$vehicule->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Car</h5>
                                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edit Model</h5>
                                <div>
                                    <label for="marque"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marque</label>
                                        <select id="marque"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="marque_id" value="{{ $vehicule->marque_id }}">
                                        <option selected>Choose a Marque</option>
                                        @foreach ($marques as $marque)
                                            <option value="{{ $marque->id }}" @if ($marque->id == $vehicule->marque_id) selected @endif>{{ $marque->nomMarque }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <label for="nom"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modele</label>
                                        <select id="modeles"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="modele_id">

                                        </select>
                                </div>
                                <div>
                                    <label for="prixJour"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix Par
                                        Jour</label>
                                    <input type="text" name="prixJour" value="{{ $vehicule->prixJour }}" id="prixJour" placeholder="120"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required >
                                </div>

                                <div>
                                    <label for="couleur"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Couleur</label>

                                    <select id="modele"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="color_id">
                                        <option selected>Choose a Color</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" @if ($color->id == $vehicule->color_id) selected @endif>{{ $color->color }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div>
                                    <label for="disponiblite"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponible</label>

                                    <div class="flex items-center mb-4">
                                        <input id="disponible" type="radio"  value="1" name="disponible"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if ($vehicule->disponible == 1) checked @endif>
                                        <label for="disponible"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Disponible</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="undisponible"  type="radio" value="0" name="disponible"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if ($vehicule->disponible == 0) checked @endif>
                                        <label for="undisponible"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Undisponible</label>
                                    </div>
                                </div>
                                <div>

                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="photo">Upload Photo</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="photo" type="file" name="photo">

                                </div>

                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>

                            </form>
                        </div>

                    </div>




                </div>
            </div>


        </section>
    @else
        <div class="pt-6">
            <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">
                <div class="w-11/12 sm:w-2/3 mx-auto mb-10">
                    <h1
                        class="focus:outline-none xl:text-4xl text-3xl flex align-middle justify-center text-red-800 font-extrabold   p-5">
                        Error 404 : Not Authorized</h1>
                </div>
            </div>
        </div>
    @endif

@endsection
<script src="{{asset('/jquery.min.js')}}">

    </script>
<script>
    $(document).ready(function() {
    var marqueID = $('#marque').val();
    var modeleID = {{ $vehicule->modele_id ?? 'null' }};

    // populate the modeles dropdown when marque is selected
    $('#marque').on('change', function() {
        marqueID = $(this).val();
        if (marqueID) {
            $.ajax({
                url: '/getModele/' + marqueID,
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#modeles').empty();
                        $('#modeles').append('<option hidden>Choose Modele</option>');
                        $.each(data, function(key, modele) {
                            $('select[name="modele_id"]').append(
                                '<option value="' + modele.id + '">' + modele.nomModele + '</option>');
                        });
                    } else {
                        $('#modeles').empty();
                    }
                    if (modeleID) {
                        $('select[name="modele_id"]').val(modeleID);
                    }
                }
            });
        } else {
            $('#modeles').empty();
        }
    });

    // set the selected option for marque and modeles dropdowns on edit
    if (marqueID) {
        $('select[name="marque_id"]').val(marqueID);
        $('#marque').trigger('change');
    }
    if (modeleID) {
        $('select[name="modele_id"]').val(modeleID);
    }
});

</script>
