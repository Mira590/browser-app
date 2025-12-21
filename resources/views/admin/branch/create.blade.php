@extends('admin.master')
@section('content')




				
			<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
  
  <div class="ps-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 p-0">
       
        
      </ol>
    </nav>
  </div>
</div>
<!--end breadcrumb-->

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
  <div class="col-xl-9 mx-auto">
    <h6 class="mb-0 text-uppercase">New Branch</h6>
    <hr />
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.savebranch')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Branch Name" required>
              @error('name')
              <span class="text-danger small">{{$message}}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="slug" class="form-label">Branch Code</label>
              <input type="text" name="br_code" id="br_code" class="form-control" placeholder="ex# 00010"  required>
               @error('br_code')
              <span class="text-danger small">{{$message}}</span>
              @enderror
            </div>
          </div>

          <!-- Photo input and preview side by side -->
        

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>




						
							
			
@endsection