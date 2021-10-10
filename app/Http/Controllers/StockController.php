<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //


    public function StockList(){


        $stocks = Stock::all();
        return view('stock.StockList')->with('stocks',$stocks);

    }

  
}
