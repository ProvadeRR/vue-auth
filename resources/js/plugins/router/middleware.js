export const guestMiddleware = (to, from , next) => {
    const token = localStorage.getItem('token');
    if(token)
        return next({name: 'user.profile'})
    next();
}

export const authMiddleware = (to , from , next) => {
    const token = localStorage.getItem('token');
    if(!token)
        return next({name: 'user.login'})
    next();
}
