@extends('layouts.app')

@section('content')
    <main id="main" class="mt-5 pt-5">
        <div class="container">
            <img src="{{asset('/storage/' . $news->image)}}" alt="">
            <h1>{{$news->title}}</h1>
            <h3>{!! $news->body !!}</h3>
        </div>
    </main>
@endsection
