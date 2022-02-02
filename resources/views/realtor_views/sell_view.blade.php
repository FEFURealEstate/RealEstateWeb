@extends('welcome')

@section('title', 'Предложения клиентов')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Открытые предложения</p>
            @if ($sells_open->isEmpty())
                <p class="text-xl mb-4">Отсутствуют открытые предложения</p>
            @else
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Цена</th>
                            <th class="p-2">ID продавца</th>
                            <th class="p-2">ID заявки</th>
                            <th class="p-2"><span class="sr-only">Открыть предложение</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sells_open as $sell)
                            <tr class="border-b">
                                <td class="p-4">{{ $sell->price." ₽" }}</td>
                                <td class="p-4">{{ $sell->client_id }}</td>
                                <td class="p-4">{{ $sell->real_estate_id }}</td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('cur_sell', ['sell_id' => $sell->id]) }}"> Открыть предложение</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>

        <div class="card">
            <p class="text-2xl font-bold mb-4">Закрытые предложения</p>
            @if ($sells_close->isEmpty())
                <p class="text-xl mb-4">Отсутствуют закрытые предложения</p>
            @else
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead>
                        <tr>
                            <th class="p-2">Цена</th>
                            <th class="p-2">ID продавца</th>
                            <th class="p-2">ID заявки</th>
                            <th class="p-2"><span class="sr-only">Открыть предложение</span></th>
                        </tr>
                        <tbody>
                        @foreach($sells_close as $sell)
                            <tr>
                                <td class="p-4">{{ $sell->id }}</td>
                                <td class="p-4">{{ $sell->client_id }}</td>
                                <td class="p-4">{{ $sell->price }}</td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('cur_sell', ['sell_id' => $sell->id]) }}">Открыть предложение</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
