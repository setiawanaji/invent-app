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
                                        <h1 class="h4 text-gray-900 mb-4">Insert new Product</h1>
                                    </div>
                                    <form method="POST" action="{{ route('product.insert') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" class="form-control form-control-user"
                                                placeholder="Enter Product Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category" class="form-control form-control-user">
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Picture</label>
                                            <input type="file" name="picture" class="form-control form-control-file"
                                                accept="image/*" />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description Product</label>
                                            <textarea name="description" class="form-control form-control-user" placeholder="Enter Description Product..."></textarea>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        <a href="{{ route('product.list') }}" class="btn btn-light active mr-2">
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
