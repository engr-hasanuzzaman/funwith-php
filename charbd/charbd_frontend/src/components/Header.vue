<template>
  <header
    class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
  >
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"
      >Company name</a
    >
    <button
      class="navbar-toggler position-absolute d-md-none collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu"
      aria-controls="sidebarMenu"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <input
      class="form-control form-control-dark w-100"
      type="text"
      placeholder="Search"
      aria-label="Search"
    />
    <nav class="navbar navbar-expand-sm">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <router-link to="profile" class="nav-link">
            {{ user?.name }}
          </router-link>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="javascript:void(0)" @click.prevent="logout"
            >Sign out</a
          >
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
import { useRouter } from "vue-router";
export default {
  name: "Header",
  setup() {
    const route = useRouter();
    const logout = async () => {
      localStorage.clear();
      await route.push("/login");
    };

    return {
      logout,
    };
  },
  props: ["user"],
};
</script>
