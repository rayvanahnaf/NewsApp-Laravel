@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h1>ini halaman create category</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>   
            </div>
        @endif

            <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                {{-- route store --}}
                {{-- untuk penambahan data --}}
                @csrf
                @method('POST')
                <div class="col-12">
                    <label for="inputName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-12">
                    <label for="inputImage" class="form-label">Email</label>
                    <input type="file" class="form-control" id="inputImage" name="image">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-2">
                        <i class="bi bi-eye">Create Project</i>
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
