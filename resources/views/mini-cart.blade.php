@if ($cart != null)
    @foreach ($cart->items as $item)
    <div class="product-cart">
        <a href="{{route('view',$item['id'])}}" class="product-image">
            <img width="100" height="125px" src="{{url('uploads')}}/{{$item['image']}}" alt="">
        </a>
        <div class="product-detail">
            <h3 class="name-product">{{$item['name']}}</h3>
            <p class="size"> Size: {{$item['size']}}</p>
            <p class="size"> Color: {{$item['color']}}</p>
            <p class="quantity-quick-view">QTY: {{$item['quantity']}}</p>
            <p class="price">${{number_format($item['price'] * $item['quantity'],2)}}</p>
            <div class="wrap-remove">
                <span data-url="{{ route('cart.remove',$item['pro_single']) }}" class="remove-item"></span>
            </div>
        </div>
    </div>
    @endforeach
    <input hidden class="total-quantity-cart" type="number" value="{{$cart->total_quantity}}">
    <input hidden class="total-price-cart" type="number" value="{{$cart->total_price}}">
@endif
