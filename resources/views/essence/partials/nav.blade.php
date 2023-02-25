<?php 
  $cart = session()->get('cart');
  $count = 0;
  if (is_array($cart)) {
    $count = count($cart);
  }
?>
<!-- nav start -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zevar - The Jewellery Store</title>
    <link rel="icon" href="{{ asset('new/img/core-img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('new/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('new/style.css') }}">
  </head>
  <body>
    <!-- header end -->
    <header class="header_area">
      <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <nav class="classy-navbar" id="essenceNav">
          <a class="nav-brand" href="{{ url('/') }}">
            <img src="{{ asset('new/img/core-img/logo.png') }}" alt="">
          </a>
          <div class="classy-navbar-toggler">
            <span class="navbarToggler">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div class="classy-menu">
            <div class="classycloseIcon">
              <div class="cross-wrap">
                <span class="top"></span>
                <span class="bottom"></span>
              </div>
            </div>
            <div class="classynav">
              <ul>
                <li>
                  <a href="{{ url('/shop') }}">Shop</a>
                </li>
                <li class="cn-dropdown-item has-down pr12"><a href="#">Categories</a>
                  <ul class="dropdown">
                    @foreach(App\Models\Category::where('deleted_at',NULL)->limit(10)->get() as $cat)
                      <li>
                        <a href="{{ url('/') }}/category/{{ str_replace(' ','-',strtolower($cat->name)) }}">{{ substr($cat->name,0,10) }}</a>
                      </li>
                    @endforeach
                  </ul>
                  <span class="dd-trigger"></span><span class="dd-arrow"></span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="header-meta d-flex clearfix justify-content-end">
          <div class="search-area">
            <form action="#" method="post">
              <input type="search" name="search" id="headerSearch" placeholder="Type for search">
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <div class="favourite-area">
            <a href="#">
              <img src="{{ asset('new/img/core-img/heart.svg') }}" alt="">
            </a>
          </div>
          <div class="user-login-info">
            <a href="#" id="essenceCartBtn">
              <img src="{{ asset('new/img/core-img/user.svg') }}" alt="">
            </a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
          <div class="cart-area">
            <a href="#" id="essenceCartBtn">
              <img src="{{ asset('new/img/core-img/bag.svg') }}" alt="">
              <span>{{ $count }}</span>
            </a>
          </div>
        </div>
      </div>
    </header>
<!-- nav end -->