<template>
    <div id="app">
       <component is="default-layout">
           <router-view />
       </component>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    name: "App",
    mounted() {
        this.GET_USER();
    },
    methods: {
        ...mapActions(['GET_USER'])
    }
}
</script>

<style scoped>

</style>
