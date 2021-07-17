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
                dishes: []
            },
            order_set: {},
            braintree_payment: {
                token: '',
                instance: '',
                error: ''
            },
            categoryChosen: false,
            restaurantChosen: false,
            chosenRestaurantIndex: 0,
            openBasket: false
        },
        methods: {
            /**
             * Funzione che permette di ricevere via API i ristoranti
             * @param parameter eventuale parametro di query string
             * @param id id univoco da ricercare
             * @param route string route di destinazione dell'API
             * @param variable string variabile da popolare
             */
            getApi(route, variable, id, parameter) {
                this[variable] = [];
                axios
                    .get(route + id, {
                        params: {
                            value: parameter
                        }
                    })
                    .then((response) => {
                        this[variable] = response.data;
                    });
            },
            /**
             *Funzione che permette l'inserimento dei prodotti nel carrello
             * @param dishIndex indice del piatto selezionato
             * @param quantity quantità del prodotto selezionato
             */
            insertBasket(dishIndex, quantity) {
                const select_dish = this.dishes[dishIndex];
                const order_dishes = this.order.dishes;
                const restaurant_select = this.chosenRestaurantIndex;

                if (order_dishes.some(dish => dish.ristorante === restaurant_select) || order_dishes.length === 0) {
                    if (order_dishes.some(dish => dish.id === select_dish.id)) {
                        let dish_index = order_dishes.map(element => {
                            return element.id
                        }).indexOf(select_dish.id);
                        order_dishes[dish_index].quantita += parseInt(quantity);
                        order_dishes[dish_index].totale_singolo = parseInt(order_dishes[dish_index].quantita) * parseFloat(select_dish.price);
                    } else {
                        order_dishes.push({
                            id: select_dish.id,
                            quantita: parseInt(quantity),
                            ristorante: parseInt(restaurant_select),
                            nome: select_dish.name,
                            prezzo_singolo: parseFloat(select_dish.price),
                            totale_singolo: parseInt(quantity) * parseFloat(select_dish.price)
                        })
                    }
                } else {
                    //TODO inserire errore da visualizzare in caso si tenti di inserire un altro ristorante
                    console.log('non puoi inserirlo')
                }
                this.order.total_price += select_dish.price * parseInt(quantity);

            },
            /**
             * Funzione che permette di aumentare o diminuire il valore di input
             * @param input_type elemento HTML selezionato con JQUERY
             * @param value valore di aumento '+' o di decremento '-'
             */
            setQuantity(input_type, value) {
                let value_select = input_type.val();
                if (value === '+') {
                    value_select++;
                } else if (value === '-' && value_select > 1) {
                    value_select--;
                }
                input_type.val(value_select);
            },
            /**
             * Funzione che permette di inserire l'ordine nel DB
             */
            async setOrder() {
                const response = await axios.post('api/order', {...this.order});
                const value = await response.data;
                this.order_set = {
                    success: value.success,
                    id: value.order_number,
                    client_code: value.client_code
                }
                this.braintree_payment.token = await this.getToken();
                this.getDataPayment();
            },
            /**
             * Funzione che permette di creare il token da inviare ai servizi di braintree
             * @returns {Promise<*>}
             */
            async getToken() {
                const response = await axios.get('api/order/token ');
                return await response.data.token;
            },
            /**
             * Funzione che prende i dati di pagamento dall'utente e genero l'istanza di braintree
             * @returns {Promise<void>}
             */
            async getDataPayment() {
                const externVue = this;
                await braintree.dropin.create({
                    authorization: this.braintree_payment.token,
                    selector: '#dropin-container'
                }, function (err, instance) {
                    externVue.braintree_payment.instance = instance
                    externVue.braintree_payment.error = err
                });
            },
            /**
             * Funzione che invia il pagamento verso i servizi di braintree e
             * ne riceve il risultato
             */
            makePayment() {
                const price = this.order.total_price;
                this.braintree_payment.instance.requestPaymentMethod(function (err, payload) {
                    axios.post('api/order/payment', {
                        token: payload.nonce,
                        amount: price
                    }).then(response => {
                        console.log(response.data)
                    })
                });
            }
        },
        mounted() {
            this.getApi('api/types/', 'types', '')
        }
    });
Vue.config.devtools = true
