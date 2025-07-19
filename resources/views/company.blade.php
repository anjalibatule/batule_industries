@extends("layouts.landing")
@section('title','Company Details Page')
@section('active-company','active')
@section('content')

      <div class="row">
        <div class="col">
             <h2 class="text-primary">Company Details</h2>
        </div>
        <div class="col">
             <form action="{{route('add_company')}}" method="get">
                <button type="submit" class="btn-primary btn" style="margin-left: 88%;padding:1%;font-size:20px;">Add <i class="fas fa-plus"></i></button>
             </form>
        </div>
      </div>     
      <div class="row">
        <div class="col">
            
        </div>
        <div class="col">
             <form action="{{route('search_company_name')}}" method="get">
                <input type="text" placeholder="Search" class="search"  id="search" name="search" value="{{ request('search') }}">
                <button type="submit" value="Search" class="btn btn-primary" style="border-radius:10px !important"><i class="fas fa-search"></i></button>
              </form>
        </div>
      </div>
      
         <div class="row mt-4">
            <div class="col-12" >
                 <table class="table table-bordered">
                    <tr>
                        <th>SR NO.</th>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Mobile Number</th>
                        <th>Company Address</th>
                          <th>State</th>
                        <th>GST Number</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                        
                    </tr>
                    @foreach($company as $index => $com)
                    <tr>
                        <td>{{ ($company->currentPage() - 1) * $company->perPage() + $loop->iteration }}</td>
                        <td>{{$com->company_name}}</td>
                        <td>{{$com->company_email}}</td>
                        <td>{{$com->company_mobile}}</td>
                        <td>{{$com->company_address}}</td>
                        <td>{{$com->state}}</td>
                        <td>{{$com->gst_no}}</td>
                        <td>{{$com->date}}</td>
                       
                        
                        <td>
                           <select name="status" id="status">
                                 <option value="1" {{ $com->status == 1 ? 'selected' : '' }}>Active</option>
                                 <option value="0" {{ $com->status == 0 ? 'selected' : '' }}>Inactive</option>
                           </select>
                        </td>
                       <td>
                      
                            <a href="{{route('update_company',$com->id)}}"><i class="fas fa-edit text-success"></i></a>
                        
                             <a onclick="delete_Company_Details({{$com->id}})" style="cursor:pointer"><i class="fas fa-trash-alt text-danger"></i></a>
                      
                       </td>
                    </tr>
                       @endforeach
                    <!-- delete form -->
                    <div class="row" id="deletePage" style="display:none;" >
                     <div class="col-5">
                        <form id="deleteForm" method="post" class="form bg-light shadow-sm p-5"   style=" position: fixed; top: 4%;left: 34%;width: 32%;height: 30%; border-radius: 20px;">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('company')}}" class="bg-danger text-decoration-none text-light " style="top: 5%;right: 35%;" id="cancel">&times;</a>
                        <p class="text-primary mt-1" style="position: absolute;top: 4%;left:29%;font-size:18px;">Are you sure you want to delete this company details?</p>
                        <div class="row mt-3 align-center">
                           <div class="col-12" style="position: fixed;top: 20%; left: 44%;">
                              <button type="submit" class="btn btn-danger">Delete</button>
                              <a href="{{route('company')}}" class="btn btn-primary">Cancel</a>
                           </div>
                        </div>
                        </form>
                     </div>
                  </div>
                  <!-- delete form -->


                 
                 </table>
                  {{$company->links()}}
            </div>       
        </div>



       
      <script>
         function delete_Company_Details(id){
            const delComId = document.getElementById('deletePage').style.display = "block";   
               document.getElementById('deleteForm').action = "company_details/delete_company/" + id;
         }
      </script>
                 
  
@endsection