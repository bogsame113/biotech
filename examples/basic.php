 <?php
      function GetTitle($title){
?>  


<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <style>
        .button_psc{
            font-size: 12px;
            color: var(--baseColor);
            border: 1px solid #c0c6cc;
            padding: 3px 9px;
            border-radius: 4px;
            cursor: pointer;
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            padding: 12px 38px;
            border-radius: 12px;
            background-color: #f7941d;
            border: 1.5px solid #f7941d;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 17px;
            text-transform: uppercase;
            color: #ffffff;
            transition: 300ms all;
        }

        .button_psc:hover{
            background-color: transparent;
            color: #f7941d;
        }

        .input_psc{
            display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 2.5;
    background-clip: padding-box;
    border: -0.5px solid #6c757d;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .375rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
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
    </div>
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">E-mail Address</label>
                    <input maxlength="100" type="text"  class="form-control input_psc" placeholder="E-mail Address" name="emailadd" id="emailadd" required="required" />
                </div>
                <button class=" nextBtn pull-right button_psc" type="button" name="submit" id="first">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Full Name</label>
                    <input maxlength="200" type="text" class="form-control input_psc" placeholder="Full Name (First, Last)"   name="fullname" id="fullname" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text"  class="form-control input_psc" placeholder="Company Name" name="company" id="company"/>
                </div>
                <button class=" button_psc nextBtn pull-right" type="button" id="second">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Company Phone Number</label>
                    <input maxlength="200" type="text" class="form-control input_psc" placeholder="Company Phone Number" name="phonenumber" id="phonenumber" value=""/>
                </div>
                <div class="form-group">
                    <label class="control-label">How can I help you?</label>
                    <textarea class="form-control input_psc" name="message" id="messages" style="height:200px"></textarea>
                </div>
                <button class=" button_psc pull-right" type="submit" id="finish">Finish!</button>
            </div>
        </div>
</div>
</form>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="https://static.zohocdn.com/zohocrm/v2.0/sdk/3.0.0/sdk.js"></script>
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
        if ( isset($_POST['emailadd'])){
          $table_name = $wpdb->prefix . 'biotech_email_subscribers';  
          $mail = isset($_POST['emailadd']);
            $wpdb->insert($table_name, array('mail' =>$_POST['emailadd'], 'clientid'=>'0'));  
        }
           
       
        if(isset($_POST['fullname']) || isset($_POST['company']) || isset($_POST['phonenumber'])|| isset($_POST['messages'])){
            $table_name = $wpdb->prefix . 'biotech_email_subscribers';  
            $wpdb->update($table_name,
                          array('fullname'=>$_POST['fullname'],
                                'company'=>$_POST['company'],
                                'phonenumber'=>$_POST['phonenumber'],
                                'messages'=>$_POST['messages'],
                                'formType'=>$title
                              ),
                          array('mail'=>$_POST['emailadd'])
                        );
        }



 } 
