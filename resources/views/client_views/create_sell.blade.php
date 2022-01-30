@extends('welcome')

@section('title', 'Создать предложение')

@section('content')

    <script>
        function optchange(select) {
            var selected = select.options[select.selectedIndex];
            if (selected.id == 1) {
                document.getElementById("estateopt").innerHTML = `
                <div class="row-start-2 col-start-1">
                    <label for="flat_num" class="tailwind_input_label">Номер квартиры</label>
                    <input class="tailwind_input" name="flat_num" type="number" value="{{ old('flat_num') }}"
                               placeholder="32"/>
                </div>

                <div>
                    <label for="floor" class="tailwind_input_label">Этаж</label>
                    <input class="tailwind_input" name="floor" type="number" placeholder="3"  value=""/>
                </div>

                <div>
                    <label for="rooms" class="tailwind_input_label">Количество комнат</label>
                    <input class="tailwind_input" name="rooms" type="number" placeholder="3"  value=""/>
                </div>

                <div>
                    <label for="total_area" class="tailwind_input_label">Площадь</label>
                    <input class="tailwind_input" name="total_area" type="number"  value="" placeholder="142"/>
                </div>`;
            }
            if (selected.id == 2) {
                document.getElementById("estateopt").innerHTML = `
                <div>
                    <label for="floor" class="tailwind_input_label">Этажность здания</label>
                    <input class="tailwind_input" name="floor" type="number" placeholder="2"  value=""/>
                </div>

                <div>
                    <label for="rooms" class="tailwind_input_label">Количество комнат</label>
                    <input class="tailwind_input" name="rooms" type="number" placeholder="4"  value=""/>
                </div>

                <div>
                    <label for="total_area" class="tailwind_input_label">Площадь</label>
                    <input class="tailwind_input" name="total_area" type="number"  value="" placeholder="90"/>
                </div>`;
            }
            if (selected.id == 3) {
                document.getElementById("estateopt").innerHTML = `
                <div>
                    <label for="total_area" class="tailwind_input_label">Площадь</label>
                    <input class="tailwind_input" name="total_area" type="number" placeholder="612"  value=""/>
                </div>`
            }
            if (selected.id == 0) {
                document.getElementById("estateopt").innerHTML = "";
            }
            document.getElementById("estate_type").value = selected.id;
            //console.log(document.getElementById("estate_type").value);
        }
    </script>
    <div class="p-6">
        <form action="{{route('create_sell')}}" method="post">
            @csrf
            <div class="card">
                <p class="text-2xl font-bold mb-4">Данные клиента</p>
                <div class="input_group grid grid-cols-3 gap-4">
                    <div class="col-start-1 col-end-1">
                        <label for="middlename" class="tailwind_input_label">Фамилия</label>
                        <input class="tailwind_input" name="middlename" type="text" placeholder="..."
                               value="{{ $user->middle_name }}"
                               readonly/>
                    </div>
                    <div class="col-start-2 col-end-2">
                        <label for="firstname" class="tailwind_input_label">Имя</label>
                        <input class="tailwind_input" name="firstname" type="text" value="{{ $user->first_name }}"
                               readonly/>
                    </div>
                    <div class="col-start-3 col-end-3">
                        <label for="lastname" class="tailwind_input_label">Отчество</label>
                        <input class="tailwind_input" name="lastname" type="text" placeholder="..."
                               value="{{ $user->last_name }}" readonly/>
                    </div>
                    <div>
                        <label for="phone" class="tailwind_input_label">Номер телефона</label>
                        <input class="tailwind_input" name="phone" type="tel" placeholder="8xxx-xxx-xx-xx"
                               value="{{ $payload->phone }}"
                               readonly/>
                    </div>
                    <div>
                        <label for="email" class="tailwind_input_label">Эл. почта</label>
                        <input class="tailwind_input" name="email" type="email" value="{{ $payload->email }}"
                               placeholder="..."
                               readonly/>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="text-2xl font-bold mb-4">Адрес</h2>
                <div class="input_group grid grid-cols-3 grid-rows-2 gap-4">
                    <div class="row-start-1 col-start-1">
                        <label for="city" class="tailwind_input_label">Город</label>
                        <input class="tailwind_input" name="city" type="text" value="{{ old('city') }}"
                               placeholder="Москва"/>
                    </div>
                    <div class="row-start-1 col-start-2">
                        <label for="street" class="tailwind_input_label">Улица</label>
                        <input class="tailwind_input" name="street" type="text" value="{{ old('street') }}"
                               placeholder="Главная"/>
                    </div>
                    <div class="row-start-1 col-start-3">
                        <label for="house_num" class="tailwind_input_label">Номер дома</label>
                        <input class="tailwind_input" name="house_num" type="number" value="{{ old('house_num') }}"
                               placeholder="13"/>
                    </div>
                    <div class="row-start-2 col-start-1">
                        <label for="latitude" class="tailwind_input_label">Широта</label>
                        <input class="tailwind_input" name="latitude" type="number" min="-90" max="90" value="{{ old('latitude') }}"
                               placeholder="76.32"/>
                    </div>
                    <div class="row-start-2 col-start-2">
                        <label for="longitude" class="tailwind_input_label">Долгота</label>
                        <input class="tailwind_input" name="longitude" type="number" min="0" max="180" value="{{ old('longtitude') }}"
                               placeholder="122.13"/>
                    </div>
                </div>
            </div>

            <div class="card">
                <p class="text-2xl font-bold mb-4">Данные объекта</p>
                <select class="tailwind_input mb-4" onload="optchange(this)" onchange="optchange(this)"
                        required
                        name="estate_type"
                        id="opt">
                    <option id="0" value="">Выбeрите тип недвижимости</option>
                    <option id="1">Квартира</option>
                    <option id="2">Дом</option>
                    <option id="3">Земельный участок</option>
                </select>
                <div id="estateopt" class="grid grid-cols-3 gap-4 mb-4">
                    {{-- содержимое меняется скриптом --}}
                </div>
                <label for="price" class="tailwind_input_label">Цена продажи</label>
                <input class="tailwind_input" name="price" type="number" value="{{ old('price') }}" placeholder="312000"/>

                <input type="hidden" id="estate_type" name="estate_type" type="text" value=""/>
                <input type="hidden" name="user_id" type="number" value="{{ $user->id }}"/>
            </div>
            <button type="submit" class="primary_button mt-4">Выставить недвижимость на продажу</button>
        </form>
    </div>
@endsection
