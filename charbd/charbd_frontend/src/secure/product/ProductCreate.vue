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
      <label for="description">Description</label>
      <textarea
        name="description"
        id="description"
        cols="30"
        rows="10"
        v-model="description"
        class="form-control"
      ></textarea>
    </div>
    <div class="form-group">
      <label for="image_url">Image URL</label>
      <input
        type="text"
        placeholder="image url"
        id="image_url"
        class="form-control"
        v-model="image_url"
        required
      />
    </div>
    <div class="form-group">
      <label for="price">price</label>
      <input
        type="number"
        placeholder="price"
        id="price"
        class="form-control"
        v-model="price"
      />
    </div>
    <div class="form-group">
      <button type="submit" class="form-control">Submit</button>
    </div>
  </form>
</template>

<script lang="ts">
import { ref } from "@vue/reactivity";
import axios from "axios";
import { useRouter } from "vue-router";

export default {
  name: "UserCreate",
  setup() {
    const name = ref("");
    const description = ref("");
    const image_url = ref("");
    const price = ref(0);
    const router = useRouter();

    // create a new user
    const submitHandler = async () => {
      await axios.post("products", {
        name: name.value,
        description: description.value,
        price: price.value,
        image_url: image_url.value,
      });

      await router.push("/users");
    };

    return {
      name,
      description,
      image_url,
      price,
      submitHandler,
    };
  },
};
</script>

<style>
</style>