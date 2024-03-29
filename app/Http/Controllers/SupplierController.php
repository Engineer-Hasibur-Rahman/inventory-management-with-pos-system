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
        return view('supplier.AddSupplier',compact('suppliers'));
    }

  // Store Supplier
  public function SupplierStore(Request $request){

    // validation
        $request->validate([
          'name' => 'required',
          'father_name' => 'required',
          'permanent_address' => 'required',
          'mother_name' => 'required',
          'present_address' => 'required',
          'username' => 'required',
          'password' =>'required|string|min:6|max:8',
          'mobile_number' => 'required|min:6|max:11',
          'image' => 'required|mimes:jpg,png',
          ],[
            'name.required' => 'Input The name  in Correctly',
            'password.required' => 'Input The password  in Correctly',
            'father_name.required' => 'Input The father_name  in Correctly',
            'permanent_address.required' => 'Input The permanent_address  in Correctly',
            'mother_name.required' => 'Input The mother_name  in Correctly',
            'present_address.required' => 'Input The present_address  in Correctly',
            'username.required' => 'Input The username  in Correctly',
            'mobile_number.required' => 'Input The mobile_number  in Correctly',
            'image.required' => 'Input The supplier Img',

          ]);


        $supplier= new Supplier;
        $supplier->name=$request->name;
        $supplier->father_name=$request->father_name;
        $supplier->mother_name=$request->mother_name;
        $supplier->permanent_address=$request->permanent_address;
        $supplier->present_address=$request->present_address;
        $supplier->email=$request->email;
        $supplier->mobile_number=$request->mobile_number;
        $supplier->username=$request->username;
        $supplier->password=$request->password;

        $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
        $image=$request->image->move(public_path('admin_img'),$newImageName);
        $supplier->image=$newImageName;

        $supplier->save();


          $notification = array(
            'message' =>  'Supplier Add Sucessyfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
  } // end metho




        // supplier  edit
        public function SupplierEdit($id){

        $suppliers = Supplier::findOrFail($id);

        return view('supplier.SupplierEdit',compact('suppliers'));
        }

 public function SupplierUpdate(Request $request,$id){


    $supplier=Supplier::find($id);
    $supplier->name=$request->name;
    $supplier->father_name=$request->father_name;
    $supplier->mother_name=$request->mother_name;
    $supplier->permanent_address=$request->permanent_address;
    $supplier->present_address=$request->present_address;
    $supplier->email=$request->email;
    $supplier->mobile_number=$request->mobile_number;
    $supplier->username=$request->username;



    if($request->hasFile('image') && $request->image->isValid()){
                if(file_exists(public_path('admin_imggit'.$supplier->image))){
                    unlink(public_path('admin_img/'.$supplier->image));
                }
                $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
                $image=$request->image->move(public_path('admin_img'),$newImageName);
                $supplier->image=$newImageName;
            }

            $supplier->save();



      $notification = array(
            'message' =>  'Supplier Update Sucessyfuly',
            'alert-type' => 'success'
        );
       return redirect()->back()->with($notification);

    }




      //supplier show
        public function Suppliershow(){
        $suppliers = Supplier::latest()->get();
        return view('supplier.SupplierList', compact('suppliers'));
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
