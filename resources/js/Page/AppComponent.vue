<template>
<div>
<Navbar></Navbar>
  <div class="mx-auto w-5/6 mt-8">
        <div class="grid grid-cols-12 gap-4">
  <div class="col-span-7">
      <Todolist v-bind:tasks="{tasks}" v-bind:userId="{userId}"></Todolist>
  </div>
  <!-- ... -->
  <div class="col-span-5">
      <Accountlist v-bind:users="{users}"></Accountlist>
  </div>
</div>
  </div>
  
</div>


</template>

<script>
import Navbar from "./Navbar.vue";
import Todolist from "./Todo-list.vue";
import Accountlist from "./Account-list.vue";
export default {
    components: { Navbar,Todolist,Accountlist },
    props: {
        tasks: Object,
        users: Array,
        userId: Number
    },
}

</script>

<style>

</style>