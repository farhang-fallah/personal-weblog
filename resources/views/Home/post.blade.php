@extends('Home.master')

@section('content')
    <!-- Post Content Column -->
    <div class="col-lg-8 card mb-4 ">


        <h2 class="mt-4">{{$article->title}}</h2>
        <div class="text-muted">
            <h6 style=" font-size: 0.85em;">نام نویسنده</h6>
            <h6 style=" font-size: 0.85em;">درج شده در {{jdate($article->create_at)->format('%B %d، %Y')}}</h6>
        </div>
        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ $article->images['images']['800'] }}" alt="">

        <hr>

        <!-- Post Content -->

        <div class="paragraph">{!! $article->body !!}</div>

    @include('Home.section.comment' , ['comments' => $comments , 'subject' => $article])

    </div>
@endsection
