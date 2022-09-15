<template>
    <div>
      <div class="md:flex md:justify-between md:space-x-2 py-6">
        <div class="md:w-1/3 pb-4">
          <h3 class="text-xl text-white ">FAVOURITE MOVIE LIST:</h3>
          <p class="mt-1 text-sm text-gray-300">
            All the movies that you have liked:
          </p>
        </div>
        <div>
          <div class="max-w-xl bg-gradient-to-r from-gray-200 to-zinc-300 shadow-md rounded-lg mx-auto p-4 my-10">
          <div class="grid grid-cols-6 gap-4">
            <div class="col-start-2 col-span-4 ... "  style="text-align:center">
              <div v-if="favlist.length">
                <table class="table-auto bg-gradient-to-r from-fuchsia-500 to-violet-400" id= "table-id">
                  <thead>
                  <tr>
                    <th>Movies name:</th>
                    <th>Movie Logo</th>
                    <th>action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="fav in favlist" :key="favlist.id">
                    <td>{{ fav.movie_name }}</td>
                    <td>
                      <img
                        class="logo"
                        :src="fav.movie_logo"
                        width="50"
                        height="50"
                      />
                    </td>
                    <td>
                      <button @click="dislike(fav.movie_id); getfavlist(); getmovlist();" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        remove
                      </button>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div v-else>
                <h1 class="text-red-500">NO MOVIES TO SHOW IN LIST.</h1></div>
              <br>
              <button @click="getfavlist" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                show your favourite movies
              </button>
            </div>
          </div>
        </div>
      </div>
      </div>
      <hr>

      <div class="container px-2 md:px-0 mx-auto space-y-2">
        <div class="md:flex md:justify-between md:space-x-2 py-6">
          <div class="md:w-1/3 pb-4">
            <h3 class="text-xl text-white ">TOP TIER MOVIES LIST</h3>
            <p class="mt-1 text-sm text-gray-300">
              See all movies and like them to add to your list.
            </p>
          </div>

          <div>
            <div class="max-w-xl bg-gradient-to-r from-gray-200 to-zinc-300 shadow-md rounded-lg mx-auto p-4 my-10">
            <div>
              <div class="grid grid-cols-6 gap-4">
                <div class="col-start-2 col-span-4 ... "  style="text-align:center">
                  <table class="table-auto bg-gradient-to-r from-fuchsia-500 to-violet-400" id= "table-idd">
                    <thead>
                    <tr>
                      <th>Movies name:</th>
                      <th>Movie Logo</th>
                      <th>total likes</th>
                      <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="mov in movlist" :key="movlist.id">
                      <td>{{ mov.movie_name }}</td>
                      <td>
                        <img
                          class="logo"
                          :src="mov.movie_logo"
                        />
                      </td>
                      <td>{{mov.likes_count}}</td>
                      <td>
                        <button @click="like(mov.movie_id); getfavlist(); getmovlist();" type="submit" :id="'AddToFvrt' + mov.movie_id" >
                          <img
                            class="logo"
                            src="../assets/like.svg"
                            width="30"
                            height="30"
                          />
                      </button></td>
                    </tr>
                    </tbody>
                  </table>
                  <br>
                  <button @click="getmovlist" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    show all movies
                  </button>
                </div>
          </div>
        </div>
            <br>
      </div>
          </div>
        </div>
        </div>
    </div>

  <div class="md:flex md:justify-between md:space-x-2 py-6">
    <div class="md:w-1/3 pb-4">
      <h3 class="text-xl">SEARCH</h3>
      <p class="mt-1 text-sm text-gray-600">
        Browse through the entire movie selection.
      </p>
    </div>
    <Search class="md:w-2/3 p-4 bg-white shadow-md rounded-lg"></Search>
  </div>
<!--  </div>-->
<!--</div>-->

</template>

<script >
import swal from 'sweetalert';
import Search from '../components/user/Search.vue';

// import swal from 'sweetalert';
export default {
  components: { Search },
  computed: {
    user() {
      return this.$store.getters.user
    },
  },
  data() {
    return {
      errors: null,
      data : {},
      favlist : [],
      movlist: [],
      liked: [],
      disliked: [],
      movies: [],
    }
  },
  beforeMount() {
    this.getfavlist()
    this.getmovlist()
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
    },

    getmovlist(){
      this.data['id'] = this.user.id
      axios.post('/user/movlist', this.data)
        .then((response) => {
          console.log(response.data);
          this.movlist = response.data;
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    },
    like(movie_id){
      this.data['id'] = this.user.id
      this.data['movie_id'] = movie_id
        axios.post('/user/like', this.data)
        .then((response) => {
          this.liked = response.data;
          swal("HELLO! User", this.liked, "info");
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    },

    dislike(movie_id){
      this.data['id'] = this.user.id
      this.data['movie_id'] = movie_id
      axios.post('/user/dislike', this.data)
        .then((response) => {
          console.log(response.data);
          this.disliked = response.data;
          swal("Successfully removed from favourites!", "Movie disliked.", "success");
        })
        .catch((error) => {
          this.errors = error.response.data
        })
    },
  }
};

</script>
