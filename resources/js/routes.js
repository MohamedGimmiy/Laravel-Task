

import Login from '../js/auth/Login.vue';
import Register from '../js/auth/Register.vue';
import Upload from '../js/user/upload.vue';
import Files from '../js/user/files.vue';
import Home from '../js/user/home.vue';


import AdminUsers from '../js/admin/userDetails.vue';


export default {
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/upload',
            name: 'upload',
            component: Upload
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        }, {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/resources',
            name: 'resources',
            component: Files
        },
        {
            path: '/admin/users',
            name: 'adminUsers',
            component: AdminUsers
        },


    ]
};


