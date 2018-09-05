import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import CoursesIndex from '../components/cruds/Courses/Index.vue'
import CoursesCreate from '../components/cruds/Courses/Create.vue'
import CoursesShow from '../components/cruds/Courses/Show.vue'
import CoursesEdit from '../components/cruds/Courses/Edit.vue'
import LessonsIndex from '../components/cruds/Lessons/Index.vue'
import LessonsCreate from '../components/cruds/Lessons/Create.vue'
import LessonsShow from '../components/cruds/Lessons/Show.vue'
import LessonsEdit from '../components/cruds/Lessons/Edit.vue'
import CoursescategoriesIndex from '../components/cruds/Coursescategories/Index.vue'
import CoursescategoriesCreate from '../components/cruds/Coursescategories/Create.vue'
import CoursescategoriesShow from '../components/cruds/Coursescategories/Show.vue'
import CoursescategoriesEdit from '../components/cruds/Coursescategories/Edit.vue'
import TrailsIndex from '../components/cruds/Trails/Index.vue'
import TrailsCreate from '../components/cruds/Trails/Create.vue'
import TrailsShow from '../components/cruds/Trails/Show.vue'
import TrailsEdit from '../components/cruds/Trails/Edit.vue'
import TrailscategoriesIndex from '../components/cruds/Trailscategories/Index.vue'
import TrailscategoriesCreate from '../components/cruds/Trailscategories/Create.vue'
import TrailscategoriesShow from '../components/cruds/Trailscategories/Show.vue'
import TrailscategoriesEdit from '../components/cruds/Trailscategories/Edit.vue'
import DatacoursesIndex from '../components/cruds/Datacourses/Index.vue'
import DatacoursesCreate from '../components/cruds/Datacourses/Create.vue'
import DatacoursesShow from '../components/cruds/Datacourses/Show.vue'
import DatacoursesEdit from '../components/cruds/Datacourses/Edit.vue'
import DatatrailsIndex from '../components/cruds/Datatrails/Index.vue'
import DatatrailsCreate from '../components/cruds/Datatrails/Create.vue'
import DatatrailsShow from '../components/cruds/Datatrails/Show.vue'
import DatatrailsEdit from '../components/cruds/Datatrails/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/courses', component: CoursesIndex, name: 'courses.index' },
    { path: '/courses/create', component: CoursesCreate, name: 'courses.create' },
    { path: '/courses/:id', component: CoursesShow, name: 'courses.show' },
    { path: '/courses/:id/edit', component: CoursesEdit, name: 'courses.edit' },
    { path: '/lessons', component: LessonsIndex, name: 'lessons.index' },
    { path: '/lessons/create', component: LessonsCreate, name: 'lessons.create' },
    { path: '/lessons/:id', component: LessonsShow, name: 'lessons.show' },
    { path: '/lessons/:id/edit', component: LessonsEdit, name: 'lessons.edit' },
    { path: '/coursescategories', component: CoursescategoriesIndex, name: 'coursescategories.index' },
    { path: '/coursescategories/create', component: CoursescategoriesCreate, name: 'coursescategories.create' },
    { path: '/coursescategories/:id', component: CoursescategoriesShow, name: 'coursescategories.show' },
    { path: '/coursescategories/:id/edit', component: CoursescategoriesEdit, name: 'coursescategories.edit' },
    { path: '/trails', component: TrailsIndex, name: 'trails.index' },
    { path: '/trails/create', component: TrailsCreate, name: 'trails.create' },
    { path: '/trails/:id', component: TrailsShow, name: 'trails.show' },
    { path: '/trails/:id/edit', component: TrailsEdit, name: 'trails.edit' },
    { path: '/trailscategories', component: TrailscategoriesIndex, name: 'trailscategories.index' },
    { path: '/trailscategories/create', component: TrailscategoriesCreate, name: 'trailscategories.create' },
    { path: '/trailscategories/:id', component: TrailscategoriesShow, name: 'trailscategories.show' },
    { path: '/trailscategories/:id/edit', component: TrailscategoriesEdit, name: 'trailscategories.edit' },
    { path: '/datacourses', component: DatacoursesIndex, name: 'datacourses.index' },
    { path: '/datacourses/create', component: DatacoursesCreate, name: 'datacourses.create' },
    { path: '/datacourses/:id', component: DatacoursesShow, name: 'datacourses.show' },
    { path: '/datacourses/:id/edit', component: DatacoursesEdit, name: 'datacourses.edit' },
    { path: '/datatrails', component: DatatrailsIndex, name: 'datatrails.index' },
    { path: '/datatrails/create', component: DatatrailsCreate, name: 'datatrails.create' },
    { path: '/datatrails/:id', component: DatatrailsShow, name: 'datatrails.show' },
    { path: '/datatrails/:id/edit', component: DatatrailsEdit, name: 'datatrails.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
