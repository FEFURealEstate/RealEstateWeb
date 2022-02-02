@extends('welcome')

@section('title', 'Мои потребности')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Открытые заявки на покупку</p>
            @if ($req_open->isEmpty())
                <p class="text-xl mb-4">Отсутствуют открытые заявки</p>
            @else
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">ID заявки</th>
                            <th class="p-2">ID клиента</th>
                            <th class="p-2">ID риэлтора</th>
                            <th class="p-2"><span class="sr-only">Открыть предложение</span></th>
                            <th class="p-2"><span class="sr-only">Удалить заявку</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($req_open as $req)
                            <tr class="border-b">
                                <td class="p-4">{{ $req->address_street.", ".$req->address_house }}</td>
                                <td class="p-4">{{ $req->id }}</td>
                                <td class="p-4">{{ $req->client_id }}</td>
                                <td class="p-4">
                                    @if($req->agent_id == null)
                                        Риэлтор не назначен
                                    @else
                                        {{ $req->agent_id }}
                                    @endif
                                </td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('my_req_info', ['req_id' => $req->id]) }}">Открыть</a>
                                </td>
                                <td class="p-4">
                                    <form action="{{ route('delete_req', ['req_id' => $req->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="font-bold text-red-500"
                                                @if($req->agent_id != null) disabled @endif> Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card">
            <p class="text-2xl font-bold mb-4">Закрытые заявки на покупку</p>
            @if ($req_close->isEmpty())
                <p class="text-xl mb-4">Отсутствуют закрытые заявки</p>
            @else
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead>
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">ID предложения</th>
                            <th class="p-2">ID продавца</th>
                            <th class="p-2">ID риэлтора</th>
                            <th class="p-2"><span class="sr-only">Открыть предложение</span></th>
                        </tr>
                        <tbody>
                        @foreach($req_close as $req)
                            <tr>
                                <td class="p-4">{{ $req->address_street.", ".$req->address_house }}</td>
                                <td class="p-4">{{ $req->id }}</td>
                                <td class="p-4">{{ $req->client_id }}</td>
                                <td class="p-4">
                                    @if($req->agent_id == null)
                                        Риэлтор не назначен
                                    @else
                                        {{ $req->agent_id }}
                                    @endif
                                </td>
                                <td class="p-4">
                                    <a class="font-bold text-green-500"
                                       href="{{ route('my_req_info', ['req_id' => $req->id]) }}">Открыть</a>
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
