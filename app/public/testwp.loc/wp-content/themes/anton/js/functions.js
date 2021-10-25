(function () {
    
    "use strict";
    
    jQuery(document).ready( function( $ ){
        /**
         * Scroll To Top
         */
        jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        }); 

        jQuery('.scrollup').on('click', function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
        /**********************************************************************
        * Login Ajax

        **********************************************************************/

        $('#pbrlostpasswordform').hide();
        $('#modalLoginForm form .btn-cancel').on('click', function(){  
            $('#modalLoginForm').modal( 'hide' );
            $('#modalLoginForm .alert').remove(); 
        } );

        // sign in proccess
        $('form.login-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: antonAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=pbrajaxlogin"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-danger">'+data.message+'</div>' );
                    }
                });
                return false; 
         } );

        //register
         $('form#opalrgtRegisterForm').on('submit', function() {
            var $this = $(this);
            $('.alert', this).remove();
            $.ajax({
                url: antonAjax.ajaxurl,
                type: 'POST',
                dataType: 'json',
                data: $(this).serialize() + "&action=opalajaxregister"
            }).done(function(data) {
                if (data.status == 1) {
                    $this.prepend('<div class="alert alert-info">' + data.msg + '</div>');
                    location.reload();
                } else {
                    $this.prepend('<div class="alert alert-warning">' + data.msg + '</div>');
                }
            });
            return false;
        });

          // lost password
        $('form.lostpassword-form').on('submit', function(){
                var $this= $(this);
                $('.alert', this).remove(); 
                $.ajax({
                  url: antonAjax.ajaxurl,
                  type:'POST',
                  dataType: 'json',
                  data:  $(this).serialize()+"&action=pbrajaxlostpass"
                }).done(function(data) {
                    if( data.loggedin ){
                        $this.prepend( '<div class="alert alert-info">'+data.message+'</div>' );
                        location.reload(); 
                    }else {
                        $this.prepend( '<div class="alert alert-danger">'+data.message+'</div>' );
                    }
                });
                return false; 
        } );

        $('form .toggle-links').on('click', function(){
            $('.form-wrapper').hide();
            $($(this).attr('href')).show(); 
            return false;
        } );

        //counter up
        if($('.counterUp').length > 0){
            $('.counterUp').counterUp({
                delay: 10,
                time: 800
            });
        }  

        //Gallery photo
        $("a[rel^='prettyPhoto[pp_gal]']").prettyPhoto({
            animation_speed:'normal',
            theme:'light_square',
            social_tools: false,
        }); 
        
        //Offcanvas Menu
        $('[data-toggle="offcanvas"], .btn-offcanvas').on('click', function () { 
            $('.row-offcanvas').toggleClass('active');
            $('#pbr-off-canvas').toggleClass('active');           
        });
  
        //Vertical Menu
        $('[data-toggle="vertical"], .btn-vertical').on('click', function () { 
            $('#pbr-off-vertical').toggleClass('open');           
        });
        /*---------------------------------------------- 
         *    Apply Filter        
         *----------------------------------------------*/
        jQuery('.isotope-filter li a').on('click', function(){
           
            var parentul = jQuery(this).parents('ul.isotope-filter').data('related-grid');
            jQuery(this).parents('ul.isotope-filter').find('li a').removeClass('active');
            jQuery(this).addClass('active');
            var selector = jQuery(this).attr('data-option-value'); 
            jQuery('#'+parentul).isotope({ filter: selector }, function(){ });
            
            return(false);
        });
        /**
         *
         */
        $(".dropdown-toggle-overlay").on('click', function(){ 
               $($(this).data( 'target' )).addClass("active"); 
        } ); 

         $(".dropdown-toggle-button").on('click', function(){ 
               $($(this).data( 'target' )).removeClass("active"); 
               return false;
        } ); 

        /** 
         * 
         * Automatic apply  OWL carousel
         */
        $(".owl-carousel-play .owl-carousel").each( function(){
            var config = {
                navigation : false, // Show next and prev buttons
                slideSpeed : 300,
                paginationSpeed : 400,
                pagination : $(this).data( 'pagination' ),
                autoHeight: false
             }; 
        
            var owl = $(this);
            if( $(this).data('slide') == 1 ){
                config.singleItem = true;
            }else {
                config.items = $(this).data( 'slide' );
            }
            if ($(this).data('desktop')) {
                config.itemsDesktop = $(this).data('desktop');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsDesktopSmall = $(this).data('desktopsmall');
            }
            if ($(this).data('desktopsmall')) {
                config.itemsTablet = $(this).data('tablet');
            }
            if ($(this).data('tabletsmall')) {
                config.itemsTabletSmall = $(this).data('tabletsmall');
            }
            if ($(this).data('mobile')) {
                config.itemsMobile = $(this).data('mobile');
            }
            $(this).owlCarousel( config );
            $('.left',$(this).parent()).on('click', function(){
                  owl.trigger('owl.prev');
                  return false; 
            });
            $('.right',$(this).parent()).on('click', function(){
                owl.trigger('owl.next');
                return false; 
            });
        } );

        //sync2-owl
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        sync1.owlCarousel({
            singleItem : true,
            navigation: $(sync1).data('navigation'),
            pagination: $(sync1).data('pagination'),
            afterAction : syncPosition,
            responsiveRefreshRate : 200,
        });
        sync2.owlCarousel({
            items : $(sync2).data('slide'),
            pagination:false,
            responsiveRefreshRate : 100,
            itemsDesktop        : $(sync2).data('desktop'),
            itemsDesktopSmall   : $(sync2).data('desktopsmall'),
            itemsTablet         : $(sync2).data('tablet'),
            itemsMobile         : $(sync2).data('mobile'),
            afterInit : function(el){
              el.find(".owl-item").eq(0).addClass("synced");
            }
        });
 
        function syncPosition(el){
            var current = this.currentItem;
            $("#sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced")
            if($("#sync2").data("owlCarousel") !== undefined){
                center(current)
            }
        }
 
        $("#sync2").on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
        });
 
        function center(number){
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for(var i in sync2visible){
                if(num === sync2visible[i]){
                    var found = true;
                }
            }

            if(found===false){
                if(num>sync2visible[sync2visible.length-1]){
                    sync2.trigger("owl.goTo", num - sync2visible.length+2)
                }else{
                    if(num - 1 === -1){
                        num = 0;
                    }
                    sync2.trigger("owl.goTo", num);
                }
            } else if(num === sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", sync2visible[1])
            } else if(num === sync2visible[0]){
                sync2.trigger("owl.goTo", num-1)
            }

        }
        
        $(".pbr-megamenu .dropdown-menu .container").removeClass().addClass("container-mega"); 

    /** Disable mouse scroll when focus gmap **/
    if($('.wpb_map_wraper').length >0){
        $('.wpb_map_wraper').on('click', function () {
            $('.wpb_map_wraper iframe').css("pointer-events", "auto");
        });

        $( ".wpb_map_wraper" ).mouseleave(function() { 
            $('.wpb_map_wraper iframe').css("pointer-events", "none"); 
        });
    }
    // hide ads
    $('.btn-action').on('click', function() {
        $('.ads').toggleClass('hidden-ads');
        var text = $(this).text();
        var show = $(this).data('show');
        var hide = $(this).data('hide');

        if ( text == show ) {
            text = hide;
        } else {
            text = show;
        }
        $(this).text( text );
        return false;
    });

    jQuery(window).load(function(){
        if($('#popupNewsletterModal').length >0){
            setTimeout(function(){
                var hiddenmodal = getCookie('hiddenmodal');
                if (hiddenmodal == "") {
                    jQuery('#popupNewsletterModal').modal('show');
                }
            }, 2000);
        }
    });
    jQuery(document).ready(function($){
        $('#popupNewsletterModal').on('hidden.bs.modal', function () {
            setCookie('hiddenmodal', 1, 30);
        });
    });

    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;
        
        var caret = this.el.find('.caret');
        caret.on('click',
                        { el: this.el, multiple: this.multiple },
                        this.dropdown);
    };
      
    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el,
            $this = $(this),
            $next = $this.next();
        
        $next.slideToggle();
        $this.parent().toggleClass('active');
        
        if(!e.data.multiple) {
          $el.find('.dropdown-menu').not($next).slideUp().parent().removeClass('active');
        }
    }
      
    var accordion = new Accordion($('.navbar-nav'), false);

    } );    
} )( jQuery );

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
} 