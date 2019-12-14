@extends('layouts.app')

@section('content')
<div class="site-path-wrap">
    <div class="site-path-in">
        <span class="home">
            <a href="/"></a> /
        </span>
        <div class="site-path">
            <a href="/">Главная</a> / 
            <a href="{{ route('category', ['category' => $category->slug]) }}">{{$category->name}}</a>
            @if ($subcategory)
            / {{$subcategory->name}}
            @endif
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>{{$title}}</h1>

            <div class="folder-desc">
                <p>
                    <span style="font-family: verdana, geneva; font-size: 12pt;">
                        {{$desc}}
                    </span>
                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>

            <div class="filter-sorting-wrapper clear-self">

                <div class="shop2-filter-button">Фильтр товаров</div>

                <div class="shop2-sorting-panel">
                    <div class="sorting">
                        <strong class="sort-title">Сортировать по:</strong>
                        <div class="sorting-input-wrap">
                            <span class="sort-arr"></span>
                            <div class="sorting-input"></div>
                            <div class="sorting-input-body">

                                <div class="shop2-sorting-item">
                                    <a href="#" class="sort-param sort-param-asc " data-name="name">Названию<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="name">Названию<span>&nbsp;</span></a>
                                </div>

                                <div class="shop2-sorting-item">
                                    <a href="#" class="sort-param sort-param-asc " data-name="price">Цене<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="price">Цене<span>&nbsp;</span></a>
                                </div>


                                <div class="shop2-sorting-item">
                                    <a href="#" class="sort-param sort-param-asc " data-name="rating">Рейтингу<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="rating">Рейтингу<span>&nbsp;</span></a>
                                </div>
                                <div class="shop2-sorting-item">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="view-shop">
                    <strong>Вид:</strong>
                    <a href="#" title="Витрина" data-value="thumbs" class="shop2-btn thumbs  active-view"><span>&nbsp;</span></a>
                    <a href="#" title="Список" data-value="simple" class="shop2-btn simple "><span>&nbsp;</span></a>
                </div>
                <div class="products-per-page-wr">
                    <span class="products-per-page-title">на странице:</span>

                    <select class="products-per-page">
                        <option selected="selected" class="selectedOption"></option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                        <option value="24">24</option>
                        <option value="28">28</option>
                        <option value="32">32</option>
                        <option value="36">36</option>
                        <option value="40">40</option>
                        <option value="44">44</option>
                        <option value="48">48</option>
                        <option value="52">52</option>
                        <option value="56">56</option>
                        <option value="60">60</option>
                        <option value="64">64</option>
                        <option value="68">68</option>
                        <option value="72">72</option>
                        <option value="76">76</option>
                        <option value="80">80</option>
                        <option value="84">84</option>
                        <option value="88">88</option>
                        <option value="92">92</option>
                        <option value="96">96</option>
                        <option value="100">100</option>
                    </select>
                </div>

            </div>
            <form action="#" class="shop2-filter">
                <a id="shop2-filter"></a>

                <div class="table-filter-param">
                    <div class="shop2-filter-fields dimension d-tr">
                        <div class="th field-title">Цена:</div>
                        <div class="td param-body">
                            <div class="dimension-inner">

                                <label class="start range min-val">
                                    <input class="shop2-input-float range-val min" name="s[price][min]" type="text" value="0" />
                                    <input type="hidden" value="" class="start-value" size="5">
                                </label>
                                <label class="end range max-val">
                                    <input class="shop2-input-float range-val max" name="s[price][max]" type="text" value="" size="5" />
                                    <input type="hidden" value="500000" class="end-value">
                                </label>
                            </div>
                            <div class="slider-range"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!------------------------------------->



                    <div class="d-tr shop2-filter-fields type-select">
                        <div class="th">Размеры:</div>
                        <div class="td"><select name="s[razmery]">
                                <option value="">Все</option>
                                <option value="265717441">3 м</option>
                                <option value="265717641">3 х 1,4 м</option>
                                <option value="265717841">3 х 1,8 м</option>
                                <option value="265718041">3,3 х 1м</option>
                                <option value="265718241">3,3 х 1,1 м</option>
                                <option value="275075841">306 х 110 х 95</option>
                                <option value="275892241">155 x 105 x 100</option>
                                <option value="275548441">220 x 97 x 90</option>
                                <option value="275894041">138/158/168 х 107 х 90</option>
                                <option value="6751015">195 х 100</option>
                                <option value="274937641">3060 х 110 х 95</option>
                                <option value="6772015">225 х 105</option>
                                <option value="275925041">85 x 105 x 100</option>
                                <option value="275867441">228 x 108 x 100</option>
                                <option value="6805815">228/248/258/288 х 175 х 90</option>
                                <option value="275269441">252/272/282 х 227 х 90</option>
                                <option value="275896641">236 х 107 х 95</option>
                                <option value="275868241">180/200х105х93</option>
                                <option value="275548241">240 x 110 x 95</option>
                                <option value="275893841">222 х110 х 92</option>
                                <option value="275241041">207 x 145 x 95</option>
                                <option value="6750815">200 х 100</option>
                                <option value="275916641">110 x 108 x 95</option>
                                <option value="275848041">145 x 80 x 95</option>
                                <option value="275924841">100 x 104 x 90</option>
                                <option value="275809641">155/175/190/213 x 100 x 90</option>
                                <option value="6767215">150 х 120</option>
                                <option value="275779441">215 x 105 x 90</option>
                                <option value="275241841">230/250/260 х 175 х 90</option>
                                <option value="6769015">195 х 100 х 100</option>
                                <option value="6749815">150 х 85</option>
                                <option value="275896441">150/170/180/210 х 102 х 90</option>
                                <option value="6572415">250 х 100</option>
                                <option value="6585215">205 х 100</option>
                                <option value="275219841">228/248/258 х 175 х 90</option>
                                <option value="6574215">230 х 160</option>
                                <option value="6772615">200 х 105 х 100</option>
                                <option value="6676615">140/150/160 х 210</option>
                                <option value="6768015">200 х 130</option>
                                <option value="6769815">195/205 х 105</option>
                                <option value="275916441">110 x 105 x 90</option>
                                <option value="275282841">246 х162 х 97</option>
                                <option value="275790241">230/250/260/290 x 108 x 90</option>
                                <option value="275779241">201 x 100 x 100</option>
                                <option value="265718441">3,3 х 1,9 м</option>
                                <option value="6764215">210 х 105</option>
                                <option value="275848641">160/180/195/218 x 108 x 89</option>
                                <option value="6761415">215 х 110</option>
                                <option value="6575815">290 х 170</option>
                                <option value="275076041">239 x 110 x 95</option>
                                <option value="6763215">130/150/170/180 х 100</option>
                                <option value="6571215">220 х 100</option>
                                <option value="275399641">225 х110 х 95</option>
                                <option value="275271641">300 х 222 х 90</option>
                                <option value="275796441">135/155/165/195 х106 х 90</option>
                                <option value="275079641">230/250/260/290 x 200 x 95</option>
                                <option value="6766815">200 х 120</option>
                                <option value="6581215">86/96/106/126 х 220</option>
                                <option value="275894241">166/181 х 110 х 90</option>
                                <option value="275241441">240 x 158 x 95</option>
                                <option value="6770415">220 х 105</option>
                                <option value="275846641">221х106х90</option>
                                <option value="6573815">280 х 173</option>
                                <option value="275925241">86 x 98 x 95</option>
                                <option value="275771641">157/177/187/217 х 108 х 90</option>
                                <option value="6754815">130/160/180 х 100</option>
                                <option value="7473615">152/172/182 х 100 х 90</option>
                                <option value="7473815">225/245/255 х 170 х 90</option>
                                <option value="7681815">135/155/170/195 х106 х 90</option>
                                <option value="14443015">80/140/150/160 х 105 х 90</option>
                                <option value="14481815">110/170/180/190 х 97 х 96</option>
                                <option value="14482015">110/170/180/190 х 100 х 96</option>
                                <option value="14482215">100/160/170/180 х 97 х 94</option>
                                <option value="15324615">151/175/190/213 x 100 x 90</option>
                                <option value="15535015">210 х 106 х 104</option>
                                <option value="15559615">98 х 105 х 104</option>
                                <option value="17481015">1920 х 880 х 1490</option>
                                <option value="17490215">1920 х 880 х 1730</option>
                                <option value="17494815">99/129/149/169 х 200 х 86</option>
                                <option value="17495015">101/131/151/171/191 х 206 х 90</option>
                                <option value="17495415">128/148/168/188 х 202 х 90</option>
                                <option value="17495615">128/148/168/188 х 209 х 99</option>
                                <option value="17496815">138/158/178/198 х 202 х 99</option>
                                <option value="17497015">158/178 х 205 х 106</option>
                                <option value="17497415">130/150/170 х 208 х 98</option>
                                <option value="17497815">152/172 х 203,5 х 103</option>
                                <option value="17501015">102/132/152/172 х 209 х 100</option>
                                <option value="17501415">103 х 204 х 97</option>
                                <option value="17501615">158/178/198 х 205 х 95</option>
                                <option value="17501815">132/152/172 х 208 х 87</option>
                                <option value="17502015">130/150/170 х 200 х 87</option>
                                <option value="17502615">158/178/198 х 207 х 100</option>
                                <option value="17812415">85 х 85 х 44</option>
                                <option value="17813215">62 х 93</option>
                                <option value="17813815">165 х 60 х 223</option>
                                <option value="19740215">210 х 90</option>
                                <option value="19740415">215 х 90</option>
                                <option value="19740615">193 х 90</option>
                                <option value="19741415">196 х 90</option>
                                <option value="19742615">225 х 95</option>
                                <option value="19743215">90 х 80</option>
                                <option value="19744415">200 х 110</option>
                                <option value="19744615">230 х 155</option>
                                <option value="19751615">228/248/265/288 х 175 х 90</option>
                                <option value="19792015">310 х 155</option>
                                <option value="19803215">205 х 90</option>
                                <option value="19804015">76 х 82</option>
                                <option value="19809415">210 х 100</option>
                                <option value="19810415">203 х 100</option>
                                <option value="19957615">230 х 75/85/95/105/115/125/135/145/155/165/175/185</option>
                                <option value="19958615">210 х 76/86/96/106/116/126/136/146/156/166/176/186</option>
                                <option value="19959215">205 х 85/95/105/115/125/135/145/155/165/175/185/195</option>
                                <option value="19963815">205 х 75/85/95/105/115/125/135/145/155/165/175/185</option>
                                <option value="19986215">260 х 160</option>
                                <option value="19986815">235 х 175</option>
                                <option value="19987215">235 х 100</option>
                                <option value="19993015">110 х 225/235/245</option>
                                <option value="19995015">220 х 100/110</option>
                                <option value="20261215">260 х 170</option>
                                <option value="20262815">270 х 160</option>
                                <option value="20263615">220 х 110</option>
                                <option value="20263815">230 х 110</option>
                                <option value="20264415">190 х 130</option>
                                <option value="20265815">220 х 95/105</option>
                                <option value="20266615">208 х 100</option>
                                <option value="20271215">100 х 76</option>
                                <option value="20271615">120/160/200 х 60</option>
                                <option value="20272615">100/120 х 85</option>
                                <option value="20274615">105/125 х 100</option>
                                <option value="20276415">55 х 65 х 115</option>
                                <option value="20277215">201 х 81/91/.../181/191</option>
                                <option value="20278015">210 х 80/90/100</option>
                                <option value="20278215">165 х 110</option>
                                <option value="20280615">195 х 75/85/.../175/185</option>
                                <option value="20280815">195 х 71/82/.../172/182</option>
                                <option value="20281015">100/110/.../170/180 х 55 х 103</option>
                                <option value="20282015">140/160/180 х 55 х 84</option>
                                <option value="20282815">125/146/165 х 52 х 84</option>
                                <option value="20283415">115/125/.../175/185 х 56 х 84</option>
                                <option value="20558215">130/150/160/190 х 108 х 90</option>
                                <option value="20583615">200 х 115/125/.../175/185 х 56 х 84</option>
                                <option value="20588215">115/135/155/175 х 55 х 84</option>
                                <option value="20588415">105/115/125/135/145/155/165/175 х 55 х 83</option>
                                <option value="20589015">125/135/145/155/165/175/185/195 х 60 х 86</option>
                                <option value="20589215">135/145/155/165/175/185/195 х 60 х 87</option>
                                <option value="20590815">150/160/170 х 53 х 78</option>
                                <option value="20591415">60/80/100/120 х 55 х 84</option>
                                <option value="20591815">50/60/70/80/90/100/110/120 х 55 х 83</option>
                                <option value="20592215">55/65/75/85/95/105/115/125 х 60 х 86</option>
                                <option value="20592415">55/65/75/85/95/105/115/125 х 60 х 87</option>
                                <option value="20592615">115 х 75 х 87</option>
                                <option value="20592815">50/60/70/80/90/100/110/120 х 55 х 103</option>
                                <option value="20612015">215 х 97 х 97</option>
                                <option value="20612215">125/145/167/182 х 115 х 91</option>
                                <option value="20612615">240 х 155 х 90</option>
                                <option value="20613015">142 х 71 х 77</option>
                                <option value="20630415">68 х 70 х 103</option>
                                <option value="20630815">55 х 40 х 103</option>
                                <option value="20819415">66/80 х 38</option>
                                <option value="20819615">41 х 41</option>
                                <option value="20819815">42 х 42</option>
                                <option value="20820015">30 х 40/70</option>
                                <option value="47189415">170/175/.../245/250 х 110/115/.../165/170 х 50/55</option>
                                <option value="47190015">160/180/195 х 112 х 92</option>
                                <option value="47192615">308 х 169 х 97</option>
                                <option value="47193015">223 х 156 х 88</option>
                                <option value="47193215">238 х 169 х 97</option>
                                <option value="47202615">90/95/.../265/270 х 50/53/55/58/60/63</option>
                                <option value="47212415">46 х 46 x 44</option>
                                <option value="47212615">106 х 101 х 91</option>
                                <option value="50294015">230 х 106 х 72</option>
                                <option value="50295015">215 х 111/131/151 х 135</option>
                                <option value="50295215">215 х 95 х 95</option>
                                <option value="50295415">210 х 100 х 100</option>
                                <option value="50296415">135/165/195 х 84 х 65</option>
                                <option value="50296615">197 х 100 х 104</option>
                                <option value="50296815">195 х 100 х 92</option>
                                <option value="50321815">242 х 150 х 73</option>
                                <option value="58887215">185/205/220/242 х 100 х 90</option>
                                <option value="58887415">296 х 214 х 90</option>
                                <option value="59028015">178 х 100 х 90</option>
                            </select></div>
                    </div>



                </div>


                <div class="btn-filter-wrap">
                    <div class="result  hide">
                        Найдено: <span id="filter-result">0</span>
                        <span class="result-arrow">&nbsp;</span>
                    </div>
                    <br>
                    <a href="#" class="shop2-filter-go">Показать</a>
                    <br>
                    <a href="divany.html" class="rest-filter">Сбросить</a>
                    <div class="shop2-clear-container"></div>
                </div>

                <div class="close-filter"></div>
            </form><!-- Filter -->

            <div class="product-list product-list-thumbs list-thumb clear-self">

                @foreach ($products as $product)
                <form method="post" action="" accept-charset="utf-8" class="shop2-product-item product-item-thumb">
                    <div class="product-item-in">
                        <div class="product-top">
                            <div class="product-image">
                                <a href="{{ route('product', ['product' => $product->slug]) }}">
                                    <img src="/storage/{{$product->img}}" alt="{{$product->title}}" title="{{$product->title}}" />
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

                            <div class="product-article"><span>Артикул:</span> кд-32</div>

                        </div>
                        <div class="product-bot">
                            <div class="product-price">

                                <div class="price-current ">
                                    <strong>{{$product->sale_price ?? $product->price}}</strong> тг. 
                                </div>
                            </div>

                            <div class="product-amount-buy">
                                {{-- <div class="product-amount">
                                    <div class="amount-title">Количество:</div>
                                    <div class="shop2-product-amount">
                                        <button type="button" class="amount-minus">&#8722;</button><input type="text" name="amount" data-min="1" data-multiplicity="1" maxlength="4" value="1" /><button type="button" class="amount-plus">&#43;</button>
                                    </div>
                                </div>

                                <button class="shop2-product-btn type-2 buy" type="submit">
                                    <span>В Корзину</span>
                                </button> --}}

                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
                
            </div>

            <ul class="shop2-pagelist">



                <li class="page-num active-num"><span>1</span></li>
                <li class="page-num"><a href="divany/p/1.html">2</a></li>
                <li class="page-num"><a href="divany/p/2.html">3</a></li>
                <li class="page-num"><a href="divany/p/3.html">4</a></li>


                <li class="page-next"><a href="divany/p/1.html">&nbsp;</a></li>
                <li class="page-last"><a href="divany/p/3.html">&nbsp;</a></li>

            </ul>

        </div>
    </main>
    
</div>
@endsection