@php use App\Enums\RolesEnum; @endphp
<x-layout>
    <h1>Products</h1>
    @role(RolesEnum::ADMIN->value)
    <a href="{{ route('products.create') }}">Add new</a>
    @endrole
    <table>
        <thead>
        <tr>
            <th>Item name</th>
            <th>Quantity</th>
            <th>Price</th>
            @role(RolesEnum::ADMIN->value)
            <th>Action</th>
            @endrole
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                @role(RolesEnum::ADMIN->value)
                <td>
                    <a href="{{ route('products.update', ['product' => $product->id]) }}">Edit</a>
                    <a href="{{ route('products.activities', ['product' => $product->id]) }}">Activities</a>
                    <form action="{{ route('products.destroy' , $product->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>

    <b>Total price with VAT: </b> {{$totalPriceWithVat}}

</x-layout>
