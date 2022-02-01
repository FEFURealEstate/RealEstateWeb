<script>
    easy_background(".bg_gradient", {
        slide: ["./images/first_bg-min.jpg", "./images/second_bg-min.jpg", "./images/third_bg-min.jpg", "./images/fifth_bg-min.jpg"],
        delay: [4000, 4000, 4000, 4000]
    });
</script>
<div class="card h-2/5 w-2/5">
    <img class="mx-auto mb-4" src="{{ asset('images/big-logo.png') }}" alt="logo" style="width: 130px;">
    <div class="card flex flex-col items-center">
        <p class="text-2xl mb-4 text-center" style="color: #263238;">Платформа для сделок с недвижимостью</p>
        <div>
            <a href="{{ route('sign_in') }}">
                <button class="primary_button" style="width: 13rem;">Войти</button>
            </a>
            <a href="{{ route('sign_up') }}">
                <button class="primary_button" style=" width: 13rem;">Зарегистрироваться</button>
            </a>
        </div>
    </div>
</div>
