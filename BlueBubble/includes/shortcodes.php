<?php
/** 
 * Filter TinyMCE Buttons
 *
 * Here we are filtering the TinyMCE buttons and adding a button
 * to it. In this case, we are looking to add a style select 
 * box (button) which is referenced as "styleselect". In this 
 * example we are looking to add the select box to the second
 * row of the visual editor, as defined by the number 2 in the
 * mce_buttons_2 hook.
 */
function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );

/**
 * Add Style Options
 *
 * First we provide available formats for the style format drop down.
 * This should contain a comma separated list of formats that 
 * will be available in the format drop down list.
 *
 * Next, we provide our style options by adding them to an array.
 * Each option requires at least a "title" value. If only a "title"
 * is provided, that title will be used as a divider heading in the
 * styles drop down. This is useful for creating "groups" of options.
 *
 * After the title, we set what type of element it is and how it should
 * be displayed. We can then provide class and style attributes for that
 * element. The example below shows a variety of options.
 *
 * Lastly, we encode the array for use by TinyMCE editor
 *
 * {@link http://tinymce.moxiecode.com/examples/example_24.php }
 */
function themeit_tiny_mce_before_init( $settings ) {
  $settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr';

  $style_formats = array( 
      array( 'title' => __('Highlight Yellow','BlueBubble'),   'inline'   => 'span', 'classes' => 'hl-yellow' ),
	  array( 'title' => __('Highlight Red','BlueBubble'),      'inline'   => 'span', 'classes' => 'hl-red' ),
      array( 'title' => __('Buttons & Boxes','BlueBubble')),
      array( 'title' => __('Gray Button','BlueBubble'),  'inline' => 'a',  'classes' => 'button gray' ),
      array( 'title' => __('Dark Gray Button','BlueBubble'),  'inline' => 'a',  'classes' => 'button darkgray'),
      array( 'title' => __('Green Button','BlueBubble'),  'inline' => 'a',  'classes' => 'button green'),
      array( 'title' => __('Blue Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button blue'),
      array( 'title' => __('Dark Blue Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button darkblue'),
      array( 'title' => __('Black Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button black'),
      array( 'title' => __('Turquoise Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button turquoise'),
      array( 'title' => __('Yellow Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button yellow'),
      array( 'title' => __('Purple Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button purple'),
      array( 'title' => __('Pink Button','BlueBubble'),   'inline' => 'a',  'classes' => 'button pink' ),

      array( 'title' => __('Alert Box','BlueBubble'),          'block'    => 'div',  'classes' => 'alert' ),
   	  array( 'title' => __('Download Box','BlueBubble'),       'block'    => 'div',  'classes' => 'dload' ),
	  array( 'title' => __('Info Box','BlueBubble'),           'block'    => 'div',  'classes' => 'info' ),
	  array( 'title' => __('Idea Box','BlueBubble'),           'block'    => 'div',  'classes' => 'idea' ),

      array( 'title' => __('Columns','BlueBubble')),
      array( 'title' => __('&frac12; Col.','BlueBubble'),      'block'    => 'div',  'classes' => 'one_half' ),
      array( 'title' => __('&frac12; Col. Last','BlueBubble'), 'block'    => 'div',  'classes' => 'one_half last' ),
      array( 'title' => __('&frac13; Col.','BlueBubble'),      'block'    => 'div',  'classes' => 'one_third' ),
      array( 'title' => __('&frac13; Col. Last','BlueBubble'), 'block'    => 'div',  'classes' => 'one_third last' ),
      array( 'title' => __('&frac23; Col.','BlueBubble'),      'block'    => 'div',  'classes' => 'two_third' ),
      array( 'title' => __('&frac23; Col. Last','BlueBubble'), 'block'    => 'div',  'classes' => 'two_third last' ),
  );

  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );


/**
 * Add Editor Style
 *
 * This provides the theme with the functionality to add a custom
 * TinyMCE editor stylesheet. By default, the add_editor_style() will
 * look for a stylesheet named editor-style.css in your theme. Here
 * we have chosen to define our own stylesheet name, style-editor.css.
 * This stylesheet can be named whatever you want, just be sure it is
 * defined in the function below and included in your theme files.
 *
 *{@link http://codex.wordpress.org/Function_Reference/add_editor_style }
 */
 
function themeit_add_editor_style() {
  add_editor_style( 'style-editor.css' );
}
add_action( 'after_setup_theme', 'themeit_add_editor_style' );
?>