@extends('welcome')

@section('title', 'Редактирование клиента')

@section('content')
    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div class="p-4">
            <form method="POST" action="{{ route('admin_clients_change', ['id' => $client->id]) }}">
                @csrf
                <div class="card">
                    <p class="text-2xl font-bold mb-4">Изменить данные клиента</p>
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label for="last_name" class="tailwind_input_label">Фамилиля</label>
                            <input class="tailwind_input" name="last_name" type="text"
                                   value="{{ $client->person->last_name }}">
                        </div>
                        <div>
                            <label for="first_name" class="tailwind_input_label">Имя</label>
                            <input class="tailwind_input" name="first_name" type="text"
                                   value="{{ $client->person->first_name }}">
                        </div>
                        <div>
                            <label for="middle_name" class="tailwind_input_label">Отчество</label>
                            <input class="tailwind_input" name="middle_name" type="text"
                                   value="{{ $client->person->middle_name }}">
                        </div>
                        <div>
                            <label for="phone" class="tailwind_input_label">Номер телефона</label>
                            <input class="tailwind_input" name="phone" type="phone" value="{{ $client->phone }}">
                        </div>
                        <div>
                            <label for="email" class="tailwind_input_label">Электронная почта</label>
                            <input class="tailwind_input" name="email" type="email" value="{{ $client->email }}">
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
                    <button type="submit" class="primary_button mt-4">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
