 <div class="well">
        <h4>ثبت نظر :</h4>
        @include('Home.section.errors')
        <form role="form" action="{{ route('comment.store' , ['article' => $article->slug ]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">
            <div class="form-group">
                <label for="name">نام</label>
                <input type="text" class="form-control" name="name">
                <label for="email">ایمیل</label>
                <input type="email" class="form-control" name="email">
                <label type="text">نظر خود را وارد کنید...</label>
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
    </div>


<hr>

<!-- Posted Comments -->

@foreach($comments as $comment)
    <div class="media p-4 m-2" style="background: #F4F7F6">
        <a class="pull-right " href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h6 class="media-heading">
                <small style="font-size: 1em; color: #0069D9;">{{ $comment->name }}</small>
                <small style="color:#444444; "> در {{ jdate($comment->created_at)->ago() }}  </small>
            </h6>
            <h5 class="cm">{!! $comment->comment !!}</h5>
        </div>
    </div>
@endforeach
