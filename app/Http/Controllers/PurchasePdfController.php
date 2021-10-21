<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\SalesPos;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;
use Carbon\Carbon;
class PurchasePdfController extends Controller
{
    //
    public function getPurchase(){

        $purchases = Purchase::all();
        return view('Pdf.PurchasePdf',compact('purchases'));
    }


    public function downloadPDF(Request $req){


        $purchases = Purchase::all();

        $carts = Cart::content();


        // dd($carts);
        $day = Carbon::today();
        $today= $day->toDateString();

        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $cartTax= Cart::tax();
        $cartSubTotal=Cart::subtotalFloat();
        $user=Auth::user()->name;


    //create sales pos starts
    foreach($carts as $cart){
        $pos=new SalesPos;
        $pos->stock= $cartQty;
        $pos->item_name= $cart->name;
        $pos->created_by=$user;
        $pos->customer_name='NAME';
        $pos->price=$cart->price;
        $pos->quantity=$cart->qty;
        $pos->sales_date=$today;

        $pos->discount=0;
        $pos->tex=$cart->tax;
        $pos->save();


    }

        Cart::destroy();

       $pdf=PDF::loadView('Pdf.DownloadPurchase',compact('purchases','carts','cartQty','cartTotal','cartSubTotal','cartTax','today','user'))->setPaper(array(0,0,204,600));
        return $pdf->stream('purchases.pdf') ;
    }
}
