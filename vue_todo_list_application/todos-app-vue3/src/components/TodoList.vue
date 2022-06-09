<template>
  <div>
    <ul class="flex flex-col gap-4">
      <TodoListItem v-for="todo in todos" :key="todo.id" :todo="todo" />
      <!-- <li
        :key="todo.id"
        v-for="todo in todos"
        class="p-4 w-min-full flex gap-4 bg-purple-100 items-center rounded"
      >
        <input
          type="checkbox"
          :checked="todo.completed"
          @change="handleChange(todo)"
          class="border-purple-500 border-2 text-purple-500 focus:border-purple-500 focus:ring-purple-500"
        />
        <p>
          {{ todo.description }} -
          {{ format(new Date(todo.updated_at), "hh:mm a") }}
        </p>
        <button
          @click="onDelete(todo.id)"
          class="px-4 py-2 bg-red-400 ml-auto text-white"
        >
          Delete
        </button>
      </li> -->
    </ul>
  </div>
</template>

<script setup>
import TodoListItem from "./TodoListItem.vue";
// import { format } from "date-fns";

defineProps({
  todos: {
    required: true,
    type: Array,
  },
});

// const emit = defineEmits(["change", "delete"]);

// function handleChange(todo) {
//   emit("change", todo);
// }

// function onDelete(todo_id) {
//   emit("delete", todo_id);
// }
</script>
