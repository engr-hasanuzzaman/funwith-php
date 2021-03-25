<template>
  <nav
    id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
  >
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <router-link class="nav-link" to="/" active-class="" exact>
            Dashboard
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/users" active-class="">
            Users
          </router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/roles" active-class="">
            Roles
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Menu",
};
</script>

<style scoped>
.sidebar .nav-link.router-link-exact-active {
  color: #007bff;
}
</style>
