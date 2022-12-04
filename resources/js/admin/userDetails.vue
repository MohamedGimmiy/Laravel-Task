<template>
    <div class="container">
        <div class="row">
            <div class="offset-2"></div>
            <div class="col-7">
                <input class="form form-control" type="text" v-on:change="filterUsers" placeholder="Filter users...">
            </div>
            <div class="col-3">
                <button class="btn btn-success" v-on:click="createUser">Create User</button>
            </div>

        </div>
        <div class="container" v-for="(userObj, index) in filtered" :key="userObj.user.id">

            <div class="row">
                <div class="col-6 offset-3">
                    <div class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{  (index  +  1)  }}</th>
                                <td>{{ userObj.user.username }}</td>
                                <td>{{ userObj.user.firstname }}</td>
                                <td>{{ userObj.user.lastname }}</td>
                                <td>{{ userObj.user.email }}</td>
                                <td>
                                    <button class="ml-4 btn btn-primary block" @click="updateUser(userObj.user)">Edit</button>
                                    <button class="btn btn-danger block" @click="deleteUser(userObj.user)">Delete</button>
                                    <button class="btn btn-info" @click="uploadFile(userObj.user)">Upload File</button>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Size</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(file, i) in userObj.user.files" :key="i">
                                <th scope="row">{{  (i  +  1)  }}</th>
                                <td>{{ file.name }}</td>
                                <td>{{ file.type }}</td>
                                <td>{{ file.size }}</td>
                                <td>
                                    <button class="btn btn-danger block" @click="deleteFile(file)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            info: [],
            filtered: []// by user
        }
    },
    methods: {
        getinfo() {
            axios.get('http://localhost:8000/api/info').then(res => {
                if (res.status == 200) {
                    this.info = res.data.info;
                    this.filtered = this.info;
                } else {
                    console.log(res);
                }
            });
        },
        deleteFile(file) {
            // Ajax call
            axios.delete('http://localhost:8000/api/file/' + file.id).then(res => {
                alert('file deleted successfully!');
                this.getinfo();
            });
        },
        uploadFile(user){
            this.$router.push({name: 'uploadUserFile', params: {user}})
        },
        deleteUser(user){
            axios.delete('http://localhost:8000/api/user/' + user.id).then(res => {
                if(res.status == 200){
                    alert('user deleted successfully!');
                    this.getinfo();
                }
            });
        },
        updateUser(user){
            this.$router.push({name: 'editUser', params: {user}})
        },
        createUser(){
            this.$router.push('/admin/user/create');
        },
        filterUsers(event) {
            // filter by name
            this.filtered = this.info.filter(obj => {
                return (obj.user.username.indexOf(event.target.value) == -1 ? false : true)
            });
        }
    },
    mounted() {
        this.getinfo();
    }

}
</script>

<style>

</style>
