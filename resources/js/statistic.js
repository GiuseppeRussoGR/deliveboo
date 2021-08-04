Vue.config.devtools = true
Vue.component('month-chart', {
    props: ['filtrato', 'periodo', 'ordini', 'incassi'],
    extends: VueChartJs.Bar,
    data() {
        return {
            quantita_ordini: [],
            valore_totale_ordini: [],
            structure: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes:
                        [
                            {
                                ticks:
                                    {
                                        beginAtZero: true
                                    }
                            }
                        ]
                }
            },
        }
    },
    mounted() {
        if (typeof this.ordini === 'undefined') {
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Totale in Euro',
                        backgroundColor: [
                            "#ffed67",
                            "#00328a",
                            "#6b9800",
                            "#007df3",
                            "#d80000",
                            "#00beff",
                            "#f00389",
                            "#0078e7",
                            "#d890ce",
                            "#c15fbe"],
                        data: this.incassi
                    }

                ]
            }, this.structure)
        } else {
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Numero di Ordini',
                        backgroundColor: ["#ffed67",
                            "#00328a",
                            "#6b9800",
                            "#007df3",
                            "#d80000",
                            "#00beff",
                            "#f00389",
                            "#0078e7",
                            "#d890ce",
                            "#c15fbe"],
                        data: this.ordini
                    }

                ]
            }, this.structure)
        }

    }
})
Vue.component('year-chart', {
    extends: VueChartJs.Bar,
    props: ['filtrato', 'periodo', 'ordini', 'incassi'],
    data() {
        return {
            quantita_ordini: [],
            valore_totale_ordini: [],
            structure: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes:
                        [
                            {
                                ticks:
                                    {
                                        beginAtZero: true
                                    }
                            }
                        ]
                }
            },
        }
    },
    mounted() {
        if (typeof this.ordini === 'undefined') {
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Totale in Euro',
                        backgroundColor: ["#ffed67",
                            "#00328a",
                            "#6b9800",
                            "#007df3",
                            "#d80000",
                            "#00beff",
                            "#f00389",
                            "#0078e7",
                            "#d890ce",
                            "#c15fbe"],
                        data: this.incassi
                    }

                ]
            }, this.structure)
        } else {
            this.renderChart({
                labels: this.periodo,
                datasets: [
                    {
                        label: 'Numero di Ordini',
                        backgroundColor: ["#ffed67",
                            "#00328a",
                            "#6b9800",
                            "#007df3",
                            "#d80000",
                            "#00beff",
                            "#f00389",
                            "#0078e7",
                            "#d890ce",
                            "#c15fbe"],
                        data: this.ordini
                    }

                ]
            }, this.structure)
        }
    }
})
var vm = new Vue({
    el: '#root',
    data: {
        status: true,
        openBasket: false,
        id: false,
        response: {},
        responseError: {},
        isLoading: true,
        periodo_mese: [],
        periodo_anno: [],
        filter: [],
        numeroOrdini: [],
        incassiTotali: [],
        listYear: [],
    },
    methods: {
        popolaPeriodo(anno, variable) {
            this[variable] = [];
            this.filter = [];
            this.numeroOrdini = [];
            this.incassiTotali = [];
            for (let data in this.response) {
                if (anno) {
                    let split = this.response[data].created_at.split('-');
                    this.countData(variable, data, split[0]);
                } else {
                    this.countData(variable, data, this.response[data].created_at);
                }
            }
        },
        countData(variable, data, element) {
            if (!this[variable].includes(element)) {
                this[variable].push(element);
                this.filter.push({
                    data: element,
                    volte: 1,
                    totale: parseInt(this.response[data].total_price)
                });
            } else {
                this.filter.forEach(array_element => {
                    if (array_element.data === element) {
                        array_element.volte += 1;
                        array_element.totale += parseInt(this.response[data].total_price)
                    }
                })
            }
        },
        makeFilter() {
            this.filter.forEach(element => {
                this.numeroOrdini.push(element.volte);
                this.incassiTotali.push(element.totale);
            })
        },
        switchYear() {
            this.popolaPeriodo(true, 'periodo_anno');
            this.makeFilter();
            this.isLoading = false;
        },
        switchMonth() {
            this.popolaPeriodo(false, 'periodo_mese');
            this.makeFilter();
            this.isLoading = false;
        }
    },
    async created() {
        this.id = parseInt(window.location.href.split('/')[4]);
        await axios.get('/api/admin/' + this.id + '/statistics').then(response => {
            this.response = response.data;
        }, error => {
            this.responseError = error;
        })
        if (_.size(this.response) >= 1) {
            this.switchMonth();
        } else {
            //TODO inserire l'errore
        }
    },

})
