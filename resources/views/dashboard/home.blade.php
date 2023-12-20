@extends('dashboard.layouts.main')
@section('title', 'Home')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Sistem Pendukung Keputusan dengan:
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        Metode Vikor
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-700 to-blue-300">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Jumlah Criteria
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        @if ($countCriteria)
                                            {{-- Menampilkan data terakhir jika ada --}}
                                            {{ $countCriteria }}
                                        @else
                                            0
                                        @endif

                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-700 to-blue-300">
                                    <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card3 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-4 xl:w-1/3">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans font-semibold leading-normal text-sm">
                                        Jumlah Alternatif
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        @if ($countAlternative)
                                            {{-- Menampilkan data terakhir jika ada --}}
                                            {{ $countAlternative }}
                                        @else
                                            0
                                        @endif

                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-700 to-blue-300">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full px-3 mb-6 lg:mb-0 lg:w-full lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                                <div class="flex flex-col h-full">
                                    <p class="pt-2 mb-1 font-semibold">Penjelasan Metode</p>
                                    <h5 class="font-bold">Metode VIKOR</h5>
                                    <p class="mb-12">
                                        VIKOR (VIšekriterijumsko KOmpromisno Rangiranje dalam bahasa Serbia, yang
                                        artinya Perangkingan Kompromis MultiKriteria) adalah metode perankingan dengan
                                        menggunakan indeks peringkat multikriteria berdasarkan ukuran tertentu dari
                                        kedekatan dengan solusi yang ideal. Metode VIKOR merupakan salah satu metode
                                        yang dapat dikategorisasikan dalam Multi-Criteria Decision Analysis/MCDA
                                        (Opricovic 1998). Metode VIKOR dikembangkan sebagai metode Multi-Criteria
                                        Decision Making/MCDM untuk menyelesaikan pengambilan keputusan bersifat diskrit
                                        pada kriteria yang bertentangan dan non-commensurable(tidak ada cara yang tepat
                                        untuk menentukan mana yang lebih akurat) (Opricovic and Tzeng 2007).
                                    </p>
                                    <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500"
                                       href="https://extra.cahyadsn.com/vikor"
                                       target="_blank">
                                        Read More
                                        <i
                                            class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                                <div class="h-full bg-gradient-to-tl from-white-700 to-white-300 rounded-xl">
                                    <div class="relative flex items-center justify-center h-full">
                                        <img class="relative w-full pt-6"
                                             src="{{ asset('assets/img/illustrations/trufalse.jpg') }}" alt="rocket"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
