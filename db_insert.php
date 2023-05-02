<?php

        if ( isset($_POST['emailadd'])){
            global $wpdb;     
            $table_name = $wpdb->prefix . 'biotech_email_subscribers';     
            $wpdb->insert($table_name, array('mail' =>'12','fullname'=>'r','country'=>'r','phonenumber'=>'r','biotech_country'=>'r','Area_of_Interest'=>'r','clientid'=>'r'));  
        }
            
?>