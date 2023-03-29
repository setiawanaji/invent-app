<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Stocks;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class StockController extends Controller
{
    protected $date;
    protected $document_number;
    protected $supplier_id;
    protected $product_id;
    protected $qty;
    protected $type;
    protected $remark;
    protected $document_file;
    function list() {
        $data['stock'] = Stocks::join('products', 'stocks.product_id', '=', 'products.id')
            ->leftJoin('suppliers', 'stocks.supplier_id', '=', 'suppliers.id')
            ->orderBy('stocks.created_at', 'desc')
            ->get(['stocks.*', 'products.name as product_name', 'suppliers.company_name as supplier_name', 'suppliers.pic_name as supplier_pic_name']);

        return view("pages.stock.list", $data);
    }
    public function stock_in()
    {
        $data['supplier'] = Suppliers::all();
        $data['product'] = Products::all();
        return view("pages.stock.stock_in", $data);
    }
    public function stock_in_store(Request $request)
    {
        $filename = Str::random(20) . '.' . $request->file('document_file')->getClientOriginalExtension();
        $path = $request->file('document_file')->storeAs('public/documents', $filename);
        if (!$path) {
            return Redirect::back()->withErrors(['message' => 'Something wrong when upload file, please contact developers']);
        }
        $this->date = $request->get('date');
        $this->document_number = $request->get('document_number');
        $this->supplier_id = $request->get('supplier_id');
        $this->document_file = $filename;
        $this->type = '1';

        $product_id = $request->get('product_id');
        for ($i = 0; $i < count($product_id); $i++) {
            $this->product_id = $request->get('product_id')[$i];
            $this->qty = $request->get('qty')[$i];
            $this->remark = $request->get('remark')[$i];
            $payload = [
                'date' => $this->date,
                'document_number' => $this->document_number,
                'supplier_id' => $this->supplier_id,
                'product_id' => $this->product_id,
                'qty' => $this->qty,
                'type' => $this->type,
                'remark' => $this->remark,
                'document_file' => $this->document_file,
            ];
            $model = Products::find($this->product_id);
            $model->stock += $this->qty;
            $model->save();
            Stocks::create($payload);
        }
        return redirect()->route('stock.list');
    }
    public function stock_out()
    {
        $data['supplier'] = Suppliers::all();
        $data['product'] = Products::all();
        return view("pages.stock.stock_out", $data);
    }
    public function stock_out_store(Request $request)
    {
        $filename = Str::random(20) . '.' . $request->file('document_file')->getClientOriginalExtension();
        $path = $request->file('document_file')->storeAs('public/documents', $filename);
        if (!$path) {
            return Redirect::back()->withErrors(['message' => 'Something wrong when upload file, please contact developers']);
        }
        $this->date = $request->get('date');
        $this->document_number = $request->get('document_number');
        $this->supplier_id = null;
        $this->document_file = $filename;
        $this->type = '2';

        $product_id = $request->get('product_id');
        for ($i = 0; $i < count($product_id); $i++) {
            $this->product_id = $request->get('product_id')[$i];
            $this->qty = $request->get('qty')[$i];
            $this->remark = $request->get('remark')[$i];
            $payload = [
                'date' => $this->date,
                'document_number' => $this->document_number,
                'supplier_id' => $this->supplier_id,
                'product_id' => $this->product_id,
                'qty' => $this->qty,
                'type' => $this->type,
                'remark' => $this->remark,
                'document_file' => $this->document_file,
            ];
            $model = Products::find($this->product_id);
            $model->stock -= $this->qty;
            $model->save();
            Stocks::create($payload);
        }
        return redirect()->route('stock.list');
    }
    public function stock_opname()
    {
        $data['supplier'] = Suppliers::all();
        $data['product'] = Products::all();
        return view("pages.stock.stock_opname", $data);
    }
    public function stock_opname_store(Request $request)
    {
        $filename = Str::random(20) . '.' . $request->file('document_file')->getClientOriginalExtension();
        $path = $request->file('document_file')->storeAs('public/documents', $filename);
        if (!$path) {
            return Redirect::back()->withErrors(['message' => 'Something wrong when upload file, please contact developers']);
        }
        $this->date = $request->get('date');
        $this->document_number = $request->get('document_number');
        $this->supplier_id = null;
        $this->document_file = $filename;
        $this->type = '0';

        $product_id = $request->get('product_id');
        for ($i = 0; $i < count($product_id); $i++) {
            $this->product_id = $request->get('product_id')[$i];
            $this->qty = $request->get('qty')[$i];
            $this->remark = $request->get('remark')[$i];
            $payload = [
                'date' => $this->date,
                'document_number' => $this->document_number,
                'supplier_id' => $this->supplier_id,
                'product_id' => $this->product_id,
                'qty' => $this->qty,
                'type' => $this->type,
                'remark' => $this->remark,
                'document_file' => $this->document_file,
            ];
            $model = Products::find($this->product_id);
            $model->stock = $this->qty;
            $model->save();
            Stocks::create($payload);
        }
        return redirect()->route('stock.list');
    }
}
