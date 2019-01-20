@extends('Admin.master')

@section('main')
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4 margin-top">
        <div class="page-header head-section">
            <h2>همه نظرات</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>

                    <th>نام کاربر</th>
                    <th>ایمیل کاربر</th>
                    <th>متن کامنت</th>
                    <th>پست مربوطه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td><a class="a-link" href="{{ $comment->article->path() }}">{{  $comment->article->title }}</a></td>
                        <td>
                            <form action="{{ route('comments.destroy'  , ['id' => $comment->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $comments->render() !!}
        </div>
    </div>
@endsection