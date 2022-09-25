<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::with('cvs')->orderBy('created_at')->paginate(10);
        return view('user.users',compact('users'));
    }
    public function createUser(CreateUserRequest $request){
        $user=new User();
        $user->userName=$request->userName;
        $user->email=$request->email;
        $user->save();
        return response()->json($user);
    }

    public function getEditUser(User $user){
        return response()->json($user);
    }
    
    public function updateUser(UpdateUserRequest $request,User $user){
        $user->userName=$request->userName;
        $user->save();
        return response()->json($user);
    }
    public function deleteUser(User $user){
        if($user->delete()){
            return response()->json(['message'=>'User Deleted Successfully']);
        }
        else{
            return response()->json(['message'=>'User Not Deleted']);
        }
    }
}
