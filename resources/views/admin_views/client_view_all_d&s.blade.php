@extends('welcome')

@section('title', 'Информация о клиенте')

@section('content')
    <div>
        <div class="p-4">
            <div class="card">
                <p class="text-2xl font-bold mb-4">Данные о клиенте</p>
                <div class="grid grid-cols-1">
                    <p><b>Фамилия: </b>{{ $client->person->last_name }}</p>
                    <p><b>Имя: </b>{{ $client->person->first_name }}</p>
                    <p><b>Отчество: </b>{{ $client->person->middle_name }}</p>
                    <p><b>Электронная почта: </b>{{ $client->email }}</p>
                    <p><b>Телефон: </b>{{ $client->phone }}</p>
                </div>
                <button class="primary_button mt-4">
                    <a href="{{ route('admin_clients_change', ['id' => $client->id]) }}">Изменить</a>
                </button>
            </div>

            <div class="card">
                <p class="text-2xl font-bold mb-4">Потребности клиента</p>
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Адрес</th>
                            <th class="p-2">Мин. цена</th>
                            <th class="p-2">Макс. цена</th>
                            <th class="p-2">Риэлтор</th>
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
                                    <a class="text-blue-500" href="{{ route('admin_objects_change', ['id' => $demand->id]) }}">{{ $demand->address_street.", ".$demand->address_house }}</a>
                                </td>
                                <td class="p-2">{{ $demand->min_price." ₽" }}</td>
                                <td class="p-2">{{ $demand->max_price." ₽" }}</td>
                                <td class="p-2">
                                    @if($demand->agent !== null)
                                        <a class="text-blue-500" href="{{ route('admin_realtor_view', ['id' => $demand->agent_id]) }}">Перейти</a>
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
                <p class="text-2xl font-bold mb-4">Предложения клиента</p>
                <table class="table-auto min-w-full text-center">
                    <thead class="bg-blue-400">
                    <tr>
                        <th class="p-2">Адрес</th>
                        <th class="p-2">Риэлтор</th>
                        <th class="p-2">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supplies as $supply)
                        <tr class="border-b">
                            <td class="p-4">
                                <a class="text-blue-500" href="{{ route('admin_objects_change', ['id' => $supply->id]) }}">{{ $supply->realEstate->address_street.", ".$supply->realEstate->address_house }}</a>
                            </td>
                            <td class="p-4">
                                @if($supply->agent !== null)
                                    <a class="text-blue-500" href="{{ route('admin_realtor_view', ['id' => $supply->agent_id]) }}">{{ $supply->agent->person->last_name }} {{ $supply->agent->person->first_name }} {{ $supply->agent->person->middle_name }}</a>
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
@endsection
