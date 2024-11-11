@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add New Blog</h1>
                </div>
            </div>
        </div>
    </div>
    @include('admin.auth.message')

    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="form-group">
                        <label>Title<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" required
                            placeholder="Title">
                    </div>
                    <div style="color: red;">{{$errors->first('title')}}</div>

                    <div class="form-group">
                        <label>Category Name <span style="color: red;">*</span></label>
                       <select class="form-control" name="blog_category_id" required>
                        <option value="">Select</option>
                         @foreach($getCategory as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                       </select>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Image <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" name="image_name" 
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description<span style="color: red;">*</span></label>
                        <textarea class="form-control editor" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status <span style="color: red;">*</span></label>
                        <select class="form-control" name="status">
                            <option {{(old('status') == 0) ? 'selected' : ''}} value="0">Active</option>
                            <option {{(old('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Meta Title <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('meta_title')}}" name="meta_title" required
                            placeholder="Meta title">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description"
                            placeholder="Meta description">{{old('meta_description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="form-control" value="{{old('meta_keywords')}}" name="meta_keywords"
                            placeholder="Meta keywords">
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
                title: 'Success!',
                text: 'Blog created.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection