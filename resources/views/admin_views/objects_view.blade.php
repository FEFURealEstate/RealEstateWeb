@extends('welcome')

@section('title', "Объекты")

@section('content')
    <script>
        let last_selected = null;

        function optchange(select) {
            const selected = select.options[select.selectedIndex];

            if (last_selected) {
                document.getElementById('input_select_id_' + last_selected.id).classList.toggle('hidden');
            }
            document.getElementById('input_select_id_' + selected.id).classList.toggle('hidden');
            last_selected = selected;
        }
    </script>

    <div style="min-height: 100%; display: flex; flex-direction: column;">
        <div class="p-4">
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
            <form method="POST" action="{{ route('admin_objects_add') }}">
                @csrf
                <div class="card">
                    <p class="text-2xl font-bold mb-4">Добавить объект</p>
                    <div class="group grid grid-cols-3 gap-4 grid-rows-4">
                        <div>
                            <label for="address_city" class="tailwind_input_label">Город</label>
                            <input class="tailwind_input" name="address_city" type="text"
                                   value="{{ old('address_city') }}">
                        </div>
                        <div>
                            <label for="address_street" class="tailwind_input_label">Улица</label>
                            <input class="tailwind_input" name="address_street" type="text"
                                   value="{{ old('address_street') }}">
                        </div>
                        <div>
                            <label for="address_house" class="tailwind_input_label">Номер дома</label>
                            <input class="tailwind_input" name="address_house" type="text"
                                   value="{{ old('address_house') }}">
                        </div>
                        <div class="row-start-2">
                            <label for="address_number" class="tailwind_input_label">Номер квартиры</label>
                            <input class="tailwind_input" name="address_number" type="text"
                                   value="{{ old('address_number') }}">
                        </div>
                        <div class="row-start-2">
                            <label for="coordinate_latitude" class="tailwind_input_label">Широта</label>
                            <input class="tailwind_input" name="coordinate_latitude" type="number"
                                   value="{{ old('coordinate_latitude') }}">
                        </div>
                        <div class="row-start-2">
                            <label for="coordinate_longitude" class="tailwind_input_label">Долгота</label>
                            <input class="tailwind_input" name="coordinate_longitude" type="number"
                                   value="{{ old('coordinate_longitude') }}">
                        </div>
                        <div class="row-start-3">
                            <label for="estate_type" class="tailwind_input_label">Тип объекта</label>
                            <select class="tailwind_input" onchange="optchange(this)" required="required"
                                    name="estate_type" id="opt">
                                <option disabled selected id="0" value="">Выберите тип недвижимости</option>
                                <option id="1">Квартира</option>
                                <option id="2">Дом</option>
                                <option id="3">Земельный участок</option>
                            </select>
                        </div>

                        <div class="hidden grid_group" id="input_select_id_1">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ old('total_area') }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Этаж</label>
                                <input class="tailwind_input" name="floor" type="number" value="{{ old('floor') }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во комнат</label>
                                <input class="tailwind_input" name="rooms" type="number" value="{{ old('rooms') }}">
                            </div>
                        </div>

                        <div class="hidden grid_group" id="input_select_id_2">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ old('total_area') }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во этажей</label>
                                <input class="tailwind_input" name="total_floors" type="number"
                                       value="{{ old('total_floors') }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во комнат</label>
                                <input class="tailwind_input" name="total_rooms" type="number"
                                       value="{{ old('total_rooms') }}">
                            </div>
                        </div>

                        <div class="hidden grid_group" id="input_select_id_3">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ old('total_area') }}">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="primary_button mt-4">Добавить</button>
                </div>
            </form>
            <div class="card">
                <p class="text-2xl font-bold mb-4">Список объектов</p>
                <div class="bg-white">
                    <table class="table-auto min-w-full text-center">
                        <thead class="bg-blue-400">
                        <tr>
                            <th class="p-2">Тип объекта</th>
                            <th class="p-2">Город</th>
                            <th class="p-2">Улица</th>
                            <th class="p-2">Дом</th>
                            <th class="p-2">Квартира</th>
                            <th class="p-2">Широта</th>
                            <th class="p-2">Долгота</th>
                            <th class="p-2">Площадь</th>
                            <th class="p-2">Кол-во комнат</th>
                            <th class="p-2">Этаж / Кол-во этажей</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($objects as $object)
                            @php
                                $now = $object->land ?: ($object->house ?: ($object->apartment))
                            @endphp
                            <tr class="border-b">
                                <td class="p-4">{{ $object->land ? "Земельный участок" : ($object->house ? "Дом" : ($object->apartment ? "Квартира" : "")) }}</td>
                                <td class="p-4">{{ $object->address_city }}</td>
                                <td class="p-4">{{ $object->address_street }}</td>
                                <td class="p-4">{{ $object->address_house }}</td>
                                <td class="p-4">{{ $object->address_number }}</td>
                                <td class="p-4">{{ $object->coordinate_latitude }}</td>
                                <td class="p-4">{{ $object->coordinate_longitude }}</td>
                                <td class="p-4">{{ $now->total_area." м" }}<sup>2</sup></td>
                                <td class="p-4">{{ $now->rooms ?: ($now->total_rooms ?: '-') }}</td>
                                <td class="p-4">{{ $now->floor ?: ($now->total_floors ?: '-') }}</td>
                                <td class="p-4"><a class="text-blue-500" href="{{ route('admin_objects_change', ['id' => $object->id]) }}">Изменить</a>
                                </td>
                                <td class="p-4"><a class="text-red-500" href="{{ route('admin_objects_delete', ['id' => $object->id]) }}">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $objects->links() }}
            </div>
        </div>
    </div>
@endsection
