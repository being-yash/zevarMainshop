<div class="single-cart-item">
  <a href="#" class="product-image">
    <img src="http://poszevar.zevar.org/images/products/{{ $item['image'] }}" class="cart-thumb" alt="">
    <div class="cart-item-desc">
      <span class="product-remove">
        <i class="fa fa-close" aria-hidden="true"></i>
      </span>
      <!-- <span class="badge">Mango</span> -->
      <h6>{{ $item['name'] }}</h6>
      <!-- <p class="color">Color: Red</p> -->
      <button type='button' class='btn btn-danger btn-sm ' id='AddQty' style="padding: 0px 4px 0px 4px;height: 22px;"><strong>-</strong></button>
      <input type='number' id='A'  onchange='imposeMinMax(this)' value='{{ $item['quantity'] }}' max='10' step='1' style='width: 35px;background: tranparent;'>                 
      <button type='button' class='btn btn-danger btn-sm' id='RemoveQty' style="padding: 0px 4px 0px 4px;height: 22px;"><strong>+</strong></button>
      <p class="color" style="font-size: 15px;margin-top: 5px;">₹{{ $item['price'] }}</p>
      <p class="colorx">{{ $item['variant'] }}</p>
    </div>
  </a>
</div>