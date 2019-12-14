@extends('layouts.app')

@section('content')

<div class="slider-top">
    <div class="sl_iem" style="background: url(images/sl1.png) center center no-repeat; background-size: cover;">
        <div class="item_desc">
            <div class="item_title"></div>
            <div class="item_body"></div>
        </div>
    </div>
    <div class="sl_iem" style="background: url(images/sl2.png) center center no-repeat; background-size: cover;">
        <div class="item_desc">
            <div class="item_title"></div>
            <div class="item_body"></div>
        </div>
    </div>
    <div class="sl_iem" style="background: url(images/sl3.png) center center no-repeat; background-size: cover;">
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
                                        <img src="/storage/{{$product->img}}" alt="{{$product->title}}" title="{{$product->title}}" />
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


                                <div class="tpl-stars">
                                    <div class="tpl-rating" style="width: 0%;"></div>
                                </div><span class="rat-count">(0)</span>

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
                                        <img src="/storage/{{$product->img}}" alt="{{$product->title}}" title="{{$product->title}}" />
                                        <div class="product-label">
                                            <div class="product-new">New</div>
                                        </div>

                                    </a>
                                    <div class="verticalMiddle"></div>
                                </div>

                                <div class="tpl-stars">
                                    <div class="tpl-rating" style="width: 0%;"></div>
                                </div><span class="rat-count">(0)</span>

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
                    Приветствуем Вас в интернет магазине Зере-Мебель!
                </div>

                <div class="shop2-main-before">
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Если Вы попали на наш сайт, значит Вы находитесь в поиске хорошей и доступной мебели. Ведь для того чтобы освежить интерьер достаточно в нем что-то изменить. В каталоге имеется не только готовая мебель, но и та которую можно заказать на мебельной фабрике. В таком случае, Вы получаете свой заказ доставляемый напрямую от производителя. В разделе <span style="color: #3366ff;"><a href="#"><span style="color: #3366ff;">Ткани</span></a></span> Вы можете ознакомиться с разнообразными материалами на сайте фирм-производителей и сделать свой выбор.</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;" data-mce-mark="1">Мы ценим и уважаем каждого клиента. Всегда к Вашим услугам внимательные и отзывчивые консультанты - они помогут Вам с выбором модели, вариантами обивки и расцветки, помогут оформить заказ; наши водители пунктуальны и всегда стараются доставить Ваш заказ в нужное время; наши грузчики аккуратны и опытны, а сборщики мебели быстро и качественно соберут приобретенную Вами мебель</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Для сотрудничества мы тщательно отбираем фабрики, и главным приоритетом является качественная мебель, которая соответствует всем технологическим стандартам.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;"> Мебельные фабрики с которыми мы сотрудничаем, используют в производстве обивочные материалы передовых компаний Италии, Канады, Бельгии и других стран. Пружинные блоки, пенополиуретан и другие комплектующие поставляют ведущие производители России.</span></p>
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
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">В нашем каталоге Вы найдете <span style="color: #3366ff;"><a href="#"><span style="color: #3366ff;">диваны</span></a></span>, имеющие разнообразные модификации, механизмы трансформации и дизайн. Подобрать модели с наиболее подходящей обивкой различного типа. <span style="color: #3366ff;"><a href="internet-magazin/folder/kresla.html"><span style="color: #3366ff;">Кресла</span></a></span> для отдыха и сна, <span style="color: #3366ff;"><a href="internet-magazin/folder/krovati.html"><span style="color: #3366ff;">кровати</span></a></span> эконом варианта и эксклюзивные модели. <span style="color: #3366ff;"><a href="internet-magazin/folder/stoly-i-stulya.html"><span style="color: #3366ff;">Столы и стулья</span></a></span>, кухонные уголки, шкафы, <span style="color: #3366ff;"><a href="internet-magazin/folder/komody-i-tumby.html"><span style="color: #3366ff;">тумбы и комоды</span></a></span>.</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Обратите Ваше внимание, что из-за отсутствия торгового зала, мы предлагаем Вас самые низкие цены на мебель. Также мы будем рады работать &nbsp;с Вами не только продавая Вам мебель.&nbsp; За фотографии наших товаров в Вашем интерьере мы готовы предоставить Вам скидки на последующие покупки, также не оставим без внимания Ваши <span style="color: #3366ff;"><a href="otzyvy.html"><span style="color: #3366ff;">отзывы</span></a></span> на сайте с впечатлениями о нашей работе.</span></p>
                    <p><span style="font-family: verdana, geneva; font-size: 12pt;">Если Вы дочитали до этой строчки, значит Вы действительно заинтересованный покупатель! Быстрее переходите в каталог и оформляйте заказ, а мы будем искренне рады приятному общению с Вами!&nbsp;</span></p>
                </div>




                <div class="product-list product-list-thumbs list-thumb clear-self">
                </div>

            </div>
            <div class="shop2-main-blocks-wrapper">

                <div class="shop2-main-before">
                    <p><span style="font-size: 10pt; font-family: verdana, geneva;">Вся предоставленная на сайте информация, касающаяся комплектации, технических характеристик, цветовых сочетаний, а также цены носит информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437(2) Гражданского кодекса РФ.</span><br /><span style="font-size: 10pt; font-family: verdana, geneva;"> В соответствии с законодательством РФ, ни один из материалов данного сайта не может быть скопирован, воспроизведен, распространен, вновь опубликован, загружен или использован любым иным способом без предварительного письменного согласия или другого законного правообладателя данных материалов, за исключением случаев, предусмотренных действующим законодательством РФ.</span></p>
                </div>




                <div class="product-list product-list-thumbs list-thumb clear-self">
                </div>

            </div>








        </div>
    </main> <!-- .site-main -->
    <div class="clear-float"></div>
    <div class="brends-wrapper">
        <div class="brends-title">Бренды <a class="see-all" href="internet-magazin/vendors.html">все бренды</a></div>
        <div class="brends-body">
            <div><a href="internet-magazin/vendor/sale-textil.html"><img src="images/default.png" title="Sale Textil" alt="Sale Textil" /></a></div>
            <div><a href="internet-magazin/vendor/finist.html"><img src="images/default.png" title="Финист" alt="Финист" /></a></div>
            <div><a href="internet-magazin/vendor/galeon-k.html"><img src="images/default.png" title="Галеон-К" alt="Галеон-К" /></a></div>
            <div><a href="internet-magazin/vendor/adilet.html"><img src="images/default.png" title="Адилет" alt="Адилет" /></a></div>
            <div><a href="internet-magazin/vendor/ekolayn.html"><img src="images/default.png" title="Эколайн" alt="Эколайн" /></a></div>
            <div><a href="internet-magazin/vendor/domiart.html"><img src="images/default.png" title="Домиарт" alt="Домиарт" /></a></div>
            <div><a href="internet-magazin/vendor/vip-textil.html"><img src="images/default.png" title="VIP-Textil" alt="VIP-Textil" /></a></div>
            <div><a href="internet-magazin/vendor/artefakt.html"><img src="images/default.png" title="Артефакт" alt="Артефакт" /></a></div>
            <div><a href="internet-magazin/vendor/arben.html"><img src="images/default.png" title="Арбен" alt="Арбен" /></a></div>
            <div><a href="internet-magazin/vendor/egida-severozapad.html"><img src="images/default.png" title="Эгида-СевероЗапад" alt="Эгида-СевероЗапад" /></a></div>
            <div><a href="internet-magazin/vendor/ametist.html"><img src="images/default.png" title="Аметист" alt="Аметист" /></a></div>
            <div><a href="internet-magazin/vendor/soyuz-m.html"><img src="images/default.png" title="Союз-М" alt="Союз-М" /></a></div>
            <div><a href="internet-magazin/vendor/lezertach.html"><img src="images/default.png" title="Лэзертач" alt="Лэзертач" /></a></div>
            <div><a href="internet-magazin/vendor/bonlaif.html"><img src="images/default.png" title="Bonlaif" alt="Bonlaif" /></a></div>
        </div>
    </div>
    <div class="clear-container"></div>
    <div class="bottom-blocks-wrap">
        <div class="edit-blocks-wrapper">
            <div class="edit-block-name">Помощь покупателю</div>
            <div class="edit-block-body-slider">
                <div class="edit-block-body">
                    <div class="edit-block-pic"><img src="images/default.png" alt="Помощь покупателю" /></div>
                    <div class="edit-block-title"><a href="pomoshch-pokupatelyu/article_post/obshchiye-rekomendatsii-po-ukhodu-za-myagkoy-mebelyu.html">Общие рекомендации по уходу за мягкой мебелью</a></div>
                    <div class="edit-block-text">
                        <p><span style="font-family: verdana, geneva; font-size: 12pt;">Для поддержания внешнего вида Вашей мебели и продления срока её использования необходим хороший уход. Предлагаем Вам ознакомится с базовыми рекомендациями.&nbsp;</span></p>
                    </div>
                </div>
                <div class="edit-block-body">
                    <div class="edit-block-pic"><img src="images/default.png" alt="Помощь покупателю" /></div>
                    <div class="edit-block-title"><a href="pomoshch-pokupatelyu/article_post/mekhanizmy-transformatsii.html">Механизмы трансформации мебели</a></div>
                    <div class="edit-block-text">
                        <p><span style="font-family: verdana, geneva; font-size: 12pt;">Механизм трансформации&nbsp;- этот критерий один из самых важных при выборе дивана или кресла-кровати. На сегодняшний день существует огромное множество различных механизмов трансформации. Некоторые из них подходят для ежедневного использования, другие же называют "гостевыми" и используют редко.</span></p>
                    </div>
                </div>
                <div class="edit-block-body">
                    <div class="edit-block-pic"><img src="images/default.png" alt="Помощь покупателю" /></div>
                    <div class="edit-block-title"><a href="pomoshch-pokupatelyu/article_post/vybrat-tkan-dlya-myagkoy-mebeli.html">Выбрать ткань для мягкой мебели.</a></div>
                    <div class="edit-block-text">
                        <p align="center" style="text-align: left;"><span style="font-family: verdana, geneva; font-size: 12pt;">Какая обивка дивана практичнее?</span></p>
                        <p><span style="font-family: verdana, geneva; font-size: 12pt;">На этот вопрос нельзя ответить однозначно, ведь каждая ткань обладает какими-то определенными качествами, нет своего рода универсальной обивки, все они отличаются по составу, внешнему виду и фактуре, поэтому обивку нужно выбирать, наиболее подходящую к вашему интерьеру и с подходящими для вас эксплуатационными свойствами.</span></p>
                    </div>
                </div>
            </div>
            <div class="clear-container"></div>
            <div class="see-all"><a href="pomoshch-pokupatelyu.html">все</a></div>
        </div>
    </div>
</div>
    
@endsection