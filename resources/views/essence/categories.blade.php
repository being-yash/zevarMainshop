@include('essence.partials.nav')


@include('essence.partials.cart')

  <div class="breadcumb_area bg-img" style="background-image: url({{ asset('new/img/bg-img/breadcumb.jpg') }});">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="page-title text-center">
            <h2>All Collection</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- category start -->
    <div class="top_catagory_area section-padding-50 clearfix">
      <div class="container">
        <div class="row justify-content-center">
          <?php /* @foreach(App\Models\Category::where('deleted_at',NULL)->limit(9)->get() as $data) */ ?>
          @foreach($categories as $data) 
          <div class="col-12 col-sm-6 col-md-4 mt-5">
            <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ asset('new/img/bg-img/bg-2.jpg') }});">
              <div class="catagory-content">
                <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($data->name)) }}">{{ substr($data->name, 0, 10) }}</a>
              </div>
            </div>
          </div>
          @endforeach

          <div class="d-flex justify-content-center mt-5 mb-5">
            {!! $categories->links() !!}
          </div>
        </div>
      </div>
    </div>
    <!-- category end -->


@include('essence.partials.footer')