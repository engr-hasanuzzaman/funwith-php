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
      <select name="role_id" id="roleid">
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
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

<script>
import { ref } from '@vue/reactivity';
export default {
  name: 'UserCreate',
  setup() {
    const name = ref('');
    const email = ref('');
    const roleId = ref(0);
    const password = ref('');
    const confirmPassword = ref('');

    return {
      name,
      email,
      roleId,
      password,
      confirmPassword
    }
  }
};
</script>

<style>
</style>