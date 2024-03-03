@extends('layout.layouts')

@section('header')
<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Products</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Payments</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Customers</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Offices</a></li>
      </ul>
    </header>
  </div>
@endsection

@section('main')

<main class="h-75">
    <p class="text-center">This is Home page
      @forelse($products as $product)
        <li class="text-center">{{ $product->productName }}</li>
      @empty
        <p class="text-center text-danger">No products here</p>
      @endforelse
      @if($products)
        <div class="center m-5">
          {{ $products->links() }}
        </div>
      @endif
    </p>
</main>

@endsection

@section('footer')
<footer>
    <p class="text-center blockquote bg-dark text-warning py-2">This is footer </p>
</footer>
@endsection
