<template>
    <div class="container">
        <div>
            <input class="form form-control" type="text" v-on:change="filterFiles" placeholder="Filter files...">
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
                        <tr v-for="(file, index) in filtered" :key="file.id">
                            <th scope="row">{{(index+1)}}</th>
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
</template>

<script>

export default {
    data() {
        return {
            files: [],
            filtered: []
        }
    },
    methods: {
        showFiles(){
            axios.get('http://localhost:8000/api/files').then(res => {
                this.files = res.data.files;
                this.filtered = this.files;
            });
        },
        deleteFile(file) {
            // ajax call
            axios.delete('http://localhost:8000/api/file/' + file.id).then(res => {
                alert('file deleted successfully!');
                this.showFiles();
            });
        },
        filterFiles(event) {
            // filter by name
            this.filtered = this.files.filter(file => {
                return (file.name.indexOf(event.target.value) == -1? false: true)
            });

        }
    },
    mounted(){
        this.showFiles();
    }
}
</script>

<style>

</style>
