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
                client_civic_number: '',
                client_city_cap: '',
                client_city: '',
                client_number: "",
                dishes: []
            },
            order_set: {
                disabled: true
            },
            braintree_payment: {
                token: '',
                payment: true,
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
                if (this.requireFormData()) {
                    const response = await axios.post('api/order', {...this.order});
                    const value = await response.data;
                    this.order_set = {
                        success: value.success,
                        id: value.order_number,
                        client_code: value.client_code
                    }
                    this.braintree_payment.token = await this.getToken();
                    await this.getDataPayment();
                    $('#payment').modal('show');
                } else {
                    this.errorValidate();
                    console.log('error')
                }
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
                }, async function (err, instance) {
                    if (!instance) {
                        console.log('richiesta di pagamento non riuscita, riprovare');
                    }
                    externVue.braintree_payment.instance = instance;
                    externVue.braintree_payment.error = err;
                });
            },
            /**
             * Funzione che verifica se i campi 'required' sono popolati
             * @returns {boolean}
             */
            requireFormData() {
                //TODO da rivedere la validazione
                let array_value = [];
                for (const element in this.order) {
                    if (this.order[element] === '') {
                                                
                        array_value.push(false);
                    } else {
                        array_value.push(true);
                    }
                }
                this.order_set.disabled = array_value.includes(false);

                return !array_value.includes(false);


                // if (this.order.client_address !== '' &&
                //     this.order.client_name !== '' &&
                //     this.order.client_city_cap !== '' &&
                //     this.order.client_city !== '' &&
                //     this.order.client_civic_number !== '' &&
                //     this.order.client_number !== '') {
                //     this.order_set.disabled = false;
                //     return true
                // } else {
                //     return false
                // }
            },
            errorValidate() {
                $('#my_form').addClass('was-validated');
            },
            /**
             * Funzione che invia il pagamento verso i servizi di braintree e
             * ne riceve il risultato
             */
            makePayment() {
                const price = this.order.total_price;
                if (!this.braintree_payment.instance) {
                    //TODO da sistemare, in caso si procede a pagare due volte
                    $('#payment').modal('hide');
                } else {
                    this.braintree_payment.instance.requestPaymentMethod(function (err, payload) {
                        axios.post('api/order/payment', {
                            token: payload.nonce,
                            amount: price
                        }).then(response => {
                            //TODO da aggiungere funzioni nella risposta
                            console.log(response.data)
                            if (response.data.success) {
                                $('#payment').modal('hide');
                                $('#button_payment').attr('disabled', 'true');
                            } else {
                                console.log('pagamento non riuscito')
                            }
                        })
                    });
                }

            }
        },
        mounted() {
            this.getApi('api/types/', 'types', '')
        }
    });
Vue.config.devtools = true
