@extends('layouts.app')
   
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard (Admin)
                    <a href="/admin/profile">Profile</a>
                    <div style="text-align: right;">
                    <a href="/admin/create-user" class="btn btn-primary btn-sm">Create User</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($users->count() > 0)
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone Number</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $i = 0;
                                @endphp
                                 @foreach ($users as $key => $user)
                                <tr>
                                  <th scope="row">{{ $i++ }}</th>
                                  <td>{{$user->fname}}</td>
                                  <td>{{$user->lname}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->phone_number}}</td>
                                        <td>
                    <a type="button" href="{{ url('admin/user/edit',$user->id) }}"class="btn btn-info btn-sm">
                    Edit
                  </a>
                  <button class="btn btn-danger btn-flat btn-sm remove-user" data-id="{{ $user->id }}" data-action="{{ url('admin/user/delete/',$user->id) }}" onclick="deleteConfirmation({{$user->id}})"> Delete</button>
                </td>
                                </tr>
                                 @endforeach
                              </tbody>
                            </table>
                            @else
        <img src="{{{ asset('/images/no-record.png') }}}">
    @endif
                </div>
            </div>
        </div>
    </div>
</div>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/admin/user/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        console.log('results',results)
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                            location.reload(true);//this will release the event
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
      
@endsection