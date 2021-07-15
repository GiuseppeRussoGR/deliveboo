import axios from 'axios';

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
             * Funzione che permette di generare una stringa con codice unico
             * @returns {string} ritorna una stringa con un codice unico
             */
            uniqueId() {
                let uuidValue = "", k, randomValue;
                for (k = 0; k < 32; k++) {
                    randomValue = Math.random() * 16 | 0;

                    if (k === 8 || k === 12 || k === 16 || k === 20) {
                        uuidValue += "-"
                    }
                    uuidValue += (k === 12 ? 4 : (k === 16 ? (randomValue & 3 | 8) : randomValue)).toString(16);
                }
                return uuidValue;
            },
        },
        mounted() {
            this.getApi('api/types/', 'types', '')
            /**
             * Esempio di chiamata per l'ordine
             */
            axios
                .post('api/order', {
                    total_price: 250,
                    client_name: 'pasticcio',
                    client_address: 'via',
                    client_number: "132456",
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
                })
                .then((response) => {
                    console.log(response.data)
                });
        }
    });
