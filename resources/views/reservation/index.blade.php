@extends('welcome')
@section('content')
    <section class="bg-white dark:bg-gray-900 h-[897px]">
        {{-- this page will show all the reservation this page only the admin who can access it --}}
        <div class="pt-6">
            <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">
                <div class="w-11/12 sm:w-2/3 mx-auto mb-10">
                    <h1
                        class="focus:outline-none xl:text-4xl text-3xl flex align-middle justify-center text-gray-800 font-extrabold   p-5">
                        List of Reservation</h1>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="overflow-x-auto w-[1600px]">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Car</th>
                            <th>Reservation</th>
                            <th>Person Reserver</th>
                            <th>PrixTTC</th>
                            <th>status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-20 h-20">
                                                <img src="{{ Storage::url($reservation->vehicule->photo) }}"
                                                    alt="car" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $reservation->vehicule->models->nomModele }}</div>
                                            <div class="text-sm opacity-50">
                                                {{ $reservation->vehicule->marques->nomMarque }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{-- show the datedebut and fin of each vehicule --}}
                                    <div class="font-bold">Reserver</div>

                                    <br />
                                    <span class="badge badge-ghost badge-lg">{{ $reservation->dateDebut }} -
                                        {{ $reservation->dateFin }}</span>
                                </td>
                                <td>
                                    @if ($reservation->status == 'pending')

                                        <form action="{{ route('reservation.confirm', $reservation->id) }}" method="post"
                                            class="pb-3">
                                            @csrf
                                            <button class="btn btn-primary">Confirm</button>
                                        </form>
                                        <form action="{{ route('reservation.noconfirm', $reservation->id) }}"
                                            method="post">
                                            @csrf
                                            <button class="btn btn-primary">No Confirm</button>
                                        </form>
                                    @else
                                        <div class="font-bold">{{ $reservation->users->name }}</div>
                                </td>
                                <td>
                                    <div class="font-bold">{{ $reservation->prixTTC }}</div>
                                </td>
                        @endif
                        <td>{{ $reservation->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
