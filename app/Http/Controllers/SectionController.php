<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Models\CV;
use App\Models\Section;

class SectionController extends Controller
{
    public function index(){
        $sections=Section::with('cv')->orderBy('cvId')->paginate(10);
        return view('section.sections',compact('sections'));
    }
    public function getCVSections(CV $cv){
        // $cv=CV::find($cv->id)->with('')
        $sections=$cv->sections;
        return view('section.sections',compact(['sections','cv']));
    }
    public function createSection(SectionRequest $request){
        $section=new Section();
        $section->sectionTitle=$request->sectionTitle;
        $cv=CV::where('cvName',$request->cvName)->first();
        $section->cvId=$cv->id;
        $section->save();
        return response()->json([$section,$cv]);
    }

    public function getEditSection(Section $section){
        $cv=CV::find($section->cvId);
        return response()->json([$section,$cv]);
    }
    
    public function updateSection(SectionRequest $request,Section $section){
        $section->sectionTitle=$request->sectionTitle;
        $cv=CV::where('cvName',$request->cvName)->first();
        $section->cvId=$cv->id;
        $section->save();
        return response()->json($section);
    }
    public function deleteSection(Section $section){
        if($section->delete()){
            return response()->json(['message'=>'Section Deleted Successfully']);
        }
        else{
            return response()->json(['message'=>'Section Not Deleted']);
        }
    }
}
