<div class="products mb-3">
    @include('sweetalert::alert')
    <div class="row justify-content-center">
        @foreach($getProduct as $value)
        @php
        $getProductImage = $value->getImageSingle($value->id);
        @endphp
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="{{$value->slug}}">
                        @if(!empty($getProductImage) && !empty($getProductImage->getImage()))
                        <img style="height: 280px; width: 100%; object-fit: cover;"
                            src="{{$getProductImage->getImage()}}" alt="{{$value->title}}" class="product-image">
                        @endif
                    </a>

                    <div class="product-action-vertical">
                    @if(!empty(Auth::check()))
                                    
                      <a href="javascript:;" data-toggle="modal" class="add_to_wishlist add_to_wishlist{{ $value->id }}
                     btn-product-icon btn-wishlist btn-expandable
                     {{ !empty($value->checkWishlist($value->id)) ? 'btn-wishlist-add' : '' }}" id="{{ $value->id }}"
                    title="Wishlist"><span>add to wishlist</span></a>
                    @else
                  <a href="#signin-modal" data-toggle="modal" class="btn-product-icon btn-wishlist btn-expandable" 
                  title="Wishlist"><span>add to wishlist</span></a>
                               @endif
                    </div>

                    <form action="{{url('/cart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$value->id}}">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="product_name" value="{{$value->title}}">
                        <div class="product-action">
                            <button type="submit" style="width: 100px; " class="btn-product btn-cart btn btn-outline-primary-2 btn-order btn-block">
                                <span class="btn-text">add to cart</span>
                                <span class="btn-hover-text">add to your shopping cart</span>
                            </button>
                        </div>

                    </form>
                </figure>

                <div class="product-body">
                    <div class="product-cat">
                        <a
                            href="{{url($value->category_slug.'/'.$value->sub_category_slug)}}">{{$value->sub_category_name}}</a>
                    </div>
                    <h3 class="product-title"><a href="{{$value->slug}}">{{$value->title}}</a></h3>
                    <div class="product-price">
                        NPR {{number_format($value->price, 2)}}
                    </div>
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div>
                        </div>
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


