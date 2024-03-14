@extends('home.parent')

@section('content')
    <div class="container">
        <div class="row card">
            <h1>Welcome {{ Auth::user()->name }}</h1>
            <hr>
            <div class="card p-4">
                <ul class="list-group">
                    <li class="list-group-item">Name Account = <strong>{{ Auth::user()->name }}</strong></li>
                    <li class="list-group-item">Role Email = <strong>{{ Auth::user()->role }}</strong></li>
                    <li class="list-group-item">E-Mail Account = <strong>{{ Auth::user()->email }}</li>
                </ul>
            </div>
            <hr>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger">
                    Logout
                </button>
            </form>
        </div>

    </div>
@endsection
