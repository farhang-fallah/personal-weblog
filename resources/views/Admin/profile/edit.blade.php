@extends('Admin.master')

@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('biography' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection

@section('main')
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4 margin-top">
        <div class="page-header margin-top">
            <h2>ایجاد مقاله جدید</h2>
        </div>
        <form class="form-horizontal" action="{{ route('profile.update' , ['id' => $profile->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PATCH')}}

            @include('Admin.section.errors')

            <div class="form-group">
                <div class="col-xl-12">
                    <label for="images" class="control-label">تصویر هدر سایت</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر را وارد کنید">
                </div>
                <div class="col-xl-12">
                    <div class="row">
                        @foreach( $profile->images['images'] as $key => $image)
                            <div class="col-xl-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $profile->images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xl-12">
                    <label for="body" class="control-label">متن</label>
                    <textarea rows="5" class="form-control" name="biography" id="biography" placeholder="متن بیوگرافی خود را وارد کنید">{{ $profile->biography }}</textarea>
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