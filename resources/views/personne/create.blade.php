@extends('layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>nouveau</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('personne.index') }}">
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
                        <h3 class="card-title">Nouveau</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('personne.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName1">Nom</label>
                                <input type="text" name="nom" class="form-control" placeholder="Nom">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">prenom</label>
                                <input type="text" name="prenom" class="form-control" placeholder="Prenom">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">CIN</label>
                                <input type="number" name="CIN" class="form-control" placeholder="CIN">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Date de Naissance</label>
                                <input type="text" name="date_naiss" class="form-control" placeholder="JJ/MM/AAAA">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Numero Telephone</label>
                                <input type="number" name="tel" class="form-control" placeholder="Votre Numero">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">adresse</label>
                                <input type="text" name="adresse" class="form-control" placeholder="Adresse">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Situation Familiale</label>
                                <input type="text" name="Situation_Fam" class="form-control" placeholder="Situation Familiale">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nombre d'enfant</label>
                                <input type="number" name="nb_enfants" class="form-control">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    {{--<div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>--}}
    {{--
    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
    <div class="row">
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
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>--}}
@endsection
