<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="logo">
                      <a title="ecommerce Template" href="{{ route('trangchu') }}"><img alt="ecommerce Template" src="images/logo.png"></a>
                    </div>
                    <div class="nav-icon">
                        <div class="mega-container visible-lg visible-md visible-sm">
                            <div class="navleft-container">
                                <div class="mega-menu-title">
                                    <h3><i class="fa fa-navicon"></i>{{ __('cate') }}</h3>
                                </div>
                                <div class="mega-menu-category">
                                    <ul class="nav">
                                        @foreach($listCategories as $category)
                                          <li>
                                            @if($category->parent_id === 0)
                                            <a href="#">{{ $category -> name }}</a>
                                            @endif
                                            @foreach($listCategories as $subItem)
                                                @if($subItem->parent_id === $category->id)
                                                    <div class="wrap-popup column1">
                                                      <div class="popup">
                                                        <ul class="nav">
                                                            <li>
                                                                <a href="{{ route('showcate',$subItem->id) }}">{{ $subItem->name }}</a>
                                                            </li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                          </li>
                                        @endforeach
                                    </ul>
                                    <div class="side-banner">
                                        <img src="images/top-banner.jpg" alt="Flash Sale" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header" style="padding-bottom: 30px;">
                    <div class="jtv-mob-toggle-wrap">
                        <div class="mm-toggle">
                            <i class="fa fa-reorder"></i>
                            <span class="mm-label">{{ __('Menu') }}</span>
                        </div>
                    </div>
                    <div class="jtv-header-box">
                        <div class="search_cart_block">
                            <div class="search-box hidden-xs">
                                {!! Form::open(['method' => 'GET', 'id' => 'search_mini_form',  'route' =>'search']) !!}
                                    {!! Form::text('q', '' , ['class' => 'searchbox', 'id' => 'search', 'name' => 'search', 'placeholder' => 'Search entire store here...', 'maxlength' => '128']) !!}
                                        <span class="hidden-sm">{{ __('Search') }}</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i>
                                {!! Form::close() !!}
                            </div>
                            <div class="right_menu">
                                <div class="menu_top">
                                    <div class="top-cart-contain pull-right">
                                        <div class="mini-cart">
                                            <div class="basket"><a class="basket-icon" href="#"><i class="fa fa-shopping-basket"></i> {{ __('ShoppingCart') }} <span>3</span></a>
                                                <div class="top-cart-content">
                                                    <div class="block-subtitle">
                                                        <div class="top-subtotal">3 items
                                                        </div>
                                                    </div>
                                                    <ul class="mini-products-list" id="cart-sidebar">
                                                        @foreach($productsInCart as $item)
                                                        <li class="item">
                                                            <div class="item-inner">
                                                                <a class="product-image" title="product tilte is here" href="product-detail.html">
                                                                    @php
                                                                    $images = $item->product->images->take(1);
                                                                    @endphp
                                                                   @foreach($images as $img)
                                                                        @if($img->link != null)
                                                                            <img alt="product tilte is here" src="{{ asset('front/images/products/') }}/{{ $img->link}}">
                                                                        @else
                                                                            <img alt="Product tilte is here" src="images/products/default.png">
                                                                        @endif
                                                                    @endforeach
                                                                </a>
                                                                <div class="product-details">
                                                                    <div class="access">
                                                                        <a class="btn-remove1" name ="removeinterm" title="Remove This Item" href=" {{ route('deletecart', ['id' =>  $item->product->id]) }}">{{ __('Remove') }}</a>
                                                                        <a class="btn-edit" title="Edit item" href="#">
                                                                            <i class="fa fa-pencil"></i>
                                                                            <span class="hidden">{{ __('Edititem') }}</span>
                                                                        </a>
                                                                    </div>
                                                                    <p class="product-name">
                                                                        <a href="product-detail.html">{{ $item->product->name }}</a>
                                                                    </p>
                                                                    <strong>{{ $item->soluong }}</strong> x
                                                                    <span class="price">{{ $item->product->price }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="actions"> <a href="{{route('muahang')}}" class="view-cart"><span>{{ __('ViewCart') }}</span></a>
                                                        <button onclick="window.location.href='checkout.html'" class="btn-checkout" title="Checkout" type="button"><span>{{ __('checkout') }}</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="language-box hidden-xs">
                                    <select class="selectpicker" data-width="fit">
                                        <option>{{ __('English') }}</option>
                                        <option>{{ __('Vietnamese') }}</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="top_section hidden-xs">
                            <div class="toplinks">
                                <div class="site-dir hidden-xs">
                                    <a class="hidden-sm" href="#"><i class="fa fa-phone"></i> <strong>{{ __('Hotline') }}</strong> +1 123 456 7890</a> <a href="mailto:support@example.com"><i class="fa fa-envelope"></i> support@example.com</a>
                                </div>
                                <ul class="links">
                                    <li><a title="My Wishlist" href="wishlist.html">{{ __('wishlist') }}</a></li>
                                    <li><a title="Checkout" href="checkout.html">{{ __('checkout') }}</a></li>
                                    <li><a title="Track Order" href="{{ route('register')}}">{{ __('register') }}</a></li>
                                    <li>
                                        @if(Auth::check()) {
                                            <a title="Log In" href="{{ route('login')  }}">{{ Auth::user()->name }}</a>
                                        }
                                        @else {
                                            <a title="Log In" href="{{ route('login') }}">{{ __('LogIn') }}</a>
                                        }
                                        @endif
                                    </li>
                                    {{--<li>--}}
                                         {{--@if(Auth::check()) {--}}
                                            {{--<a title="Log Out" href="{{ route('test') }}">{{ __('LogOut') }}</a>--}}
                                        {{--}--}}
                                        {{--@endif--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
     </div>
</header>

