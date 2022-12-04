<template>
    <div class="container">
        <div>
            <input type="text" v-on:change="filterFiles($event)">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="file in files" :key="file.id">
                            <th scope="row"></th>
                            <td>{{ file.name }}</td>
                            <td>{{ file.type }}</td>
                            <td>{{ file.size }}</td>
                            <td>
                                <button class="btn btn-danger block" v-on:click="deleteFile(file.id)">Delete</button>
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
            files: []
        }
    },
    methods: {
        deleteFile(id) {
            // ajax call
        },
        filterFiles(event){
            if (event) {
      event.preventDefault()
    }
        }
    }
}
</script>

<style>

</style>
