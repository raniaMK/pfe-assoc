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
                            <li class="breadcrumb-item"><a class="btn btn-primary" href="{{ route('personne.index') }}">
                                    Back</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="">
                <div class="row">
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
                                                    <label for="exampleInputName1">Nom</label>
                                                    <input type="text" name="nom" value="{{$personne->nom}}"
                                                           class="form-control" placeholder="Nom" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">prenom</label>
                                                    <input type="text" name="prenom" value="{{$personne->prenom}}"
                                                           class="form-control" placeholder="Prenom" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">CIN</label>
                                                    <input type="number" name="CIN" value="{{$personne->CIN}}"
                                                           class="form-control" placeholder="CIN" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Date de Naissance</label>
                                                    <input type="text" name="date_naiss"
                                                           value="{{$personne->date_naiss}}" class="form-control"
                                                           placeholder="JJ/MM/AAAA" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Numero Telephone</label>
                                                    <input type="number" name="tel" value="{{$personne->tel}}"
                                                           class="form-control" placeholder="Votre Numero"disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">adresse</label>
                                                    <input type="text" name="adresse" value="{{$personne->adresse}}"
                                                           class="form-control" placeholder="Adresse"disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Situation Familiale</label>
                                                    <input type="text" name="Situation_Fam"
                                                           value="{{$personne->Situation_Fam}}" class="form-control"
                                                           placeholder="Situation Familiale"disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputName1">Nombre d'enfant</label>
                                                    <input type="number" name="nb_enfants"
                                                           value="{{$personne->nb_enfants}}" class="form-control" disabled>
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
{{--   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">
           <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1>Contacts</h1>
                   </div>
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Contacts</li>
                       </ol>
                   </div>
               </div>
           </div><!-- /.container-fluid -->
       </section>
       <section class="content">

           <!-- Default box -->
           <div class="card card-solid">
               <div class="card-body pb-0">
                   <div class="row d-flex align-items-stretch">
                       <div class="col-12 col-sm-6 col-md-20 d-flex align-items-stretch">
                           <div class="card bg-light">
                               <div class="card-header text-muted border-bottom-0">
                                   Digital Strategist
                               </div>
                               <div class="card-body pt-0">
                                   <div class="row">
                                       <div class="col-7">
                                           <h2 class="lead"><b>Nicole Pearson</b></h2>
                                           <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                           <ul class="ml-4 mb-0 fa-ul text-muted">
                                               <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                               <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                           </ul>
                                       </div>
                                       <div class="col-5 text-center">
                                           <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                       </div>
                                   </div>
                               </div>
                               <div class="card-footer">
                                   <div class="text-right">
                                       <a href="#" class="btn btn-sm bg-teal">
                                           <i class="fas fa-comments"></i>
                                       </a>
                                       <a href="#" class="btn btn-sm btn-primary">
                                           <i class="fas fa-user"></i> View Profile
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <!-- /.card-body -->

           </div>
           <!-- /.card -->

       </section>
       <!-- /.content -->
   </div>--}}


