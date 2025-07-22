<?php

namespace App\Http\Controllers;
use  App\Models\Company;
// use Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanyDetails(){
        $company = Company::orderBy('company_name', 'asc')->paginate(5);
         return view('company',['company'=>$company]);
    }
  
    public function add_Company(){
       return view('add_company');
    }

     public function update_company($id){
      // dd(url());
         // dd($id);
       $companyDetails = Company::find($id);
       return view('Company_update',['company'=> $companyDetails]);
    }
    
    public function delete_Company(Request $request,$id){
      //   dd($id);
       $delCompany = Company::destroy($id);
         if($delCompany){
            return redirect()->route('company')->with('success','Company details deleted successfully');
         }
         else{
            return back()->with('error','Company details are not deleted');
         }
       
    }


    
    public function store_company_details(Request $request){
      
    
      $request->validate([
           'companyName' => 'required|max:200',
      'companyEmail' => 'required|email',
      'mob' => 'required',
      'companyAddress' => 'required|string',
      'gstNo' => 'required|string',
      'date' => 'required|date',
   
      ]);
       
      $com = new Company();
      $com->company_name = $request->companyName;
      $com->company_email = $request->companyEmail;
      $com->company_mobile = $request->mob;
     $com->company_address = $request->companyAddress;
     $com->gst_no = $request->gstNo;
     $com->date = $request->date;
      $com->state = $request->state;
      $com->status = '1' ; 
      if($com->save()){
         return back()->with('success','Company details added successfully!');
      }
      else{
         return back()->with('error','Company details are not added');

      }


    }


     public function update_company_details(Request $request,$id){
   
       $request->validate([
           'companyName' => 'required|max:200',
            'companyEmail' => 'required|email',
            'mob' => 'required',
            'companyAddress' => 'required|string',
            'gstNo' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|in:1,0',
      ]);
      $com = Company::findorFail($id);
      $com->company_name = $request->companyName;
      $com->company_email = $request->companyEmail;
      $com->company_mobile = $request->mob;
     $com->company_address = $request->companyAddress;
     $com->gst_no = $request->gstNo;
     $com->date = $request->date;
      $com->status = $request->status; 
      // dd($request->all());
      if($com->save()){
         return back()->with('success','Company details updated successfully!');
      }
      else{
         return back()->with('error','Company details are not updated successfully');

      }

      }
}