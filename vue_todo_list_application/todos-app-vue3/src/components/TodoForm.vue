<template>
  <form @submit.prevent="handleSubmit" class="flex flex-col gap-4">
    <!-- prevent es un midifier, es como un preventdefault -->
    <input
      type="text"
      v-model="values.text"
      ref="inputRef"
      class="mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-purple-500"
    />
    <select
      v-model="values.user_id"
      class="mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-purple-500"
    >
      <option value="">Select a user</option>
      <option v-for="user in users" :value="user.id" :key="user.id">
        {{ user.name }}
      </option>
    </select>
    <button
      type="submit"
      class="px-16 py-4 bg-purple-300 hover:bg-purple-500 self-center rounded-lg text-slate-50 font-medium"
    >
      Save
    </button>
  </form>
</template>

<script setup>
import ky from "ky";
import { onBeforeMount, ref } from "vue";

// const text = ref('')

const inputRef = ref(null);
const users = ref([]);
const values = ref({
  text: "",
  user_id: "",
});

const emit = defineEmits(["submit"]);

onBeforeMount(async () => {
  const resp = await ky.get("http://127.0.0.1:8000/api/users").json();
  users.value = resp.data;
});

function handleSubmit() {
  emit("submit", values.value);

  values.value.text = "";
  values.value.user_id = "";

  inputRef.value.focus();
}
</script>
