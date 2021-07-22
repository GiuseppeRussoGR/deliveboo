Vue.config.devtools = true
Vue.component('month-chart', {
    props: ['id'],
    extends: VueChartJs.Bar,
    data() {
        return {
            periodo: [],
            count: [],
            data_ordini: [],
            data_totale: [],
            structure: {}
        }
    },
    mounted() {
        this.caricaChar();
        setTimeout(() => {
            this.renderChar();
        }, 5000)
    },
    methods: {
        caricaChar() {
            axios.get('/api/admin/' + this.id + '/statistics').then(response => {
                response.data.forEach(element => {
                    if (!this.periodo.includes(element.created_at)) {
                        this.periodo.push(element.created_at);
                        this.count.push({
                            data: element.created_at,
                            volte: 1,
                            totale: parseInt(element.total_price)
                        });
                    } else {
                        this.count.forEach(array_element => {
                            if (array_element.data === element.created_at) {
                                array_element.volte += 1;
                                array_element.totale += parseInt(element.total_price)
                            }
                        })
                    }
                })
            })

        },
        renderChar() {
            this.count.forEach(element => {
                this.data_ordini.push(element.volte);
                this.data_totale.push(element.totale);
            })
            $('.lds-roller').hide();
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Ordini',
                        backgroundColor: 'red',
                        data: this.data_ordini
                    },
                    {
                        label: 'Totale in Euro',
                        backgroundColor: 'yellow',
                        data: this.data_totale
                    }

                ]
            }, {responsive: true, maintainAspectRatio: false, scales: {yAxes: [{ticks: {beginAtZero: true}}]}})
        }
    }
})
Vue.component('year-chart', {
    extends: VueChartJs.Bar,
    props: ['id'],
    data() {
        return {
            periodo: [],
            count: [],
            data_ordini: [],
            data_totale: [],
            structure: {}
        }
    },
    mounted() {
        this.caricaChar();
        setTimeout(() => {
            this.renderChar();
        }, 5000)
    },
    methods: {
        caricaChar() {
            axios.get('/api/admin/' + this.id + '/statistics').then(response => {
                response.data.forEach(element => {
                    let split = element.created_at.split('-')
                    element.created_at = split[0];
                    if (!this.periodo.includes(element.created_at)) {
                        this.periodo.push(element.created_at);
                        this.count.push({
                            data: element.created_at,
                            volte: 1,
                            totale: parseInt(element.total_price)
                        });
                    } else {
                        this.count.forEach(array_element => {
                            if (array_element.data === element.created_at) {
                                array_element.volte += 1;
                                array_element.totale += parseInt(element.total_price)
                            }
                        })
                    }
                })
            })

        },
        renderChar() {
            this.count.forEach(element => {
                this.data_ordini.push(element.volte);
                this.data_totale.push(element.totale);
            })
            this.visible = !this.visible;
            $('.lds-roller').hide();
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Ordini',
                        backgroundColor: 'red',
                        data: this.data_ordini
                    },
                    {
                        label: 'Totale in Euro',
                        backgroundColor: 'yellow',
                        data: this.data_totale
                    }

                ]
            }, {responsive: true, maintainAspectRatio: false, scales: {yAxes: [{ticks: {beginAtZero: true}}]}})
        }
    }
})
var vm = new Vue({
    el: '#root',
    data: {
        status: true,
        openBasket: false
    }
})
