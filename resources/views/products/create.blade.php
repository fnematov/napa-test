<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <div>
        <label for="title">Product name</label>
        <input id="title" type="text" name="title" value="{{old('title')}}" required autofocus/>
        <span>{{$errors->first('title')}}</span>
    </div>

    <div>
        <label for="quantity">Quantity</label>
        <input id="quantity"
               type="number"
               name="quantity"
               required
               value="{{old('quantity')}}"
        />

        <span>{{$errors->first('quantity')}}</span>
    </div>

    <div>
        <label for="price">Price</label>
        <input id="price"
               type="number"
               name="price"
               required
               value="{{old('price')}}"
        />

        <span>{{$errors->first('price')}}</span>
    </div>

    <div>
        <button>Create</button>
    </div>
</form>
