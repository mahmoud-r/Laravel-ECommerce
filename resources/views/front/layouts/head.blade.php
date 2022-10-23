<head>


    <meta charset="utf-8">


    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{URL('images/logo'.'/'.Setting::get('site_favicon'))}}">


    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=yes">
    @yield('meta')


    <link rel="icon" type="image/vnd.microsoft.icon" href="/savemart/img/favicon.ico?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="/savemart/img/favicon.ico?1531456858">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>





    @if(LaravelLocalization::getCurrentLocale() == 'ar')

        <link rel="stylesheet" href="{{URL('design/front/css/ar.css')}}" type="text/css" media="all">
    @else
        <link rel="stylesheet" href="{{URL('design/front/css/en.css')}}" type="text/css" media="all">

    @endif
    <link rel="stylesheet" href="{{URL('design/front/fonts')}}/font-awesome-4.7.0/css/font-awesome.min.css">

    @yield('style')
    <style>
        #quantity_input{
            color: #000;
            background-color: #fff;
            height: 35px;
            padding: .175rem 1rem;
            width: 58px;
            font-size: 14px;
            border-color: #dfdfdf;
        }
        .product-quantity #quantity_input{
            color: #666;
            background-color: #fff;
            height: 43px;
            width: 140px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid #ebebeb;
            -webkit-border-radius: 43px;
            -moz-border-radius: 43px;
            -ms-border-radius: 43px;
            -o-border-radius: 43px;
            border-radius: 43px;
            z-index: 1;
            text-align: center;
        }
        .product-miniature .product-buttons .addToWishlist, .product-miniature .product-buttons .quick-product {
            width: 40px;
            height: 40px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
            line-height: 40px;
            background: #b5b5b5;
            display: inline-block;
            margin-left: 5px;
            margin-right: 5px;
            font-size: 14px;
            color: #fff;
            display: inline-block;
            text-align: center;
            position: relative;
            /*bottom: -36px;*/
            filter: alpha(opacity=0);
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            -webkit-opacity: 0;
            -moz-opacity: 0;
            -ms-opacity: 0;
            -o-opacity: 0;
            /*opacity: 0;*/
        }
        .product-miniature .product-buttons .quick-product {
            -webkit-transition: all 0.5s ease-in-out 0.3s;
            -moz-transition: all 0.5s ease-in-out 0.3s;
            -ms-transition: all 0.5s ease-in-out 0.3s;
            -o-transition: all 0.5s ease-in-out 0.3s;
            transition: all 0.5s ease-in-out 0.3s;
        }
        .list_search{
            float: left;
            list-style: none;
            margin-top: 0;
            padding: 21px;
            padding-top: 0;
            width: 95%;
            position: absolute;
            z-index: 100000;
            font-weight: bold;
            min-width: 400px;

        }
        .list_search li {
            padding: 10px;
            background: #fff;
            border-bottom: #bbb9b9 1px solid
        }
        .list_search li a:hover{
            color: black;
        }
        .list_search li:hover{
            background-color: #bbb9b9;
            color: black;
        }
        .product-miniature .product-buttons .quick-product:hover , .addToWishlist:hover{
            background: #2d9ae8;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -ms-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        .product-add-to-cart .addToWishlist {
            text-decoration: none;
            color: #666;
        }
        .product-add-to-cart .addToWishlist:hover {
            background: #2d9ae8;
            color: white;
            -webkit-transition: all 0.2s ease;
            -moz-transition: all 0.2s ease;
            -ms-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;

        }




    </style>




    <script type="text/javascript">
        var added_to_wishlist = "The product was successfully added to your wishlist.";
        var isLogged = false;
        var isLoggedWishlist = false;
        var loggin_required = "You must be logged in to manage your wishlist.";
        var prestashop = {"cart":{"products":[{"add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928","id":"2","attributes":{"Size":"S","Color":"Black"},"show_price":true,"weight_unit":"kg","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-60-brown-bear-printed-sweater.html#\/1-size-s\/11-color-black","canonical_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-brown-bear-printed-sweater.html","condition":false,"embedded_attributes":{"id_product_attribute":"60","id_product":"2","id_customization":null,"name":"Lorem ipsum dolor sit amet ege","description_short":"<p>Vestibulum varius, massa sed luctus ornare, enim arcu sollicitudin velit, in ornare ex mauris eleifend nibh. Quisque id rhoncus diam, eget elementum nisl. Nam lectus neque, dignissim sit amet efficitur ut, porta quis turpis. Pellentesque eget rutrum lacus, ut mollis nulla. Donec egestas metus tellus, et scelerisque arcu eleifend non. Nunc sit amet lorem placerat, scelerisque elit sit amet, rhoncus ex. Nulla congue libero sit amet laoreet bibendum. Nunc in magna lectus.<\/p>","available_now":"in stock","available_later":"out stock","id_manufacturer":"1","on_sale":"0","ecotax":"0.000000","price":"\u00a336.00","quantity":1,"link_rewrite":"brown-bear-printed-sweater","category":"smartphone-tablet","reference":"demo_3","minimal_quantity":"1","id_image":"2-29","reduction":0,"price_without_reduction":36,"specific_prices":[],"features":[],"attributes":{"Size":"S","Color":"Black"},"rate":20,"tax_name":"VAT UK 20%","ecotax_rate":"","customizable":"","online_only":"","new":"","condition":"","pack":"","price_amount":"\u00a336.00","quantity_wanted":"1"},"quantity_discounts":[],"reference_to_display":"demo_3","seo_availability":"https:\/\/schema.org\/InStock","labels":{"tax_short":"(tax incl.)","tax_long":"Tax included"},"ecotax":{"value":"\u00a30.00","amount":"0.000000","rate":""},"flags":[],"main_variants":[{"id_product_attribute":64,"texture":"","id_product":"2","name":"Red","id_attribute":"10","add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=64&token=28add935523ef131c8432825597b9928","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-64-brown-bear-printed-sweater.html#\/1-size-s\/10-color-red","type":"color","html_color_code":"#E84C3D"},{"id_product_attribute":60,"texture":"","id_product":"2","name":"Black","id_attribute":"11","add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-60-brown-bear-printed-sweater.html#\/1-size-s\/11-color-black","type":"color","html_color_code":"#434A54"},{"id_product_attribute":76,"texture":"","id_product":"2","name":"Blue","id_attribute":"14","add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=76&token=28add935523ef131c8432825597b9928","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-76-brown-bear-printed-sweater.html#\/1-size-s\/14-color-blue","type":"color","html_color_code":"#5D9CEC"},{"id_product_attribute":72,"texture":"","id_product":"2","name":"Brown","id_attribute":"17","add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=72&token=28add935523ef131c8432825597b9928","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-72-brown-bear-printed-sweater.html#\/1-size-s\/17-color-brown","type":"color","html_color_code":"#964B00"},{"id_product_attribute":68,"texture":"","id_product":"2","name":"Pink","id_attribute":"18","add_to_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?add=1&id_product=2&id_product_attribute=68&token=28add935523ef131c8432825597b9928","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/smartphone-tablet\/2-68-brown-bear-printed-sweater.html#\/1-size-s\/18-color-pink","type":"color","html_color_code":"#FCCACD"}],"id_product_attribute":"60","id_product":"2","cart_quantity":"1","id_customization":null,"name":"Lorem ipsum dolor sit amet ege","description_short":"<p>Vestibulum varius, massa sed luctus ornare, enim arcu sollicitudin velit, in ornare ex mauris eleifend nibh. Quisque id rhoncus diam, eget elementum nisl. Nam lectus neque, dignissim sit amet efficitur ut, porta quis turpis. Pellentesque eget rutrum lacus, ut mollis nulla. Donec egestas metus tellus, et scelerisque arcu eleifend non. Nunc sit amet lorem placerat, scelerisque elit sit amet, rhoncus ex. Nulla congue libero sit amet laoreet bibendum. Nunc in magna lectus.<\/p>","available_now":"in stock","available_later":"out stock","id_manufacturer":"1","manufacturer_name":"Lorem ipsum","on_sale":"0","price":"\u00a336.00","quantity":1,"link_rewrite":"brown-bear-printed-sweater","category":"smartphone-tablet","price_attribute":"0.000000","ecotax_attr":"0.000000","reference":"demo_3","ean13":"","isbn":"","upc":"","minimal_quantity":"1","id_image":"2-29","legend":"","reduction":0,"price_without_reduction":36,"specific_prices":[],"stock_quantity":86,"price_with_reduction":36,"price_with_reduction_without_tax":30,"total":"\u00a336.00","total_wt":36,"price_wt":36,"allow_oosp":0,"attributes_small":"S- Black","rate":20,"tax_name":"VAT UK 20%","remove_from_cart_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?delete=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928","up_quantity_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?update=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928&op=up","down_quantity_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?update=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928&op=down","update_quantity_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart?update=1&id_product=2&id_product_attribute=60&token=28add935523ef131c8432825597b9928","ecotax_rate":"","customizable":"","online_only":"","new":"","pack":"","price_amount":"\u00a336.00","quantity_wanted":"1","images":[{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":"1","id_image":"29","position":"1","associatedVariants":["60"]},{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/30-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":null,"id_image":"30","position":"2","associatedVariants":["60"]},{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/31-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":null,"id_image":"31","position":"3","associatedVariants":["60"]},{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/32-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":null,"id_image":"32","position":"4","associatedVariants":["60"]},{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/33-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":null,"id_image":"33","position":"5","associatedVariants":["60"]}],"cover":{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-small_default\/brown-bear-printed-sweater.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-home_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-cart_default\/brown-bear-printed-sweater.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-medium_default\/brown-bear-printed-sweater.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/29-large_default\/brown-bear-printed-sweater.jpg","width":600,"height":600},"legend":"","cover":"1","id_image":"29","position":"1","associatedVariants":["60"]},"has_discount":false,"discount_type":null,"discount_percentage":null,"discount_percentage_absolute":null,"discount_amount":null,"regular_price_amount":"\u00a336.00","regular_price":"\u00a336.00","discount_to_display":null,"unit_price_full":"","unit_price":"","show_availability":true,"availability_date":null,"availability_message":"in stock","availability":"available","customizations":[]}],"totals":{"total":{"type":"total","label":"Total","amount":36,"value":"\u00a336.00"},"total_including_tax":{"type":"total","label":"Total (tax incl.)","amount":36,"value":"\u00a336.00"},"total_excluding_tax":{"type":"total","label":"Total (tax excl.)","amount":30,"value":"\u00a330.00"}},"subtotals":{"products":{"type":"products","label":"Subtotal","amount":36,"value":"\u00a336.00"},"discounts":null,"shipping":{"type":"shipping","label":"Shipping","amount":0,"value":"Free"},"tax":null},"products_count":1,"summary_string":"1 item","vouchers":{"allowed":0,"added":[]},"discounts":[],"minimalPurchase":0,"minimalPurchaseRequired":""},"currency":{"name":"British Pound","iso_code":"GBP","iso_code_num":"826","sign":"\u00a3"},"customer":{"lastname":null,"firstname":null,"email":null,"birthday":null,"newsletter":null,"newsletter_date_add":null,"optin":null,"website":null,"company":null,"siret":null,"ape":null,"is_logged":false,"gender":{"type":null,"name":null},"addresses":[]},"language":{"name":"English (English)","iso_code":"en","locale":"en-US","language_code":"en-us","is_rtl":"0","date_format_lite":"m\/d\/Y","date_format_full":"m\/d\/Y H:i:s","id":1},"page":{"title":"","canonical":null,"meta":{"title":"Prestashop_Savemart","description":"Shop powered by PrestaShop","keywords":"","robots":"index"},"page_name":"index","body_classes":{"lang-en":true,"lang-rtl":false,"country-GB":true,"currency-GBP":true,"layout-full-width":true,"page-index":true,"tax-display-enabled":true},"admin_notifications":[]},"shop":{"name":"Prestashop_Savemart","logo":"\/savemart\/img\/prestashopsavemart-logo-1531456858.jpg","stores_icon":"\/savemart\/img\/logo_stores.png","favicon":"\/savemart\/img\/favicon.ico"},"urls":{"base_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/","current_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/","shop_domain_url":"https:\/\/demo.bestprestashoptheme.com","img_ps_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/","img_cat_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/c\/","img_lang_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/l\/","img_prod_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/","img_manu_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/m\/","img_sup_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/su\/","img_ship_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/s\/","img_store_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/st\/","img_col_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/co\/","img_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/img\/","css_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/css\/","js_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/js\/","pic_url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/upload\/","pages":{"address":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/address","addresses":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/addresses","authentication":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/login","cart":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart","category":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=category","cms":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=cms","contact":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/contact-us","discount":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/discount","guest_tracking":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/guest-tracking","history":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-history","identity":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/identity","index":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/","my_account":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/my-account","order_confirmation":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-confirmation","order_detail":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=order-detail","order_follow":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-follow","order":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order","order_return":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=order-return","order_slip":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/credit-slip","pagenotfound":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/page-not-found","password":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/password-recovery","pdf_invoice":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-invoice","pdf_order_return":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-order-return","pdf_order_slip":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-order-slip","prices_drop":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/prices-drop","product":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=product","search":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/search","sitemap":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/sitemap","stores":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/stores","supplier":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/supplier","register":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/login?create_account=1","order_login":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order?login=1"},"alternative_langs":{"en-us":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/","fr-fr":"https:\/\/demo.bestprestashoptheme.com\/savemart\/fr\/","es-es":"https:\/\/demo.bestprestashoptheme.com\/savemart\/es\/","it-it":"https:\/\/demo.bestprestashoptheme.com\/savemart\/it\/","pl-pl":"https:\/\/demo.bestprestashoptheme.com\/savemart\/pl\/","ar-sa":"https:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/"},"theme_assets":"\/savemart\/themes\/vinova_savemart\/assets\/","actions":{"logout":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/?mylogout="},"no_picture_image":{"bySize":{"cart_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-cart_default.jpg","width":125,"height":125},"small_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-small_default.jpg","width":150,"height":150},"medium_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-medium_default.jpg","width":210,"height":210},"home_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-home_default.jpg","width":600,"height":600},"large_default":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-large_default.jpg","width":600,"height":600}},"small":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-cart_default.jpg","width":125,"height":125},"medium":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-medium_default.jpg","width":210,"height":210},"large":{"url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-large_default.jpg","width":600,"height":600},"legend":""}},"configuration":{"display_taxes_label":true,"display_prices_tax_incl":true,"is_catalog":false,"show_prices":true,"opt_in":{"partner":true},"quantity_discount":{"type":"discount","label":"Discount"},"voucher_enabled":0,"return_enabled":0},"field_required":[],"breadcrumb":{"links":[{"title":"Home","url":"https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/"}],"count":1},"link":{"protocol_link":"https:\/\/","protocol_content":"https:\/\/"},"time":1662987222,"static_token":"28add935523ef131c8432825597b9928","token":"cad5fe8236d849a3b4023c4e5ca6a313"};
        var psr_icon_color = "#F19D76";
        var search_url = "https:\/\/demo.bestprestashoptheme.com\/savemart\/en\/search";
    </script>




    <script type="text/javascript">
        var baseDir = "/savemart/";
        var static_token = "28add935523ef131c8432825597b9928";
    </script>



    <style type="text/css">
        #main-site {background-color: #ffffff;}@media (min-width: 1200px) {.container {width: 1200px;}#header .container {width: 1200px;}.footer .container {width: 1200px;}#index .container {width: 1200px;}}
    </style>

</head>
