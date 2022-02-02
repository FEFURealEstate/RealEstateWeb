@extends('welcome')

@section('title', "Редактирование объекта")

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
            <form method="POST" action="{{ route('admin_objects_change', ['id' => $real_estate->id]) }}">
                @csrf
                <div class="card">
                    <p class="text-2xl font-bold mb-4">Изменить данные объекта</p>
                    <div class="grid grid-cols-3 grid-rows-4 gap-4">
                        <div>
                            <label class="tailwind_input_label">Город</label>
                            <input class="tailwind_input" name="address_city" type="text"
                                   value="{{ $real_estate->address_city }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Улица</label>
                            <input class="tailwind_input" name="address_street" type="text"
                                   value="{{ $real_estate->address_street }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Номер дома</label>
                            <input class="tailwind_input" name="address_house" type="text"
                                   value="{{ $real_estate->address_house }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Номер квартиры</label>
                            <input class="tailwind_input" name="address_number" type="text"
                                   value="{{ $real_estate->address_number }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Широта</label>
                            <input class="tailwind_input" name="coordinate_latitude" type="number"
                                   value="{{ $real_estate->coordinate_latitude }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Долгота</label>
                            <input class="tailwind_input" name="coordinate_longitude" type="number"
                                   value="{{ $real_estate->coordinate_longitude }}">
                        </div>
                        <div>
                            <label class="tailwind_input_label">Тип объекта</label>
                            <select class="tailwind_input" onchange="optchange(this)" required="required"
                                    name="estate_type" id="opt">
                                <option disabled id="0" value="">Выберите тип недвижимости</option>
                                <option {{ $real_estate->apartment ? 'selected' : '' }} id="1">Квартира</option>
                                <option {{ $real_estate->house ? 'selected' : '' }} id="2">Дом</option>
                                <option {{ $real_estate->land ? 'selected' : '' }} id="3">Земельный участок</option>
                            </select>
                        </div>
                        <div class="hidden grid_group" id="input_select_id_1">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ $real_estate->apartment->total_area ?? '' }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Этаж</label>
                                <input class="tailwind_input" name="floor" type="number"
                                       value="{{ $real_estate->apartment->floor ?? '' }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во комнат</label>
                                <input class="tailwind_input" name="rooms" type="number"
                                       value="{{ $real_estate->apartment->rooms ?? '' }}">
                            </div>
                        </div>

                        <div class="hidden grid_group" id="input_select_id_2">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ $real_estate->house->total_area ?? '' }}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во этажей</label>
                                <input class="tailwind_input" name="total_floors" type="number"
                                       value="{{ $real_estate->house->total_floors ?? ''}}">
                            </div>
                            <div>
                                <label class="tailwind_input_label">Кол-во комнат</label>
                                <input class="tailwind_input" name="total_rooms" type="number"
                                       value="{{ $real_estate->house->total_rooms ?? '' }}">
                            </div>
                        </div>

                        <div class="hidden grid_group" id="input_select_id_3">
                            <div>
                                <label class="tailwind_input_label">Площадь</label>
                                <input class="tailwind_input" name="total_area" type="number"
                                       value="{{ $real_estate->land->total_area ?? '' }}">
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="primary_button mt-4" type="submit">Изменить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
