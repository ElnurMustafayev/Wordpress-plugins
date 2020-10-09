<?php
    $file_name = basename(__FILE__, ".php");
    $vm = Messenger::get_viewmodel($file_name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        * {
            transition: 0.3s;
        }
        .fill {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        input#plugin_switch {
            width: 50px;
            display: inline-flex;
            height: 50px;
            align-items: center;
            justify-content: center;
            font-size: 1px;
        }
        input#plugin_switch:checked::before {
            height: unset;
            width: 50px;
        }
        label[for=plugin_switch] {
            font-size: 28px;
        }
    </style>
</head>
<body>

    <div class="fill">
        <form method="post">
            <!-- bcz checkbox posts only if checked -->
            <input type="hidden" name="plugin_switch" id="on_off">

            <input type="checkbox" id="plugin_switch"/>
            <label for="plugin_switch">Turn Off the plugin</label>
            <button class="btn">Accept</button>
        </form>
    </div>
    
    <script>

        // set styles and data in start
        set_elements(`<?php echo $vm["on_off"]; ?>`);

        // helper function (toggle two classes)
        function switch_class($el, class_on, class_off, flag) {
            // make button green
            if(flag) {
                $($el)  .removeClass(class_off)
                        .addClass(class_on);
            }

            // make button red
            else {
                $($el)  .removeClass(class_on)
                        .addClass(class_off);
            }
        }

        // sets form's elements styles in start
        function set_elements(flag) {
            flag = flag.trim() === "on";

            let $input = $("#plugin_switch");
            $input.prop("checked", (flag ? "checked" : ""));

            let $label = $input.next();
            let lable_text = `Turn ${flag ? "On" : "Off"} the plugin`;
            $label.addClass(flag ? "text-success" : "text-danger")
                    .text(lable_text);

            let $button = $label.next();
            $button.addClass(flag ? "btn-success" : "btn-danger");
        }

        // change styles when checkbox clicked
        function checked($el, flag) {
            let on_off = flag ? "On" : "Off";
            let lable_text = `Turn ${on_off} the plugin`;
            let color = flag ? "green" : "red";

            // change label color
            let $label = $el.next("label");
            $label.text(lable_text);
            switch_class($label, "text-success", "text-danger", flag);

            // change submit button bootstrap class
            let $submit_button = $label.next();
            switch_class($submit_button, "btn-success", "btn-danger", flag);
        }

        // when checkbox pressed
        $("#plugin_switch").on("click", function(e) {
            let is_checked = $(this).is(":checked");
            checked($(this), is_checked);
        });

        // on form submit
        $("form").on("submit", function() {
            // add hidden input bcz checkbox posts only when checked
            let input_val = $('#plugin_switch').is(':checked') ? "on" : "off";
            $("#on_off").val(input_val);
        });

    </script>
</body>
</html>