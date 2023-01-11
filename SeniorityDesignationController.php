<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\designation;
class SeniorityDesignationController extends Controller
{
    //seniority Designation Data View
    public function viewdata(){
        $seniority = designation::Orderby('seniority')->get();
        $max = designation::orderby('seniority')->max('seniority');
        $count = designation::count('*');
        return  view('pages.designation.SeniorityDesignation.seniorityDesignation')->with('seniority' , $seniority)->with('max', $max)->with('count',$count);
    }

    //Seniority Save Data
    public function saveSeniority($id ,Request $request){
        $seniority = designation::where('id', '=', $id)->first();
        $seniorityold = designation::where('seniority' == $seniority->seniority ? true : null )->get();
        if($seniorityold == true){
            //its value duplicate so if now return page
            return redirect('/seniority_designation');
        }else{
            //its value not duplicate so if insert value and return page
            $seniority->seniority = $request->seniority;
            $seniority->update();
            return redirect('/seniority_designation');
        }
    }

    public function deleteSeniority($id){
        $seniority = designation::where('id', '=', $id)->first();
        $seniority->seniority = '0';
        $seniority->update();
        return redirect('/seniority_designation');
    }
}
