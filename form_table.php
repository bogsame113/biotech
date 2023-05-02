<?php

function form_table() {

	global $wpdb;
  	$version = get_option( 'my_plugin_version', '1.0' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'biotech_form';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
        form_title varchar(100) NULL,
        shortcode varchar (100) NULL,
        form_type varchar (100) NULL,
        file_path varchar (1000) NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	if ( version_compare( $version, '2.0' ) < 0 ) {
		$sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            form_title varchar(100) NULL,
            shortcode varchar (100) NULL,
            form_type varchar (100) NULL,
            file_path varchar (1000) NULL,
            UNIQUE KEY id (id)  
		) $charset_collate;";
		dbDelta( $sql );
	
	  	update_option( 'my_plugin_version', '2.0' );
		
	}

	
}

?>