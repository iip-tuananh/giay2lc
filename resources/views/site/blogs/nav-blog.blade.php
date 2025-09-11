@php
    $locale = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
@endphp
<div class="sticky">
    <div class="aside-content aside-content-blog">
        <div class="title-head">
           {{ $locale == 'vi' ? 'Danh mục tin tức' : 'Categories' }}
        </div>
        <nav class="nav-category">
            <ul class="nav navbar-pills">
                <li class="nav-item  relative">
                    <a title=" {{ __('menu.home') }}" class="nav-link" href="{{ route('front.home-page') }}"> {{ __('menu.home') }}</a>
                </li>
                <li class="nav-item  relative">
                    <a title="{{ __('menu.about') }}" class="nav-link" href="{{ route('front.about-us') }}">{{ __('menu.about') }}</a>
                </li>
                <li class="nav-item  relative">
                    <a title="{{ __('menu.product') }}" href="javascript:void(0)" class="nav-link pr-5">
                        {{ __('menu.product') }}
                    </a>
                    <i class="open_mnu down_icon"></i>
                    <ul class="menu_down" style="display:none;">
                        @foreach ($productCategories as $productCategory)
                            <li class="dropdown-submenu nav-item  relative">
                                <a title="{{ $locale == 'vi' ? $productCategory->name : $productCategory->name_en }}" class="nav-link pr-5"
                                    href="{{ route('front.show-product-category', $productCategory->slug) }}">{{ $locale == 'vi' ? $productCategory->name : $productCategory->name_en }}</a>
                                @if ($productCategory->childs->count() > 0)
                                    <i class="open_mnu down_icon"></i>
                                    <ul class="menu_down" style="display:none;">
                                        @foreach ($productCategory->childs as $child)
                                        <li class="nav-item">
                                            <a title="{{ $locale == 'vi' ? $child->name : $child->name_en }}" class="nav-link pl-4" href="{{ route('front.show-product-category', $child->slug) }}">{{ $locale == 'vi' ? $child->name : $child->name_en }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                @foreach ($categories as $cate)
                <li class="nav-item active relative">
                    <a title=" {{ $locale == 'vi' ? $cate->name : $cate->name_en }}" class="nav-link" href="{{ route('front.list-blog', $cate->slug) }}">
                        {{ $locale == 'vi' ? $cate->name : $cate->name_en }}
                    </a>
                </li>
                @endforeach
                <li class="nav-item  relative">
                    <a title="{{ __('menu.contact') }}" class="nav-link" href="{{ route('front.contact-us') }}">{{ __('menu.contact') }}</a>
                </li>
            </ul>
        </nav>
    </div>
    <script>
        $(".open_mnu").click(function() {
            $(this).toggleClass('active').next().slideToggle();
        });
    </script>
    <div class="blog_noibat">
        <h2 class="h2_sidebar_blog">
            <a href="javascript:void(0)" title="Tin tức nổi bật">
                {{ $locale == 'vi' ? 'Tin tức nổi bật' : 'Hot News' }}
            </a>
        </h2>
        <div class="blog_content">
            @foreach ($newBlogs as $blog)
            <div class="item clearfix">
                <div class="post-thumb">
                    <a class="image-blog scale_hover" href="{{ route('front.detail-blog', $blog->slug) }}"
                        title="New collection – dreamy art">
                        <img class="img_blog lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                            alt="{{ $locale == 'vi' ? $blog->name : $blog->name_en }}">
                    </a>
                </div>
                <div class="contentright">
                    <h3><a title="{{ $locale == 'vi' ? $blog->name : $blog->name_en }}" href="{{ route('front.detail-blog', $blog->slug) }}">{{ $locale == 'vi' ? $blog->name : $blog->name_en }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
