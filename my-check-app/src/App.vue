<script setup>
import HelloWorld from './components/HelloWorld.vue'
import AddCheck from './components/AddCheck.vue'

</script>

<template>
      <div class="row" >
        <div class="col-md-12" >
          <HelloWorld msg="Check List" class="col-12"  />
        </div>
        <div class="col-12">
          <AddCheck />
        </div>

      </div>
</template>
