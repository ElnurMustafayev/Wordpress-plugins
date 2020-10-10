<?php
    $file_name = basename(__FILE__, ".php");
    $vm = ViewModel::get_viewmodel($file_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        form >* {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <form method="post" class="w-50">
        <label for="token" class="col-form-label">API Token</label>
        <input type="text" name="api_token" class="form-control" id="api_token" placeholder="Enter your API key here..."
        value="<?php echo $vm["api_token"]; ?>">

        <button class="btn btn-primary">Accept</button>
    </form>
</body>
</html>