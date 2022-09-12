<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 2px solid #4abe27;
    text-align: center;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #91c394;
  }
  </style>
<template>
    <div>
  <div class="grid grid-cols-6 gap-4">
          <div class="col-start-2 col-span-4 ... "  style="text-align:center">
            <div v-if="records.length">
            <table class="table-auto bg-gradient-to-r from-fuchsia-500 to-violet-400" id= "table-id">
  <thead>
    <tr>
      <th>Transaction Type</th>
      <th>Amount</th>
      <th>Date and Time</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="record in records" :key="records.id">
      <td>{{ record.transaction_type }}</td>
      <td>PKR {{ record.transaction_amount.toLocaleString("en-US") }}</td>
      <td>{{ record.created_at }}</td>
    </tr>
  </tbody>
</table>
            </div>
              <div class="text-white" v-else>
                no records to show.
              </div>
        <br>
        <button @click="gethistory" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
          click to show history
        </button>
          </div>
        </div>
      </div>

  </template>



  <script>
  export default {
    computed: {
      user() {
        return this.$store.getters.user
      }
    },
    data() {
      return {
        errors: null,
        data : {},
        records : []
      }
    },
    methods: {
      gethistory(){
        this.data['id'] = this.user.id
        axios.post('/user/history', this.data)
        .then((response) => {
          console.log(response.data);
          this.records = response.data;
        })
      .catch((error) => {
        this.errors = error.response.data
      })
        }
      }
  }
  </script>

