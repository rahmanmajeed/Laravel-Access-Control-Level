<template>
    <div>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard <button class="btn btn-primary float-right">Create</button></div>
                    <update-modal v-show="ismodalOn" @closeModal="shutModal" :modalTitle="title"/>
                <div class="card-body">
                   
                    <table class="table table-bordered">
                    <thead>
                    <th>no.</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Roles</th>
                    <th>Permissions</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <tr v-for="(user,key) in users">
                        <td>{{++key}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{getRoles(user.roles)}}</td>
                        <td>{{getPermissionsFromRoles(user.roles)}}</td>
                        <td>
                        <button class="btn btn-info" @click="userUpdate(user.id)" >Edit</button>
                        <button class="btn btn-danger" @click="userDelete(user.id)">Delete</button> 
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</template>
<script>
import updateModal from './UpdateComponent';
export default {
    components:{
        updateModal,
    },
    data:function()
    {
        return{
            users:[],
            ismodalOn:false,
            title:'',
        }
    },
    methods: {
        read:function(){
            axios.get('/userlist')
            .then(response=>{
                
               this.users=response.data;
               console.log(response.data);
            })
            .catch(err=>{
                console.log(err);
            })
        },
        getRoles: function(roles) {
         let rolesString = []
         
        roles.forEach((role, index) => {
          
            rolesString.push(role.name);
          
                
        })
        return rolesString.join(', ')
        },
        getPermissionsFromRoles: function(roles) {
            let permissionsList = []
            let rolesString=[]
               roles.forEach((role, index) => {
                rolesString=role.permissions;
                 rolesString.forEach((permission,index)=>{
                      
                     permissionsList.push(permission.name)
                 })
                 
               
        });
            permissionsList = this.removeDuplicate(permissionsList)
            return permissionsList.join(', ')
        },
        removeDuplicate: function(permissions){
            let unique_array = permissions.filter(function(elem, index, self) {
                return index == self.indexOf(elem);
            });
            return unique_array;
        },
        userUpdate:function(user){
            axios.get('/admin/'+user+'/update')
            .then(response=>{
                console.log(response.data);
            })
            .catch(err=>{
                console.log(err);
            })
            this.title="Update User";
            this.ismodalOn=true;
        },
        userDelete:function(user){
            this.title="Delete User";
            this.ismodalOn=true;            
        },
        shutModal:function(){
            this.ismodalOn=false;
        },
        showModal:function(){
            this.ismodalOn=true;
        },
    },
    
    mounted:function(){
        this.read();
        console.log('Component Load');
    }
}
</script>