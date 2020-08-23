(function($){
	"use strict";

	var fx = TweenMax;
	var tl = TimelineMax;

	$(document).ready(function(){

/**
 * Pétales
 **/
        var vie = $('#vie-ae');
        var menu = vie.find('.menu');

        var slides = vie.find('.slides .slide');

        vie.find('.menu .item').click(function(){
            slides.hide();
            vie.find('#slide-' + $(this).attr('id').split('-')[1]).show();
            menu.find('.courant').removeClass('courant');
            $(this).addClass('courant');
        });

/**
 * Vote
 **/
        $('.vote-for').addClass('loading').each(function(){

            var item = $(this);
            var id = $(this).data('vote');

            var txt = $(this).find('.label');
            var num = $(this).find('.num');
            var like = $(this).find('.count .fa');
            var vote = $(this).find('.info .fa');
            var info = $(this).find('.info');

            var liked = function () {

                vote.attr('class', 'fa fa-check');
                info.addClass('voted').bind(
                    'hover',
                    function (){

                        vote.attr('class', 'fa fa-times');
                    },
                    function (){

                        vote.attr('class', 'fa fa-check');
                    }
                );
            }
            var likable = function () {

                info.removeClass('voted').unbind('hover');
                vote.attr('class', 'fa fa-star-o');
            }

            // change picto
            $.post(
                ajaxurl,
                {
                    action : 'uae_vote',
                    vote : 'check',
                    id : id,
                    event : 'audace2015'
                },
                function(data){

                    if(typeof data == 'object' && typeof data.votes == 'number') {

                        // remove loading
                        item.removeClass('loading');

                        // ajouter le nombre de votes
                        num.text(data.votes);

                        // changer le picto
                        like.attr('class', 'fa fa-thumbs-o-up');

                        // déja voté pour cette personne
                        if(data.voted) {

                            liked();
                        }

                        // action de click
                        info.click(function(){

                            vote.attr('class', 'fa fa-spinner fa-pulse');

                            if(info.hasClass('voted')) {

                                $.post(
                                    ajaxurl,
                                    {
                                        action : 'uae_vote',
                                        vote : 'unlike',
                                        id : id,
                                        event : 'audace2015'
                                    },
                                    function(data){

                                        if(data.validation) {

                                            num.text(parseInt(num.text())-1);
                                            likable();
                                        }
                                    },
                                    'json'
                                );
                            } else {

                                 $.post(
                                    ajaxurl,
                                    {
                                        action : 'uae_vote',
                                        vote : 'like',
                                        id : id,
                                        event : 'audace2015'
                                    },
                                    function(data){

                                        if(data.validation) {

                                            num.text(parseInt(num.text())+1);
                                            liked();
                                        }
                                    },
                                    'json'
                                );
                            }
                        })
                    }
                },
                'json'
            );
        })
/**
 *  Cosm. form
 **/
        // check mask
        if($('.wpcf7-form .hide-pwd').find('input').is(':checked')) {

            $('.wpcf7-form .password').find('input').attr('type', 'password');
        }

        // bind
        $('.wpcf7-form .hide-pwd').parent().click(function(){

            var pwd = $('.wpcf7-form .password').find('input');
            switch(pwd.attr('type')) {

                case 'text':
                    pwd.attr('type', 'password');
                break;
                case 'password':
                    pwd.attr('type', 'text');
                break;
            }
        });
	});

})(jQuery);
