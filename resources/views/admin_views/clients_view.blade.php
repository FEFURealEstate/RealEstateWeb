@extends('welcome')

@section('title', 'Клиенты')

@section('content')
    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div style="margin: 20px; flex: 1 1 auto;">
            <form method="POST" action="{{ route('admin_clients_add') }}">
                @csrf
                <div class="card">
                    <p class="text-2xl font-bold mb-4">Добавить клиента</p>
                    <div class="group grid grid-cols-3 gap-4 grid-rows-3">
                        <div>
                            <label for="last_name" class="tailwind_input_label">Фамилия</label>
                            <input class="tailwind_input" name="last_name" type="text" value="{{ old('last_name') }}">
                        </div>
                        <div>
                            <label for="first_name" class="tailwind_input_label">Имя</label>
                            <input class="tailwind_input" name="first_name" type="text" value="{{ old('first_name') }}">
                        </div>
                        <div>
                            <label for="middle_name" class="tailwind_input_label">Отчество</label>
                            <input class="tailwind_input" name="middle_name" type="text"
                                   value="{{ old('middle_name') }}">
                        </div>
                        <div class="row-start-2 col-start-1">
                            <label for="phone" class="tailwind_input_label">Номер телефона</label>
                            <input class="tailwind_input" name="phone" type="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="row-start-2 col-start-2">
                            <label for="email" class="tailwind_input_label">Электронная почта</label>
                            <input class="tailwind_input" name="email" type="email" value="{{ old('email') }}">
                        </div>
                        <div class="row-start-3">
                            <label class="tailwind_input_label" for="login">Логин</label>
                            <input class="tailwind_input" name="login" type="text" value="{{ old('login') }}">
                        </div>
                        <div class="row-start-3">
                            <label for="password" class="tailwind_input_label">Пароль</label>
                            <input class="tailwind_input" name="password" type="password" value="">
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="m-2">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif
                    <button type="submit" class="primary_button mt-2">Добавить</button>
                </div>
            </form>
            <div class="card">
                <p class="text-2xl font-bold mb-4">Список клиентов</p>
                <div class="bg-white">

                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Фамилия</th>
                            <th class="p-2">Имя</th>
                            <th class="p-2">Отчество</th>
                            <th class="p-2">Телефон</th>
                            <th class="p-2">Электронная почта</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr class="border-b">
                                <td class="p-4">{{ $client->person->last_name }}</td>
                                <td class="p-4">{{ $client->person->first_name }}</td>
                                <td class="p-4">{{ $client->person->middle_name }}</td>
                                <td class="p-4">{{ $client->phone }}</td>
                                <td class="p-4">{{ $client->email }}</td>
                                <td class="p-4"><a class="text-green-500" href="{{ route('admin_client_view', ['id' => $client->id]) }}">Подробнее</a></td>
                                <td class="p-4"><a class="text-blue-500" href="{{ route('admin_clients_change', ['id' => $client->id]) }}">Изменить</a></td>
                                <td class="p-4"><a class="text-red-500" href="{{ route('admin_clients_delete', ['id' => $client->id]) }}">Удалить</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $clients->links() }}
            </div>
        </div>
    </div>
@endsection
