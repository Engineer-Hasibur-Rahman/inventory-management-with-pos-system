<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPos;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;

class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $customers = Customer::all();
        $categorys = Category::all();
       
        $products = Product::where('category_id' )->get();
        return view('Sales.salesshow', compact('categorys','sales','products','customers'));


      
    }
    public function SalesList(){
        $sales = SalesPos::all();
        return view('Sales.salesList', compact('sales'));
    }

    public function getPorduct($id)
    {
        if($id=='all')
        {
            $products=Product::all();
            return response()->json($products);

        }else
        {
            $products = Product::where('category_id',$id)->get();
            return response()->json($products);
        }

        
        
    }  










    ////customer 
    public function CustomerSto(Request $request){
        $validateData = $request->validate([
            'customer_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
        
            'address' => 'required',
        ]);
        $customer= new Customer;
        $customer->customer_name=$request->customer_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->city=$request->city;
        $customer->country=$request->country;
        $customer->address=$request->address;
        $customer->save();
        $notification = array(
        'message' => 'Customer created',
        'alert-type' => 'success',
        );

      return redirect()->back()->with($notification);
}



}
