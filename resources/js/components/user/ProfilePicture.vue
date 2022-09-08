<template>
  <form  @submit.prevent="submitForm" class="space-y-6  bg-gray-600" enctype="multipart/form-data">
    <div>
      <label class="block font-medium text-sm text-white" for="pfp">
        picture upload:
      </label>
      <input @change="update(e)" accept="image/jpeg/png" class="p-2 rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="file" id="pfp" name="pfp" required="required">
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
        // pfpname: null,
        // pfppath: null
      }
    }
  },
  mounted() {
    this.data.fname = this.user.fname
    this.data.lname = this.user.lname
    this.data.email = this.user.email
    this.data.phno = this.user.phno
    this.data.pfp = this.user.pfp
    // this.data.balance = this.user.balance
    },
  computed: {
    user() {
      return this.$store.getters.user
    },
  },
  methods: {
    update(e) {
      this.data["balance"]= this.user.balance
      // const file = e.target.files[0]
      // this.data['pfp'] = file
      axios.put('/user/profile-information', this.data)
        .then((response) => {
          console.log("Updated");
          this.$store.dispatch('attempt_user')
          swal("Succesfuly updated!", "You updated your profile picture ", "success");
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    }

        }
}
</script>
