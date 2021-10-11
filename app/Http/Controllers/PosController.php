<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPos;
use App\Models\Category;
use App\Models\Product;

class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $categorys = Category::all();
       
        $products = Product::where('category_id' )->get();
        return view('Sales.salesshow', compact('categorys','sales','products'));
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
}
