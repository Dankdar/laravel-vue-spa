<template>
  <form  @submit.prevent="update" class="space-y-6  bg-gray-600">
    <div>
      <label class="block font-medium text-sm text-white" for="fname">
        First Name
      </label>
      <input v-model="data.fname" class="p-2 rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="text" id="fname" name="fname" required="required">
      <br>
      <label class="block font-medium text-sm text-white" for="lanme">
        Last Name
      </label>
      <input v-model="data.lname" class="p-2 rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="text" id="lname" name="lname" required="required">
    </div>
    <div>
      <label class="block font-medium text-sm text-white" for="email">
        Email
      </label>
      <input v-model="data.email" class="p-2 rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="email" id="email" name="email" required="required">
    </div>
    <div>
      <label class="block font-medium text-sm text-white" for="phno">
        Phone Number
      </label>
      <input v-model="data.phno" class="p-2 rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="phno" id="phno" name="phno" required="required">
    </div>
    <div v-if="errors" class="text-red-500 py-2 font-semibold">
      <span>{{ errors.message }}</span>
    </div>
    <div class="flex items-center justify-end mt-4">
      <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Update
      </button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {
      errors: null,
      data: {
        fname: null,
        lname: null,
        email: null,
        phno: null,
        balance: null,
        // pfp:null
      }
    }
  },
  mounted() {
      this.data.fname = this.user.fname
      this.data.lname = this.user.lname
      this.data.email = this.user.email
      this.data.phno = this.user.phno
      // this.data.balance = this.user.balance

    },
  computed: {
    user() {
      return this.$store.getters.user
    },
  },
  methods: {
    update() {
      this.data["balance"]= this.user.balance
      axios.put('/user/profile-information', this.data)
        .then((response) => {
          console.log("Updated");
          this.$store.dispatch('attempt_user')
          swal("Succesfuly updated!", "You updated your profile information ", "success");
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    },
  }
}
</script>
