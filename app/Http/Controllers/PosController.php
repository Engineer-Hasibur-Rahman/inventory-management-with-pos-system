<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SalesPos;

class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $categorys = Category::all();
        $products=Product::all();
        $customers=Customer::all();
        // $this->search();



        return view('Sales.salesshow', compact('categorys','sales','products', 'customers'));
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


    public function storeProductPos(Request $request){






            $pos=new SalesPos;

            $pos->stock=$request->stock;
            $pos->customer_name=$request->name;
            $pos->price=$request->price;
            $pos->quantity=$request->quantity;



            $pos->save();



            return response()->json($pos);








}

public function search(){
    $search_text=$_GET['query'];
    $products=Product::where('name','LIKE','%'.$search_text.'%')->get();
    $sales = SalesPos::all();
    $customers=Customer::all();
    $categorys = Category::all();
    return view('Sales.salesshow')->with('categorys',$categorys)
    ->with('products',$products)
    ->with('sales',$sales)
    ->with('customers',$customers);
}


public function getPos(){


    $pos=SalesPos::all();
    return response()->json([
        'pos'=>$pos,
    ]);

}





}
