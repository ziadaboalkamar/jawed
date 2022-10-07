@extends('layout.app')
@section('title')
    {{ __('تعديل الخبر') }}
@stop

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ __('تعديل الخبر') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <x-alert/>
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('blogs.update',$blog->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- project title --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">{{ __('عنوان الخبر') }}</label>
                                        <input type="text"  class="form-control" id="title" name="title" value="{{ old('title',$blog->title) }}" required autofocus >
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- project title --}}
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="sub_title" class="form-label">{{ __('العنوان الفرعي للخبر') }}</label>
                                        <input type="text"  class="form-control" id="sub_title" name="sub_title" value="{{ old('sub_title',$blog->sub_title) }}" >
                                    </div>
                                </div>
                                {{-- end project title --}}

                                {{-- main image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @if($blog->main_image)
                                        <img src="{{ asset('storage/'.$blog->main_image) }}" width="100" alt="{{ $blog->title }}">
                                    @endif
                                    <div class="form-group fallback w-100">
                                        <label for="main_image" class="form-label">{{ __('الصورة الرئيسية') }}</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end main image --}}


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('وصف قصير') }}</label>
                                        <textarea class="form-control" rows="3" name="short_description" id="short_description" >{{ old('short_description',$blog->short_description) }}</textarea>
                                    </div>
                                </div>
                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">{{ __('وصف الخبر') }}</label>
                                        <textarea name="description" id="description" cols="30" rows="10">{{ old('description',$blog->description) }}</textarea>
                                    </div>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>
                                {{-- end project title --}}

                                {{-- Gallary image --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    @foreach ($blog->images as $gallery)
                                        <div class="form-check form-check-inline">
                                            حذف <input type="checkbox" name="{{ "check_".$gallery->id }}" class="form-check-input" value="">
                                        </div>
                                        <img src="{{ asset('storage/'.$gallery->image) }}" width="100" alt="{{ $blog->title }}">
                                    @endforeach
                                    <div class="form-group fallback w-100">
                                        <label for="gallery" class="form-label">{{ __('الصور الاخرى') }}</label>
                                        <input type="file" multiple id="gallery" name="gallery[]" class="form-control" data-default-file="" >
                                    </div>
                                </div>
                                {{-- end gallary image --}}

                                {{-- project title --}}
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="tags" class="form-label">{{ __('الكلمات مفتاحية') }}</label>
                                        <input type="text" value="{{ old('tags',($tags ?? ' ')) }}" class="form-control" data-role="tagsinput"  name="tags">
                                    </div>
                                </div>
                                {{-- end project title --}}


                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <button type="reset" class="btn btn-light">{{ __('Cencel') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->

                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
@endsection

