<script setup lang="ts">
import './assets/tailwind.css'

import Dashboard from './components/Dashboard.vue'
import SideBar from './components/SideBar/index.vue'
</script>

<template>
  <header>
    
    <SideBar />
  </header>

  <main>
    <Dashboard />
  </main>
</template>

<style scoped>

</style>
