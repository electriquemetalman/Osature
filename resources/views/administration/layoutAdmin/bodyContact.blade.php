<div id="demo" class="about col-md-10 mx-auto">

    @if (session()->has('message'))
    <div class="alert alert-info text-center alert-dismissible">
        {{ session('message') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger text-center upper alert-dismissible">
        {{ session('error') }}
    </div>
    @endif

    @if ($adresse==null)
    <form action="{{ route('save_contact_admin_path') }}" method="POST">
        @csrf
        <div>
            <h3 class="text-center">Mettre à jour les adresses</h3>
        </div>
            <span>Localisation</span>

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="localisation" placeholder="Localisation" required>
        </div>

            <span>Adresse(s) Emails</span>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="email"  placeholder="Adresse(s) Emails" required>
        </div>

        <span>Numéro de téléphone</span>
        <div class="input-group mb-3">

            <input type="text" class="form-control" name="telephone"  placeholder="Numéro de téléphone" required>
        </div>

        <span>Code de l'adresse de localisation google map (<a href="https://www.e-monsite.com/pages/tutoriels/services-externes/afficher-une-carte-de-localisation-geographique-sur-votre-site.html"> En savoir plus </a>)</span>
        <div class="input-group mb-3">
            <textarea name="adresse"  rows="6"  class="form-control"  placeholder=" Adresse google map "
                 ></textarea>
        </div>

        <input type="submit" class="btn btn-success  form-control mb-5" value='Valider'/>
    </form>
    @else
    <form action="{{ route('save_contact_admin_path') }}" method="POST">
        @csrf
        <div>
            <h3 class="text-center">Mettre à jour les adresses</h3>
        </div>
            <span>Localisation</span>

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="localisation" value=" @if($adresse) {{ $adresse->localisation  }} @endif " placeholder="Localisation" required>
        </div>

            <span>Adresse(s) Emails</span>
            <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" value=" @if($adresse) {{ $adresse->email  }} @endif" placeholder="Adresse(s) Emails" required>
        </div>

        <span>Numéro de téléphone</span>
        <div class="input-group mb-3">

            <input type="text" class="form-control" name="telephone" value=" @if($adresse) {{ $adresse->telephone  }} @endif" placeholder="Numéro de téléphone" required>
        </div>

        <span>Code de l'adresse de localisation google map (<a href="https://www.e-monsite.com/pages/tutoriels/services-externes/afficher-une-carte-de-localisation-geographique-sur-votre-site.html"> En savoir plus </a>)</span>
        <div class="input-group mb-3">
            <textarea name="adresse"  rows="6"  class="form-control" value="{{ $adresse->adresse  }}" placeholder=" @if($adresse) {{ $adresse->adresse  }} @else Adresse google map @endif "
                 ></textarea>
        </div>

        <input type="submit" class="btn btn-success  form-control mb-5" value='Valider'/>
    </form>
    @endif
</div>
