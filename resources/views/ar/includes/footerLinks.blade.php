<script src="/js/main.min.js"></script>
<script src="/js/main2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
    $('.js-example-basic-single').select2();

    function redirectlang() {
        if ($('.js-example-basic-single').val() === 'en') {
            window.location.href = '/en';


        }
        else if ($('.js-example-basic-single').val() === 'fa') {
            window.location.href = '/';


        }
        else if ($('.js-example-basic-single').val() === 'ar') {

            window.location.href = '/ar';

        }
    }

    function redirectlang2() {
        var str = window.location.pathname;

        if ($('.redirectlang2').val() === 'en') {
            window.location.href = '/en';
        }
        else if ($('.redirectlang2').val() === 'fa') {
            window.location.href = '/';

        }
        else if ($('.redirectlang2').val() === 'ar') {

            window.location.href = '/ar';

        }
    }

    function redirectlang3() {
        var str = window.location.pathname;

        if ($('.redirectlang3').val() === 'en') {
            window.location.href = '/en';
        }
        else if ($('.redirectlang3').val() === 'fa') {
            window.location.href = '/';

        }
        else if ($('.redirectlang3').val() === 'ar') {

            window.location.href = '/ar';

        }
    }
</script>