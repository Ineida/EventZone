@extends('template')

@section('titre_page')
    Prestataire
@endsection

@section('titre')
    <h1 class="text-success">Créer un prestataire </h1>
@endsection
@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card align-items-center">
            <div class="card-header bg-success">Créer une prestataire </div>
            <div class="card-body">
                <p> Avant tout inscription votre etablissement doit s'inscrire sur la plateforme, si vous voulez vous inscrire comme auto-entrepreneur, inscrivez vous comme etablissement avant de preceder à l'inscription de prestataire.
                Vous devez connaitre votre code etablissement pour vous inscrire.</p>
                {!! Form::open(['url' => 'saisiePrestataire', "method"=>"post"]) !!}
                {{csrf_field()}}
                {{method_field('post')}}
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Rentrez votre nom ']) !!}
                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('adresse') ? 'has-error' : '' !!}">
                    {!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Rentrez l adresse']) !!}
                    {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
                    {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Rentrez le telephone']) !!}
                    {!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('etablissement') ? 'has-error' : '' !!}">
                    {!! Form::text('etablissement', null, ['class' => 'form-control', 'placeholder' => 'Rentrez le code de votre etablissement']) !!}
                    {!! $errors->first('etablissement', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('salle') ? 'has-error' : '' !!}">
                    <label for="salle">Vous vous inscrivez en tant que louer de salle:</label>

                    <select name="salle" id="salle">
                        <option value=1>OUI</option>
                        <option value=0 selected>NON</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="profession">Chosissez votre profession:</label>
                    <select name="profession" id="profession">

                            @foreach($listeProfession as $p)
                                <option value="{{$p->getId()}}">{{$p->getNom()}}</option>
                            @endforeach

                    </select>
                </div>

                {!! Form::submit('Valider', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection