<template>

    <div style="display: flex; flex-direction: column; gap:110px; justify-content: center; align-items: center;">
        <h1>You are logged in!</h1>
          <div style="border: 2px solid white;  padding:20px 40px; border-radius: 10px;   display: flex; align-items: center; justify-content: center;">
            <button class="btn btn-primary block" v-on:click="$router.push('upload')">Upload files page</button>
            <button class="btn btn-info block ml-5" v-on:click="$router.push('allfiles')">All Files</button>
          </div>
    </div>

</template>

<script>
export default {

}
</script>

<style>

</style>
