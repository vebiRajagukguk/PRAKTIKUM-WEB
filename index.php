<?php 

$things = array(
    array(
        'nama' => 'Tepung',
        'kg' => 1,
        'g' => 1000,
        'mg' => 1000000,
        'stock' => 20
    ),
    array(
        'nama' => 'Gula',
        'kg' => 5,
        'g' => 5000,
        'mg' => 5000000,
        'stock' => 25
    ),
    array(
        'nama' => 'Pisang',
        'kg' => 2,
        'g' => 2000,
        'mg' => 2000000,
        'stock' => 20
    ),
    array(
        'nama' => 'Terigu',
        'kg' => 7,
        'g' => 7000,
        'mg' => 7000000,
        'stock' => 0
    ),
    array(
        'nama' => 'Mantan',
        'kg' => 1,
        'g' => 1000,
        'mg' => 1000000,
        'stock' => 0
    )
);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum-6</title>
</head>
<body>
    <form action="">
        <select name="sort" id="sort">
            <option>Berat</option>
            <option>Abjad</option>
            <option>Stock</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <?php 
        if(!empty($_GET['sort'])){
            echo '<h1>Sorted by : '.$_GET["sort"].'</h1>';
            if($_GET['sort'] == 'Abjad'){
                usort($things, function ($a, $b) {
                    $a_val = $a['nama'][0];
                    $b_val = $b['nama'][0];
                  
                    if($a_val > $b_val) return 1;
                    if($a_val < $b_val) return -1;
                    return 0;
                  });
            }
            else if($_GET['sort'] == 'Stock'){
                usort($things, function ($a, $b) {
                    $a_val = (int) $a['stock'];
                    $b_val = (int) $b['stock'];
                  
                    if($a_val > $b_val) return 1;
                    if($a_val < $b_val) return -1;
                    return 0;
                  });
            }
            else{
                usort($things, function ($a, $b) {
                    $a_val = (int) $a['kg'];
                    $b_val = (int) $b['kg'];
                  
                    if($a_val > $b_val) return 1;
                    if($a_val < $b_val) return -1;
                    return 0;
                  });
            }
            
        }
    ?>
    <table style="border:1px solid;">
        <th>No</th>
        <th>Nama Barang</th>
        <th>Berat(Kg)</th>
        <th>Berat(gram)</th>
        <th>Berat(miligram)</th>
        <th>stock</th>
    
    <?php $i = 1 ?>
    <?php foreach ($things as $thing): ?>
    <?php
    if($thing["stock"] ==0){
        echo '<tr style="background:red;">';
    } 
    else{
        echo '<tr>';
    }
    ?>
        <td><?= $i ?></td>
        <td><?= $thing["nama"] ?> </td>
        <td><?= $thing["kg"] ?></td>
        <td><?= $thing["g"] ?></td>
        <td><?= $thing["mg"] ?></td>
        <td><?= $thing["stock"] ?></td>
    <?= '</tr>' ?>
    <?php $i++ ?>
    <?php endforeach; ?>
    </table>
</body>
</html>