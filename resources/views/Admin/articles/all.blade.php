@extends('Admin.master')

@section('main')
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4 margin-top">
        <div class="page-header margin-top">
            <h2 class="sub-header">مقالات</h2>
            <hr>
            <a href="{{route('article.create')}}" class="btn btn-primary float-left">ایجاد مقاله جدید</a>
        </div>


        <div class="table-responsive">
            <table class="table table-striped table-bordered margin-top">
                <thead>
                <tr>
                    <th>عنوان مقاله</th>
                    <th>تعداد نظرات</th>
                    <th>تعداد بازدید</th>
                    <th>تنضیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><a class="a-link" href="{{ $article->path () }}">{{ $article->title }}</a></td>
                        <td>{{ $article->commentCount }}</td>
                        <td>{{ $article->viewCount }}</td>
                        <td>
                            <form action="{{ route('article.destroy' , [ 'id' => $article->slug ]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('article.edit' , [ 'id' => $article->slug ]) }}" class="btn btn-primary btn-sm">ویرایش</a>
                                    <button type="submit" class="btn btn-dan-danger btn-sm">حذف</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection