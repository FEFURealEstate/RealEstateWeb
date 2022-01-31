@extends('welcome')

@section('title', 'Потребности клиентов')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Открытые потребности</p>
            @if ($req_open->isEmpty())
                <p class="text-xl mb-4">Отсутствуют открытые потребности</p>
            @else
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">ID покупателя</th>
                            <th class="p-2">ID заявки</th>
                            <th class="p-2"><span class="sr-only">Открыть потребность</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($req_open as $req)
                            <tr class="border-b">
                                <td class="p-4">{{ $req->address_street.", ".$req->address_house }}</td>
                                <td class="p-4">{{ $req->client_id }}</td>
                                <td class="p-4">{{ $req->id }}</td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('cur_req', ['req_id' => $req->id]) }}"> Открыть потребность</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div class="card">
            <p class="text-2xl font-bold mb-4">Закрытые потребности</p>
            @if ($req_close->isEmpty())
                <p class="text-xl mb-4">Отсутствуют закрытые потребности</p>
            @else
                <div class="bg-white">
                    <thead class="table-auto min-w-full text-center">
                        <thead>
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">ID покупателя</th>
                            <th class="p-2">ID заявки</th>
                            <th class="p-2"><span class="sr-only">Открыть потребность</span></th>
                        </tr>
                        <tbody>
                        @foreach ($req_open as $req)
                            <tr>
                                <td class="p-4">{{ $req->address_street.", ".$req->address_house }}</td>
                                <td class="p-4">{{ $req->client_id }}</td>
                                <td class="p-4">{{ $req->id }}</td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('cur_req', ['req_id' => $req->id]) }}"> Открыть потребность</a>
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
