<?php
$groupSuUser = array(
    '1' => 'sala',
    '2' => 'otdelnov');
$groupAxapta = array(
    '1' => 'narkin',
    '2' => 'klimov',
    '3' => 'kruchinin',
    '4' => 'kudryavceva'
);
$group1c = array(
 '1' => "gagarin";
);
$groupFin = array(
    '1' => 'krjachina'     
);
$groupSysAdmins = array(
    '1' => 'appolonov',
    '2' => 'girik',
    '3' => 'grakov'
);
$fillip = array(
    '1' =>'saarc'
)

    function RullGroup() {
    foreach ($groupSuUser as $nickname) {
        if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'groupSuUser';
        }
    }
    foreach($groupAxapta as $nickname) {
       if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'groupAxapta'; 
    }
    }
    foreach($group1c as $nickname) {
       if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'group1c';
    }
    }
    foreach($groupFin as $nickname) {
       if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'groupFin'; 
    }
    }
    foreach($groupSysAdmins as $nickname) {
       if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'groupSysAdmins'; 
    }
    }
    foreach($fillip as $nickname) {
       if ($_SESSION['user_id'] == $nickname) {
            $_SESSION['$group'] = 'fillip'; 
    }
}
}
?>