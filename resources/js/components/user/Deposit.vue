<template>
  <form ref="depositForm" @submit.prevent="checkForm" class="space-y-6 bg-gray-600">
    <div>
      <label class="block font-medium text-sm text-white" for="transaction_amount">
        Enter amount to deposit:
      </label>
      <input v-model="data.transaction_amount" min="500" max="25000" class="p-2  rounded-md shadow-sm bg-white border border-gray-300 text-gray-400 block mt-1 w-full" type="number" id="transaction_amount" name="transaction_amount" required="required">
    </div>
    <div v-if="errors" class="text-red-500 py-2 font-semibold">
      <span>{{ errors.message }}</span>
    </div>
    <div class="flex items-center justify-end mt-4">
      <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        Deposit
      </button>
    </div>
  </form>
</template>


  
  <script>
  import swal from 'sweetalert';
  export default {
    computed: {
        user() {
          return this.$store.getters.user
        }
      },
    data() {
      return {
        errors: null,
        data: {
          transaction_amount: null,
          transaction_type: "deposit" 
        }
      }
    },
    methods: {
      checkForm(){
          this.data['id'] = this.user.id
          this.data['fname'] = this.user.fname
          this.data['lname'] = this.user.lname
          this.data['email'] = this.user.email
          this.data['phno'] = this.user.phno
          // this.data['pfp'] = this.user.pfp
          let chk=  Number(this.data.transaction_amount) + Number(this.user.balance)
          this.data['balance'] = chk

          axios.put('/user/profile-information', this.data)
          .then((response) => {
            this.$store.dispatch('attempt_user')
          })
          .catch((error) => {
            this.errors = error.response.data
          })
          axios.post('/user/makeTransaction', this.data)
        .then((response) => {
          console.log("deposit");
        })
        .catch((error) => {
          this.errors = error.response.data
        }) 
        this.$refs.depositForm.reset()
        swal("Succesfuly deposited!", "You deposited PKR: " + this.data.transaction_amount, "success");
        }
      }
    }
    </script>
    