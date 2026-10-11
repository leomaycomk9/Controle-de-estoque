@extends('layouts.app')

@section('content')

<div class="products-page">

    <div class="products-container">

        <div class="products-header">

            <div>
                <h1>My Products</h1>
                <p>Products created by you</p>
            </div>

            <div class="products-header-actions">

                <a
                    href="{{ route('products.index') }}"
                    class="secondary-button"
                >
                    All Products
                </a>

                <a
                    href="{{ route('products.create') }}"
                    class="primary-button"
                >
                    + Create Product
                </a>

            </div>

        </div>


        @if ($products->isEmpty())

            <div class="empty-products">

                <h2>You don't have any products yet.</h2>

                <p>Create your first product to see it here.</p>

                <a
                    href="{{ route('products.create') }}"
                    class="primary-button"
                >
                    Create Product
                </a>

            </div>

        @else

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

                                    <strong>
                                        R$ {{ number_format($product->price, 2, ',', '.') }}
                                    </strong>

                                </div>


                                <div class="product-detail">

                                    <span>Quantity</span>

                                    <strong>
                                        {{ $product->quantity }}
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="my-product-actions">

                            <a
                                href="{{ route('products.edit', $product->id) }}"
                                class="edit-button"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-button"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</div>

@endsection

