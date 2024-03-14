@extends('home.parent')

@section('content')
    <div class="card p-4">
        <div class="row">

            <div class="col-md-6 d-flex justify-content-center">
                @if (empty(Auth::user()->profile->image))
                    <img class="w-25"
                        src="https://ui-avatars.com/api/background=0D8ABC&color=fff?name={{ Auth::user()->name }}"
                        alt="Ini gambar admin">
                @else
                    <img src="{{ Auth::user()->profile->image }}" alt="ini profile image">
                @endif

            </div>
            <div class="col-md-6 text-center justify-content-end">
                <h3>Profile Account</h3>
                <p>{{ Auth::user()->name }}</p>
                <ul class="list-group">
                    <li class="list-group-item">Name Account = <strong>{{ Auth::user()->name }}</strong></li>
                    <li class="list-group-item">Role Email = <strong>{{ Auth::user()->role }}</strong></li>
                    <li class="list-group-item">E-Mail Account = <strong>{{ Auth::user()->email }}</li>
                </ul>
                <br>
                <a href="{{ route('createProfile') }}" class="btn btn-info">
                    <i class="bi bi-plus">Create Profile</i>
                </a>
            </div>
        </div>
    </div>
@endsection
