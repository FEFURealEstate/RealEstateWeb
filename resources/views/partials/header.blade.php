<div class="flex bg-white justify-end">
    @if (Route::has('sign_in'))
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('sign_in') }}">Log in</a>

            @if (Route::has('sign_up'))
                <a href="{{ route('sign_up') }}">Register</a>
            @endif
        @endauth
    @endif
    @php
        use App\Enums\Roles;

        $user = \Illuminate\Support\Facades\Auth::user();
        if(Auth::check())
        {
            $user_id = $user->id;

            if (\App\Models\PersonSet_Admin::whereId($user_id)->first() !== null)
                $role = Roles::ADMIN;
            elseif (\App\Models\PersonSet_Agent::whereId($user_id)->first() !== null)
                $role = Roles::AGENT;
            elseif (\App\Models\PersonSet_Client::whereId($user_id)->first() !== null)
                $role = Roles::CLIENT;
        }
    @endphp
    @auth
        @if($role === Roles::CLIENT)
            @include("rights.client")
        @endif
        @if($role === Roles::AGENT)
            @include("rights.agent")
        @endif
        @if($role === Roles::ADMIN)
            @include("rights.admin")
        @endif
    @endauth
</div>
