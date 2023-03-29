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
                                        <h1 class="h4 text-gray-900 mb-4">Insert new User</h1>
                                    </div>
                                    <form method="POST" action="{{ route('user.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">First Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="first_name"
                                                class="form-control form-control-user" placeholder="Enter First Name..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="last_name"
                                                class="form-control form-control-user" placeholder="Enter Last Name..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role <sup class="text-danger">*</sup></label>
                                            <select name="role" class="form-control form-control-user">
                                                <option value="1">Operator</option>
                                                <option value="0">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email <sup class="text-danger">*</sup></label>
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password <sup class="text-danger">*</sup></label>
                                            <input type="password" name="password" value=""
                                                class="form-control form-control-user" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm Password <sup
                                                    class="text-danger">*</sup></label>
                                            <input type="password" name="confirm_password" value=""
                                                class="form-control form-control-user" placeholder="Confirm Password"
                                                required>
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
                                            Insert
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
