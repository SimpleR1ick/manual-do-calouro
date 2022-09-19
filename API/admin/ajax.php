<?php
echo 'aaaa';
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'algo':
                insert();
                break;
            case 'outro':
                select();
                break;
        }
    }

    function select() {
        echo "The select function is called.";
    }

    function insert() {
        echo "The insert function is called.";
        exit;
    }
?>