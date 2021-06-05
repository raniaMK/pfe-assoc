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
                            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('cheque.index') }}">
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
                    <form action="{{ route('cheque.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName1">No*</label>
                                <input type="text" name="numero" class="form-control" placeholder="Numero">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Montant*</label>
                                <input type="text" name="montant" class="form-control" placeholder="Montant">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Validité*</label>
                                <input type="text" name="validité" class="form-control" placeholder="JJ/MM/AAAA">

                            </div>
                            <div class="form-group">
                                <label for="Personne">Familles*</label>
                                <select class="form-control form-control-md" id="personne_id" name="personne_id">
                                    @foreach($result->all() as $personne)
                                        <option value="{{$personne->id}}">{{$personne->CIN}}</option>
                                    @endforeach
                                </select>
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
@endsection
