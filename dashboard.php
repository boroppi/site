<?php include 'function/header.php';?>

<body class="">
    <div class="wrapper ">
        <?php include 'function/sidebar.php' ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header" style="display: flex;flex-wrap: wrap;">
                <div class="cointlist btc">
                    <img src="img/Bitcoin@2x-white.png" style="height: 100%;">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;padding: 2% 0 0 0;font-weight: 700;">BTC</h1>
                    <h2 style="padding-left: 5px;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;color: white;padding: 5% 0 0 10%;font-weight: 500;"> $</h2>
                </div>
                <div class="cointlist2 eth">
                    <img src="img/Ethereum@2x-white.png" style="height: 100%;">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;padding: 2% 0 0 0;font-weight: 700;">ETH</h1>
                    <h2 style="padding-left: 5px;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;color: white;padding: 5% 0 0 10%;font-weight: 500;"> $</h2>
                </div>
                <div class="cointlist3 xrp">
                    <img src="img/Ripple@2x-white.png" style="height: 100%;">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;padding: 2% 0 0 0;font-weight: 700;">XRP</h1>
                    <h2 style="padding-left: 5px;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;color: white;padding: 5% 0 0 10%;font-weight: 500;"> $</h2>
                </div>
                <div class="cointlist4 pivx">
                    <img src="img/pivx@2x-white.png" style="height: 100%;">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;padding: 2% 0 0 0;font-weight: 700;">PIVX</h1>
                    <h2 style="padding-left: 5px;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;color: white;padding: 5% 0 0 10%;font-weight: 500;"> $</h2>
                </div>
                <div class="cointlist5 ltc">
                    <img src="img/Litecoin@2x-white.png" style="height: 100%;">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;padding: 2% 0 0 0;font-weight: 700;">LTC</h1>
                    <h2 style="padding-left: 5px;font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;color: white;padding: 5% 0 0 10%;font-weight: 500;"> $</h2>
                </div>
                <div class="cointlist6">
                    <h1 style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color: white;font-weight: 700;padding-top: 2%;">OTHERS</h1>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Global Sales</h5>
                                <h4 class="card-title">Shipped Products</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                        <i class="now-ui-icons loader_gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExample"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">2018 Sales</h5>
                                <h4 class="card-title">All products</h4>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                        <i class="now-ui-icons loader_gear"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Email Statistics</h5>
                                <h4 class="card-title">24 Hours Performance</h4>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="barChartSimpleGradientsNumbers"></canvas>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="card card-tasks">
                      <div class="card-header">
                        <h5 class="card-category">Backend development</h5>
                        <h4 class="card-title">Tasks</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-full-width table-responsive">
                          <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" checked="">
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </td>

                                    <td class="text-left">Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                                            <i class="now-ui-icons ui-2_settings-90"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                            <i class="now-ui-icons ui-1_simple-remove"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="card-footer">
                        <hr>
                        <div class="stats">
                          <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
                      </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                            <h5 class="card-category">All Persons List</h5>
                            <h4 class="card-title"> Employees Stats</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th >
                                    Name
                                  </th>
                                  <th >
                                    Country
                                  </th>
                                  <th >
                                    City
                                  </th>
                                  <th  class="text-right" >
                                    Salary
                                  </th>
                                </thead>
                                <tbody>
                                  <tr >
                                    <td >
                                      Dakota Rice
                                    </td>
                                    <td >
                                      Niger
                                    </td>
                                    <td >
                                      Oud-Turnhout
                                    </td>
                                    <td  class="text-right" >
                                      $36,738
                                    </td>
                                  </tr>
                                  <tr >
                                    <td >
                                      Minerva Hooper
                                    </td>
                                    <td >
                                      Curaçao
                                    </td>
                                    <td >
                                      Sinaai-Waas
                                    </td>
                                    <td  class="text-right" >
                                      $23,789
                                    </td>
                                  </tr>
                                  <tr >
                                    <td >
                                      Sage Rodriguez
                                    </td>
                                    <td >
                                      Netherlands
                                    </td>
                                    <td >
                                      Baileux
                                    </td>
                                    <td  class="text-right" >
                                      $56,142
                                    </td>
                                  </tr>
                                  <tr >
                                    <td >
                                      Doris Greene
                                    </td>
                                    <td >
                                      Malawi
                                    </td>
                                    <td >
                                      Feldkirchen in Kärnten
                                    </td>
                                    <td  class="text-right" >
                                      $63,542
                                    </td>
                                  </tr>
                                  <tr >
                                    <td >
                                      Mason Porter
                                    </td>
                                    <td >
                                      Chile
                                    </td>
                                    <td >
                                      Gloucester
                                    </td>
                                    <td  class="text-right" >
                                      $78,615
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <?php include 'function/footer.php' ?>
        </div>
    </div>
	<script src="scripts/jquery-3.3.1.min.js"></script>
<script>
 $(document).ready(function() {
            $.ajax({
            type: "GET",
            url: "https://poloniex.com/public?command=returnTicker",
            cache:false,
            dataType:"json",
            success: function(data){
                divcoins = $("div.panel-header");
               $.each(data, function(idx, elem) {

				  if(idx == "USDT_BTC")
				  {
					 divcoins.children("div.btc").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_ETH")
				  {
					   divcoins.children("div.eth").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_XRP")
				  {
					   divcoins.children("div.xrp").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_LTC")
				  {
					  divcoins.children("div.ltc").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
              
               });
            }
        })
					
	});
	
	setInterval(function() {
		 update_table();
         }, 2000);

        function update_table(){
            $.ajax({
            type: "GET",
            url: "https://poloniex.com/public?command=returnTicker",
            cache:false,
            dataType:"json",
            success: function(data){
             
               $.each(data, function(idx, elem) {                 
                  if(idx == "USDT_BTC")
				  {
					 divcoins.children("div.btc").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_ETH")
				  {
					   divcoins.children("div.eth").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_XRP")
				  {
					   divcoins.children("div.xrp").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				  else if(idx == "USDT_LTC")
				  {
					  divcoins.children("div.ltc").children("h2").html(parseFloat(elem.last).toFixed(2)+" $");
				  }
				});  
			}
			});	
		}
	
	
</script>
</body>
<?php include 'function/script.php'?>
 

</html>
