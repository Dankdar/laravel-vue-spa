<template>
  <!-- <div class="container px-2 md:px-0 mx-auto space-y-2">
  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white" >Profile</h3>
      <p class="mt-1 text-sm text-gray-800">
        where you can update your account's profile information and email address.
      </p>
    </div>
    <profile-update class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></profile-update>
  </div>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Transactions</h3>
      <p class="mt-1 text-sm text-gray-800">
        upload your image to set as profile image.
      </p>
    </div>
    <profile-picture class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></profile-picture>
  </div>

  <div class="md:flex md:justify-between md:space-x-2 py-4">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Records</h3>
      <p class="mt-1 text-sm text-gray-800">
        Ensure your account is using a long, random password to stay secure.
      </p>
    </div>
    <h1 class="md:w-2/3 p-4 bg-white shadow-md rounded-lg">profile</h1>
  </div>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl text-white">Two Factor Authentication</h3>
      <p class="mt-1 text-sm text-gray-800">
        Add additional security to your account using two factor authentication.
      </p>
    </div>
    <two-factore-authentication class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></two-factore-authentication>
  </div>
</div> -->


  <div class="max-w-xl bg-white shadow-md rounded-lg mx-auto p-4 my-10">
    <div>
      <span class="md:flex md:justify-between md:space-x-2 py-6">
        <div class="md:w-1/3 pb-4">
          <h3 class="text-lg">Hello! {{ user.fname }}  {{ user.lname }}</h3>
        </div>
        <p class="md:w-2/3 p-4 text-white bg-gradient-to-r from-fuchsia-500 to-violet-400  shadow-md rounded-lg">welcome to the homepage</p>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      errors: null,
      data: {
        fname: null,
        lname: null,
      }
    }
  },
  mounted() {
      this.data.fname = this.user.fname
      this.data.lname = this.user.lname
    },
  computed: {
    user() {
      return this.$store.getters.user
    },
  },
}

</script>


