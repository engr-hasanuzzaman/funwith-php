<template>
  <form class="form" @submit.prevent="loginHandler">
    <h1 class="h3 mb-3 fw-normal">Please Login</h1>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input
      type="email"
      id="inputEmail"
      class="form-control"
      placeholder="Email address"
      required=""
      v-model="email"
    />
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input
      type="password"
      id="inputPassword"
      class="form-control"
      placeholder="Password"
      required=""
      v-model="password"
    />
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
</template>

<script>
import { ref } from "@vue/reactivity";
import axios from "axios";
import { useRouter } from 'vue-router';
export default {
  name: "Login",
  setup() {
    const email = ref("");
    const password = ref("");
    const route = useRouter();

    const loginHandler = async () => {
      await axios.post("http://localhost/api/login", {
        email: email.value,
        password: password.value
      });

      await route.push('/profile');
    };

    return {
      email,
      password,
      loginHandler
    }
  },
};
</script>

<style scoped>
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form {
  width: 40%;
  margin: auto;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>>
