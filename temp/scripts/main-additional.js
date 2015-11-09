$(document).ready(function() {
	var screenNumber = 100;
	
	$( "a.pop-up-modal" ).each(function( index ) {
	
		$( this ).attr({
			"data-toggle" : "modal",
			"data-target" : "#screen" + (screenNumber+index)
		}).hover(
			function() {
				$( this ).css( "cursor", "pointer" );
			}, function() {
				$( this ).css( "cursor", "default" );
			}
		);
	
		if ($(this).find("img").height() > 0) {         
			$(this).find("img").css({
				"position" : "relative",
				"z-index" : "-1"
			});
			
			$(this).css({
				"border-bottom-width" : "0",
				"position" : "relative",
				"z-index" : "0"
			});
			
			$( this ).html($( this ).html() + '<img src="/wp-content/themes/planview-blog/assets/images/icon-pop-up-50x50.png" id="screenOverlay'+(screenNumber+index)+'" style="display:inline-block !important;" width="50" height="50" alt="">');			
	
			$( 'img#screenOverlay'+(screenNumber+index) ).css({
				"position" : "relative",
				"margin-left" : "-50px",
				"margin-top" : ($(this).find("img").height() - 50) + "px",
				"z-index" : "1"
			});
		}
	
		$( '<div id="screen'+(screenNumber+index)+'" class="modal fade text-center"><div class="modal-dialog" style="min-width: 80vw; max-width: 80vw; margin-left: auto; margin-right: auto;"><div class="modal-content"><div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button><h4 class="modal-title">'+$( this ).attr("title")+'</h4></div><div class="modal-body"><img class="img-responsive" src="'+$( this ).attr("data-href")+'" alt="'+$( this ).attr("title")+'" /></div><div class="modal-footer"><div class="row"><div class="col-md-2"></div><div class="col-md-8 text-center" style="margin-bottom:1em;">&copy; '+(new Date).getFullYear()+' Planview, Inc., All Rights Reserved.</div><div class="col-md-2 text-center"><button class="btn btn-default" type="button" data-dismiss="modal" style="margin:0 3em;">Close</button></div></div></div></div></div></div>' ).insertAfter( this );
	});
    
    $(".video").click(function () {
        $.fancybox({
            'padding': 0,
            'autoScale': false,
            'transitionIn': 'none',
            'transitionOut': 'none',
            'title': this.title,
            'width': 640,
            'height': 385,
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type': 'swf',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });
        return false;
    });

});
