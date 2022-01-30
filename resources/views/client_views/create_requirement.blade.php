@extends('welcome')

@section('title', 'Создать заявку')

@section('content')
    <script>
        function optchange(select) {
            var selected = select.options[select.selectedIndex];
            if (selected.id == 1) {
                document.getElementById("estateopt").innerHTML = `
                <div>
                    <label for="min_s" class="tailwind_input_label">Минимальная площадь</label>
                    <input class="tailwind_input" name="min_s" type="number" placeholder="32"  value=""/>
                </div>

                <div>
                    <label for="max_s" class="tailwind_input_label">Максимальная площадь</label>
                    <input class="tailwind_input" name="max_s" type="number" placeholder="54"  value=""/>
                </div>

                <div>
                    <label for="min_count" class="tailwind_input_label">Минимальное число комнат</label>
                    <input class="tailwind_input" name="min_count" type="number" placeholder="1"  value=""/>
                </div>

                <div>
                    <label for="max_count" class="tailwind_input_label">Максимальное число комнат</label>
                    <input class="tailwind_input" name="max_count" type="number" placeholder="2"  value=""/>
                </div>

                <div>
                    <label for="min_floor" class="tailwind_input_label">Минимальный этаж</label>
                    <input class="tailwind_input" name="min_floor" type="number" placeholder="3"  value=""/>
                </div>

                <div>
                    <label for="max_floor" class="tailwind_input_label">Максимальный этаж</label>
                    <input class="tailwind_input" name="max_floor" type="number"  value="" placeholder="5"/>
                </div>`;
            }
            if (selected.id == 2) {
                document.getElementById("estateopt").innerHTML = `
                <div>
                    <label for="min_s" class="tailwind_input_label">Минимальная площадь</label>
                    <input class="tailwind_input" name="min_s" type="number" placeholder="30"  value=""/>
                </div>

                <div>
                    <label for="max_s" class="tailwind_input_label">Максимальная площадь</label>
                    <input class="tailwind_input" name="max_s" type="number" placeholder="52"  value=""/>
                </div>

                <div>
                    <label for="min_count" class="tailwind_input_label">Минимальное число комнат</label>
                    <input class="tailwind_input" name="min_count" type="number" placeholder="2"  value=""/>
                </div>

                <div>
                    <label for="max_count" class="tailwind_input_label">Максимальное число комнат</label>
                    <input class="tailwind_input" name="max_count" type="number" placeholder="4"  value=""/>
                </div>

                <div>
                    <label for="min_floor" class="tailwind_input_label">Минимум этажей</label>
                    <input class="tailwind_input" name="min_floor" type="number" placeholder="1"  value=""/>
                </div>

                <div>
                    <label for="max_floor" class="tailwind_input_label">Максимум этажей</label>
                    <input class="tailwind_input" name="max_floor" type="number"  value="" placeholder="6"/>
                </div>`;
            }
            if (selected.id == 3) {
                document.getElementById("estateopt").innerHTML = `
                 <div>
                    <label for="min_s" class="tailwind_input_label">Минимальная площадь</label>
                    <input class="tailwind_input" name="min_s" type="number" placeholder="20"  value=""/>
                </div>

                <div>
                    <label for="max_s" class="tailwind_input_label">Максимальная площадь</label>
                    <input class="tailwind_input" name="max_s" type="number" placeholder="100"  value=""/>
                </div>`;
            }
            if (selected.id == 0) {
                document.getElementById("estateopt").innerHTML = "";
            }
            document.getElementById("estate_type").value = selected.id;
            //console.log(document.getElementById("estate_type").value);
        }
    </script>
    <div class="p-6">
        <form action="{{route('create_req')}}" method="post">
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
                <p class="text-2xl font-bold mb-4">Адрес</p>
                <div class="input_group grid grid-cols-4 gap-4">
                    <div class="col-start-1 col-span-2">
                        <label for="city" class="tailwind_input_label">Город</label>
                        <input class="tailwind_input" name="city" type="text" value="{{ old('city') }}"
                               placeholder="Москва"/>
                    </div>
                    <div class="col-start-3 col-span-2">
                        <label for="street" class="tailwind_input_label">Улица</label>
                        <input class="tailwind_input" name="street" type="text" value="{{ old('street') }}" placeholder="Главная"/>
                    </div>
                    <div>
                        <label for="house_num" class="tailwind_input_label">Номер дома</label>
                        <input class="tailwind_input" name="house_num" type="number" value="{{ old('house_num') }}"
                               placeholder="15"/>
                    </div>
                    <div class="hidden">
                        <label for="flat_num" class="tailwind_input_label">Номер квартиры</label>
                        <input class="tailwind_input" name="flat_num" type="number" value="{{ old('flat_num') }}"
                               placeholder="5"/>
                    </div>
                    <div>
                        <label for="min_price" class="tailwind_input_label">Минимальная цена</label>
                        <input class="tailwind_input" name="min_price" type="number" value="{{ old('min_price') }}"
                               placeholder="100000"/>
                    </div>
                    <div>
                        <label for="max_price" class="tailwind_input_label">Максимальная цена</label>
                        <input class="tailwind_input" name="max_price" type="number" value="{{ old('max_price') }}"
                               placeholder="3000000"/>
                    </div>
                </div>
            </div>

            <div class="card">
                <p class="text-2xl font-bold mb-4">Данные объекта</p>
                <select class="tailwind_input" onchange="optchange(this)" required="required" name="estate_type" id="opt">
                    <option id="0" value="">Выбeрите тип недвижимости</option>
                    <option id="1">Квартира</option>
                    <option id="2">Дом</option>
                    <option id="3">Земельный участок</option>
                </select>
                <div id="estateopt" class="grid grid-cols-3 gap-4 mt-4">
                    {{-- содержимое меняется скриптом --}}
                </div>

                <input type="hidden" id="estate_type" name="estate_type" type="text" value="">
                <input type="hidden" name="user_id" type="number" value="{{ $user->id }}">
            </div>
            <button type="submit" class="primary_button">Отправить заявку</button>
        </form>
    </div>
@endsection
