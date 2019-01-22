<template>
      <!-- Modal -->
 <transition name="modal">
 <div class="modal modal-mask" style="display: block">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          {{modalTitle}}
        </h4>
      </div>
      
      <div class="modal-body">
        <form>
         <div class="form-group">
          <label>Name</label>
          <input name="name" class="form-control"/>
         </div>
         <div class="form-group">
          <label>E-mail</label>
          <input name="email" class="form-control"/>
         </div>
         <div class="form-group">
          <label>Role</label>
          <select multiple class="form-control">
           <option>ABC</option>
           <option>CDE</option>
           <option>EFG</option>
          </select>
         </div>
        </form>
      </div>
      
      <div class="modal-footer">
       <button type="button" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-danger" @click="close">Close</button>
      </div>
    </div>
  </div>
</div>
</transition> 
</template>
<script>
export default {
  // props:[
  //   'parentprops',
  //   'user'
  // ],

    props:{
      modalTitle:{
        type:String,
        required:true,
      },
    //   user:{
    //     type:[Array,Object],
    //     required:true,
    //   }
    },
    
    methods: {
        close:function(){
            this.$emit('closeModal');
        }
    },

 
}
</script>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}
</style>