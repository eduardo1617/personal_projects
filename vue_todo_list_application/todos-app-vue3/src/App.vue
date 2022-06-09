<template>
  <div class="max-w-3xl mx-auto flex flex-col gap-y-4">
    <h1 class="text-3xl font-bold text-center">Todos</h1>
    <TodoForm @submit="handleSubmit" />
    <TodoList :todos="todos" @change="handleChange" @delete="onDelete" />
  </div>
</template>

<script setup>
import ky from "ky";
import { onBeforeMount, ref, provide } from "vue";
import TodoList from "./components/TodoList.vue";
import TodoForm from "./components/TodoForm.vue";

const todos = ref([]);
provide("todos", {
  handleUpdate,
  handleDelete,
});

onBeforeMount(async () => {
  const resp = await ky.get("http://127.0.0.1:8000/api/todos").json();
  todos.value = resp.data;
});

async function handleDelete(todo) {
  await ky.delete(`http://127.0.0.1:8000/api/todos/${todo.id}`).json();

  const index = todos.value.findIndex((t) => t.id === todo.id);
  todos.value.splice(index, 1);
}

async function handleUpdate(todo, values) {
  const json = {};
  if (values.description) {
    json.description = values.description;
  }
  if (typeof values.completed === "boolean") {
    json.completed = values.completed;
  }

  const resp = await ky
    .patch(`http://127.0.0.1:8000/api/todos/${todo.id}`, {
      json,
    })
    .json();
  const index = todos.value.findIndex((t) => t.id === todo.id);
  todos.value.splice(index, 1, resp.data);
}

// async function handleChange(todo) {
//   const resp = await ky
//     .patch(`http://127.0.0.1:8000/api/todos/${todo.id}`, {
//       json: {
//         completed: !todo.completed,
//       },
//     })
//     .json();
//   const index = todos.value.findIndex((t) => t.id === todo.id);
//   todos.value.splice(index, 1, resp.data);
// }

async function handleSubmit(values) {
  const resp = await ky
    .post("http://127.0.0.1:8000/api/todos", {
      json: {
        description: values.text,
        user_id: values.user_id,
      },
    })
    .json();

  todos.value.push(resp.data);
}

// async function onDelete(todo_id) {
//   await ky.delete(`http://127.0.0.1:8000/api/todos/${todo_id}`).json();

//   const index = todos.value.findIndex((todo) => todo.id === todo_id);
//   todos.value.splice(index, 1);
// }
</script>

<style></style>
