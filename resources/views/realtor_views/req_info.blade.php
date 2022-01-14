<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/page.css') }}" media="screen">

        <title>Форма регистрации</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>


    </head>
    <body class="antialiased">
    @include("partials.navbar")
    <div style="margin: 20px">
        <h1>Детали заявки</h1>
        <div class="client_card">
            <p>Фамилия: {{ $client->person->last_name }}</p>
            <p>Имя: {{ $client->person->first_name }}</p>
            <p>Отчество: {{ $client->person->middle_name }}</p>
            @if ($client->phone !== null)
                <p>Телефон: {{ $client->phone }}</p>
            @endif
            @if ($client->email !== null)
                <p>Email: {{ $client->email }}</p>
            @endif
        </div>
        <div class="req_card">
            <p>Город: {{ $demand->address_city }}</p>
            <p>Улица: {{ $demand->address_street }}</p>
            <p>Номер дома: {{ $demand->address_house }}</p>
            <p>Номер квартиры: {{ $demand->address_number }}</p>
            <p>Начальная цена: {{ $demand->min_price }}</p>
            <p>Максимальная цена: {{ $demand->max_price }}</p>
            @if ($type === 1)
                <p>Тип недвижимости: квартира</p>
                <p>Минимальная площадь {{ $filter->apartmentFilter->min_area }}</p>
                <p>Максимальная площадь {{ $filter->apartmentFilter->max_area }}</p>
                <p>Минум комнат {{ $filter->apartmentFilter->min_rooms }}</p>
                <p>Максимум комнат {{ $filter->apartmentFilter->max_rooms }}</p>
                <p>Минимальный этаж {{ $filter->apartmentFilter->min_floor }}</p>
                <p>Максимальный этаж {{ $filter->apartmentFilter->max_floor }}</p>
            @endif
            @if ($type === 2)
                <p>Тип недвижимости: дом</p>
                <p>Минимальная площадь {{ $filter->houseFilter->min_area }}</p>
                <p>Максимальная площадь {{ $filter->houseFilter->max_area }}</p>
                <p>Минум комнат {{ $filter->houseFilter->min_rooms }}</p>
                <p>Максимум комнат {{ $filter->houseFilter->max_rooms }}</p>
                <p>Минимум этажей {{ $filter->houseFilter->min_floors }}</p>
                <p>Максимум этажей {{ $filter->houseFilter->max_floors }}</p>
            @endif
            @if ($type === 3)
                <p>Тип недвижимости: участок</p>
                <p>Минимальная площадь {{ $filter->landFilter->min_area }}</p>
                <p>Максимальная площадь {{ $filter->landFilter->max_area }}</p>
            @endif
        </div>
        <br>

        <div class="offers_list">
            @if (!$finished->isEmpty())
                Заявка закрыта
            @else
                <h1>Предложить недвижимость для покупателя</h1>
                @if ($sells->isEmpty())
                    <h2>Нет недвижимости на продаже</h2>
                @else
                    @foreach ($sells as $sell)
                        <form action="{{ route('offer_estate', ['req_id' => $demand->id]) }}" method="post">
                            @csrf
                            <h2>Данные продавца</h2>
                            <p>Фамилия: {{ $sell->client->person->last_name }}</p>
                            <p>Имя: {{ $sell->client->person->first_name }}</p>
                            <p>Отчество: {{ $sell->client->person->middle_name }}</p>
                            @if ($sell->client->phone !== null)
                                <p>Телефон: {{ $sell->client->phone }}</p>
                            @endif
                            @if ($sell->client->email !== null)
                                <p>Email: {{ $sell->client->email }}</p>
                            @endif

                            <h2>Данные недвижимости</h2>
                            <p>Цена: {{ $sell->price}}</p>
                            <p>Город: {{ $sell->realEstate->address_city }}</p>
                            <p>Улица: {{ $sell->realEstate->address_street }}</p>
                            <p>Номер дома: {{ $sell->realEstate->address_house }}</p>
                            <p>Номер квартиры: {{ $sell->realEstate->address_number }}</p>
                            <p>Широта: {{ $sell->realEstate->coordinate_latitude }}</p>
                            <p>Долгота: {{ $sell->realEstate->coordinate_longitude }}</p>

                            @if ($type === 1)
                                <p>Тип недвижимости: квартира</p>
                                <p>Площадь {{ $sell->realEstate->apartment->total_area }}</p>
                                <p>Количество комнат {{ $sell->realEstate->apartment->rooms }}</p>
                                <p>Этаж {{ $sell->realEstate->apartment->floor }}</p>
                            @endif
                            @if ($type === 2)
                                <p>Тип недвижимости: дом</p>
                                <p>Площадь {{ $sell->realEstate->house->total_area }}</p>
                                <p>Количество комнат {{ $sell->realEstate->house->total_rooms }}</p>
                                <p>Этаж {{ $sell->realEstate->house->total_floors }}</p>
                            @endif
                            @if ($type === 3)
                                <p>Тип недвижимости: участок</p>
                                <p>Площадь {{ $sell->realEstate->land->total_area }}</p>
                            @endif
                            <input type="hidden" name="supply_id" type="number" value="{{ $sell->id }}">
                            <input type="submit" value="Предложить">
                        </form>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
    @include("partials.footer")
    </body>
</html>
