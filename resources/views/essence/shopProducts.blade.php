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
                            <a href="#" class="btn essence-btn">Add to Cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach