@extends('layouts.app')
<?php

use App\Comment;
use App\Star;
?>
@section('content')
<div class="container">

    <div class="row">


        <!-- /.col-lg-3 -->

        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12">
                    <h2 class="text-center letras">Lo mejor de la semana</h2>
                    <br>
                    <br>
                </div>

            </div>


            <div class="row">

                @foreach($publication as $publication)

                <div class="col-lg-4 col-md-6 mb-4">



                    <div class="card h-100">
                        <a href="{{route('publication.detail', ['id' => $publication->id])}}"><img class="card-img-top" img src="{{route('publication.file',['filename'=>$publication->image_path])}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title text-center">
                                <a class="letras-link" href="{{route('publication.detail', ['id' => $publication->id])}}" >
                                    {{$publication->user->name}}
                                </a>
                            </h4>


                            <p class="card-text letras">
                                @if(strlen($publication->description)< 255)
                                {{$publication->description}}
                                @endif

                            </p>
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
                            <p class="letras">comentarios({{count($publication->comment)}})</p>
                            @foreach($publication->comment as $comment)

                            @endforeach

                        </div>
                    </div>
                </div>

                @endforeach 


            </div>
            <div class="clearfix"></div>
        

        </div>
    </div>


</div>
@endsection
