@extends('layouts.app')

@section('content')
<div class="site-path-wrap">
    <div class="site-path-in">
        <span class="home">
            <a href="/"></a> /
        </span>
        <div class="site-path">
            <a href="/">Главная</a> / Поиск по сайту
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>Поиск по сайту</h1>
            <form action="{{ route('search') }}" method="get" accept-charset="utf-8">
                <input type="text" size="30" name="search" value="{{request('search')}}" />

                <p><input type="submit" value="Найти" /></p>
            </form>
            <p>
                <small>Всего найдено: <b>{{count($products)}}</b></small>
            </p>

            <ul style="list-style-type:square">
                @foreach ($products as $product)
                <li>
                    <a href="{{ route('product', ['product' => $product->slug]) }}"><b>{{$product->title}}</b></a>
                </li>
                @endforeach
            </ul>

        </div>
    </main>

</div>
@endsection