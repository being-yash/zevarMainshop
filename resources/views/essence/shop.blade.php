@include('essence.partials.nav')


@include('essence.partials.cart')
    <div class="breadcumb_area bg-img" style="background-image: url({{ asset('new/img/bg-img/breadcumb.jpg') }});">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="page-title text-center">
              <h2>SHOP</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="shop_grid_area section-padding-80">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4 col-lg-3">
            <div class="shop_sidebar_area">
              <div class="widget catagory mb-50">
                <h6 class="widget-title mb-30">Catagories</h6>
                <div class="catagories-menu">
                  <ul id="menu-content2" class="menu-content collapse show">
                    <li data-toggle="collapse" data-target="#clothing">
                      <!-- <a href="#">clothing</a> -->
                      <ul class="sub-menu collapse show" id="clothing">
                        @foreach($cats as $data)
                        <li>
                          <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($data->name)) }}">{{ $data->name }}</a>
                        </li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget price mb-50">
                <h6 class="widget-title mb-30">Filter by</h6>
                <p class="widget-title2 mb-30">Price</p>
                <div class="widget-desc">
                  <div class="slider-range">
                    <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                      <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                      <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                      <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">Range: $49.00 - $360.00</div>
                  </div>
                </div>
              </div>
              <div class="widget color mb-50">
                <p class="widget-title2 mb-30">Color</p>
                <div class="widget-desc">
                  <ul class="d-flex">
                    <li>
                      <a href="#" class="color1"></a>
                    </li>
                    <li>
                      <a href="#" class="color2"></a>
                    </li>
                    <li>
                      <a href="#" class="color3"></a>
                    </li>
                    <li>
                      <a href="#" class="color4"></a>
                    </li>
                    <li>
                      <a href="#" class="color5"></a>
                    </li>
                    <li>
                      <a href="#" class="color6"></a>
                    </li>
                    <li>
                      <a href="#" class="color7"></a>
                    </li>
                    <li>
                      <a href="#" class="color8"></a>
                    </li>
                    <li>
                      <a href="#" class="color9"></a>
                    </li>
                    <li>
                      <a href="#" class="color10"></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget brands mb-50">
                <p class="widget-title2 mb-30">Brands</p>
                <div class="widget-desc">
                  <ul>
                    <li>
                      <a href="#">Asos</a>
                    </li>
                    <li>
                      <a href="#">Mango</a>
                    </li>
                    <li>
                      <a href="#">River Island</a>
                    </li>
                    <li>
                      <a href="#">Topshop</a>
                    </li>
                    <li>
                      <a href="#">Zara</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8 col-lg-9">
            <div class="shop_grid_product_area">
              <div class="row">
                <div class="col-12">
                  <div class="product-topbar d-flex align-items-center justify-content-between">
                    <div class="total-products">
                      <p>
                        <span>186</span> products found
                      </p>
                    </div>
                    <div class="product-sorting d-flex">
                      <p>Sort by:</p>
                      <form action="#" method="get">
                        <select name="select" id="sortByselect">
                          <option value="0">Highest Rated</option>
                          <option value="1">Newest</option>
                          <option value="2">Price Low to High</option>
                          <option value="3">Price High to Low</option>
                        </select>
                        <input type="submit" class="d-none" value="">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" id="shopProducts">
                @foreach($datas as $data)
                  <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                      <a href="{{ url('/') }}/detail/{{ str_replace(' ','-',strtolower($data->name)) }}/{{$data->code}}">
                        <div class="product-img">
                          @php
                            $arr = explode(',', $data->image);
                          @endphp
                          <img src="http://poszevar.zevar.org/images/products/{{ $arr[0] }}" alt="">
                          @if(count($arr) > 1)
                          <img class="hover-img" src="http://poszevar.zevar.org/images/products/{{ $arr[1] }}" alt="">
                          @endif
                          <div class="product-badge offer-badge">
                            <span>-30%</span>
                          </div>
                          <div class="product-favourite">
                            <a href="#" class="favme fa fa-heart"></a>
                          </div>
                        </div>
                      </a>
                      <div class="product-description">
                        <span>topshop</span>
                        <a href="{{ url('/') }}/detail/{{ str_replace(' ','-',strtolower($data->name)) }}/{{$data->code}}">
                          <h6>{{ $data->name }} </h6>
                        </a>
                        <p class="product-price">
                          <span class="old-price">₹{{ $data->currentPrice*2 }}</span> ₹{{ $data->currentPrice }}
                        </p>
                        <div class="hover-content">
                          <div class="add-to-cart-btn">
                            <button value="{{ $data->id }}" class="addToCart btn essence-btn">Add to Cart</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="d-flex justify-content-center">
              {!! $datas->links() !!}
            </div>
          </div>
        </div>
      </div>
    </section>
@include('essence.partials.footer')