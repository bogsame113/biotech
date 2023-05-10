
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
/* The container */
.containerCheck {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: auto;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.containerCheck input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.containerCheck:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containerCheck input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.containerCheck input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.containerCheck .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<?php
      function GetTitle($title){
?>
<form style="border:1px">
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel" style="display:none">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Shipper</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Destination</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Schedule</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Cargo</small></p>
            </div>
        </div>
    </div>  
    <div class="panel-heading">
      <h3 class="panel-title"><?php  echo $title; ?></h3>             
    </div>
        <div class="panel panel-primary setup-content" id="step-1">

            <div class="panel-body">
            <div class="form-group">
                    <label class="control-label">Full Name</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Full Name (First, Last)"   name="fullname" id="fullname" />
                </div>
                <div class="form-group">
                    <label class="control-label">E-mail Address</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="E-mail Address" name="emailadd" id="emailadd" required="required" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button" name="first" id="first">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">

            <div class="panel-body">
            <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Phone Number" name="company" id="company" value=""/>
                </div>
                <div class="form-group">
                    <label class="control-label">How can I help you?</label>
                    <textarea class="form-control" name="message" id="messages" style="height:200px"></textarea>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button" id="second">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">

            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Phone Number" name="phonenumber" id="phonenumber" value=""/>
                </div>
                <button class="btn btn-success pull-right" type="submit" id="finish">Finish!</button>
            </div>
        </div>
</div>
</form>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
    });

    $('#first').click(function(){
      $.ajax({
        url:'',
        type: 'POST',
        data:{emailadd:$('#emailadd').val(),
              fullname:$('#fullname').val(),
              company:$('#company').val(),
              phonenumber:$('#phonenumber').val(),
              messages:$('#messages').val(),
              },
        success: function( data ){
        }
      });
    })
    $('#second').click(function(){
      $.ajax({
        url:'',
        type: 'POST',
        data:{emailadd:$('#emailadd').val(),
              fullname:$('#fullname').val(),
              company:$('#company').val(),
              phonenumber:$('#phonenumber').val(),
              messages:$('#messages').val(),
              },
        success: function( data ){
        }
      });
    })
    $('#finish').click(function(){
      $.ajax({
        url:'',
        type: 'POST',
        data:{emailadd:$('#emailadd').val(),
              fullname:$('#fullname').val(),
              company:$('#company').val(),
              phonenumber:$('#phonenumber').val(),
              messages:$('#messages').val(),
              },
        success: function( data ){
        }
      });
    })
  </script>   
<?php 

       global $wpdb;  
        if ( isset($_POST['emailadd']) || isset($_POST['fullname'],)){
          $table_name = $wpdb->prefix . 'biotech_email_subscribers';  
          $mail = isset($_POST['emailadd']);
            $wpdb->insert($table_name, array('mail' =>$_POST['emailadd'], 'clientid'=>'0','fullname'=>$_POST['fullname']));  
        }
           
       
        if(isset($_POST['company']) || isset($_POST['phonenumber']) || isset($_POST['messages'])){
            $table_name = $wpdb->prefix . 'biotech_email_subscribers';  
            $wpdb->update($table_name,
                          array(
                                'company'=>$_POST['company'],
                                'phonenumber'=>$_POST['phonenumber'],
                                'messages'=>$_POST['messages'],
                                'formType'=>$title
                              ),
                          array('mail'=>$_POST['emailadd'])
                        );
        }

} ?>

