<?php
class Taxonomies{

	public $_wpdb, $_current_user, $_prefix;

	public function __construct(){
		global $wpdb;
		$this->_wpdb         = $wpdb;
		$this->_current_user = wp_get_current_user();
		$this->_prefix       = $wpdb->prefix;
		$this->_table_name   = $this->_prefix.'aic_taxonomies';

		add_action('init',array($this,'show_taxonomies'),10,1);
	}

	public function add_new_taxonomy($post_type_id='', $name='', $singular_name=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->insert(
			$this->_table_name,
			array(
				'name' => $name,
				'singular_name' => $singular_name,
				'slug' => $slug,
				'date_made' => time(),
				'post_type_id' => $post_type_id
			),
			array(
				'%s',
				'%s',
				'%s',
				'%d',
				'%d'
			)
		);
	}

	public function edit_taxonomy($id='', $name='', $singular_name='',$post_type_id=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->update(
			$this->_table_name,
			array(
				'name' => $name,
				'singular_name' => $singular_name,
				'slug' => $slug,
				'post_type_id' => $post_type_id
			),
			array( 'ID' => $id ),
			array(
				'%s',
				'%s',
				'%s',
				'%d'
			),
			array( '%d' )
		);
	}

	public function delete_taxonomy($id=''){
		$this->_wpdb->delete( $this->_table_name, array( 'id' => $id ) );
	}

	public function show_taxonomies(){
		global $wpdb;
		$taxonomies = $wpdb->get_results( 'SELECT * FROM '.$this->_table_name );
		foreach ($taxonomies as $tax) {
			$name = $tax->name;
			$singular_name = $tax->singular_name;
			$slug = $tax->slug;
			$post_type_id = $tax->post_type_id;
			$post_type = get_aic_post_type($post_type_id,'id');
			register_taxonomy($slug, array($post_type), array("hierarchical" => true, "label" => $name, "singular_label" => $singular_name, "rewrite" => true));
		} // end $taxonomies foreach
	} // end show_taxonomies function

} // end class
?>
