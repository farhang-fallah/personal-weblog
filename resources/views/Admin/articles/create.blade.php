@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('main')
    <div class="col-md-9 ml-sm-auto col-xl-10 px-4 margin-top ">
        <div class="page-header margin-top">
            <h2>ایجاد مقاله جدید</h2>
        </div>
        <form class="form-horizontal" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('Admin.section.errors')
            <div class="form-group">
                <div class="col-xl-12">
                    <label for="title" class="control-label">عنوان مقاله</label>
                    <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="عنوان را وارد کنید" value="{{ old('title') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xl-6">
                    <label for="images" class="control-label">تصویر کالا</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را وارد کنید" value="{{ old('images') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xl-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="body" id="body" placeholder="متن مقاله را وارد کنید">{{ old('body') }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xl-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
    </div>

@endsection