Vue.config.devtools = true
import VueCookies from 'vue-cookies'

Vue.use(VueCookies)
Vue.$cookies.config(60 * 60, '/', '', true, 'Lax')
const app = new Vue(
    {
        el: '#root',
        data: {
            types: [],
            restaurants: [],
            restaurant_id: false,
            dishes: [],
            order: {
                total_price: 0,
                client_name: '',
                client_address: '',
                client_civic_number: '',
                client_email: '',
                client_city_cap: '',
                client_city: '',
                client_number: "",
                dishes: []
            },
            order_set: {},
            braintree_payment: {
                token: '',
                payment: false,
                instance: '',
                error: ''
            },
            categoryChosen: false,
            restaurantChosen: false,
            chosenRestaurantIndex: false,
            openBasket: false,
            stage: 0,
            card: false,
            notify: {},
            allTypesShown: false,
            showHideTypesButton: "Mostra tutte",
            quantityInCart: 0,
            checkoutButton: true
        },
        methods: {
            showAllTypes() {
                if (this.allTypesShown) {
                    this.allTypesShown = false;
                    this.showHideTypesButton = 'Mostra tutte';
                } else {
                    this.allTypesShown = true;
                    this.showHideTypesButton = "Riduci";
                }
            },
            refreshQuantities() {
                this.quantityInCart = 0;
                this.order.dishes.forEach(item => {
                    this.quantityInCart += item.quantita;
                });
            },
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
                const restaurant_select = this.restaurant_id;
                if (order_dishes.some(dish => dish.ristorante === restaurant_select) || order_dishes.length === 0) {
                    if (order_dishes.some(dish => dish.id === select_dish.id)) {
                        let dish_index = order_dishes.map(element => {
                            return element.id
                        }).indexOf(select_dish.id);
                        order_dishes[dish_index].quantita += parseInt(quantity);
                        order_dishes[dish_index].totale_singolo = parseInt(order_dishes[dish_index].quantita) * parseFloat(select_dish.price.toFixed(1));
                        order_dishes[dish_index].totale_singolo = this.roundValue(order_dishes[dish_index].totale_singolo);
                    } else {
                        order_dishes.push({
                            id: select_dish.id,
                            quantita: parseInt(quantity),
                            ristorante: parseInt(restaurant_select),
                            nome: select_dish.name,
                            prezzo_singolo: parseFloat(select_dish.price),
                            totale_singolo: parseInt(quantity) * parseFloat(select_dish.price.toFixed(1))
                        })
                    }
                    this.order.total_price += select_dish.price * parseInt(quantity);
                    this.order.total_price = this.roundValue(this.order.total_price);
                } else {
                    this.notify = {
                        style: 'danger',
                        message: 'Si può fare l\'ordine soltanto da un ristorante alla volta'
                    }
                    $('#error_modal').modal('show');
                }
                this.setDataOrderCookie();
                this.refreshQuantities();
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
                this.refreshQuantities();
            },
            /**
             * Funzione per rimuovere elementi nel carrello
             * @param index indice dell'elemento nella'array
             */
            removeOrder(index) {
                this.order.dishes.splice(index, 1);

                this.refreshQuantities();
            },
            /**
             * Funzione per ricalcolare il totale dell'ordine
             */
            totalOrderRecalculated(index, up_down) {
                if (up_down) {
                    this.order.dishes[index].totale_singolo = this.order.dishes[index].quantita * this.order.dishes[index].prezzo_singolo;
                    this.order.dishes[index].totale_singolo = this.roundValue(this.order.dishes[index].totale_singolo);
                }
                this.order.total_price = 0;
                this.order.dishes.forEach(element => {
                    this.order.total_price += element.prezzo_singolo * element.quantita;
                    this.order.total_price = this.roundValue(this.order.total_price);
                })
            },
            /**
             * Funzione che permette di inserire l'ordine nel DB
             */
            setOrder() {
                if (this.requireFormData() && !this.notify.hasOwnProperty('message')) {
                    axios.post('api/order', {...this.order}).then(async response => {
                        this.order_set = {
                            success: response.data.success,
                            id: response.data.order_number,
                            client_code: response.data.client_code
                        }
                        this.braintree_payment.token = await this.getToken();
                        await this.getDataPayment();
                        $('#dropin-container').show();
                        $('#button_payment').show();
                        $('#message_payment').removeClass('bg-danger p-3 text-light').hide();
                        $('#payment').modal('show');
                    }).catch(error => {
                        this.notify = {
                            style: 'danger',
                            message: error.response.data.errors
                        }
                        $('#error_modal').modal('show');
                    });

                } else if (this.braintree_payment.payment) {
                    this.notify = {
                        style: 'warning',
                        message: 'Ordine già inviato, attendi che venga evaso l\'ordine'
                    }
                    $('#error_modal').modal('show');
                } else {
                    $('#my_form').addClass('was-validated');
                    this.notify = {
                        style: 'danger',
                        message: 'Riempi tutti i campi contrassegnati'
                    }
                    $('#error_modal').modal('show');
                }
            },
            /**
             * Funzione per settare un valore nei cookie
             */
            setDataOrderCookie() {
                this.$cookies.set('client_order', this.order)
            },
            /**
             * Funzione che permette di creare il token da inviare ai servizi di braintree
             * @returns {Promise<*>}
             */
            async getToken() {
                const response = await axios.get('api/order/token ');
                return response.data.token;
            },
            /**
             * Funzione che prende i dati di pagamento dall'utente e genero l'istanza di braintree
             * @returns {Promise<void>}
             */
            getDataPayment() {
                braintree.dropin.create({
                    authorization: this.braintree_payment.token,
                    selector: '#dropin-container',
                    vaultManager: true
                }, (err, instance) => {
                    if (!instance) {
                        this.notify = {
                            style: false,
                            message: 'Errore durante la richiesta di pagamento. Provare a ricaricare la pagina ed effettuare di nuovo il pagamento'
                        }
                        $('#error_modal').modal('show');
                    }
                    this.braintree_payment.instance = instance;
                    this.braintree_payment.error = err;
                });
            },
            /**
             * Funzione che verifica se i campi 'required' sono popolati
             * @returns {boolean}
             */
            requireFormData() {
                let array_value = [];
                for (const element in this.order) {
                    if (this.order[element] === '') {
                        array_value.push(false);
                    } else {
                        array_value.push(true);
                    }
                }
                return !array_value.includes(false);
            },
            /**
             * Funzione che invia il pagamento verso i servizi di braintree e
             * ne riceve il risultato
             */
            makePayment() {
                const price = this.order.total_price;
                $('#my_form').removeClass('was-validated');
                this.braintree_payment.instance.requestPaymentMethod((err, payload) => {
                    axios.post('api/order/customer', {
                        token: payload.nonce,
                    }).then(response => {
                        if (response.data.success) {
                            axios.post('api/order/payment', {
                                amount: price,
                                id_order: this.order_set.id,
                                customer_id: response.data.customerId,
                                client_email: this.client_email
                            }).then(result => {
                                if (result.data.success) {
                                    this.braintree_payment.payment = true;
                                    this.$cookies.remove('client_order');
                                    this.openBasket = false;
                                    this.order = {
                                        dishes: []
                                    };
                                    $('#dropin-container').hide();
                                    $('#message_payment').addClass('bg-success p-3 text-light text-center').html(result.data.message).show();
                                    $('#button_payment').hide();
                                    this.quantityInCart = 0;
                                    this.stage = 0;
                                } else {
                                    $('#dropin-container').hide();
                                    $('#button_payment').hide();
                                    $('#message_payment').addClass('bg-danger p-3 text-light text-center').html(result.data.message).show();
                                }
                            })
                        } else {
                            $('#dropin-container').hide();
                            $('#button_payment').hide();
                            $('#message_payment').addClass('bg-danger p-3 text-light text-center').html(response.data.message).show();
                        }
                    })
                });
            },
            /**
             * Funzione che in caso di chiusura della modale cancella l'istanza di braintree
             */
            teardownBraintree() {
                this.braintree_payment.instance.teardown();
            },
            /**
             * Funzione che arrotonda in decimali
             * @param element variabile su cui eseguire il trunk
             * @returns numero float con 2 decimali
             */
            roundValue(element) {
                return parseFloat(element.toFixed(1));
            },

            // burger-menu
            showMenu() {
                $(".burger-content").fadeToggle("fast");
            }
        },
        mounted() {
            this.getApi('api/types/', 'types', '');

            this.refreshQuantities();
        },
        created() {
            if (this.$cookies.isKey('client_order')) {
                this.order.total_price = $cookies.get('client_order').total_price;
                this.order.dishes = $cookies.get('client_order').dishes;
            }
        }

    });


