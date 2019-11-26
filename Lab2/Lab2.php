<?php
$numeric_array = array(2, 5, 6, 10, 41, 24, 32, 9, 16, 19);
$associative_array = array('Petar' => 'Petar', 'Boshkoski' => 'Boshkoski', 'Makedonski Brod' => 'Makedonski Brod');
$multidimensional_array = array(array(1, 2, 3), array(4, 5, 6), array(7, 8, 9));

echo '<h3> Vezhba 1.2 </h3>';
echo 'Numeric array: ';
foreach ($numeric_array as $key=>$value) {
    echo $value . ' ';
}

echo '<h3> Vezhba 1.3 </h3>';
$new_numeric_array = array();

foreach($numeric_array as $key=>$value) {
    if($value > 20) {
        array_push($new_numeric_array, $value);
    }
}
    echo 'New numeric array: ';
foreach($new_numeric_array as $k=>$v) {
    echo $v . ' ';
}

echo '<h3> Vezhba 1.4 </h3>';

$sentence = 'PHP is a widely-used general-purpose scripting language that is especially suited for Web Development';
$exploded_sentence = array();
$exploded_sentence = explode(' ', $sentence);
$nova = array();
foreach($exploded_sentence as $key=>$value) {
    array_push($associative_array, Array($value => strlen($value)));
}

?>