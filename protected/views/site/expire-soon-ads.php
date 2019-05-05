<br>
<div class="container">
    <h4 align="center">List of ads which will expire within 7 days</h4><br>
    <form id="form1">
        <div class="divTable">
            <div class="headRow">
                <div class="divCell" align="center">Serial No.</div>
                <div  class="divCell">Ad Id</div>
                <div  class="divCell">Ad Title</div>
                <div  class="divCell">User name</div>
                <div  class="divCell">Phone Number</div>
                <div  class="divCell">Estore</div>
                <div  class="divCell">Expire Date</div>
            </div>
            <?php
            $n = 0;
            foreach($expire_soon_ads as $expire_soon_ad){
                $n++;?>
            <div class="divRow">
                <div class="divCell"><?=$n?>.</div>
                <div class="divCell"><?=$expire_soon_ad['ads_id']?></div>
                <div class="divCell"><?=$expire_soon_ad['title']?></div>
                <div class="divCell"><?=$expire_soon_ad['user_name']?></div>
                <div class="divCell"><?=$expire_soon_ad['phone_number']?></div>
                <div class="divCell"><?php if($expire_soon_ad['show_in_store'] == 1){echo "Yes";} else {echo "No";}?></div>
                <div class="divCell"><?=$expire_soon_ad['expire_date']?></div>
            </div>
            <?php } ?>
        </div>
    </form>
</div>
<br>
<style type="text/css">
    .divTable
    {
        display:  table;
        width:auto;
        background-color:#fff;
        border:1px solid #dddddd;
        border-spacing:5px;/*cellspacing:poor IE support for  this*/
        /* border-collapse:separate;*/
        margin: 0 auto;
    }

    .divRow
    {
        display:table-row;
        width:auto;
    }

    .divCell
    {
        float:left;/*fix for  buggy browsers*/
        display:table-column;
        width:150px;
        background-color: #e3f1ff;
        height: 35px;
        text-align: center;
    }
</style>