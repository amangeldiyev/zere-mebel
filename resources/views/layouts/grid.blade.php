@foreach ($products as $product)
<form method="post" action="" accept-charset="utf-8" class="shop2-product-item product-item-thumb">
    <div class="product-item-in">
        <div class="product-top">
            <div class="product-image">
                <a href="{{ route('product', ['product' => $product->slug]) }}">
                    <img src="/storage/{{json_decode($product->img)[0]}}" alt="{{$product->title}}" title="{{$product->title}}" />
                    @if ($product->new)
                    <div class="product-label">
                        <div class="product-new">New</div>
                    </div>
                    @endif
                </a>
                <div class="verticalMiddle"></div>
            </div>

            <div class="tpl-stars tpl-active">
                <div class="tpl-rating" style="width: 0%;"></div>
            </div><span class="rat-count">(0)</span>

            <div class="product-name">
                <a href="{{ route('product', ['product' => $product->slug]) }}">{{$product->title}}</a>
            </div>

            {{-- <div class="product-article"><span>Артикул:</span> кд-32</div> --}}

        </div>
        <div class="product-bot">
            <div class="product-price">

                <div class="price-current ">
                    <strong>{{$product->sale_price ?? $product->price}}</strong> тг.
                </div>
            </div>

            <div class="product-amount-buy">

            </div>
        </div>
    </div>
</form>
@endforeach