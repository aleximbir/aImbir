<?php
class Widgets{

	public $_wpdb, $_current_user, $_prefix;

	public function __construct(){
		global $wpdb;
		$this->_wpdb         = $wpdb;
		$this->_current_user = wp_get_current_user();
		$this->_prefix       = $wpdb->prefix;
		$this->_table_name   = $this->_prefix.'aic_widgets';

		add_action('init',array($this,'show_widgets'),10,1);
	}

	public function add_new_widget($name='', $description=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->insert(
			$this->_table_name,
			array(
				'name' => $name,
				'slug' => $slug,
				'description' => $description,
				'date_made' => time(),
			),
			array(
				'%s',
				'%s',
				'%s',
				'%d',
			)
		);
	}

	public function edit_widget($id='', $name='', $description=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->update(
			$this->_table_name,
			array(
				'name' => $name,
				'description' => $description,
				'slug' => $slug
			),
			array( 'ID' => $id ),
			array(
				'%s',
				'%s',
				'%s'
			),
			array( '%d' )
		);
	}

	public function delete_widget($id=''){
		$this->_wpdb->delete( $this->_table_name, array( 'id' => $id ) );
	}

	public function show_widgets(){
		global $wpdb;
		$widgets = $wpdb->get_results( 'SELECT * FROM '.$this->_table_name );
		foreach ($widgets as $widget) {
			$name = $widget->name;
			$slug = $widget->slug;
			$description = $widget->description;

			register_sidebar( array(
				'name' => $name,
				'id' => $slug,
				'description' => $description,
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );

		} // end $taxonomies foreach
	} // end show_taxonomies function

} // end class
?>
