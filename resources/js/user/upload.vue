<template>
    <form enctype="multipart/form-data" style="background: white; padding: 40px; border-radius: 20px;">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input accept=".zip" @change="fileUpload" name="file" type="file" id="file" class="form-control" required/>
            <label class="form-label" for="Upload File">Upload A Zip File</label>
          </div>
          <button type="button" v-on:click="submitForm"  class="btn btn-primary btn-block mb-4">Upload</button>

    </form>
</template>

<script>
export default {
data: function(){
    return{
        file: ''
    }
},
methods: {
    fileUpload(ev){
        console.log(ev.target.files[0])
        this.file = ev.target.files[0];
    },
    submitForm(e){
        // ajax call
        e.preventDefault();
        const formData = new FormData();
        formData.append('file', this.file);
        formData.append('size', this.file.size);
        formData.append('type', this.file.type);
        formData.append('user_id', localStorage.getItem('user_id'));
        let settings = { headers: { 'content-type': 'multipart/form-data' } }

            axios.post('http://localhost:8000/api/upload', formData, settings).then(res=>{
                if(res.status == 200){
                    console.log(res)
                    console.log('file uploaded successfully!' + JSON.stringify(res))
                }else{
                    console.log(res);
                }
            });
    }
}
}
</script>

<style>

</style>
