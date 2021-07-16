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
                    // {
                    //     id:1,
                    //     quantita:10
                    // },
                ]
            },
            quantity: 1,
            
            categoryChosen: false,
            restaurantChosen: false,
            chosenRestaurantIndex: 0,
            dishChosen: false
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

            getDishes(id, restaurantIndex) {
                this.dishes = [];
                this.restaurantChosen = true;
                this.chosenRestaurantIndex = restaurantIndex;

                    axios
                        .get('api/dishes/' + id)
                        .then((response) => {
                            this.dishes = response.data;
                            this.dishes.forEach(element => {
                                element.quantity = 1;
                            });
                    });    
            },

            startOrder(dishIndex, quantity) {
                this.dishChosen = true;

                const dish = this.dishes[dishIndex];
                const dishes = this.order.dishes;

                if (dishes.length != 0) {

                    dishes.forEach(element => {
                        if (element.id == dish.id){
                            element.quantita = element.quantita + parseInt(quantity);
                        } else {
                            dishes.push({
                                id : dish.id,
                                quantita :  parseInt(dish.quantity)
                            });
                        }
                    });

                } else {
                    dishes.push({
                        id : dish.id,
                        quantita : parseInt(dish.quantity)
                    });
                }

                

                

                

                this.order.total_price += dish.price * dish.quantity;

                console.log('piatti ordine: ', this.order.dishes);

               

                // if(this.order.dishes.some(dish=>dish.id === dish.id)){

                //     this.order.dishes[]
                // }


                   


            },

            addQuantity(dishIndex) {
                const dish = this.dishes[dishIndex];
                const inputId = 'quantity-' + dishIndex;
                
                dish.quantity = dish.quantity + 1;

                let valore = parseInt(document.getElementById(inputId).value);
                let newValore = valore + 1;
                document.getElementById(inputId).value = newValore;

            },

            decQuantity(dishIndex){
                const dish = this.dishes[dishIndex];
                const inputId = 'quantity-' + dishIndex;

                
                if (dish.quantity != 1){
                    dish.quantity--;

                    let valore = parseInt(document.getElementById(inputId).value);
                    let newValore = valore - 1;
                    document.getElementById(inputId).value = newValore;
                }
               
    
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
