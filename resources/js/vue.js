import axios from 'axios';

const app = new Vue(
    {
        el: '#root',
        data: {
            types: [],
            restaurants: [],
            dishes: [],
            order: {
                total_price: 0,
                client_name: '',
                client_address: '',
                client_number: "",
                dishes: [
                    /*{
                        id:1,
                        quantita:10
                    }*/
                ]
            }
        },
        methods: {
            /**
             * Funzione che permette di ricevere via API i ristoranti
             * @param id id univoco del ristoratore
             * @param route string route di destinazione dell'API
             * @param variable string variabile da popolare
             */
            getApi(route, variable, id) {
                this[variable] = [];
                axios
                    .get(route + id)
                    .then((response) => {
                        this[variable] = response.data;
                    });
            },
            /**
             * Funzione che permette di inserire l'ordine nel DB
             */
            setOrder() {
                /**
                 * Esempio di chiamata per l'ordine
                 */
                axios
                    .post('api/order', {
                        ...this.order
                    })
                    .then((response) => {
                        console.log(response.data)
                    });
            }
        },
        mounted() {
            this.getApi('api/types/', 'types', '')

        }
    });
