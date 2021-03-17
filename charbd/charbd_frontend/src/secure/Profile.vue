<template>
  <h1>Wellcome to you</h1>
  <p>Name: <strong>{{profileInfo?.name}}</strong></p>
  <p>Email: <strong>{{profileInfo?.email}}</strong></p>
  
</template>name

<script>
import axios from 'axios'
import { ref } from '@vue/reactivity';
export default {
    name: "Profile",
    setup() {
        const profileInfo = ref(null);

        const fetechProfileInfo = async () => {
            const resp = await axios.get('/profile');
            profileInfo.value = resp.data.data;
        }

        return {
            profileInfo,
            fetechProfileInfo
        }
    },
    created() {
        this.fetechProfileInfo();
    }
}
</script>

<style>

</style>