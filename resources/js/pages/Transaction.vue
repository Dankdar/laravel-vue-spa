<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link> -->
<template>
  <div class="max-w-xl bg-white shadow-md rounded-lg mx-auto p-4 my-10">
    <h3 class="text-lg font-semibold">Welcome to a Vue SPA powered by Laravel Backend wallet app</h3>
    <div>
      <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl">Account balance</h3>
      <p class="mt-1 text-sm text-gray-600">
        Active balance in account.
      </p>
    </div>
    <Balance class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Balance>
  </div>
  <hr>
  
<div class="container px-2 md:px-0 mx-auto space-y-2">
  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl">Withdraw</h3>
      <p class="mt-1 text-sm text-gray-600">
        Withdraw from account.
      </p>
    </div>
    <Withdraw class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Withdraw>
  </div>
  <hr>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl">Deposit</h3>
      <p class="mt-1 text-sm text-gray-600">
        Deposit into account.
      </p>
    </div>
    <Deposit class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Deposit>
  </div>
</div>
    </div>
  </div>

</template>

<script >
import Deposit from '../components/user/Deposit.vue';
import Withdraw from '../components/user/Withdraw.vue';
import Balance from '../components/user/Balance.vue';
export default {
    components: { Deposit, Withdraw , Balance },
    computed: {
      user() {
        return this.$store.getters.user
      },
    },
};

</script>

