<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;

class PdfController extends Controller
{
    // create pdf view page
    public function CreatePdf()
    {

    if(is_null($this->user) || !$this->user->can('admin.createPdf') ){
        abort('403','You dont have acces!!!!');
    }
       $product=Product::all();
       return view('pdf',compact('product'));
    //    $pdf = PDF::loadView('pdf', $product);
    //    return $pdf->download('products.pdf');
    //     return view('pdf.CreatePdf');
    }


    public function download()
    {
        if(is_null($this->user) || !$this->user->can('admin.createPdf') ){
            abort('403','You dont have acces!!!!');
        }
       $product=Product::all();
       $customPaper = array(0,0,720,1440);
       $pdf = PDF::loadView('pdf.DownloadPurchase', $product)->setPaper($customPaper);
    //    $pdf->setPaper('A8', 'portrait');
       return $pdf->download();
    //    return view('pdf',compact('product'));\
    return back();
    }



}
