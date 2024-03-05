@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category Update</h3>
            @if (session('update'))
                <div class="alert alert-warning">
                    {{ session('update') }}
                </div>
            @endif

            <hr>
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="inputName" class="form-label">Category Update</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $category->name }}">
                </div>
                <div class="col-12">
                    <label for="inputImage" class="form-label">Email</label>
                    <input type="file" class="form-control" id="inputImage" name="image">
                </div>
                <div class="d-flex justify-content-end ">
                    <a href="{{ route('category.index') }}" class="btn btn-primary mx-2">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <button type="submit" class="btn btn-warning ">
                        <i class="bi bi-pencil-square">Update Category</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
