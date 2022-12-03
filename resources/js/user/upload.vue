<template>
    <form style="background: white; padding: 40px; border-radius: 20px;">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input accept=".zip" v-on:change="fileUpload($event)" name="files" type="file" id="files" class="form-control" required/>
            <label class="form-label" for="username">User Name</label>
          </div>
          <button type="submit" v-on:click="submitForm()"  class="btn btn-primary btn-block mb-4">Upload</button>

    </form>
</template>

<script>
export default {
data: function(){
    return{
        files: []
    }
},
methods: {
    fileUpload(ev){
        let f= ev.target.files || e.dataTransfer.files;
        if(!file.length)
            return;

        this.files += f;
    },
    submitForm(){
        // ajax call
    }
}
}
</script>

<style>

</style>
