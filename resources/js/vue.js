const app = new Vue(
    {
        el: '#root',
        data: {
            types: [],
            restaurants: [],
        },
        methods: {
            /**
             * Funzione che permette di ricevere via API i ristoranti
             * @param id id univoco del ristoratore
             */
            getRestaurants(id) {
                this.restaurants = [];
                axios
                    .get('api/restaurants/' + id)
                    .then((response) => {
                        this.restaurants = response.data;
                    });
            },
        },
        mounted() {
            axios
                .get('api/types')
                .then((response) => {
                    this.types = response.data;
                });
        }
    });
