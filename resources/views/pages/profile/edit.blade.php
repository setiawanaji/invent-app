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
                                        <h1 class="h4 text-gray-900 mb-4">Edit Profile</h1>
                                    </div>
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">First Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="first_name" value="{{ $profile->first_name }}"
                                                class="form-control form-control-user"
                                                placeholder="Enter First Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="last_name" value="{{ $profile->last_name }}"
                                                class="form-control form-control-user" placeholder="Enter Last Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="{{ $profile->email }}" readonly
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
                                            leave password and confirm password blank if you only want to edit profile
                                            information
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        <a href="{{ route('profile') }}" class="btn btn-light active mr-2">Back to
                                            Profile</a>
                                        <button type="submit" class="btn btn-primary">
                                            Update My Profile
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
