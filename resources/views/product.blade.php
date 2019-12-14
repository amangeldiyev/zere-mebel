@extends('layouts.app')

@section('content')

<div class="site-path-wrap">
    <div class="site-path-in">
        <span class="home">
            <a href="/"></a> /
        </span>
        <div class="site-path">
            <a href="/">Главная</a> / 
            <a href="{{ route('category', ['category' => $product->category->slug]) }}">{{$product->category->name}}</a>
            @if ($product->subcategory)
            / <a href="{{ route('category', ['category' => $product->category->slug, 'subcategory' => $product->subcategory->slug]) }}">{{$product->subcategory->name}}</a>
            @endif
            / {{$product->title}}
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>{{$product->title}}</h1>

            <form method="post" action="" accept-charset="utf-8" class="shop2-product">

                <div class="side-l-r-wrapper">
                    <div class="product-side-l">
                        <div class="product-image-wrap">
                            <div class="product-thumbnails-wrap special-block-wrapper" id="exaemple">
                                <div class="product-thumbnails-wrap1 special-block clear-self">
                                    <div class="scrollbar">
                                        <div class="handle">
                                            <div class="mousearea">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumbnails special-block-in frame">
                                        <ul class="thumbnails-in special-block1 product-list-thumbs clear-self">
                                            <li>
                                                <a class="light_gallery2" href="/storage/{{$product->img}}">
                                                    <img src="/storage/{{$product->img}}" alt="Банкетка Георг" title="Банкетка Георг" />
                                                </a>
                                            </li>
                                            <li>
                                                <a class="light_gallery2" href="/images/default.png">
                                                    <img src="/images/default.png" alt="Банкетка Георг" title="Банкетка Георг" />
                                                </a>
                                                <div class="verticalMiddle"></div>
                                            </li>
                                            <li>
                                                <a class="light_gallery2" href="/images/default.png">
                                                    <img src="/images/default.png" alt="Банкетка Георг" title="Банкетка Георг" />
                                                </a>
                                                <div class="verticalMiddle"></div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="prevPage"></div>
                                    <div class="nextPage"></div>
                                    <ul class="pages"></ul>
                                </div>
                            </div>
                            <div class="product-image">

                                <a class="light_gallery_opener" href="#">
                                    <img src="/storage/{{$product->img}}" alt="Банкетка Георг" title="Банкетка Георг" />
                                </a>
                                <div style="display: none;">
                                    <a class="light_gallery" href="#">
                                        <img src="/images/default.png" alt="Банкетка Георг" title="Банкетка Георг" />
                                    </a>
                                    <a href="#" class="light_gallery">
                                        <img src="/images/default.png" alt="Банкетка Георг" title="Банкетка Георг" />
                                    </a>
                                    <a href="#" class="light_gallery">
                                        <img src="/images/default.png" alt="Банкетка Георг" title="Банкетка Георг" />
                                    </a>
                                </div>
                                <div class="verticalMiddle"></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-side-r">

                        
                        <div class="form-add">
                            <div class="product-price">

                                <div class="price-current ">
                                    <strong>{{$product->sale_price ?? $product->price}}</strong> тг. 
                                </div>
                            </div>
                            <div class="tpl-rating-block">
                                <div class="tpl-stars tpl-active">
                                    <div class="tpl-rating" style="width: 0%;"></div>
                                </div><span>(0)</span>
                            </div>

                            {{-- <div class="product-amount">
                                <div class="amount-title">Количество:</div>
                                <div class="shop2-product-amount">
                                    <button type="button" class="amount-minus">&#8722;</button><input type="text" name="amount" data-min="1" data-multiplicity="1" maxlength="4" value="1" /><button type="button" class="amount-plus">&#43;</button>
                                </div>
                            </div> --}}

                        </div>

                        {{-- <button class="shop2-product-btn type-3 buy" type="submit">
                            <span>В Корзину</span>
                        </button>

                        <div class="buy-one-click">
                            <a class="shop2-buy-one-click" href="../../kupit-v-odin-klik">Купить в один клик
                                <input type="hidden" value="Банкетка Георг" name="product_name" class="productName" />
                                <input type="hidden" value="http://panda-mebel.ru/internet-magazin/product" name="product_link" class="productLink" />
                            </a>
                        </div>
                        <div class="clear-float"></div> --}}



                        <div class="product-details" style="border-top: 0px">
                            <table class="shop2-product-options">
                                <tr class="odd type-select">
                                    <th>Размеры</th>
                                    <td>{{$product->size}}</td>
                                </tr>
                                @foreach ($product->attributes as $attribute)
                                <tr class="even">
                                    <th>{{$attribute->name}}</th>
                                    <td>{{$attribute->value}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="shop2-clear-container"></div>

                    </div>
                </div>
                <div class="shop2-clear-container"></div>
            </form><!-- Product -->

            <div class="shop2-product-data" id="product_tabs">
                <ul class="shop2-product-tabs">
                    <li class="active-tab"><a href="#shop2-tabs-2">Характеристики</a></li>
                    <li><a href="#shop2-tabs-4">Отзывы (0)</a></li>
                </ul>

                <div class="shop2-product-desc">


                    <div class="desc-area active-area" id="shop2-tabs-2">
                        <table class="shop2-product-params">
                            <tr class="odd type-select">
                                <th>Размеры</th>
                                <td>{{$product->size}}</td>
                            </tr>
                            @foreach ($product->attributes as $attribute)
                            <tr class="even">
                                <th>{{$attribute->name}}</th>
                                <td>{{$attribute->value}}</td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="shop2-clear-container"></div>
                    </div>

                    <div class="desc-area reviews " id="shop2-tabs-4">

                        <div class="tpl-block-header">Оставьте отзыв</div>

                        <div class="tpl-info">
                            Заполните обязательные поля <span class="tpl-required">*</span>.
                        </div>

                        <form action="#" method="post" class="tpl-form">
                            <input type="hidden" name="comment_id" value="" />

                            <div class="tpl-field  type-text ">
                                <label class="tpl-title" for="d[1]">
                                    <span class="tpl-required">*</span>
                                    Имя:

                                </label>
                                <div class="clear-float"></div>
                                <div class="tpl-value">
                                    <input type="text" size="40" name="author_name" maxlength="" value="" required="true" />
                                </div>


                            </div>

                            <div class="tpl-field  type-text ">
                                <label class="tpl-title" for="d[1]">
                                    <span class="tpl-required">*</span>
                                    E-mail:

                                </label>
                                <div class="clear-float"></div>
                                <div class="tpl-value">
                                    <input type="text" size="40" name="author" maxlength="" value="" required="true" />
                                </div>


                            </div>

                            <div class="clear-float"></div>
                            <div class="tpl-field  ">
                                <label class="tpl-title" for="d[1]">
                                    <span class="tpl-required">*</span>
                                    Комментарий:

                                </label>
                                <div class="clear-float"></div>
                                <div class="tpl-value">
                                    <textarea cols="55" rows="10" name="text"></textarea>
                                </div>


                            </div>

                            <div class="clear-float"></div>
                            <div class="tpl-field  stars-wrap">
                                <label class="tpl-title" for="d[1]">
                                    <span class="tpl-required">*</span>
                                    Оценка:

                                </label>
                                <div class="clear-float"></div>
                                <div class="tpl-value">

                                    <div class="tpl-stars">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <input name="rating" type="hidden" value="0" />
                                    </div>

                                </div>


                            </div>

                            <div class="tpl-field">
                                <input type="submit" class="tpl-button tpl-button-big" value="Отправить" />
                            </div>

                        </form>

                        <div class="shop2-clear-container"></div>
                    </div>
                </div><!-- Product Desc -->

                <div class="shop2-clear-container"></div>
            </div>

            <p><a href="javascript:shop2.back()" class="shop2-btn shop2-btn-back">Назад</a></p>

        </div>
    </main> <!-- .site-main -->
    <div class="clear-float"></div>
</div>
    
@endsection
