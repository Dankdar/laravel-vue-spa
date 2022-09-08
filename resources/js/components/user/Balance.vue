<template>
        <div class="grid grid-cols-6 gap-4 bg-gray-600">
          <div class="col-start-2 col-span-4 ... text-green-500 text-lg"  style="text-align:center">PKR {{ user.balance.replace(/\B(?=(\d{3})+(?!\d))/g, ',') }}.</div>
        </div>
  </template>

  <script>
  export default {
    computed: {
      user() {
        return this.$store.getters.user
      },
    },
    }
  </script>
