<?php
use TelegramBot\App\Providers\ViewModel;
    
$vm = ViewModel::get_vm("Main", "index");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo $vm["style"]; ?>">
</head>
<body>
    
    <h1>
        <?php
            echo $vm["name"] . "<br><br><br>";

            foreach ($vm["data"] as $item)
                echo $item . " ";
        ?>
    </h1>

    <img src="<?php echo $vm["cat"]; ?>" alt="cat in mask">

</body>
</html>