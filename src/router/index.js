import Vue from 'vue'
import Router from 'vue-router'
import VueResource from 'vue-resource'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

//  manage

import manage from '../components/manage/manage.vue'
import manageDir from '../components/manage/manageDir.vue'
import dirUpdate from '../components/manage/dirUpdate.vue'
import dirAdd from '../components/manage/dirAdd.vue'

import manageStage from '../components/manage/manageStage.vue'
import stageUpdate from '../components/manage/stageUpdate.vue'
import stageAdd from '../components/manage/stageAdd.vue'

import manageClasses from '../components/manage/manageClasses.vue'


import manageStudent from '../components/manage/manageStudent.vue'
import studentAdd from '../components/manage/studentAdd.vue'
import index from '../components/manage/index.vue'

import manageTeacher from '../components/manage/manageTeacher.vue'
import teacherAdd from '../components/manage/teacherAdd.vue'


// teacher

import teacher from '../components/teacher/teacher.vue'
import manageType from '../components/teacher/manageType.vue'
import typeAdd from '../components/teacher/typeAdd.vue'
import manageTest from '../components/teacher/manageTest.vue'
import testAdd from '../components/teacher/testAdd.vue'
import managePaper from '../components/teacher/managePaper.vue'
import editPaper from '../components/teacher/editPaper.vue'

import login from '../components/login/login.vue'

// student
import Student from '../components/student/student.vue'
import studentExam from '../components/student/studentExam.vue'
import studentPaper from '../components/student/studentPaper.vue'


Vue.use(Router)
Vue.use(VueResource)
Vue.use(ElementUI)
export default new Router({
    routes: [
        {
            path: '/student',
            name: 'student',
            component: Student,
            children: [
                {
                    path: 'studentExam',
                    name: 'studentExam',
                    component: studentExam
                },
                {
                    path: 'studentPaper',
                    name: 'studentPaper',
                    component: studentPaper
                }
            ]
        },
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
                    path: 'manageStage',
                    name: 'manageStage',
                    component: manageStage
                },
                {
                    path: 'dirUpdate',
                    name: 'dirUpdate',
                    component: dirUpdate
                },
                {
                    path: 'dirAdd',
                    name: 'dirAdd',
                    component: dirAdd
                },
                {
                    path: 'stageUpdate',
                    name: 'stageUpdate',
                    component: stageUpdate
                },
                {
                    path: 'stageAdd',
                    name: 'stageAdd',
                    component: stageAdd
                },
                {
                    path: 'manageClasses',
                    name: 'manageClasses',
                    component: manageClasses
                },
                {
                    path: 'manageStudent',
                    name: 'manageStudent',
                    component: manageStudent
                },
                {
                    path: 'studentAdd',
                    name: 'studentAdd',
                    component: studentAdd
                },
                {
                    path: 'index',
                    name: 'index',
                    component: index
                },
                {
                    path: 'manageTeacher',
                    name: 'manageTeacher',
                    component: manageTeacher
                },
                {
                    path: 'teacherAdd',
                    name: 'teacherAdd',
                    component: teacherAdd
                }

            ]
        },
        {
            path: '/teacher',
            name: 'teacher',
            component: teacher,
            children: [
                {
                    path: 'manageType',
                    name: 'manageType',
                    component: manageType,
                },
                {
                    path: 'typeAdd',
                    name: 'typeAdd',
                    component: typeAdd,
                },
                {
                    path: 'manageTest',
                    name: 'manageTest',
                    component: manageTest,
                },
                {
                    path: 'testAdd',
                    name: 'testAdd',
                    component: testAdd,
                },
                {
                    path: 'managePaper',
                    name: 'managePaper',
                    component: managePaper,
                },
                {
                    path: 'editPaper',
                    name: 'editPaper',
                    component: editPaper
                }
            ]
        }
    ]
})
