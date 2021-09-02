<template>
      <div class="mx-auto bg-white rounded-lg shadow">
    <ul class="divide-y-2 divide-gray-100">
            <li class="p-3 text-lg font-bold">
                    Awesome Todo List
                <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-10 my-3">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="description" type="text" placeholder="Add new item" v-model="addTask.description">
                        </div>
                        <input type="hidden" id="user_id"  v-model="addTask.user_id" >
                        <div class="col-span-2 items-end my-3">
                               <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-7 rounded" v-on:click="submitTask()">
                                Add
                                </button>

                        </div>
                </div>
            </li>
        <li class="p-3" v-for="task in tasks.tasks" :key="task.id">
                <div class="grid grid-cols-12 gap-4">
                         <div class="flex col-span-11">
                                <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox h-4 w-4" v-on:click="taskController(task.id,$event)" :checked="task.iscompleted==1 ? true : false">
                                        <span :id="'todo'+task.id" :class="task.iscompleted==1 ? 'ml-9 text-xl line-through' : 'ml-9 text-xl'" >{{task.description}}</span>
                                </label>
                        </div>

                        <div class="flex col-span-1 items-end">
                                <svg v-on:click="deletetask(task.id)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                        </div>
                </div>
            </li>
         
         
               
    </ul>
    
</div>
</template>

<script>
export default {
    name: 'Todo-list',
    props: {
        tasks: Object,
        userId: Object
    },
    methods : {
            //checkbox events controller
      taskController : function(value,event) {
                if (event.target.checked) {
                        //Checked
                        var element = document.getElementById("todo"+value);
                        element.classList.add("line-through");
                        this.updateTask.iscompleted=1;
                        this.$inertia.put('task/'+value, this.updateTask);

                }else{
                        //unchecked
                        var element = document.getElementById("todo"+value);
                        element.classList.remove("line-through");
                        this.updateTask.iscompleted=0;
                        this.$inertia.put('task/'+value, this.updateTask);
                }
      },
      // add desc
      submitTask() {
                 this.$inertia.post('task', this.addTask);  
                 this.addTask.description='';
      },

      deletetask(id){
                this.$inertia.delete('task/'+id, this.addTask);
      },
        },

    
   data() {
        return {
        addTask: {
                description: null,
                user_id: this.userId.userId,
                },
        updateTask: {
                iscompleted: 0,
                },
        }
     },
}
</script>