<?php
    session_start();
?>
<?php
$mysql = new mysqli('localhost','root','root','teststudents');
$id_test = $_SESSION['id_test'];
$group = $_SESSION['group'];
$count = $_SESSION['count'];
$id_group = $_SESSION['id_group'];
    for ($i=0; $i < $count; $i++) {
        $ans1[$i] = filter_var(trim($_POST[
            'res1'.$i]),FILTER_SANITIZE_STRING);
        $ans2[$i] = filter_var(trim($_POST[
            'res2'.$i]),FILTER_SANITIZE_STRING);
        $delay[$i] = filter_var(trim($_POST['delay'.$i]),FILTER_SANITIZE_STRING);
        $id_res[$i] = $_SESSION['id_res'.$i];
    }


$id_users = $mysql->query("SELECT `id_user` FROM `user` WHERE `number` LIKE '$group'");
$id_users = mysqli_fetch_all($id_users);

for ($i=0; $i < $count; $i++) {
    if($delay[$i]){
        $d = -1;
    }
    else{
        $d = 0;
    }
    $res[$i] = (float)$ans1[$i] + (float)$ans2[$i] + (float)$ans3[$i] + (float)$d;
}

for ($i=0; $i < $count; $i++) {
    $id_resBuf = $id_res[$i][0][0];
    $mysql->query("UPDATE `result` SET `checked` = '1' WHERE `id_res` LIKE '$id_resBuf'");
    $mysql->query("UPDATE `result` SET `result` = '$res[$i]' WHERE `id_res` LIKE '$id_resBuf'");
    $id_ans = $mysql->query("SELECT `id_ans` FROM `answers` WHERE `id_res` LIKE '$id_resBuf'");
    $id_ans = mysqli_fetch_all($id_ans);
    $idAn = $id_ans[0][0];
    //print_r($id_ans);
    $mysql->query("UPDATE `answers` SET `score` = '$ans1[$i]' WHERE `id_ans` LIKE '$idAn'");
    $mysql->query("UPDATE `answers` SET `checked` = '1' WHERE `id_ans` LIKE '$idAn'");
    $idAn = $idAn + 1;
    $mysql->query("UPDATE `answers` SET `score` = '$ans2[$i]' WHERE `id_ans` LIKE '$idAn'");
    $mysql->query("UPDATE `answers` SET `checked` = '1' WHERE `id_ans` LIKE '$idAn'");
    if($delay[$i]){
        $mysql->query("UPDATE `result` SET `delay` = '-1' WHERE `id_res` LIKE '$id_resBuf'");
    }
}
header('Location: teacher.php');
?>
