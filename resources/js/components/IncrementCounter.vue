<script setup>
import { ref } from 'vue'
 
const counter = ref(0)
</script>
 
<template>
  <button
    type="button"
    @click="counter++"
    class="p-2 text-white bg-gray-500 rounded"
  >
    Counter is: {{ counter }}
  </button>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</template>