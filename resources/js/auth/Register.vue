<template>
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">

                <form style="background: white; padding: 40px; border-radius: 20px;">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input v-model="firstname" name="firstname" type="text" id="firstname" class="form-control" required/>
                <label class="form-label" for="username">First Name</label>
              </div>
              <div class="form-outline mb-4">
                <input v-model="lastname" name="lastname" type="text" id="lastname" class="form-control" required/>
                <label class="form-label" for="lastname">Last Name</label>
              </div>

              <div class="form-outline mb-4">
                <input v-model="email" name="email" type="email" id="email" class="form-control"/>
                <label class="form-label" for="email">Email</label>
              </div>
              <div class="form-outline mb-4">
                <input v-model="password" name="password" type="text" id="password" class="form-control" required/>
                <label class="form-label" for="email">password</label>
              </div>
              <div class="form-outline mb-4">
                <input v-model="confirmpassword" name="confirmpassword" type="password" id="confirmpassword" class="form-control" required/>
                <label class="form-label" for="confirmpassword">Confirm password</label>
              </div>

              <!-- Submit button -->
              <button type="submit"  v-on:click="submitForm()" class="btn btn-primary btn-block mb-4">Sign Up</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Already a member? <button @click="() => this.$router.push('register')" >Register</button></p>
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
            firstname:  '',
            lastname: '',
            email: '',
            password: '',
            confirmpassword: '',
        }
    },
    methods: {
        submitForm(){
            const formData = new FormData();
            formData.append("firstname", this.firstname);
            formData.append("lastname", this.lastname);
            formData.append("email", this.email);
            formData.append("password", this.password);
            axios.post('http://localhost:8000/api/register/', formData).then(res => {
                if (res.status == 200) {
                    this.$router.push('home');
                } else{
                    alert('Error occured please try again!');
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
