<form
    action="{{ route('products.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="product-form"
>

    @csrf

    <div class="product-form-group">

        <label for="name">
            Nome do produto
        </label>

        <input
            type="text"
            id="name"
            name="name"
            placeholder="Digite o nome do produto"
            value="{{ old('name') }}"
        >

        @error('name')
            <span class="error-message">
                {{ $message }}
            </span>
        @enderror

    </div>


    
    <div class="product-form-group">

        <label for="image">
            Imagem do produto
        </label>

        <div class="image-upload">

        <label for="image" class="image-upload-label">

            <div class="upload-icon">
                +
            </div>

            <div class="upload-text">

                <strong>
                    Escolha uma imagem
                </strong>

                <span>
                    PNG, JPG ou JPEG
                </span>

            </div>

        </label>

        <input
            type="file"
            id="image"
            name="image"
            class="image-upload-input"
            accept="image/png, image/jpeg, image/jpg"
        >

        </div>

        @error('image')
            <span class="error-message">
                {{ $message }}
            </span>
        @enderror

    </div>




    <div class="product-form-group">

        <label for="description">
            Descrição
        </label>

        <textarea
            id="description"
            name="description"
            placeholder="Digite a descrição do produto"
        >{{ old('description') }}</textarea>

        @error('description')
            <span class="error-message">
                {{ $message }}
            </span>
        @enderror

    </div>


    <div class="product-form-row">

        <div class="product-form-group">

            <label for="price">
                Preço
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0"
                placeholder="0.00"
                value="{{ old('price') }}"
            >

            @error('price')
                <span class="error-message">
                    {{ $message }}
                </span>
            @enderror

        </div>


        <div class="product-form-group">

            <label for="quantity">
                Quantidade
            </label>

            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                placeholder="0"
                value="{{ old('quantity') }}"
            >

            @error('quantity')
                <span class="error-message">
                    {{ $message }}
                </span>
            @enderror

        </div>

    </div>


    <div class="product-form-group">

        <label for="category">
            Categoria
        </label>

        <select
            id="category"
            name="category"
        >

            <option value="">
                Selecione uma categoria
            </option>

            <option
                value="eletronicos"
                {{ old('category') == 'eletronicos' ? 'selected' : '' }}
            >
                Eletrônicos
            </option>

            <option
                value="roupas"
                {{ old('category') == 'roupas' ? 'selected' : '' }}
            >
                Roupas
            </option>

            <option
                value="calcados"
                {{ old('category') == 'calcados' ? 'selected' : '' }}
            >
                Calçados
            </option>

            <option
                value="alimentos"
                {{ old('category') == 'alimentos' ? 'selected' : '' }}
            >
                Alimentos
            </option>

        </select>

        @error('category')
            <span class="error-message">
                {{ $message }}
            </span>
        @enderror

    </div>


    <button
        type="submit"
        class="product-submit-button"
    >
        Cadastrar produto
    </button>

</form>

