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
                                <div class="p-3">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Stock Out</h1>
                                    </div>
                                    <form method="POST" action="{{ route('stock.out.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Date <sup class="text-danger">*</sup></label>
                                                    <input type="date" name="date"
                                                        class="form-control form-control-user"
                                                        value="{{ date('Y-m-d') }}" placeholder="Enter Date..."
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Document Number <sup
                                                            class="text-danger">*</sup></label>
                                                    <input type="text" name="document_number"
                                                        class="form-control form-control-user"
                                                        placeholder="Enter Document Number..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Document File <sup
                                                            class="text-danger">*</sup></label>
                                                    <input type="file" name="document_file"
                                                        class="form-control form-control-user" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="pb-3">
                                            <button class="btn btn-info" id="addProduct">Add Product</button>
                                            <div class="mt-3" id="productsContainer">
                                                <div class="mb-2 card card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">
                                                                    Product <sup class="text-danger">*</sup>
                                                                </label>
                                                                <select name="product_id[]"
                                                                    class="form-control form-control-user">
                                                                    @foreach ($product as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Qty <sup
                                                                        class="text-danger">*</sup></label>
                                                                <input type="number" name="qty[]"
                                                                    class="form-control form-control-user"
                                                                    placeholder="Qty..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-8 col-md-5">
                                                            <div class="form-group">
                                                                <label for="">Remark</label>
                                                                <input type="text" name="remark[]"
                                                                    class="form-control form-control-user"
                                                                    placeholder="Remark..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="alert alert-info">
                                            before you submit, make sure all the data is correct
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif
                                        <a href="{{ route('stock.list') }}" class="btn btn-light active mr-2">
                                            Back
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            Submit Data
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
<script>
    $('#addProduct').click((e) => {
        e.preventDefault();
        $("#productsContainer").append(`
            <div class="mb-2 card card-body productItem">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-danger" type="button" onClick="removeProduct(this)">Remove</button>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">
                                Product <sup class="text-danger">*</sup>
                            </label>
                            <select name="product_id[]"
                                class="form-control form-control-user">
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="form-group">
                            <label for="">Qty <sup
                                    class="text-danger">*</sup></label>
                            <input type="number" name="qty[]"
                                class="form-control form-control-user"
                                placeholder="Qty..." required>
                        </div>
                    </div>
                    <div class="col-8 col-md-5">
                        <div class="form-group">
                            <label for="">Remark</label>
                            <input type="text" name="remark[]"
                                class="form-control form-control-user"
                                placeholder="Remark..." required>
                        </div>
                    </div>
                </div>
            </div>
        `);
    })
    $("#removeProduct").click((e) => {
        e.preventDefault();
        alert("del")
    })
    const removeProduct = (el) => {
        $(el).parents('.productItem').remove();
    }
</script>
