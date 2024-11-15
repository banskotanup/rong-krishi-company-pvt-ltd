@extends('home.layouts.app')
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$getBlog->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            @include('sweetalert::alert')
            <div class="row">
                <div class="col-lg-9">
                    @php
                        $getImage = $getBlog->getImageSingle($getBlog->id);
                    @endphp
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            @if(!empty($getImage) && !empty($getImage->getImage()))
                                <img src="{{$getImage->getImage()}}" alt="image desc">
                            @endif
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <a href="#">{{date('M d, Y', strtotime($getBlog->created_at))}}</a>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$getBlog->getCommentCount()}} Comments</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                {{$getBlog->title}}
                            </h2><!-- End .entry-title -->


                            <div class="entry-content editor-content">
                                {!! $getBlog->blog_content !!}
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->


                    <div class="related-posts">
                        <h3 class="title">Related Posts</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl" 
                            data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>

                            @foreach($getRelatedBlog as $relatedBlog)
                            @php
                                $getImage = $relatedBlog->getImageSingle($relatedBlog->id);
                            @endphp
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="{{url('/blog/'.$relatedBlog->slug)}}">
                                        @if(!empty($getImage) && !empty($getImage->getImage()))
                                            <img src="{{$getImage->getImage()}}" style="height: 250px;" alt="image desc">
                                        @endif
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">{{date('M d, Y', strtotime($relatedBlog->created_at))}}</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">{{$relatedBlog->getCommentCount()}} Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="{{url('/blog/'.$relatedBlog->slug)}}">{{$relatedBlog->title}}</a>
                                    </h2><!-- End .entry-title -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach

                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->

                    <div class="comments">
                        <h3 class="title">{{$getBlog->getCommentCount()}} Comments</h3><!-- End .title -->

                        <ul>
                            @foreach($getBlog->getComment as $comment)
                            <li>
                                <div class="comment">

                                    <div class="comment-body">
                                        <div class="comment-user">
                                            <h4><a href="#">{{$comment->getUser->name}}</a></h4>
                                            <span class="comment-date">{{date('M d, Y', strtotime($comment->created_at))}}</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>{{$comment->comment}}</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Comment</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form action="{{url('blog/submit_comment')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="blog_id" value="{{$getBlog->id}}">
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="comment" id="comment" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                            @if (!empty(Auth::check()))
                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                            @else
                            <a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                            @endif
                        </form>
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <ul>
                                @foreach($getBlogCategory as $category)
                                <li><a href="{{url('/blog/category/'.$category->slug)}}">{{$category->name}}<span>{{$category->getCountBlog()}}</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .widget -->
                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                @foreach ($getPopular as $popular)
                                <li>
                                    <figure>
                                        @php
                                            $getImage = $popular->getImageSingle($popular->id);
                                        @endphp
                                        <a href="#">
                                            <img src="{{$getImage->getImage()}}" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>{{date('M d, Y', strtotime($popular->created_at))}}</span>
                                        <h4><a href="{{url('blog/'.$popular->slug)}}">{{$popular->title}}</a></h4>
                                    </div>
                                </li>
                                @endforeach
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                        <div class="widget">

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection