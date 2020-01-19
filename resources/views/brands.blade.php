@extends('layouts.app')

@section('content')
<style>
    .flex-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    
    .flex-container > div {
      width: 200px;
      margin: 10px;
      text-align: center;
      font-size: 17px;
    }

    .flex-container > div > p {
        margin: 0;
    }

</style>

<div class="site-path-wrap">
    <div class="site-path-in">
        <span class="home">
            <a href="/"></a> /
        </span>
        <div class="site-path">
            <a href="/">Главная</a> / Доставка и оплата
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>Ткани</h1>

            <div class="flex-container">
                @foreach ($brands as $brand)
                    <div>
                        <p>{{$brand->name}}</p>
                        <img src="/storage/{{$brand->img}}" alt="" width="100%">
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</div>
@endsection