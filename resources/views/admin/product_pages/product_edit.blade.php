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
    @include('admin.auth.message')
    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" value="{{old('title', $product->title)}}"
                                    name="title" placeholder="Enter Product Title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control" value="{{old('sku', $product->sku)}}" name="sku"
                                    placeholder="Enter SKU">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category<span style="color: red;">*</span></label>
                                <select class="form-control" name="category_id" id="getCategory" required>
                                    <option value="">Select</option>
                                    @foreach ($getCategory as $category)
                                    <option {{($category-> id == $product->category_id) ? 'selected' : ''}}
                                        value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Category<span style="color: red;">*</span></label>
                                <select class="form-control" name="sub_category_id" id="getSubCategory" required>
                                    <option value="">Select</option>
                                    @foreach ($getSubCategory as $sub_category)
                                    <option {{($sub_category-> id == $product->sub_category_id) ? 'selected' : ''}}
                                        value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price (NPR)</label>
                                <input type="text" class="form-control" value="{{old('price', $product->price)}}"
                                    name="price" placeholder="Enter Price">
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

                    @if(!empty($product->getImage->count()))
                    <div class="row" id="sortable">
                        @foreach($product->getImage as $image)
                        @if(!empty($image->getImage()))
                        <div class="col-md-1 sortable_image" id="{{$image->id}}" style="text-align: center;">
                            <img style="height: 100px; width:100%;" src="{{$image->getImage()}}" alt="">
                            <a onclick="confirmation(event)" href="{{url('/image_delete/'.$image->id)}}"
                                class="btn btn-danger btn-sm" style="margin-top:10px;">Delete</a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_description" class="form-control"
                                    placeholder="Enter Short Description">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control editor"
                                    placeholder="Enter Description">{{$product->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Additional Information</label>
                                <textarea name="additional_information" class="form-control editor"
                                    placeholder="Additional Information">{{$product->additional_information}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Shipping Returns</label>
                                <textarea name="shipping_returns" class="form-control editor"
                                    placeholder="Shipping Returns">{{$product->shipping_returns}}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option {{(old('status', $product->status) == 0) ? 'selected' : ''}} value="0">Active</option>
                                    <option {{(old('status', $product->status) == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')


<script src="/admin/sortable/jquery-ui.js"></script>
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

        $( function() {
            $( "#sortable" ).sortable({
                update : function(event, ui){
                    var photo_id = new Array();
                    $('.sortable_image').each(function(){
                        var id = $(this).attr('id');
                        photo_id.push(id);
                    });
                    $.ajax({
                        type : "POST",
                        url : "{{url('/product_image_sortable')}}",
                        data : {
                            "photo_id" : photo_id,
                            "_token": "{{csrf_token()}}"
                        },
                        dataType : "json",
                        success: function(data){
                            
                        },
                        error : function(data){
                        }
                    });
                }
            });
        });
</script>
@endsection