<!DOCTYPE html>
<html>
<?php session_start(); ?>

<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="js/moment/moment.min.js"></script>
</head>

<body>
    <div>
        
    </div>
    <table id="sender" class="address">
        <th>
            <td class="header1">
                Sender
            </td>
        </th>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" id="rec_name" />
            </td>
        </tr>
        <tr>
            <td>Street Address</td>
            <td>
                <input type="text" id="rec_address" />
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" id="rec_city" />
            </td>
        </tr>
        <tr>
            <td>State</td>
            <td>
                <input type="text" id="rec_state" />
            </td>
        </tr>
        <tr>
            <td>Zipcode</td>
            <td>
                <input type="text" id="rec_zipcode" />
            </td>
        </tr>
    </table>

    <table id="reciever" class="address">
        <th>
            <td class="header1">
                Recipient
            </td>
        </th>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" id="snd_name" />
            </td>
        </tr>
        <tr>
            <td>Street Address</td>
            <td>
                <input type="text" id="snd_address" />
            </td>
        </tr>
        <tr>
            <td>City</td>
            <td>
                <input type="text" id="snd_city" />
            </td>
        </tr>
        <tr>
            <td>State</td>
            <td>
                <input type="text" id="snd_state" />
            </td>
        </tr>
        <tr>
            <td>Zipcode</td>
            <td>
                <input type="text" id="snd_zipcode" />
            </td>
        </tr>
    </table>

    <table id="package" class="address">
        <th>
            <td class="header1">
                Package Info
            </td>
        </th>
        <tr>
            <td>Height</td>
            <td>
                <input type="text" id="pck_height" />
            </td>
        </tr>
        <tr>
            <td>Width</td>
            <td>
                <input type="text" id="pck_width" />
            </td>
        </tr>
        <tr>
            <td>Depth</td>
            <td>
                <input type="text" id="pck_depth" />
            </td>
        </tr>
        <tr>
            <td>Weight</td>
            <td>
                <input type="text" id="pck_weight" />
            </td>
        </tr>
    </table>
    <br>
    <button id="populate">DEBUG Populate Fields</button>
    <br>
    <button id="submit">Submit</button>

    <script src="js/faker/faker.js"></script>
    <script src="js/package.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("button#submit").click(function() {
                var sender = {};
                sender.name = $("#snd_name").val();
                sender.address1 = $("#snd_address").val();
                sender.city = $("#snd_city").val();
                sender.state = $("#snd_state").val();
                sender.zip = $("#snd_zipcode").val();

                var reciever = {};
                reciever.name = $("#rec_name").val();
                reciever.address1 = $("#rec_address").val();
                reciever.city = $("#rec_city").val();
                reciever.state = $("#rec_state").val();
                reciever.zip = $("#rec_zipcode").val();

                var weight = parseInt($("#pck_weight").val());
                var volume = parseInt($("#pck_depth").val()) * parseInt($("#pck_height").val()) * parseInt($("#pck_width").val());

                //Create Date
                var now = moment().add(-14, 'days').format("YYYY-MM-DD");
                
                var user = "<?php echo $_SESSION['username']; ?>";

                var packageToSubmit = new Package(sender, reciever, weight, volume, user, now);
                //console.log(packageToSubmit);

                $.post("php/newPackage.php", packageToSubmit, function(data, status, xhr) {
                    //var obj = JSON.parse(data);
                    console.log("Shipping ID: " + data);
                    //Clear Inputs
                    $("input").val("");
                });
            });

            $("button#populate").click(function() {
                $("#snd_name").val(faker.name.findName());
                $("#snd_address").val(faker.address.streetAddress());
                $("#snd_city").val(faker.address.city());
                $("#snd_state").val(faker.address.state());
                $("#snd_zipcode").val(faker.address.zipCode());

                $("#rec_name").val(faker.name.findName());
                $("#rec_address").val(faker.address.streetAddress());
                $("#rec_city").val(faker.address.city());
                $("#rec_state").val(faker.address.state());
                $("#rec_zipcode").val(faker.address.zipCode());

                $("#pck_weight").val(faker.random.number(200));

                $("#pck_depth").val(faker.random.number(30));
                $("#pck_height").val(faker.random.number(30));
                $("#pck_width").val(faker.random.number(30));
            });


        });
    </script>
</body>

</html>