<?php

namespace App\Http\Controllers;

use App\Http\Requests\CVRequest;
use App\Models\CV;
use App\Models\User;

class CVController extends Controller
{
    public function index(){
        $cvs=CV::get();
        return view('cv.cvs',compact('cvs'));
    }

    public function getUserCVs(User $user){
        $cvs=$user->cvs;
        return view('cv.cvs',compact(['cvs','user']));
    }
    public function createCV(CVRequest $request){
        $cv=new CV();
        $cv->cvName=$request->cvName;
        $cv->userEmail=$request->userEmail;
        $cv->save();
        return response()->json($cv);
    }

    public function getEditCV(CV $cv){
        return response()->json($cv);
    }
    
    public function updateCV(CVRequest $request,CV $cv){
        $cv->cvName=$request->cvName;
        $cv->save();
        return response()->json($cv);
    }
    public function deleteCV(CV $cv){
        if($cv->delete()){
            return response()->json(['message'=>'CV Deleted Successfully']);
        }
    }
}
