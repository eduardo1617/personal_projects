<template>
  <li class="p-4 w-min-full flex gap-4 bg-purple-100 items-center rounded">
    <template v-if="isEditing">
      <input type="text" v-model="description" />
      <div class="ml-auto">
        <button
          class="px-4 py-2 bg-purple-400 text-white"
          @click="handleUpdateTodo"
        >
          Update
        </button>
        <button
          @click="isEditing = false"
          class="px-4 py-2 bg-red-400 text-white ml-1"
        >
          Cancel
        </button>
      </div>
    </template>
    <template v-else>
      <input
        type="checkbox"
        :checked="todo.completed"
        @change="handleChange"
        class="border-purple-500 border-2 text-purple-500 focus:border-purple-500 focus:ring-purple-500"
      />
      <p>
        {{ todo.description }} -
        {{ format(new Date(todo.updated_at), "hh:mm a") }}
      </p>
      <div class="ml-auto">
        <button
          class="px-4 py-2 bg-purple-400 text-white"
          @click="isEditing = true"
        >
          Edit
        </button>
        <button
          @click="handleDelete(todo)"
          class="px-4 py-2 bg-red-400 text-white ml-1"
        >
          Delete
        </button>
      </div>
    </template>
  </li>
</template>

<script setup>
import { format } from "date-fns";
import { ref, inject } from "vue";

const props = defineProps({
  todo: {
    required: true,
    type: Object,
  },
});

const isEditing = ref(false);
const description = ref(props.todo.description);

const { handleUpdate, handleDelete } = inject("todos");

function handleUpdateTodo() {
  handleUpdate(props.todo, { description: description.value });
  isEditing.value = false;
}

// const emit = defineEmits(["change", "delete"]);

function handleChange() {
  //   emit("change", todo);
  handleUpdate(props.todo, { completed: !props.todo.completed });
}

// function onDelete(todo_id) {
//   emit("delete", todo_id);
// }
</script>
