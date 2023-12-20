@extends('dashboard.layouts.main')
@section('title', 'criteria')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Matriks Keputusan (F)</h6>
                    </div>

                    <div class="flex-auto px-4 pt-4 pb-2">
                        <div class="overflow-x-auto">
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Alternatif</th>
                                    @foreach ($criterias as $criteria)
                                        <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">{{ $criteria->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($alternatives as $alternative)
                                    <tr>
                                        <td class="px-6 py-2 font-medium text-left border-b">{{ $alternative->name }}</td>
                                        @foreach ($criterias as $criteria)
                                            <td class="px-6 py-2 text-left border-b">
                                                @foreach ($values as $value)
                                                    @if ($value->alternative_id == $alternative->id && $value->criteria_id == $criteria->id)
                                                        {{ $value->score }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Criteria</th>
                                    @foreach ($criterias as $criteria)
                                        <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">{{ $criteria->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-6 py-3 font-medium text-left border-b">Bobot</td>
                                    @foreach ($weights as $weight)
                                        <td class="px-6 py-3 text-left border-b">{{ $weight }}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Matriks Normalisasi (N)</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Alternatif</th>
                                    @foreach ($criterias as $criteria)
                                        <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">{{ $criteria->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($alternatives as $altKey => $alternative)
                                    <tr>
                                        <td class="px-6 py-3 font-medium text-left border-b">{{ $alternative->name }}</td>
                                        @foreach ($criterias as $critKey => $criteria)
                                            <td class="px-6 py-3 text-left border-b">{{ $normalizedMatrix[$alternative->id][$criteria->id] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Matrik Normalisasi Bobot (F*)</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <!-- Table 1: Criteria Weight -->
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Criteria</th>
                                    @foreach ($criterias as $criteria)
                                        <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">{{ $criteria->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="px-6 py-3 font-medium text-left border-b">Weight</td>
                                    @foreach ($weights as $weight)
                                        <td class="px-6 py-3 text-left border-b">{{ $weight }}</td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>

                            <!-- Table 2: Alternative Weighted Matrix -->
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Alternatif</th>
                                    @foreach ($criterias as $criteria)
                                        <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">{{ $criteria->name }}</th>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($alternatives as $altKey => $alternative)
                                    <tr>
                                        <td class="px-6 py-3 font-medium text-left border-b">{{ $alternative->name }}</td>
                                        @foreach ($criterias as $critKey => $criteria)
                                            <td class="px-6 py-3 text-left border-b">{{ $weightedMatrix[$alternative->id][$criteria->id] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Nilai Utility Measure S dan Regret Measure R</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">S</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Nilai</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">R</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Nilai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($s as $key => $value)
                                    <tr>
                                        <td class="px-6 py-3 text-start font-medium border-b">S{{ $key }}</td>
                                        <td class="px-6 py-3 text-start border-b">{{ $value }}</td>
                                        <td class="px-6 py-3 text-start font-medium border-b">R{{ $key }}</td>
                                        <td class="px-6 py-3 text-start border-b">{{ $r[$key] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Indeks Vikor</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Q</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Nilai</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($q as $key => $value)
                                    <tr>
                                        <td class="px-6 py-3 text-start font-medium border-b">Q{{ $key }}</td>
                                        <td class="px-6 py-3 text-start border-b">{{ $value }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="py-3 font-bold text-left uppercase border-b border-gray-200">Perangkingan</h6>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full mb-4 bg-white border border-gray-200 text-slate-500">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Rangking</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Kode Alternatif</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase border-b border-gray-200">Nilai Q</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($result as $key => $value)
                                    <tr>
                                        <td class="px-6 py-3 text-start font-medium border-b">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-3 text-start border-b">{{ $key }}</td>
                                        <td class="px-6 py-3 text-start border-b">{{ $value }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
