<template>
    <div class="auth-wrap">
        <h1>Регистрация</h1>
        <form>
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input type="text" v-model="form.name" class="form-control" id="name" name="name" placeholder="Введите ваше имя">
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" v-model="form.email" class="form-control" id="email" name="email" placeholder="Введите почту">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" v-model="form.password" class="form-control" id="password" name="password" placeholder="Введите пароль">
            </div>
            <div class="form-group">
                <label for="password_confirm">Подтвердите пароль</label>
                <input type="password" v-model="form.password_confirm" class="form-control" id="password_confirm" name="password_confirm" placeholder="Введите подтверждение пароля">
            </div>
            <div class="form-group d-flex flex-column text-center">
                <button type="submit" class="btn btn-primary" @click.prevent="registerHandler">Зарегистрироваться</button>
                <router-link :to="{name: 'user.login'}" class="nav-link mt-2">Есть аккаунт? Войти</router-link>
            </div>
        </form>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    name: "Registration",
    data(){
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirm: '',
            },
            errors: [],
        }
    },
    methods: {
        ...mapActions(['REGISTER_USER']),
        registerHandler() {
            this.REGISTER_USER(this.form)
                .then(response => {
                    this.$toast.success('Добро пожаловать ')
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
    .form-group{
        margin-top: 10px;
    }
    .auth-wrap{
        width: 500px;
        margin: 0 auto;
    }
</style>
