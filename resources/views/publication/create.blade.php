@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <br>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header letrasNav">
                    Subir una nueva imagen
                </div>
                <div class="card-body letras">
                    <form method="POST" action="{{route('publication.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="image_path" class="col-md-3 col-form-label text-md-right " >
                                Imagen
                            </label>
                            <div class="col-md-9" >
                                <input id="image_path" type="file" name="image_path" class="form-control" required>
                                @if($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('image_path')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right " >
                                Descripcion
                                (Maximo 255 caracteres)
                            </label>
                            <div class="col-md-9" >
                                <textarea id="description" name="description" class="form-control" required>
                                    
                                </textarea>
                                @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descriptionL" class="col-md-3 col-form-label text-md-right " >
                                Descripcion
                            </label>
                            <div class="col-md-9" >
                                <textarea id="description" name="descriptionL" class="form-control" required>
                                    
                                </textarea>
                                @if($errors->has('descriptionL'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3 col-form-label text-md-right ">

                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="exampleRadios1" value="bar" >
                                    <label class="form-check-label" for="bar">
                                        bar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="exampleRadios2" value="boliche">
                                    <label class="form-check-label" for="boliche">
                                        boliche
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3" >
                                <input type="submit" class="btn-primary" value="Subir imagen" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
@endsection