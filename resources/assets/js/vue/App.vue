<template>
  <div>
    <notifications></notifications>
    <router-view></router-view>
  </div>
</template>


<script>
import Notifications from "../components/Notifications.vue"

export default {
   components: {
    "notifications": Notifications,
  },
   
};
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

</style>