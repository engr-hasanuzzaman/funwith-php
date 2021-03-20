<template>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.role.name }}</td>
          <td>
            <button
              class="btn btn-small btn-outline-secondary mx-2"
              @click="editUsere(user.id)"
            >
              Edit
            </button>
            <button
              class="btn btn-small btn-danger btn-outline-secondary"
              @click="deleteUsere(user.id)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <nav class="navbar navbar-expand">
      <ul class="nav">
        <li class="nav-item">
          <a
            href="javascript:void(0)"
            class="nav-link"
            @click="prevPage"
            v-bind:class="{ disable: !hasPrevPage() }"
            >Previoust</a
          >
        </li>
        <li class="nav-item">
          <a
            href="javascript:void(0)"
            v-bind:class="{ disable: !hasNextPage() }"
            class="nav-link"
            @click="nextPage"
            >Next</a
          >
        </li>
      </ul>
    </nav>
  </div>
</template>

<script lang="ts">
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import axios from "axios";
export default {
  name: "Users",
  setup() {
    const users = ref([]);
    const links = ref({} as { next: string; prev: string });

    onMounted(async () => {
      const response = await axios.get("users");
      users.value = response.data.data;
      links.value = response.data.links;
    });

    const nextPage = async () => {
      debugger;
      if (!links.value.next) return;
      const response = await axios.get(links.value.next);
      users.value = response.data.data;
      links.value = response.data.links;
    };

    const prevPage = async () => {
      if (!links.value.prev) return;
      const response = await axios.get(links.value.prev);
      users.value = response.data.data;
      links.value = response.data.links;
    };

    const hasNextPage = () => {
      return links.value.next !== undefined && links.value.next !== null;
    };

    const hasPrevPage = () => {
      return links.value.prev !== undefined && links.value.prev !== null;
    };

    return {
      users,
      links,
      nextPage,
      prevPage,
      hasNextPage,
      hasPrevPage,
    };
  },
};
</script>

<style>
.nav-link {
  cursor: pointer;
}
.disable {
  color: gray;
  cursor: default;
}
.disable:hover {
  color: gray;
}
</style>