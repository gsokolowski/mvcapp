<?php

echo 'View: user/showall';

// array is passed
//var_dump('userData: ',$data);

foreach($data as $row) {
    echo 'Id'. $row['id']." ";
    echo 'Id'. $row['category_id']." ";
    echo 'Id'. $row['name']." ";
    echo 'Id'. $row['nationality']." ";
    echo 'Id'. $row['age']." ";
    echo '<br />';
}
