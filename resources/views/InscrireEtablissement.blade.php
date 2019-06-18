@extends('template')

@section('titre_page')
    Etablissement
@endsection

@section('titre')
    <h1 class="text-success">Créer un Etablissement </h1>
@endsection
@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card align-items-center" >
            <div class="card-header bg-success">Créer un etablissement </div>
            <div class="card-body">
                {!! Form::open(['url' => 'saisieEtablissement']) !!}
                {{csrf_field()}}
                {{method_field('post')}}
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Rentrez le nom de l etablissement']) !!}
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
                <div class="form-group {!! $errors->has('ville') ? 'has-error' : '' !!}">
                    {!! Form::text('ville', null, ['class' => 'form-control', 'placeholder' => 'Rentrez la ville']) !!}
                    {!! $errors->first('ville', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('pays') ? 'has-error' : '' !!}">
                    {!! Form::text('pays', null, ['class' => 'form-control','placeholder' => ' Rentrez le pays']) !!}
                    {!! $errors->first('pays', '<small class="help-block">:message</small>') !!}
                </div>

                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
