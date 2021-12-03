<template>
    <div>
        <h1>Профиль пользователя</h1>
            <div class="profile-card card-text">
                <h5><b>Имя: </b> {{ user.name }}</h5>
                <h5><b>Почта: </b> {{ user.email }}</h5>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters} from 'vuex'
export default {
    name: "Profile",
    computed: {
        ...mapGetters(['user'])
    }
}
</script>

<style scoped>

</style>
