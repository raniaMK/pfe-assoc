@extends('layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
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
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
<section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Phone</label>
                    {!! Form::number('phone',null, array('placeholder' => 'Your phone number','class' => 'form-control','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
</div>


{{--<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>--}}




@endsection
