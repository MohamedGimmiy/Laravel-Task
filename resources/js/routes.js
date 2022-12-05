

import Login from '../js/auth/Login.vue';
import Register from '../js/auth/Register.vue';
import Upload from '../js/user/upload.vue';
import Files from '../js/user/files.vue';
import Home from '../js/user/home.vue';
import  Processing  from '../js/user/processing.vue'
//Admin
//1. show all users with files related
import AdminUsers from '../js/admin/userDetails.vue';

//3. create a user
import createUser from '../js/admin/createUser.vue';

//2. edit user
import editUser from '../js/admin/editUser.vue';

//3. upload a file to a user
import uploadUserFile from './admin/uploadUserFile.vue';



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
            path: '/processing',
            name: 'processing',
            component: Processing
        },
        {
            path: '/admin/users',
            name: 'adminUsers',
            component: AdminUsers
        },
        {
            path: '/admin/user/edit',
            'name': 'editUser',
            component: editUser,
            props: true
        },
        {
            path: '/admin/user/create',
            name: 'createUser',
            component: createUser
        },
        {
            path: '/admin/user/upload',
            name: 'uploadUserFile',
            component: uploadUserFile,
            props: true
        },


    ]
};


