@extends('welcome')

@section('title', 'Детали предложения')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Детали предложения</p>
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
                    <p><b>Город:</b> {{ $filter->address_city }}</p>
                    <p><b>Улица:</b> {{ $filter->address_street }}</p>
                    <p><b>Номер дома:</b> {{ $filter->address_house }}</p>
                    <p><b>Номер квартиры:</b> {{ $filter->address_number }}</p>
                    @if ($type === 1)
                        <p><b>Тип объекта:</b> Квартира</p>
                        <p><b>Площадь:</b> {{ $filter->apartment->total_area." м" }}<sup>2</sup></p>
                        <p><b>Количество комнат:</b> {{ $filter->apartment->rooms }}</p>
                        <p><b>Этаж:</b> {{ $filter->apartment->floor }}</p>
                    @endif
                    @if ($type === 2)
                        <p><b>Тип объекта:</b> Дом</p>
                        <p><b>Площадь:</b> {{ $filter->house->total_area." м" }} <sup>2</sup></p>
                        <p><b>Количество комнат:</b> {{ $filter->house->total_rooms }}</p>
                        <p><b>Этаж:</b> {{ $filter->house->total_floors }}</p>
                    @endif
                    @if ($type === 3)
                        <p><b>Тип объекта:</b> Участок</p>
                        <p><b>Площадь:</b> {{ $filter->land->total_area." м" }}<sup>2</sup></p>
                    @endif
                    <p><b>Цена:</b> {{ $supply->price." ₽" }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            @if (!$finished->isEmpty())
                <p class="text-2xl font-bold mb-4">Заявка закрыта</p>
            @else
                <p class="text-2xl font-bold mb-4">Предложить недвижимость для покупателя</p>
                @if ($req->isEmpty())
                    <p class="text-xl mb-4">Нет заявок на покупку</p>
                @else
                    @foreach ($req as $re)
                        <form class="mb-4" action="{{ route('offer_estate_sell', ['sell_id' => $supply->id]) }}" method="post">
                            @csrf
                            <div class="group grid grid-cols-3 gap-4">
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Данные продавца</p>
                                    <p><b>Фамилия:</b> {{ $re->client->person->last_name }}</p>
                                    <p><b>Имя:</b> {{ $re->client->person->first_name }}</p>
                                    <p><b>Отчество:</b> {{ $re->client->person->middle_name }}</p>
                                    @if ($re->client->phone !== null)
                                        <p><b>Телефон:</b> {{ $re->client->phone }}</p>
                                    @endif
                                    @if ($re->client->email !== null)
                                        <p><b>Email:</b> {{ $re->client->email }}</p>
                                    @endif
                                </div>
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Адрес</p>
                                    <p><b>Широта:</b> {{ $filter->coordinate_latitude }}</p>
                                    <p><b>Долгота:</b> {{ $filter->coordinate_longitude }}</p>
                                    <p><b>Город:</b> {{ $re->address_city }}</p>
                                    <p><b>Улица:</b> {{ $re->address_street }}</p>
                                    <p><b>Номер дома:</b> {{ $re->address_house }}</p>
                                    <p><b>Номер квартиры:</b> {{ $re->address_number }}</p>
                                </div>

                                @if ($type === 1)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Квартира</p>
                                        <p><b>Мин.
                                                площадь:</b> {{ $re->realEstateFilter->apartmentFilter->min_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Макс.
                                                площадь:</b> {{ $re->realEstateFilter->apartmentFilter->max_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Мин.
                                                этаж</b> {{ $re->realEstateFilter->apartmentFilter->min_floor }}
                                        </p>
                                        <p><b>Макс.
                                                этаж</b> {{ $re->realEstateFilter->apartmentFilter->max_floor }}
                                        </p>
                                        <p><b>Мин. количество
                                                комнат:</b> {{ $re->realEstateFilter->apartmentFilter->min_rooms }}
                                        </p>
                                        <p><b>Макс. количество
                                                комнат:</b> {{ $re->realEstateFilter->apartmentFilter->max_rooms }}
                                        </p>
                                        <p><b>Мин. цена:</b> {{ $re->min_price." ₽"}}</p>
                                        <p><b>Макс. цена:</b> {{ $re->max_price." ₽"}}</p>
                                    </div>
                                @endif
                                @if ($type === 2)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Дом</p>
                                        <p><b>Мин.
                                                площадь:</b> {{ $re->realEstateFilter->houseFilter->min_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Макс. площадь:</b> {{ $re->realEstateFilter->houseFilter->max_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Мин.
                                                этажей:</b> {{ $re->realEstateFilter->houseFilter->min_floor }}
                                        </p>
                                        <p><b>Мин.
                                                этажей:</b> {{ $re->realEstateFilter->houseFilter->max_floor }}
                                        </p>
                                        <p><b>Мин.
                                                комнат:</b> {{ $re->realEstateFilter->houseFilter->min_rooms }}
                                        </p>
                                        <p><b>Макс.
                                                комнат:</b> {{ $re->realEstateFilter->houseFilter->max_rooms }}
                                        </p>
                                        <p><b>Мин. цена:</b> {{ $re->min_price." ₽"}}</p>
                                        <p><b>Макс. цена:</b> {{ $re->max_price." ₽"}}</p>
                                    </div>
                                @endif
                                @if ($type === 3)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Участок</p>
                                        <p><b>Мин.
                                                площадь:</b> {{ $re->realEstateFilter->landFilter->min_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Макс.
                                                площадь:</b> {{ $re->realEstateFilter->landFilter->max_area." м" }}<sup>2</sup>
                                        </p>
                                        <p><b>Мин. цена:</b> {{ $re->min_price." ₽"}}</p>
                                        <p><b>Макс. цена:</b> {{ $re->max_price." ₽"}}</p>
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="req_id" type="number" value="{{ $re->id }}">
                            <button type="submit" class="primary_button">Предложить</button>
                        </form>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
