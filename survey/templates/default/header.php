<style type="text/css">
    .sticky {
        position: fixed;
        background: rgba(255,255,255,1);
        top: 0px;
        width: 100%;
        z-index: 999;
    }
    .sticky  img {
        max-width: 70%;
    }

    .sticky  .navbar-brand {
        height: 32px;
    }

    .sticky .main-nav > ul > li > a{
        line-height: 35px;
        height: 35px;
        font-size: 12px;
        padding: 0 18px;
    }

    .sticky .mini-cart-button {
        float: right;
        width: 80%;
    }

    .sticky .mini-cart-button a {
        line-height: 35px;
        height: 35px;
        font-size: 12px;
    }
    .sticky .main-nav {
        width: 90%;
        float: right;
    }
    .latest_package_pointer {
        padding-top: 50px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .estore_pointer {
        padding-top: 50px;
    }
</style>
<div id="header">   
       </div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-7 col-xs-12">
                        <ul class="top-menu">

                            <li><a href="<?php echo 'https://www.bdbroadbanddeals.com/recently-viewed-ad';?>">Recently Viewed</a></li>
                            <li>Your Ip Address: <?php echo $_SERVER['REMOTE_ADDR'] ?></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div id="clockbox"></div>
                    </div>

                    <div class="col-md-4 col-sm-5 col-xs-12">

                        <ul class="top-info">
                                <li class="top-mobile sign-in"><a href="<?php echo 'https://www.bdbroadbanddeals.com/sign-in'; ?>" style="font-size: 13px;font-weight: bold;color: #fff"><i class="fa fa-sign-in"></i> Sign in</a></li>
                                <li class="top-mobile create-account"><a href="<?php echo 'https://www.bdbroadbanddeals.com/sign-in'; ?>" style="font-size: 14px;font-weight: bold;color: #fff"><i class="fa fa-male"> Create Account</i> </a></li>                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="header">
            <div class="container">
                <div class="header-main">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a class="navbar-brand" href="https://www.bdbroadbanddeals.com/"><img src="/images/logo.jpg"></a>

                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <nav class="main-nav">
                                <ul>
                                    <li class="<?php if($active_menu == 'index') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="/index.php">Home</a></li>
                                    <li class="<?php if($active_menu == 'ListAllPackages') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="/index.php#super-deals">Latest Packages</a></li>
                                    <li class="<?php if($active_menu == 'store') { echo "current-menu-ancestor"; } else { echo ""; } ?>">
                                        <a href="/index.php#isp_accessories">EStore</a>
                                    </li>
                                    <li class="<?php if($active_menu == 'Career') {  echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="<?php echo 'https://www.bdbroadbanddeals.com/career';?>">ISP Career</a></li>
                                    <li class="<?php if($active_menu == 'ListAllISP') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="https://www.bdbroadbanddeals.com/isp/list';?>" target="_blank">ISP List</a></li>
                                    <li  class="<?php if($active_menu == 'contact') { echo "current-menu-ancestor"; } else { echo ""; } ?>"><a href="https://www.bdbroadbanddeals.com/contact-us';?>">Contact Us</a></li>
                                    <li><a href="javascript:void(0);" onclick="CheckLogin('<?php echo $requested_country->sortname ?>')" class="mini-cart-view">Post Your Ad</a></li>
                                </ul>
                                <a href="#" class="toggle-mobile-menu"><span>&nbsp;</span></a>
                            </nav>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        tday=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        tmonth=["January","February","March","April","May","June","July","August","September","October","November","December"];

        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
            if(nyear<1000) nyear+=1900;
            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

            if(nhour==0){ap=" AM";nhour=12;}
            else if(nhour<12){ap=" AM";}
            else if(nhour==12){ap=" PM";}
            else if(nhour>12){ap=" PM";nhour-=12;}

            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
        }

        window.onload=function(){
            GetClock();
            setInterval(GetClock,1000);
        }
    </script>
