@extends('layouts.app')
   
@section('content')
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<style>
    .image-upload>input {
  display: none;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard (user)</div>
                <h3>Settings</h3>
                <!-- Tabs navs -->
<ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex2-tab-1"
      data-mdb-toggle="tab"
      href="#ex2-tabs-1"
      role="tab"
      aria-controls="ex2-tabs-1"
      aria-selected="true"
      >Account</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex2-tab-2"
      data-mdb-toggle="tab"
      href="#ex2-tabs-2"
      role="tab"
      aria-controls="ex2-tabs-2"
      aria-selected="false"
      >Security</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex2-tab-3"
      data-mdb-toggle="tab"
      href="#ex2-tabs-3"
      role="tab"
      aria-controls="ex2-tabs-3"
      aria-selected="false"
      >Payment</a
    >
  </li>
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
  <div
    class="tab-pane fade show active"
    id="ex2-tabs-1"
    role="tabpanel"
    aria-labelledby="ex2-tab-1"
  >
      <div class="card-body" style="background-color: #f3e5e5">
        <form action="{{ url('user/update',Auth::user()->id) }}"method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
        <div class="row">
            <div class="col-lg-12">
            <div class="avatar avatar-xs position-relative text-center w-25 m-auto">
            <img src="{{asset('images/users/').'/'.Auth::user()->image}}"alt="profile image" class="avatar-img rounded-circle" style="width: 80px;height: 80px; ">
            <div class="image-upload position-absolute" style="top: 60px;right: 50px;">
            <label for="file-input" style="background: #ffffff;padding: 5px;border-radius: 100%;width: 35px;height: 35px;text-align: center;">
                <i class="fas fa-edit ml-2" style="color: #c0baba;"></i>
              </label>

              <input id="file-input" type="file" name="image"/>
            </div>
            </div>
            <div class="text-center">
            <label for="exampleInputEmail1"class="mt-3" >Profile Photo</label></div>
            </div>        
        </div>            
                    
                               {{--  <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Image</label>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-lg-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name" name="fname" value="{{ Auth::user()->fname }}">
                                @if ($errors->has('fname'))  
                                    <p class="text-danger">{{$errors->first('fname')}}</p>   
                                @endif
                              </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group" >
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Last Name" name="lname" value="{{ Auth::user()->lname }}">
                                    @if ($errors->has('lname'))  
                                    <p class="text-danger">{{$errors->first('lname')}}</p>   
                                @endif
                              </div>
                          </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Email" value="{{ Auth::user()->email }}">
                                            @if ($errors->has('email'))  
                                            <p class="text-danger">{{$errors->first('email')}}</p>   
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Phone Number</label>
                                        <input type="text" name="phone_number"class="form-control" id="exampleInputPassword1" placeholder="03xxxxxxxxx"value="{{ Auth::user()->phone_number }}" maxlength="11">
                                            @if ($errors->has('phone_number'))  
                                            <p class="text-danger">{{$errors->first('phone_number')}}</p>   
                                        @endif
                                      </div>
                                  </div>
                          </div>
                          <div align="center">
                              <button type="submit" class="btn btn-info text-white" style="background-color: #61bf9d;">Save Changing</button></div>
                            </form>
                            <br>
                            <div align="center">
                              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-info text-white"style="background-color: #61bf9d;" >Logout</a></div>
                </div> 
  </div>
  <div
    class="tab-pane fade"
    id="ex2-tabs-2"
    role="tabpanel"
    aria-labelledby="ex2-tab-2"
  >
    Tab 2 content
  </div>
  <div
    class="tab-pane fade"
    id="ex2-tabs-3"
    role="tabpanel"
    aria-labelledby="ex2-tab-3"
  >
    Tab 3 content
  </div>
</div>
<!-- Tabs content -->
            </div>
        </div>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
@endsection
