@extends('layouts.app')

@section('content')
<div class="container t">

    <div class="row">

        <div class="col-md-1">

        </div>
        <div class="col-md-10">

            <div class="card mt-4">
                <div class="card-header">
                    <h1 class=" detalles letrasNav">{{$publication->user->name}}</h1>
                </div>
                <img class="card-img-top img-fluid image-container " src="{{route('publication.file',['filename'=>$publication->image_path])}}" alt="">
                <div class="card-body">
                    <div class="description ">
                        <p class="letras"> {{$publication->description}}</p>
                    </div>
                    <div class="description ">
                        <p class="letras"> {{$publication->descriptionL}}</p>
                    </div>                           
                    <div class="star">
                        {{count($publication->star)}}

                        <?php $user_star = FALSE;
                        ?>

                        @foreach($publication->star as $star)
                        @if($star->user->id==Auth::user()->id)
                        <?php
                        $user_star = TRUE;
                        ?>

                        @endif
                        @endforeach

                        @if($user_star)

                        <img src="{{asset('img/pear-green.png')}}" data-id="{{$publication->id}}" class="btn-disstar">
                        @else
                        <img src="{{asset('img/pear-gray.png')}}"  data-id="{{$publication->id}}" class="btn-star">
                        @endif
                    </div>

                    @if(Auth::user() && Auth::user()->id == $publication->user->id)
                    <div class="action">
                        <a href="{{ route('publication.edit', ['id'=>$publication->id])}}" class="btn btn-sm btn-primary">
                            Actualizar
                        </a>
                        <a href="{{ route('publication.delete', ['id'=>$publication->id])}}"  class="btn btn-sm btn-danger">
                            Borrar
                        </a>
                    </div>
                    @endif

                </div>

            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header letrasNav">
                    <h5> Comentarios({{count($publication->comment)}})</h5>

                </div>
                <div class="card-body">

                    @foreach($publication->comment as $comment)
                    <div>

                        <h4 class="letras-link"> {{$comment->user->name.' '.$comment->user->surname}} </h4>
                        <p class="letras">{{$comment->content}}</p>


                    </div>
                    <hr>
                    @endforeach



                    <form method="POST" action="{{route('comment.save')}}">
                        @csrf
                        <input type="hidden" name="publication_id" value="{{$publication->id}}" />
                        <p>
                            <textarea class="form-control {{$errors->has('content')}} colorfondo" name="content" required></textarea>
                            @if($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$errors->first('content')}}</strong>
                            </span>
                            @endif
                        </p>
<!--                        <div class="form-group row ">

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valor" id="exampleRadios1" value="1" >
                                    <label class="form-check-label" for="1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valor" id="exampleRadios2" value="2">
                                    <label class="form-check-label" for="2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valor" id="exampleRadios3" value="3">
                                    <label class="form-check-label" for="3">
                                        3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valor" id="exampleRadios4" value="4">
                                    <label class="form-check-label" for="4">
                                        4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="valor" id="exampleRadios5" value="5">
                                    <label class="form-check-label" for="5">
                                        5
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        <div class="text-right">
                            <button type="submit" class=" btn btn-success colorbarra">
                                Envia tu comentario
                            </button> 
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <div class="col-md-1">

    </div>
</div>
@endsection