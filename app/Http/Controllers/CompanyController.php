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
        $company = Company::where('status',1)->orderBy('company_name', 'asc')->paginate(10);
         return view('company',['company'=>$company]);
    }
    public function inactive_company(){
        $company = Company::where('status',0)->orderBy('company_name', 'asc')->paginate(5);
         return view('inactive_company',['company'=>$company]);
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
       $com->owner_name = $request->ownerName;
      $com->company_email = $request->companyEmail;
      $com->company_mobile = $request->mob;
     $com->company_address = $request->companyAddress;
     $com->gst_no = $request->gstNo;
     $com->date = $request->date;
      $com->state = $request->state;
      $com->status = '1' ; 
      if($com->save()){
         return redirect()->route('company')->with('success','Company details added successfully!');
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
             $com->owner_name = $request->ownerName;
            $com->company_email = $request->companyEmail;
            $com->company_mobile = $request->mob;
         $com->company_address = $request->companyAddress;
         $com->gst_no = $request->gstNo;
         $com->date = $request->date;
            $com->status = $request->status; 
            // dd($request->all());
            if($com->save()){
               return redirect()->route('company')->with('success','Company details updated successfully!');
            }
            else{
               return back()->with('error','Company details are not updated successfully');

            }

      }

       public function update_company_status(Request $request, $id)
            {
                $company = Company::findOrFail($id);
                $company->status = $request->status;
                $company->save();

                return redirect()->back()->with('success', 'Status updated successfully!');
            }
}