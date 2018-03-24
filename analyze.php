<?php include 'function/header2.php';?>
<?php $docroot = $_SERVER['DOCUMENT_ROOT'];                     // get document root;?>   
<?php readfile($docroot."/html/libs/declare.html");             // required javascript declarations ?>
<?php include './php/main.php';                                 // main.php file?>
<?php readfile($docroot."/js/libs/globals.js");                 ?>
<?php readfile($docroot."/js/libs/doPeriod.js");                ?>
<?php readfile($docroot."/js/libs/doTechInd.js");               ?>
<?php readfile($docroot."/js/libs/doIntervals.js");             ?>
<?php readfile($docroot."/js/libs/doPatternMulti.js");          ?>
<?php readfile($docroot."/js/libs/doCompaniesPanel.js");        ?>
<?php readfile($docroot."/js/libs/doStockPriceListing.js");     ?>
<?php readfile($docroot."/js/libs/doPatternListing.js");        ?>
<?php readfile($docroot."/js/libs/pad.js");                     ?>
<?php readfile($docroot."/js/libs/doPatternCircle.js");         ?>
<?php readfile($docroot."/js/libs/doTagEditor.js");             ?>
<?php readfile($docroot."/js/libs/doDropdowns.js");             ?>
<?php readfile($docroot."/js/libs/doSymbolMulti.js");           ?>
<?php readfile($docroot."/js/libs/doPanels.js");                ?>
<?php readfile($docroot."/js/libs/doHighstockSeries.js");       ?>
<?php readfile($docroot."/js/libs/doCandlestickFlags.js");      ?>
<?php readfile($docroot."/js/libs/doCandlestickChart.js");      ?>
<?php readfile($docroot."/js/libs/doOhlcQuote.js");             ?>
<?php readfile($docroot."/js/libs/doCountdown.js");             ?>
<?php readfile($docroot."/js/libs/doInit.js");                  ?>
<script>


$( document ).ready(function() {
    
    <?php readfile($docroot."/js/libs/onchange.js");            ?>

    function doDropdowns() {
        $("#selectInterval").select2({ minimumResultsForSearch: Infinity });
        $("#selectInterval").val(getInterval).trigger('change');
        
        $("#selectTechInd").select2({ minimumResultsForSearch: Infinity });
        $("#selectTechInd").val(getTechInd).trigger('change');

        $("#selectPeriod").select2({ minimumResultsForSearch: Infinity });    
        $("#selectPeriod").val(getPeriod).trigger('change');
    }

    doTagEditor();      // symbols and patterns tag editor
    doDropdowns();      // settings dropdowns
    doSymbolMulti();    // settings multiselects
    doPanels();         // jquery mobile panel
    
    //.getJSON call to initialize candlestick chart
    $.getJSON('/php/history/?symbol=<?php  echo $_GET['symbol']; ?>&interval=<?php echo $_GET['interval'] ?>&daysback=<?php echo $_GET['daysback'] ?>&period=<?php echo $_GET['period'] ?>&techInd=<?php echo $_GET['techInd'] ?>', function (data) {

        doUpdatePatternMulti(data);        
        doHighstockSeries(data);
        doCandlestickFlags(data);
        doCandlestickChart(data);
    
        $("#headerMsg").html(""); // remove spinner

        // themeing logic goes here...
        // $( "#main-page" ).removeClass( "ui-page-theme-a ui-page-theme-b" ).addClass( "ui-page-theme-b");


        doCompaniesPanel();
        doStockPriceListing(data);
        doPatternListing(data);
        doCountdownInit(data);
        doOhlcQuote(data,lastOrigElement, randomOpen, randomHigh, randomLow, randomClose);
        doInit();
        doPatternMulti(); // filter patterns


        var stocktrackerInterval = window.setInterval(function() {

            timestampDate = new Date(lastOrigElement[0]+60000);
            chart.update({subtitle: { text: quoteStr +
                pad(timestampDate.getMonth()+1)+'-'+
                pad(timestampDate.getDate())+' '+ 
                pad(timestampDate.getHours()+7) + ':' + 
                pad(timestampDate.getMinutes()) + ':' + 
                pad(countdownSeconds)+ ''}});    

            if (countdownSeconds >= countdownTotal) {
           
                // .ajax call to get new candlestick chart
                $.ajax({
                    type: "GET",
                    url: "/php/history/?symbol=<?php  echo $_GET['symbol']; ?>&interval=<?php echo $_GET['interval'] ?>&daysback=<?php echo $_GET['daysback'] ?>&period=<?php echo $_GET['period'] ?>&&techInd=<?php echo $_GET['techInd'] ?>",
                    async: false,
                    beforeSend: function(x) {
                        if(x && x.overrideMimeType) {
                            x.overrideMimeType("application/j-son;charset=UTF-8");
                        }
                    },
                    dataType: "json",
                    success: function(dataNew){
                        data = dataNew;
                        dataAll = dataNew;
                        //doStockPriceListing(data);
                    }
                });         

                doCandlestickChartUpdate(data);

            }

            // refresh countdown
            countdownSeconds = Math.floor((Date.now()/1000) - minuteStart);  
            countdown = countdownTotal - countdownSeconds;
            $("#headerMsg").html("<div style='position:relative; top:8px;'>Next Candlestick: "+countdown + " of "+countdownTotal + " seconds</div>"+
                "<div style='position:relative; top:12px;margin-left:auto; margin-right:auto; border:1px solid gray;width:100px;'><div style='background:orange;font-size:5px;width:"+ (100- ((countdownSeconds/countdownTotal)*100)) +"%;'>&nbsp;</div></div>");
        
        },1000); 

    }); // getJSON


});


</script>











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
                                <h4 class="card-title"> Analyze Tool</h4>
                            </div>
                            <div class="card-body" style="height: 1000px;">
                                
                                <div id="main-page" data-role="page" class="jqm-demos" data-quicklinks="true">

                                      <div data-role="header">             
                                        <div id="headerMsg" style="font-family:'Open Sans'; font-size:10px; font-weight:300; height:40px;text-align:center;">
                                        <i style="color:orange;font-size:24px;margin-top:6px;" class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                        </div>       
                                        <a id="settings-button" href="#settings-panel" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-left ui-btn-icon-notext ui-icon-gear"></a>
                                        <a href="#leftpanel"  style="margin-left:30px;" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-left  ui-btn-icon-notext ui-icon-bullets"></a>    
                                        <a href="#leftpanel2" style="margin-left:60px;" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-left  ui-btn-icon-notext ui-icon-clock"></a>    
                                        <a href="#leftpanel3" style="margin-left:90px;" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-left  ui-btn-icon-notext ui-icon-info"></a>    
                                      </div><!-- /header -->

                                      <div data-role="header">             
                                           <div id="navBarContainer">
                                        <div id="navBarAction" data-role="navbar" data-iconpos="left"></div>
                                        </div>  
                                      </div><!-- /header -->

                                      <div id="main" role="main" class="ui-content jqm-content jqm-fullwidth">

                                        <div class="ui-grid">
                                            <div class="ui-block"><div id="container" class="ui-bar ui-bar-a"></div></div>
                                        </div>
                                            


                                        <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
                                              <div style="padding:10px 20px;width:300px;">
                                                  <h3 id="popupHeading">--</h3>
                                                  <p id="popupText">--</p>
                                              </div>
                                              <button id="popupOkayButton" onclick="$('#popupLogin').popup('close');" style="position:relative;top:-10px;width:100px;margin-left:auto;margin-right:auto;-moz-box-shadow: none !important; -webkit-box-shadow: none !important; box-shadow: none !important;" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">Okay</button>
                                         </div>
                                        

                                      </div><!-- /content -->


                                    </div><!-- /page -->


                                      <div data-role="panel" id="leftpanel" data-position="left" style="background:#97d0ff;color:#333333;text-shadow:0 0px 0 transparent;font-family:'Open Sans'" data-display="reveal" data-theme="a">
                                        <!-- nav bar -->    
                                        <div class="jqm-navmenu-panel jqm-panel-page-nav">      
                                          <ul id=companiesPanel class="jqm-list ui-alt-icon ui-nodisc-icon" style="font-size:11px;">
                                          </ul>
                                        </div>

                                      </div><!-- /leftpanel2 -->

                                      <div data-role="panel" id="leftpanel2" data-position="left" style="background:orange;color:#333333;text-shadow:0 0px 0 transparent;font-family:'Open Sans'" data-display="reveal" data-theme="a">
                                        <!-- nav bar -->    
                                        <div class="jqm-navmenu-panel jqm-panel-page-nav">      
                                          <ul id=stockPricePanel class="jqm-list ui-alt-icon ui-nodisc-icon" style="font-size:11px;">
                                          </ul>
                                        </div>

                                      </div><!-- /leftpanel2 -->


                                      <div data-role="panel" id="leftpanel3" data-position="left" style="background:black; color:white;text-shadow:0 0px 0 transparent;font-family:'Open Sans'" data-display="reveal" data-theme="a">
                                        <!-- nav bar -->    

                                        <div class="jqm-navmenu-panel jqm-panel-page-nav">      
                                          <ul id=patternsPanel class="jqm-list ui-alt-icon ui-nodisc-icon" style="font-size:11px;">
                                          </ul>
                                        </div>

                                      </div><!-- /leftpanel2 -->


                                      <!-- settings-panel  -->
                                      <div data-role="panel" id="settings-panel" style="opacity:.95; background:orange;text-shadow:0 0px 0 transparent;font-family:'Open Sans';width:300px;height:200px;" data-position="left" data-display="overlay" data-theme="b">
                                            <a href="#demo-links" data-rel="close" class="ui-corner-all ui-btn-a ui-icon-delete ui-btn-icon-right ui-btn-inline" style="top:0%;"></a>
                                                <table style="margin:0;padding:0;">
                                                <tr><td>
                                                <h4><img style="height:75px;width:75px;" src="/img/pattern-hunter4.png"></h4>
                                                </td><td style="padding-left:5px;">
                                                Daytrader's Candlestick Pattern Hunter<br>
                                                <span style="font-size:11px;">by <a target="_blank" href='http://codecanyon.net/user/data_ninja/portfolio?ref=data_ninja' style="text-decoration:none;"><img style="position:relative;top:3px;left:1px;" src="/img/ninja-logo-white.png"/> <span style="color:white;font-weight:300;">Data Ninja at Codecanyon.net</span></a></span>
                                                </td>
                                                </tr></table>
                                                <p style="color:white;">Get started by entering the symbols of the stocks you want to track.</p>


                                                <p style="font-size:12px;color:white;margin:0;">Enter your stock's ticker symbols here</p>
                                                <select style="font-family:'Open Sans'; width:100%;height:100px;font-size:11px;" id="symbolMulti" data-placeholder="Select an symbol" multiple></select>
                                    <!--            <textarea style="font-family:'Open Sans';width:235px;" cols="40" rows="8" name="email-addresses" id="email-addresses"></textarea> -->
                                                <br>

                                                <p style="font-size:12px;color:white;margin:10px;">Enter patterns to hunt for</p>
                                                <select style="font-family:'Open Sans'; width:100%;height:100px;font-size:11px;" id="patternMulti" data-placeholder="Select the patterns" multiple></select>
                                                <br>

                                                <p style="font-size:12px;color:white;margin:0;margin-top:10px;">Set candlestick interval</p>
                                                <select style="font-family:'Open Sans';font-size:11px;width:100%" id=selectInterval name=selectInterval>
                                                    <option value="1min">1 Minute Candlesticks</option>
                                                    <option value="5min">5 Minute Candlesticks</option>
                                                    <option value="15min">15 Minute Candlesticks</option>
                                                </select>
                                                <br>

                                                <p style="font-size:12px;color:white;margin:0; margin-top:10px;">Set technical indicator*</p>
                                                <select style="font-family:'Open Sans';font-size:11px;;width:100%" id=selectTechInd name=selectTechInd>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="SMA">Simple Moving Average</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="EMA">Exponential Moving Average</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="WMA">Weighted Moving Average</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="DEMA">Double Exponential Moving Avg</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="TEMA">Tripple Exponential Moving Avg</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="TRIMA">Triangular Exponential Moving Avg</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="KAMA">Kaufmann Adaptive Moving Avg</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="MAMA">MESA Adaptive Moving Avg</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="T3">Tripple Exponential Moving Avg</option>
                                                </select>
                                                <br>

                                                <p style="font-size:12px;color:white;margin:0; margin-top:10px">Set time period for indicator*</p>
                                                <select style="font-family:'Open Sans';font-size:11px;;width:100%" id=selectPeriod name=selectPeriod>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="10">10 day</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="15">15 day</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="30">30 day</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="60">60 day</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="90">90 day</option>
                                                    <option style="font-family:'Open Sans';font-size:11px;" value="120">120 day</option>
                                                </select>
                                                <br>

                                                <p style="font-size:12px;color:white;">HOW THIS WORKS: By entering the symbols above, this script will track stock market activity in real time and display in your mobile device, tablet or desktop. * Technical indicator - orange line.</p>


                                                <div role="main" class="ui-content jqm-content">
                                                <!--
                                                <a style="position:absolute;top:560px;left:200px;" href="#" id="marker" class="button chart"></a>
                                                -->
                                                <div id="errorMsg" style="position:absolute;top:560px;left:20px;font-size:12px;font-family:'Open Sans';width:100%;color:white;font-style:italic;"></div>
                                                </div>

                                      </div><!-- /settings-panel -->















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
