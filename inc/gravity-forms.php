<?php

/**
* Filters the next, previous and submit buttons.
* Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
*
* @param string $button Contains the <input> tag to be filtered.
* @param array  $form    Contains all the properties of the current form.
*
* @return string The filtered button.
*/
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
	$fragment = WP_HTML_Processor::create_fragment( $button );
	$fragment->next_token();
 
	$attributes      = array( 'id', 'type', 'class', 'onclick' );
	$data_attributes = $fragment->get_attribute_names_with_prefix( 'data-' );
	if ( ! empty( $data_attributes ) ) {
		$attributes = array_merge( $attributes, $data_attributes );
	}
 
	$new_attributes = array();
	foreach ( $attributes as $attribute ) {
		$value = $fragment->get_attribute( $attribute );
		if ( ! empty( $value ) ) {
			$new_attributes[] = sprintf( '%s="%s"', $attribute, esc_attr( $value ) );
		}
	}
 
	return sprintf( '<button %s><span class="show-for-sr">%s</span></button>', implode( ' ', $new_attributes ), esc_html( $fragment->get_attribute( 'value' ) ) );
}