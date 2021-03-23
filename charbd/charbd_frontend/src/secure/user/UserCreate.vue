<template>
  <form @submit.prevent="submitHandler">
    <div class="form-group">
      <label for="name">Name</label>
      <input
        type="text"
        placeholder="name"
        id="name"
        class="form-control"
        v-model="name"
        required
      />
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input
        type="email"
        placeholder="email"
        id="email"
        class="form-control"
        v-model="email"
      />
    </div>
    <div class="form-group">
      <label for="roleid">Role</label>
      <select name="role_id" id="roleid" class="form-control" v-model="roleId">
        <option value="0">Select a role</option>
        <option v-for="role in roles" :value="role.id" :key="role.id">
          {{ role.name }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input
        type="password"
        placeholder="password"
        id="password"
        class="form-control"
        v-model="password"
      />
    </div>
    <div class="form-group">
      <label for="confirm-password">Confirm Password</label>
      <input
        type="password"
        placeholder="confirm password"
        id="confirm-password"
        class="form-control"
        v-model="confirmPassword"
      />
    </div>
    <div class="form-group">
      <button type="submit" class="form-control">Submit</button>
    </div>
  </form>
</template>

<script lang="ts">
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import axios from "axios";
import { Role } from "@/classes/role";

export default {
  name: "UserCreate",
  setup() {
    const name = ref("");
    const email = ref("");
    const roleId = ref(0);
    const password = ref("");
    const confirmPassword = ref("");

    // fetch the role ids
    const roles = ref([] as Role[]);
    onMounted(async () => {
      const response = await axios.get("roles");
      roles.value = response.data.data as Role[];
    });

    // create a new user
    const submitHandler = async () => {
      const response = await axios.post("users", {
        name: name.value,
        email: email.value,
        role_id: roleId.value,
        password: password.value,
        confirm_password: confirmPassword.value,
      });
    };

    return {
      name,
      email,
      roleId,
      password,
      confirmPassword,
      roles,
      submitHandler,
    };
  },
};
</script>

<style>
</style>