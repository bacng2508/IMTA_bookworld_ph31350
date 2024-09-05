@extends('client.layouts.client_master')

@push('styles')
@endpush

@section('page-content')
    <section class="breadcrumb-section">
        <h2 class="sr-only">Site Breadcrumb</h2>
        <div class="container">
            <div class="breadcrumb-contents">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Cart Page Start -->
    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Giỏ hàng</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="#" class="">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <table class="table">
                                    <!-- Head Row -->
                                    <thead>
                                        <tr>
                                            <th class="pro-remove">#</th>
                                            <th class="pro-thumbnail">Hình ảnh</th>
                                            <th class="pro-title">Tên sách</th>
                                            <th class="pro-price">Giá</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class="pro-thumbnail"><a href="#"><img src="{{ Storage::url($item->book->cover_image) }}" alt="Product"></a></td>
                                                <td class="pro-title"><a href="#">{{ $item->book->name }}</a></td>
                                                <td class="pro-price">
                                                    @if ($item->book->price_sale != 0)
                                                        <span class="price">{{ number_format($item->book->price_sale) }} đ</span>
                                                        <del class="price-old">{{ number_format($item->book->price) }} đ</del>
                                                    @else
                                                        <span class="price">{{ number_format($item->book->price) }} đ</span>
                                                    @endif
                                                </td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty">
                                                        <div class="count-input-block">
                                                            <input type="number" class="form-control text-center"
                                                                value="{{ $item->quantity }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal">
                                                    @if ($item->book->price_sale != 0)
                                                        <span class="price">{{ number_format($item->book->price_sale*$item->quantity) }} đ</span>
                                                    @else
                                                        <span class="price">{{ number_format($item->book->price*$item->quantity) }} đ</span>
                                                    @endif
                                                </td>
                                                <td class="pro-remove">
                                                    <a href="#"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                        <!-- slide Block 5 / Normal Slider -->
                        <div class="cart-block-title">
                            <h2>YOU MAY BE INTERESTED IN…</h2>
                        </div>
                        <div class="product-slider sb-slick-slider"
                            data-slick-setting='{
                              "autoplay": true,
                              "autoplaySpeed": 8000,
                              "slidesToShow": 2
                              }'
                            data-slick-responsive='[
        {"breakpoint":992, "settings": {"slidesToShow": 2} },
        {"breakpoint":768, "settings": {"slidesToShow": 3} },
        {"breakpoint":575, "settings": {"slidesToShow": 2} },
        {"breakpoint":480, "settings": {"slidesToShow": 1} },
        {"breakpoint":320, "settings": {"slidesToShow": 1} }
    ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            Lpple
                                        </span>
                                        <h3><a href="product-details.html">Revolutionize Your BOOK With These
                                                Easy-peasy Tips</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('client/assets') }}/image/products/product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="{{ asset('client/assets') }}/image/products/product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            Jpple
                                        </span>
                                        <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('client/assets') }}/image/products/product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="{{ asset('client/assets') }}/image/products/product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            Wpple
                                        </span>
                                        <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('client/assets') }}/image/products/product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="{{ asset('client/assets') }}/image/products/product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            Epple
                                        </span>
                                        <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('client/assets') }}/image/products/product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="{{ asset('client/assets') }}/image/products/product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <span class="author">
                                            Hpple
                                        </span>
                                        <h3><a href="product-details.html">Simple Things You To Save BOOK</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="{{ asset('client/assets') }}/image/products/product-6.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="{{ asset('client/assets') }}/image/products/product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.html" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <p>Sub Total <span class="text-primary">{{ number_format($totalMoney) }} đ</span></p>
                                <p>Shipping Cost <span class="text-primary">$00.00</span></p>
                                <h2>Grand Total <span class="text-primary">$1250.00</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="checkout.html" class="checkout-btn c-btn btn--primary">Checkout</a>
                                <button class="update-btn c-btn btn-outlined">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Cart Page End -->
@endsection

@push('scripts')
@endpush
