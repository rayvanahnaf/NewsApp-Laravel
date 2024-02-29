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
                                        <td>
                                            <!-- Basic Modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $row->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Category Name : <strong class="text-uppercase fw-bold">{{ $row->name }}</strong></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center" >
                                                            <img src="{{ $row->image }}" alt="image"class="img-thumbnail">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Basic Modal-->
                                        </td>
                                    </tr>

                                @empty
                                    <p>belum ada data, data masih kosong</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
