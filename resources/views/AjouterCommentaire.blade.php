@extends('template')

@section('titre_page')
    Commentaire
@endsection

@section('titre')
    <h1 class="align-content-center text-success">Créer un commentaire </h1>
@endsection
@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card align-items-center">
            <div class="card-header bg-success ">Créer un annonce </div>
            <div class="card-body ">
                {!! Form::open(['url' => 'saisieCommentaire']) !!}
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Rentrez votre email']) !!}
                    {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('etablissement') ? 'has-error' : '' !!}">
                    <label for="etablissement">Chosissez la prestataire:</label>
                    <select id="etablissement">
                        @foreach($etablissement as $p)
                            <option value="{{$p->getId()}}">{{$p->getNom()}}()</option>
                    </select>
                </div>
                <div class="form-group {!! $errors->has('prestataire') ? 'has-error' : '' !!}">
                        <label for="prestataire">Chosissez la prestataire:</label>
                        <select id="prestataire">
                            @foreach($prestataire as $p)
                                <option value="{{$p->getId()}}">{{$p->getNom()}}()</option>
                        </select>
                    </div>
                <div class="form-group {!! $errors->has('sujet') ? 'has-error' : '' !!}">
                    {!! Form::text('sujet', null, ['class' => 'form-control', 'placeholder' => 'Rentrez le sujet']) !!}
                    {!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
                    {!! Form::Integer('note', null, ['class' => 'form-control','placeholder' => 'donnez une note']) !!}
                    {!! $errors->first('note', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('commentaire') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('commentaire', null, ['class' => 'form-control', 'placeholder' => 'Dites nous ce que vous en pensez']) !!}
                    {!! $errors->first('commentaire', '<small class="help-block">:message</small>') !!}
                </div>
                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <p></p>
@endsection