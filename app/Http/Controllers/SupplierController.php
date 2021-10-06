<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Image;

class SupplierController extends Controller
{
   public function SupplierView(){
        $suppliers = Supplier::latest()->get();
        return view('Supplier.AddSupplier',compact('suppliers'));
    }

  // Store Supplier
  public function SupplierStore(Request $request){   
      
    // validation 
        $request->validate([
          
            'image' => 'required',       
          ],[ 
            'image.required' => 'Input The supplier Img',
         
          ]);

          // img upload and save
          $image = $request->file('image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(870,370)->save('upload/image/'.$name_gen);
          $save_url = 'upload/image/'.$name_gen;

       // Brand Insert    
          Supplier::insert([
           'name' => $request->name,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'permanent_address' => $request->permanent_address,
           'present_address' => $request->present_address,
           'email' => $request->email,
           'mobile_number' => $request->mobile_number,
           'image' => $request->image,
           'username' => $request->username,
           'password' => $request->password,
           'image' => $save_url,
          ]);

          $notification = array(
            'message' =>  'Supplier Add Sucessyfuly',
            'alert-type' => 'success'
        ); 

        return redirect()->back()->with($notification); 
  } // end metho




        // supplier  edit
        public function SupplierEdit($id){

        $suppliers = Supplier::findOrFail($id);

        return view('Supplier.SupplierEdit',compact('suppliers'));
        }

 public function SupplierUpdate(Request $request,$id){
     Supplier::findOrFail($id)->update([
           'name' => $request->name,
           'father_name' => $request->father_name,
           'mother_name' => $request->mother_name,
           'permanent_address' => $request->permanent_address,
           'present_address' => $request->present_address,
           'email' => $request->email,
           'mobile_number' => $request->mobile_number,
           'image' => $request->image,
           'username' => $request->username,
        
         
          ]);
      $notification = array(
            'message' =>  'Supplier Update Sucessyfuly',
            'alert-type' => 'success'
        ); 
       return redirect()->back()->with($notification);

    }




      //supplier show
        public function Suppliershow(){
        $suppliers = Supplier::latest()->get();
        return view('Supplier.SupplierList', compact('suppliers'));
    }


     public function Supplierdestroy($id){
         Supplier::findOrFail($id)->delete();
          $notification = array(
            'message' =>  'Supplier deleted Sucessyfuly',
            'alert-type' => 'success'
        ); 
          return redirect()->back()->with($notification); 

    }


}
