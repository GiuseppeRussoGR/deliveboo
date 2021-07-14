const app = new Vue(
    {
        el: '#root',
        data: {
            types: [],
            restaurants: [],
            dishes: [],
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
            /**
             * Funzione che permette di ricevere via API i piatti
             * @param id
             */
            getDishes(id) {
                this.dishes = [];
                axios
                    .get('api/dishes/' + id)
                    .then((response) => {
                        this.dishes = response.data;
                    });
            }
        },
        mounted() {
            axios
                .get('api/types')
                .then((response) => {
                    this.types = response.data;
                });
        }
    });
