@extends('template.dashboard')
@section('content')
    <div>
        <h3>List of Stock History</h3>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('stock.in') }}" class="btn btn-primary m-1">Stock In</a>
                <a href="{{ route('stock.out') }}" class="btn btn-warning m-1">Stock Out</a>
                <a href="{{ route('stock.opname') }}" class="btn btn-danger m-1">Stock Opname</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Supplier</th>
                            <th>Qty</th>
                            <th>Type</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($stock as $item)
                            <tr>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>
                                    @if ($item->supplier_name)
                                        {{ $item->supplier_name }} ({{ $item->supplier_pic_name }})
                                    @endif
                                </td>
                                <td>{{ number_format($item->qty) }}</td>
                                <td>
                                    @if ($item->type == 0)
                                        <span class="badge badge-danger">Opname</span>
                                    @elseif($item->type == 1)
                                        <span class="badge badge-primary">Stock In</span>
                                    @elseif($item->type == 2)
                                        <span class="badge badge-warning">Stock Out</span>
                                    @endif
                                </td>
                                <td>{{ $item->remark }}</td>
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
