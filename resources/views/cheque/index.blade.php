@extends('layouts.admin_layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coupon</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste Coupons</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    {{--                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

                                    <div class="input-group-append">
                                        {{--                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>--}}

                                        <span class="breadcrumb-item"><a class="btn btn-block bg-gradient-success"
                                                                         href="{{ route('cheque.create') }}">Nouveau</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No</th>
                                    <th>Montant</th>
                                    <th>Validité</th>
                                    <th>Famille</th>
                                    <th >Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($cheques as $cheque)
                                    <tr>
                                        <td>{{$cheque->id }}</td>
                                        <td>{{$cheque->numero}}</td>
                                        <td>{{$cheque->montant}}</td>
                                        <td>{{$cheque->validité}}</td>
                                        <td>{{$cheque->personne->nom ?? ''}}</td>
                                        <td>
                                            <form action="#" method="POST">
                                                <a class="btn btn-info" href="{{ route('cheque.show',$cheque->id) }}">Show</a>
                                                <a class="btn btn-primary" href="#">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

</div>
@endsection
