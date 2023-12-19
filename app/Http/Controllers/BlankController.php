<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlankController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        $customers = Customer::all()->toArray();

        $response = [
            'customer' => $customers,
            'product' => $products
        ];
        return response()->json($response);
    }

    public function creat()
    {
        $title = Title::get()->last();
        $products = Product::all();
        $customers = Customer::all();
        return view("blank", compact("customers", "products", 'title'));
    }


    public function store(Request $request)
    {
        $this->checkBlankValidation($request);
        $customers = Customer::count();
        $products = Product::count();
        $save_length = 0;
        if ($customers > $products) {
            $save_length = $customers - $products;
        }
        $blankProduct = $request->blank;
        for ($i = 0; $i < $save_length; $i++) {
            $product = new Product;
            $product->name = $blankProduct;
            $product->description = $blankProduct;
            $product->save();
        }
        return redirect()->route('PickWinner');
    }

    private function checkBlankValidation(Request $request)
    {
        Validator::make($request->all(), [
            'blank' => 'required',
        ], [
            'blank.required' => 'ကံစမ်းမဲအမည်ထည့်ရန်လိုပါသည်...',
        ])->validate();
    }
}
