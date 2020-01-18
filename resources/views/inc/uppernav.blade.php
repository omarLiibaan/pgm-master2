@if (!auth()->guest())
<div class="upper_nav jl_width">
    <a href="/" class="logo">PGM</a>
    <div>
        <a href=""><i class="fas fa-envelope"></i></a>
        <a href=""><i class="fas fa-bell"></i></a>
        <a href="{{route('logout')}}"
            class="logoutBtn"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Se déconnecter&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            {{csrf_field()}}
        </form>
    </div>

    <img class="six_sides_img" src="{{asset('img/6sides.svg')}}">
</div>
@endif