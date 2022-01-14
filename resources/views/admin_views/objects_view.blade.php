<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}" media="screen">

    <title>Объекты</title>

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

        .object {
            display: flex;
            flex-direction: row;
        }

        .bordered{
            border: 1px solid black;
        }
    </style>

    <style type="text/css">
        TABLE {
            width: 300px; /* Ширина таблицы */
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
        }
        TD, TH {
            padding: 3px; /* Поля вокруг содержимого таблицы */
            border: 1px solid black; /* Параметры рамки */
        }
        TH {
            background: #b0e0e6; /* Цвет фона */
        }
    </style>

    <script>
        function optchange(select) {
            const selected = select.options[select.selectedIndex];
            document.getElementById('input_select_id_1').hidden = true;
            document.getElementById('input_select_id_2').hidden = true;
            document.getElementById('input_select_id_3').hidden = true;
            document.getElementById('input_select_id_' + selected.id).hidden = false;
        }
    </script>
</head>
<body class="antialiased" style="height: 100%">
<div style="min-height: 100%; display: flex; flex-direction: column;">
    @include("partials.navbar")
    <div style="margin: 20px; flex: 1 1 auto;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2>Добавить объект</h2>
        <form method="POST" action="{{ route('admin_objects_add') }}">
            @csrf
            <div>
                <label>Город</label>
                <hr>
                <label>
                    <input class="bordered" name="address_city" type="text" value="{{ old('address_city') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Улица</label>
                <hr>
                <label>
                    <input class="bordered" name="address_street" type="text" value="{{ old('address_street') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Номер дома</label>
                <hr>
                <label>
                    <input class="bordered" name="address_house" type="text" value="{{ old('address_house') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Номер квартиры</label>
                <hr>
                <label>
                    <input class="bordered" name="address_number" type="text" value="{{ old('address_number') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Широта</label>
                <hr>
                <label>
                    <input class="bordered" name="coordinate_latitude" type="number" value="{{ old('coordinate_latitude') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Долгота</label>
                <hr>
                <label>
                    <input class="bordered" name="coordinate_longitude" type="number" value="{{ old('coordinate_longitude') }}">
                </label>
            </div>
            <hr>
            <div>
                <label>Тип объекта</label>
                <hr>
                <select onchange="optchange(this)" required="required" name="estate_type" id="opt">
                    <option disabled selected id="0" value="">Выбирите тип недвижимости</option>
                    <option id="1">Квартира</option>
                    <option id="2">Дом</option>
                    <option id="3">Земельный участок</option>
                </select>
            </div>
            <hr>

            <div hidden id="input_select_id_1">
                <div>
                    <label>Площадь</label>
                    <hr>
                    <label>
                        <input class="bordered" name="total_area" type="number" value="{{ old('total_area') }}">
                    </label>
                </div>
                <div>
                    <label>Этаж</label>
                    <hr>
                    <label>
                        <input class="bordered" name="floor" type="number" value="{{ old('floor') }}">
                    </label>
                </div>
                <div>
                    <label>Кол-во комнат</label>
                    <hr>
                    <label>
                        <input class="bordered" name="rooms" type="number" value="{{ old('rooms') }}">
                    </label>
                </div>
            </div>

            <div hidden id="input_select_id_2">
                <div>
                    <label>Площадь</label>
                    <hr>
                    <label>
                        <input class="bordered" name="total_area" type="number" value="{{ old('total_area') }}">
                    </label>
                </div>
                <div>
                    <label>Кол-во этажей</label>
                    <hr>
                    <label>
                        <input class="bordered" name="total_floors" type="number" value="{{ old('total_floors') }}">
                    </label>
                </div>
                <div>
                    <label>Кол-во комнат</label>
                    <hr>
                    <label>
                        <input class="bordered" name="total_rooms" type="number" value="{{ old('total_rooms') }}">
                    </label>
                </div>
            </div>

            <div hidden id="input_select_id_3">
                <div>
                    <label>Площадь</label>
                    <hr>
                    <label>
                        <input class="bordered" name="total_area" type="number" value="{{ old('total_area') }}">
                    </label>
                </div>
            </div>

            <input type="submit">
        </form>

        <table>
            <thead>
            <tr>
                <td>Тип объекта</td>
                <td>Город</td>
                <td>Улица</td>
                <td>Дом</td>
                <td>Квартира</td>
                <td>Широта</td>
                <td>Долгота</td>
                <td>Площадь</td>
                <td>Кол-во комнат</td>
                <td>Этаж / Кол-во этажей</td>
            </tr>
            </thead>
            <tbody>
            @foreach($objects as $object)
                @php
                $now = $object->land ?: ($object->house ?: ($object->apartment))
                @endphp
                <tr>
                    <td>{{ $object->land ? "Земельный участок" : ($object->house ? "Дом" : ($object->apartment ? "Квартира" : "")) }}</td>
                    <td>{{ $object->address_city }}</td>
                    <td>{{ $object->address_street }}</td>
                    <td>{{ $object->address_house }}</td>
                    <td>{{ $object->address_number }}</td>
                    <td>{{ $object->coordinate_latitude }}</td>
                    <td>{{ $object->coordinate_longitude }}</td>
                    <td>{{ $now->total_area }}</td>
                    <td>{{ $now->rooms ?: ($now->total_rooms ?: '-') }}</td>
                    <td>{{ $now->floor ?: ($now->total_floors ?: '-') }}</td>
                    <td><a href="{{ route('admin_objects_change', ['id' => $object->id]) }}">Изменить</a></td>
                    <td><a href="{{ route('admin_objects_delete', ['id' => $object->id]) }}">Удалить</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include("partials.footer")
</div>
</body>
</html>
