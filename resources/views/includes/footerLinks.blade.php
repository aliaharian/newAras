<script src="/js/main.min.js"></script>
<script src="/js/main2.min.js"></script>
<script type="text/javascript">
    function deleteorder(t) {
        $body = $("body"), console.log("aaa");
        var o = t;
        $(document).on({
            ajaxStart: function () {
                $body.addClass("loading")
            }, ajaxStop: function () {
                $body.removeClass("loading")
            }
        }), jQuery.ajax({
            url: "{{ route('deleteFromCart') }}?timestamp=" + new Date() * 1000,
            method: "post",
            beforeSend: function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            data: {pre_order_id: o},
            success: function (t) {
                $(".header-wrapicon2 ").html(t)
            }
        }), swal("محصول مورد نظر", "با موفقیت از سبد خرید حذف شد", "warning")
    }

    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $("#dropDownSelect1")
    })
    //     $(".addtocart").each(function () {
    //     $(this).on("click", function () {
    //         swal("محصول مورد نظر", "به سبد خرید افزوده شد", "success")
    //     })
    // })
        , $(".addtocartfake").each(function () {
        $(this).on("click", function () {
            swal("ابتدا رنگ و سایز", "مورد نظر خود را انتخاب کنید", "error")
        })
    }), $(".block2-btn-addwishlist").each(function () {
        var t = $(this).parent().parent().parent().find(".block2-name").html();
        $(this).on("click", function () {
            swal({title: t, text: "به لیست علاقمندی های شما اضافه شد", icon: "success", button: "تایید"})
        })
    }), jQuery(document).ready(function () {
        jQuery(".header-cart-item-delete").click(function (t) {
            $body = $("body");
            var o = this.id;
            $(document).on({
                ajaxStart: function () {
                    $body.addClass("loading")
                }, ajaxStop: function () {
                    $body.removeClass("loading")
                }
            }), jQuery.ajax({
                url: "{{ route('deleteFromCart') }}",
                method: "get",
                data: {pre_order_id: o},
                success: function (t) {
                    $(".header-wrapicon2 ").html(t)
                }
            })
        })
    }), $(".header-cart-item-delete").each(function () {
        $(this).on("click", function () {
            swal("محصول مورد نظر", "با موفقیت از سبد خرید حذف شد", "warning")
        })
    }), jQuery(document).ready(function () {
        jQuery(".block2-btn-addwishlist").click(function (t) {
            $body = $("body");
            var o = this.id;
            $(document).on({
                ajaxStart: function () {
                    $body.addClass("loading")
                }, ajaxStop: function () {
                    $body.removeClass("loading")
                }
            }), jQuery.ajax({
                url: "{{ route('addToWishlist') }}",
                method: "get",
                data: {product_id: o},
                success: function (t) {
                    console.log("added to wishlist")
                }
            })
        })
    });
</script>
<script src="/js/bootstrap.min.js"></script>
<script>
    function redirectlang() {
        "en" === $(".js-example-basic-single").val() ? window.location.href = "/en" : "fa" === $(".js-example-basic-single").val() ? window.location.href = "/" : "ar" === $(".js-example-basic-single").val() && (window.location.href = "/ar")
    }

    function redirectlang2() {
        "en" === $(".redirectlang2").val() ? window.location.href = "/en" : "fa" === $(".redirectlang2").val() ? window.location.href = "/" : "ar" === $(".redirectlang2").val() && (window.location.href = "/ar")
    }

    function redirectlang3() {
        "en" === $(".redirectlang3").val() ? window.location.href = "/en" : "fa" === $(".redirectlang3").val() ? window.location.href = "/" : "ar" === $(".redirectlang3").val() && (window.location.href = "/ar")
    }

    $(".js-example-basic-single").select2();
</script>
<script src="/packages/owl/owl.carousel.min.js"></script>

<!--for owl carousel-->
<script>
    jQuery(function ($) {
        $(".owl-carousel").owlCarousel({
            loop: true,
            center: true,
            items: 4,
            nav: true,
            smartSpeed: 1000,
            responsive: {
                // breakpoint from 0 up
                0: {
                    items: 1,
                },
                300: {
                    items: 2,
                },
                // breakpoint from 480 up
                950: {
                    items: 4,

                },

            }
        });


    });

    jQuery(document).ready(function ($) {
        $(function () {
            let flag = true;
            document.addEventListener("scroll", () => {
                if (window.scrollY > 1000 && flag) {
                    $("#logosFooter").append(`<a referrerpolicy='origin' target='_blank'
                   href='https://trustseal.enamad.ir/?id=110429&Code=e7SeT3eDdwJ6yfldVd0AGqagD0oKLmeu'><img
                        referrerpolicy='origin'
                        src='https://trustseal.enamad.ir/logo.aspx?id=110429&Code=e7SeT3eDdwJ6yfldVd0AGqagD0oKLmeu'
                        alt='' style='cursor:pointer;max-width: 100%;' Code='e7SeT3eDdwJ6yfldVd0AGqagD0oKLmeu'></a>
                <img referrerpolicy='origin' id='rgvjfukzfukzfukzjxlzrgvj' style='cursor:pointer;max-width: 100%;'
                     onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=366613&p=xlaogvkagvkagvkarfthxlao", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                     alt='logo-samandehi'
                     src='https://logo.samandehi.ir/logo.aspx?id=366613&p=qftiwlbqwlbqwlbqnbpdqfti'/>`);
                    flag = false;

                }
            })
        });
    });
</script>
