@extends('template.dashboard')
@section('content')
    <style>
        .label {
            width: 150px
        }

        .separator {
            width: 10px
        }
    </style>
    <div>
        <h3>Welcome {{ $profile->first_name }} {{ $profile->last_name }}</h3>
        <div class="card">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td class="label">First Name</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->first_name }}</td>
                        </tr>
                        <tr>
                            <td class="label">Last Name</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->last_name }}</td>
                        </tr>
                        <tr>
                            <td class="label">Email</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->email }}</td>
                        </tr>
                        <tr>
                            <td class="label">Role</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->role == 0 ? 'Admin' : 'Operator' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Registered Date</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="label">Last Updated</td>
                            <td class="separator">:</td>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center">
                                <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>
                                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
