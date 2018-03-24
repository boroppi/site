<?php include 'function/header2.php';?>

<body class="">
    <div class="wrapper ">
        <?php include 'function/sidebar.php' ?>
        <div class="main-panel">
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Simple Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                <button class="btn btn-primary">Test</button>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="display:none">id</th>
                                                <th>Coin</th>
                                                <th>last</th>
                                                <th>lowestAsk</th>
                                                <th>highestBid</th>
                                                <th>percentChange</th>
                                                <th>baseVolume</th>
                                                <th>quoteVolume</th>
                                                <th>high24hr</th>
                                                <th>low24hr</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
               var tbody = $(".table tbody");
               $.each(data, function(idx, elem) {
                  // console.log(elem);
                tbody.append("<tr><td style='display:none'>"+elem.id+"</td>"+
                "<td>"+idx+"</td>"+
                "<td>"+elem.last+"</td>"+
                "<td>"+elem.lowestAsk+"</td>"+
                "<td>"+elem.highestBid+"</td>"+
                "<td>"+elem.percentChange+"</td>"+
                "<td>"+elem.baseVolume+"</td>"+
                "<td>"+elem.quoteVolume+"</td>"+
                "<td>"+elem.high24hr+"</td>"+
                "<td>"+elem.low24hr+"</td>"+
                "</tr>");
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
                    $(".table tbody").find("tr").each(function() {            
                    var _id = $(this).find("td:first").html();  // get the id from first td
                        if(_id == elem.id)
                        {                    
                            row_to_update = $(this);
                            var valueOfLast = elem.last;
                            _last_value = $(this).find(":nth-child(3)").html();
                            if(_last_value < elem.last)
                            {
                                console.log(_last_value+ " < "+valueOfLast);
                                
                                row_to_update.find(':nth-child(3)').html(valueOfLast).addClass('gain').delay(1900).queue(function(){
                                $(this).removeClass("gain").dequeue();
                                });

                            }
                            else if(_last_value > elem.last)
                            {
                                console.log(_last_value+ " > "+elem.last);
                                row_to_update.find(':nth-child(3)').html(valueOfLast).addClass('loss').delay(1900).queue(function(){
                                $(this).removeClass("loss").dequeue();
                                });
                            }
                            
                            return false;
                        }  
                    });                 
                   
                    $.ajax({  // AJAX call to deletemovie.php file I created which is only for delete query to database
                    url: 'model/insertdb.php',       
                    cache: false,                  
                    type: 'POST',
                    data: {
                        'id': elem.id,
                        'name': idx,
                        'last' : elem.last,
                        'lowestAsk' : elem.lowestAsk,
                        'highestBid' : elem.highestBid,
                        'percentChange': elem.percentChange,
                        'baseVolume':elem.baseVolume,
                        'quoteVolume': elem.quoteVolume,
                        'high24hr' :elem.high24hr,
                        'low24hr':elem.low24hr
                    },                
                        success: function(response){
                        }
                    }); 
                });             
                
                 
                      
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
