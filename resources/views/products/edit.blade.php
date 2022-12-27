<form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Product name</label>
        <input id="title" type="text" name="title" value="{{old('title') ?? $product->title}}" required autofocus/>
        <span>{{$errors->first('title')}}</span>
    </div>

    <div>
        <label for="quantity">Quantity</label>
        <input id="quantity"
               type="number"
               name="quantity"
               required
               value="{{old('quantity') ?? $product->quantity}}"
        />

        <span>{{$errors->first('quantity')}}</span>
    </div>

    <div>
        <label for="price">Price</label>
        <input id="price"
               type="number"
               name="price"
               required
               value="{{old('price') ?? $product->price}}"
        />

        <span>{{$errors->first('price')}}</span>
    </div>

    <div>
        <button>Update</button>
    </div>
</form>
