@extends('welcome')

@section('title', 'Потребности')

@section('content')
    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div class="p-4">
            <div class="card">
                <p class="text-2xl font-bold mb-4">Потребности без риэлтора</p>
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">ID потребности</th>
                            <th class="p-2">ID клиента</th>
                            <th class="p-2"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($req as $re)
                            <tr class="border-b">
                                <td class="p-4">{{ $re->id }}</td>
                                <td class="p-4">{{ $re->client_id}}</td>
                                <td class="p-4"><a class="text-blue-500" href="{{ route('admin_needs_view', ['req_id' => $re->id])}}">Назначить
                                        риэлтора</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
