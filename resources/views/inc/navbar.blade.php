<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
        
        <a class="navbar-brand" href="/">{{config('app.name','PlayerTracker')}}</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/posts">Players</a></li>
            <li><a href="/api_data">Premier Leauge Standings</a></li>
        </ul>

        
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li><a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
        @else
        <li class="dropdown">
            

                <li><a href="/home">Your Scouted Player Register</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
           
        </li>
        @endif
    </div>
</div>
</nav>

        