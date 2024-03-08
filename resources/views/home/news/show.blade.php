@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h5 class="title">
                {{ $news->title }}- <span class="badge bg-success text-white">{{ $news->category->name }}</span>
            </h5>

            <div id="editor" disabled>
                <img src="{{ $news->image }} " width="500px" alt="ini judul berita">
                {!! $news->content !!}
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
            

            <div class="container mt-2">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('category.index') }}"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
