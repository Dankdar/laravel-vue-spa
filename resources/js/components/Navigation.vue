<template>
  <nav class="bg-gradient-to-r from-gray-500 to-zinc-700 border-b border-green-500 p-4 mb-4">
    <div class="container mx-auto flex justify-center md:justify-between">
      <router-link :to="{name: 'Home'}" class="hidden md:flex text-xl font-semibold place-items-center space-x-2">
        <img
              class="logo"
              src="../assets/cash.svg"
              width="50"
              height="50"
            />
        <span class="text-white">Vue SPA Laravel Wallet</span>
      </router-link>
      <ul class="list flex items-center text-white text-sm font-semibold">
        <li>
          <router-link :to="{name: 'Home'}" class="hover:text-violet-300 p-2 rounded flex items-center space-x-2">
            <img
              class="logo"
              src="../assets/home.svg"
              width="20"
              height="20"
            />
            <span>Home</span>
          </router-link>
        </li>
        <li>
          <router-link :to="{name: 'Transaction'}" class="hover:text-violet-300 p-2 rounded flex items-center space-x-2">
            <img
              class="logo"
              src="../assets/transaction.svg"
              width="20"
              height="20"
            />
            <span>Transaction</span>
          </router-link>
        </li>
        <li>
          <router-link :to="{name: 'History'}" class="hidden md:flex text-md font-semibold place-items-center space-x-2 hover:text-violet-300 " >
            <img
              class="logo"
              src="../assets/history.svg"
              width="20"
              height="20"
            />
            <span>History</span></router-link>
        </li>
        <li>
          <router-link :to="{name: 'Movies'}" class="hover:text-violet-300 p-2 rounded flex items-center space-x-2">
            <img
              class="logo"
              src="../assets/movies.svg"
              width="20"
              height="20"
            />
            <span>Movies</span>
          </router-link>
        </li>
        <li>
          <router-link :to="{name: 'User'}" class="hover:text-violet-300 p-2 rounded flex items-center space-x-2 font-semibold">
            <img
              class="logo"
              src="../assets/profile.svg"
              width="20"
              height="20"
            />
            <span>{{ user?.fname }}</span><span>{{ user?.lname }}</span>
          </router-link>
        </li>
        <li class="ml-4">
          <button @click="logout" class="hover:text-rose-500 p-2 rounded flex items-center space-x-2">
            <img
              class="logo"
              src="../assets/logout.svg"
              width="20"
              height="20"
            />
            <span>logout</span>
          </button>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  computed: {
    user() {
      return this.$store.getters.user
    }
  },
  methods: {
    logout() {
      this.$store.dispatch('logout')
        .then(() => {
          this.$router.push({name: 'Login'})
        })
    }
  }
}
</script>
