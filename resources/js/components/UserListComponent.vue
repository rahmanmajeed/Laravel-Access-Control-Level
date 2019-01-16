<template>
    <div>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <button class="btn btn-primary float-right">Create</button></div>

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
                        <td></td>
                        <td>
                        <button class="btn btn-info">Edit</button>
                        <button class="btn btn-danger">Delete</button> 
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
export default {
    data:function()
    {
        return{
            users:[],
        }
    },
    methods: {
        read:function(){
            axios.get('/userlist')
            .then(response=>{
                
               this.users=response.data;
               console.log(response.data[0].roles);
            })
            .catch(err=>{
                console.log(err);
            })
        },
        getRoles: function(roles) {
         let rolesString = ', '
         
        roles.forEach((role, index) => {
          
            rolesString=rolesString+role.name;
          
                
        })
        return rolesString
    },
    },
    
    mounted:function(){
        this.read();
        console.log('Component Load');
    }
}
</script>