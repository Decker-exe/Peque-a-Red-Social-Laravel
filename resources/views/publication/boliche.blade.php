@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">


        <!-- /.col-lg-3 -->

        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12">

                </div>

            </div>


            <div class="row">

                @foreach($publication as $publication)
                @if($publication->tipo=='boliche')
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
                                {{$publication->description}}
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach       
            </div>

        </div>
    </div>


</div>
@endsection