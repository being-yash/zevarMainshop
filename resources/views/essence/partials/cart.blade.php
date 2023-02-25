<?php
$cart = session()->get('cart');
$count = 0;
if (is_array($cart)) {
  $count = count($cart);
}
?>    
    <!-- cart start -->
    <div class="cart-bg-overlay"></div>
    <div class="right-side-cart-area">
      <div class="cart-button">
        <a href="#" id="rightSideCart">
          <img src="img/core-img/bag.svg" alt="">
          <span>{{ $count }}</span>
        </a>
      </div>
      <div class="cart-content d-flex">
        <div class="cart-list">
          @if(is_array($cart))
            @foreach($cart as $id => $item)
              @php
                $iid = $item['sku_code'];
                $iname = $item['name'];
              @endphp
              <div class="item_{{$id}} single-cart-item">
                <a href="#" class="product-image">
                  <img src="http://poszevar.zevar.org/images/products/{{ $item['image'] }}" class="cart-thumb" alt="">
                  <div class="cart-item-desc">
                    <span class="product-remove" onclick="removeItem('<?php echo $id; ?>','<?php echo $iname; ?>')">
                      <i class="fa fa-close" aria-hidden="true"></i>
                    </span>
                    <!-- <span class="badge">Mango</span> -->
                    <h6>{{ $item['name'] }}</h6>
                    <?php /*<p class="badge">Qty: <input type="number" id="qty" value="{{ $item['quantity'] }}"></p> */?>
                    <button type='button' class='btn btn-danger btn-sm ' id='AddQty' style="padding: 0px 4px 0px 4px;height: 22px;"><strong>-</strong></button>
                    <input type='number' id='A'  onchange='imposeMinMax(this)' value='{{ $item['quantity'] }}' max='10' step='1' style='width: 35px;background: tranparent;'>                 
                    <button type='button' class='btn btn-danger btn-sm' id='RemoveQty' style="padding: 0px 4px 0px 4px;height: 22px;"><strong>+</strong></button>
                    <!-- <p class="color">Color: Red</p> -->
                    <p class="color" style="font-size: 15px;margin-top: 5px;">₹{{ $item['price'] }}</p>
                    <p class="colorx">{{ $item['variant'] }}</p>
                  </div>
                </a>
              </div>
            @endforeach
          @endif
        </div>
        <div class="cart-amount-summary">
          <h2>Summary</h2>
          <ul class="summary-table">
            <li>
              <span>subtotal:</span>
              <span>$274.00</span>
            </li>
            <li>
              <span>delivery:</span>
              <span>Free</span>
            </li>
            <li>
              <span>discount:</span>
              <span>-15%</span>
            </li>
            <li>
              <span>total:</span>
              <span>$232.00</span>
            </li>
          </ul>
          <div class="checkout-btn mt-100">
            <a href="{{ url('/checkout') }}" class="btn essence-btn">check out</a>
          </div>
        </div>
      </div>
    </div>
    <!-- cart end -->