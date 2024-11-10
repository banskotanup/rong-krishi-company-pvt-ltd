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
                    <h1 class="m-0">Abous Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            @include('admin.auth.message')
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            @if(empty($getRecords->getImage()))
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Us Image <span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" name="about_us_image" value="" required>
                                </div>
                            </div>
                            @else
                            <div class="col-md-1">
                                <div class="form-group">
                                    <img src="{{$getRecords->getImage()}}" style="width: 100px; height: 100px; border-radius: 80%;">
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="form-group">
                                    <label>About Us Image</label>
                                    <input type="file" class="form-control" name="about_us_image" value="{{$getRecords->about_us_image}}">
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Who We Are? <span style="color: red;">*</span></label>
                                    <textarea name="who_we_are" class="form-control editor" required
                                    placeholder="Who We Are?">{{$getRecords->who_we_are}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Our Vision <span style="color: red;">*</span></label>
                                    <textarea name="our_vision" class="form-control editor" required
                                    placeholder="Our Vision?">{{$getRecords->our_vision}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Our Mission <span style="color: red;">*</span></label>
                                    <textarea name="our_mission" class="form-control editor" required
                                    placeholder="Our Mission?">{{$getRecords->our_mission}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                text: 'System setting has been updated.'
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