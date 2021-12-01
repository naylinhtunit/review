<?php

$connect = new PDO('mysql:host=localhost;dbname=review', 'root', '939413');

$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
    $output .= '
    <li class="card mb-3">
    <div class="card-header d-flex align-items-center"><div class="rounded-circle user-bg-color text-white pt-2 pb-2 mr-2"><h3 class="text-center">'.substr($row["comment_sender_name"], 0, 1).'</h3></div>'.$row["comment_sender_name"].'</b> </div>
    <div class="card-body">'.$row["comment"].'</div>
    <div class="card-footer text-right">'.$row["date"].'</div>
    </li>
    ';
    $output .= get_reply_comment($connect, $row["comment_id"]);
}
echo $output;

function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
    SELECT * FROM tbl_comment WHERE parent_comment_id = '".$parent_id."'
    ";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if($parent_id == 0)
    {
        $marginleft = 0;
    }
    else
    {
        $marginleft = $marginleft + 48;
    }
    if($count > 0)
    {
        foreach($result as $row)
        {
            $output .= '
            <li class="card mb-3" style="margin-left:'.$marginleft.'px">
            <div class="card-header d-flex align-items-center"><div class="rounded-circle user-bg-color text-white pt-2 pb-2 mr-2"><h3 class="text-center">'.substr($row["comment_sender_name"], 0, 1).'</h3></div>'.$row["comment_sender_name"].'</b> </div>
            <div class="card-body">'.$row["comment"].'</div>
            <div class="card-footer text-right">'.$row["date"].'</div>
            </li>
            ';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
        }
    }
    return $output;
}

?>