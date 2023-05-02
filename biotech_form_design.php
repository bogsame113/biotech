<!doctype html>  
<html lang="en">  
   <head>  
      <meta charset="utf-8">  
      <title>jQuery UI Tabs functionality</title>  
      <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">  
      <link rel="stylesheet" type="text/css" href="https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>  
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
      
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script>  
         $(function() {  
            $( "#tabs-1").tabs();  
         });  
      </script>  
      <style>  
         #tabs-1{font-size: 14px;}  
         .ui-widget-header {  
            background:none; 
            border: 1px solid gray
         }  
         .ui-widget-content{
          background:none
         }
         * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
#grid_grid_operator_0{
        display:none;
    }

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
      </style>  
   </head>  
   <body>  
      <div id="tabs-1">  
         <ul>  
            <li><a href="#tabs-2">Form Submission</a></li>  
            <li><a href="#tabs-3">Custom Form</a></li>  
            <li><a href="#tabs-4">Create Form</a></li>  
            <li><a href="#tabs-5">Download Files</a></li> 
            <li><a href="#tabs-6">Settings</a></li>  
         </ul>  
         <div id="tabs-2"> 
            <?php
              global $wpdb;
              $table_name = $wpdb->prefix . 'biotech_form'; 
              $ipquery2= $wpdb->get_results("SELECT *    FROM $table_name "); 
            ?>
            <select name="cars" id="formTitle" style="margin-bottom:15px">
              <option value="all">-- All --</option>
              <?php foreach($ipquery2 as $f) { ?>
                <option value=<?php echo $f->form_title ?>><?php echo $f->form_title ?></option>
                <?php } ?>
            </select>
            <button class="btn btn-primary nextBtn pull-right" style="margin-left:15px;margin-bottom:15px; float:right;display:none">Download CSV</button>
             <div id="grid" style="width: 100%; height: 400px;"></div>
         </div>  
         <div id="tabs-3">  
          <div id="shortcode" style="width: 100%; height: 400px;"></div>
         </div>  
         <div id="tabs-4">  
                <!-- start of cration of form -->
                <div class="container">
                  <form >
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Form Title</label>
                      </div>
                      <div class="col-75">
                        <input type="text" id="form_title" name="form_title" placeholder="Title">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Select Form Type</label>
                      </div>
                      <div class="col-75">
                        Choose Step:
                      </div>
                      <div class="col-25">
                        <label for="fname"></label>
                      </div>
                      <div class="col-75">
                      <input type="checkbox" value="download" id="download">
                      (Download Form) Email ---- > Name and Company Name ---- > Download Button ---- > Save
                      </div>
                      <div class="col-25">
                        <label for="fname"></label>
                      </div>
                      <div class="col-75">
                      <input type="checkbox" value="basic" id="basic">
                       (Basic Form)Email ---- > Name and Company Name ---- > Phone Number and "How can I help you?" ---- > Save
                      </div>
                      <div class="col-25">
                        <label for="fname"></label>
                      </div>
                      <div class="col-75">
                      <input type="checkbox" value="form_1" id="form_1">
                       (Custom Form 1)Name and Email ---- > "How can I help you?" and Company Name ---- > Phone Number  ---- > Save
                      </div>
                    </div>
                    <div class="row" style="margin-left:15px;margin-bottom:55px; float:right">
                    <button class="btn btn-primary nextBtn pull-right" id="save_form"  >Save Form</button>
                    </div>
                  </form>
                </div>
         </div>  
         <div id="tabs-5">  
            <!-- <p>" The whole secret of existence is to have no fear." Buddha</p>   -->
            <div align="center">
            <h4>Upload file for download form</h4>
              <form method="post" action="" enctype="multipart/form-data"
                      id="myform">
        
                  <div >
                      <input type="file" id="file" name="file" />
                      <input type="button" class="button" value="Upload"
                              id="but_upload">
                  </div>
              </form>
              <div id="fileUpload" style="width: 100%; height: 400px; margin-top:2%"></div>
              <div align="right">
                <label for="dropDownId">Status:</label>
                <select name="dropDownId" id="dropDownId">
                <option value="0">-- Select Status --</option>
                  <option value="1">Active</option>
                  <option value="2">Disabled</option>
                  <option value="3">Delete</option>
                </select>
                <input type="button" class="button" value="Save" id="save_status" style="margin-top: 11px;">
              </div>
          </div> 
         </div> 
         <div id="tabs-6">
            dfdf
          </div>   
      </div>  
   </body>  
</html>
<script type="module">
import { w2grid, w2utils } from 'https://rawgit.com/vitmalina/w2ui/master/dist/w2ui.es6.min.js'

//start of w2ui
let grid = new w2grid({
    name: 'grid',
    box: '#grid',
    show: {
      toolbar: false,
      footer: true
          },
      columns: [
        { field: 'recid', text: 'ID', size: '50px', sortable: true, attr: 'align=center'},
        { field: 'mail', text: 'e-Mail', size: '30%', sortable: true },
        { field: 'fullname', text: 'First Name', size: '30%', sortable: true },
        { field: 'phoneNumber', text: 'Phone Number', size: '30%', sortable: true },
        { field: 'company', text: 'Company', size: '30%', sortable: true },
        { field: 'message', text: 'Message', size: '30%', sortable: true },
      ]
  })
  grid.hideColumn('recid');
  let gridshortcode = new w2grid({
    name: 'shortcode',
    box: '#shortcode',
    show: {
      toolbar: false,
      footer: true
    },
    columns: [
      { field: 'recid', text: 'ID', size: '50px', sortable: true, attr: 'align=center'},
      { field: 'FormTitle', text: 'Form Title', size: '30%', sortable: true },
      { field: 'Shortcode', text: 'Shortcode', size: '30%', sortable: true, editable: { type: 'text' } }
    ]
  }) 
  gridshortcode.hideColumn('recid'); 
  
  grid.hideColumn('recid');
  let gridfileUpload = new w2grid({
    name: 'fileUpload',
    box: '#fileUpload',
    show: {
      toolbar: false,
      footer: true
    },
    columns: [
      { field: 'recid', text: 'ID', size: '50px', sortable: true, attr: 'align=center'},
      { field: 'file_name', text: 'File Name', size: '30%', sortable: true },
      { field: 'active', text: 'Status', size: '30%', sortable: true, editable: { type: 'text' } }
    ]
  })
  ;
  gridfileUpload.hideColumn('recid');

$( document ).ready(function() {
 
    $.ajax({
        url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{action:'get_data'},
        success: function( data ){
          grid.records = data.result
          grid.searchReset()
          grid.refresh()
        }
      }); //need code for this to load the all data
    $.ajax({
        url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{action:'get_Shortcode'},
        success: function( data ){
          gridshortcode.records = data
          gridshortcode.searchReset()
          gridshortcode.refresh()
        }
    }); //need code for this to load the all data

    $.ajax({
      url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{'action':'set_fileUpload'},
        success: function( data ){
          gridfileUpload.records = data
          gridfileUpload.searchReset()
          gridfileUpload.refresh()
        }
      });

    $("#but_upload").click(function() {
                var fd = new FormData();
                var files = $('#file')[0].files[0]; 
                var fileName = $('#file')[0].files[0].name ;
                GetFileName(fileName);
                fd.append('file', files);
                $.ajax({
                  url:' ../wp-content/plugins/biotechForm/upload.php',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false, 
                    dataType: "json",
                    data:fd,
                    success: function( data ){
                      // alert(fileName);
                    }
                });
            });
      
});


  const download = $("#download");
  const basic = $("#basic");
  const form_1 = $("#form_1");
  var formTypeSelected = '';
  var FilePath = '';
  let ClickStatus = '';


  
  form_1.change(function(event) {
      var checkbox = event.target;
      if (checkbox.checked) {
          $("#download").attr("checked", false);
          $("#basic").attr("checked", false);
          formTypeSelected = $("#form_1").val();
      } 
  });
  basic.change(function(event) {
      var checkbox = event.target;
      if (checkbox.checked) {
          $("#download").attr("checked", false);
          $("#form_1").attr("checked", false);
          formTypeSelected = $("#basic").val();
      } 
  });
  download.change(function(event) {
      var checkbox = event.target;
      if (checkbox.checked) {
          $("#basic").attr("checked", false);
          $("#form_1").attr("checked", false);
          formTypeSelected = $("#download").val();
      } 
  });

  $("#save_form").click(function(){
    event.preventDefault();   
    $.ajax({
        url:'',
        type: 'POST',
        data:{form_type:formTypeSelected,
              shortcode:'shortcode' + Math.floor((Math.random() * 10) + 1),
              form_title:$('#form_title').val(),
              file_path:formTypeSelected + '.php'
              },
        success: function( data ){
          setTimeout($('a[href="#tabs-3"]').click(), 5000);
          location.reload();

        }
      });
  });

  $('#formTitle').on('change', function() {
    var input, filter, table, tr, td, i;
    input = $(this).find(":selected").text();
    $.ajax({
      url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{'action':'get_typeForm',
              'selected':input},
        success: function( data ){
             grid.records = data.result
             grid.searchReset()
             grid.refresh()
        }
      });
  });


  function GetFileName(fileName){
    $.ajax({
      url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{'action':'get_fileName',
              'fileName':fileName},
        success: function( data ){
          gridfileUpload.records = data
          gridfileUpload.searchReset()
          gridfileUpload.refresh()
          document.getElementById("file").value = "";
        }
      });
  };

gridfileUpload.on('click', function(event) {
    var grid = this;
    event.onComplete = function () {
        var sel = grid.getSelection();
        ClickStatus = sel;
    }
});

$("#save_status").click(function(){
  var selectedStatus = $('#dropDownId').val();
  var value = $("#dropDownId option:selected").val();
      $.ajax({
        url:'../wp-admin/admin-ajax.php',
        type: 'GET',
        dataType: "json",
        data:{'action':'get_statusChange',
              'FileData':{'clickFlie':ClickStatus[0],'SelectedStatus':value}},
        success: function( data ){
          gridfileUpload.records = data
          gridfileUpload.searchReset()
          gridfileUpload.refresh()
          $('#dropDownId').prop('selectedIndex',0);
          // document.getElementById("dropDownId").value = "-- Select Status --";
        }
      });
})

</script>
<?php
       global $wpdb;
       if ( isset($_POST['form_type']) || isset($_POST['shortcode']) || isset($_POST['form_title']) || isset($_POST['file_path'])){
        $table_name = $wpdb->prefix . 'biotech_form';  
          $wpdb->insert($table_name, array('form_type' =>$_POST['form_type'], 'shortcode'=>$_POST['shortcode'],'form_title'=>$_POST['form_title'],'file_path'=>$_POST['file_path']));  
      };

