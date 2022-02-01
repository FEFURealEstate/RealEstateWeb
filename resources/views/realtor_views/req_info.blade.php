@extends('welcome')

@section('title', 'Детали потребности')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Детали потребности</p>
            <div class="group grid grid-cols-2 gap-4">
                <div class="card text-lg">
                    <div class="text-xl mb-4">Клиент</div>
                    <p><b>Фамилия:</b> {{ $client->person->last_name }}</p>
                    <p><b>Имя:</b> {{ $client->person->first_name }}</p>
                    <p><b>Отчество:</b> {{ $client->person->middle_name }}</p>
                    @if ($client->phone !== null)
                        <p><b>Телефон:</b> {{ $client->phone }}</p>
                    @endif
                    @if ($client->email !== null)
                        <p><b>Email:</b> {{ $client->email }}</p>
                    @endif
                </div>
                <div class="card text-lg">
                    <p class="text-xl mb-4">Объект</p>
                    <p><b>Город:</b> {{ $demand->address_city }}</p>
                    <p><b>Улица:</b> {{ $demand->address_street }}</p>
                    @if ($type === 1)
                        <p><b>Тип объекта:</b> Квартира</p>
                    @elseif($type === 2)
                        <p><b>Тип объекта:</b> Дом</p>
                    @elseif ($type === 3)
                        <p><b>Тип объекта:</b> Участок</p>
                    @endif
                    <p><b>Номер дома:</b> {{ $demand->address_house }}</p>
                    <p><b>Номер квартиры:</b> {{ $demand->address_number }}</p>
                    <p><b>Нач. цена:</b> {{ $demand->min_price." ₽" }}</p>
                    <p><b>Макс. цена:</b> {{ $demand->max_price." ₽" }}</p>

                    @if ($type === 1)
                        <p><b>Мин. площадь:</b> {{ $filter->apartmentFilter->min_area." м"}}<sup>2</sup></p>
                        <p><b>Макс. площадь:</b> {{ $filter->apartmentFilter->max_area." м" }}<sup>2</sup></p>
                        <p><b>Мин. этаж:</b> {{ $filter->apartmentFilter->min_floor }}</p>
                        <p><b>Макс. этаж:</b> {{ $filter->apartmentFilter->max_floor }}</p>
                        <p><b>Мин. количество комнат:</b> {{ $filter->apartmentFilter->min_rooms }}</p>
                        <p><b>Макс. количество комнат:</b> {{ $filter->apartmentFilter->max_rooms }}</p>
                    @endif
                    @if ($type === 2)
                        <p><b>Мин. площадь:</b> {{ $filter->houseFilter->min_area }}</p>
                        <p><b>Макс. площадь:</b> {{ $filter->houseFilter->max_area }}</p>
                        <p><b>Мин. этажей:</b> {{ $filter->houseFilter->min_floors }}</p>
                        <p><b>Макс. этажей:</b> {{ $filter->houseFilter->max_floors }}</p>
                        <p><b>Мин. количество комнат:</b> {{ $filter->houseFilter->min_rooms }}</p>
                        <p><b>Макс. количество комнат:</b> {{ $filter->houseFilter->max_rooms }}</p>
                    @endif
                    @if ($type === 3)
                        <p><b>Мин. площадь:</b> {{ $filter->landFilter->min_area }}</p>
                        <p><b>Макс. площадь:</b> {{ $filter->landFilter->max_area }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            @if (!$finished->isEmpty())
                <p class="text-2xl font-bold mb-4">Заявка закрыта</p>
            @else
                <p class="text-2xl font-bold mb-4">Предложить потребность для продавца</p>
                @if ($sells->isEmpty())
                    <p class="text-xl mb-4">Нет заявок на продажу</p>
                @else
                    @foreach ($sells as $sell)
                        <form class="mb-4" action="{{ route('offer_estate', ['req_id' => $demand->id]) }}" method="post">
                            @csrf
                            <div class="group grid grid-cols-3 gap-4">
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Данные продавца</p>
                                    <p><b>Фамилия:</b> {{ $sell->client->person->last_name }}</p>
                                    <p><b>Имя:</b> {{ $sell->client->person->first_name }}</p>
                                    <p><b>Отчество:</b> {{ $sell->client->person->middle_name }}</p>
                                    @if ($sell->client->phone !== null)
                                        <p><b>Телефон:</b> {{ $sell->client->phone }}</p>
                                    @endif
                                    @if ($sell->client->email !== null)
                                        <p><b>Email:</b> {{ $sell->client->email }}</p>
                                    @endif
                                </div>
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Адрес</p>
                                    <p><b>Широта:</b> {{ $sell->realEstate->coordinate_latitude }}</p>
                                    <p><b>Долгота:</b> {{ $sell->realEstate->coordinate_longitude }}</p>
                                    <p><b>Город:</b> {{ $sell->realEstate->address_city }}</p>
                                    <p><b>Улица:</b> {{ $sell->realEstate->address_street }}</p>
                                    <p><b>Номер дома:</b> {{ $sell->realEstate->address_house }}</p>
                                    <p><b>Номер квартиры:</b> {{ $sell->realEstate->address_number }}</p>
                                </div>
                                @if ($type === 1)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Квартира</p>
                                        <p><b>Цена:</b> {{ $sell->price." ₽"}}</p>
                                        <p><b>Площадь:</b>
                                        @if($sell->realEstate->apartment !== null)
                                            {{ $sell->realEstate->apartment->total_area." м" }}<sup>2</sup>
                                        @endif
                                        </p>
                                        <p><b>Количество комнат:</b> {{ $sell->realEstate->apartment->rooms ?? ""}}</p>
                                        <p><b>Этаж:</b> {{ $sell->realEstate->apartment->floor ?? ""}}</p>
                                    </div>
                                @endif
                                @if ($type === 2)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Дом</p>
                                        <p><b>Площадь:</b>
                                            @if($sell->realEstate->house !== null)
                                                {{ $sell->realEstate->house->total_area." м" }}<sup>2</sup>
                                            @endif
                                        </p>
                                        <p><b>Количество
                                                комнат:</b> {{ $sell->realEstate->house->total_rooms ?? "" }}</p>
                                        <p><b>Этаж:</b> {{ $sell->realEstate->house->total_floors ?? ""}}</p>
                                    </div>
                                @endif
                                @if ($type === 3)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Участок</p>
                                        <p><b>Площадь:</b>
                                            @if($sell->realEstate->land->total_area)
                                                {{ $sell->realEstate->land->total_area." м" }}<sup>2</sup>
                                            @endif
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="supply_id" type="number" value="{{ $sell->id }}">
                            <button type="submit" class="primary_button">Предложить</button>
                        </form>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
