@extends('welcome')

@section('title', 'Риэлторы')

@section('content')
<div style="min-height: 100%; display: flex; flex-direction: column;">
    <div style="margin: 20px; flex: 1 1 auto;">
        <form method="POST" action="{{ route('admin_realtors_add') }}">
            @csrf
            <div class="card">
                <p class="text-2xl font-bold mb-4">Добавить риэлтора</p>
                <div class="group grid grid-cols-3 gap-4 grid-rows-2">
                    <div>
                        <label for="last_name" class="tailwind_input_label">Фамилия</label>
                        <input class="tailwind_input" required name="last_name" type="text" value="{{ old('last_name') }}">
                    </div>
                    <div>
                        <label for="first_name" class="tailwind_input_label">Имя</label>
                        <input class="tailwind_input" required name="first_name" type="text" value="{{ old('first_name') }}">
                    </div>
                    <div>
                        <label for="middle_name" class="tailwind_input_label">Отчество</label>
                        <input class="tailwind_input" required name="middle_name" type="text" value="{{ old('middle_name') }}">
                    </div>
                    <div>
                        <label for="deal_share" class="tailwind_input_label">Доля от комиссии</label>
                        <input class="tailwind_input" name="deal_share" type="number" min="0" max="100" value="{{ old('deal_share') }}">
                    </div>
                    <div>
                        <label class="tailwind_input_label" for="login">Логин</label>
                        <input class="tailwind_input" name="login" type="text" value="{{ old('login') }}">
                    </div>
                    <div>
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
            <p class="text-2xl font-bold mb-4">Список риэлторов</p>
            <div class="bg-white">

                <table class="table-auto min-w-full text-center">
                    <thead class="bg-blue-400">
                    <tr>
                        <th class="p-2">Фамилия</th>
                        <th class="p-2">Имя</th>
                        <th class="p-2">Отчество</th>
                        <th class="p-2">Доля от комиссии
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                <tbody>
                @foreach($agents as $agent)
                    <tr class="border-b">
                        <td class="p-4">{{ $agent->person->last_name }}</td>
                        <td class="p-4">{{ $agent->person->first_name }}</td>
                        <td class="p-4">{{ $agent->person->middle_name }}</td>
                        <td class="p-4">{{ $agent->deal_share." %" }}</td>
                        <td class="p-4"><a class="text-green-500" href="{{ route('admin_realtor_view', ['id' => $agent->id]) }}">Подробнее</td>
                        <td class="p-4"><a class="text-blue-500" href="{{ route('admin_realtors_change', ['id' => $agent->id]) }}">Изменить</a></td>
                        <td class="p-4"><a class="text-red-500" href="{{ route('admin_realtors_delete', ['id' => $agent->id]) }}">Удалить</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{ $agents->links() }}
    </div>
</div>
@endsection
