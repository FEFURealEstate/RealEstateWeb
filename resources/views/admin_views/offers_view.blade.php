@extends('welcome')

@section('title', 'Предложения')

@section('content')
    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div class="p-4">
            <div class="card">
                <p class="text-2xl font-bold mb-4">Предложения без риэлтора</p>
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">ID предложения</th>
                            <th class="p-2">ID клиента</th>
                            <th class="p-2">Цена</th>
                            <th class="p-2"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sells as $sell)
                            <tr class="border-b">
                                <td class="p-4">{{ $sell->id }}</td>
                                <td class="p-4">{{ $sell->client_id}}</td>
                                <td class="p-4">{{ $sell->price." ₽" }}</td>
                                <td class="p-4">
                                    <a class="text-blue-500" href="{{ route('admin_offers_view', ['sell_id' => $sell->id])}}">Назначить
                                        риэлтора</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
