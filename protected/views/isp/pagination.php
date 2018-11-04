<?php
/**
 * Created by PhpStorm.
 * User: KHASHRUL
 * Date: 12/24/2016
 * Time: 6:57 PM
 */

/* ===================== Pagination Code Starts ================== */
$adjacents = 7;
$total_pages = count($all_products);
$targetpage = $current_url;
$remove_Page = true;
$targetpage="?";
if($remove_Page){
    $targetpage = Yii::app()->request->requestUri;
    if(isset($_GET['page'])){
        $targetpage = str_replace('?page='.$_GET["page"] , '', $targetpage);
    }
    $targetpage="$targetpage";
}

//your file name  (the name of this file)
$limit = 4;                                 //how many items to show per page
$page = @$_GET['page'];
if($page)
    $start = ($page - 1) * $limit;          //first item to display on this page
else
    $start = 0;

$all_products = Generic::getAllProductsOfStore($user_id,$start,$limit);


if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
$prev = $page - 1;                          //previous page is page - 1
$next = $page + 1;                          //next page is page + 1
$lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$pagination = "";
if($lastpage > 1)
{
    $pagination .= "<div class=\"pagination\">";
    if ($page > 1)
        $pagination.= "<a href=\"$targetpage?page=$prev\">&#171; Previous</a>";
    else
        $pagination.= "<span class=\"disabled\">&#171; Previous</span>";
    if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
    {
        for ($counter = 1; $counter <= $lastpage; $counter++)
        {
            if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
            else
                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
        }
    }
    elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
    {
        if($page < 1 + ($adjacents * 2))
        {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
            $pagination.= "...";
            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
        }
        elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        {
            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
            $pagination.= "...";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
            $pagination.= "...";
            $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
            $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
        }
        else
        {
            $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
            $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
            $pagination.= "...";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
        }
    }
    if ($page < $counter - 1)
        $pagination.= "<a href=\"$targetpage?page=$next\">Next &#187;</a>";
    else
        $pagination.= "<span class=\"disabled\">Next &#187;</span>";
    $pagination.= "</div>\n";
}
/* ===================== Pagination Code Ends ================== */