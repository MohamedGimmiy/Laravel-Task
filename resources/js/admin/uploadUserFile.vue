<template>
      <div>
        <form enctype="multipart/form-data" style="background: white; padding: 40px; border-radius: 20px;">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input accept=".zip" @change="fileUpload" name="file" type="file" id="file" class="form-control" required/>
                <label class="form-label" for="Upload File">Upload A Zip File</label>
              </div>
              <button type="button" v-on:click="submitForm"  class="btn btn-primary btn-block mb-4">Upload</button>
        </form>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>{{JSON.stringify(info)}}</h4>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function(){
        return{
            file: '',
            info: ''
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
            formData.append('type', this.file.type);
            formData.append('size', this.file.size);
            formData.append('user_id', parseInt(this.user.id));
            let settings = { headers: { 'content-type': 'multipart/form-data' } }

                axios.post('http://localhost:8000/api/user', formData, settings).then(res=>{
                    if(res.status == 200){
                        console.log(res)
                        alert('file uploaded successfully!' + JSON.stringify(res.data))
                        this.getinfo();
                    }else{
                        console.log(res);
                    }
                });
        },
        getinfo(){
            axios.get('http://localhost:8000/api/info').then(
                res=>{
                    if(res.status == 200){
                        console.log(res)
                        this.info = res.data;
                    }else{
                        console.log(res);
                    }
                });
        }
    },
    mounted(){
        this.getinfo();
    }
}
</script>

<style>

</style>
