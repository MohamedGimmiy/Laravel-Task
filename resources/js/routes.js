

import Login from '../js/auth/Login.vue';
import Register from '../js/auth/Register.vue';
import Upload from '../js/user/upload.vue';


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
            
        }

    ]
};


