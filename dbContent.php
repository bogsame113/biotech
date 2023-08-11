<?php

function my_plugin_create_db() {

	global $wpdb;
  	$version = get_option( 'my_plugin_version', '1.0' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'biotech_email_subscribers';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
        mail varchar(100) NULL,
        fullname varchar (100) NULL,
        company varchar (100) NULL,
        phonenumber varchar (15) NULL,
        biotech_country varchar (100) NULL,
        adaptive varchar(100) NULL, 
        auditUtopia varchar(100) NULL, 
        essentials varchar(100) NULL, 
        messages varchar(200) NULL,
        clientid varchar (100) NULL,
        formType varchar (50) NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	
	if ( version_compare( $version, '2.0' ) < 0 ) {
		$sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            mail varchar(100) NULL,
            fullname varchar (100) NULL,
            company varchar (100) NULL,
            phonenumber int (15) NULL,
            biotech_country varchar (100) NULL,
            adaptive varchar(100) NULL, 
            auditUtopia varchar(100) NULL, 
            essentials varchar(100) NULL, 
            messages varchar(200) NULL,
            clientid varchar (100) NULL,
            formType varchar (50) NULL,
            UNIQUE KEY id (id)
		) $charset_collate;";
		dbDelta( $sql );
	
	  	update_option( 'my_plugin_version', '2.0' );
		
	}

	
}

?>