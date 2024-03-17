<? include './app/controllers/user.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/service_print.css">
    <link rel="stylesheet" href="./assets/css/profile.css">

    <link rel="stylesheet" href="./assets/css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Profile</title>
</head>

<body>
    <!-- <?
            include './app/include/header.php'
            ?> -->
    <div class="containers">




        <? if ($_SESSION['name'] === ' admin ') : ?>

            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "fitnes";

            try {
                // Create a PDO connection
                $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // Set the PDO error mode to exception
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare the SQL query
                $sql = "SELECT * FROM feedback_users";
                $stmt = $pdo->prepare($sql);

                	
                	
           
                // Execute the query
                $stmt->execute();
                echo "<table>";
                echo "<tr><th>ID</th><th>name</th><th>Email</th><th>Phone</th><th>Feedback Title</th><th>Feedbak</th><th>Date</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['id_user']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['tel_number']}</td>";
                    echo "<td>{$row['feedbackTitle']}</td>";
                    echo "<td>{$row['feedback']}</td>";

                    echo "<td>{$row['date']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } catch (PDOException $e) {
                // Display an error message if connection or query execution fails
                echo "Error: " . $e->getMessage();
            }

            // Close the connection
            $pdo = null;
            ?>


            <div class="box">
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="support_service_print.php"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.72 14.4563L7.481 13.9483L18.084 3.21833C18.1676 3.13263 18.2142 3.01747 18.2136 2.89772C18.2131 2.77797 18.1654 2.66325 18.081 2.57833L17.446 1.93633C17.405 1.89417 17.3559 1.8606 17.3018 1.83759C17.2477 1.81458 17.1895 1.80258 17.1306 1.8023C17.0718 1.80203 17.0135 1.81347 16.9591 1.83597C16.9048 1.85846 16.8554 1.89156 16.814 1.93333L6.239 12.6353L5.72 14.4563ZM18.703 0.664335L19.338 1.30733C20.214 2.19433 20.222 3.62533 19.354 4.50333L8.428 15.5613L4.664 16.6453C4.4342 16.7097 4.18826 16.6802 3.98016 16.5634C3.77206 16.4466 3.6188 16.252 3.554 16.0223C3.50578 15.8572 3.50509 15.6818 3.552 15.5163L4.647 11.6763L15.544 0.647335C15.7512 0.438693 15.9979 0.273396 16.2696 0.161087C16.5414 0.0487776 16.8328 -0.00829685 17.1269 -0.00680752C17.4209 -0.0053182 17.7117 0.0547051 17.9823 0.169761C18.2529 0.284818 18.4979 0.453604 18.703 0.664335ZM7.184 1.81733C7.68 1.81733 8.082 2.22433 8.082 2.72633C8.08279 2.845 8.06018 2.96266 8.01547 3.07259C7.97076 3.18251 7.90481 3.28255 7.82141 3.36697C7.73801 3.45139 7.63879 3.51854 7.52942 3.56459C7.42004 3.61064 7.30267 3.63468 7.184 3.63533H3.592C2.6 3.63533 1.796 4.44933 1.796 5.45233V16.3583C1.796 17.3623 2.6 18.1763 3.592 18.1763H14.368C15.36 18.1763 16.165 17.3623 16.165 16.3583V12.7233C16.165 12.2213 16.567 11.8143 17.063 11.8143C17.559 11.8143 17.961 12.2213 17.961 12.7243V16.3583C17.961 18.3663 16.352 19.9943 14.368 19.9943H3.592C1.608 19.9943 0 18.3663 0 16.3583V5.45233C0 3.44533 1.608 1.81733 3.592 1.81733H7.184Z" fill="#4440C7" />
                                </svg> </div>
                        <p>Support Service</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="feedback_print.php"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.7498 12C15.6198 12 15.4798 11.98 15.3498 11.94C15.1011 11.856 14.8852 11.6959 14.7326 11.4823C14.5801 11.2687 14.4986 11.0125 14.4998 10.75V8.99C13.0998 8.86 11.9998 7.68 11.9998 6.25V2.75C11.9998 1.23 13.2298 0 14.7498 0H21.2498C22.7698 0 23.9998 1.23 23.9998 2.75V6.25C23.9998 7.77 22.7698 9 21.2498 9H18.6298L16.7498 11.5C16.5098 11.82 16.1398 12 15.7498 12ZM14.7498 1.5C14.0598 1.5 13.4998 2.06 13.4998 2.75V6.25C13.4998 6.94 14.0598 7.5 14.7498 7.5H15.9998V10L17.8798 7.5H21.2598C21.9498 7.5 22.5098 6.94 22.5098 6.25V2.75C22.5098 2.06 21.9498 1.5 21.2598 1.5H14.7498ZM7.49981 14.5C6.37345 14.4974 5.29398 14.0487 4.49752 13.2523C3.70106 12.4558 3.25245 11.3764 3.24981 10.25C3.25245 9.12364 3.70106 8.04417 4.49752 7.24771C5.29398 6.45126 6.37345 6.00264 7.49981 6C8.62616 6.00264 9.70563 6.45126 10.5021 7.24771C11.2986 8.04417 11.7472 9.12364 11.7498 10.25C11.7472 11.3764 11.2986 12.4558 10.5021 13.2523C9.70563 14.0487 8.62616 14.4974 7.49981 14.5ZM7.49981 7.5C5.97981 7.5 4.74981 8.73 4.74981 10.25C4.74981 11.77 5.97981 13 7.49981 13C9.01981 13 10.2498 11.77 10.2498 10.25C10.2498 8.73 9.01981 7.5 7.49981 7.5ZM1.47081 21.92C2.78081 23.3 4.81081 24 7.50081 24C10.1908 24 12.2208 23.3 13.5308 21.92C15.0528 20.31 15.0038 18.367 15.0008 18.236V18.23C15.0008 17 14.0008 16 12.7708 16H2.23081C1.00081 16 0.000805816 17 0.000805816 18.19V18.203C-0.00319418 18.393 -0.0411941 20.32 1.47081 21.92ZM1.50081 18.23C1.50081 17.83 1.83081 17.5 2.23081 17.5H12.7708C13.1708 17.5 13.5008 17.83 13.5008 18.27V18.272C13.4794 19.2449 13.1023 20.1763 12.4408 20.89C11.4308 21.96 9.75081 22.5 7.50081 22.5C5.25081 22.5 3.60081 21.97 2.58081 20.91C1.89251 20.1913 1.50598 19.2361 1.50081 18.241V18.23Z" fill="#4440C7" />
                                </svg></div>
                        <p> Feedback</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>



                <div class="first">
                    <div class="f">
                        <div class="icon"> <a href="logout.php"><svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M12.5129 5.55232V4.8512C12.5129 3.32196 11.1379 2.08203 9.44207 2.08203H5.37957C3.68457 2.08203 2.30957 3.32196 2.30957 4.8512V13.215C2.30957 14.7443 3.68457 15.9842 5.37957 15.9842H9.4504C11.1412 15.9842 12.5129 14.748 12.5129 13.2233V12.5147" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M18.1738 9.03394H8.13965" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.7344 6.8418L18.1744 9.03233L15.7344 11.2236" stroke="#0601B4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> </div>
                        <p> Log Out</p></a>
                    </div>
                    <div><svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.04199 11.6797C2.33398 11.6797 2.56885 11.5781 2.77197 11.375L7.55176 6.71582C7.82471 6.44287 7.94531 6.17627 7.95166 5.83984C7.95166 5.50977 7.82471 5.23047 7.55176 4.96387L2.77832 0.29834C2.56885 0.101562 2.32764 0 2.04199 0C1.45801 0 0.975586 0.469727 0.975586 1.05371C0.975586 1.3457 1.10254 1.6123 1.31836 1.83447L5.46338 5.84619L1.31836 9.84521C1.09619 10.0674 0.975586 10.334 0.975586 10.626C0.975586 11.2036 1.45801 11.6797 2.04199 11.6797Z" fill="#ABABAB" />
                        </svg></div>
                </div>
            </div>
        <? else :
            echo $_SESSION['name'];
        ?>
            вы не админ

        <? endif ?>
    </div>


</body>

</html>