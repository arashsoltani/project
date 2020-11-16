<!DOCTYPE html>
<html direction="rtl" dir="rtl" lang="fa" style="direction: rtl  lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{--    <link href="{{asset('css/mine.rtl.css')}}" rel="stylesheet">--}}

    {{-- Includable CSS --}}
    @yield('styles')
</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

@if (config('layout.page-loader.type') != '')
    @include('layout.partials._page-loader')
@endif

<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
            <!--begin: Aside Container-->
            <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                <!--begin::Logo-->
                <a href="#" class="text-center pt-2">
                    <img src="assets/media/logos/logo.png" class="max-h-75px" alt=""/>
                </a>

                <div class="d-flex flex-column-fluid flex-column flex-center">

                    <div class="login-form login-signin py-11">

                        <div class="login-form login-signup pt-11">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                        @endif

                        <!--begin::Form-->
                            <form class="form" method="POST" action="{{ route('register') }}" novalidate="novalidate" id="kt_login_signup_form">
                                <!--begin::Title-->
                                @csrf
                                @method('POST')
                                <div class="text-center pb-8">
                                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">ثبت نام</h2>
                                    <p class="text-muted font-weight-bold font-size-h4">برای ایجاد حساب کاربری ، جزئیات خود را وارد کنید</p>
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="نام" name="name" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="ناو خانوادگی" name="family" autocomplete="off"/>
                                </div>


                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="نام پدر" name="f_name" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <label for="gender">جنسیت</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="0" selected disabled>انتخاب جنسیت</option>
                                        <option value="مرد">مرد</option>
                                        <option value="زن">زن</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="number" placeholder="کدملی" name="national_code" autocomplete="off"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="همراه" name="phone" autocomplete="off"/>
                                </div>


                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="پست الکترونیک" name="email" id="email" autocomplete="off"/>
                                </div>

                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="کلمه عبور" name="password" id="password" autocomplete="off"/>
                                </div>


                                <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                                    <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">ارسال</button>
                                    <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">لغو</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>




            </div>

        </div>

        <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #f9d465;">
            <!--begin::Title-->
            <div class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">

                <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">
                    ثبت نام کاربران<br/>
                    باشگاه اماوند
                </p>
                {{--                <img alt="{{ config('app.name') }}" src="{{ asset('media/pics/pic-1.jpg') }}"/>--}}

            </div>
            <!--end::Title-->

            <!--begin::Image-->
        {{--            <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" >--}}
        {{--                <img class="imagess" src="{{asset('media/pics/pic3.png')}}">--}}
        {{--            </div>--}}
        <!--end::Image-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>
