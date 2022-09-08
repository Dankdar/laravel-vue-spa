<template>
  <main>
    <navigation></navigation>
    <div class="container mx-auto">
      <router-view></router-view>
      <div class="md:flex text-xs text-gray-700 py-8 px-2 md:px-0 break-words space-x-4">
        <span>SPA built with <span class="text-red-600"> Laravel 9</span>, <span  class="text-green-600">Vue3</span> and <span  class="text-fuchsia-600">Tailwindcss</span></span>
      </div>
    </div>
  </main>
</template>

<script>
import Navigation from '@/js/components/Navigation'

export default {
  components: {
    Navigation,
  },
  computed: {
    user() {
      return this.$store.getters.user
    }
  },
}
</script>
