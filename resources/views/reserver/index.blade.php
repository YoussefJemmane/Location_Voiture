@extends('welcome')
@section('content')
    <section class="bg-white dark:bg-gray-900 h-[897px]">
        <div class="pt-6">
            <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">
                <div class="w-11/12 sm:w-2/3 mx-auto mb-10">
                    <h1
                        class="focus:outline-none xl:text-4xl text-3xl flex align-middle justify-center text-gray-800 font-extrabold   p-5">
                        Reserver {{ $vehicule->models->nomModele }}</h1>
                </div>
            </div>
        </div>
        <div>
            <div class="flex justify-center">
                <div class="card w-[800px] bg-base-100 shadow-xl">
                    <figure><img src="{{ Storage::url($vehicule->photo) }}" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $vehicule->models->nomModele }} By {{ $vehicule->marques->nomMarque }}
                        </h2>
                        <div class="card-actions justify-end py-3">
                            @if ($vehicule->disponible == 0 && $vehicule->reservations->last()->dateFin > \Carbon\Carbon::now())
                                <span class="badge badge-outline ">It's not Disponible</span>
                            @else
                                <span class="badge badge-outline ">It's Disponible</span>
                            @endif
                        </div>
                        @if (auth()->check())
                            @if ($vehicule->disponible == 0 && $vehicule->reservations->last()->dateFin > \Carbon\Carbon::now())
                            <p  class="btn btn-primary">Wait until {{ $vehicule->reservations->last()->dateFin }}</p>
                            @else
                                <a href="{{ route('reserver.create', $vehicule->id) }}" class="btn btn-primary">Reserver</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Reserve</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
