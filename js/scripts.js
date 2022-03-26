$(function() {
    // Aqui vai todo nosso código de javascript
    $('nav.mobile').click(function() {
        var listaMenu = $('nav.mobile ul');

        if (listaMenu.is(':hidden')) {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fas fa-bars');
            icone.addClass('fas fa-times');
            listaMenu.fadeIn();
        } else {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fas fa-times');
            icone.addClass('fas fa-bars');
            listaMenu.fadeOut();
        }
    });

    if ($('target').length > 0) {
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll},2000);
    }

    carregarDinamico();

    function carregarDinamico() {
        $('[realtime]').click(function() {
            var pagina = $(this).attr('realtime');
            $('.container-principal').hide();
            $('.container-principal').load(include_path+'pages/'+pagina+'.php');
            $('footer').css('bottom','0');
            $('footer').css('position','fixed');
            $('footer').css('width','100%');
            $('.container-principal').fadeIn();
            window.history.pushState('','',pagina);
            return false;
        });
    }

});