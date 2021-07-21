let labels = [];
let count = [];
var myChart;
var interval = setInterval(function () {
    if (statistics.length > 0) {
        myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
        clearInterval(interval);
    }
}, 2000)
const data = {
    labels: labels,
    datasets: [
        {
            label: 'Totale Ordini',
            data: [],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        },
        {
            label: 'Entrate in Euro',
            data: [],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }
    ]
};
const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
    },
};

statistics.forEach(element => {
    if (anno_data) {
        let split = element.inserito.split('-')
        element.inserito = split[0];
    }
    if (!labels.includes(element.inserito)) {
        labels.push('' + element.inserito + '')
        count.push({
            data: element.inserito,
            volte: 1,
            totale: parseInt(element.prezzo_totale)
        })
    } else {
        count.forEach(array_element => {
            if (array_element.data === element.inserito) {
                array_element.volte += 1;
                array_element.totale += parseInt(element.prezzo_totale)
            }
        })
    }
})
count.forEach(element => {
    data.datasets[0].data.push(element.volte);
    data.datasets[1].data.push(element.totale)
})

myChart = new Chart(
    document.getElementById('myChart'),
    config
);

resetCanvas = function () {
    myChart.data.labels.pop();
    myChart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    myChart.update();
}
addCanvas = function () {
    myChart.data = data;
    myChart.update();
}
