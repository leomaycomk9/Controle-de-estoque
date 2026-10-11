@extends('layouts.app')

@section('content')

<div class="products-page">

    <div class="products-container">

        <div class="product-create-header">

            <h1>Register Product</h1>

            <p>
                Add a new product to your inventory
            </p>

        </div>

        @include('forms.product')

    </div>

</div>

@endsection

