<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></link> -->
<template>
  <div class="max-w-xl bg-white shadow-md rounded-lg mx-auto p-4 my-10">
    <h3 class="text-lg font-semibold">Welcome to a Vue SPA powered by Laravel Backend wallet app</h3>
    <div>
      <div class="md:flex md:justify-between md:space-x-2 py-6">
        <div class="md:w-1/3 pb-4">
          <h3 class="text-xl">my favorite movie list:</h3>
          <p class="mt-1 text-sm text-gray-600">
            All movies that have liked:
          </p>
        </div>
<!--        <Balance class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Balance>-->
        <div>
          <div class="grid grid-cols-6 gap-4">
            <div class="col-start-2 col-span-4 ... "  style="text-align:center">
              <table class="table-auto bg-gradient-to-r from-fuchsia-500 to-violet-400" id= "table-id">
                <thead>
                <tr>
                  <th>Movies name:</th>
                  <th>movie id</th>
                  <th>Movie Logo</th>
                  <th>Add to favourites</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="fav in favlist" :key="favlist.id">
                  <td>{{ fav.movie_name }}</td>
                  <td>{{ fav.movie_id }}</td>
                  <td>
                    <img
                    class="logo"
                    :src="fav.movie_logo"
                  />
                  </td>
                  <td>
                    <button>add</button>
                  </td>
                </tr>
                </tbody>
              </table>
              <br>
              <button @click="getfavlist" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                click to show history
              </button>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <div class="container px-2 md:px-0 mx-auto space-y-2">
        <div class="md:flex md:justify-between md:space-x-2 py-6">
          <div class="md:w-1/3 pb-4">
            <h3 class="text-xl">Browse</h3>
            <p class="mt-1 text-sm text-gray-600">
              Search for movies and like them to add
            </p>
          </div>
          <label for="gsearch">enter name:</label>
          <input type="search" id="gsearch" name="gsearch">
<!--          <Withdraw class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Withdraw>-->
        </div>
        <hr>
      </div>
    </div>
  </div>

</template>

<script >
// import Deposit from '../components/user/Deposit.vue';
// import Withdraw from '../components/user/Withdraw.vue';
// import Balance from '../components/user/Balance.vue';
export default {
  // components: { Deposit, Withdraw  },
  computed: {
    user() {
      return this.$store.getters.user
    },
  },
  data() {
    return {
      errors: null,
      data : {},
      favlist : []
    }
  },
  methods: {
    getfavlist(){
      this.data['id'] = this.user.id
      axios.post('/user/favlist', this.data)
        .then((response) => {
          console.log(response.data);
          this.favlist = response.data;
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    }
  }
};

</script>
