@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
@endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{old('title', $product->title)}}"
                                    name="title" required placeholder="Enter Product Title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SKU<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{old('sku', $product->sku)}}" name="sku"
                                    required placeholder="Enter SKU">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category<span style="color: red;">*</span></label>
                                <select class="form-control" name="category_id" id="getCategory" required>
                                    <option value="">Select</option>
                                    @foreach ($getCategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Category<span style="color: red;">*</span></label>
                                <select class="form-control" name="sub_category_id" id="getSubCategory" required>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price (NPR) <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{old('price', $product->price)}}"
                                    name="price" required placeholder="Enter Price">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old Price (NPR)</label>
                                <input type="text" class="form-control"
                                    value="{{old('old_price', $product->old_price)}}" name="old_price"
                                    placeholder="Enter Old Price">
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image[]" multiple="multiple" class="form-control"
                                    style="padding: 5px;">
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Description<span style="color: red;">*</span></label>
                                <textarea name="short_description" class="form-control" required
                                    placeholder="Enter Short Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description<span style="color: red;">*</span></label>
                                <textarea name="description" class="form-control editor" required
                                    placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Additional Information<span style="color: red;">*</span></label>
                                <textarea name="additional_information" class="form-control editor" required
                                    placeholder="Additional Information"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Shipping Returns<span style="color: red;">*</span></label>
                                <textarea name="shipping_returns" class="form-control editor" required
                                    placeholder="Shipping Returns"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status <span style="color: red;">*</span></label>
                                <select class="form-control" name="status">
                                    <option {{($product->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                    <option {{($product->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')


<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript">
    $('body').delegate('#getCategory','change',function(e){
            var id = $(this).val();
            $.ajax({
                type : "POST",
                url : "{{url('/get_sub_category')}}",
                data : {
                    "id" : id,
                    "_token": "{{csrf_token()}}"
                },
                dataType : "json",
                success: function(data){
                    $('#getSubCategory').html(data.html);
                },
                error : function(data){
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