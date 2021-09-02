<template>
    <div class="mx-auto bg-white rounded-lg shadow">
    <ul class="divide-y-2 divide-gray-100">
        <li class="p-3 text-lg font-bold">
            Account List
        </li>

       

        <li class="p-3">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-2 font-bold"> User name</div>
                <div class="col-span-3 font-bold">Email</div>
                <div class="ml-2 font-bold">Tasks</div>
            </div>
        </li>
        <li class="p-3" v-for="user in users.users" :key="user.name">
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-2"> {{user.name}}</div>
                <div class="col-span-3">{{user.email}}</div>
                <div class="ml-2">{{user.tasks}}</div>
            </div>
        </li>
       
    </ul>

</div>
</template>

<script>
export default {
    name: 'Account-list',
     props: {
        users: Object
    },
     created() {
    console.log(this.users)  //undefined;
  },
}
</script>