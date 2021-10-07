<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function AddPurchase()
    {

      $suppliers= Supplier::latest()->get();
      $products= Product::all();
        return view('purchase.AddPurchase',compact('products','suppliers'));
    }



    public function StorePurchase(Request $request)
    {


         $validateData = $request->validate([
             'purchase_date' => 'required',
             'product_quantity' => 'required',
             'purchase_price' => 'required',
             'purchase_unit' => 'required',
             'purchase_note' => 'required',
             'supplier_id' => 'required',
             'product_id' => 'required',
         ]);
        $purchase= new Purchase;
        $purchase->product_id=$request->product_id;
        $purchase->supplier_id=$request->supplier_id;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->product_quantity=$request->product_quantity;
        $purchase->purchase_price=$request->purchase_price;
        $purchase->purchase_unit=$request->purchase_unit;
        $purchase->purchase_note=$request->purchase_note;
        $purchase->save();



        $stock= new Stock;
        $stock->product_id=$request->product_id;
        $stock->product_add_date=$request->purchase_date;
        $stock->product_stock_count=$request->product_quantity;
        $stock->save();


        $notification = array(
          'message' => 'Purchase Success',
          'alert-type' => 'success',
        );




        return redirect()->route('show.purchase')->with($notification);


      }


    public function showPurchase(){


      $purchases = Purchase::all();

      return view('purchase.PurchaseList', compact('purchases'));
  }






  public function EditPurchase($id)
  {

      $purchase = Purchase::find($id);
      $products = Product::latest()->get();
      $suppliers = Product::latest()->get();
      return view('purchase.PurchaseEdit',compact('products','purchase','suppliers'));
  }

  public function UpdatePurchase(Request $request,$id)
  {

    $validateData = $request->validate([
      'purchase_date' => 'required',
      'product_quantity' => 'required',
      'purchase_price' => 'required',
      'purchase_unit' => 'required',
      'purchase_note' => 'required',




  ]);

            $purchase=Purchase::find($id);
            $purchase->product_id=$request->product_id;
            $purchase->supplier_id=$request->supplier_id;
            $purchase->purchase_date=$request->purchase_date;
            $purchase->product_quantity=$request->product_quantity;
            $purchase->purchase_price=$request->purchase_price;
            $purchase->purchase_unit=$request->purchase_unit;
            $purchase->purchase_note=$request->purchase_note;
            $purchase->save();
            $notification = array(
              'message' => 'Purcahse edited',
              'alert-type' => 'success',
            );

            return redirect()->route('show.purchase')->with($notification);

          }
  public function DeletePurchase($id)
  {

      Purchase::destroy($id);
      $notification = array(
        'message' => 'Purchase deleted Sucessyfuly',
        'alert-type' => 'success',
      );

      return redirect()->back()->with($notification);

    }


    //for testing audio


}
