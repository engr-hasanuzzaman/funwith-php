<template>
  <router-link to="/users/new" class="btn btn-outline-primary mt-4"
    >Add</router-link
  >
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Name</th>
          <th>Permissions</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="role in roles" :key="role.id">
          <td>{{ role.name }}</td>
          <td>{{ role.permissions.map(p => p.name).join(', ') }}</td>
          <td>
            <router-link
              :to="`/roles/${role.id}/edit`"
              class="btn btn-small btn-outline-secondary mx-2"
            >
              Edit
            </router-link>
            <button
              class="btn btn-small btn-danger btn-outline-secondary text-white"
              @click="deleteRole(role.id)"
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
import { Role } from "@/classes/role";

export default {
  name: "Roles",
  setup() {
    const roles = ref([]);
    const links = ref({} as { next: string; prev: string });

    onMounted(async () => {
      const response = await axios.get("roles");
      roles.value = response.data.data;
      links.value = response.data.links;
    });

    const nextPage = async () => {
      if (!links.value.next) return;
      const response = await axios.get(links.value.next);
      roles.value = response.data.data;
      links.value = response.data.links;
    };

    const prevPage = async () => {
      if (!links.value.prev) return;
      const response = await axios.get(links.value.prev);
      roles.value = response.data.data;
      links.value = response.data.links;
    };

    const hasNextPage = () => {
      return links.value.next !== undefined && links.value.next !== null;
    };

    const hasPrevPage = () => {
      return links.value.prev !== undefined && links.value.prev !== null;
    };

    /*
     * users actions
     */


    const deleteRole = async (id: number) => {
      try {
        if (confirm(`Are you sure to delete the Role with id ${id} ?`)) {
          await axios.delete(`roles/${id}`);
          roles.value = roles.value.filter((role: Role) => role.id !== id);
        }
      } catch (error) {
        console.log(`Some error has been happened ${error}`);
      }
    };

    return {
      roles,
      links,
      nextPage,
      prevPage,
      hasNextPage,
      hasPrevPage,
      deleteRole,
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