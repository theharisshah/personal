<nav class="navbar navbar-expand-lg navbar-light bg-white">
<a class="navbar-brand" href="{{route('diary::home')}}"><img src="{{asset('images/logo.jpeg')}}" class="w-50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{route('diary::home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        <button type="button" class="btn btn-outline-primary mr-2">Login</button>
        <button type="button" class="btn btn-outline-success">Sign Up!</button>
    </div>
</nav>
