<html>
    <a class="btn btn-primary" href="{{route('home')}}">Home</a>
    <a class="btn btn-primary" href="{{route('contactUs')}}">Contact Us</a>
    <a class="btn btn-primary" href="{{route('ourTeams')}}">Our Teams</a>
    <a class="btn btn-primary" href="{{route('aboutUs')}}">About Us</a>

    @If(session()->has('type'))
       <a class="btn btn-danger" href="{{route('logout')}}">Logout</a>
    @else
        <a class="btn btn-primary" href="{{route('login')}}">Login</a>
        <a class="btn btn-primary" href="{{route('register')}}">Sign up</a>
    @endif

</html>
