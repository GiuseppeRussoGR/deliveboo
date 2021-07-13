const app = new Vue(
    {
        el: '#root',
        data: {
            types: [],
            restaurants: [],
            response: ''
        },
        methods: {
            /**
             * Funzione che permette di ricevere via API i ristoranti
             * @param id id del ristoratore
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
             * Funzione che permette di fare chiamate API verso Bentree
             * reference docs https://graphql.braintreepayments.com/
             * @param query string stringa JSON per la richiesta API
             * @param queryVariables object '{}'oggetto contenente i valori delle variabili presenti nella query
             */
            paymentBentree(query, queryVariables) {
                const token = Buffer.from(`r555cgsj76v73wp8:e9e23aabf186e6ae9ec43f3092808dc0`, 'utf8').toString('base64');
                axios.post('https://payments.sandbox.braintree-api.com/graphql', {
                    query: query,
                    variables: queryVariables
                }, {
                    headers: {
                        'Authorization': token,
                        'Braintree-Version': '2021-01-01',
                        'Content-Type': 'application/json'
                    }
                })
                    .then((response) => {
                        this.response = response.data
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
    });
