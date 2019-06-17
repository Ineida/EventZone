@extends('template')

@section('titre_page')
    Annonce
@endsection

@section('titre')
    <h1 class="align-content-center text-success">Créer une annonce </h1>
@endsection
@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
            <div class="card align-items-center">
                <div class="card-header bg-success">Créer un annonce </div>
                <div class="card-body">
                    {!! Form::open(['url' => 'saisieAnnonce',"method"=>"post"]) !!}
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Rentrez votre email']) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
                        {!! Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Rentrez le sujet']) !!}
                        {!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Dites nous ce que vous recherchez']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <p></p>
@endsection