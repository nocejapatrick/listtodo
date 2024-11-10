import './bootstrap';

import { createApp } from 'vue';
import TodoList from './components/TodoList.vue';
 
createApp({})
  .component('TodoList', TodoList)
  .mount('#app')