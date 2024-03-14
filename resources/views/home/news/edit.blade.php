@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>News Create</h3>

            <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- field untuk title --}}
                {{-- name berfungsi untuk mengirimkan data ke controller --}}
                {{-- fungsi old berfungsi untuk menampilkan kembali inputan user --}}
                <div class="mb-2">
                    <label for="inputTitle" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $news->title }}">
                </div>


                {{-- field untuk image --}}
                {{-- image berfungsi untuk mengirimkan data ke controller --}}
                {{-- fungsi old berfungsi untuk menampilkan kembali inputan user --}}
                <div class="mb-2">
                    <label for="inputImage" class="form-label">News Title</label>
                    <input type="file" class="form-control" id="inputImage" name="image" value="{{ old('image') }}">
                </div>

                {{-- @foreach ($category as $row)
        <div class="col">
            ID = {{ $row->id }}
            NAME = {{ $row->name }}
        </div>
        @endforeach --}}
                
                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">Select</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option selected value="{{ $news->category->id }}">{{ $news->category->name }}</option>
                            <option>=== Chose Category ===</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- name berfungsi untuk mengirimkan data ke controller --}}
                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">Content News</label>
                    <textarea name="content" id="editor">{!! $news->content !!}</textarea>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-warning" type="submit">
                        <i class="bi bi-pencil">update News</i>
                    </button>
                </div>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </form>
        </div>
    </div>
@endsection
