<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SalesPos;
use Gloudemans\Shoppingcart\Facades\Cart;

class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $categorys = Category::all();

        $products=Product::all();
        $customers=Customer::all();
        // $this->search();



        return view('Sales.salesshow', compact('categorys','sales','products', 'customers'));


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

    public function storeProductPos(Request $request,$id){

        Cart::add(['id' => $request->id,
        'name' => $request->name,

        'qty' => 1,
         'price' =>$request->price,
         'stock' =>$request->stock,
         'weight' => 550]);


		return response()->json(['success' => 'Successfully Added on Your Cart']);

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


public function AddMiniCart() {

    $carts = Cart::content();
    $cartQty = Cart::count();
    $cartTotal = Cart::total();
    $cartSubTotal=Cart::subtotalFloat();

    return response()->json(array(
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartSubTotal' => $cartSubTotal,
        'cartTotal' => $cartTotal,

    ));
} // end method


	/// remove mini cart
	public function RemoveMiniCart($rowId) {

		Cart::remove($rowId);
		return redirect()->back();


	} // end mehtod

public function AddToCart(Request $request, $id) {
        Cart::add(['id' => $request->id,
        'name' => $request->name,
        'qty' => $request->quantity,
         'price' =>$request->price,
         'weight' => 550]);


		return response()->json(['success' => 'Successfully Added on Your Cart']);

    }

 // Cart Increment
 public function CartIncrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty+1);

    return response()->json('increment');

} // end mehtod

 // Cart decrement
 public function CartDecrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty-1);

    return response()->json('decrement');

} // end mehtod

}
