// JavaScript Document

$(function(){
    if(location.protocol == 'file:'){
        
        $.fn.changeGmapApi = function(){
            $('body').find('iframe[src*="google.com/maps/"]').parent().addClass('wc_googleMap').each(function(){
                var mapframe = $(this).children('iframe'),
                    mapW = $(mapframe).attr('width'),
                    mapH = $(mapframe).attr('height');
                $(this).children('iframe').replaceWith('<span class="wc_addGoogleMap_span">Googlemapが配置されています。' + '縦：' + mapH + '横：' + mapW + '</span>');
                $(this).find('.wc_addGoogleMap_span').css({
                    width: mapW,
                    height: mapH,
                    padding: 0,
                    boxSizing: 'border-box',
                    display: 'block'
                }).append('<span class="wc_addGoogleMap_span_border">');
                $('.wc_googleMap').css({
                    position: 'relative',
                    display: 'block'
                });
                $('.wc_addGoogleMap_span_border').css({
                    border: 'solid 1px #ddd',
                    position: 'absolute',
                    top: 0,
                    left: 0,
                    zIndex: 0,
                    width: mapW - 2,
                    height: mapH - 2,
                    display: 'block'
                });
            });
        };

        $.fn.changeYoutubeApi = function(){
            $('body').find('iframe[src*="youtube"]').parent().addClass('wc_youtube');
            $('.wc_youtube iframe').replaceWith('<span class="wc_addYoutube_span">Youtubeが配置されています。</span>');
        };

        $.fn.facebookNon = function(){
            $('#facebook img').replaceWith('<span class="wc_facebook_span"></span>');
        };

        

        $('#container').changeYoutubeApi();
        $('#container').changeGmapApi();
        $('#container').facebookNon();


            /* .wrap('div.youtube');
            $('.youtube').html('YouTubeが埋め込まれています。'); */
    }
});

    var WG_LOAD_FUNC = function(e){
        (function($){
            $(function(){

                var wcfunc = function(){
                    $('a').click(function(){
                        return false;
                    });

                    $('#container').changeYoutubeApi();
                    $('#container').changeGmapApi();
                    $('#container').facebookNon();
            
            //$(function(){
                //if(location.protocol != 'file:'){
                    //$('iframe[src*="https://youtube"]').remove();
                    //$('iframe').remove();
                //}
            //});
        
                };

        if(e === 0){ //内容変更
            wcfunc();
            /* setTimeout(function(){
                $('.rightbox').each(function(){
                    $(this).has('iframe').children('span').html('googlemapが配置されています。ダブルクリックすると編集画面になります。');
                });
            }, 3000); */
            
        }
        else if(e == 1){ //エリア編集
            wcfunc();
        }
        else if(e == 2){ //エリア選択
            wcfunc();
            
        }


        });
        })(jQuery);
    };


    
    




/*  ============================  */



