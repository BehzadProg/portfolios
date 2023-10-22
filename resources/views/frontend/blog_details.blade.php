@extends('frontend.layouts.master')

@section('content')
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">Blog Details</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('home.page')}}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="blog-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{$showBlog->title}}</h2>
                <div class="blog-meta">
                    <div class="single-meta">
                        <div class="meta-title">Published</div>
                        <h4 class="meta-value"><a href="javascript:void(0)">{{date('d M ,Y' , strtotime($showBlog->created_at))}}</a></h4>
                    </div>
                    <div class="single-meta">
                        <div class="meta-title">Tag</div>
                        <h4 class="meta-value"><a href="#">{{$showBlog->getCategory->slug}}</a></h4>
                    </div>
                </div>
                <figure class="image-block">
                    <img class="image-fix" src="{{asset(env('BLOG_IMAGE_UPLOAD_PATH').$showBlog->image)}}" alt="">
                </figure>
                <div class="description">
                    {!!$showBlog->description!!}
                </div>
                <div class="single-navigation">
                    @if ($previousBlog)

                    <a href="{{route('show.blog' , $previousBlog->id)}}" class="nav-link"><span class="icon"><i
                                class="fal fa-angle-left"></i></span><span class="text">{{Str::limit($previousBlog->title, 25)}}</span></a>
                    @else
                    <a href="#" class="nav-link"></span><span class="text"></span></a>
                    @endif
                    @if ($nextBlog)

                    <a href="{{route('show.blog' , $nextBlog->id)}}" class="nav-link"><span class="text">{{Str::limit($nextBlog->title, 25)}}</span><span
                            class="icon"><i class="fal fa-angle-right"></i></span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->

@endsection
