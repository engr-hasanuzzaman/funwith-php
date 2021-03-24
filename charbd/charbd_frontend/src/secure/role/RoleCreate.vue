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
      <label for="roleid">Permissions</label>
      <select name="role_id" id="roleid" class="form-control" v-model="permissionIds" multiple>
        <option value="0">Select Permissions</option>
        <option v-for="permission in permissions" :value="permission.id" :key="permission.id">
          {{ permission.name }}
        </option>
      </select>
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
import { Permission } from "@/classes/permission";
import { useRouter } from "vue-router";

export default {
  name: "UserCreate",
  setup() {
    const name = ref("");
    const permissionIds = ref([]);
    const router = useRouter();

    // fetch the role ids
    const permissions = ref([] as Permission[]);
    onMounted(async () => {
      const response = await axios.get("permissions");
      permissions.value = response.data.data as Permission[];
    });

    // create a new user
    const submitHandler = async () => {
      await axios.post("roles", {
        name: name.value,
        permissions: permissionIds.value,
      });

      await router.push("/roles");
    };

    return {
      name,
      permissions,
      permissionIds,
      submitHandler,
    };
  },
};
</script>

<style>
</style>