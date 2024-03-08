@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>News Create</h3>
            <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-2">
                    <label for="inputTitle" class="form-label">News title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}">

                    <label for="inputImage" class="form-label">News Image</label>
                    <input type="file" class="form-control" id="inputImage" name="image" value="{{ old('title') }}">
                </div>
                <label class="col-sm-2 col-form-label">Content Select</label>

                <div class="cols">
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>===== Choose Category =====</option>
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-2">
                    <label for="inputTitle" class="form-label">Content News</label>
                    <textarea id="editor" name="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam debitis soluta unde dolor, neque excepturi sint assumenda, asperiores sequi earum repellat labore, itaque dolorem doloremque repellendus. Est, aliquam totam! Minima dolore possimus doloremque maxime quibusdam natus itaque quae dignissimos! Vitae quos nihil perspiciatis, at magni odio neque error sunt vel? Magnam rem, nulla explicabo laborum quisquam exercitationem eum non at mollitia nam nesciunt! Quos rerum tenetur itaque atque quas ea sed quisquam optio architecto harum aliquam consectetur rem assumenda ab, corporis repellendus ut commodi aperiam quod voluptas fugiat ratione debitis maiores. Odit autem ab consectetur voluptas facilis facere accusantium voluptatem.</textarea>
                </div>


                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-plus"></i>
                        Create News
                    </button>
                </div>

                
            </form>
        </div>
    </div>
@endsection
