<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
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
        $pdf=PDF::loadView('Pdf.DownloadPurchase',compact('purchases'));
        $pdf->setPaper('A4','landscape');
        return $pdf->stream('purchases.pdf') ;
    }
}
