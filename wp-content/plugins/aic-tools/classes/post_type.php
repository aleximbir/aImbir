<?php
class Post_Type{

	public $_wpdb, $_current_user, $_prefix;
	public $_table_name;

	public function __construct(){
		global $wpdb;
		$this->_current_user = wp_get_current_user();
		$this->_prefix       = $wpdb->prefix;
		$this->_wpdb         = $wpdb;
		$this->_table_name   = $this->_prefix.'aic_post_types';

		add_action('init',array($this,'show_post_types'),10,1);
	}

	public function add_new_post_type($name='', $singular_name=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->insert(
			$this->_table_name,
			array(
				'name' => $name,
				'singular_name' => $singular_name,
				'slug' => $slug,
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

	public function edit_post_type($id='', $name='', $singular_name=''){
		$slug = ($name && $name != '') ? sanitize_title_with_dashes($name) : sanitize_title_with_dashes($singular_name);
		$slug = str_replace('-', '_', $slug);

		$this->_wpdb->update(
			$this->_table_name,
			array(
				'name' => $name,
				'singular_name' => $singular_name,
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

	public function delete_post_type($id=''){
		$this->_wpdb->delete( $this->_table_name, array( 'id' => $id ) );
	}

	public function show_post_types(){
		$posts = $this->_wpdb->get_results( 'SELECT * FROM '.$this->_table_name );
		foreach ($posts as $post) {
		    $name = $post->name;
		    $singular_name = $post->singular_name;
		    $slug = $post->slug;
		    register_post_type( $slug,
		      array(
		        'labels' => array(
		          'name' => __( $name ),
		          'singular_name' => __( $singular_name )
		        ), // end array
		        'public' => true,
		        'has_archive' => true,
		      ) // end array
		    ); // end register_post_type
		} // end $posts foreach
	} //end show_post_types function

} // end class
?>
