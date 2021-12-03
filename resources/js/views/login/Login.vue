<template>
    <div class="auth-wrap">
        <h1>Авторизация</h1>
        <form>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" v-model="formLogin.email" class="form-control" id="email" name="email" placeholder="Введите почту">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" v-model="formLogin.password" class="form-control" id="password" name="password" placeholder="Введите пароль">
            </div>
            <div class="form-group d-flex flex-column text-center">
                <button type="submit" class="btn btn-primary" @click.prevent="loginHandler">Войти</button>
                <router-link :to="{name: 'user.registration'}" class="nav-link mt-2">Нету аккаунта? Создать</router-link>
            </div>
        </form>
    </div>
</template>

<script>
import ButtonSpinner from 'vue-button-spinner';
import {mapActions} from "vuex";

export default {
    name: "Login",
    components: {
        ButtonSpinner
    },
    data(){
        return {
            formLogin: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        ...mapActions(['LOGIN_USER']),
        loginHandler() {
            this.LOGIN_USER(this.formLogin)
                .then(response => {
                    this.$toast.success(`Добро пожаловать! ${response}`)
                    this.$router.push({'name': 'user.profile'})
                }).catch(error => {
                if(error.response.status === 422)
                {
                    this.$toast.error(error.response.data.message)
                    this.errors = error.response.data.errors;
                }
            })
        }
    }
}
</script>

<style scoped>
.form-group {
    margin-top: 10px;
}
.auth-wrap{
    width: 500px;
    margin: 0 auto;
}
</style>
