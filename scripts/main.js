( function () {


	/**
	*	"Аккордеоны"
	*/

		
	function toggle( e ) {
		e.preventDefault();
		var $heading = jQuery( this ),
			$section = $heading.parent( '.accordio__listitem' ),
			$content = $heading.siblings( '.listitem__content' );
		if ( $section.hasClass( 'active' ) ) {
			$section.removeClass( 'active' );
			$content.slideUp();
		} else {
			$section.addClass( 'active' );
			$content.slideDown();
		}

	}

	function add_section( el, image ) {
		var $panel,
			$content,
			$section;
		$section = jQuery( '<div>', { 'class': 'accordio__listitem listitem', 'role': 'listitem' } );
		$panel = jQuery( '<div>', { 'class': 'listitem__panel panel', click: toggle } );
		if ( image ) jQuery( '<div>', { 'class': 'thumbnail' } )
			.append( image.attr( 'class', 'lazy' ) )
			.appendTo( $panel );
		el.attr( 'class', 'title' ).appendTo( $panel );
		$content = jQuery( '<div>', { 'class': 'listitem__content content' } ).css( 'display', 'none' );
		$section.append( $panel );
		$section.append( $content );
		return $section;
	}


	function build( index, accordio ) {
		var $accordio = jQuery( accordio ),
			selector = $accordio.attr( 'data-heading' ),
			$section;
		$accordio.children().each( function( i, el ) {
			var  $el = jQuery( el );
			if ( $el.is( selector ) ) {
				$section = add_section( $el, false );
				$accordio.append( $section );
			} else {
				if ( $el.is( '.heading' ) && $el.find( selector ).length > 0 ) {
					$section = add_section( $el.find( '.title' ), $el.find( 'img.heading__thumbnail' ) );
					$el.remove();
					$accordio.append( $section );
				} else {
					if ( $section != undefined ) $el.appendTo( $section.children( '.content' ).eq( 0 ) );
				}
			}
		} );
	}

	jQuery( '.accordio[ data-heading ]' ).each( build );


} )();
jQuery.each( [ 'pdf', 'doc', 'xls', 'zip', 'ppt', 'odt', 'psd' ], function( i, type ) {
	var selector;
	switch( type ) {
		case 'doc':
			selector = 'a[href$=".doc"], a[href$=".docx"], a[href$=".docm"], a[href$=".rtf"]';
			break;
		case 'xls':
			selector = 'a[href$=".xls"], a[href$=".xlsx"], a[href$=".ods"], a[href$=".csv"], a[href$=".xlsm"]';
			break;
		case 'zip':
			selector = 'a[href$=".zip"], a[href$=".rar"], a[href$=".7z"]';
			break;
		case 'ppt':
			selector = 'a[href$=".ppt"], a[href$=".pptx"], a[href$=".odp"], a[href$=".pptm"]';
			break;
		default:
			selector = 'a[href$=".' + type + '"]';
			break;
	}
	jQuery( selector ).each( function ( index, element ) {
		var $link = jQuery( element );
		if (
			$link.find( '.file, .file-' + type ).length < 1 &&
			! $link.hasClass( 'no-file-icon' ) &&
			! $link.hasClass( 'button' ) &&
			! $link.hasClass( 'btn' ) &&
			! $link.hasClass( 'wp-block-file__button' ) &&
			$link.children( 'img' ).length < 1
		) {
			$link.prepend( jQuery( '<span>', {
				class: 'file file-' + type
			} ) );
		}
	} );
} );


/* Навигационное меню */
jQuery( document ).ready( function () {


	var $body = jQuery( 'body' ),
		$burgers = jQuery( '.navtoggle' ),
		$nav = jQuery( '#nav' ),
		$mobilenav = jQuery( '#mobilenav' ),
		$wrapper = jQuery( '#wrapper' ),
		$list = jQuery( '#nav-list' ).clone().removeClass().appendTo( $mobilenav );

	function NavToggle() {
		if ( $body.attr( 'data-nav' ) == 'active' ) {
			$mobilenav.removeClass( 'mobilenav--active' );
			$body.attr( 'data-nav', 'inactive' ).css( { 'overflow': 'auto' } );
			$wrapper.removeClass( 'wrapper--mobilenavactive' );
		} else {
			$mobilenav.addClass( 'mobilenav--active' );
			$body.attr( 'data-nav', 'active' ).css( { 'overflow': 'hidden' } );
			$wrapper.addClass( 'wrapper--mobilenavactive' );
		}
	}


	$burgers.click( NavToggle );

} );

jQuery( document ).ready( function () {
	jQuery( '[data-search="toggle"]' ).click( function ( event ) {
		event.preventDefault();
		jQuery( '#searchform' ).toggleClass( 'searchform--active' );
	} );
} );

/* кнопка наверх */
jQuery( document ).ready( function () {
  var $w = jQuery( window ),
    $toTopBtn = jQuery( '<button>', {
      class: 'to-top-btn',
      id: 'toTopBtn',
      title: studyinukraineTheme.toTopBtn,
    } ).appendTo( jQuery( 'body' ) );
  function _btnHide() {
    if ( $w.scrollTop() > screen.height * 0.5) {
      $toTopBtn.show();
    } else {
      $toTopBtn.hide();
    }
  }
  function _toTopBtnClick() {
    jQuery( 'body, html' ).animate( {
      scrollTop: 0
    }, 500 );
    return false;
  }
  _btnHide();
  $w.bind( 'scroll', _btnHide );
  $toTopBtn.bind( 'click', _toTopBtnClick );
} );
