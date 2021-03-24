import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Register from "@/public/Register.vue";
import Login from "@/public/Login.vue";
import Profile from "@/secure/Profile.vue";
import Secure from "@/secure/Secure.vue";
import Dashboard from "@/secure/dashboard/Dashboard.vue";
import Users from "@/secure/user/Users.vue";
import UserCreate from "@/secure/user/UserCreate.vue";
import UserEdit from "@/secure/user/UserEdit.vue";
import Roles from "@/secure/role/Roles.vue";
import NewRole from "@/secure/role/RoleCreate.vue";


const routes: Array<RouteRecordRaw> = [
  { path: '/register', component: Register },
  { path: '/login', component: Login },

  {
    path: '/',
    component: Secure,
    children: [
      { path: '/profile', component: Profile },
      { path: '/users', component: Users },
      { path: '/users/new', component: UserCreate },
      { path: '/users/:id/edit', component: UserEdit },
      { path: '/roles', component: Roles },
      { path: '/roles/new', component: NewRole },
      { path: '/roles/:id/edit', component: UserEdit },
      { path: '', component: Dashboard },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
