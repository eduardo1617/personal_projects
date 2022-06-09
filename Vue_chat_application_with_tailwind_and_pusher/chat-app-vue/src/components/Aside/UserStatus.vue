<template>
  <div class="flex justify-between p-4">
    <div class="flex gap-3">
      <div class="h-12 w-12 rounded-full bg-purple-500 flex justify-center">
        <fa-icon icon="user" size="2x" class="self-center text-white" />
      </div>
      <div class="flex flex-col justify-end">
        <span class="text-sm">Good Morning</span>
        <span class="text-sm font-extralight text-gray-400">{{
          userStore.userLoged.name
        }}</span>
      </div>
    </div>
    <div class="flex gap-3">
      <button class="h-12 w-12 rounded-full bg-gray-200 flex justify-center">
        <fa-icon icon="plus" size="lg" class="self-center text-white" />
      </button>
      <button class="h-12 w-12 rounded-full bg-gray-200 flex justify-center">
        <fa-icon icon="bell" size="lg" class="self-center text-white" />
      </button>
      <button
        class="h-12 w-12 rounded-full bg-gray-200 flex justify-center"
        @click="handleLogout"
      >
        <fa-icon
          icon="right-from-bracket"
          size="lg"
          class="self-center text-white"
        />
      </button>
    </div>
  </div>
</template>

<script setup>
// import { inject } from "vue";
import router from "../../router/index";
import { useUserStore } from "../../store/userStore";

const userStore = useUserStore();

// const user = inject("userLoged");

function handleLogout() {
  localStorage.removeItem("access_token");
  router.push({ path: "/login" });
}
</script>

<style></style>
