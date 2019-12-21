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
                                    <a href="#" class="sort-param sort-param-asc " data-name="title">Названию<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="title">Названию<span>&nbsp;</span></a>
                                </div>

                                <div class="shop2-sorting-item">
                                    <a href="#" class="sort-param sort-param-asc " data-name="price">Цене<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="price">Цене<span>&nbsp;</span></a>
                                </div>


                                {{-- <div class="shop2-sorting-item">
                                    <a href="#" class="sort-param sort-param-asc " data-name="rating">Рейтингу<span>&nbsp;</span></a><br>
                                    <a href="#" class="sort-param sort-param-desc " data-name="rating">Рейтингу<span>&nbsp;</span></a>
                                </div> --}}
                                <div class="shop2-sorting-item">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="view-shop">
                    <strong>Вид:</strong>
                    <a href="#" title="Витрина" data-value="thumbs" class="shop2-btn thumbs {{request('view') == 'simple' ? '' : 'active-view'}}"><span>&nbsp;</span></a>
                    <a href="#" title="Список" data-value="simple" class="shop2-btn simple {{request('view') == 'simple' ? 'active-view' : ''}}"><span>&nbsp;</span></a>
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
                        <div class="td">
                            <select name="s[size]">
                                <option value="all">Все</option>
                                @foreach ($sizes as $size)
                                <option value="{{$size}}" {{$selected_size == $size ? 'selected' : ''}}>{{$size}}</option>
                                @endforeach
                            </select>
                        </div>
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

            <div class="product-list">

                @if (request('view') == 'simple')
                    @include('layouts.list')
                @else
                    @include('layouts.grid')
                @endif

                
            </div>

            {{ $products->appends($_GET)->links('layouts.pagination') }}

        </div>
    </main>
    
</div>
@endsection