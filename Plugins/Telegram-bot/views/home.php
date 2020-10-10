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
        #validation_errors {
            list-style: circle;
            margin: auto;
        }
    </style>
</head>
<body>
    <ul class="text-danger w-50" id="validation_errors">
    </ul>

    <div class="d-flex justify-content-center">
        <form method="post" class="d-flex flex-column w-50" id="foo">
            <textarea class="form-control" name="message" id="message" rows="10" placeholder="Message..."></textarea>
            <button class="btn btn-success m-3" <?php echo $vm["has_token"] ? "" : "disabled" ?>>POST</button>
        </form>
    </div>

    <script>
        var is_disabled = $("form button").prop("disabled");

        // print validation error
        if(is_disabled) {
            let $new_li = $(document.createElement("li"));
            $new_li.text("Input API token in admin panel!");
            $("#validation_errors").append($new_li);
        }

        // textarea enter press
        $("textarea").on("keydown", function(e) {
            if(e.keyCode === 13 && !is_disabled){
                e.preventDefault();
                $("#foo").submit();
            }
        });
    </script>
</body>
</html>