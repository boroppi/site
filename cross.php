<?php include 'function/header2.php';?>
<style type="text/css">
.tg  {border-collapse: collapse;background-color: #fff;border: 1px solid #eceff2;width: 600px;text-align: center;width: 100%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#eceff2;color:#444;background-color:#F7FDFA;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#eceff2;color:#fff;background-color:white;}
.tg .tg-yw4l{vertical-align:top}
</style>
<body class="">
    <div class="wrapper ">
        <?php include 'function/sidebar.php' ?>
        <div class="main-panel">
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Cross Table</h4>
                            </div>
                            <div class="card-body">
                                
<table class="tg">
  <tr>
    <th class="tg-yw4l"></th>
    <th class="tg-yw4l"><img src="img/Bitcoin@2x.png" style="height: 10%;"></th>
    <th class="tg-yw4l"><img src="img/Ethereum@2x.png" style="height: 10%;"></th>
    <th class="tg-yw4l"><img src="img/Ripple@2x.png" style="height: 10%;"></th>
    <th class="tg-yw4l"><img src="img/pivx@2x.png" style="height: 10%;"></th>
    <th class="tg-yw4l"><img src="img/Litecoin@2x.png" style="height: 10%;"></th>
  </tr>
  <tr>
    <td class="tg-yw4l" style="background-color: white;"><img src="img/Bitcoin@2x.png" style="height: 10%;"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" style="background-color: white;"><img src="img/Ethereum@2x.png" style="height: 10%;"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" style="background-color: white;"><img src="img/Ripple@2x.png" style="height: 10%;"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" style="background-color: white;"><img src="img/pivx@2x.png" style="height: 10%;"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l" style="background-color: white;"><img src="img/Litecoin@2x.png" style="height: 10%;"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
</table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
<?php include 'function/footer.php' ?>
        </div>
    </div>
</body>
<footer>
        <script src="scripts/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script>




        $(document).ready(function() {
            $.ajax({
            type: "GET",
            url: "https://poloniex.com/public?command=returnTicker",
            cache:false,
            dataType:"json",
            success: function(data){
                tbody = $("table tbody");
               $.each(data, function(idx, elem) {
                  // console.log(elem);
				  if(idx == "BTC_ETH")
				  {
					  tbody.children('tr:eq(1)').children('td:eq(2)').html(elem.last);
				  }
				  else if(idx == "BTC_XRP")
				  {
					   tbody.children('tr:eq(1)').children('td:eq(3)').html(elem.last);
				  }
				  else if(idx == "BTC_LTC")
				  {
					   tbody.children('tr:eq(1)').children('td:eq(5)').html(elem.last);
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
                 //loop through the table rows
                     // console.log(elem);
				  if(idx == "BTC_ETH")
				  {
					  tbody.children('tr:eq(1)').children('td:eq(2)').html(elem.last);
				  }
				  else if(idx == "BTC_XRP")
				  {
					   tbody.children('tr:eq(1)').children('td:eq(3)').html(elem.last);
				  }
				  else if(idx == "BTC_LTC")
				  {
					   tbody.children('tr:eq(1)').children('td:eq(5)').html(elem.last);
				  }
				});                 
                   
                    // $.ajax({  // AJAX call to deletemovie.php file I created which is only for delete query to database
                    // url: 'model/insertdb.php',       
                    // cache: false,                  
                    // type: 'POST',
                    // data: {
                        // 'id': elem.id,
                        // 'name': idx,
                        // 'last' : elem.last,
                        // 'lowestAsk' : elem.lowestAsk,
                        // 'highestBid' : elem.highestBid,
                        // 'percentChange': elem.percentChange,
                        // 'baseVolume':elem.baseVolume,
                        // 'quoteVolume': elem.quoteVolume,
                        // 'high24hr' :elem.high24hr,
                        // 'low24hr':elem.low24hr
                    // },                
                        // success: function(response){
                        // }
                    // }); 
                // });             
                
                 
                      
            // }
		}
		});
		}
		

        /* function get_last_value_from_table(id)
        {
            $(".table tbody").find("tr").each(function() {            
                var _id = $(this).find("td:first").html();
                //console.log(_id+" "+id);
                
                if(_id == id)
                {
                   // console.log("==================");
                    row_to_update = $(this);
                    _last_value = $(this).children("td:gt(3)").html();
                    console.log(_last_value);
                   return false;
                }
                
            });

             return _last_value;    

           
        } */
       
        </script>
    </footer>
<?php include 'function/script.php'?>

</php>
