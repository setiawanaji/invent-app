@extends('template.dashboard')
@section('content')
    <div>
        <h3>List of Products</h3>
        <div class="card">
            <div class="card-header row">
                <div class="col-md-6 m-0 p-0 pb-3 text-left">
                    <a href="{{ route('product.insert') }}" class="btn btn-primary">Insert</a>
                </div>
                <div class="col-md-6 m-0 p-0">
                    <form action="{{ route('product.list') }}" method="get" class="d-flex align-items-center">
                        <input type="search" name="search" class="form-control" placeholder="Search"
                            value="{{ $search }}" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Picture</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $i }}.</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ number_format($item->stock) }}</td>
                                <td>
                                    <a href="{{ url('/storage/uploads/' . $item->picture) }}" target="_blank">
                                        View Picture
                                    </a>
                                </td>
                                <td>{{ $item->description }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="{{ route('product.destroy', $item->id) }}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
