@foreach ($products as $product)
<form method="post" action="" accept-charset="utf-8" class="shop2-product-item product-item-simple">

    <div class="product-side-l">
        <div class="product-image">
            <a href="{{ route('product', ['product' => $product->slug]) }}">
                <img src="/storage/{{json_decode($product->img)[0]}}" alt="{{$product->title}}" title="{{$product->title}}">
                @if ($product->new)
                <div class="product-label">
                    <div class="product-new">New</div>
                </div>
                @endif
            </a>
            <div class="verticalMiddle"></div>
        </div>
    </div>

    <div class="product-side-c">
        <div class="simple-rating">

            {{-- <div class="tpl-stars tpl-active">
                <div class="tpl-rating" style="width: 0%;"></div>
            </div>
            <span class="rat-count">(0)</span> --}}
        </div>
        <div class="product-name">
            <a href="{{ route('product', ['product' => $product->slug]) }}">{{$product->title}}</a>
        </div>
        <p>{{$product->desc}}</p>

        {{-- <div class="product-article"><span>Артикул:</span> кд-32</div> --}}

        <div class="product-details">
            {{-- <div class="product-compare">
                <label>
                    <span class="checkbox-style"></span>
                    <input type="checkbox" value="1437884815">
                    Добавить к сравнению
                </label>
            </div>
            <div class="table-wrapper">
                <table class="shop2-product-options">
                </table>
            </div> --}}
        </div>
    </div>


    <div class="product-side-r">
        <div class="product-price">

            <div class="price-current ">
                <strong>{{$product->sale_price ?? $product->price}}</strong> тг.
            </div>
        </div>
        {{-- <div class="product-amount">
            <div class="amount-title">Количество:</div>
            <div class="shop2-product-amount">
                <button type="button" class="amount-minus disabled">−</button><input type="text" name="amount" data-min="1" data-multiplicity="1" maxlength="4" value="1"><button type="button" class="amount-plus">+</button>
            </div>
        </div>


        <button class="shop2-product-btn type-3 buy" type="submit">
            <span>В Корзину</span>
        </button> --}}

    </div>
</form>
@endforeach

