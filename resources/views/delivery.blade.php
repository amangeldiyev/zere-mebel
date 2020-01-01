@extends('layouts.app')

@section('content')
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
            <h1>Доставка и оплата</h1>



            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {

                    (function(e) {

                        e.matches || (e.matches = e.matchesSelector || function(selector) {
                            var matches = document.querySelectorAll(selector),
                                th = this;
                            return Array.prototype.some.call(matches, function(e) {
                                return e === th;
                            });
                        });

                    })(Element.prototype);

                    // проверяем поддержку
                    if (!Element.prototype.closest) {

                        // реализуем
                        Element.prototype.closest = function(css) {
                            var node = this;

                            while (node) {
                                if (node.matches(css)) return node;
                                else node = node.parentElement;
                            }
                            return null;
                        };
                    }

                    var links = document.querySelectorAll(".localtabs > ul > li > .localtabs__title > a");
                    [].forEach.call(links, function(link) {
                        link.addEventListener("click", function(event) {
                            event.preventDefault();
                            this.closest("li").classList.toggle("active");
                        });
                    });
                });
            </script>


            <p><span style="font-family: verdana, geneva; font-size: 13pt;"><strong>&nbsp;</strong></span></p>
            <p><span style="font-family: verdana, geneva; font-size: 12pt;">Доставка выбранного вами товара осуществляется с понедельника по пятницу&nbsp;<strong>с 10:00 до 20:00</strong>. Возможность доставки в другое время обговаривается индивидуально.</span><br /><br /><span style="font-family: verdana, geneva; font-size: 12pt;">Срок доставки зависит от наличия готовой мебели на складе и от срока её производства, в таком случае срок варьируется от одной недели, до четырёх недель. Наш менеджер уточнит самый минимальный срок доставки для Вас. &nbsp;Обычно в течении 1-3 рабочих дней, со дня поступления готового заказа на склад.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;">Доставка товара это отдельная услуга, которая оплачивается в соответствии с правилами магазина.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;"><br />Для жителей <strong>Санкт Петербурга</strong>, в зависимости от района города, стоимость доставки до подъезда колеблется от 700 до 1200 рублей.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;">Для жителей <strong>Ленинградской области</strong> стоимость доставки до подъезда рассчитывается в индивидуальном порядке, в зависимости от километража.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;">Услуга доставки оплачивается Вами при получении Вашего заказа.</span></p>

            <div class="localtabs">
                <ul>
                    <li>
                        <div class="localtabs__title"><a href="#">Оплата товара <span></span></a></div>
                        <div class="localtabs__body" style="padding-left:20px;">
                            <p><span style="font-family: verdana, geneva; font-size: 12pt;">Мы стремимся работать без предоплаты, но заказ&nbsp; некоторых товаров предусматривает предоплату 30-50 % от полной стоимости. <br />О необходимости предоплаты сообщает менеджер при оформлении заказа.&nbsp; <br />При доставке в другие регионы предусматривается 100 % предоплата&nbsp; до отправки заказа транспортной компанией.</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;"> Оплатить покупку в нашем магазине&nbsp;<span style="color: #3366ff;"><strong><a href="index.html"><span style="color: #3366ff;">Панда-Мебель</span></a>&nbsp;</strong></span>Вы можете наличными при доставке заказа.&nbsp; После того как Вам доставят товар, необходимо его тщательно осмотреть и после этого произвести оплату. Обратите внимание, что данный способ оплаты возможен только для жителей <strong>Санкт-Петербурга и Ленинградской области</strong>.</span></p>
                        </div>
                    </li>
                    <li>
                        <div class="localtabs__title"><a href="#">Доставка в другие регионы России <span></span></a></div>
                        <div class="localtabs__body" style="padding-left:20px;">
                            <p><span style="font-family: verdana, geneva; font-size: 12pt;">Доставляем любой удобной &nbsp;Вам транспортной компанией. Стоимость доставки зависит от габаритных размеров и веса Вашего заказа. Рассчитать стоимость можно как на сайтах транспортных компаний, так и у наших менеджеров.</span></p>
                        </div>
                    </li>
                    <li>
                        <div class="localtabs__title"><a href="#">Подъём и сборка товара <span></span></a></div>
                        <div class="localtabs__body" style="padding-left:20px;">
                            <p><span style="font-family: verdana, geneva; font-size: 12pt;">Подъём Вашего заказа на этаж и сборка могут предоставляться по Вашему желанию и являются дополнительными услугами. При наличии грузового лифта Вы оплачиваете подъем за первый и последний этажи, в иных случаях каждый этаж считается отдельно. Стоимость данных услуг зависит от выбранного товара по предварительной договорённости.&nbsp;</span></p>
                        </div>
                    </li>
                </ul>
            </div>

            <p><span style="font-family: verdana, geneva; font-size: 12pt;"><strong>* Важно помнить</strong>, что доставка будет осуществляться в день, который Вы согласуете с нашим менеджером. Без предварительного согласования времени доставки и Вашей возможности принять заказ, доставку мы не осуществляем! Если мы не можем связаться с Вами в течении 2 дней с момента оформления заказа на сайте, то Ваш заказ будет аннулирован!</span><br /><span style="font-family: verdana, geneva; font-size: 12pt;"> Для уверенности что Вы получите Ваш заказ, пожалуйста, укажите как можно больше телефонов для связи с Вами. Мы всегда стараемся доставить товар вовремя, но мы не несём ответственности за транспортную загруженность дорог.</span></p>
            <p><span style="font-family: verdana, geneva; font-size: 12pt;"><strong>Условия отказа от товара при доставке.</strong><br /></span></p>
            <p><span style="font-family: verdana, geneva; font-size: 12pt;">Если на момент фактического получения заказа Вы отказываетесь от покупки, то Вам необходимо оплатить стоимость доставки (в соответствии с п.4 ст.497 ГК РФ)</span></p>
            <p><span style="font-family: verdana, geneva; font-size: 12pt;">&nbsp;</span></p>
            <p><span style="font-size: 12pt;">&nbsp;</span></p>
            <p><span style="font-size: 12pt;">&nbsp;</span></p>


        </div>
    </main>
    
</div>
@endsection