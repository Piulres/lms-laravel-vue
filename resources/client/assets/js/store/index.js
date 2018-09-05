import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import CoursesIndex from './modules/Courses'
import CoursesSingle from './modules/Courses/single'
import LessonsIndex from './modules/Lessons'
import LessonsSingle from './modules/Lessons/single'
import CoursescategoriesIndex from './modules/Coursescategories'
import CoursescategoriesSingle from './modules/Coursescategories/single'
import TrailsIndex from './modules/Trails'
import TrailsSingle from './modules/Trails/single'
import TrailscategoriesIndex from './modules/Trailscategories'
import TrailscategoriesSingle from './modules/Trailscategories/single'
import DatacoursesIndex from './modules/Datacourses'
import DatacoursesSingle from './modules/Datacourses/single'
import DatatrailsIndex from './modules/Datatrails'
import DatatrailsSingle from './modules/Datatrails/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        CoursesIndex,
        CoursesSingle,
        LessonsIndex,
        LessonsSingle,
        CoursescategoriesIndex,
        CoursescategoriesSingle,
        TrailsIndex,
        TrailsSingle,
        TrailscategoriesIndex,
        TrailscategoriesSingle,
        DatacoursesIndex,
        DatacoursesSingle,
        DatatrailsIndex,
        DatatrailsSingle,
    },
    strict: debug,
})
