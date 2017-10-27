<template>
    <div class="wrapper">

        <vue-progress-bar></vue-progress-bar>
        <router-view></router-view>

    </div>
</template>
<script>
    export default {
        mounted () {
            this.$Progress.finish()
        },
        created () {
            this.$Progress.start()
        }
    }
</script>
