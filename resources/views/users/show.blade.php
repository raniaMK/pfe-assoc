@extends('layouts.admin_layout')

@section('title')
    Profile
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Show User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('users.index') }}">
                                    Back</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img style="width: 200px;" class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('img/avatar.jpg') }}" alt="{{$user->name . ' Photo' }}">


                                </div>

                                {{--                            <h3 class="profile-username text-center" style="text-transform: uppercase">{{ $user->name }} </h3>
                                                            --}}{{--  <p class="text-muted text-center">{{ $user->role }}</p>  --}}{{--
                                                            <p class="text-muted text-center">{{ $user->email }}</p>
                                                            <p class="text-muted text-center">{{ $user->phone }}</p>--}}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>User Profile</h4>
                            </div>
                            <div class="card-body">
                                <div>

                                    <div>

                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           value="{{$user->name }}" required placeholder="Name" disabled>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email Address</label>
                                                    <input type="email" name="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           value="{{$user->email }}" placeholder="E-mail Address" disabled>
                                                    @error('siteemail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" id="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           placeholder="Phone Number" value="{{ $user->phone }}"
                                                           required disabled>
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="Roles">Role</label><br/>
                                                    @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- <div class="content-wrapper">
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Show User</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('users.index') }}">
                                 Back</a></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>


<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
         <strong>Name:</strong>
         {{ $user->name }}
     </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
         <strong>Email:</strong>
         {{ $user->email }}
     </div>
 </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="form-group">
         <strong>Roles:</strong>
         @if(!empty($user->getRoleNames()))
             @foreach($user->getRoleNames() as $v)
                 <label class="badge badge-success">{{ $v }}</label>
             @endforeach
         @endif
     </div>
 </div>
</div>
 </div>--}}



