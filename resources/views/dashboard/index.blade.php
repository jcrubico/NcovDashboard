<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Home | Dashboard</title>
      <link rel="icon" href="{{ asset('dashboard.gif') }}" type="image/x-icon"/>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
   </head>
   <body>
      <header>
         <div class="bg-primary collapse" id="navbarHeader" style="">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 py-2">
                     <h4 class="text-white">About</h4>
                     <p class="text-justify text-white">
                        An interactive dashboard to track the latest update for the Novel Coronavirus 2019. I've personally take the initiative to create this project as a contribution to the society. I believe, we can win this fight by doing these 3 step(s):
                     <ul class="list-unstyled">
                        <li>
                           <p class="text-white">
                              1.) "FOLLOW" and "DO" the guidelines of the World Health Organization.
                           </p>
                        </li>
                        <li>
                           <p class="text-white">
                              2.) Despite of the situation that the mankind is facing right now. Always remember, everything happens for a reason. But what the humanity needs right now is to show love to everyone by means of understanding and to support them when they feel scared. Remember, we are the people of the world. So we are responsible to each other.
                           </p>
                        </li>
                        <li>
                           <p class="text-white">
                              3.) The last and the most important of all. Even we have a major difference in terms of faith, beliefs and point of views. We need to learn on how to accept each other. Stop the blame game. Stop the hate. Do you know what we need to do right now? Is to take an action on how we will win against this pandemic. Like me, I'm encouraging everyone to contribute. No matter what small or big it is. Every effort counts. After this storm, there will be always a rainbow. The mankind will win because of love.
                           </p>
                        </li>
                     </ul>
                     </p>
                  </div>
                  <div class="col-sm-3 py-2">
                     <h4 class="text-white">WHO Official Pages</h4>
                     <ul class="list-unstyled">
                        <li>
                           <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019" class="text-white">
                           <i class="fa fa-stethoscope" style="font-size:24px;"></i> Official WHO Website
                           </a>
                        </li>
                        <li>
                           <a href="https://www.facebook.com/WHO" class="text-white">
                           <i class="fa fa-facebook-official" style="font-size:24px;"></i> Official WHO Facebook Page
                           </a>
                        </li>
                        <li>
                           <a href="https://twitter.com/WHO" class="text-white">
                           <i class="fa fa-twitter" style="font-size:24px;"></i> Official WHO Twitter Page
                           </a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-sm-3 py-2">
                     <h4 class="text-white">API used in this project</h4>
                     <ul class="list-unstyled">
                        <li>
                           <a href="https://rapidapi.com/KishCom/api/covid-19-coronavirus-statistics" class="text-white">
                           <i class="fa fa-code" style="font-size:24px;"></i> Statistics API
                           </a>
                        </li>
                        <li>
                           <a href="https://github.com/pomber/covid19" class="text-white">
                           <i class="fa fa-github" style="font-size:24px;"></i> Timeseries API
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="navbar navbar-dark bg-primary shadow-sm">
            <div class="container-fluid">
               <a href="javascript:void(0);" class="navbar-brand d-flex align-items-center">
               <strong>
               <i class="fa fa-line-chart" style="font-size:24px;"></i> Novel Coronavirus Dashboard
               </strong>
               </a>
               <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
            </div>
         </div>
      </header>
      <div class="container-fluid py-2">
         <h1>Novel Coronavirus Statistics</h1>
      </div>
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
                                    <canvas id="myChart"></canvas>
                                 </div>
                              </div>
                           </div>
                           <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                           <script>
                              var ctx = document.getElementById('myChart');
                              var myChart = new Chart(ctx, {
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
                                      legend : false,
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
                           </script>
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
                                    <canvas id="myChart2"></canvas>
                                 </div>
                              </div>
                           </div>
                           <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                           <script>
                              var ctx = document.getElementById('myChart2');
                              var myChart = new Chart(ctx, {
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
                                      legend : false,
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
                           </script>
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
                                    <canvas id="myChart3"></canvas>
                                 </div>
                              </div>
                           </div>
                           <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                           <script>
                              var ctx = document.getElementById('myChart3');
                              var myChart = new Chart(ctx, {
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
                                      legend : false,
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
                           </script>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
   </body>
</html>