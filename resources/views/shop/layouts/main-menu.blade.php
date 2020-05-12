<style>
    h2.left-title {border: 0px}
    .single-product-item .product-image {
        margin-bottom: 15px;
    }
    .price-box span.price {
        display: inline-block !important;
        vertical-align: middle !important;
        overflow: hidden !important;
        font-size: 14px !important;
        color: #e10c00 !important;
        line-height: 15px !important;
    }
    .p-price {
        display: inline-block;
        vertical-align: middle;
        font-size: 12px;
        text-decoration: line-through;
        margin-left: 5px;
        color: #222;
    }
</style>
<!-- HEADER-BOTTOM-AREA START -->
<section class="header-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <!-- MAIN-SLIDER-AREA START -->
                <div class="main-slider-area">
                    <div class="slider-area">
                        <div id="wrapper">
                            <!-- Kiểm tra nếu có dữ liệu banners thì mới hiển thị -->
                            @if(!empty($banners))
                                <div class="slider-wrapper">
                                    <div id="mainSlider" class="nivoSlider">
                                        @foreach($banners as $banner)
                                            <a href="#"><img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}"/></a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- MAIN-SLIDER-AREA END -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- LEFT-CATEGORY-MENU START -->
                <div class="left-category-menu">
                    <div class="left-product-cat">
                        <div class="category-heading">
                            <h2>Tin Tức</h2>
                        </div>
                        <!-- CATEGORY-MENU-LIST START -->
                        <div class="single-product-right-sidebar">
                            <ul>
                                <li>
                                    <a href="#"><img src="img/product/sidebar_product/2.jpg" alt=""></a>
                                    <div class="r-sidebar-pro-content">
                                        <p>Faded short sleeves t-shirt with high...</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- CATEGORY-MENU-LIST END -->
                    </div>
                </div>
                <!-- LEFT-CATEGORY-MENU END -->
            </div>
            
        </div>
    </div>
</section>