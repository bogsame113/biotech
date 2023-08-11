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
    
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Download now!</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">E-mail Address</label>
                    <input maxlength="100" type="text"  class="form-control" placeholder="E-mail Address" name="emailadd" id="emailadd" required="required" />
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button" name="submit" id="mail_next">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
                 <h3 class="panel-title">Download now!</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Full Name</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Full Name (First, Last)"   name="fullname" id="fullname" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text"  class="form-control" placeholder="Enter Company Address" name="company" id="company"/>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button" id="name_next">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Download now!</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label">Country of Residence</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Country of Residence"  name="biotech_country" id="biotech_country" value=""/>
                </div>
                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Phone Number" name="phonenumber" id="phonenumber" value=""/>
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button" id="country_next">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Download now!</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                  <label class="containerCheck">Adaptive Compliance Engine® (ACE)
                    <input type="checkbox" value="Adaptive Compliance Engine® (ACE)" id="adaptive">
                    <span class="checkmark"></span>
                  </label>
                  <label class="containerCheck">ACE Essentials™
                    <input type="checkbox" value="ACE Essentials™" id="essentials">
                    <span class="checkmark"></span>
                  </label>
                  <label class="containerCheck">AuditUtopia®
                    <input type="checkbox" value="AuditUtopia®" id="auditUtopia">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea class="form-control" name="message" id="messages" style="height:200px"></textarea>
                </div>
                <button class="btn btn-success pull-right" type="submit" id="finish">Finish!</button>
            </div>
        </div>
</div>
</form>