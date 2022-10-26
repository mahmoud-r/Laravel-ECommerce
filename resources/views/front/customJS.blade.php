<script type="text/javascript">
    // get GetCategories
    $(function () {
    $.ajax({
        url: '{{route('GetCategories')}}',
        type: 'GET',
        success: function (response) {
            $('#verticalmenu').html(response.categories);
            $('#category_center').html(response.category_center);

        },
        error: function (response) {
            console.log(response.errors)
        }
    });

});

    // get brands
    $(function () {
    $.ajax({
        url: '{{route('GetBrands')}}',
        type: 'GET',
        success: function (response) {
            $('.footer-brand').html(response.Brands);
            $("#manufacture283037401").owlCarousel({
                loop:true,
                margin:30,
                items:6,
                autoplay:true,
                autoplayTimeout :6000,
                dots :false,
                nav :false,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:6
                    }
                }
            })
        },
        error: function (response) {
            console.log(response.errors)
        }
    });

});

    // add to card
    $(function () {
    $(".addCart").submit(function (e) {
        e.preventDefault()
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            url: actionUrl,
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                $('.count').text(response.count)
                $('.countInCart').text('There are ' + response.countInCart + ' items in your cart')
                $('.total').text(response.total)
                $('.sub-total').text(response.subtotal)
                $('#cart_block').html(response.html);
                $('#blockcart-modal').html(response.success);
                $('#blockcart-modal').modal('show');
            },
            error: function (response) {
                console.log(response.errors)
            }
        });

    });
});

    // remove cart
    $(function () {
    $(".remove-from-cart").click(function (e) {
        e.preventDefault()
        var item = $(this).attr('data-item-id');

        var actionUrl = '{{route('cart.remove')}}';
        $.ajax({
            url: actionUrl,
            type: 'GET',
            data: {'item': item},
            success: function (response) {
                $('[data-item = "' + item + '"]').remove()
                $('.remove-cart-alert').show()
                $('.total').text(response.total)
                $('.sub-total').text(response.subtotal)
                $('.count').text(response.count)
                $('.countInCart').text('There are ' + response.countInCart + ' items in your cart')
                $('#cart_block').html(response.html);


            },
            error: function (response) {
                console.log(response.errors)
            }
        });
    });
});

    // update cart
    $(function () {
    $(".quantity_update").change(function (e) {
        e.preventDefault()
        var quantity = $(this).val()
        var item = $(this).attr('data-item-id');
        var actionUrl = '{{route('cart.update')}}';


        $.ajax({
            url: actionUrl,
            type: 'post',
            data: {"_token": "{{ csrf_token() }}", 'item': item, 'quantity': quantity},
            success: function (response) {
                $('.count').text(response.count)
                $('.countInCart').text('There are ' + response.countInCart + ' items in your cart')
                $('.alert alert-success').show()
                $('.total').text(response.total)
                $('.total' + item).text(response.totalItem)
                $('.sub-total').text(response.subtotal)
                $('#quantity' + item).val(response.quantity)
                $('#cart_block').html(response.html);

            },
            error: function (response) {
                console.log(response.errors)
            }
        });

    });
});

    // quick view product
    $(function () {
    $(".quick-product").click(function (e) {
        e.preventDefault()

        var id = $(this).attr('data-product-id');
        var actionUrl = '{{route('GetProductBYid')}}';


        $.ajax({
            url: actionUrl,
            type: 'GET',
            data: {'id': id},
            success: function (response) {
                console.log(response)
                $('#quick-product').html(response.product);
                $('#quick-product').modal('show')

            },
            error: function (response) {
                console.log(response.errors)
            }
        });

    });
});

    // search
    $(function () {
    $("#search_input").bind('click keyup', function (e) {
        e.preventDefault()
        var search = $(this).val()
        var actionUrl = '{{route('search')}}';

        $.ajax({
            url: actionUrl,
            type: 'GET',
            data: {'search': search},
            success: function (response) {
                $('.list_search').html(response.products);
                $('.list_search').show();

                if (response.products === 'empty') {
                    $('.list_search').hide()
                }

            },
            error: function (response) {
                console.log(response.errors)
            }
        });

    });

    $(document).on('click', function () {
    $('.list_search').hide()
});
});


    // add To Wishlist
    $(function () {
    $(".addToWishlist").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('data-product-id');
        var actionUrl = '{{route('wishlist.store')}}';
        $.ajax({
            url: actionUrl,
            type: 'post',
            data: {"_token": "{{ csrf_token() }}", 'id': id},
            success: function (response) {
                $('#wishlist-modal .modal-body').html('<i class="fa fa-check-square-o" style="color: green;font-size: 16px"></i>' + response.success)
                $('#wishlist-modal').modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError,response) {
                if(xhr.status === 401){
                    $('#wishlist-modal .modal-body').html(' You must be logged in to manage your wishlist..')
                    $('#wishlist-modal').modal('show');
                }
            }
        });

    });
});

    // remove from Wishlist
    $(function () {
    $(".remove-from-wishlist").click(function (e) {
        e.preventDefault()
        var item = $(this).attr('data-item-id');

        var actionUrl = '{{route('wishlist.remove')}}';
        $.ajax({
            url: actionUrl,
            type: 'GET',
            data: {'id': item},
            success: function (response) {
                $('[data-item = "' + item + '"]').remove()
                $('.remove-wishlist-alert').show();
            },
            error: function (response) {
                console.log(response.errors)
            }
        });
    });
});

    $(".quantity_input").TouchSpin({
    verticalbuttons: !0
    , verticalupclass: "material-icons touchspin-up ",
    verticaldownclass: "material-icons touchspin-down",
    buttondown_class: "btn btn-touchspin js-touchspin",
    buttonup_class: "btn btn-touchspin js-touchspin ",
    min: $("#quantity_input").attr('main'),
    max: parseInt($("#quantity_input").attr("max")),

})
    $(".quantity_update").TouchSpin({
    verticalbuttons: !0
    , verticalupclass: "material-icons touchspin-up ",
    verticaldownclass: "material-icons touchspin-down",
    buttondown_class: "btn btn-touchspin js-touchspin",
    buttonup_class: "btn btn-touchspin js-touchspin ",
    min: $(".quantity_update").attr('main'),
    max: parseInt($(".quantity_update").attr("max")),

})

    //product  review

    $(function () {
    $("#new_review").submit(function (e) {
        e.preventDefault()
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            url: actionUrl,
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                // $('.count').text(response.count)
                // $('.countInCart').text('There are ' + response.countInCart + ' items in your cart')
                // $('.total').text(response.total)
                // $('.sub-total').text(response.subtotal)
                // $('#cart_block').html(response.html);
                console.log(response.success)
                $('#new_comment_form').modal('hide');
                $('#ReviewComplite').modal('show');
                // document.getElementById("lala").scrollIntoView( )
                // $('body').scrollTo('#lala')
            },
            error: function (response) {
                console.log(response.errors)
            }
        });

    });
});
    $('#readrewview').on('click', function (e) {
    e.preventDefault()
    $('a[href="#description"]').removeClass('active')
    $('a[href="#reviews"]').addClass('active')
    $('#description').removeClass('active in')
    $('#reviews').addClass('active in')
    document.getElementById("product-detail-middle").scrollIntoView({
    behavior: "smooth",
    block: "start",
    inline: "start"
})

})

</script>
