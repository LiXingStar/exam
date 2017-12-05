import Vue from 'vue'
import Router from 'vue-router'
import ElementUI from 'element-ui'
import VueResource from 'vue-resource'
import 'element-ui/lib/theme-chalk/index.css'

//  manage

import manage from '../components/manage/manage.vue'
import manageDir from '../components/manage/manageDir.vue'
import dirUpdate from '../components/manage/dirUpdate.vue'

import manageStage from '../components/manage/manageStage.vue'

// teacher


import login from '../components/login/login.vue'


Vue.use(Router)
Vue.use(ElementUI)
Vue.use(VueResource)
export default new Router({
    routes: [
        {
            path: '/',
            name: 'login',
            component: login
        },
        {
            path: '/manage',
            name: 'manage',
            component: manage,
            children: [
                {
                    path: 'manageDir',
                    name: 'manageDir',
                    component: manageDir
                },
                {
                    path:'manageStage',
                    name:'manageStage',
                    component: manageStage
                },
                {
                    path:'dirUpdate',
                    name:'dirUpdate',
                    component: dirUpdate
                },
            ]
        }
    ]
})
