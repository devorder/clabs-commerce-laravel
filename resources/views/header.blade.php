<?php
use App\Http\Controllers\ProductController;
$user = Illuminate\Support\Facades\Session::has('user');
$cart_items = (new ProductController)->get_cart_count();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Le noir</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders</a>
        </li>
      </ul>
      <div class="container w-50 d-none d-md-inline">
        <form class="form-inline" action="{{ route('search.get') }}" method="get">
          <input name="query" class="form-control w-75 mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="my-2 my-lg-0">
        <ul class="navbar-nav" style="margin-right: 50px;">
          @if ($cart_items)
            <li class="nav-item">
              <a class="nav-link" href="cart">Cart({{$cart_items}})</a>
            </li>              
          @endif
          @if ($user)
            <li class="nav-item dropdown" style="z-index: 1000">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Session::get('user')->name}}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('logout') }}">logout</a>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="login">login</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>