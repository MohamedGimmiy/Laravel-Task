<template>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">

                <form style="background: white; padding: 40px; border-radius: 20px;">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input v-model="username" name="username" type="text" id="username" class="form-control" required/>
                <label class="form-label" for="username">User Name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input v-model="password" name="password" type="password" id="password" class="form-control" required/>
                <label class="form-label" for="form2Example2">Password</label>
              </div>

              <!-- Submit button -->
              <button type="button" v-on:click="submitForm()"  class="btn btn-primary btn-block mb-4">Login</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <button v-on:click="$router.push('/register')">Register</button></p>
              </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            username:  '',
            password: ''
        }
    },
    methods: {
        submitForm(){

            if(!this.validate()){
                return;
            }
            const formData = new FormData();
            formData.append("username", this.username);
            formData.append("password", this.password);

            axios.post('http://localhost:8000/api/login/', formData).then(res => {
                if (res.status == 200 && res.data.status != 'faild') {
                    alert('success'+ JSON.stringify(res.data))
                    localStorage.setItem('user_id',res.data.user_id);
                    this.$router.push('home');
                } else{
                    alert('user or password is not correct!');
                }
            })
        },
        validate(){

            if(this.username && this.password){
                return true;
            }
            else {
                alert('please fill all fields');
                return false;
            }
        }
    }

}
</script>

<style>
</style>
