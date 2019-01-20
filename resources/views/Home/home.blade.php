@extends('Home.master')

@section('content')

    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @foreach($articles as $article)
            <div class="card mb-4">
                <img class="card-img-top" src="{{ $article->images['images']['725'] }}" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{$article->title}}</h3>
                    <p class="card-text">{!! $article->description !!}</p>
                    <br><br>
                    <a href="{{$article->path() }}" class="btn btn-color"> ادامه مطلب</a>
                </div>
                <div class="card-footer text-muted">
                    <h6>تاریخ مطلب {{jdate($article->create_at)->format('%B %d، %Y')}}</h6>
                    <h6 style=" font-size: 0.85em;">تعداد بازدید ({{$article->viewCount}})</h6>
                </div>
            </div>
         @endforeach

       <!-- Pager -->
            <div style="text-align:center;">
                {!! $articles->render() !!}
            </div>

  </div>

@endsection