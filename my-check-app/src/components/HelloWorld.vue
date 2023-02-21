<script setup>

defineProps({
  msg: String,
});
 
</script>

<template>
  <div class="text-center">
    <h1>{{ msg }}</h1>
  <p>Vue 3, Bootstrap 5, Backend Api con Laravel</p>
  
  <a href="https://github.com/yulivera/app-list-check-laravelApi-vue">Repositorio</a>
  
  </div>
  
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
