        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UFT-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Display data</title>
            <!-- CSS only -->
            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
                crossorigin="anonymous">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <style>
            a {
                text-decoration: none;

            }

            .table {
                width: 1000px;
                height: 500px;
                text-align: center;
                margin-top: 5%;
                background-color: #f4f9f5;
                color: #1f3540;
            }

            button {
                float: right;

            }

            .table th {
                background-color: #88af90;

            }

            .table td {
                background-color: #c5e3cb;
            }

            .container {
                width: 1000px;
            }

            @media screen and (max-width: 1024px) {
                .container {
                    width: 1000px;
                }





                @media screen and (max-width: 640px) {
                    .container {
                        width: 640px;
                    }

                    .table {
                        width: 500px;
                        height: 250px;
                    }

                    .table th {
                        width: 125px;
                    }


                }
            </style>


        </head>

        <body>
            <div class="container">
                <button type="button" class="btn btn-success my-5"><a href="doc.php" class="text-light">Add user</a>
                </button>
                <table class="table">
                    <tbody>
                        <thead>
                            <tr>
                                <th scope="col" width="250px">No</th>
                                <th scope="col" width="250px">NFC ID</th>
                                <th scope="col" width="250px">PERSON</th>
                                <th scope="col" width="250px">TIME</th>
                            </tr>

                            <?php
            
            $conn = mysqli_connect("localhost","root","","db_register");
            if($conn->connect_error){
                die("Connection failed:". $conn->connect_error);
            }
            $sql = "SELECT No, NFC_id, PERSON, time from data";
            $result = $conn-> query($sql);

            if($result-> num_rows>0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["No"]."</td><td>". $row["NFC_id"]."</td><td>". $row["PERSON"]."</td><td>". $row["time"]."</td></tr>";
                }
                echo "</table>";
                }
                else
                {
                    echo "0 result";
            }
            $conn-> close();
            ?>
                        </thead>

                    </tbody>
                </table>
        </body>

        </html>