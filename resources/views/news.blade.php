@extends('layouts.app')

@section('content')

    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/">{{trans('home.main')}}</a></li>
                    <li>{{$news->title}}</li>
                </ol>
                <h2>{{trans('home.news')}}</h2>
            </div>
        </section>
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article class="entry entry-single">
                            <div class="entry-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>
                            <h2 class="entry-title">
                                <a href="blog-single.html">{{$news->title}}</a>
                            </h2>
                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="{{$news->created_at}}">{{$news->created_at}}</time></a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <img src="{{asset('/storage/' . $news->image)}}" class="img-fluid" alt="">
                                <p>{!! $news->body !!}</p>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <h3 class="sidebar-title">{{trans('home.othernews')}}</h3>
                            <div class="sidebar-item recent-posts">
                                @if(!empty($AllNews))
                                    @foreach($AllNews as $post)
                                        <div class="post-item clearfix">
                                            <img src="{{asset('/storage/'. $post->image)}}" alt="">
                                            <h4><a href="{{route('news', $post->id)}}">{{$post->title}}</a></h4>
                                            <time datetime="{{$post->created_at}}">{{$post->created_at}}</time>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
