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
        <button type="button" class="close" aria-label="Close" @click="close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      
      <div class="modal-body">
        <form>
          {{userdata}}
         <div class="form-group">
          <label>Name</label>
          <input name="name" class="form-control" v-bind:value="user.name"/>
         </div>
         <div class="form-group">
          <label>E-mail</label>
          <input name="email" class="form-control" v-bind:value="user.email"/>
         </div>
         <div class="form-group">
          <label>Role</label>
          {{userRoles}}
          <select multiple v-model="mutableRoles" class="form-control"  @change="changeValue">
       
               <option v-for="(role,index) in roles" v-bind:value="role.id">{{role.name}}</option>
    
           </select>
         </div>
          <div class="form-group">
          <label>Permissions</label>
          <select multiple class="form-control" v-model="mutablePermissions" >
           <option v-for="(permission,index) in permit"  v-bind:value="permission.id">{{permission.name}}</option> 
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
<!--end modal-->
</template>
<script>
export default {
  // props:[
  //   'modalTitle',
  //   'user',
  //   'roles'
  // ],

    props:{
      modalTitle:{
        type:String,
        required:true,
      },
      user:{
        type:[Array,Object],
        required:true,
      },
      userdata:{
        type:[Array,Object],
        required:true,
      },
      roles:{
        type:[Array,Object],
        required:true,
      },
      permit:{
        type:[Array,Object],
        required:true,
      }
    },
    data(){
      return{
       mutableRoles:[],
       mutablePermissions:[],
       userRoles:this.userdata,
       userPermissions:[],
      }
    },
    created() {
     
    },
   
    methods: {
        close:function(){
            this.$emit('closeModal');
          
        },
         changeValue(){
      console.log("test");
      },
        
    },
    computed: {
     
    },
    watch: { 
       
    },
    mounted() {
     
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