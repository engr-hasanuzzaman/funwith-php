<template>
  <form @submit="handleSubmit" class="form">
    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
    <label for="inputName" class="visually-hidden">Name</label>
    <input
      type="text"
      id="inputName"
      class="form-control"
      placeholder="Name"
      required=""
      v-model="name"
    />
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
    <label for="passwordConfirm" class="visually-hidden"
      >Confirm Password</label
    >
    <input
      type="password"
      id="passwordConfirm"
      class="form-control"
      placeholder="Confirm Password"
      required=""
      v-model="passwordConfirm"
    />

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  </form>
</template>

<script>
import { ref } from 'vue';

export default {
    name: "Register",
    setup() {
        const name = ref('');
        const email = ref('');
        const password = ref('');
        const passwordConfirm = ref('');
        const handleSubmit = (e) => {
            e.preventDefault();
            console.log({
                name,
                email,
                password,
                passwordConfirm
            });
        }
        return {
            name,
            email,
            password,
            passwordConfirm,
            handleSubmit
        }
    },
}
</script>

<style>
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
};

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
