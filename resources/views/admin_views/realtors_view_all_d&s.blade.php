@extends('welcome')

@section('title', "Информация о риэлторе")

@section('content')

    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div class="p-4">
            <div class="card">
                <p class="text-2xl font-bold mb-4">Данные о риэлторе</p>
                <div class="grid grid-cols-1">
                    <p><b>Фамилия: </b>{{ $agent->person->last_name }}</p>
                    <p><b>Имя: </b>{{ $agent->person->first_name }}</p>
                    <p><b>Отчество: </b>{{ $agent->person->middle_name }}</p>
                    <p><b>Доля от комиссии: </b>{{ $agent->deal_share." %" }}</p>
                </div>
                <button class="primary_button mt-4">
                    <a href="{{ route('admin_realtors_change', ['id' => $agent->id]) }}">Изменить</a>
                </button>
            </div>

            <div class="card">
                <p class="text-2xl font-bold mb-4">Потребности пользователей</p>
                <div class="bg-white">

                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">Мин.цена</th>
                            <th class="p-2">Макс.цена</th>
                            <th class="p-2">Клиент</th>
                            <th class="p-2">Мин. площадь</th>
                            <th class="p-2">Макс. площадь</th>
                            <th class="p-2">Мин. комнат</th>
                            <th class="p-2">Макс. комнат</th>
                            <th class="p-2">Мин. этаж(ей)</th>
                            <th class="p-2">Макс. этаж(ей)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($demands as $demand)
                            <tr class="border-b">
                                <td class="p-2">
                                    <a class="text-blue-500"
                                       href="{{ route('admin_objects_change', ['id' => $demand->id]) }}">{{ $demand->address_street.", ".$demand->address_house }}</a>
                                </td>
                                <td class="p-2">{{ $demand->min_price." ₽" }}</td>
                                <td class="p-2">{{ $demand->max_price." ₽" }}</td>
                                <td class="p-2">
                                    @if($demand->client !== null)
                                        <a class="text-blue-500"
                                           href="{{ route('admin_client_view', ['id' => $demand->client_id]) }}">Перейти</a>
                                    @endif
                                </td>
                                @php
                                    if ($demand->realEstateFilter->apartmentFilter !== null) {
                                        $filter = "apartmentFilter";
                                    }
                                    elseif ($demand->realEstateFilter->houseFilter !== null) {
                                        $filter = "houseFilter";
                                    }
                                    else {
                                        $filter = "landFilter";
                                    }
                                @endphp
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->min_area." м" }}<sup>2</sup>
                                </td>
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->max_area." м" }}<sup>2</sup>
                                </td>
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->min_rooms ?? ""}}
                                </td>
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->max_rooms ?? ""}}
                                </td>
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->min_floor ?? ""}}
                                </td>
                                <td class="p-2">
                                    {{ $demand->realEstateFilter->{$filter}->max_floor ?? ""}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <p class="text-2xl font-bold mb-4">Предложения пользователей</p>
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">Клиент</th>
                            <th class="p-2">Цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supplies as $supply)
                            <tr class="border-b">
                                <td class="p-4">
                                    <a class="text-blue-500" href="{{ route('admin_objects_change', ['id' => $demand->id]) }}">{{ $supply->realEstate->address_street.", ".$supply->realEstate->address_house }}</a>
                                </td>
                                <td class="p-4">
                                    @if($supply->client !== null)
                                        <a class="text-blue-500"
                                           href="{{ route('admin_client_view', ['id' => $supply->client_id]) }}">{{ $supply->client->person->last_name }} {{ $supply->client->person->first_name }} {{ $supply->client->person->middle_name }}</a>
                                    @endif
                                </td>
                                <td class="p-4">{{ $supply->price." ₽" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
