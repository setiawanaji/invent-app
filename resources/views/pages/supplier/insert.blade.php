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
                                        <h1 class="h4 text-gray-900 mb-4">Insert new Supplier</h1>
                                    </div>
                                    <form method="POST" action="{{ route('supplier.insert') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Company Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="company_name"
                                                class="form-control form-control-user" required
                                                placeholder="Enter Company Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">PIC Name <sup class="text-danger">*</sup></label>
                                            <input type="text" name="pic_name" class="form-control form-control-user"
                                                required placeholder="Enter PIC Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number 1 <sup
                                                    class="text-danger">*</sup></label>
                                            <input type="text" name="phone_1" class="form-control form-control-user"
                                                required placeholder="Enter Phone Number 1...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number 2</label>
                                            <input type="text" name="phone_2" class="form-control form-control-user"
                                                placeholder="Enter Phone Number 2...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Company Address <sup
                                                    class="text-danger">*</sup></label>
                                            <textarea type="text" name="address" required class="form-control form-control-user"
                                                placeholder="Enter Company Address..."></textarea>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        <a href="{{ route('supplier.list') }}" class="btn btn-light active mr-2">
                                            Back</a>
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
