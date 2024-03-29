﻿/*
 * Java-скрипты
 */

    /* toTop Button */

        $(function() { 
            $(window).scroll(function() { 
            if($(this).scrollTop() != 0) { 
                    $('#toTop').fadeIn(); 
                            } else {	 
                                    $('#toTop').fadeOut(); 
                            }	 
                    }); 
                    $('#toTop').click(function() { 
                    $('body,html').animate({scrollTop:0},800); 
            });
        });


    /*Fix menu */

    $(document).ready(function(){
        var $menu = $("#main-menu-container");
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.removeClass("default").addClass("fixed");
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.removeClass("fixed").addClass("default");
                }
        });//scroll
    });

    /*scroll to anchor */
    $(document).ready(function() {
        $("a.scrolling-links").click(function () {
          var elementClick = $(this).attr("href");
          var destination = $(elementClick).offset().top-50;
          $('html,body').animate( { scrollTop: destination }, 1100 );
          return false;
        });
    });

    /* active-menu-main */
        function ActiveLinksMain(id){
            try{
                    var el=document.getElementById(id).getElementsByTagName('a');
                            var url=document.location.href;
                            for(var i=0;i<el.length; i++){
                            if (url==el[i].href){
                            el[i].className = 'active_menu';
                            };
                    };
            }
            catch(e){}
            };


    /* swiper slider */
    $(document).ready(function () {
    //initialize swiper when document ready
    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        autoplay: {
                delay: 5000,
                },
        pagination: {
                        el: '.swiper-pagination',
                        type: 'bullets',
                        //type: 'progressbar',
                        bulletElement: 'span',
                        bulletClass: 'swiper-pagination-bullets',
                        bulletActiveClass: 'swiper-pagination-bullet-active',
                        clickable: true
                },
        navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                },
        mousewheel: {
                invert: true,
                },
        effect: 'fade',
        fadeEffect: {
                crossFade: true
                },
        coverflowEffect: {
                rotate: 30,
                slideShadows: false,
                },
        loop: true
        })
    });

    function showcart() {
        //document.getElementById('cart-container').style.display = 'block';
        $('#cart-container').show();
    }

    function hidecart() {
        //document.getElementById('cart-container').style.display = 'none';
        $('#cart-container').hide();
    }

    // кнопка "Назад" на первый шаг
    $('#go-step1').click(function() {
        hidecart();
        $('#banner-on-main-container').show();
        $('.for-whom').show();
        $('.advance').show();
        $('#about-on-main').show();
        $('#banners-on-main').show();
        $('#testimonials-on-main').show();
        $('#our-clients-on-main').show();
        $('#subscribe-container').show();
        $('#order-steps-1').css('background-color', '#34AD00');
        $('#order-steps-2').css('background-color', '#A0A0A0');
        $('#order-steps-3').css('background-color', '#A0A0A0');
    });
    // кнопка "К услугам" на шаг 2
    $('#go-back-step2').click(function() {
        showcart();
        $('#order-steps-1').css('background-color', '#A0A0A0');
        $('#order-steps-2').css('background-color', '#34AD00');
        $('#order-steps-3').css('background-color', '#A0A0A0');
        
        $('#banner-on-main-container').show();
        $('.advance').show();
        $('.for-whom').show();
        $('#about-on-main').show();
        $('#banners-on-main').show();
        $('#testimonials-on-main').show();
        $('#our-clients-on-main').show();
        $('#subscribe-container').show();
        
        window.location.hash = '#order';
        
    });

    // кнопка "Далее" на второй шаг
    $('#go-step2').click(function() {
        showcart();
        $('#banner-on-main-container').hide();
        $('.advance').hide();
        $('.for-whom').hide();
        $('#about-on-main').hide();
        $('#banners-on-main').hide();
        $('#testimonials-on-main').hide();
        $('#our-clients-on-main').hide();
        $('#subscribe-container').hide();
        // добавить выбранный регион во все теги на шаге 2 и 3
        var selectedRegion = $('input[name="selectRegion"]:checked').val();
        $('#region-name-step2').html(selectedRegion);
        $('#region-name-step3').html(selectedRegion);
        // изменить цвет круга "Шаг 1" и "Шаг 2"
        $('#order-steps-1').css('background-color', '#A0A0A0');
        $('#order-steps-2').css('background-color', '#34AD00');
        $('#order-steps-3').css('background-color', '#A0A0A0');
    });
    // кнопка "Заказать" на третий шаг
    $('#go-step3').click(function() {
        // если корзина пуста - показать сообщение и не переходить на шаг 3
        $('#cart-list').each(function(){
                if( $(this).find('li').length == 0 ) {
                        $('#go-step3').attr('href', '#');
                        alert('Не выбрано ни одной услуги');
                }
                else {
                        $('#go-step3').attr('href', '#step3');
                        hidecart();
                        $('#order-steps-1').css('background-color', '#A0A0A0');
                        $('#order-steps-2').css('background-color', '#A0A0A0');
                        $('#order-steps-3').css('background-color', '#34AD00');
                        
                        $('#banner-on-main-container').hide();
                        $('.advance').hide();
                        $('.for-whom').hide();
                        $('#about-on-main').hide();
                        $('#banners-on-main').hide();
                        $('#testimonials-on-main').hide();
                        $('#our-clients-on-main').hide();
                        $('#subscribe-container').hide();
                        
                        window.location.hash = '#order';
                }
        });
    });
    
    // выбрать регион на шаге 1
    
    /* переключатель регионов в услугах */
    $('input[name="services-checks-regions"]').change(function(){
        // вывести название региона в заголовки на шаге 2 и 3
        var selectedRegion = $('input[name="services-checks-regions"]:checked').attr('region-name');
        
        //var selectedRegion = $('input[name="services-checks-regions"]:checked').html();
        $('#region-name-step1').html(selectedRegion);
        $('#region-name-step2').html(selectedRegion);
        $('#region-name-step3').html(selectedRegion);
        // показать услуги только для выбранного региона, остальные скрыть
        // регионы сравниваются по атрибуту region="..."
        var selectedRegionId = $('input[name="services-checks-regions"]:checked').attr('region');
        // сохраняем выбранный id в глобальной переменной regionID для дальнейшего использования
        regionID = selectedRegionId;
        $('#order-select-services').find('.panel').each(function(){
            var serviceId = $(this).attr('region');
            if (serviceId === selectedRegionId) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        // показать сканы только для выбранного региона, в зависимости от значения data-scan-region 
        // изменить заголовок Образец...Образцы... или отключить, если сканов 0
        let scanCount = 0;  // посчитать сканы у услуги
        $('.scan').each(function(){
            var scanRegionId = $(this).data('scanRegion');
            
            if (scanRegionId === parseInt(selectedRegionId)) {
                $(this).show();
                scanCount++;
                console.log('show=' + scanRegionId + ' scanCount=' + scanCount);
                
            } else {
                $(this).hide();
            }
        });
        // скрыть "Образец" если сканов 0 - !!!не работает в барабане!!!, для барабана искать другое решение...
        if( scanCount === 0) {
            $('.scan-block h4').hide();
        } else {
            $('.scan-block h4').show();
        }

        /*if( scanCount === 0) {
            $('.scan-block h4').hide()
        } else if ( scanCount === 1 ) {
            $('.scan-block h4').html('Образец:');
        } else {
            $('.scan-block h4').html('Образцы :');
        }
        console.log('h4=' + $('.scan-block h4').html() + ' scanCount=' + scanCount);*/
        
        
        //changeScansHeader(selectedRegionId);  // не используется!

        // очистить корзину и таблицу на шаге 3, обнулить "Итого", если выбран другой регион
        $('#cart-list').each(function() {
            $(this).find('li').remove();
        });
        $('#table-order-step3').find('.counter').each(function() {
            $(this.parentNode).remove();
        });
        $('#sum').html('0');
        $('.step3-sum').html('0');
        $('#cart-empty-text').show();
    });
    
    // при загрузке страницы установить регион "Москва" на шаге 1
    $(document).ready(function(){
        $('#services-checks-regions').find('#region-1').attr('checked', true).change();
    });

    // добавить услугу в корзину
    $('.select-price').on('change', function () {
        var selectPrice = $(this);
        if ($(this).prop('selectedIndex') != 0) {
            // делаем видимыми скрытые поля для избранных услуг (выбираем услугу по serviceId)
            var serviceId = $(this).attr('service');
            switch (serviceId) {
                case '3':
                    $('#object-address').val('нет');
                    $('#object-address').closest('.form-group').addClass('hidden');
                    $('#inn').closest('.form-group').removeClass('hidden');
                    break;
                case '4':
                    $('#object-address').val('нет');
                    $('#object-address').closest('.form-group').addClass('hidden');
                    break;
                case '9':
                    $('#object-address').val('нет');
                    $('#object-address').closest('.form-group').addClass('hidden');
                    $('#reg-address').closest('.form-group').removeClass('hidden');
                    $('#fio').closest('.form-group').removeClass('hidden');
                    $('#birthday').closest('.form-group').removeClass('hidden');
                    break;
                default:
                    $('#object-address').val('');
                    if($('#object-address').closest('.form-group').hasClass('hidden'))
                        $('#object-address').closest('.form-group').removeClass('hidden');
                    break;
            }
            // добавить услугу в список в корзине
            showcart();
            $('#cart-list').append(
                $('<li>').append(
                        $(this.parentNode.parentNode).find('a').html()
                            + ', цена: <span>' 
                                + $(this).val()
                                    + '</span> руб. <i class="fa fa-close" title="Удалить"></i>'
                )
            );
            // добавить услугу в таблицу на шаге 3
            // удалить строку "Итого"
            $('#table-order-step3').find('#total-tr').remove();
            // добавить строку с услугой
            $('#table-order-step3').append(
                    '<tr class="region-tr" region="'+ regionID +'">' + 
                    '<td class="counter text-center"></td>' +
                    '<td><span class="service-name">' + $(this.parentNode.parentNode).find('a').html() + '</span> <i class="fa fa-close" title="Удалить"></i></td>' +
                    '<td class="sum text-center">' + $(this).val() + '</td>' + 
                    '</tr>'
            );
            // добавить строку "Итого"
            $('#table-order-step3').append(
                    '<tr id="total-tr">' + 
                    '<td></td>' +
                    '<td>Итого:</td>' +
                    '<td class="text-center"><span class="step3-sum">0</span> <i class="fa fa-rub"></i></td>' + 
                    '</tr>'
            );
            // пересчитываем строки в таблице
            calcTableRows();

            // посчитать сумму Итого
            var sum = $('#sum').html();
            $('#sum').html(parseFloat(sum) + parseFloat($(this).val()));
            $('.step3-sum').html(parseFloat(sum) + parseFloat($(this).val()));

            //скрыть "Корзина пуста..."
            $('#cart-empty-text').hide();

            // поставить focus на следующей услуге
            var tabindex = selectPrice.attr('tabindex');
            var nextTab = parseInt(tabindex)+1;
            $('.select-price[tabindex=' + nextTab + ']').focus();

            // показать сообщение gritter
            $.gritter.add({
                    title: 'Услуга добавлена:',
                    text: $(this.parentNode.parentNode).find('a').html() + '<br>' + 'Цена: ' + $(this).val() + ' руб.',
                    image: 'images/logo.png',
                    sticky: false,
                    position: 'top-right',
                    time: '5000'
            });
        }
    });

    // удалить услугу из корзины
    $('#cart-list').on('click', '.fa-close', function () {
        // вычесть сумму услуги из общей суммы в корзине и в таблице на шаге 3
        var sum = $('#sum').html();
        if (sum <= 0) {
                $('#sum').html('0');
                $('.step3-sum').html('0');
        } else {
                $('#sum').html( parseFloat(sum) - parseFloat($(this).closest('li').find('span').html()) );
                $('.step3-sum').html( parseFloat(sum) - parseFloat($(this).closest('li').find('span').html()) );
        }
        // удалить услугу из списка, перед этим запомнить ее № в списке
        var cartLiIndex = $(this).closest('li').index();
        $(this).closest('li').remove();

        // удалить услугу из корзины, если ее № в корзине = № в списке
        $('#table-order-step3').find('.counter').each(function() {
            // проверяем, если № услуги в корзине = № в списке
            if( Number($(this).html()) == Number(cartLiIndex+1)) {
                    // тогда - удаляем tr
                    $(this.parentNode).remove();
            }
        });

        // пересчитываем счетчик строк в таблице после удаления товара из корзины
        calcTableRows();

        //показать "Корзина пуста..." если список пуст, скрыть корзину и показать сообщение gritter
        $('#cart-list').each(function(){
            if( $(this).find('li').length == 0 ) {
                $('#cart-empty-text').show();
                hidecart();
                // показать сообщение gritter
                $.gritter.add({
                        title: 'Корзина пуста',
                        text: 'Не выбрано ни одной услуги',
                        image: 'images/logo.png',
                        sticky: false,
                        position: 'top-right',
                        time: '5000'
                });
            }
        });
    });

    // удалить услугу из таблицы на шаге 3
    $('#table-order-step3').on('click', '.fa-close', function () {
        // посчитать сумму "Итого" в корзине и таблице
        var sum = $('#sum').html();
        $('#sum').html(parseFloat(sum) - parseFloat($(this.parentNode.parentNode).find('.sum').html()));
        $('.step3-sum').html(parseFloat(sum) - parseFloat($(this.parentNode.parentNode).find('.sum').html()));

        // запоминаем № удаляемой строки
        var thisRowNum = $(this.parentNode.parentNode).find('.counter').html();
        // удаляем из корзины услугу с индексом № thisRowNum-1
        $('#cart-list li').eq(thisRowNum-1).remove();

        // удаляем строку
        $(this.parentNode.parentNode).remove();
        // пересчитываем номера строк
        calcTableRows();
        // скрыть блок "Как с вами связаться", если таблица пуста (сумма = 0)
        if( $('.step3-sum').html() == '0' && $('#sum').html() == '0' ) {
            alert('Корзина пуста...');
            $('#go-back-step2').click();
        }
        //показать "Корзина пуста..." и скрыть корзину если список пуст
        $('#cart-list').each(function(){
            if( $(this).find('li').length == 0 ) {
                $('#cart-empty-text').show();
                hidecart();
            }
        });
    });

    // функция-счетчик строк в таблице, выводит номера строк в первой ячейке
    function calcTableRows() {
        var counter = 1; // создаем счетчик строк
        // обходим в цикле each все строки, где есть class="counter"
        $('#table-order-step3').find('.counter').each(function() {
            $(this).html(counter);	// добавляем counter
            counter++; // увеличиваем counter на 1
        });
    }

    // отключаем заголовок "Образец:" если список сканов пуст
    /*$(document).ready(function () {
        $('.scan-block').find('.scan').each(function() {            
            alert($(this.parentNode).html());
            if($(this).find('img')) {
            } else {
                $(this.parentNode).hide();
            }
        });
    });*/

    /* Страница "Рекомендуемые проверки" */
    
    var regionID = 1;
    
    /* переключатель регионов в рекомендуемых проверках */
    $('#recommended-checks-regions').find('input[name="recommended-checks-regions"]').change(function(){
        regionID = $(this).attr('region');
        $('.recommended-block').find('.region-tr').each(function(){
            var serviceRegionId = $(this).attr('region');
            //alert(' regionID='+regionID + ' serviceRegionId='+ serviceRegionId);
            if (serviceRegionId === regionID) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        calcTotalComplex();
    });
    

    // посчитать "Итого" в блоке комплекса
    function calcTotalComplex() {
        // обработать в цикле все блоки комплексов
        $('.recommended-block').each(function(){
            var total = 0;
            // внутри комплекса посчитать "Итого" у включенных "чекбоксов"
            $(this).find('.check-sum').each(function(){
                // проверяем, если строка не скрыта и атрибуты регионов совпадают
                if($(this).css('display') != 'none' && $(this.parentNode).attr('region') === regionID){
                    //alert($(this.parentNode).attr('region'));
                    // проверяем, включен ли "чекбокс"
                    if($(this.parentNode).find('input[type="checkbox"]').is(':checked')) {
                        total = parseFloat(total) + parseFloat($(this).html());
                        $(this).css({
                            'text-decoration':'none',
                            'opacity':'1',
                        });
                    } else {
                        $(this).css({
                            'text-decoration':'line-through',
                            'opacity':'0.7',
                        });
                    }                    
                }
            });
            // вывести "Итого"
            $(this).find('.check-sum-total').html(total);
            // если "Итого" = 0, заблокировать кнопку "Выбрать"
            if($(this).find('.check-sum-total').html() === '0') {
                $(this).find('.check-order-btn-block button').addClass('hidden');
            } else {
                $(this).find('.check-order-btn-block button').removeClass('hidden');
            }
        });
    }

    // пересчитать "Итого" комплексов при загрузке и обновлении страницы
    $(document).ready(function() {
        calcTotalComplex();
    });
    
    // при загрузке страницы установить регион "Москва"
    $(document).ready(function(){
        $('#recommended-checks-regions').find('#region-1').attr('checked', true).change();
    });

    // пересчитать "Итого" комплекса при клике на "чекбокс"
    $('.recommended-block').find('input[type="checkbox"]').change(function() {
        calcTotalComplex();
    });

    // обработчик нажатия на кнопку "Выбрать" в блоке комплекса
    var selectedComplexId = 0;  // глобальная переменная для хранения id выбранного комплекса
    $('.check-order-btn-block').on('click', 'button', function () {
        // получаем название текущего комплекса из <h3>
        var complexName = $(this.parentNode.parentNode).find('h3').html();
        // запоминаем id выбранного комплекса, для оформления заказа
        selectedComplexId = $(this.parentNode.parentNode).attr('complex');
        // делаем блок с формой заказа видимой
        $('#recommended-order-block').removeClass('hidden');
        // делаем меню "Навигация" невидимым
        $('#recommended-menu').addClass('hidden');
        // делаем невидимыми все комплексы, кроме выбранного
        $('.recommended-block').each(function(){
                if ($(this).find('h3').html() != complexName) {
                        $(this).hide();
                }
        });
        // изменяем заголовок h1
        $('#recommended').find('h1').html('<i class="fa fa-shopping-basket"></i> Ваш заказ:');
        // показываем ссылку "К выбору рекомендуемых проверок"
        $('#go-recommended-checks').removeClass('hidden');
        // прячем кнопку "Выбрать"
        $(this).hide();
    });

    /* вернуться в список рекомендуемых проверок 
            и восстановить отображение всех блоков по умолчанию
    */
    $('#go-recommended-checks').click(function(event) {
        // отключаем переход по ссылке по умолчанию
        event.preventDefault();
        // включаем в цикле все блоки комплексов и кнопки "Выбрать"
        $('.recommended-block').each(function(){
                $(this).show();
                $(this).find('.check-order-btn-block button').show();
        });
        //$('.check-order-btn-block').show();
        // изменяем заголовок h1
        $('#recommended').find('h1').html('Рекомендуемые проверки');
        // прячем блок "Как с вами связаться"
        $('#recommended-order-block').addClass('hidden');
        // прячем ссылку "К выбору рекомендуемых проверок" 
        $(this).addClass('hidden');
        // делаем меню "Навигация" видимым
        $('#recommended-menu').removeClass('hidden');
    });

    /* 
        делаем навигацию для комплексов. Навигация будет внутри страницы по
        якорям.	Для этого нужно каждому комплексу задать id.
        Создаем функцию, которая сработает сразу при загрузке документа.
        id будем создавать по шаблону recommended-block-1...2...3...
        Счетчик храним в переменной recommended-block-count.
        В функции в цикле перебираем все блоки recommended-block и 
        добавляем им атрибут (attr) id.
        Увеличиваем счетчик ++
    */
   $(function () {
        var recommendedBlockCount = 1;
        $('.recommended-block').each(function(){
            $(this).attr('id','recommended-block' + recommendedBlockCount);
            recommendedBlockCount++;
        });
    });
    /* если это страница complexes, то формируем меню Навигация */
    /* функция  goToAnchor() для правильной обработки переходов по якорям*/
    function goToAnchor(url) {
        location.href = url;
    }
    $(function () {
        var mainID = $('main').attr('page-id');
        if(mainID === 'complex'){
            $('#recommended-menu').removeClass('hidden');
            $('.recommended-block').each(function(){
                $('#recommended-menu').find('ol').append('<li>'
                        //+ '<a href="' + document.location.href + '#' + $(this).attr('id')
                        + '<a href="complexes#' + $(this).attr('id')  
                        + '" class="scrolling-links">' 
                        + $(this).find('h3').html() + '</a>'
                        + '</li>'
                );
            });
            // если в url есть # - получить анкор и перейти на него
            if(location.hash.length > 0) {
                var anchor = location.hash;
                var url = location.pathname + anchor;
                goToAnchor(url);
            }
        }
    });
    
    /* фукнция добавления подписки (ajax) */
    $('#subscribe-form').on('beforeSubmit', function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            success: function (res) {
                    $.gritter.add({
                        title: 'Подписка оформлена!',
                        text: 'Ваш email добавлен в базу подписчиков',
                        image: 'images/logo.png',
                        sticky: false,
                        time: '3000'
                    });
                $('#subscribe-form :input').val('');
                //console.log('res=' + res);
                return false;
            },
            error: function () {
                alert('При оформлении подписки произошла ошибка!');
            }
        });
    }).on('submit', function(e){
        e.preventDefault();
    });

    /* фукнция добавления заказа на услуги (ajax) */
    $('#order-service-form').on('beforeSubmit', function(e) {
        e.preventDefault();
        var order = {}; // создаем пустой объект для хранения позиций заказа
        var orderId = 1; // счетчик - он-же id заказа в объекте
        
        // проходим в цикле по таблице заказа
        $('#table-order-step3').find('.region-tr').each(function(){
            // получаем название услуги и цену
            var name = $(this).find('.service-name').html();
            var price = $(this).find('.sum').html();
            // сохраняем в объекте название услуги и цену
            order[orderId] = {};
            order[orderId]['name'] = name;
            order[orderId]['sum'] = price;
            // увеличиваем счетчик и переходим к следующему id заказа в объекте
            orderId++;

       });

        // сохраняем объект (все пункты заказа) в json
        var orderJson = JSON.stringify(order);
        // сохраняем json в cookie на 30 дней
        Cookies.set('addOrderItem', orderJson, { expires: 30 });
        
        // сохраняем заказ в базу ajax запросом
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            success: function (data) {
                $.gritter.add({
                        title: data + ', Ваш заказ получен!',
                        text: 'В ближайшее время мы свяжемся с вами',
                        image: 'images/logo.png',
                        sticky: false,
                        time: '3000'
                    });
               // получить имя клиента, чтобы показать в thank-you
                $('#thank-you h2 span').html( $('#client-name').val() + ',' );
                $('#services-checks-regions').find('#region-1').attr('checked', true).change();
                // скрыть блок "Как с вами связаться", если таблица пуста (сумма = 0)
                if( $('.step3-sum').html() == '0' && $('#sum').html() == '0' ) {
                    $('#go-back-step2').click();
                }
                //скрыть корзину если список пуст
                $('#cart-list').each(function(){
                    if( $(this).find('li').length == 0 ) {
                        $('#cart-empty-text').show();
                        hidecart();
                    }
                });
                // показать thank-you
                $('#thank-you').removeClass('hidden');
                // очистить поля формы
                $('#order-service-form :input').val('');

                return false;
            },
            error: function () {
                alert('При оформлении заказа произошла ошибка!');
            }
        });

        // 
        
        
    }).on('submit', function(e){
        e.preventDefault();
    });
    
    /* фукнция добавления комплексного заказа (ajax) */
    $('#order-complex-form').on('beforeSubmit', function(e) {
        e.preventDefault();
        
        var order = {}; // создаем пустой объект для хранения позиций заказа
        var orderId = 1; // счетчик - он-же id заказа в объекте
    
        // проходим в цикле по таблице заказа
        $('.recommended-block').find('.region-tr').each(function(){
            // проверяем, если строка не скрыта и атрибуты регионов совпадают
            if($(this).css('display') != 'none' && $(this).attr('region') === regionID){
                // проверяем, совпадают ли id услуги и id выбранного комплекса
                if($(this).attr('complex') == selectedComplexId) {
                    // проверяем - включен-ли чек-бокс у пункта заказа
                    if($(this).find('input[type="checkbox"]').is(':checked')) {
                        // получаем название услуги и цену
                        var name = $(this).find('.service-name').html();
                        var price = $(this).find('.check-sum').html();
                        // сохраняем в объекте название услуги и цену
                        order[orderId] = {};
                        order[orderId]['name'] = name;
                        order[orderId]['sum'] = price;
                        //alert(JSON.stringify(order[orderId]));
                        // увеличиваем счетчик и переходим к следующему id заказа в объекте
                        orderId++;
                    }
                }
            }
        });

        // сохраняем объект (все пункты заказа) в json
        var orderJson = JSON.stringify(order);
        // сохраняем json в cookie на 30 дней
        Cookies.set('addOrderItem', orderJson, { expires: 30 });
        //alert(Cookies.get('addOrderItem'));
        
        // сохраняем заказ в базу ajax запросом
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            success: function (data) {
                $.gritter.add({
                        title: data + ', Ваш заказ получен!',
                        text: 'В ближайшее время мы свяжемся с вами',
                        image: 'images/logo.png',
                        sticky: false,
                        time: '3000'
                    });
                // показать thank-you
                $('#thank-you').removeClass('hidden');
                // очистить поля формы
                $('#order-complex-form :input').val('');
                
                return false;
            },
            error: function () {
                alert('При оформлении заказа произошла ошибка!');
            }
        });
        
    }).on('submit', function(e){
        e.preventDefault();
    });

    // отключаем кнопку "Оформить заказ" если снят флажок у политики конфиденциальности
    $('.submit-block').find('input[type="checkbox"]').change(function () {
        if($(this).is(':checked')) {
            $(this.parentNode.parentNode.parentNode).find('button').attr('disabled',false);
        } else {
            $(this.parentNode.parentNode.parentNode).find('button').attr('disabled',true);
        }
    });
    $(function () {
        $('.submit-block').find('input[type="checkbox"]').change();
    });

    // инициализация lightbox
    $(function () {
        lightbox.option({
        'showImageNumberLabel': false
        });
    });

    // показываем индивидуальный комплекс для каждой услуги
    $(function () {
        var url = window.location.href;
        var services = url.split('/services');
        var pageId = url.split('=');
        if(services[1] && pageId[1]) {
            //alert(pageId[1]);
            function setBanner(p, complexID) {
                var banner = $('#recommended-order-banner');
                banner.find('p').html(p);
                banner.find('a').attr('href','complexes#recommended-block' + complexID);
            }
            switch (parseInt(pageId[1])) {
                case 1:
                    var p = 'Комплекс для ипотечной сделки';
                    setBanner(p, 7);
                    break;
                case 5:
                    var p = 'Комплекс экспресс-проверка объекта';
                    setBanner(p, 1);
                    break;
                default:
                    var p = 'Комплексная экспресс-проверка объекта';
                    setBanner(p, 1);
            }
        }
        
    });

    // меняем в комплексах для МО "История перехода права" на "История перехода права (технический вид)"
    $(function () {
        $('.recommended-block .region-tr').each(function() {
            let serviceName = $(this).find('.service-name').html();
            if (serviceName == 'История перехода права' && $(this).attr('region') == 2) {
                $(this).find('.service-name').html( serviceName + ' (технический вид)')
            }
        });
    });


    // заполняем блок "Стоимость услуги..." на странице единичной услуги
    $(function () {
        let pricesArr = [];
        let pricesObj = {};
        let regions = [];

        $('#services-checks-regions input[type="radio"]').each(function() {
            regions.push($(this).attr('region'));
            //console.log( 'region=' + $(this).attr('region') );
        });

        //console.log( 'regions=' + regions.toString() );
       
        $('.select-price option').each(function() {
            if( $(this).index() != 0 ) {
                pricesArr.push($(this).data('region') );
            }
            if( $(this).data('speed') && $(this).data('region') ) {
                //console.log( $(this).data('region') + ' = ' +  $(this).data('speed') + ' = ' + $(this).val() );
            }
            
        });
/*
        regions = Object.keys(regionsFiltered);
        console.log( 'regions filtered=' + regions );*/

        for(let i = 0; i < pricesArr.length; i++) {
            pricesObj[pricesArr[i]] = true;
        }

        pricesArr = Object.keys(pricesObj);
        
        //console.log( 'regions with prices=' + pricesArr.toString() );

        //let minArr = Math.min.apply(null, pricesArr);

        //console.log( 'minArr=' + minArr );

        /*$('#service-price-table').append($('<tr>')
        .append($('<td>').append("text1"))
        .append($('<td>').append("text2"))
        .append($('<td>').append("text3"))
        .append($('<td>').append("text4"))
        );*/

        // добавляем заголовки в таблицу с именами регионов
        /*$('#service-price-table').append('<tr id="tr-regions">');
        for(let i = 0; i < pricesArr.length; i++) {
            $('#services-checks-regions input[type="radio"]').each(function() {
                if( $(this).attr('region') == pricesArr[i] ) {
                    $('#service-price-table #tr-regions').append('<th class="text-center">'
                        + $(this).attr('region-name') +'</th>');
                    console.log( 'region=' + $(this).attr('region') + $(this).attr('region-name') );
                }
                
            });
        }*/
        // добавляем строки с ценами для регионов
        for(let i = 0; i < pricesArr.length; i++) {

            let regionName = '';
            let col = 12 / pricesArr.length;
            let priceItems = [];
            let items = '';

            $('#services-checks-regions input[type="radio"]').each(function() {
                if( $(this).attr('region') == pricesArr[i] ) {
                    regionName = $(this).attr('region-name');
                }
                
            });

            $('.select-price option').each(function() {
                if( $(this).index() != 0 && $(this).data('region') == pricesArr[i] ) {
                   if( $(this).data('speed') && $(this).data('region') ) {
                        priceItems.push($(this).data('speed') + ' ' + $(this).val() + ' руб.');
                        //console.log( $(this).data('region') + ' = ' +  $(this).data('speed') + ' = ' + $(this).val() );
                    }
                }
            });

            for(let i = 0; i < priceItems.length; i++) {
                items+= '<p>'  + priceItems[i] + '</p>'
            }

            $('#service-price-block')
                .append('<div class="col-md-' + col + '">'
                    + '<div class="item-service-price-block">'
                    + '<h4>' + regionName + '</h4><hr>'
                    + items
                    + '</div>'
                    + '</div>'
                );
        }


    });

    // не используется! реализовано в $('input[name="services-checks-regions"]').change
    // функция изменяет заголовок в сканах: Образец...Образцы... или скрывает заголовок, если образцов нет
    function changeScansHeader(region) {
        let scanCount = 0;
        let scanRegion = 1;
        $('.scan').each(function() {
            let scanRegionId = $(this).data('scanRegion');
            if ($(this).css('display') !== 'none' && scanRegionId === parseInt(region)) {
                scanCount++;
                console.log('count display none=' + scanCount);
            }
        });
        if( scanCount === 0) {
            $('.scan-block h4').hide()
        } else if ( scanCount === 1 ) {
            $('.scan-block h4').html('Образец:');
        } else {
            $('.scan-block h4').html('Образцы :');
        }
        console.log('scanCount=' + scanCount);
    }

    // закрываем окно "thank-you"
    $('#thank-you button').click(function() {
        $('#thank-you').addClass('hidden');
    });
    