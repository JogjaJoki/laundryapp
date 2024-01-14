<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use File;

class ProfileController extends Controller
{
    public function me(){
        $user = User::where('id', Auth::user()->id)->with('userdetail')->first();
        // $user = Auth::user()->id;

        return response()
        ->json(['status' => 'success', 'user' => $user ]);
    }

    public function update(Request $req){
        $user = User::findOrFail(Auth::user()->id);

        if(!empty($req->username)){
            $user->name = $req->username;
        }
        if(!empty($req->email)){
            $user->email = $req->email;
        }
        if(!empty($req->password)){
            $user->password = Hash::make($req->password);
        }
        $user->save();

        $userDetail = UserDetail::where('user_id', $user->id)->first();
        if(!$userDetail){
            $userDetail = new UserDetail;
            $userDetail->user_id = $user->id;    
        }
        
        if($req->hasFile('photo')){
            $validatedData = $req->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            if(File::exists(public_path('uploads/users/' . $userDetail->photo))) {
                File::delete(public_path('uploads/users/' . $userDetail->photo));
            }

            $foto = $req->file('photo')->getClientOriginalName();
            $path = $req->file('photo')->move('uploads/users/' , $foto);
            $userDetail->photo = $foto;
        }
        if(!empty($req->phone)){
            $userDetail->phone = $req->phone;
        }
        $userDetail->save();
        

        return response()
        ->json(['status' => 'success', 'message' => 'Profil Berhasil Dirubah' ]);
    }
}
