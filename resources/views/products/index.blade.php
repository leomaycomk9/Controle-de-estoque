@extends('layouts.app')

@section('content')




<div class="products-page">

    <div class="products-container">

        <div class="products-header">

            <div>
                <h1>Product List</h1>
                <p>Manage your products</p>
            </div>

            <div class="products-header-actions">

                <a href="{{ route('my.products') }}" class="secondary-button">
                    My Products
                </a>

                <a href="{{ route('products.create') }}" class="primary-button">
                    + Create Product
                </a>

            </div>

        </div>


        <div class="products-grid">

            @foreach ($products as $product)

                <div class="product-card">

                    <div class="product-image-container">

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-image"
                        >

                    </div>


                    <div class="product-info">

                        <h2>{{ $product->name }}</h2>

                        <div class="product-details">

                            <div class="product-detail">
                                <span>Price</span>
                                <strong>R$ {{ $product->price }}</strong>
                            </div>

                            <div class="product-detail">
                                <span>quantity</span>
                                <strong>
                                    {{ $product->quantity }}
                                </strong>
                            </div>

                        </div>

                    </div>
                    
                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection

