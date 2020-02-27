@extends('layouts.app')

@section('content')

<div class="slider-top">
    <div class="sl_iem" style="background: url(/storage/{{str_replace('\\', '/', setting('site.slide_1'))}}) center center no-repeat; background-size: cover;">
        <div class="item_desc">
            <div class="item_title"></div>
            <div class="item_body"></div>
        </div>
    </div>
    <div class="sl_iem" style="background: url(/storage/{{str_replace('\\', '/', setting('site.slide_2'))}}) center center no-repeat; background-size: cover;">
        <div class="item_desc">
            <div class="item_title"></div>
            <div class="item_body"></div>
        </div>
    </div>
    <div class="sl_iem" style="background: url(/storage/{{str_replace('\\', '/', setting('site.slide_3'))}}) center center no-repeat; background-size: cover;">
        <div class="item_desc">
            <div class="item_title"></div>
            <div class="item_body"></div>
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>Каталог</h1>
            <div class="folders-in-block-wrap folders-js-controler" id="folders-height">
                <ul class="folders-in-block clear-self">
                    @foreach ($categories as $category)
                    <li class="folder">
                        <div class="folder-image ">
                            <img class="folder-pic" src="storage/{{$category->img}}" alt="" />
                            <span class="vertical-middle"></span>
                        </div>
                        <div class="folder-item">
                            <span class="close-folder"></span>
                            <a class="item-more " href="">
                                <span>Смотреть все</span>
                            </a>
                            <a class="item-cl" href="{{ route('category', ['category' => $category->slug]) }}">{{$category->name}}</a>
                            <ul class="folders-in-block clear-self">
                                @foreach ($category->subcategories as $subcategory)
                                <li><a href="{{ route('category', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}">{{$subcategory->name}}</a></li>
                                @endforeach
                            </ul>
                    </li>
                    @endforeach
                </ul>
                </li>
                <div class="clear-container"></div>
            </div><a href="#" class="see-more">Посмотреть еще</a>

            <div class="shop2-main-blocks-wrapper">
                <div class="shop2-main-header ">
                    Распродажа
                </div>

                <div class="product-list product-list-thumbs list-thumb clear-self">
                    @foreach ($on_sale_products as $product)
                    <form method="post" action="" accept-charset="utf-8" class="shop2-product-item product-item-thumb">
                        <div class="product-item-in">
                            <div class="product-top">
                                <div class="product-image">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">
                                        <img src="/storage/{{json_decode($product->img)[0]}}" alt="{{$product->title}}" title="{{$product->title}}" />
                                        <div class="product-label">
                                            <div class="product-spec">Распродажа</div>
                                            @if ($product->new)
                                            <div class="product-label">
                                                <div class="product-new">New</div>
                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="verticalMiddle"></div>
                                </div>


                                {{-- <div class="tpl-stars">
                                    <div class="tpl-rating" style="width: 0%;"></div>
                                </div>
                                <span class="rat-count">(0)</span> --}}

                                <div class="product-name">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">
                                        {{$product->title}}
                                    </a>
                                </div>

                                <div class="product-article"><span>Артикул:</span> лр-5</div>

                            </div>
                            <div class="product-bot">
                                <div class="product-price">

                                    <div class="price-current ">
                                        <strong>{{$product->sale_price ?? $product->price}}</strong> тг. </div>
                                </div>

                                <div class="product-amount-buy">
                
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    
                </div>

            </div>
            <div class="shop2-main-blocks-wrapper">
                <div class="shop2-main-header ">
                    Новинки
                </div>

                <div class="product-list product-list-thumbs list-thumb clear-self">

                    @foreach ($new_products as $product)
                    <form method="post" action="" accept-charset="utf-8" class="shop2-product-item product-item-thumb">
                        <div class="product-item-in">
                            <div class="product-top">
                                <div class="product-image">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">
                                        <img src="/storage/{{json_decode($product->img)[0]}}" alt="{{$product->title}}" title="{{$product->title}}" />
                                        <div class="product-label">
                                            <div class="product-new">New</div>
                                        </div>

                                    </a>
                                    <div class="verticalMiddle"></div>
                                </div>

                                {{-- <div class="tpl-stars">
                                    <div class="tpl-rating" style="width: 0%;"></div>
                                </div>
                                <span class="rat-count">(0)</span> --}}

                                <div class="product-name">
                                    <a href="{{ route('product', ['product' => $product->slug]) }}">{{$product->title}}</a>
                                </div>

                                <div class="product-article"><span>Артикул:</span> кд-24</div>

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

                </div>

            </div>
            <div class="shop2-main-blocks-wrapper">
                <div class="shop2-main-header ">
                    Приветствуем вас в нашем магазине оборудовании салона красоты "Зере"
                </div>

                <div class="shop2-main-before">
                    <p>
                        <span style="font-family: verdana, geneva; font-size: 12pt;">
                            Наши доступные цены, широкий ассортимент, отличное качество приятно удивят вас. В каталоге имеется, оборудование для салона такие как, парикмахерские кресла и мойки, педикюрное кресла, маникюрные кресла, кресла для барбершоп, зеркала и многое другое. Организуем доставку по Казахстану, РФ, Киргизстану.
                        </span>
                    </p>
                    <p>
                        <span style="font-family: verdana, geneva; font-size: 12pt;" data-mce-mark="1">
                            Мы ценим и уважаем каждого клиента, поможем вам с выбором модели, вариантами обивки и расцветки, поможем оформить заказ.
                        </span>
                    </p>
                    <p>
                        <span style="font-family: verdana, geneva; font-size: 12pt;">
                            Для сотрудничества мы тщательно отбираем фабрики, и главным приоритетом является качественная мебель, которая соответствует всем технологическим стандартам из Гуанчжоу. 
                        </span>
                    </p>
                    <h3>
                        <span style="font-size: 15pt;">
                            <strong>
                                <span style="font-family: verdana, geneva;">Почему именно мы</span>
                            </strong>
                        </span>
                        </h3>
                    <p style="text-align: center;">
                        <br />
                        <span style="display: inline-block; width: 218px; height: 120px; padding: 5px 0; text-align: center; vertical-align: top; margin: 0px 0px 20px; border-top: 1px solid #d9d9d9; border-bottom: 1px solid #d9d9d9; font-family: 'RobotoSlab', Arial, Helvetica, sans-serif;">
                            <img alt="delivery" src="images/fgs16_coins-rus.svg" style="border-width: 0;" title="" /> <br /> <br />
                            Быстрая доставка
                        </span> 
                        <span style="display: inline-block; width: 6px;"> </span> 
                        <span style="display: inline-block; width: 218px; height: 120px; padding: 5px 0; text-align: center; vertical-align: top; margin: 0 0 20px; border-top: 1px solid #d9d9d9; border-bottom: 1px solid #d9d9d9; font-family: 'RobotoSlab', Arial, Helvetica, sans-serif;">
                            <img alt="coins-rus" src="images/fgs16_delivery.svg" style="border-width: 0;" title="" /> <br /><br /> 
                            Гарантия Лучшей цены 
                        </span> 
                        <span style="display: inline-block; width: 218px; height: 120px; padding: 5px 0; text-align: center; vertical-align: top; margin: 0 0 20px; border-bottom: 1px solid #d9d9d9; border-top: 1px solid #d9d9d9; font-family: 'RobotoSlab', Arial, Helvetica, sans-serif;">
                            <img alt="protection" src="images/fgs16_protection.svg" style="border-width: 0;" title="" /> <br /> <br />
                            Высокое качество товаров
                        </span>&nbsp;
                        <span style="display: inline-block; width: 10px;"> </span></p>
                    {{-- <p><span style="font-family: verdana, geneva; font-size: 12pt;">В нашем каталоге Вы найдете <span style="color: #3366ff;"><a href="#"><span style="color: #3366ff;">диваны</span></a></span>, имеющие разнообразные модификации, механизмы трансформации и дизайн. Подобрать модели с наиболее подходящей обивкой различного типа. <span style="color: #3366ff;"><a href="internet-magazin/folder/kresla.html"><span style="color: #3366ff;">Кресла</span></a></span> для отдыха и сна, <span style="color: #3366ff;"><a href="internet-magazin/folder/krovati.html"><span style="color: #3366ff;">кровати</span></a></span> эконом варианта и эксклюзивные модели. <span style="color: #3366ff;"><a href="internet-magazin/folder/stoly-i-stulya.html"><span style="color: #3366ff;">Столы и стулья</span></a></span>, кухонные уголки, шкафы, <span style="color: #3366ff;"><a href="internet-magazin/folder/komody-i-tumby.html"><span style="color: #3366ff;">тумбы и комоды</span></a></span>.</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Обратите Ваше внимание, что из-за отсутствия торгового зала, мы предлагаем Вас самые низкие цены на мебель. Также мы будем рады работать &nbsp;с Вами не только продавая Вам мебель.&nbsp; За фотографии наших товаров в Вашем интерьере мы готовы предоставить Вам скидки на последующие покупки, также не оставим без внимания Ваши <span style="color: #3366ff;"><a href="otzyvy.html"><span style="color: #3366ff;">отзывы</span></a></span> на сайте с впечатлениями о нашей работе.</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Если Вы дочитали до этой строчки, значит Вы действительно заинтересованный покупатель! Быстрее переходите в каталог и оформляйте заказ, а мы будем искренне рады приятному общению с Вами!&nbsp;</span></p> --}}
                </div>




                {{-- <div class="product-list product-list-thumbs list-thumb clear-self">
                </div> --}}

            </div>
            <div class="shop2-main-blocks-wrapper">

                <div class="product-list product-list-thumbs list-thumb clear-self">
                </div>

            </div>

        </div>
    </main> <!-- .site-main -->
    

    {{-- Brands Section --}}
    {{-- @include('layouts.brands') --}}

    {{-- Help Section --}}
    {{-- @include('layouts.help') --}}
</div>
    
@endsection