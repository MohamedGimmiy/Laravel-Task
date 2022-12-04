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
                <input v-model="username" name="username" type="text" id="username" class="form-control" required/>
                <label class="form-label" for="username">User Name</label>
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
              <button type="button"  v-on:click="submitForm()" class="btn btn-success btn-block mb-4">Create</button>

            </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function(){
        return {
            firstname:  this.user.firstname,
            lastname: this.user.lastname,
            username: this.user.username,
            email: this.user.email,
            password: '',
            confirmpassword: '',
        }
    },
    methods: {
        submitForm(){

            if(!this.validate()){
                return;
            }

            axios.put('http://localhost:8000/api/user/update/'+ this.user.id, {
                'username' : this.username,
                'firstname': this.firstname,
                'lastname': this.lastname,
                "email": this.email,
                'password': this.password,

            }).then(res => {
                if (res.status == 200) {
                    if(res.data.status == 'success')
                        this.$router.push('/admin/users');
                    else
                        alert('Error while editing user')
                } else{
                    alert('Error occured please try again!', res.error);
                }
            })
        },
        validate(){
            if(this.password != this.confirmpassword){
                alert('password is not confirmed well!');
                return false;
            }
            if(this.username && this.firstname && this.lastname && this.username ){
                return true;
            }
            else {
                alert('please fill all fields');
            }
        }
    }

}
</script>

<style>

</style>
