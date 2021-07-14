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
            /**
             * Esempio di chiamata per l'ordine
             */
            axios
                .get('api/order', {
                    params: {
                        total_price: 250,
                        client_name: 'pasticcio',
                        client_address: 'via',
                        client_number: 132456,
                        payment_status: 'accettato',
                        dishes: [
                            {
                                id: 1,
                                quantita: 1
                            },
                            {
                                id: 5,
                                quantita: 5
                            },
                            {
                                id: 2,
                                quantita: 2
                            },
                        ]
                    }
                })
                .then((response) => {
                    console.log(response)
                });
        }
    });
