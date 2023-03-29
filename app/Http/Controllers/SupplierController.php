<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    protected $company_name;
    protected $pic_name;
    protected $phone_1;
    protected $phone_2;
    protected $address;
    function list(Request $request) {
        $search = $request->get('search');
        $data['supplier'] = Suppliers::where('company_name', 'LIKE', '%' . $search . '%')
            ->orWhere('pic_name', 'LIKE', '%' . $search . '%')
            ->orWhere('phone_1', 'LIKE', '%' . $search . '%')
            ->orWhere('phone_2', 'LIKE', '%' . $search . '%')
            ->orWhere('address', 'LIKE', '%' . $search . '%')
            ->get();
        $data['search'] = $search;
        return view("pages.supplier.list", $data);
    }
    public function insert()
    {
        return view("pages.supplier.insert");
    }
    public function store(Request $request)
    {
        $this->company_name = $request->get('company_name');
        $this->pic_name = $request->get('pic_name');
        $this->phone_1 = $request->get('phone_1');
        $this->phone_2 = $request->get('phone_2');
        $this->address = $request->get('address');
        $payload = [
            'company_name' => $this->company_name,
            'pic_name' => $this->pic_name,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'address' => $this->address,
        ];
        $inserted = Suppliers::create($payload);
        if ($inserted) {
            return redirect()->route('supplier.list');
        } else {
            return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
        }
    }
    public function edit($id)
    {
        $data['supplier'] = Suppliers::find($id);
        $data['id'] = $id;
        return view("pages.supplier.edit", $data);
    }
    public function update(Request $request, $id)
    {
        $this->company_name = $request->get('company_name');
        $this->pic_name = $request->get('pic_name');
        $this->phone_1 = $request->get('phone_1');
        $this->phone_2 = $request->get('phone_2');
        $this->address = $request->get('address');
        $payload = [
            'company_name' => $this->company_name,
            'pic_name' => $this->pic_name,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'address' => $this->address,
        ];
        $updated = Suppliers::find($id)->update($payload);
        if ($updated) {
            return redirect()->route('supplier.list');
        } else {
            return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
        }
    }
    public function destroy($id)
    {
        $deleted = Suppliers::destroy($id);
        if ($deleted) {
            return redirect()->route('supplier.list');
        } else {
            echo "<script>alert('Something wrong, please contact developers')</script>";
            return redirect()->route('supplier.list');
        }
    }
}
