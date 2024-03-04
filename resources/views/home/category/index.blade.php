@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category</h3>

            <div class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus">Create Project</i>
                </a>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Card</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($category as $row)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td><img src="{{ $row->image }}" alt="ini gambar" width="100px"></td>
                                        <td class="d-flex gap-2">
                                            <!-- show using  modal by id {{ $row->id }} -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $row->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @include('home.category.includes.modal-show')
                                            <!-- End Basic Modal-->

                                            {{-- button edit with route category.edit {{ row->id }} --}}
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            {{-- button delete with route category.destroy {{ row->id }} --}}
                                            <form action="{{ route('category.destroy', $row->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <p>Belum ada data nih!!, input data yuk!! 😁</p>
                                @endforelse

                            </tbody>
                        </table>
                        {{-- paginate --}}
                        {{ $category->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
