import {guestMiddleware, authMiddleware} from './middleware'

const routes = [
    {
        path: "/",
        name: 'index',
        component: () => import('../../views/main/Index.vue')
    },
    {
        path: '/login',
        name: 'user.login',
        beforeEnter: guestMiddleware,
        component: () => import('../../views/login/Login')
    },
    {
        path: '/registration',
        name: "user.registration",
        beforeEnter: guestMiddleware,
        component: () => import('../../views/register/Registration')
    },
    {
        path: '/profile',
        name: "user.profile",
        beforeEnter: authMiddleware,
        component: () => import('../../views/profile/Profile')
    }
]

export default routes;
