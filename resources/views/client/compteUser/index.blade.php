<<<<<<< HEAD
=======
@extends('client/index')
@section('content')
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
<<<<<<< HEAD
                <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
            </div>
            <div>Liste des comptes de l'utlisateur
=======
                <i class="pe-7s-users icon-gradient bg-tempting-azure"></i>
            </div>
            <div>Liste des comptes de l'utilisateur
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
                {{-- <div class="page-title-subheading">Choose between regular React Bootstrap tables or advanced dynamic ones.</div> --}}
            </div>
        </div>
        <div class="page-title-actions">
<<<<<<< HEAD
            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
                <i class="fa fa-pencil"></i>
=======
            <button type="button" class="btn btn-primary btnedit" data-lien="compteUser/add" data-modal="modalAll" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ajouter">
                <i class="fa fa-plus mr-2"></i> Ajouter
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
            </button>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
<<<<<<< HEAD
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Type de compte</th>
                    <th>Adresses</th>
=======
        <table style="width: 100%;" class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Type de compte </th>
                    <th>Adresse</th>
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                <tr>
                    <td>Tiger Nixon</td>
                    <td>$320,800</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </td>
                </tr>
=======
                @foreach(auth()->user()->compteUsers as $compteUser)
                <tr>
                    <td>{{$compteUser['type']=="apm" ? "Adresse USD Perfect money":($compteUser['type']=="payeer" ? "Adresse USD Payeer":"Adresse Bitcoin")}}</td>
                    <td>{{$compteUser['adresse']}}</td>
                    <td>
                        <button type="button" class="btn btn-secondary btnedit" data-lien="compteUser/edit/{{$compteUser['id']}}" data-modal="modalAll" data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier un compte">
                            <i class="lnr-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger remove-row" data-lien="compteUser/delete/{{$compteUser['id']}}" data-modal="modalAll" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer un compte">
                            <i class="lnr-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
            </tbody>
        </table>
    </div>
</div>
@endsection