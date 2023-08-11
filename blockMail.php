<?php

function block_email() {

	global $wpdb;
  	$version = get_option( 'my_plugin_version', '1.0' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'Blocked_Email';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
        mail_add varchar(100) NULL,
        statusMail varchar (1000) NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	if ( version_compare( $version, '2.0' ) < 0 ) {
		$sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            mail_add varchar(100) NULL,
            statusMail varchar (1000) NULL,
            UNIQUE KEY id (id)  
		) $charset_collate;";
		dbDelta( $sql );
	
	  	update_option( 'my_plugin_version', '2.0' );
		
	}

	
}

?>