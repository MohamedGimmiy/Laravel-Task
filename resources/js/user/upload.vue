<template>
    <form style="background: white; padding: 40px; border-radius: 20px;">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input multiple accept=".zip" v-on:change="fileUpload($event)" name="files[]" type="file" id="files" class="form-control" required/>
            <label class="form-label" for="Upload File">Upload A Zip File</label>
          </div>
          <button type="button" v-on:click="submitForm()"  class="btn btn-primary btn-block mb-4">Upload</button>

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
        if(!f.length)
            return;

        this.files += f;
    },
    submitForm(){
        // ajax call
        const formData = new FormData();
        formData.append('files',this.files);
        formData.append('user_id', localStorage.getItem('user_id'))
        if(this.files.length ){
            axios.post('http://localhost:8000/api/upload', formData).then(res=>{
                if(res.status == 200){

                    alert('file uploaded successfully!')
                }else{
                    console.log(res);
                }
            });
        }
    }
}
}
</script>

<style>

</style>
