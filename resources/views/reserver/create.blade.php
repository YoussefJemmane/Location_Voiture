@extends('welcome')

@section('content')
    @if (Auth::check())
        <section class="bg-white dark:bg-gray-900 h-[81.25rem] ">

            <div class="pt-6">
                <div class="sm:max-w-5xl rounded-xl bg-white mx-4 sm:mx-8 md:mx-auto">
                </div>
            </div>
            <div class="px-12 float-right">
                <a href="{{ route('reserver.index',$vehicule->id) }}" class="bg-cyan-500 rounded-md px-3 py-2 ">Go Back</a>
            </div>
            <div class="  flex justify-center">
                <div class="  ">
                    <div class="pr-6 lg:pt-0 md:pt-5 ">
                        <div
                            class="max-w-sm p-10 first-letter bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <form class="space-y-6 " action="{{ route('reserver.store',$vehicule->id) }}" method="post"
                                ">
                                @csrf
                                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Reserver Car</h5>

                                <div class="space-y-1">
                                    <label class="block text-sm text-gray-700 dark:text-gray-400" for="dateDebut">Date
                                        Debut</label>
                                    <input type="date" name="dateDebut" id="dateDebut"
                                        class="block w-full px-3 py-2 text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:text-gray-300 dark:placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-400 dark:focus:border-blue-400"
                                        placeholder="Date Debut" />
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-sm text-gray-700 dark:text-gray-400" for="dateFin">Date
                                        Fin</label>
                                    <input type="date" name="dateFin" id="dateFin"
                                        class="block w-full px-3 py-2 text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:text-gray-300 dark:placeholder-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-400 dark:focus:border-blue-400"
                                        placeholder="Date Fin" />
                                </div>


                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
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
                        Error 404 : Not Authorized 39ti biha 👏👏</h1>
                </div>
            </div>
        </div>
    @endif
@endsection
