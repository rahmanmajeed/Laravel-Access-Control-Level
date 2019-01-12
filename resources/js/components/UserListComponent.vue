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
                    <tr></tr>
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
                console.log(response.data);
            })
            .catch(err=>{
                console.log(err);
            })
        }
    },
    mounted:function(){
        this.read();
        console.log('Component Load');
    }
}
</script>