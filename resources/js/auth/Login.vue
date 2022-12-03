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
              <button type="submit"   class="btn btn-primary btn-block mb-4">Login</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
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
            const formData = new FormData();
            formData.append("name", this.username);
            formData.append("order", this.password);
            axios.get('http://localhost:8000/api/login/' + this.username, formData).then(res => {
                if (res.status == 200) {
                    this.$router.push('categories');
                } else{
                    alert('user or password is not correct!');
                }
            })
        },
        validate(){
            return true;
        }
    }

}
</script>

<style>
</style>
