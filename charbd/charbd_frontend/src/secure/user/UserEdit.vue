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
        readonly
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
      <button type="submit" class="form-control">Update</button>
    </div>
  </form>
</template>

<script lang="ts">
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import axios from "axios";
import { Role } from "@/classes/role";
import { useRoute, useRouter } from "vue-router";
import { User } from '@/classes/user';

export default {
  name: "UserCreate",
  setup() {
    const name = ref("");
    const email = ref("");
    const roleId = ref(0);
    const router = useRouter();
    const { params } = useRoute();
    // fetch the role ids
    const roles = ref([] as Role[]);
    onMounted(async () => {
      const response = await axios.get("roles");
      roles.value = response.data.data as Role[];

      const userResp = await axios.get(`/users/${params.id}`);
      const user: User = userResp.data;
      name.value = user.name;
      email.value = user.email;
      roleId.value = user.role.id;
      name.value = user.name;
    });

    // create a new user
    const submitHandler = async () => {
      await axios.put(`users/${params.id}`, {
        name: name.value,
        email: email.value,
        role_id: roleId.value,
      });

      await router.push("/users");
    };

    return {
      name,
      email,
      roleId,
      roles,
      submitHandler,
    };
  },
};
</script>

<style>
</style>