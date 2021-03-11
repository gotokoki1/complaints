@section('header')
<header class="navbar_navbar-dark_bg-dark">
    <div class="nav">
        <a class="navbar-brand" href="{{ url('/post/') }}">COMPLAINTS</a>
        @if(Auth::check())
          <span class="my-navbar-item">ようこそ, {{ Auth::user()->name }}さん</span>
          <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
          <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif
        @if(Auth::check())
          <script>
              document.getElementById('logout').addEventListener('click', function(event) {
              event.preventDefault();
              document.getElementById('logout-form').submit();
              });
          </script>
        @endif
    </div>
</header>
@endsection