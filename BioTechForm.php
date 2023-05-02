<?php

/*
 * Plugin Name:       BioTech Form
 * Description:       Handle the step by step and save it to dataBase
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      4.2
 * Author:            BioTech Developer
 * Author URI:        http://testing.biotech.com/
 */

add_action('admin_menu','Biotech_menu');
function Biotech_menu(){
    add_menu_page(
        'Biotech_form',
        'Biotech Form',
        'manage_options',
        'BiotechInfo',
        'Biotech_form_deisgn'

    );
}
function Biotech_form_deisgn(){
    include_once('biotech_form_design.php');
}


global $wpdb;
$table_name = $wpdb->prefix . 'biotech_form'; 
$ipquery= $wpdb->get_results("SELECT *  FROM $table_name "); 
foreach($ipquery as $ss) {
    add_shortcode($ss->shortcode, $ss->form_type);
}

function download($atts){
    ob_start();
    include_once( 'examples/download.php');
   
    $a = shortcode_atts( array('title' => 'test',), $atts);
    GetTitle($a['title']);
    return ob_get_clean();
}

function basic($atts){
    ob_start();
    $a = shortcode_atts( array('title' => 'test',), $atts);
    $path = 'examples/basic.php';
    include $path;
    GetTitle($a['title']);
    $response = ob_get_contents();
    ob_end_clean();
    return $response;
}

function form_1($atts){
    ob_start();
    include_once( 'examples/form_1.php');
    $a = shortcode_atts( array('title' => 'test',), $atts);
    GetTitle($a['title']);
    return ob_get_clean();
}

if(!defined('ABSPATH')){
    define('ABSPATH',dirname(__FILE__).'/');
}

include_once( 'dbContent.php');
register_activation_hook( __FILE__, 'my_plugin_create_db' );

include_once( 'form_table.php');
register_activation_hook( __FILE__, 'form_table' );

include_once( 'file_table.php');
register_activation_hook( __FILE__, 'file_table' );

function get_allData(){
    if(isset($_REQUEST)){
        global $wpdb;
        $table_name = $wpdb->prefix . 'biotech_email_subscribers'; 
        $ipquery= $wpdb->get_results("SELECT *    FROM $table_name  GROUP BY `mail`  DESC "); 
        $client =array();
        foreach($ipquery as $ss) {
            $items = array('recid'=>$ss->id,
                            'mail'=>$ss->mail,
                            'message'=>$ss->messages,
                            'company'=>$ss->company,
                            'phoneNumber'=>$ss->phonenumber,
                            'fullname'=>$ss->fullname,
                            'formType'=>$ss->formType);
            array_push($client,$items);
        }
        $email = array();
        $table_name2 = $wpdb->prefix . 'biotech_email_subscribers'; 
        $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name2  GROUP BY `mail`  DESC "); 
        foreach($ipquery2 as $ss) {
            $mail = array('mail'=>$ss->mail);
            array_push($mail,$email);
        }
        echo json_encode(array('mail'=>$email,'result'=>$client));
        die();
    }
}
add_action('wp_ajax_get_data','get_allData');

function getTypeForm(){
    if(isset($_REQUEST)){
        $select = $_REQUEST['selected'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'biotech_email_subscribers'; 
        if($select == '-- All --'){
            $ipquery= $wpdb->get_results("SELECT *    FROM $table_name  GROUP BY `mail`  DESC "); 
        }else{
            $ipquery= $wpdb->get_results("SELECT *    FROM $table_name WHERE formType = '" .$select. "' GROUP BY `mail`  DESC "); 
        }
        $client =array();
        $email = array();
        foreach($ipquery as $ss) {
            $items = array('recid'=>$ss->id,
                            'mail'=>$ss->mail,
                            'message'=>$ss->messages,
                            'company'=>$ss->company,
                            'phoneNumber'=>$ss->phonenumber,
                            'fullname'=>$ss->fullname,
                            'formType'=>$ss->formType);
            array_push($client,$items);
        }
        echo json_encode(array('mail'=>$email,'result'=>$client));
        die();
    }
}

add_action('wp_ajax_get_typeForm','getTypeForm');

function getShortCode(){
    if(isset($_REQUEST)){
        global $wpdb;
        $table_name = $wpdb->prefix . 'biotech_form'; 
        $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name ");       
        $client =array();
        foreach($ipquery2 as $ss) { 
            $items = array('recid'=>$ss->id,
                            'FormTitle'=>$ss->form_title,
                            'Shortcode'=>"[" . $ss->shortcode . " ". "title='".$ss->form_title . "']",
                            'FormType'=>$ss->form_type);
            array_push($client,$items);
        }
        echo json_encode($client);
        die();
    }
}


add_action('wp_ajax_get_Shortcode','getShortCode');

// //file uploader
function getFileUpload(){
    if(isset($_REQUEST)){
        $fileName = $_REQUEST['fileName'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'fileUpload';  
        $wpdb->insert($table_name, array('file_name'=>$fileName,'file_path'=>'../wp-content/plugins/biotechForm/upload/'.$fileName,'active'=>1));  
        $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name where active != '3'");       
        $client =array();
        foreach($ipquery2 as $ss) { 
            $status = '';
            if($ss->active==1){
                $status = 'Active';
            }else{
                $status = 'Disabled';
            }
            $items = array('recid'=>$ss->id,
                            'file_name'=>$ss->file_name,
                            'active'=>$status);
            array_push($client,$items);
        }
        echo json_encode($client);
        die();
    }
};

add_action('wp_ajax_get_fileName','getFileUpload');

function fileUpload(){
    if(isset($_REQUEST)){
        $fileName = $_REQUEST['fileName'];
        global $wpdb;
        $table_name = $wpdb->prefix . 'fileUpload';  
        $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name where active != '3'");       
        $client =array();
        foreach($ipquery2 as $ss) { 
            $status = '';
            if($ss->active==1){
                $status = 'Active';
            }else{
                $status = 'Disabled';
            }
            $items = array('recid'=>$ss->id,
                            'file_name'=>$ss->file_name,
                            'active'=>$status);
            array_push($client,$items);
        }
        echo json_encode($client);
        die();
    }
};

add_action('wp_ajax_set_fileUpload','fileUpload');

function fileStatusUpload(){
    if(isset($_REQUEST)){
        $fileName = $_REQUEST['FileData'];
        // var_dump($fileName['clickFlie']);
        global $wpdb;
        $table_name = $wpdb->prefix . 'fileUpload';  
        $wpdb->update($table_name,
                          array(
                                'active'=>$fileName['SelectedStatus']
                              ),
                          array('id'=>$fileName['clickFlie'])
                        ); 
        $client =array();
        $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name where active != '3'");   
        foreach($ipquery2 as $ss) { 
            $status = '';
            if($ss->active==1){
                $status = 'Active';
            }else{
                $status = 'Disabled';
            }
            $items = array('recid'=>$ss->id,
                            'file_name'=>$ss->file_name,
                            'active'=>$status);
            array_push($client,$items);
        }
        echo json_encode($client);
        die();
    }
};

add_action('wp_ajax_get_statusChange','fileStatusUpload');


//end point API for ZOHO ***
// end point API:http://localhost/biotech/wp-json/GetClient/V1
function EndPoint( object $data ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'biotech_email_subscribers'; 
    $ipquery= $wpdb->get_results("SELECT * FROM $table_name  GROUP BY `mail`  DESC "); 
    $client =array();
    foreach($ipquery as $ss) {
            
        $items = array('recid'=>$ss->id,
                        'mail'=>$ss->mail,
                        'message'=>$ss->messages,
                        'company'=>$ss->company,
                        'phoneNumber'=>$ss->phonenumber,
                        'fullname'=>$ss->fullname);
        array_push($client,$items);
    }
    return $client;
    die();
}

add_action( 'rest_api_init', function(){
	register_rest_route( 'GetClient', '/V1/', array(
		'methods'  => 'GET',
		'callback' => 'EndPoint',
	));
});

    //PCS FORM