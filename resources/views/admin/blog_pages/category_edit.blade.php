@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Blog</h1>
                </div>
            </div>
        </div>
    </div>
    @include('admin.auth.message')

    @php
    $getImage = $getRecords->getImageSingle($getRecords->id);
    @endphp
    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf


                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ $getRecords->title }}"
                                        name="title" required placeholder="Title">
                                </div>
                                <div style="color: red;">{{$errors->first('title')}}</div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Name <span style="color: red;">*</span></label>
                                    <select class="form-control" name="blog_category_id" required>
                                        <option value="">Select</option>
                                        @foreach($getCategory as $category)
                                        <option {{ ($getRecords->blog_category_id == $category->id ) ? 'selected' : ''}}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if(empty($getImage) && empty($getImage->getImage()))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Blog Image <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="image_name"
                                        value="{{$getRecords->image_name}}" required>
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    <img src="{{$getImage->getImage()}}"
                                        style="width: 100px; height: 100px; border-radius: 80%;">

                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>Blog Image </label>
                                    <input type="file" class="form-control" name="image_name"
                                        value="{{$getRecords->image_name}}">
                                </div>
                            </div>
                            @endif

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description<span style="color: red;">*</span></label>
                                    <textarea class="form-control editor"
                                        name="description">{{ $getRecords->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Blog Content<span style="color: red;">*</span></label>
                                    <textarea class="form-control editor"
                                        name="blog_content">{{ $getRecords->blog_content }}</textarea>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status <span style="color: red;">*</span></label>
                                    <select class="form-control" name="status">
                                        <option {{($getRecords->status == 0) ? 'selected' : ''}} value="0">Active
                                        </option>
                                        <option {{($getRecords->status == 1) ? 'selected' : ''}} value="1">Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Meta Title <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{ $getRecords->meta_title }}"
                                        name="meta_title" required placeholder="Meta title">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea class="form-control" name="meta_description"
                                        placeholder="Meta description">{{ $getRecords->meta_description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" class="form-control" value="{{ $getRecords->meta_keywords }}"
                                        name="meta_keywords" placeholder="Meta keywords">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function () {
    var shownPopup = false;
    $("form").submit(function (event) {
        if (shownPopup === false) {
            event.preventDefault();
            shownPopup = true;
            var form = $(this);
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: 'Blog has been updated.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});

$(function () {
            $('.editor').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
            });
        });

        $('.editor').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });
</script>
@endsection