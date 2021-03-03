require('./bootstrap');
import axios from 'axios';
import Chart from 'chart.js';
import $ from 'jquery';

//jquery
$(document).ready(function(){
    axios.get('http://127.0.0.1:8000/api/Order',{
            params:{
                id: attualId,
                year: 2021,
            }
        })
        .then(function (response) {
            console.log(response.data);
            var results = response.data;
            var ready = [
                {
                    month: 'gennaio',
                    sales: 0
                },
                {
                    month: 'febbraio',
                    sales: 0
                },
                {
                    month: 'marzo',
                    sales: 0
                },
                {
                    month: 'aprile',
                    sales: 0
                },
                {
                    month: 'maggio',
                    sales: 0
                },
                {
                    month: 'giugno',
                    sales: 0
                },
                {
                    month: 'luglio',
                    sales: 0
                },
                {
                    month: 'agosto',
                    sales: 0
                },
                {
                    month: 'settembre',
                    sales: 0
                },
                {
                    month: 'ottoble',
                    sales: 0
                },
                {
                    month: 'novembre',
                    sales: 0
                },
                {
                    month: 'dicembre',
                    sales: 0
                },

            ];
            var monthSales = [];
            results.forEach(element => {
                for(let i = 1; i < 13; i++){
                    if(i == element.month){
                        ready[i].sales += parseInt(element.price);
                    }
                }
            });
            ready.splice(0,1);
            ready.forEach(element=> {
                monthSales.push(element.sales);
            });
            window.myNewArray = monthSales;
            console.log(window.myNewArray);

            //istanza chart
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottoble', 'novembre', 'dicembre'],
                    datasets: [{
                        label: 'sales four month',
                        data: window.myNewArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
        .catch(function (error) {
            console.log(error);
        });
});
