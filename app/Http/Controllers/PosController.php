<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\SalesPos;
use PDF;
use Gloudemans\Shoppingcart\Facades\Cart;




class PosController extends Controller
{
    public function SalesShow(Request $request){
        $sales = SalesPos::all();
        $customers = Customer::all();
        $categorys = Category::all();

        $products=Product::all();
        $purcahse=Purchase::all();
        // $all_products=collect([]);
        // foreach($purcahse as $p){
        //     $product_id= $p->product_id;
        //     $product=Product::where('id',$product_id)->first();
        //     $product_cat=$product->category_id;

        //     $product_category= Product::where('category_id', $product_cat)->first();


        //     // array_push($all_products,$products);
        //     $all_products->push($product_category);
        // }
        // dd( $product_category);
        // dd($product_cat);
        // return json_encode($all_products);
        // dd($all_products);
        // dd($products);
    //     $purcahse=Purchase::all();
    //     $all_products=[];
    //     foreach($purcahse as $p){
    //         $product_id= $p->product_id;
    //         $products=Product::where('id',$product_id)->get();
    //         array_push($all_products,$products);





    //     }
    //    dd(json_encode($all_products));



        // foreach($purcahse as $p){
        //     $product_id= $p->product_id;
        //     $products=Product::where('id','=',$product_id)->get();




        // }
        // $product_id= $purcahse->product_id;
        // dd($product_id);

        // dd($products);

        $customers=Customer::all();
        // $this->search();



        return view('Sales.salesshow', compact('categorys','sales','products', 'customers'));


        $products = Product::where('category_id' )->get();

        return view('Sales.salesshow', compact('categorys','sales','products','customers'));


    }
    public function SalesList(){
        $sales = SalesPos::all();
        // $products = Product::all();
        return view('Sales.salesList', compact('sales'));
    }
    public function getPorduct($id)
    {


        if($id=='all')
        {

            $purcahse=Purchase::all();
            $all_products=collect([]);
            foreach($purcahse as $p){
                $product_id= $p->product_id;
                $product=Product::where('id',$product_id)->first();
                // array_push($all_products,$products);
                $all_products->push($product);
            }
            // return json_encode($all_products);
            return response()->json(compact('all_products'));


        }else
        {
            $purcahse=Purchase::all();
            $all_products=collect([]);
            foreach($purcahse as $p){
                $product_id= $p->product_id;
                $product=Product::where('id',$product_id)->first();
                if( $product->category_id==$id){
                    $all_products->push($product);
                }



                // array_push($all_products,$products);

            }
            // return json_encode($all_products);
            return response()->json(compact('all_products'));






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


// public function storeProductPos(Request $request){


//             $pos=new SalesPos;
//             $pos->stock=$request->stock;
//             $pos->customer_name=$request->name;
//             $pos->price=$request->price;
//             $pos->quantity=$request->quantity;
//             $pos->save();
//             return response()->json($pos);

// }



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
// public function  SalesReport(){
//     $pos=SalesPos::all();
//     $tpdf="";
//     return view('Sales.salesreport')->with('pos',$pos)
//                                     ->with('tpdf',$tpdf);


// }
// public function  Report(Request $req){
//     $pos=SalesPos::all();


//     if($req->daily){

//         $pos=SalesPos::whereDate('sales_date', date('Y-m-d'))->get();
//         $dpdf="";
//         return view('Sales.salesreport')->with('pos',$pos)
//                                ->with('dpdf',$dpdf);
//     }
//     elseif($req->month){
//         $pos=  SalesPos::whereMonth('sales_date', date('m'))->get();
//         $mpdf="";
//         return view('Sales.salesreport')->with('pos',$pos)
//                                ->with('mpdf',$mpdf);
//     }

// }
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



public function  SalesReport(){
    $pos=SalesPos::all();
    $tpdf="";
    return view('Sales.salesreport')->with('pos',$pos)
                                    ->with('tpdf',$tpdf);
}
public function  Report(Request $req){
    $pos=SalesPos::all();
    if($req->daily){
        $pos=SalesPos::whereDate('sales_date', date('Y-m-d'))->get();
        $dpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('dpdf',$dpdf);
    }
    elseif($req->month){
        $pos=  SalesPos::whereMonth('sales_date', date('m'))->get();
        $mpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('mpdf',$mpdf);
    }
    elseif($req->year){
        $pos=  SalesPos::whereYear('sales_date', date('Y'))->get();
        $ypdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('ypdf',$ypdf);
    }
    elseif($req->total){
        $pos=SalesPos::all();
        $tpdf="";
        return view('Sales.salesreport')->with('pos',$pos)
                               ->with('tpdf',$tpdf);
    }
}


public function  SalesPdf(){
    $pos=SalesPos::all();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}

public function  DayPdf(){
    $pos=SalesPos::whereDate('sales_date', date('Y-m-d'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}
public function  MonthPdf(){
    $pos=SalesPos::whereMonth('sales_date', date('m'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}
public function  YearPdf(){
    $pos=SalesPos::whereYear('sales_date', date('Y'))->get();
    $pdf=PDF::loadView('report.totalsale',compact('pos'));
    return $pdf->download();
}

}
