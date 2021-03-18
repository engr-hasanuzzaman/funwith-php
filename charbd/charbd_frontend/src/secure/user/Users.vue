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
          <td>{{user.name}}</td>
          <td>{{user.email}}</td>
          <td>{{user.role.name}}</td>
          <td>...</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import axios from "axios";
export default {
  name: "Users",
  setup() {
    const users = ref([]);

    onMounted(async () => {
      const response = await axios.get("users");
      users.value = response.data.data;
    });

    return {
      users,
    };
  },
};
</script>

<style>
</style>