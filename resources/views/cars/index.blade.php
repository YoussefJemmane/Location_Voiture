@extends('welcome')

@section('content')
    <section class="bg-white dark:bg-gray-900 h-[897px]">

        <div class="pt-6">
            <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">
                <div class="w-11/12 sm:w-2/3 mx-auto mb-10">
                    <h1
                        class="focus:outline-none xl:text-4xl text-3xl flex align-middle justify-center text-gray-800 font-extrabold   p-5">
                        List of Cars</h1>
                </div>
            </div>
        </div>
        @if (Auth::check() && Auth::user()->roles === 1)
            <div class="p-3 float-right">
                <a href="{{ route('vehicules.create') }}" class="bg-cyan-500 rounded-md px-3 py-2 text-black">Add Car</a>
            </div>
        @endif

        <div class="grid lg:grid-cols-4">
            @foreach ($vehicules as $vehicule)
                <div class="pl-4 ">
                    <a href="{{route('reserver.index',$vehicule->id)}}">
                       <div class="card w-96 bg-base-100 shadow-xl " data-theme="night">
                        <figure><img src="{{ Storage::url($vehicule->photo) }}" alt="Cars" /></figure>
                        <div class="card-body ">
                            <h2 class="card-title pb-3">
                                Modele : {{ $vehicule->models->nomModele  }}

                            </h2>

                            @if ($vehicule->disponible == 0 && $vehicule->reservations->last()->dateFin > \Carbon\Carbon::now())
                                <p>Disponibilié : It's not Disponible</p>
                            @else
                                <p>Disponibilié : It's Disponible</p>
                            @endif
                            <div class="card-actions justify-end py-3">
                                <span class="badge badge-outline ">{{ $vehicule->colors->color }}</span>

                            </div>
                            @if (Auth::check() && Auth::user()->roles === 1)
                            <div class="card-actions justify-end ">
                                <form action="{{ route('vehicules.destroy',$vehicule->id) }}" method="get">
                                    @csrf
                                    <a href="{{ route('vehicules.edit',$vehicule->id) }}" class="btn bg-cyan-300 text-black btn-sm">Edit</a>
                                    <button class="btn btn-error btn-sm">Delete</a>
                                </form>
                            </div>
                            @endif
                        </div>

                    </div>
                    </a>

                </div>
            @endforeach
        </div>


    </section>
@endsection
