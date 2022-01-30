@extends('welcome')

@section('title', "Мои предложения")

@section('content')
    <div class="p-4">
        <div class="card ">
            <p class="text-2xl font-bold mb-4">Детали предложения</p>
            <div class="group grid grid-cols-2 gap-4">
                <div class="card text-lg">
                    <p class="text-xl mb-4">Клиент</p>
                    <p><b>Фамилия:</b> {{ $user->last_name }}</p>
                    <p><b>Имя:</b> {{ $user->first_name }}</p>
                    <p><b>Отчество:</b> {{ $user->middle_name }}</p>
                    @if ($user_payload->phone !== null)
                        <p><b>Телефон:</b> {{ $user_payload->phone }}</p>
                    @endif
                    @if ($user_payload->email !== null)
                        <p><b>Email:</b> {{ $user_payload->email }}</p>
                    @endif
                </div>
                <div class="card text-lg">
                    <p class="text-xl mb-4">Объект</p>
                    <p><b>Город:</b> {{ $estate->address_city }}</p>
                    <p><b>Улица:</b> {{ $estate->address_street }}</p>
                    <p><b>Номер дома:</b> {{ $estate->address_house }}</p>
                    <p><b>Номер квартиры:</b> {{ $estate->address_number }}</p>
                    <p><b>Широта:</b> {{ $estate->coordinate_latitude }}</p>
                    <p><b>Долгота:</b> {{ $estate->coordinate_longtitude }}</p>
                    @if ($type === 1)
                        <p><b>Тип объекта:</b> Квартира</p>
                        <p><b>Площадь:</b> {{ $estate_payload->total_area }}</p>
                        <p><b>Количество комнат:</b> {{ $estate_payload->rooms }}</p>
                        <p><b>Этаж:</b> {{ $estate_payload->floor }}</p>
                    @endif
                    @if ($type === 2)
                        <p><b>Тип объекта:</b> Дом</p>
                        <p><b>Площадь:</b> {{ $estate_payload->total_area }}</p>
                        <p><b>Количество комнат:</b> {{ $estate_payload->total_rooms }}</p>
                        <p><b>Этаж:</b> {{ $estate_payload->total_floors }}</p>
                    @endif
                    @if ($type === 3)
                        <p><b>Тип объекта:</b> Участок</p>
                        <p><b>Площадь:</b> {{ $estate_payload->total_area }}</p>
                    @endif
                    <p><b>Цена:</b> {{ $supply->price." ₽" }}</p>
                </div>
            </div>
        </div>
        <div class="card">
            <p class="text-2xl font-bold mb-4">Предложения от риэлтора</p>
            @if (!$finished->isEmpty())
                <p class="text-xl font-bold mb-4">Предложение закрыто</p>
            @else
                @if ($not_finish_deals->isEmpty())
                    <p class="text-xl font-bold mb-4">Пока нет предложений от риэлтора</p>
                @else
                    @foreach ($not_finish_deals as $deal)
                        <form action="{{ route('sell_estate', ['sell_id' => $deal->supply_id]) }}" method="post">
                            @csrf
                            <div class="group grid grid-cols-3 gap-4">
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Данные покупателя</p>
                                    <p><b>Фамилия:</b> {{ $deal->demand->client->person->last_name }}</p>
                                    <p><b>Имя:</b> {{ $deal->demand->client->person->first_name }}</p>
                                    <p><b>Отчество:</b> {{ $deal->demand->client->person->middle_name }}</p>
                                    <p><b>Email:</b> {{ $deal->demand->client->email }}</p>
                                    <p><b>Телефон:</b> {{ $deal->demand->client->phone }}</p>
                                </div>

                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Адрес</p>
                                    <p><b>Город:</b> {{ $deal->demand->address_city }}</p>
                                    <p><b>Улица:</b> {{ $deal->demand->address_street }}</p>
                                    <p><b>Номер дома:</b> {{ $deal->demand->address_house }}</p>
                                    <p><b>Номер квартиры:</b> {{ $deal->demand->address_number }}</p>
                                    <p><b>Минимальная цена:</b> {{ $deal->demand->min_price." ₽" }}</p>
                                    <p><b>Максимальная цена:</b> {{ $deal->demand->max_price." ₽" }}</p>
                                </div>
                                @if ($type === 1)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Квартира</p>
                                        <p><b>Мин.
                                                площадь:</b> {{ $deal->demand->realEstateFilter->apartmentFilter->min_area }}
                                        </p>
                                        <p><b>Макс.
                                                площадь:</b> {{ $deal->demand->realEstateFilter->apartmentFilter->max_area }}
                                        </p>
                                        <p><b>Мин количество
                                                комнат:</b> {{ $deal->demand->realEstateFilter->apartmentFilter->min_rooms }}
                                        </p>
                                        <p><b>Макс количество
                                                комнат</b>М {{ $deal->demand->realEstateFilter->apartmentFilter->max_rooms }}
                                        </p>
                                        <p><b>Минимальный
                                                этаж</b> {{ $deal->demand->realEstateFilter->apartmentFilter->min_floor }}
                                        </p>
                                        <p><b>Максимальный
                                                этаж</b> {{ $deal->demand->realEstateFilter->apartmentFilter->max_floor }}
                                        </p>
                                    </div>
                                @endif
                                @if ($type === 2)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Дом</p>
                                        <p><b>Мин.
                                                площадь:</b> {{ $deal->demand->realEstateFilter->houseFilter->min_area }}
                                        </p>
                                        <p><b>Площадь:</b> {{ $deal->demand->realEstateFilter->houseFilter->max_area }}
                                        </p>
                                        <p><b>Мин.
                                                комнат:</b> {{ $deal->demand->realEstateFilter->houseFilter->min_rooms }}
                                        </p>
                                        <p><b>Макс.
                                                комнат:</b> {{ $deal->demand->realEstateFilter->houseFilter->max_rooms }}
                                        </p>
                                        <p><b>Мин.
                                                этажей:</b> {{ $deal->demand->realEstateFilter->houseFilter->min_floor }}
                                        </p>
                                        <p><b>Мин.
                                                этажей:</b> {{ $deal->demand->realEstateFilter->houseFilter->max_floor }}
                                        </p>
                                    </div>
                                @endif
                                @if ($type === 3)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Участок</p>
                                        <p><b>Мин
                                                площадь:</b> {{ $deal->demand->realEstateFilter->landFilter->min_area }}
                                        </p>
                                        <p><b>Макс
                                                площадь:</b> {{ $deal->demand->realEstateFilter->landFilter->max_area }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <input type="hidden" name="demand_id" value="{{ $deal->demand_id }}">
                            <button type="submit" class="primary_button">Продать</button>
                        </form>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
