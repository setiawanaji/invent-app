@extends('template.dashboard')
@section('content')
    <div>
        <h3>List of Suppliers</h3>
        <div class="card">
            <div class="card-header row">
                <div class="col-md-6 m-0 p-0 pb-3 text-left">
                    <a href="{{ route('supplier.insert') }}" class="btn btn-primary">Insert</a>
                </div>
                <div class="col-md-6 m-0 p-0">
                    <form action="{{ route('supplier.list') }}" method="get" class="d-flex align-items-center">
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
                            <th>Company Name</th>
                            <th>PIC Name</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($supplier as $item)
                            <tr>
                                <td>{{ $i }}.</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->pic_name }}</td>
                                <td>{{ $item->phone_1 }}</td>
                                <td>{{ $item->phone_2 }}</td>
                                <td>{{ $item->address }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="{{ route('supplier.destroy', $item->id) }}" class="btn btn-danger">
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
