<script setup>
import { onMounted } from 'vue';
import { reactive,computed,ref } from 'vue';
import axios from 'axios';
 
const items = reactive([]);
async function getTodo(){
   let todos = await axios.get('/api/v1/todo')
   console.log(todos.data)
   items = todos.data;
}
onMounted(async ()=>{
   await getTodo()
})

const list1 = computed(() => {
  return items.filter((item)=> item.status === "On-Going")
})
const list2 = computed(() => {
  return items.filter((item)=> item.list === "Done")
})

function startDrag(evt, item) {
    console.log("START DRAG")
      evt.dataTransfer.dropEffect = 'move'
      evt.dataTransfer.effectAllowed = 'move'
      evt.dataTransfer.setData('itemID', item.id)
}
function onDrop(evt, list) {
    console.log("ON DROP")
    console.log()
    const itemID = evt.dataTransfer.getData('itemID')
    const item = items.find((item) => item.id == itemID)
    item.list = list
}
</script>
 <style scoped>
</style>
<template>
    <div class="md:w-2/4 w-11/12 flex justify-between items-start ">

        <div class="list-container w-5/12 shadow-sm p-4 bg-slate-200" @drop="onDrop($event, 'On-Going')"
  @dragover.prevent
  @dragenter.prevent>
            <input type="text" class="w-full">
            <div v-for="item in list1" :key="item.title" class="todo-list mt-3 shadow-sm p-4 bg-white cursor-pointer" @dragstart="startDrag($event, item)"  draggable>
                <p>{{ item.title }}</p>
            </div>
        </div>

        <div class="list-container w-5/12 shadow-sm p-4 bg-slate-200"   @drop="onDrop($event, 'Done')"
  @dragover.prevent
  @dragenter.prevent>
            <input type="text" class="w-full">
            <div v-for="item in list2" :key="item.title" class="todo-list mt-3 shadow-sm p-4 bg-white cursor-pointer" @dragstart="startDrag($event, item)"  draggable>
                <p>{{ item.title }}</p>
            </div>
        </div>
    </div>
  
</template>