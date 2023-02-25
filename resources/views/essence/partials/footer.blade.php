<!-- footer start -->
    <footer class="footer_area clearfix">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="single_widget_area d-flex mb-30">
              <div class="footer-logo mr-50">
                <a href="#">
                  <img src="img/core-img/logo2.png" alt="">
                </a>
              </div>
              <div class="footer_menu">
                <ul>
                  <li>
                    <a href="shop.html">Shop</a>
                  </li>
                  <li>
                    <a href="blog.html">Blog</a>
                  </li>
                  <li>
                    <a href="contact.html">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="single_widget_area mb-30">
              <ul class="footer_widget_menu">
                <li>
                  <a href="#">Order Status</a>
                </li>
                <li>
                  <a href="#">Payment Options</a>
                </li>
                <li>
                  <a href="#">Shipping and Delivery</a>
                </li>
                <li>
                  <a href="#">Guides</a>
                </li>
                <li>
                  <a href="#">Privacy Policy</a>
                </li>
                <li>
                  <a href="#">Terms of Use</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row align-items-end">
          <div class="col-12 col-md-6">
            <div class="single_widget_area">
              <div class="footer_heading mb-30">
                <h6>Subscribe</h6>
              </div>
              <div class="subscribtion_form">
                <form action="#" method="post">
                  <input type="email" name="mail" class="mail" placeholder="Your email here">
                  <button type="submit" class="submit">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="single_widget_area">
              <div class="footer_social_area">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest">
                  <i class="fa fa-pinterest" aria-hidden="true"></i>
                </a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <p> Copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer end -->

    <script src="{{ asset('new/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('new/js/popper.min.js') }}"></script>
    <script src="{{ asset('new/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new/js/plugins.js') }}"></script>
    <script src="{{ asset('new/js/classy-nav.min.js') }}"></script>
    <script src="{{ asset('new/js/active.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script>
      @if(Session::has('success'))
          toastr.success("{{ Session::get('success') }}");
      @endif
      @if(Session::has('info'))
          toastr.info("{{ Session::get('info') }}");
      @endif
      @if(Session::has('warning'))
          toastr.warning("{{ Session::get('warning') }}");
      @endif
      @if(Session::has('error'))
          toastr.error("{{ Session::get('error') }}");
      @endif
    </script>
  <script type="text/javascript">
      var ENDPOINT = "{{url('/')}}";
    $("#sortByselect").change(function()
    {
      var id=$(this).val();
      var dataString = '{id:'+ id+'}';
      $.ajax({
        type: "GET",
        url: ENDPOINT+"/filter?search="+id,
        data: dataString,
        success: function(data)
        {
          $('#shopProducts').html(data);
        } 
      });

    });

    $(".addToCart").click(function()
    {
      var id=$(this).val();
      var ENDPOINT = "{{url('/')}}";
      var dataString = id;
      var variant = $('#productVar').val();
      $.ajax({
        type: "GET",
        url: ENDPOINT+"/cart?action="+1+"&id="+id+"&variant="+variant,
        success: function(data)
        {
          $('.cart-list').append(data);
          toastr.success("Product added to cart");
        } 
      });

    });

    function updateItem(id,qty){
      var x = qty;
      document.getElementById('output-area').innerHTML = x;
      function button1() {
        document.getElementById('output-area').innerHTML = ++x;

      }
      function button2() {
        if(x < 1){
          alert('minimum quantity 1')
          return false ;
        }
        document.getElementById('output-area').innerHTML = --x;
      }
      
      $.ajax({
        type: "GET",
        url: ENDPOINT+"/cart?action="+2+"&id="+id,
        success: function(data)
        {
          $(".item_"+id).remove();
        } 
      });
    }

    function removeItem(id,name){
      if(confirm('Are you sure you want to remove '+name)){
        console.log('in');
        $.ajax({
          type: "GET",
          url: ENDPOINT+"/cart?action="+3+"&id="+id,
          success: function(data)
          {
            $(".item_"+id).remove();
            toastr.error("Product removed from cart");
          } 
        });
      }
    }

  </script>
  </body>
</html>