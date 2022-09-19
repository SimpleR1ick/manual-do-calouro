<?php
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
        echo "<h1>The select function is called.</h1>";
    }

    function insert() {
        echo "The insert function is called.";
    }
?>