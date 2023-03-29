@extends('template.dashboard')
@section('content')
    <div>
        <h3>List of Users</h3>
        <div class="card">
            <div class="card-header row">
                <div class="col-md-6 m-0 p-0 pb-3 text-left">
                    <a href="{{ route('user.insert') }}" class="btn btn-primary">Insert</a>
                </div>
                <div class="col-md-6 m-0 p-0">
                    <form action="{{ route('user.list') }}" method="get" class="d-flex align-items-center">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $i }}.</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role == 0 ? 'Admin' : 'Operator' }}</td>
                                <td class="d-flex justify-content-center">
                                    @if ($item->email === Session::get('logged-in')[0]->email)
                                        Logged in
                                    @else
                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    @endif
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
