<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Title;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class UploadController extends Controller
{
    public function getCustomer()
    {
        $customers = Customer::all()->toArray();
        $products = Product::all()->toArray();
        $response = [
            'customer' => $customers,
            'product' => $products
        ];
        return response()->json($response);
    }
    //direct to excel upload page
    public function goUploadPage()
    {
        $title = Title::get()->last();
        $products = Product::all();
        $customers = Customer::all();
        return view("upload", compact("customers", "products", 'title'));
    }
    // store participants
    public function store(Request $request)
    {
        $customerFile = $request->file("CustomerUpload");
        $this->checkCustomerUploadValidation($request);
        try {
            Customer::truncate();
            Excel::import(new CustomersImport, $customerFile);
            return redirect()->back()->with("success", "Customers upload Successfully");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('errorType', 'customer');
        }

    }
    //store products
    public function storeProduct(Request $request)
    {
        $productFile = $request->file("ProductUpload");
        $this->checkProductUploadValidation($request);
        try {
            Product::truncate();
            Excel::import(new ProductsImport, $productFile);
            return redirect()->back()->with("PSuccess", "Products upload Successfully");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('errorType', 'product');
        }
    }

    private function checkProductUploadValidation(Request $request)
    {
        Validator::make($request->all(), [
            'ProductUpload' => 'required',
        ])->validate();
    }

    private function checkCustomerUploadValidation(Request $request)
    {
        Validator::make($request->all(), [
            'CustomerUpload' => 'required',
        ])->validate();
    }


}
