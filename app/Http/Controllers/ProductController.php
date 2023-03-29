<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $name;
    protected $category;
    protected $picture;
    protected $stock;
    protected $description;
    protected static $categories = [
        "Electronics", "Clothing and apparel", "Beauty and personal care", "Health and wellness", "Home and garden", "Sports and outdoors", "Toys and games", "Food and beverages", "Automotive", "Office supplies", "Books and media", "Arts and crafts", "Furniture and decor",
    ];
    function list(Request $request) {
        $search = $request->get('search');
        $data['product'] = Products::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('category', 'LIKE', '%' . $search . '%')
            ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->get();
        $data['search'] = $search;
        return view("pages.product.list", $data);
    }
    public function insert()
    {
        $data['categories'] = self::$categories;
        return view("pages.product.insert", $data);
    }
    public function store(Request $request)
    {
        $filename = Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension();
        $path = $request->file('picture')->storeAs('public/uploads', $filename);
        $this->name = $request->get('name');
        $this->category = $request->get('category');
        $this->picture = $filename;
        $this->description = $request->get('description');
        if ($path) {
            $payload = [
                'name' => $this->name,
                'category' => $this->category,
                'picture' => $this->picture,
                'stock' => 0,
                'description' => $this->description,
            ];
            $inserted = Products::create($payload);
            if ($inserted) {
                return redirect()->route('product.list');
            } else {
                return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
            }
        } else {
            echo "<script>alert('Something wrong when upload file, please contact developers')</script>";
            return redirect()->route('product.list');
        }
    }
    public function edit($id)
    {
        $data['categories'] = self::$categories;
        $data['product'] = Products::find($id);
        $data['id'] = $id;
        return view("pages.product.edit", $data);
    }
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $this->name = $request->get('name');
        $this->category = $request->get('category');
        $this->description = $request->get('description');
        $payload = [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
        ];
        if ($request->file('picture')) {
            Storage::delete('public/uploads/' . $product->picture);
            $filename = Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension();
            $path = $request->file('picture')->storeAs('public/uploads', $filename);
            $this->picture = $filename;
            $payload['picture'] = $this->picture;
            if (!$path) {
                echo "<script>alert('Something wrong when upload file, please contact developers')</script>";
                return redirect()->route('product.list');
            }
        }
        $updated = Products::find($id)->update($payload);
        if ($updated) {
            return redirect()->route('product.list');
        } else {
            return Redirect::back()->withErrors(['message' => 'Something wrong, please contact developers']);
        }
    }
    public function destroy($id)
    {
        $deleted = Products::destroy($id);
        if ($deleted) {
            return redirect()->route('product.list');
        } else {
            echo "<script>alert('Something wrong, please contact developers')</script>";
            return redirect()->route('product.list');
        }
    }
}
