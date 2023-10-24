@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcon = \App\Models\FooterSocialLink::all();
    $usefulLinks = \App\Models\FooterUsefulLink::all();
    $contactInfo = \App\Models\FooterContactInfo::first();
    $helpLink = \App\Models\FooterHelpLink::all();
@endphp

<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{asset(env('GENERAL_SETTING_IMAGE_UPLOAD_PATH').$generalSetting->footer_logo)}}" alt="">
                    </figure>
                    <p>{{$footerInfo->sub_title}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerIcon as $icon)

                        <li><a href="{{$icon->url}}"><i class="{{$icon->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach ($usefulLinks as $useful)

                    <li><a href="{{$useful->url}}">{{$useful->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{$contactInfo->address}}</li>
                    <li><a href="javascript:void(0)">{{$contactInfo->phone}}</a></li>
                    <li><a href="javascript:void(0)">{{$contactInfo->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($helpLink as $link)

                    <li><a href="{{$link->url}}">{{$link->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{$footerInfo->copy_right}}</p>
                        <p>{{$footerInfo->powered_by}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
