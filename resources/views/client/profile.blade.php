@extends('client/index')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-user icon-gradient bg-premium-dark"></i>
            </div>
            <div>Bienvenue, {{auth()->user()->nom }} {{auth()->user()->prenom }}
                <div class="page-title-subheading">Modifier vos informations personnelles et votre mot de passe.</div>
            </div>
        </div>   
    </div>
</div>    

@php
    $image = auth()->user()->image=='' ? 'profile.jpg':'image/profil/'.auth()->user()->image;
@endphp
<div class="row match-height">
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Mes informations personnelles</h5>
                <form class="" action="/profile/update" method="POST" id="profile">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="position-relative form-group col-md-12">
                            <div style="display:flex;" class="mt-3">
                                <div class="mr-3" style="display: flex;width: 50px;height: 50px;overflow: hidden;border-radius: 50%;justify-content: center;">
                                    <img style="height: 100%;width: auto;" id="imgpreviewad" src="{{asset($image)}}" alt="">
                                </div>
                                <div style="display: block;align-items: center;position: relative;" class="mr-3">
                                    <h6><b>Changer de photo de profil</b></h6>
                                    La taille de fichier maximale est 5Mo
                                </div>
                                <div style="display:flex;align-items: center;position: relative;">
                                    <a style="cursor:pointer;" class="btn btn-outline-light btnaddimage">Télécharger</a>
                                </div>
                                <input type="file" id="inputimgad" name="image" style="display: none;" accept=".png,.jpeg,.jpg">
                            </div>
                        </div>
                        <div class="position-relative form-group col-md-12">
                            <label for="examplenomuser" class="">Nom d'utilisateur</label>
                            <input name="nomuser" id="examplenomuser" placeholder="Nom d'utilisateur" value="{{auth()->user()->nomuser }}" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="exampleNom" class="">Nom</label>
                            <input name="nom" id="exampleNom" placeholder="Nom" value="{{auth()->user()->nom }}" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="examplePrenom" class="">Prénom</label>
                            <input name="prenom" id="examplePrenom" placeholder="Prénom" value=" {{auth()->user()->prenom }}" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="exampleEmail" class="">Email</label>
                            <input name="email" id="exampleEmail" placeholder="Email" type="email" value="{{auth()->user()->email }}" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="examplePays" class="">Pays</label>
                            <input name="pays" id="examplePays" placeholder="Pays" type="text" value="{{auth()->user()->pays }}" class="form-control" required>
                        </div>
                        {{-- <div class="position-relative form-group col-md-6">
                            <label for="exampleapm" class="">Adresse USD Perfect money</label>
                            <input name="apm" id="exampleapm" placeholder="Adresse USD Perfect money" value="{{auth()->user()->apm }}" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="exampleBitcoin" class="">Adresse Bitcoin</label>
                            <input name="bitcoins" id="exampleBitcoin" placeholder="Adresse Bitcoin" value="{{auth()->user()->bitcoins }}" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group col-md-6">
                            <label for="examplePayeer" class="">Adresse USD Payeer</label>
                            <input name="payeer" id="examplePayeer" placeholder="Adresse USD Payeer" value="{{auth()->user()->payeer }}" type="text" class="form-control" required>
                        </div> --}}
                    </div>
                    <p id="infoslogin" style="text-align: center;color: red"></p>
                    <div class="text-center">
                        <button class="mt-1 btn btn-primary">Enregistrer <i class="fa fa-spinner fa-spin" style="display:none;" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Modifier le mot de passe</h5>
                <form class="" action="/profile/password" method="POST" id="mdp">
                    @method('PUT')
                    @csrf
                    <div class="position-relative form-group">
                        <label class="">Ancien mot de passe</label>
                        <input name="old_password" placeholder="Ancien mot de passe" type="password" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Nouveau mot de passe</label>
                        <input name="password" placeholder="Nouveau mot de passe" type="password" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Confirmez le nouveau mot de passe</label>
                        <input name="password_confirm" placeholder="Confirmez le nouveau mot de passe" type="password" required class="form-control">
                    </div>
                    <p id="infoslogin" style="text-align: center;color: red"></p>
                    <div class="text-center">
                        <button class="mt-1 btn btn-primary">Enregistrer <i class="fa fa-spinner fa-spin" style="display:none;" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection