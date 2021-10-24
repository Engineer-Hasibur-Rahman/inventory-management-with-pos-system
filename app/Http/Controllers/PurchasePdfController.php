<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;
class PurchasePdfController extends Controller
{
    //
    public function getPurchase(){

        $purchases = Purchase::all();
        return view('Pdf.PurchasePdf',compact('purchases'));
    }

    public function downloadPDF(){
        $purchases = Purchase::all();

        $carts = Cart::content();
        dd($carts);

        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $cartTax= Cart::tax();
        $cartSubTotal=Cart::subtotalFloat();

        $pdf=PDF::loadView('Pdf.DownloadPurchase',compact('purchases','carts','cartQty','cartTotal','cartSubTotal','cartTax'))->setPaper(array(0,0,204,600));
        // $pdf->setPaper('A4','landscape');
        return $pdf->stream('purchases.pdf') ;
    }
}
