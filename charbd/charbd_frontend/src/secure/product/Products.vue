<template>
  <router-link to="/products/new" class="btn btn-outline-primary mt-4"
    >Add</router-link
  >
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.title }}</td>
          <td>{{ product.description }}</td>
          <td> <img :src="product.image_url" alt="img" width="100"></td>
          <td>{{ product.price }}</td>
          <td>
            <router-link
              :to="`/products/${product.titleid}/edit`"
              class="btn btn-small btn-outline-secondary mx-2"
            >
              Edit
            </router-link>
            <button
              class="btn btn-small btn-danger btn-outline-secondary text-white"
              @click="deleteProduct(product.id)"
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
import { Product } from "@/classes/product";

export default {
  name: "Users",
  setup() {
    const products = ref([] as Product[]);
    const links = ref({} as { next: string; prev: string });

    onMounted(async () => {
      const response = await axios.get("products");
      products.value = response.data.data;
      links.value = response.data.links;
    });

    const nextPage = async () => {
      if (!links.value.next) return;
      const response = await axios.get(links.value.next);
      products.value = response.data.data;
      links.value = response.data.links;
    };

    const prevPage = async () => {
      if (!links.value.prev) return;
      const response = await axios.get(links.value.prev);
      products.value = response.data.data;
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

    const deleteProduct = async (id: number) => {
      try {
        if (confirm(`Are you sure to delete the user with id ${id} ?`)) {
          await axios.delete(`users/${id}`);
          products.value = products.value.filter((product: Product) => product.id !== id);
        }
      } catch (error) {
        console.log(`Some error has been happened ${error}`);
      }
    };

    return {
      products,
      links,
      nextPage,
      prevPage,
      hasNextPage,
      hasPrevPage,
      deleteProduct,
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