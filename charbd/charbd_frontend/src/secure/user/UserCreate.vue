<template>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" placeholder="name" id="name" class="form-control" v-model="name"/>
    </div>
    <div class="form-group">
      <label for="email">Name</label>
      <input type="email" placeholder="email" id="email" class="form-control"  v-model="email"/>
    </div>
    <div class="form-group">
      <label for="roleid">Name</label>
      <select name="role_id" id="roleid" class="form-control">
        <option v-for="role in roles" :value="role.i" :key="role.id">{{ role.name }}</option>
      </select>
    </div>
    <div class="form-group">
      <label for="password">Name</label>
      <input
        type="password"
        placeholder="password"
        id="password"
        class="form-control"
         v-model="password"
      />
    </div>
    <div class="form-group">
      <label for="confirm-password">Name</label>
      <input
        type="password"
        placeholder="confirm password"
        id="confirm-password"
        class="form-control"
         v-model="confirmPassword"
      />
    </div>
  </form>
</template>

<script lang="ts">
import { ref } from '@vue/reactivity';
import { onMounted } from '@vue/runtime-core';
import axios from 'axios';
import { Role } from '@/classes/role';

export default {
  name: 'UserCreate',
  setup() {
    const name = ref('');
    const email = ref('');
    const roleId = ref(0);
    const password = ref('');
    const confirmPassword = ref('');
    
    // fetch the role ids
    const roles = ref([] as Role[]);
    onMounted(async () => {
      const response = await axios.get('roles');
      roles.value = response.data.data as Role[];
    });

    return {
      name,
      email,
      roleId,
      password,
      confirmPassword,
      roles
    }
  }
};
</script>

<style>
</style>