<script setup>

defineProps({
  msg: String,
});
 
</script>

<template>
  <div class="text-center">
    <h1>{{ msg }}</h1>
  <p>Vue 3, Bootstrap 5, Backend Api con Laravel</p>
  <span>Repositorio github: </span>
  <a href="">Repositorio</a>
  
  </div>
  
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
