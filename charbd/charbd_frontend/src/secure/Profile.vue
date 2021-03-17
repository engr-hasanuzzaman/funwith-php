<template>
  <h1>Wellcome to you</h1>
  <p>Name: <strong>{{profileInfo?.name}}</strong></p>
  <p>Email: <strong>{{profileInfo?.email}}</strong></p>
  
</template>name

<script>
import axios from 'axios'
export default {
    name: "Profile",
    setup() {
        let profileInfo;

        const fetechProfileInfo = async () => {
            const resp = await axios.get('/profile');
            profileInfo = resp.data.data;
            // debugger;
            console.log("profile info data is ", profileInfo)
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