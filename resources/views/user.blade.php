@extends("layouts.landing")
@section('title','User Page')
@section('active-user','active')
@section('content')
      
      <div class="row">
        <div class="col">
             <h2 class="text-primary">Users</h2>
        </div>
        <div class="col">
             <form action="{{route('add_user')}}" method="get">
                <button type="submit" class="btn-primary btn" style="margin-left: 88%;padding:1%;font-size:20px;">Add <i class="fas fa-plus"></i></button>
             </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
            
        </div>
        <div class="col">
             <form action="{{route('search_name')}}" method="get">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Profile</th>
                        <th>Role</th>

                    </tr>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td><img src="{{url('storage/app/private/' . $user->image)}}" alt="" class="img" style="width:50px;"></td>
                        <td>{{$user->role}}</td>

                    </tr>
                   @endforeach
                
                 </table>
                   {{$users->links()}}
            </div>
            
        </div>
                 

  
@endsection