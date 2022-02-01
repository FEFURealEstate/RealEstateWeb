@extends('welcome')

@section('title', 'Предложения')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Заявка клиента</p>
            <p><b>Id предложения:</b> {{ $sell_id }}</p>
            <p><b>Id клиента:</b> {{ $supply->client_id }}</p>
            <p><b>Цена:</b> {{ $supply->price." ₽"}}</p>
            <p><b>Улица:</b> {{ $supply->realEstate->address_city }}</p>
            <p><b>Дом:</b> {{ $supply->realEstate->address_house}}</p>
            <p><b>Квартира:</b> {{ $supply->realEstate->address_number}}</p>
            <p><b>Широта:</b> {{ $supply->realEstate->coordinate_latitude}}</p>
            <p><b>Долгота:</b> {{ $supply->realEstate->coordinate_longitude}}</p>
        </div>
        <div class="card">
            <p class="text-2xl font-bold mb-4">Выбeрите риэлтора для заявки</p>
            @foreach ($realtors as $realtor)
                <form action="{{ route('realtor_select_off', ['sell_id' => $sell_id]) }}" method="post">
                    @csrf
                    <div class="flex items-center py-2 border-b">
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
