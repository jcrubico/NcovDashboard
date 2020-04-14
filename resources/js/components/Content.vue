<template>
   <div class="album bg-light">
      <div class="container-fluid">
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Country</b>
                     <div class="d-flex justify-content-between align-items-center py-2">
                        <select class="custom-select">
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total confirmed</b>
                     <div class="d-flex justify-content-between align-items-center">100</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total deaths</b>
                     <div class="d-flex justify-content-between align-items-center">100</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card mb-4 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total recovered</b>
                     <div class="d-flex justify-content-between align-items-center">100</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Graph of cases</b>
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <canvas ref="covidCases"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Graph of deaths</b>
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <canvas ref="covidDeaths"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Graph of recovered</b>
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <canvas ref="covidRecovered"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<script>
    export default {
        mounted() {
            this.setGraph1();
            this.setGraph2();
            this.setGraph3();
        },
        methods: {
            setGraph1() {
                var oChart = this.$refs.covidCases;
                var oContext = oChart.getContext('2d');
                var oCovidCases = new Chart(oContext, {
                    type: 'line',
                    data: {
                        labels: [
                            'January 22, 2020',
                            'January 23, 2020',
                            'January 24, 2020',
                            'January 25, 2020',
                            'January 26, 2020',
                            'January 27, 2020',
                            'January 28, 2020',
                            'January 29, 2020',
                            'January 30, 2020',
                            'January 31, 2020',
                            'February 01, 2020',
                            'February 02, 2020',
                            'February 03, 2020',
                            'February 04, 2020',
                            'February 05, 2020',
                            'February 06, 2020',
                            'February 07, 2020',
                            'February 08, 2020',
                            'February 09, 2020',
                            'February 10, 2020',
                            'February 11, 2020',
                            'February 12, 2020',
                            'February 13, 2020',
                            'February 14, 2020',
                            'February 15, 2020',
                            'February 16, 2020',
                            'February 17, 2020',
                            'February 18, 2020',
                            'February 19, 2020',
                            'February 20, 2020',
                            'February 21, 2020',
                            'February 22, 2020',
                            'February 23, 2020',
                            'February 24, 2020',
                            'February 25, 2020',
                            'February 26, 2020',
                            'February 27, 2020',
                            'February 28, 2020',
                            'February 29, 2020',
                            'March 01, 2020',
                            'March 02, 2020',
                            'March 03, 2020',
                            'March 04, 2020',
                            'March 05, 2020',
                            'March 06, 2020',
                            'March 07, 2020',
                            'March 08, 2020',
                            'March 09, 2020',
                            'March 10, 2020',
                            'March 11, 2020',
                            'March 12, 2020',
                            'March 13, 2020',
                            'March 14, 2020',
                            'March 15, 2020',
                            'March 16, 2020',
                            'March 17, 2020',
                            'March 18, 2020',
                            'March 19, 2020',
                            'March 20, 2020',
                            'March 21, 2020',
                            'March 22, 2020',
                            'March 23, 2020',
                            'March 24, 2020',
                            'March 25, 2020',
                            'March 26, 2020'
                        ],
                        datasets: [{
                            label: 'Philippines',
                            data: [
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                1,
                                1,
                                1,
                                2,
                                2,
                                2,
                                2,
                                2,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                5,
                                6,
                                10,
                                20,
                                33,
                                49,
                                52,
                                64,
                                111,
                                140,
                                142,
                                187,
                                202,
                                217,
                                230,
                                307,
                                380,
                                462,
                                552,
                                636,
                                707
                            ],
                            backgroundColor: 'rgb(54, 162, 235)',
                            borderColor: 'rgb(54, 162, 235)',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        title: {
                            display: true,
                            text: 'Covid 19 chart'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Days'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '# of cases'
                                }
                            }]
                        }
                    }
                });
            },
            setGraph2() {
                var oChart = this.$refs.covidDeaths;
                var oContext = oChart.getContext('2d');
                var oCovidCases = new Chart(oContext, {
                    type: 'line',
                    data: {
                        labels: [
                            'January 22, 2020',
                            'January 23, 2020',
                            'January 24, 2020',
                            'January 25, 2020',
                            'January 26, 2020',
                            'January 27, 2020',
                            'January 28, 2020',
                            'January 29, 2020',
                            'January 30, 2020',
                            'January 31, 2020',
                            'February 01, 2020',
                            'February 02, 2020',
                            'February 03, 2020',
                            'February 04, 2020',
                            'February 05, 2020',
                            'February 06, 2020',
                            'February 07, 2020',
                            'February 08, 2020',
                            'February 09, 2020',
                            'February 10, 2020',
                            'February 11, 2020',
                            'February 12, 2020',
                            'February 13, 2020',
                            'February 14, 2020',
                            'February 15, 2020',
                            'February 16, 2020',
                            'February 17, 2020',
                            'February 18, 2020',
                            'February 19, 2020',
                            'February 20, 2020',
                            'February 21, 2020',
                            'February 22, 2020',
                            'February 23, 2020',
                            'February 24, 2020',
                            'February 25, 2020',
                            'February 26, 2020',
                            'February 27, 2020',
                            'February 28, 2020',
                            'February 29, 2020',
                            'March 01, 2020',
                            'March 02, 2020',
                            'March 03, 2020',
                            'March 04, 2020',
                            'March 05, 2020',
                            'March 06, 2020',
                            'March 07, 2020',
                            'March 08, 2020',
                            'March 09, 2020',
                            'March 10, 2020',
                            'March 11, 2020',
                            'March 12, 2020',
                            'March 13, 2020',
                            'March 14, 2020',
                            'March 15, 2020',
                            'March 16, 2020',
                            'March 17, 2020',
                            'March 18, 2020',
                            'March 19, 2020',
                            'March 20, 2020',
                            'March 21, 2020',
                            'March 22, 2020',
                            'March 23, 2020',
                            'March 24, 2020',
                            'March 25, 2020',
                            'March 26, 2020'
                        ],
                        datasets: [{
                            label: 'Philippines',
                            data: [
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                1,
                                1,
                                1,
                                2,
                                2,
                                2,
                                2,
                                2,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                5,
                                6,
                                10,
                                20,
                                33,
                                49,
                                52,
                                64,
                                111,
                                140,
                                142,
                                187,
                                202,
                                217,
                                230,
                                307,
                                380,
                                462,
                                552,
                                636,
                                707
                            ],
                            backgroundColor: 'rgb(54, 162, 235)',
                            borderColor: 'rgb(54, 162, 235)',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        title: {
                            display: true,
                            text: 'Covid 19 chart'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Days'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '# of cases'
                                }
                            }]
                        }
                    }
                });
            },
            setGraph3() {
                var oChart = this.$refs.covidRecovered;
                var oContext = oChart.getContext('2d');
                var oCovidCases = new Chart(oContext, {
                    type: 'line',
                    data: {
                        labels: [
                            'January 22, 2020',
                            'January 23, 2020',
                            'January 24, 2020',
                            'January 25, 2020',
                            'January 26, 2020',
                            'January 27, 2020',
                            'January 28, 2020',
                            'January 29, 2020',
                            'January 30, 2020',
                            'January 31, 2020',
                            'February 01, 2020',
                            'February 02, 2020',
                            'February 03, 2020',
                            'February 04, 2020',
                            'February 05, 2020',
                            'February 06, 2020',
                            'February 07, 2020',
                            'February 08, 2020',
                            'February 09, 2020',
                            'February 10, 2020',
                            'February 11, 2020',
                            'February 12, 2020',
                            'February 13, 2020',
                            'February 14, 2020',
                            'February 15, 2020',
                            'February 16, 2020',
                            'February 17, 2020',
                            'February 18, 2020',
                            'February 19, 2020',
                            'February 20, 2020',
                            'February 21, 2020',
                            'February 22, 2020',
                            'February 23, 2020',
                            'February 24, 2020',
                            'February 25, 2020',
                            'February 26, 2020',
                            'February 27, 2020',
                            'February 28, 2020',
                            'February 29, 2020',
                            'March 01, 2020',
                            'March 02, 2020',
                            'March 03, 2020',
                            'March 04, 2020',
                            'March 05, 2020',
                            'March 06, 2020',
                            'March 07, 2020',
                            'March 08, 2020',
                            'March 09, 2020',
                            'March 10, 2020',
                            'March 11, 2020',
                            'March 12, 2020',
                            'March 13, 2020',
                            'March 14, 2020',
                            'March 15, 2020',
                            'March 16, 2020',
                            'March 17, 2020',
                            'March 18, 2020',
                            'March 19, 2020',
                            'March 20, 2020',
                            'March 21, 2020',
                            'March 22, 2020',
                            'March 23, 2020',
                            'March 24, 2020',
                            'March 25, 2020',
                            'March 26, 2020'
                        ],
                        datasets: [{
                            label: 'Philippines',
                            data: [
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                0,
                                1,
                                1,
                                1,
                                2,
                                2,
                                2,
                                2,
                                2,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                3,
                                5,
                                6,
                                10,
                                20,
                                33,
                                49,
                                52,
                                64,
                                111,
                                140,
                                142,
                                187,
                                202,
                                217,
                                230,
                                307,
                                380,
                                462,
                                552,
                                636,
                                707
                            ],
                            backgroundColor: 'rgb(54, 162, 235)',
                            borderColor: 'rgb(54, 162, 235)',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        title: {
                            display: true,
                            text: 'Covid 19 chart'
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Days'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '# of cases'
                                }
                            }]
                        }
                    }
                });
            }
        }
    }
</script>