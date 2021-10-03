<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ManagerRequest;
use App\Models\Category;
use App\Models\Manager;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{

public $user;
public function __construct()
{
    $this->middleware(function($request,$next){

$this->user=Auth::user();
return $next($request);
    });
}
///changable


public function loginview(){

    return view('auth.login');

        }
        public function loginverify(Request $req){
            $req->validate([


                'email' => 'required|email|exists:users,email',
                'password' => 'required',

              ],
                [


                 'email.required' => 'Input The email in Sucessyfuly',
                 'password.required' => 'Input The password in Sucessyfuly',
                 'exists:users'=> 'invalid email',



              ]);

                $creds = $req->only('email','password');
            // dd( Auth::guard('superadmin')->attempt( $creds));

                if( Auth::attempt( $creds) ){
                    $admin  = Auth::user();
                    $admin  = User::find($admin->id);

                        return redirect()->route('dashboard');

                }

                else{
                    $req->session()->flash('error','invalid creditial');
                return back();

                }

        }

    public function Dashboard(){

        $admin=Admin::all();
        $adminCount=$admin->count();
        $manager=Manager::all();
        $manageCount=$manager->count();
        $product=Product::all();
        $productCount=$product->count();

        return view ('admin.index',compact('adminCount','manageCount','productCount'));
    }

    public function logout(){
         Auth::logout();
        //Auth::user()->logout();
        return redirect()->route('user.login');

    }
//echangable add

    // add admin view page
    public function AddAdmin()
    {
        if(is_null($this->user) || !$this->user->can('admin.create')){
            abort('403','You dont have acces!!!!');
        }

        return view('admin.AddAdmin');
    }

/*

 "admin.createPdf",
        //admin permission
           "admin.create",
           "admin.update",
           "admin.delete",
           "admin.view",

        //user permission
           "user.create",
           "user.update",
           "user.delete",
           "user.view",
           //product permission
           "product.create",
           "product.update",
           "product.delete",
           "product.view"


if(is_null($this->user) || !$this->user->can('product.create') || !$this->user->can('product.update') || !$this->user->can('product.delete') || !$this->user->can('product.view')){
    abort('403','You dont have acces!!!!');
}

*/

    // admin store

public function StoreAdmin(AdminRequest   $request)
{
$admin = User::where('email', $request->email)
->first();
if($admin){
$request->session()->flash('msg', 'Email is already exist');
return view('admin.AddAdmin');
}
else{
    if(is_null($this->user) || !$this->user->can('admin.create') ){
        abort('403','You dont have acces!!!!');
    }

                $admin= new Admin;
                $admin->username=$request->username;
                $admin->fullname=$request->fullname;
                $admin->email=$request->email;
                $admin->password=$request->password;

                $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
                $image=$request->image->move(public_path('admin_img'),$newImageName);
                $admin->image=$newImageName;

                $admin->save();
                $notification = array(
                    'message' => 'Admin Added Sucessyfuly',
                    'alert-type' => 'success',
                );

                $user_id=User::insertGetId([

                'name'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=> 2,

          ]);

     $user = User::find($user_id);

     $user->assignRole('admin');
        }

                return redirect('/admin/list')->with($notification);

}


    // admin list View page
    public function AdminList()
    {
        if(is_null($this->user) || !$this->user->can('admin.view')){
            abort('403','You dont have acces!!!!');
        }

         $admins = Admin::all();
        return view('admin.AdminList')->with('admins',$admins);

    }



    // edit admin view page

    public function EditAdmin($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.update')){
            abort('403','You dont have acces!!!!');
        }
        $admin = Admin::find($id);
       return view('admin.EditAdmin')->with('admin',$admin);
    }

// update admin
public function UpdateAdmin(Request $request,$id)
{
    if(is_null($this->user) || !$this->user->can('admin.update')){
        abort('403','You dont have acces!!!!');
    }
    $email=Admin::where('id', $id)->get()->first();
    $email=$email->email;

    $admin=Admin::find($id);
    $admin->username=$request->username;
    $admin->fullname=$request->fullname;
    $admin->email=$request->email;


          if($request->hasFile('image') && $request->image->isValid()){
            if(file_exists(public_path('admin_img/'.$admin->image))){
                unlink(public_path('admin_img/'.$admin->image));
            }
            $newImageName=time().'-'.$request->username.'.'.$request->image->extension();
            $image=$request->image->move(public_path('admin_img'),$newImageName);
            $admin->image=$newImageName;
        }
            $admin->save();

 
            User::where('email', $email)
            ->update([
                'name'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
      
          ]);

            $notification = array(
                'message' => 'Admin Updated Sucessyfuly',
                'alert-type' => 'success',
            );

            return redirect('/admin/list')->with($notification);
}
// delete admin
public function DeleteAdmin($id)
{
    if(is_null($this->user) || !$this->user->can('admin.delete') ){
        abort('403','You dont have acces!!!!');
    }

    $admin=Admin::where('id', $id)->get()->first();
   $adminDelete=$admin->email;
   $adminDelete=User::where('email', $adminDelete)->delete();
    Admin::destroy($id);
    return redirect('admin/list');

}
//  Manager start///

 // manager View
 public function ManagerView(){
    if(is_null($this->user) || !$this->user->can('user.view') ){
        abort('403','You dont have acces!!!!');
    }

        $managers = Manager::latest()->get();
        return view('Manager.AddManager',compact('managers'));
} // end mathod

public function Managershow(){

    if(is_null($this->user) || !$this->user->can('user.view') ){
        abort('403','You dont have acces!!!!');
    }
    $Managershow = Manager::latest()->get();
    return view('Manager.Manager_show',compact('Managershow'));
}


public function ManagerStore(ManagerRequest $request){


    $manager = User::where('email', $request->email)
    ->first();
    if($manager){
    $request->session()->flash('msg', 'Email is already exist');
    return view('Manager.AddManager');
    }
    else{

    if(is_null($this->user) || !$this->user->can('user.create') ){
        abort('403','You dont have acces!!!!');
    }
// validation
    $request->validate([

        'username' => 'required',
        'fullname' => 'required',
        'email' => 'required',
        'password' => 'required',
        'username' => 'required',
      ],
        [
         'username.required' => 'Input The username  in Sucessyfuly',
         'fullname.required' => 'Input The fullname  in Sucessyfuly',
         'email.required' => 'Input The email in Sucessyfuly',
         'password.required' => 'Input The password in Sucessyfuly',

        'image' => 'please input manager img',

      ]);

      // img upload and save
      $image = $request->file('image');
      $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(870,370)->save('upload/image/'.$name_gen);
      $save_url = 'upload/image/'.$name_gen;

   // Manager Insert
      Manager::insert([
       'username' => $request->username,
       'fullname' => $request->fullname,
       'email' => $request->email,
       'password' => $request->password,
       'image' => $save_url,
   ],


   [

         'username.required' => 'Input The username  in Sucessyfuly',
         'fullname.required' => 'Input The fullname  in Sucessyfuly',
         'email.required' => 'Input The email in Sucessyfuly',
         'password.required' => 'Input The password in Sucessyfuly',

      ]);
      $user_id=User::insertGetId([

        'name'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=> 3,

  ]);
  $user = User::find($user_id);

  $user->assignRole('Manager');




      $notification = array(
        'message' =>  'Manager Add Sucessyfuly',
        'alert-type' => 'success'
    );
    }
    return redirect('/show')->with($notification);



} // end method

    // Manager  edit
    public function ManagerEdit($id){
    $manager = Manager::findOrFail($id);
    return view('Manager.Manager_edit',compact('manager'));
    }

    public function ManagerUpdate(Request $request){



        if(is_null($this->user) || !$this->user->can('user.update') ){
            abort('403','You dont have acces!!!!');
        }

        $manager_id = $request->id;
       $old_img = $request->old_img;

       $email=Manager::where('id', $manager_id)->get()->first();
       $email=$email->email;
     


        if ($request->file('image')) {



        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/image/'.$name_gen);
        $save_url = 'upload/image/'.$name_gen;

         Manager::findOrFail($manager_id)->update([
        'username' => $request->username,
        'fullname' => $request->fullname,
        'email' => $request->email,
        'image' => $save_url,
        ]);

        // $email=Manager::where('id', $manager_id)->get()->first();
        // $email=$email->email;
       
        User::where('email', $email)
        ->update([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
  
      ]);
        // User::findOrFail($email)->update([
        //     'name'=>$request->username,
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request->password),
        //     ]);
    

        $notification = array(
            'message' => 'Manager Updated Successfully',
            'alert-type' => 'info'
        );
    return redirect()->route('show.manager')->with($notification);



        }else{

        Manager::findOrFail($manager_id)->update([
        'username' => $request->username,
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => $request->password,



        ]);
          $notification = array(
            'message' => 'Manager Updated Successfully',
            'alert-type' => 'info'
        );


        return redirect()->back()->with($notification);

        } // end else
    } // end method

   // Delete Slider
    public function destroy($id){




        if(is_null($this->user) || !$this->user->can('user.update') ){
            abort('403','You dont have acces!!!!');
        }

    $manager=Manager::where('id', $id)->get()->first();
     $managerDelete=$manager->email;
     $managerDelete=User::where('email', $managerDelete)->delete();
        $manager = Manager::findOrFail($id)->delete();

          $notification = array(
            'message' => 'Manager Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } // end method



//  Manager end///

}
