var url = 'http://proyecto-blog.com.devel';
window.addEventListener("load", function () {

    $('.btn-star').css('cursor', 'pointer');

    $('.btn-disstar').css('cursor', 'pointer');

    //boton star
    function star() {
        $('.btn-star').unbind('click').click(function () {
            console.log('star');
            $(this).addClass('btn-disstar').removeClass('btn-star');
            $(this).attr('src',url+'/img/pear-green.png');
            $.ajax({
                url: url + '/star/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {

                    if (response.star) {

                        console.log('has dado like a la publicacion');
                    } else {
                        console.log('ERROR');

                    }
                }


            });
            disstar();
        });
    }
    star();

    function disstar() {
        $('.btn-disstar').unbind('click').click(function () {
            console.log('disstar');
            $(this).addClass('btn-star').removeClass('btn-disstar');
            $(this).attr('src', url+'/img/pear-gray.png');
            
            $.ajax({
                url: url + '/disstar/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {

                    if (response.star) {

                        console.log('has dado dislike a la publicacion');
                    } else {
                        console.log('ERROR');

                    }
                }


            });
            star();
        });
    }
    disstar();
});


