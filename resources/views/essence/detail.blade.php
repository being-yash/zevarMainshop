@include('essence.partials.nav')
@include('essence.partials.cart')

<section class="single_product_details_area d-flex align-items-center">
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            @php
              $arr = explode(',', $data[0]->image);
            @endphp
            <img src="http://poszevar.zevar.org/images/products/{{ $arr[0] }}" alt="">
            <img src="http://poszevar.zevar.org/images/products/{{ $arr[0] }}" alt="">
            @if(count($arr) > 1)
            <img src="http://poszevar.zevar.org/images/products/{{ $arr[1] }}" alt="">
            @endif
            @if(count($arr) > 2)
            <img src="http://poszevar.zevar.org/images/products/{{ $arr[2] }}" alt="">
            @endif
        </div>
    </div>

    <div class="single_product_desc clearfix">
        <span>{{ $cat[0]->name }}</span>
        <a href="cart.html">
        <h2>{{ $data[0]->name }}</h2>
        </a>
        <p class="product-price"><span class="old-price">₹{{ $data[0]->currentPrice*2 }}</span> ₹{{ $data[0]->currentPrice }}</p>
        <p class="product-desc">{{ ucfirst($data[0]->name) }}</p>

        <div class="cart-form clearfix">
            <div class="select-box d-flex mt-50 mb-30">
                <select name="select" id="productVar" class="mr-5">
                    @foreach($variants as $var)
                        <option value="{{ $var->name }}">{{ $var->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="cart-fav-box d-flex align-items-center">
                <button value="{{ $data[0]->id }}" class="addToCart btn essence-btn">Add to Cart</button>
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('essence.partials.footer')