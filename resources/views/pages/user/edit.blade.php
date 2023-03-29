<!DOCTYPE html>
<html lang="en">
@include('components.head')

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Update User</h1>
                                    </div>

                                    <form method="POST" action="{{ route('user.update', $id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">First Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="first_name" value="{{ $user->first_name }}"
                                                class="form-control form-control-user"
                                                placeholder="Enter First Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="last_name" value="{{ $user->last_name }}"
                                                class="form-control form-control-user" placeholder="Enter Last Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role <sup class="text-danger">*</sup></label>
                                            <select name="role" class="form-control form-control-user">
                                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>
                                                    Operator
                                                </option>
                                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control form-control-user"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" value=""
                                                class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="confirm_password" value=""
                                                class="form-control form-control-user" placeholder="Confirm Password">
                                        </div>
                                        <div class="alert alert-info">
                                            leave password and confirm password blank if you only want to edit user
                                            information
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        <a href="{{ route('user.list') }}" class="btn btn-light active mr-2">
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @include('components.footer')
</body>

</html>
