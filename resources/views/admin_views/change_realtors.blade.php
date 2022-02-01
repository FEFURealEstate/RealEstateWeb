@extends('welcome')

@section('title', 'Редактирование риэлтора')

@section('content')
<div style="min-height: 100%; display: flex; flex-direction: column;">
    <div class="p-4">
        <form method="POST" action="{{ route('admin_realtors_change', ['id' => $agent->id]) }}">
            @csrf
            <div class="card">
                <p class="text-2xl font-bold mb-4">Изменить данные риэлтора</p>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="last_name" class="tailwind_input_label">Фамилия</label>
                        <input class="tailwind_input" required name="last_name" type="text"
                                value="{{ $agent->person->last_name }}">
                    </div>
                    <div>
                        <label for="first_name" class="tailwind_input_label">Имя</label>
                        <input class="tailwind_input" required name="first_name" type="text"
                                value="{{ $agent->person->first_name }}">
                    </div>
                    <div>
                        <label for="middle_name" class="tailwind_input_label">Отчество</label>
                        <input class="tailwind_input" required name="middle_name" type="text"
                                value="{{ $agent->person->middle_name }}">
                    </div>
                    <div>
                        <label for="deal_share" class="tailwind_input_label">Доля от комиссии</label>
                        <input class="tailwind_input" required name="deal_share" type="number" min="0" max="100" value="{{ $agent->deal_share }}">
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
    </form>
</div>
@endsection
