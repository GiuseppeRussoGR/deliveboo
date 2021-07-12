var app = new Vue(
  {
    el: '#root',
    data: {
      types: [],
      restaurants : []
    },
    methods: {
      getRestaurants(id) {
        this.restaurants = [];
        axios
          .get('api/restaurants/'+id)
                        .then((response) => {
                  const result = response.data;
                this.restaurants = result;
              });
      }
    },
    mounted() {
          axios
              .get('api/types')
              .then((response) => {
                  const result = response.data;
                this.types = result;
              });
      }
  }
);
