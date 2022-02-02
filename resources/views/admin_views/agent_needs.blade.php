@extends('welcome')

@section('title', 'Потребности')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Заявка клиента</p>
            <p><b>Id заявки:</b> {{ $req_id }}</p>
            <p><b>Id клиента:</b> {{ $demand->client_id }}</p>
            <p><b>Город:</b> {{ $demand->address_city}}</p>
            <p><b>Улица:</b> {{ $demand->address_street}}</p>
            <p><b>Дом:</b> {{ $demand->address_house}}</p>
            <p><b>Квартира:</b> {{ $demand->address_number}}</p>
            <p><b>Мин цена:</b> {{ $demand->min_price." ₽"}}</p>
            <p><b>Макс цена:</b> {{ $demand->max_price." ₽"}}</p>
        </div>
        <div class="card">
            <p class="text-2xl font-bold mb-4">Выберите риэлтора для заявки</p>
            @foreach ($realtors as $realtor)
                <form action="{{ route('realtor_select', ['req_id' => $req_id]) }}" method="post">
                    @csrf
                    <div class="flex items-center py-2">
                        <p class="mr-4"><b>Id риэлтора:</b> {{ $realtor->id}}</p>
                        <p><b>Доля риэлтора от сделки:</b> {{ $realtor->deal_share." %"}}</p>
                        <input type="hidden" name="realtor_id" type="number" value="{{ $realtor->id }}">
                        <button type="submit" class="primary_button ml-auto">Выбрать риэлтора</button>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
