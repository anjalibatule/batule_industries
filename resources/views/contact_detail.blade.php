@extends("layouts.landing")
@section('title','Company Details Page')
@section('active-contact-detail','active')
@section('content')

    <div class="row">
        <div class="col">
             <h2 class="text-primary">Contact Details</h2>
        </div>
     </div>  
     <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <form action="{{route('contact_update',$contact->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="company_name">Company Name:</label>
                           <input type="text" name="company_name" value="{{$contact->contact_company_name}}"  class="w-100 mt-1" style="padding:5px 10px;">
                        </div>
                         <div class="col">
                            <label for="owner_name">Owner:</label>
                           <input type="text" name="owner_name" value="{{$contact->owner}}"  class="w-100 mt-1" style="padding:5px 10px;">
                        </div>
                        <div class="col">
                            <label for="contactEmail">Email : </label>
                            <input type="email" name="contactEmail" value="{{$contact->contact_email}}"   class="w-100 mt-1" style="padding:5px 10px;">                          
                        </div>
                           <div class="col">
                            <label for="mob">Mobile Number : </label>
                           <input type="tel" name="mob" value="{{$contact->contact_number}}"  class="w-100 mt-1" style="padding:5px 10px;" pattern="^\+91-[6-9][0-9]{9}$">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="gstNumber">GST Number : </label>
                           <input type="text" name="gstNumber" value="{{$contact->gst_number}}"   class="w-100 mt-1" style="padding:5px 10px;" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" maxlenth="15">
                        </div>
                        <div class="col">
                            <label for="contactAddress">Address : </label>
                            <textarea type="text" name="contactAddress"  class="w-100 mt-1" style="padding:5px 10px;">{{$contact->contact_address}}</textarea>                        
                        </div>
                           <div class="col">
                            <label for="contact_map">Map :</label>
                           <textarea type="text" name="contact_map"  class="w-100 mt-1" style="padding:5px 10px;">{{$contact->map}}</textarea> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
     </div>   
      
      
        <!-- <div><iframe src="{{$contact->map}}"></iframe></div> -->



       
    
                 
  
@endsection