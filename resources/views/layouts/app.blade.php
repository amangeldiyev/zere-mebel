<!doctype html>
<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <title>{{setting('site.title')}}</title>
    <meta name="description" content="{{setting('site.description')}}">
    <meta name="keywords" content="купить диван Алмата, купить кресло, угловой диван, мягкая мебель Алмата">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-rim-auto-match" content="none">
    <link rel="icon" href="/images/favicon-32x32.png">


    <script src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/shop2.2.js"></script>

    <script type="text/javascript">
        shop2.init({
            "productRefs": {
                "399671615": {
                    "razmery": {
                        "20820015": ["607327015"]
                    }
                }
            },
            "apiHash": {
                "getSearchMatches": "fe79adb3fc0055256d181612e166383a",
                "getFolderMeta": "01ed31feaba34d6c3436250d3a75b1a5",
                "getFolderCustomFields": "e02b83f2509eb83d4bfd423f32ec8de1",
                "getProductListItem": "5703b7248575e65d60158d59c6d4595f",
                "cart": "8d9d7fed1692e711d4e485230c8ad507",
                "cartAddItem": "e8d24d8ac3d61f6fc868be201f2f2dd8",
                "cartRemoveItem": "48fc21ef646bc90efed363afab549cc5",
                "cartUpdate": "fe2405fc5b4e69b9c5bea5f4ce41e936",
                "cartRemoveCoupon": "c4cf68c3c4d2f580900620807f865902",
                "cartAddCoupon": "745b9595f77adee51e5d7aa5c75100fe",
                "deliveryCalc": "5c9e7fe0ed9aa1a058d59c0c232e58a6",
                "print": "f271ebeb6213f764fe33d48ecae6cfae",
                "printOrder": "49f9bfea1e527b68b1162ce04ef1c451",
                "cancelOrder": "f9649bd8b42197b36103870feb9f22df",
                "cancelOrderNotify": "a7bfee62b95a92eae3aac43ec3925436",
                "repeatOrder": "3e9a41cdaef335852e7d81326792cb68",
                "paymentMethods": "c39707f2ba10cfd593ceffea684e8e25",
                "tags": "7f6f5a9b26329d44c32fef408ba00cac",
                "refs": "9cc7cba9803c919c4aab335db0c6853c",
                "compare": "eefffbdf3cfa64de0a0206f03b21e479",
                "folderSearch": "d8de59f08386765afc70e1f40cda72e3",
                "getFolderVendors": "e47136a8a55de7b11b152fb89fa636da"
            },
            "verId": 1562248,
            "mode": "product",
            "step": "",
            "uri": "/internet-magazin",
            "IMAGES_DIR": "/d/",
            "my": {
                "list_picture_enlarge": true,
                "params": "\u0425\u0430\u0440\u0430\u043a\u0442\u0435\u0440\u0438\u0441\u0442\u0438\u043a\u0438",
                "accessory": "\u0410\u043a\u0441\u0441\u0435\u0441\u0441\u0443\u0430\u0440\u044b",
                "kit": "\u041d\u0430\u0431\u043e\u0440",
                "recommend": "\u0420\u0435\u043a\u043e\u043c\u0435\u043d\u0434\u0443\u0435\u043c\u044b\u0435",
                "similar": "\u041f\u043e\u0445\u043e\u0436\u0438\u0435",
                "modification": "\u041c\u043e\u0434\u0438\u0444\u0438\u043a\u0430\u0446\u0438\u0438",
                "search_articl_text_hide": true,
                "special_alias": "\u0420\u0430\u0441\u043f\u0440\u043e\u0434\u0430\u0436\u0430",
                "new_alias": "New",
                "buy_alias": "\u0412 \u041a\u043e\u0440\u0437\u0438\u043d\u0443",
                "show_rating_sort": true,
                "small_images_width": 150,
                "collection_image_width": 350,
                "collection_image_height": 350,
                "cart_image_width": 220,
                "cart_image_height": 220
            }
        });
        function closeForm() {
            let number = $('input[name="d[0]"]')[0].value
            if(number) {
                location.reload()
            } 
        }
    </script>
    <style type="text/css">
        .product-item-thumb {
            width: 300px;
        }

        .product-item-thumb .product-image,
        .product-item-simple .product-image {
            height: 300px;
            width: 300px;
        }

        .product-item-thumb .product-amount .amount-title {
            width: 204px;
        }

        .product-item-thumb .product-price {
            width: 250px;
        }

        .shop2-product .product-side-l {
            width: 450px;
        }

        .shop2-product .product-image {
            height: 450px;
            width: 450px;
        }

        .shop2-product .product-thumbnails li {
            width: 140px;
            height: 140px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="/css/theme.less.css">
    <link rel="stylesheet" href="/css/theme.scss.css">
    <link rel="stylesheet" type="text/css" href="/css/pages.additional.1.0.css">

    @stack('additional_assets')
</head>

<body>
    <div class="overlay"></div>
    <nav class="menu-top-wrapper">
        <div class="close-menu"></div>
        <ul class="menu-top">
            <li class="{{Route::currentRouteName() == 'home' ? 'opened active' : ''}}"><a href="/">Главная</a></li>
            <li class="{{Route::currentRouteName() == 'delivery' ? 'opened active' : ''}}"><a href="{{ route('delivery') }}">Доставка и оплата</a></li>
            <li class="{{Route::currentRouteName() == 'contacts' ? 'opened active' : ''}}"><a href="{{ route('contacts') }}">Контакты</a></li>
            <li class="{{Route::currentRouteName() == 'brands' ? 'opened active' : ''}}"><a href="{{ route('brands') }}">Ткани</a></li>
        </ul>
    </nav>
    <div class="search-form-wrap">
        <div class="search-close"></div>
        <form class="search-form" action="{{ route('search') }}" method="get">
            <input type="text" class="search-text" name="search" onblur="this.value=this.value==''?'Введите ключевое слово':this.value" onfocus="this.value=this.value=='Введите ключевое слово'?'':this.value;" value="Введите ключевое слово" />
            <input class="search-button" type="submit" value="" />
        </form>
        <div class="clear-container"></div>
    </div>
    <div class="folders-shared">
        <div class="close-folders"></div>
        <ul class="folders">
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('category', ['category' => $category->slug]) }}">{{$category->name}}</a>
                <ul class="level-2">
                    @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="{{ route('category', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}">{{$subcategory->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="site-wrapper">
        <header role="banner" class="site-header">
            <div class="header-top-panel">
                <div class="menu-icon"></div>
                <div class="site-search-wr">
                    <div class="search-ico"></div>
                </div>
                <div class="folders-title">Каталог товаров</div>
                <div class="folders-title smal">Каталог</div>
            </div>
            <div class="header-bot">
                <div class="site-name td">
                    <a class="logo" href="/">
                        <img src="/storage/{{setting('site.logo')}}" width="" height="" alt="Интернет-магазин мебели" style="height:100px;">
                    </a>
                    <div class="name-desc-wrap"><a href="/" title="На главную страницу">Интернет-магазин мебели</a>
                        <div class="site-descriptor">
                            <div class="localcontacts__adress-social localsocialview1 localsocial24x24x1">
                                <span class="icon voyager-boat"></span>
                                <a class="csspatch-ignore vk" target="_blank" href="{{setting('site.vkontakte')}}"></a>
                                {{-- <a class="csspatch-ignore fb" target="_blank" href="{{setting('site.facebook')}}"></a>
                                <a class="csspatch-ignore tw" target="_blank" href="{{setting('site.twitter')}}"></a> --}}
                                <a class="csspatch-ignore inst" target="_blank" href="{{setting('site.instagram')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-phone td">
                    <div class="site-phone-in">
                        <div class="site-phone-number phone-block">
                            <div>
                                <a href="{{setting('site.number')}}">
                                    <strong>{{setting('site.number')}}</strong>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="site-phone-whatsapp">
                        <div class="site-phone-number phone-block">
                            <div>
                                <a href="#">
                                    <strong>{{setting('site.whatsapp')}}</strong>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="callback">перезвонить Вам?</a>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer role="contentinfo" class="site-footer">
            <div class="menu-bot-wrapper">
                <ul class="menu-bot">
                    <li><a href="">Главная</a></li>
                    <li><a href="{{ route('delivery') }}">Доставка и оплата</a></li>
                    <li><a href="{{ route('contacts') }}">Контакты</a></li>
                    <li><a href="{{ route('brands') }}">Ткани</a></li>
                </ul>
            </div>
            <div class="form-bottom">
                <div class="tpl-anketa" data-api-url="" data-api-type="form">
                    <div class="title">Подписаться на рассылку</div>
                    <form method="post" action="">
                        <div class="tpl-field">
                            <p>Подписаться на рассылку выгодных предложений нашего магазиа</p>
                        </div>
                        <div class="tpl-field type-text field-required">
                            <div class="field-title">E-mail: <span class="field-required-mark">*</span></div>
                            <div class="field-value">
                                <input required type="text" size="20" maxlength="100" value="" name="d[1]" placeholder="E-mail" />
                            </div>
                        </div>


                        <div class="tpl-field tpl-field-button">
                            <button type="submit" class="tpl-form-button">Отправить</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="site-name-bot"><span>&copy; 2017 - 2019</span>
                <p>ЗЕРЕ МЕБЕЛЬ</p>
            </div><br>
        </footer>
    </div>
    <div class="product-includeForm">
        <div class="tpl-anketa" data-api-url="{{ route('notify') }}" data-api-type="form">
            <div class="closeBtnForm"></div>
            <form method="post">
                @csrf
                <div class="title">Перезвонить Вам</div>
                <div class="tpl-field type-text field-required">
                    <div class="field-title">Телефон: <span class="field-required-mark">*</span></div>
                    <div class="field-value">
                        <input required="" type="text" size="30" maxlength="100" value="" name="d[0]" />
                    </div>
                </div>
                <div class="tpl-field type-textarea">
                    <div class="field-title">Комментарий:</div>
                    <div class="field-value">
                        <textarea cols="50" rows="7" name="d[1]"></textarea>
                    </div>
                </div>
                <div class="tpl-field tpl-field-button">
                    <button type="submit" class="tpl-form-button" onclick="closeForm()">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="/js/jquery.formstyler.min.js" charset="utf-8"></script>
    <script src="/js/plugin.js" charset="utf-8"></script>
    <script src="/js/main.js" charset="utf-8"></script>

</body>

</html>