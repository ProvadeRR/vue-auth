<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <router-link class="navbar-brand" :to="{name: 'index'}">VueAuth</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" v-if="isAuth" :class="{active: $route.name === 'index'}"  :to="{name: 'index'}">Главная</router-link>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link class="nav-link" v-if="isAuth" :class="{active: $route.name === 'user.profile'}" aria-current="page" :to="{name: 'user.profile'}">Профиль</router-link>
                </li>
                <li class="nav-item">
                    <a href="#" v-if="isAuth" class="nav-link" @click.prevent="logoutHandler">Выйти</a>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" v-if="!isAuth" :class="{active: $route.name === 'user.login'}" aria-current="page" :to="{name: 'user.login'}">Авторизация</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" v-if="!isAuth" :class="{active: $route.name === 'user.registration'}" aria-current="page" :to="{name: 'user.registration'}">Регистрация</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    name: "Navbar",
    methods: {
        ...mapActions(['LOGOUT_USER']),
        logoutHandler(){
            this.LOGOUT_USER()
            .then(res => {
                this.$toast.success('Вы успешно вышли из системы')
                this.$router.push({'name': 'user.login'})
            }).catch(err => {
                console.log(err)
            })
        }
    },
    computed: {
        ...mapGetters(['isAuth'])
    }
}
</script>

<style scoped>

</style>
