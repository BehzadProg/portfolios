@extends('frontend.layouts.master')

@section('content')


<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-8">
                <h2 class="title">Portfolio Details</h2>
            </div>
            <div class="col-sm-4">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('home.page')}}">Home</a></li>
                        <li>Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Portfolio-Area-Start -->
<section class="portfolio-details section-padding" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{$showPortfolio->title}}</h2>
                <figure class="image-block">
                    <img class="image-fix" src="{{asset(env('PORTFOLIO_ITEM_IMAGE_UPLOAD_PATH').$showPortfolio->image)}}" alt="">
                </figure>
                <div class="portflio-info">
                   @if ($showPortfolio->client)
                   <div class="single-info">
                    <h4 class="title">Client</h4>
                    <p>{{$showPortfolio->client}}</p>
                </div>
                   @endif
                    <div class="single-info">
                        <h4 class="title">Date</h4>
                        <p>{{date('d M, Y' , strtotime($showPortfolio->created_at))}}</p>
                    </div>
                    @if ($showPortfolio->website)

                    <div class="single-info">
                        <h4 class="title">Website</h4>
                        <p><a href="{{$showPortfolio->website}}">{{$showPortfolio->website}}</a></p>
                    </div>
                    @endif
                    <div class="single-info">
                        <h4 class="title">Role</h4>
                        <p>{{$showPortfolio->category->name}}</p>
                    </div>
                </div>
                <div class="description">
                  {!!$showPortfolio->description!!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio-Area-End -->
@endsection
