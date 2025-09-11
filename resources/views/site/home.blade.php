@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
    <link href="/site/css/index.scss.css?1743048451127" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .section_product .block-category .list-category-child {
            list-style: none;
            padding: 0;
            margin-bottom: 10px;
        }

        .section_product .block-category .list-category-child li {
            padding-top: 8px;
            padding-bottom: 8px;
            transition: all 0.3s ease;
        }

        .section_product .block-category .list-category-child li:hover {
            background-color: #f0f0f0;
            padding-left: 10px;
        }

        .section_product .block-category .list-category-child li a {
            font-size: 14px;
            text-decoration: none;
        }

        .home-slider {
            border-radius: 5px;
        }

        @media (max-width: 991px) {
            .section_product .block-category .category-image {
                display: none;
            }

            .section_product .block-category .scroll-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .section_product .block-category .scroll-wrapper::-webkit-scrollbar {
                height: 4px;
                display: none;
            }

            .section_product .block-category .scroll-wrapper::-webkit-scrollbar-thumb {
                background-color: #ccc;
                border-radius: 2px;
            }

            .section_product .block-category .scroll-wrapper::-webkit-scrollbar-track {
                background-color: transparent;
            }

            .section_product .block-category .list-category-child {
                display: flex;
                flex-wrap: nowrap;
                gap: 10px;
            }

            .section_product .block-category .list-category-child li {
                border: 1px solid #c1c1c1c1;
                border-radius: 5px;
                text-align: center;
                padding: 8px 10px;
                flex: 0 0 auto;
                min-width: 120px;
            }

            .section_product .block-category .list-category-child li:hover {
                background-color: #f0f0f0;
            }
        }
    </style>
@endsection
@section('content')
    @php
        $locale = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
    @endphp
    <section class="section_slider">
        <div class="container">
            <div class="home-slider swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <a href="{{ $banner->link }}" class="clearfix" title="{{ $banner->name }}">
                                <picture>
                                    <source media="(min-width: 1200px)"
                                        srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/1903x694' }}">
                                    <source media="(min-width: 992px)"
                                        srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/1903x694' }}">
                                    <source media="(min-width: 569px)"
                                        srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/1903x694' }}">
                                    <source media="(max-width: 567px)"
                                        srcset="{{ $banner->image ? $banner->image->path : 'https://placehold.co/1903x694' }}">
                                    <img width="1903" height="694"
                                        src="{{ $banner->image ? $banner->image->path : 'https://placehold.co/1903x694' }}"
                                        alt="{{ $banner->name }}" class="img-responsive lazyload" />
                                </picture>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            var swiper = new Swiper('.home-slider', {
                autoplay: true,
                delay: 4000,
                effect: "fade",
                pagination: {
                    el: '.home-slider .swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.home-slider .swiper-button-next',
                    prevEl: '.home-slider .swiper-button-prev',
                },
            });
        });
    </script>
    <section class="section_service">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <div class="service-sec">
                        @foreach ($smallBanners as $banner)
                            <div class="item">
                                <div class="icon">
                                    <a href="{{ $banner->link }}" title="{{ $banner->name }}">
                                        <img width="100%" class="lazyload" src="/site/images/lazy.png"
                                            data-src="{{ $banner->image ? $banner->image->path : 'https://placehold.co/600x300' }}"
                                            alt="{{ $banner->name }}" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <style>
            .section_service .service-sec {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: space-between;
            }

            .section_service .service-sec .item .info h3 {
                font-size: 16px;
                font-weight: 600;
                color: var(--textColor);
            }
        </style>
    </section>
    <section class="section_about_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-us-image">
                        <img src="{{ $about_us->home_image ? $about_us->home_image->path : 'https://placehold.co/600x600' }}"
                            alt="{{ translate($about_us->home_title, $about_us->home_title_en) }}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="block-title">
                        <h2>
                            {{ translate($about_us->home_title, $about_us->home_title_en) }}
                        </h2>
                    </div>
                    <div class="about-us-content">
                        @if($locale == 'vi')
                            {!! $about_us->home_description !!}
                        @else
                            {!! $about_us->home_description_en !!}
                        @endif
                    </div>
                    <div class="about-us-button">
                        <a href="{{ route('front.about-us') }}" title=" {{ $locale == 'vi' ? 'Xem chi tiết' : 'Detail' }} ">
                          {{ $locale == 'vi' ? 'Xem chi tiết' : 'Detail' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .section_about_us {
            padding: 30px 156px;
            background-size: cover;
            background-image: url("/site/images/partern-gioi-thieu.png");
        }

        .section_about_us .about-us-content {
            margin-bottom: 30px;
            text-align: justify;
        }

        .section_about_us .about-us-button {
            display: block;
        }

        .section_about_us .about-us-button a {
            color: #fff;
            border: 0;
            border-radius: 6px;
            letter-spacing: 0;
            padding: 10px 20px;
            background-color: var(--mainColor)
        }

        @media (max-width: 991px) {
            .section_about_us {
                padding: 30px 15px;
            }
        }
    </style>
    <link rel="preload" as="script" href="/site/js/count-down.js?1743048451127" />
    <script src="/site/js/count-down.js?1743048451127" type="text/javascript"></script>
    @if ($categorySpecialFlashsale)
        <div class="section_flash_sale">
            <div class="container">
                <div class="thumb-flasale">
                    <div class="block-title">
                        <h2>
                            <a href="{{ route('front.show-product-category', ['categorySlug' => $categorySpecialFlashsale->slug]) }}"
                                title=" {{ translate($categorySpecialFlashsale->name, $categorySpecialFlashsale->name_en) }}">
                                {{ translate($categorySpecialFlashsale->name, $categorySpecialFlashsale->name_en) }}
                            </a>
                        </h2>
                        {{-- <div class="timer">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 7V12H17" stroke="#14181F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                stroke="#14181F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6.06418 2.00024L3 4.57139" stroke="#14181F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M21.0041 4.57115L17.9399 2" stroke="#14181F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="text">Kết thúc sau:</span>
                        <div class="time" data-countdown="countdown"
                            data-date="{{ \Carbon\Carbon::parse($categorySpecialFlashsale->end_date)->format('m-d-Y-H-i-s') }}">
                        </div>
                    </div> --}}
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-12">
                                <div class="flash-sale-swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($categorySpecialFlashsale->products as $product)
                                            <div class="swiper-slide flashsale__item" data-pdid="{{ $product->id }}"
                                                data-management="true">
                                                @include('site.products.product_item', [
                                                    'product' => $product,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
        window.falshSale = {
            type: "hours",
            dateStart: "",
            dateFinish: "",
            hourStart: "00:00",
            hourFinish: "24",
            activeDay: "7",
            finishAction: "show",
            percentMin: "40",
            percentMax: "80",
            maxInStock: "300",
            useSoldQuantity: false,
            quantityType: "sold",
            timestamp: new Date().getTime(),
        }
    </script> --}}
    @endif
    <script src="/site/js/flashsale.js?1743048451127" defer></script>

    {{-- <section class="section_category_product">
        <div class="container">
            <div class="block-title">
                <h2>Danh mục sản phẩm</h2>
            </div>
            <div class="row">
                @foreach ($productCategories as $category)
                    <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                        <div class="category-item">
                            <div class="category-box-image">
                                <a href="{{ route('front.show-product-category', ['categorySlug' => $category->slug]) }}"
                                    title="{{ $category->name }}">
                                    <img src="{{ $category->image ? $category->image->path : 'https://placehold.co/450x450' }}"
                                        alt="{{ $category->name }}">
                                </a>
                            </div>
                            <div class="category-box-content">
                                <h4>
                                    <a href="{{ route('front.show-product-category', ['categorySlug' => $category->slug]) }}"
                                        title="{{ $category->name }}">{{ $category->name }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <style>
        .section_category_product {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .section_category_product .block-title {
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #ececec;
        }

        .section_category_product .block-title h2 {
            position: relative;
            z-index: 1;
            display: inline-block;
        }

        .section_category_product .block-title h2:after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #2559a5;
        }

        .section_category_product .category-item:hover {
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        }

        .section_category_product .category-item {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .section_category_product .category-item .category-box-image {
            margin-bottom: 30px;
            background-color: #f0f0f0;
            overflow: hidden;
            /* ngăn ảnh tràn ra ngoài */
        }

        .section_category_product .category-item .category-box-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1);
            transition: all 0.5s ease;
            display: block;
        }

        .section_category_product .category-item:hover .category-box-image img {
            transform: scale(1.1);
        }

        .section_category_product .category-item .category-box-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 20px;
            background-color: rgba(255, 255, 255, 0.5);
            color: #000;
            padding: 20px;
            text-align: center;
        }

        .section_category_product .category-item .category-box-content h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }
    </style> --}}
    {{-- @foreach ($productCategories as $category)
        @if ($category->products->count() > 0)
            <div class="section_product_new section_product">
                <div class="container">
                    <div class="block-title">
                        <h2><a href="{{ route('front.show-product-category', ['categorySlug' => $category->slug]) }}"
                                title="{{ $category->name }}">{{ $category->name }}</a></h2>
                        <div class="block-view">
                            <a href="{{ route('front.show-product-category', ['categorySlug' => $category->slug]) }}"
                                class="cta-view" title="Xem thêm">Xem thêm <i class="fa fa-angle-double-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-right col-lg-12 col-12">
                            <div class="block-product relative">
                                <div class="product-new-swiper swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($category->products as $item)
                                            <div class="swiper-slide">
                                                @include('site.products.product_item', [
                                                    'product' => $item,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach --}}

    <section class="section_testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-8 col-md-10 col-12">
                    <div class="testimonials">
                        <div class="title block-title">
                            <h2>
                                {{ $locale == 'vi' ? 'Chứng nhận và giải thưởng' : 'Certifications & Awards' }}
                            </h2>
                        </div>
                        <div
                            class="testimonial-swiper swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                            <div class="swiper-wrapper"
                                style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                                @foreach ($about_us->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <div class="testimonial">
                                            <div class="details">
                                                <div class="pic">
                                                    <img width="120" height="120" class="img-fluid"
                                                        src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/120x120' }}"
                                                        alt="{{ $gallery->name }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="swiper-slide">
                                        <div class="testimonial">
                                            <div class="content">{{ $review->message }}</div>
                                            <div class="details">
                                                <div class="pic">
                                                    <img width="120" height="120" class="img-fluid"
                                                        src="{{ $review->image ? $review->image->path : 'https://placehold.co/120x120' }}"
                                                        alt="{{ $review->name }}">
                                                </div>
                                                <div class="details-info">
                                                    <span class="name">{{ $review->name }}</span>
                                                    <span class="position">{{ $review->position }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                            </div>
                            <div class="swiper-button-prev swiper-button-disabled"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us">
        <div class="container position-relative">
            <img src="{{ $about_us->home_why_choose_image ? $about_us->home_why_choose_image->path : 'https://placehold.co/120x120' }}"
                alt="" class="h-100 position-absolute margin-auto">
            <div class="row py-6" style="position:relative; z-index: 1;">
                <div class="col-12 col-md-6">
                </div>
                <div class="col-12 col-md-6">
                    <div class="subtitle mt-5">
                        {{ $locale == 'vi' ? 'Vì sao chọn chúng tôi' : 'Why Choose Us' }}
                    </div>
                    <h1 class="title">{{ translate($about_us->home_why_choose_title, $about_us->home_why_choose_title_en) }}</h1>
                    <ul class="list-group-none">
                        @foreach ($about_us->why_choose_criterias as $why_choose_criteria)
                            <li>
                                <img src="{{ $why_choose_criteria->image ? $why_choose_criteria->image->path : 'https://placehold.co/120x120' }}"
                                    alt="Wcu1" loading="lazy">
                                @if($locale == 'vi')
                                    <div>
                                        <h3>{{ $why_choose_criteria->title }}</h3>
                                        <p>{!! $why_choose_criteria->content !!}</p>
                                    </div>
                                @else
                                    <div>
                                        <h3>{{ $why_choose_criteria->title_en }}</h3>
                                        <p>{!! $why_choose_criteria->content_en !!}</p>
                                    </div>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <style>
        .why-choose-us {
            background-size: cover;
            background-image: url("/site/images/partern-wcu.png");
            overflow: hidden;
            margin-bottom: 60px;
        }

        .why-choose-us ul {
            list-style-type: none;
            padding-left: 0;
        }

        .why-choose-us ul li {
            display: flex;
            column-gap: 2rem;
            margin-bottom: 3rem;
        }

        .why-choose-us ul li img {
            width: 4rem;
            height: 4rem;
            flex-grow: 0;
            flex-shrink: 0;
            flex-basis: 4rem;
        }

        .why-choose-us ul li h3 {
            font-weight: 700;
            font-size: 1.25rem;
        }

        .why-choose-us .position-relative {
            position: relative;
        }

        .why-choose-us .position-absolute {
            position: absolute;
        }

        .why-choose-us .margin-auto {
            margin: auto;
        }

        .why-choose-us .h-100 {
            height: 100%;
        }

        .why-choose-us .mt-5 {
            margin-top: 2rem;
        }

        .why-choose-us .subtitle {
            color: rgba(40, 40, 40, 1);
            font-size: 15px
        }

        .why-choose-us .title {
            font-size: 28px;
            text-transform: uppercase;
            background: linear-gradient(to right, #2559a5, #1f9649, #f6620c);
            display: inline-block;
            /* quan trọng để gradient phủ đúng */

            background-clip: text;
            -webkit-background-clip: text;
            /* bắt buộc cho Chrome, Safari */

            color: transparent;
            -webkit-text-fill-color: transparent;
            /* bắt buộc cho Chrome, Safari */
        }
    </style>

    @foreach ($categorySpecialPost as $postCategory)
        <section class="section_blog">
            <div class="container">
                <div class="block-title">
                    <h2>
                        <a href="javascript:void(0)" title="{{ translate($postCategory->name, $postCategory->name_en) }}">{{ translate($postCategory->name, $postCategory->name_en) }}</a>
                    </h2>
                </div>
                <div class="block-blog relative">
                    <div class="blog-swiper swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($postCategory->posts as $post)
                                <div class="swiper-slide">
                                    <div class="item-blog">
                                        <div class="block-thumb">
                                            <a class="thumb" href="{{ route('front.detail-blog', $post->slug) }}"
                                                title="{{ translate($post->name, $post->name_en) }}">
                                                <img class="lazyload d-block" src="/site/images/lazy.png"
                                                    data-src="{{ $post->image ? $post->image->path : 'https://placehold.co/350x350' }}"
                                                    alt="{{ translate($post->name, $post->name_en) }}">
                                            </a>
                                            {{-- <div class="time-post badge">
                                                {{ date('d/m/Y', strtotime($post->created_at)) }}
                                            </div> --}}
                                        </div>
                                        <div class="block-content">
                                            <h3><a href="{{ route('front.detail-blog', $post->slug) }}"
                                                    title="{{ translate($post->name, $post->name_en) }}">{{ translate($post->name, $post->name_en) }}</a>
                                            </h3>
                                            <div class="article-content">
                                                @if($locale == 'vi')
                                                    {!! $post->intro !!}
                                                @else
                                                    {!! $post->intro_en !!}
                                                @endif

                                            </div>
                                            <div class="article-meta">
                                                <div class="article-date">
                                                    <time>{{\Illuminate\Support\Carbon::parse($post->created_at)->format('d/m/Y')}}</time>
                                                </div>
                                                <a class="article-seemore"
                                                    href="{{ route('front.detail-blog', $post->slug) }}"
                                                    title="#">{{ $locale == 'vi' ? 'Xem thêm' : 'Detail' }} <i
                                                        class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <style>
                            .section_blog .article-meta {
                                display: flex;
                                display: -ms-flex;
                                justify-content: space-between;
                                -ms-justify-content: space-between;
                                align-items: center;
                                -ms-align-items: center;
                                font-size: 12px;
                                color: #a8aeba;
                                border-top: 1px solid #eee;
                                padding-top: 15px;
                                margin-top: auto;
                            }

                            .section_blog .article-meta .article-date:before {
                                display: inline-block;
                                font-family: FontAwesome;
                                font-weight: 400;
                                content: "\f073";
                                font-size: 12px;
                                margin-right: 3px;
                            }

                            .section_blog .article-meta .article-seemore {
                                color: #a8aeba;
                            }

                            .section_blog .article-meta .article-seemore i {
                                font-size: 10px;
                            }

                            .section_blog .article-meta .article-seemore:hover {
                                color: #1e4194;
                            }
                        </style>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <section class="section_mailchimp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-12">
                    <div class="block-title">
                        <h2>
                          {{ $locale == 'vi' ? 'Đối tác của chúng tôi' : 'Our Partners' }}
                        </h2>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-12">
                    <div
                        class="partner-swiper swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                        <div class="swiper-wrapper"
                            style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                            @foreach ($partners as $partner)
                                <div class="swiper-slide">
                                    <img width="120" height="120" class="img-fluid"
                                        src="{{ $partner->image ? $partner->image->path : 'https://placehold.co/120x120' }}"
                                        alt="{{ $partner->name }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
