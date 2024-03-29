<link rel="stylesheet" href="css/jquery-steps.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery.steps@1.1.1/dist/jquery-steps.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery.steps@1.1.1/dist/jquery-steps.min.js"></script>
<script>
  $('#demo').steps({
    onFinish: function () { alert('complete'); }
  });
</script>
</script>
<div class="step-app" id="demo">
  <ul class="step-steps">
    <li data-step-target="step1">Step 1</li>
    <li data-step-target="step2">Step 2</li>
    <li data-step-target="step3">Step 3</li>
  </ul>
  <div class="step-content">
    <div class="step-tab-panel" data-step="step1">
      ...
    </div>
    <div class="step-tab-panel" data-step="step2">
      ...
    </div>
    <div class="step-tab-panel" data-step="step3">
      ...
    </div>
  </div>
  <div class="step-footer">
    <button data-step-action="prev" class="step-btn">Previous</button>
    <button data-step-action="next" class="step-btn">Next</button>
    <button data-step-action="finish" class="step-btn">Finish</button>
  </div>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="dist/jquery-steps.js"></script>