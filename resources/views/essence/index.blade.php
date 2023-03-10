@include('essence.partials.nav')


@include('essence.partials.cart')

    <!-- main slider start -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url({{ asset('new/img/bg-img/bg-1.jpg') }});">
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="hero-content">
              <h6>asoss</h6>
              <h2>New Collection</h2>
              <a href="#" class="btn essence-btn">view collection</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- main slider end -->

    <!-- category start -->
    <div class="top_catagory_area section-padding-80 clearfix">
      <div class="container">
        <div class="row justify-content-center">
          @foreach(App\Models\Category::where('deleted_at',NULL)->where('id','>',15)->limit(9)->get() as $data)
            <div class="col-12 col-sm-6 col-md-4 mt-5">
              <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('new/img/bg-img/bg-2.jpg') }});">
                <div class="catagory-content">
                  <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($data->name)) }}">{{ substr($data->name, 0, 10) }}</a>
                </div>
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
    </div>
    <!-- category end -->

    <!-- sale banner 2 start -->
    <div class="cta-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cta-content bg-img background-overlay" style="background-image: url({{ asset('new/img/bg-img/bg-5.jpg') }});">
              <div class="h-100 d-flex align-items-center justify-content-end">
                <div class="cta--text">
                  <h6>-60%</h6>
                  <h2>Global Sale</h2>
                  <a href="{{ url('/category/western-wear') }}" class="btn essence-btn">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sale banner 2 end -->

    <!-- category start -->
    <div class="top_catagory_area section-padding-80 clearfix">
      <div class="container">
        <div class="row justify-content-center">
          @foreach(App\Models\Category::where('deleted_at',NULL)->limit(9)->get() as $data)
          <div class="col-12 col-sm-6 col-md-4 mt-5">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('new/img/bg-img/bg-2.jpg') }});">
              <div class="catagory-content">
                <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($data->name)) }}">{{ substr($data->name, 0, 10) }}</a>
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
      </div>
    </div>
    <!-- category end -->

    <!-- sale banner 1 start -->
    <div class="cta-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cta-content bg-img background-overlay" style="background-image: url({{ asset('new/img/bg-img/bg-5.jpg') }});">
              <div class="h-100 d-flex align-items-center justify-content-end">
                <div class="cta--text">
                  <h6>-60%</h6>
                  <h2>Global Sale</h2>
                  <a href="{{ url('/category/choker') }}" class="btn essence-btn">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sale banner 1 end -->

    <!-- product section 1 start -->
    <section class="new_arrivals_area section-padding-80 clearfix">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading text-center">
              <h2>Popular Products</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="popular-products-slides owl-carousel">
              @foreach($featured1 as $featured)
                <div class="single-product-wrapper">
                  <div class="product-img">
                    @php
                      $arr = explode(',', $featured->image);
                    @endphp
                    <img src="http://poszevar.zevar.org/images/products/{{ $arr[0] }}" alt="">
                    <!-- <img class="hover-img" src="img/product-img/product-2.jpg" alt=""> -->
                    <div class="product-favourite">
                      <a href="#" class="favme fa fa-heart"></a>
                    </div>
                  </div>
                  <div class="product-description">
                    <span>topshop</span>
                    <a href="single-product-details.html">
                      <h6>{{ $featured->name }}</h6>
                    </a>
                    <p class="product-price">???{{ $featured->currentPrice }}</p>
                    <div class="hover-content">
                      <div class="add-to-cart-btn">
                        <a href="#" class="btn essence-btn">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <button class="btn essence-btn">View All</button>
      </div>
    </section>
    <!-- product section 1 end -->

    <!-- sale banner 2 start -->
    <div class="cta-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="cta-content bg-img background-overlay" style="background-image: url({{ asset('new/img/bg-img/bg-5.jpg') }});">
              <div class="h-100 d-flex align-items-center justify-content-end">
                <div class="cta--text">
                  <h6>-60%</h6>
                  <h2>Global Sale</h2>
                  <a href="{{ url('/category/ad-nacklace') }}" class="btn essence-btn">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- sale banner 2 end -->

    <!-- product section 2 start -->
    <section class="new_arrivals_area section-padding-80 clearfix">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading text-center">
              <h2>Popular Products</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="popular-products-slides owl-carousel">
              @foreach($featured2 as $featured)
                <div class="single-product-wrapper">
                  <div class="product-img">
                    @php
                      $arr = explode(',', $featured->image);
                    @endphp
                    <img src="http://poszevar.zevar.org/images/products/{{ $arr[0] }}" alt="">
                    <!-- <img class="hover-img" src="img/product-img/product-2.jpg" alt=""> -->
                    <div class="product-favourite">
                      <a href="#" class="favme fa fa-heart"></a>
                    </div>
                  </div>
                  <div class="product-description">
                    <span>topshop</span>
                    <a href="single-product-details.html">
                      <h6>{{ $featured->name }}</h6>
                    </a>
                    <p class="product-price">???{{ $featured->currentPrice }}</p>
                    <div class="hover-content">
                      <div class="add-to-cart-btn">
                        <a href="#" class="btn essence-btn">Add to Cart</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <button class="btn essence-btn">View All</button>
      </div>
    </section>
    <!-- product section 2 end -->

    <!-- brand slider  start-->
    <div class="brands-area d-flex align-items-center justify-content-between">
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand1.png') }}" alt="">
      </div>
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand2.png') }}" alt="">
      </div>
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand3.png') }}" alt="">
      </div>
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand4.png') }}" alt="">
      </div>
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand5.png') }}" alt="">
      </div>
      <div class="single-brands-logo">
        <img src="{{ asset('new/img/core-img/brand6.png') }}" alt="">
      </div>
    </div>
    <!-- brand slider end -->

@include('essence.partials.footer')