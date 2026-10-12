@extends('layouts.app')

@section('content')

<div class="container">

<h1>Editar produto</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

        <div>
            <label for="name">Nome do produto:</label>
            <div>
            @error('name')
                {{ $message }}
            @enderror
            </div>
            <input 
                type="text" 
                id="name" 
                name="name"
                value="{{ old('name', $product->name) }}"
                placeholder="Digite o nome do produto"
            >
        </div>

        <br>

        <div>
            <label for="name">image:</label>
            <div>
            @error('image')
                {{ $message }}
            @enderror
            </div>
            <input 
                type="file" 
                id="image" 
                name="image"
                value="{{ old('image') }}"
                placeholder="escolha um arquivo"
            >
        </div>

        <br>

        <div>
            <label for="description">Descrição:</label>
            <div>
            @error('description')
                {{ $message }}
            @enderror
            </div>
            <textarea 
                id="description" 
                name="description"
                placeholder="Digite a descrição do produto"
            >{{ old('description', $product->description) }}</textarea>
        </div>

        <br>

        <div>
            <label for="price">Preço:</label>
            <div>
            @error('price')
                {{ $message }}
            @enderror
            </div>
            <input 
                type="number" 
                id="price" 
                name="price"
                value="{{ old('price', $product->price) }}"
                step="0.01"
                placeholder="0.00"
            >
        </div>

        <br>

        <div>
            <label for="quantity">Quantidade:</label>
            <div>
            @error('quantity')
                {{ $message }}
            @enderror
            </div>
            <input 
                type="integer" 
                id="quantity" 
                name="quantity"
                value="{{ old('quantity', $product->quantity) }}"
                min="0"
            >
        </div>

        <br>

        <div>
            <label for="category">Categoria:</label>
            <select id="category" name="category">

                <option value="">Selecione uma categoria</option>
                <option value="eletronicos">Eletrônicos</option>
                <option value="roupas">Roupas</option>
                <option value="calcados">Calçados</option>
                <option value="alimentos">Alimentos</option>

            </select>
        </div>

        <br>

        <button type="submit">
            Cadastrar produto
        </button>

</form>

</div>

@endsection