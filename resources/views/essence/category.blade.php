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
                <h6 class="widget-title mb-30">Categories</h6>
                <div class="catagories-menu">
                  <ul id="menu-content2" class="menu-content">
                    <li data-toggle="" data-target="">
                      <!-- <a href="#">clothing</a> -->
                      <ul class="sub-menu collapse show" id="clothing">
                        @foreach(App\Models\Category::where('deleted_at', '=', null)->limit(10)->get() as $data)
                        <li>
                          <?php 
                            $catname = str_replace(' ','-',strtolower($data->name));
                            $url = substr(url()->current(), 43);
                          ?>
                          <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($data->name)) }}" @if($url == $catname)style="color:#007bff;"@endif>{{ $data->name }}</a>
                        </li>
                        @endforeach
                      </ul>
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