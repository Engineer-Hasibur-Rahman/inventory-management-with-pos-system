<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Stock;
use App\Models\ProductReturn;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Notifications\StockNotification;

class ProductController extends Controller
{
//construc for curruent user from the auth

public $user;
public function __construct()
{
    $this->middleware(function($request,$next){

$this->user=Auth::user();
return $next($request);
    });
}



  // add Product view page
  public function AddProduct()
  {

    $categories = Category::latest()->get();
      return view('product.AddProduct',compact('categories'));
  }


   // add return  Product view page
   public function showReturnProduct()
   {
       $purchases = Purchase::with(['product'])->with(['supplier'])->get()->unique('product_id');




       return view('product.AddreturnProduct',compact('purchases'));
   }

// store product
  public function StoreProduct(Request $request)
  {
       $validateData = $request->validate([
           'name' => 'required',
           'price' => 'required',
           'product_code' => 'required',
           'squ_code' => 'required',
           'count' => 'required',
       ]);
      $image = $request->file('image');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(917,1000)->save('products/'.$name_gen);
      $save_url = 'products/'.$name_gen;
      $product= new Product;
      $product->name=$request->name;
      $product->category_id=$request->category_id;
      $product->price=$request->price;
      $product->product_code=$request->product_code;
      $product->squ_code=$request-> squ_code;
      $product->count=$request->count;

      if($request->count<5){
        $product->stock_alart=0;
      }
      $product->product_image= $save_url;
      $product->product_satus= 1;
      $product->save();
      $notification = array(
        'message' => 'Product Add Sucessyfuly',
        'alert-type' => 'success',
      );
      return redirect()->route('show.product')->with($notification);
    }
  public function showProduct(){
    $products = Product::all();
    return view('Product.ProductList', compact('products'));
}
  public function showretuenProduct(){

    return view('Product.ReturnProductList');
}
  public function showretuenProductlist(){

    $returnproduct_list= ProductReturn::with(['product'])->with(['supplier'])->get();

//dd($returnproduct_list);


    return view('Product.ReturnProductList',compact('returnproduct_list'));
}


// store product
public function StoreReturnProduct(Request $request)
{


// dd($request->all());
     $validateData = $request->validate([
         'product_name' => 'required',
         'quantity' => 'required'


     ]);

     $stock_number=Stock::where('product_id',$request->product_name)->first();



    $returnproduct= new ProductReturn;
    $returnproduct->product_id=$request->product_name;
    $returnproduct->supplier_id=$request->suppliar;
    $getpurchaseid=Purchase::where('product_id',$request->product_name)->where('supplier_id',$request->suppliar)->pluck('id');
    //dd( $getpurchaseid);
    $returnproduct->purchase_id=$getpurchaseid[0];

        if($request->quantity > $stock_number->product_stock_count){
            return redirect()->back()->with('quantity','Not enough quantity available for return !! Product Remaining :'.$stock_number->product_stock_count);
        }else{


            $returnproduct->return_quantiy=$request->quantity;
        }



    $returnproduct->save();
    $notification = array(
      'message' => 'Request is sent to SuperAdmin',
      'alert-type' => 'success',
    );
    return redirect()->route('show.return.productList')->with($notification);
  }








public function showReturnProductlist(){

    return view('Product.ReturnProductList');
}

public function EditProduct($id)
{
    if(is_null($this->user) || !$this->user->can('product.update') ){
        abort('403','You dont have acces!!!!');
    }
    $product = Product::find($id);
    $categories = Category::latest()->get();
    return view('product.ProductEdit',compact('product','categories'));
}


public function EditReturnProduct($id)
{

    $purchases  = Purchase::with(['Product'])->with(['supplier'])->where('product_id',$id)->get()->unique('product_id');
    $return_product=ProductReturn::where('id',$id)->select('return_quantiy','id')->get();


    //dd($return_product[0]->id);

    return view('product.EditReturnProduct',compact('purchases','return_product'));
}

public function UpdateProduct(Request $request,$id)
{
    if(is_null($this->user) || !$this->user->can('product.update')){
        abort('403','You dont have acces!!!!');
    }
      $validateData = $request->validate([
    'name' => 'required',
    'price' => 'required',
    'product_code' => 'required',
    'squ_code' => 'required',
    'count' => 'required',

]);
      $image = $request->file('image');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(917,1000)->save('products/'.$name_gen);
      $save_url = 'products/'.$name_gen;
          $product=Product::find($id);
          $product->name=$request->name;
          $product->category_id=$request->category_id;
          $product->price=$request->price;
          $product->product_code=$request->product_code;
          $product->squ_code=$request-> squ_code;
          $product->count=$request->count;

          if($request->count<5){

            $product->stock_alart=0;
          }

          $product->product_image= $save_url;
          $product->product_satus= 1;
          $product->save();
          $notification = array(
            'message' => 'Product Edited Sucessyfuly',
            'alert-type' => 'success',
          );
          return redirect()->route('show.product')->with($notification);

        }

public function UpdateReturnProduct(Request $request,$id)
{

       $validateData = $request->validate([
         'product_name' => 'required',
         'quantity' => 'required'


     ]);



$stock_number=Stock::where('product_id',$request->product_name)->first();


          $product=ProductReturn::find($id);
          $product->product_id=$request->product_name;
          $product->supplier_id=$request->suppliar;

        if($request->quantity > $stock_number->product_stock_count){
            return redirect()->back()->with('quantity','Not enough quantity available for return !! Product Remaining :'.$stock_number->product_stock_count);
        }else{


            $product->return_quantiy=$request->quantity;
        }




          $product->save();
          $notification = array(
            'message' => ' return Product Edited Sucessyfuly',
            'alert-type' => 'success',
          );
          return redirect()->route('show.return.productList')->with($notification);

        }


public function DeleteProduct($id)
{
    if(is_null($this->user) || !$this->user->can('product.delete') ){
        abort('403','You dont have acces!!!!'); //abort error for role dont have product delete permission
    }
    Product::destroy($id);
    $notification = array(
      'message' => 'Product deleted Sucessyfuly',
      'alert-type' => 'success',
    );

    return redirect()->back()->with($notification);

  }

public function DeletereturnProduct($id)
{

    ProductReturn::destroy($id);
    $notification = array(
      'message' => 'return product deleted Sucessyfuly',
      'alert-type' => 'success',
    );

    return redirect()->back()->with($notification);

  }


//aprove return product

public function ApprovereturnProduct($id){



        $return_product =ProductReturn::where('id',$id)->first();
        $product_stock=Stock::where('purchases_id',$return_product->purchase_id)->first()->pluck('product_stock_count');






        if($return_product->approve_status!=1){

            $product_stock=((int)$product_stock[0]-(int)$return_product->return_quantiy);



            $returnCollection = array("r_id"=>$id, "product_stock"=> $product_stock,"purchase_id"=>$return_product->purchase_id);


            return  response()->json(compact('returnCollection'));


        }






}



public function Approveconfirm(Request $request){
    $r_id=$request->input('r_id');
    $p_id= $request->input('purchase_id');
    $stock= $request->input('product_stock');


    Stock::where('purchases_id',$p_id)->update(['product_stock_count' => $stock]);

      ProductReturn::where('id',$r_id)->update(['approve_status' => 1]);



}







  //for testing audio

  public function ProductView(){
    $products=Product::all()->count();

    return response()->json(
        [
            'products'=>$products,
        ]
    );
}

//jquary get funtion




public function GetSupliar($product_id){


    $supplier_names=Purchase::with(['Supplier'])->where('product_id',$product_id)->get()->pluck('Supplier.name', 'Supplier.id');
//$suppliar_id=$suppliar_id->unique();
//dd($supplier_names);
//array_unique($suppliar_id)


return response()->json(compact('supplier_names'));


}











}






