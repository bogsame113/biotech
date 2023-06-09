<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Callbacks</title>
  <link rel="stylesheet" href="wp-content/plugins/biotechForm/dist/jquery-steps.css">
  <!-- Demo stylesheet -->
  <link rel="stylesheet" href="wp-content/plugins/biotechForm/examples/css/style.css">
</head>
<body>

  <div class="step-app" id="demo">
    <ul class="step-steps">
      <li data-step-target="step1">Step 1</li>
      <li data-step-target="step2">Step 2</li>
      <li data-step-target="step3">Step 3</li>
      <li data-step-target="step4">Step 4</li>
      <li data-step-target="step5">Step 5</li>
    </ul>
    <div class="step-content">
      <div class="step-tab-panel" data-step="step1">
        <h3>Tab1</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus facere porro iste quas numquam officia totam facilis suscipit, expedita rem quod, fugiat quo, veniam voluptate ut autem quia qui amet necessitatibus perferendis dignissimos ipsa doloremque. Necessitatibus delectus voluptatem unde. Architecto animi unde nostrum tenetur, doloremque distinctio, porro officiis dicta similique omnis quos odit ducimus minima ea quas facilis quod. Natus adipisci consequuntur sapiente alias culpa fugit tenetur, doloribus? Magni ipsum dolor debitis beatae quo, dicta voluptas veritatis, quos. Iusto quisquam doloribus laboriosam esse, dicta, odio facilis eligendi explicabo sequi accusamus a iste minus alias. Nisi sed laborum, aut maiores beatae aliquam voluptatum est enim impedit delectus blanditiis, neque sint nemo deleniti a quaerat voluptatem harum! Laboriosam assumenda, ullam iure. Corrupti maxime perferendis facilis ipsum, eius excepturi commodi consectetur, velit nobis reiciendis, ipsam! Maiores possimus tempore vel doloremque in facilis qui quos molestias. Culpa eius magnam repellat, ad eaque. Possimus, voluptatem.</p>
      </div>
      <div class="step-tab-panel" data-step="step2">
        <h3>Tab2</h3>
        <form name="frmInfo" id="frmInfo">
          First name:<br>
          <input type="text" name="txtFirstName" required>
          <br> Last name:<br>
          <input type="text" name="txtLastName" required>
        </form>
      </div>
      <div class="step-tab-panel" data-step="step3">
        <h3>Tab3</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus facere porro iste quas numquam officia totam facilis suscipit, expedita rem quod, fugiat quo, veniam voluptate ut autem quia qui amet necessitatibus perferendis dignissimos ipsa doloremque. Necessitatibus delectus voluptatem unde. Architecto animi unde nostrum tenetur, doloremque distinctio, porro officiis dicta similique omnis quos odit ducimus minima ea quas facilis quod. Natus adipisci consequuntur sapiente alias culpa fugit tenetur, doloribus? Magni ipsum dolor debitis beatae quo, dicta voluptas veritatis, quos. Iusto quisquam doloribus laboriosam esse, dicta, odio facilis eligendi explicabo sequi accusamus a iste minus alias. Nisi sed laborum, aut maiores beatae aliquam voluptatum est enim impedit delectus blanditiis, neque sint nemo deleniti a quaerat voluptatem harum! Laboriosam assumenda, ullam iure. Corrupti maxime perferendis facilis ipsum, eius excepturi commodi consectetur, velit nobis reiciendis, ipsam! Maiores possimus tempore vel doloremque in facilis qui quos molestias. Culpa eius magnam repellat, ad eaque. Possimus, voluptatem.</p>
      </div>
      <div class="step-tab-panel" data-step="step4">
        <h3>Tab4</h3>
        <form name="frmLogin" id="frmLogin">
          Email address:<br>
          <input type="text" name="txtEmail" required>
          <br> Password:<br>
          <input type="text" name="txtPassword" required>
        </form>
      </div>
      <div class="step-tab-panel" data-step="step5">
        <h3>Tab5</h3>
        <form name="frmMobile" id="frmMobile">
          Mobile No:<br>
          <input type="text" name="txtMobileNum" required>
        </form>
      </div>
    </div>
    <div class="step-footer">
      <button data-step-action="prev" class="step-btn">Previous</button>
      <button data-step-action="next" class="step-btn">Next</button>
      <button data-step-action="finish" class="step-btn">Finish</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="wp-content/plugins/biotechForm/dist/jquery-steps.js"></script>
  <script>
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        // step2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            return frmInfo.valid();
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }
        // step4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            return frmLogin.valid();
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }
        // step5
        if (currentIndex === 4) {
          if (stepDirection === 'forward') {
            return frmMobile.valid();
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }
        return true;
      },
      onFinish: function () {
        alert('Wizard Completed');
      }
    });
  </script>
</body>
</html>
