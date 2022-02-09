<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{

    //show user
    public function index()
    {
        $users = User::latest()->paginate(6);
        $count_users = User::count();
        $active_users = User::where('status', 1)->count();
        $inactive_users = User::where('status', 0)->count();
        return view('welcome', compact('users', 'count_users', 'active_users', 'inactive_users'));
    }

    //store user
    public function store_user(Request $request)
    {
        $this->validate($request,[
           'full_name' => 'required',
           'user_name' => 'required|unique:users',
           'email' => 'required|unique:users',
           'about' => 'required',
           'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->about = $request->full_name;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();

        return response()->json(['status' => true]);

    }

    //edit user
    public function edit_user(Request $request)
    {
        $user = User::findOrFail($request->id);
        return response()->json($user);
    }

    //update user
    public function update_user(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required',
            'user_name' => 'required|unique:users,user_name,'.$request->id,
            'email' => 'required|unique:users,email,'.$request->id,
            'about' => 'required',
        ]);

        $user = User::findOrFail($request->id);
        $user->full_name = $request->full_name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->about = $request->full_name;
        $user->save();

        return response()->json(['status' => true]);
    }

    //delete user
    public function destroy_user($id)
    {
        $user = User::findOrFail($id);
        if($user->image != null && file_exists(public_path('user/'.$user->image))){
            unlink(public_path('user/'.$user->image));
        }
        $user->delete();
        notify()->success('User Deleted', 'Success');
        return redirect()->back();
    }

    //update status
    public function update_user_status(Request $request)
    {
        $user = User::findorFail($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'success']);
    }

    //update password
    public function update_user_password(Request $request, $id)
    {
        $this->validate($request, [
           'current_password' => 'required',
           'password' => 'required|confirmed',
        ]);

        $user = User::findOrFail($id);

            //check current password
            if(Hash::check($request->current_password, $user->password)){
                //check old and new pwd same or not
                if(!Hash::check($request->password, $user->password)){
                    $user->password = Hash::make($request->password);
                    $user->save();
                    notify()->success('Password Updated', 'Success');
                    return redirect()->back();
                }else{
                    notify()->error("Sorry ! New password con not be same as old password!", 'Error');
                    return redirect()->back();
                }
            }else{
                notify()->error("Sorry ! Your Current Password is Wrong", 'Error');
                return redirect()->back();
            }


    }

    //view single user
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    //update image
    public function update_image(Request $request, $id)
    {
        $this->validate($request,[
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = User::findOrFail($id);
        $image = $request->file('image');
        if($image){
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name = uniqid() . '.' . $ext;
            $upload_url = public_path('user/'.$image_name);
            Image::make($image)->resize(140, 140)->save($upload_url);

            if($user->image != null && file_exists(public_path('user/'.$user->image))){
                unlink(public_path('user/'.$user->image));
            }
            $user->image = $image_name;
        }

        $user->save();

        notify()->success('Image Updated', 'Success');
        return redirect()->back();
    }

    //search user
    public function search(Request $request)
    {
        $date = explode(',', $request->date);
        if (count($date) != 2){
            notify()->error('Please select multiple date');
            return redirect()->back();
        }
        if (@$date[0]){
            $start_date = date('Y-m-d', strtotime($date[0]));
        }else{
            $start_date = '';
        }
        if (@$date[1]){
           $end_date = date('Y-m-d', strtotime($date[1]));
        }else{
           $end_date = '';
        }

        $users = User::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)
            ->where('user_name', 'LIKE', "%$request->name%")
            ->latest()->paginate(2);
        return view('search', compact('users'));
    }


}
