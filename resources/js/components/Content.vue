<template>
   <div class="album bg-light">
      <div class="container-fluid">
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Country</b>
                     <div class="d-flex justify-content-between align-items-center py-2">
                        <select name="country" @change="onChangeSelect($event)" v-model="key" class="custom-select">
                            <option v-for="country in countries" :value="country.id">
                                {{ country.text }}
                            </option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-3">
               <div class="card mb-3 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total confirmed</b>
                     <div class="d-flex justify-content-between align-items-center">{{ total_cases.total_confirmed }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card mb-3 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total active cases</b>
                     <div class="d-flex justify-content-between align-items-center">{{ total_cases.total_active }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card mb-3 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total deaths</b>
                     <div class="d-flex justify-content-between align-items-center">{{ total_cases.total_deaths }}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card mb-3 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Total recovered</b>
                     <div class="d-flex justify-content-between align-items-center">{{ total_cases.total_recovered }}</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row py-2">
            <div class="col-md-12">
               <div class="card mb-12 shadow-sm">
                  <div class="card-body">
                     <b class="card-text">Graph of total cases</b>
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
                     <b class="card-text">Graph of active cases</b>
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <canvas ref="covidActiveCases"></canvas>
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
            this.getTotalSeriesCases();
        },
        data() {
            this.getCountryList();
            this.getTotalCases();
            return {
                key         : 'czo3OiIqV29ybGQqIjs=',
                countries   : [],
                total_cases : []
            };
        },
        methods: {
            onChangeSelect(event) {
                let sValue = event.target.value;
                this.getTotalCases(sValue);
                this.getTotalSeriesCases(sValue);
            },
            getTotalSeriesCases(sParams='czo3OiIqV29ybGQqIjs=') {
                let sApi = '/api/get/country/cases';
                if (sParams !== 'czo3OiIqV29ybGQqIjs=') {
                    sApi = '/api/get/country/cases?country_no=' + sParams;
                }
                let dates = [];
                let confirmed = [];
                let active_cases = [];
                let deaths = [];
                let recovered = [];
                axios.get(sApi)
                    .then((response) => {
                        for (let iCtr = 0; iCtr < response.data.length; iCtr++) {
                            let sDate = response.data[iCtr].date;
                            let sConfirmed = response.data[iCtr].confirmed;
                            let sActiveCases = response.data[iCtr].active_cases;
                            let sDeaths = response.data[iCtr].deaths;
                            let sRecovered = response.data[iCtr].recovered;
                            dates.push(sDate);
                            confirmed.push(sConfirmed);
                            deaths.push(sDeaths);
                            recovered.push(sRecovered);
                            active_cases.push(sActiveCases);
                        }
                        if (window.oCases != undefined) {
                            window.oCases.destroy();
                        }
                        window.oCases = this.setGraph(this.$refs.covidCases, dates, confirmed, 'Number of cases', 'Cases chart', 'rgb(0, 255, 0)');

                        if (window.oDeaths != undefined) {
                            window.oDeaths.destroy();
                        }
                        window.oDeaths = this.setGraph(this.$refs.covidDeaths, dates, deaths, 'Number of deaths', 'Death chart', 'rgb(255, 0, 0)');

                        if (window.oRecovered != undefined) {
                            window.oRecovered.destroy();
                        }
                        window.oRecovered = this.setGraph(this.$refs.covidRecovered, dates, recovered, 'Number of recoveries', 'Recovery chart', 'rgb(0, 0, 255)');

                        if (window.oActiveCases != undefined) {
                            window.oActiveCases.destroy();
                        }
                        window.oActiveCases = this.setGraph(this.$refs.covidActiveCases, dates, active_cases, 'Number of active cases', 'Active cases chart', 'rgb(255, 255, 0)');
                        
                });
            },
            getTotalCases(sParams='czo3OiIqV29ybGQqIjs=') {
                let sApi = '/api/get/country/total/cases';
                if (sParams !== 'czo3OiIqV29ybGQqIjs=') {
                    sApi = '/api/get/country/total/cases?country_no=' + sParams;
                }
                axios.get(sApi)
                    .then((response) => {
                        this.total_cases = response.data;
                });
            },
            getCountryList() {
                axios.get('/api/get/country/list')
                    .then((response) => {
                        this.countries = response.data;
                });
            },
            setGraph(refs, aDates, aData, sLabel, sTitle, sColor) {
                var oContext = refs.getContext('2d');
                var oChart = new Chart(oContext, {
                    type: 'line',
                    data: {
                        labels: aDates,
                        datasets: [{
                            label: sLabel,
                            data: aData,
                            backgroundColor: sColor,
                            borderColor: sColor,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: false,
                        title: {
                            display: true,
                            text: sTitle
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
                                    labelString: sLabel
                                }
                            }]
                        }
                    }
                });
                return oChart;
            }
        }
    }
</script>