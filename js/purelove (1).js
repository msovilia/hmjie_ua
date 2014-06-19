
jQuery(document).ready(function() {

/*----------------------------------------------------*/
/*	Main Navigation
/*----------------------------------------------------*/

	/* Menu */
	var ddmenuitem = 0;
	function jsddm_open()
	{  jsddm_close();
	   ddmenuitem = $(this).find('ul.submenu').css('display', 'block');
	}
	function jsddm_close()
	{  
	 if(ddmenuitem) ddmenuitem.css('display', 'none');
	}
	$(document).ready(function()
		{  
	   		$('#topnav > ul > li').bind('click', jsddm_open)
	   		$('#topnav > ul > li > a').click(function(){
	   		if ($(this).attr('class') != 'active'){
	   		$('#topnav > ul > li > a').removeClass('active');
	   		$(this).addClass('active');
	   	}
	 	});
			$('#topnav ul li > ul > li > a').click(function(){
	   		if ($(this).attr('class') != 'active'){
	   		$('#topnav ul li > ul > li > a').removeClass('active');
	   		$(this).addClass('active');
	   	}
	 	});
	});
	
	/* Responsive Menu */
	domready(function(){
			
		selectnav('nav', {
			label: 'Menu',
			nested: true,
			indent: '-'
		});
				
	});

/*----------------------------------------------------*/
/*	Fancybox
/*----------------------------------------------------*/

	$("a[rel=gallery1]").fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'none',
		'titleShow'			:  true
	});
	$("a[rel=gallery2]").fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'none',
		'titleShow'			:  true
	});
	$("a[rel=gallery3]").fancybox({
		'transitionIn'		: 'fade',
		'transitionOut'		: 'none',
		'titleShow'			:  true
	});


/*----------------------------------------------------*/
/*	Accordion
/*----------------------------------------------------*/
	(function() {

		var $container = $('.acc-container'),
			$trigger   = $('.acc-trigger');

		$container.hide();
		$trigger.first().addClass('active').next().show();

		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		
		$trigger.on('click', function(e) {
			if( $(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				$(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});

		// Resize
		$(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});

	})();

	
/*----------------------------------------------------*/
/*	Tabs
/*----------------------------------------------------*/

	(function() {

		var $tabsNav    = $('.tabs-nav'),
			$tabsNavLis = $tabsNav.children('li'),
			$tabContent = $('.tab-content');

		$tabsNav.each(function() {
			var $this = $(this);

			$this.next().children('.tab-content').stop(true,true).hide()
												 .first().show();

			$this.children('li').first().addClass('active').stop(true,true).show();
		});

		$tabsNavLis.on('click', function(e) {
			var $this = $(this);

			$this.siblings().removeClass('active').end()
				 .addClass('active');
			
			$this.parent().next().children('.tab-content').stop(true,true).hide()
														  .siblings( $this.find('a').attr('href') ).fadeIn();

			e.preventDefault();
		});

	})();


/*----------------------------------------------------*/
/*	Isotope Portfolio Filter
/*----------------------------------------------------*/

	$(function() {
		var $container = $('#portfolio-wrapper');
				$select = $('#filters select');
				
		// initialize Isotope
		$container.isotope({
		  // options...
		  resizable: false, // disable normal resizing
		  // set columnWidth to a percentage of container width
		  masonry: { columnWidth: $container.width() / 12 }
		});

		// update columnWidth on window resize
		$(window).smartresize(function(){
		  $container.isotope({
			// update columnWidth to a percentage of container width
			masonry: { columnWidth: $container.width() / 12 }
		  });
		});
		
		
      $container.isotope({
        itemSelector : '.portfolio-item'
      });
	  
	$select.change(function() {
			var filters = $(this).val();
	
			$container.isotope({
				filter: filters
			});
		});
      
      var $optionSets = $('#filters .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
});

/* End Document */
});
