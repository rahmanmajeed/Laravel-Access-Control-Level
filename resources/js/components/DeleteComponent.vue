<template>
<div>
  <div>
    <h3>Example: Scrolling the body section of a modal dialog only.</h3>
  </div>
  <div>
     <button class="btn btn-primary" data-toggle="modal" data-target="#dialog-example">
      Show Modal Dialog
     </button>
  </div>
</div>

<div id="dialog-example" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="label-dialog-example" style="display: none;">
  <div class="modal-dialog full-screen" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="label-dialog-example">Modal Title Area</h4>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
    
}
</script>
<style>
body {
  padding: 10px;
}

.modal-dialog.full-screen {
    position:fixed;
    margin:auto;                        
    left:0px;
    right:0px;
    top:0px;
    bottom:0px;
}

.modal-dialog.full-screen .modal-content {
      position:absolute;
      left:10px;
      right:10px;
      top:10px;
      bottom:10px;
}

.modal-dialog.full-screen .modal-content .modal-header {
        height:55px;  
}

.modal-dialog.full-screen .modal-content .modal-body {
        overflow-y: auto;
	      position: absolute;
	      top: 0;
	      bottom: 0;
        left:0;
        right:0;
	      margin-top: 55px; 
	      margin-bottom: 80px;  
}

.modal-dialog.full-screen .modal-content .modal-footer {
        height:80px;  
        position:absolute;
        bottom:0;
        left:0;
        right:0;
}
</style>