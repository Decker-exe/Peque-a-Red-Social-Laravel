@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <br>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    editar una imagen
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('publication.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="publication_id" value="{{$publication->id}}"/>

                        <div class=" row">


                            <label for="image_path" class="col-md-3 col-form-label text-md-right " >
                                Imagen Actual
                            </label>
                            <div class="col-md-9">
                                <img style="width:100px; height:50px;" src="{{route('publication.file',['filename'=>$publication->image_path])}}" alt="">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">

                            <label for="image_path" class="col-md-3 col-form-label text-md-right " >
                                Imagen(Obligatoria)
                            </label>

                            <div class="col-md-9" >

                                <input id="image_path" type="file" name="image_path" class="form-control" >

                                @if($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('image_path')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right " >
                                Breve descripcion
                            </label>
                            <div class="col-md-9" >
                                <textarea id="description" name="description" class="form-control" >{{$publication->description}}</textarea>
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
                                <textarea id="descriptionL" name="descriptionL" class="form-control" >{{$publication->descriptionL}}</textarea>
                                @if($errors->has('descriptionL'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('descriptionL')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-md-6 offset-md-3" >
                                <input type="submit" class="btn-primary" value="Actualizar Publicacion" >
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