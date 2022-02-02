@extends('welcome')

@section('title', 'Заявка')

@section('content')
    <div class="p-4">
        <div class="card">
            <p class="text-2xl font-bold mb-4">Детали заявки</p>
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
                    <p><b>Город:</b> {{ $demand->address_city }}</p>
                    <p><b>Улица:</b> {{ $demand->address_street }}</p>
                    <p><b>Номер дома:</b> {{ $demand->address_house }}</p>
                    <p><b>Номер квартиры:</b> {{ $demand->address_number }}</p>
                    <p><b>Начальная цена:</b> {{ $demand->min_price." ₽" }}</p>
                    <p><b>Максимальная цена:</b> {{ $demand->max_price." ₽" }}</p>
                    @if ($type === 1)
                        <p><b>Тип объекта: Квартира</b></p>
                        <p><b>Минимальная площадь:</b> {{ $estate_payload->min_area." м" }}<sup>2</sup></p>
                        <p><b>Максимальная площадь:</b> {{ $estate_payload->max_area." м" }}<sup>2</sup></p>
                        <p><b>Минимум комнат:</b> {{ $estate_payload->min_rooms }}</p>
                        <p><b>Максимум комнат:</b> {{ $estate_payload->max_rooms }}</p>
                        <p><b>Минимальный этаж:</b> {{ $estate_payload->min_floor }}</p>
                        <p><b>Максимальный этаж:</b> {{ $estate_payload->max_floor }}</p>
                    @endif
                    @if ($type === 2)
                        <p><b>Тип недвижимости: Дом</b></p>
                        <p><b>Минимальная площадь:</b> {{ $estate_payload->min_area." м" }}<sup>2</sup></p>
                        <p><b>Максимальная площадь:</b> {{ $estate_payload->max_area." м" }}<sup>2</sup></p>
                        <p><b>Минум комнат:</b> {{ $estate_payload->min_rooms }}</p>
                        <p><b>Максимум комнат:</b> {{ $estate_payload->max_rooms }}</p>
                        <p><b>Минимум этажей:</b> {{ $estate_payload->min_floors }}</p>
                        <p><b>Максимум этажей:</b> {{ $estate_payload->max_floors }}</p>
                    @endif
                    @if ($type === 3)
                        <p><b>Тип недвижимости: Участок</b></p>
                        <p><b>Минимальная площадь:</b> {{ $estate_payload->min_area." м" }}<sup>2</sup></p>
                        <p><b>Максимальная площадь:</b> {{ $estate_payload->max_area." м" }}<sup>2</sup></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            @if (!$finished->isEmpty())
                <p class="text-xl font-bold mb-4">Заявка закрыта</p>
            @else
                @if ($not_finish_deals->isEmpty())
                    <p class="text-xl font-bold mb-4">Пока нет предложений от риэлтора</p>
                @else
                    @foreach ($not_finish_deals as $deal)
                        <form action="{{ route('buy_estate', ['req_id' => $deal->demand_id]) }}" method="post">
                            @csrf
                            <div class="group grid grid-cols-3 gap-4">
                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Данные продавца</p>
                                    <p><b>Фамилия:</b> {{ $deal->supply->client->person->last_name }}</p>
                                    <p><b>Имя:</b> {{ $deal->supply->client->person->first_name }}</p>
                                    <p><b>Отчество:</b> {{ $deal->supply->client->person->middle_name }}</p>
                                    <p><b>Email:</b> {{ $deal->supply->client->email }}</p>
                                    <p><b>Телефон:</b> {{ $deal->supply->client->phone }}</p>
                                </div>

                                <div class="card">
                                    <p class="text-xl font-bold mb-4">Адрес</p>
                                    <p><b>Город:</b> {{ $deal->supply->realEstate->address_city }}</p>
                                    <p><b>Улица:</b> {{ $deal->supply->realEstate->address_street }}</p>
                                    <p><b>Номер дома:</b> {{ $deal->supply->realEstate->address_house }}</p>
                                    <p><b>Номер квартиры:</b> {{ $deal->supply->realEstate->address_number }}</p>
                                    <p><b>Широта:</b> {{ $deal->supply->realEstate->coordinate_latitude }}</p>
                                    <p><b>Долгота:</b> {{ $deal->supply->realEstate->coordinate_longtitude }}</p>
                                </div>
                                @if ($type === 1)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Квартира</p>
                                        <p><b>Площадь:</b> {{ $deal->supply->realEstate->apartment->total_area }}</p>
                                        <p><b>Количество
                                                комнат:</b> {{ $deal->supply->realEstate->apartment->rooms }}</p>
                                        <p><b>Этаж:</b> {{ $deal->supply->realEstate->apartment->floor }}</p>
                                    </div>
                                @endif
                                @if ($type === 2)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Дом</p>
                                        <p><b>Площадь:</b> {{ $deal->supply->realEstate->house->total_area }}</p>
                                        <p><b>Количество
                                                комнат:</b> {{ $deal->supply->realEstate->house->total_rooms }}</p>
                                        <p><b>Этаж:</b> {{ $deal->supply->realEstate->house->total_floors }}</p>
                                    </div>
                                @endif
                                @if ($type === 3)
                                    <div class="card">
                                        <p class="text-xl font-bold mb-4">Информация</p>
                                        <p><b>Тип объекта:</b> Участок</p>
                                        <p><b>Площадь:</b> {{ $deal->supply->realEstate->land->total_area }}</p>
                                    </div>
                                @endif
                            </div>
                            <p class="inline mr-4 text-lg"><b>Цена:</b> {{ $deal->supply->price." ₽" }}</p>
                            <input type="hidden" name="supply_id" value="{{ $deal->supply_id }}">
                            <button type="submit" class="primary_button">Купить</button>
                        </form>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
@endsection
