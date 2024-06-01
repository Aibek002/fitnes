<?php
session_start();
if (trim($_SESSION['email']) !== 'admin@gmail.com') {

    header('location: profile.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Подключение Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* style.css */
        table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }

        th,
        td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            margin-left: 5px;
        }

        .mb-4 {
            display: flex;
            align-items: center;
            gap: 5px;
            /* Расстояние между элементами */
            font-family: var(--second-family);
            font-weight: 600;
            font-size: 22px;
            color: #000;
            width: 400px;
            justify-content: left;
        }

        .row {
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            padding: 20px 16px 16px 16px;
            width: 367px;
            /* height: 568px; */
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.18);
            margin-bottom: 126px;
        }

        .d-flex {
            border-radius: 8px;
            padding: 10px 10px 0 10px;
            margin: 5px;
            width: 335px;
            /* height: 118px; */
            background: #dddde7;

        }

        .svg {
            width: 40px;
            height: 40px;
            background: blue;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            margin: 0;
        }

        .svg svg {
            margin: 2px 1px 0 0;
        }

        .name-surname {
            margin: 0;
            font-family: var(--second-family);
            font-weight: 600;
            font-size: 14px;
            line-height: 143%;
            color: #191919;

        }

        .email {
            font-family: var(--second-family);
            font-weight: 400;
            font-size: 10px;
            line-height: 160%;
            color: #737373;
            margin: 0;

        }

        .title {
            font-family: var(--second-family);
            font-weight: 500;
            font-size: 10px;
            line-height: 160%;
            color: #737373;
            width: 50px;
            margin: 0;
        }

        .flex {
            width: 100%;
            display: flex;
        }

        .text {
            margin: 0 0 5px 0;
        }

        .col {
            font-family: var(--font3);
            font-weight: 600;
            font-size: 10px;
            line-height: 160%;
            color: #191919;
            padding-left: 0;
        }


        .row {
            display: flex;
            flex-direction: column;
            justify-content: baseline;
        }

        .delete {
            color: red;
        }

        .edit,
        .delete {
            text-align: center;
            width: 100px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .name-edit {
            display: flex;
            justify-content: space-between;
        }

        .update-delete {
            display: flex;
            width: 50px;
        }

        .custom-hr {
            width: 80%;
            border: 1px solid #f0f0f0;
            height: 0px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <script src="./assets/js/goBack.js"></script>

        <h1 class="mb-4"><button onclick="goBack()" style="margin-bottom: 5px;" type="button" class="btn"><svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.35116 8L9.21687 14.2225L7.54129 16L0 8L7.54129 0L9.21687 1.7775L3.35116 8Z" fill="black" />
                </svg></button><span>User</span> <svg style=" margin-top: 5px;" width="29" height="21" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.21916 2.625C6.92851 2.625 5.07157 4.32259 5.07157 6.41667C5.07157 8.51074 6.92853 10.2083 9.21919 10.2083C11.5098 10.2083 13.3667 8.51076 13.3667 6.41667C13.3667 4.32259 11.5098 2.625 9.21916 2.625ZM13.8758 11.218C15.3249 10.0425 16.2382 8.32708 16.2382 6.41667C16.2382 2.87284 13.0956 0 9.21916 0C5.34267 0 2.20016 2.87284 2.20016 6.41667C2.20016 8.32709 3.11342 10.0425 4.56259 11.218C3.58232 11.6684 2.67755 12.2622 1.88722 12.9847C1.53672 13.3051 1.21385 13.6462 0.920057 14.0048C0.261603 14.8084 -0.0484599 15.7041 0.00613768 16.608C0.0598964 17.498 0.460353 18.2948 1.03285 18.9381C2.15944 20.204 4.04842 21 6.02874 21L12.4096 21C14.39 21 16.2789 20.204 17.4055 18.9381C17.978 18.2948 18.3785 17.498 18.4322 16.608C18.4868 15.7041 18.1768 14.8084 17.5183 14.0048C17.2245 13.6462 16.9017 13.3051 16.5512 12.9847C15.7608 12.2622 14.856 11.6684 13.8758 11.218ZM9.21919 12.8333C7.23071 12.8333 5.32368 13.5555 3.91761 14.8409C3.66408 15.0726 3.43063 15.3193 3.21825 15.5785C2.92599 15.9352 2.85919 16.2316 2.87318 16.4633C2.88801 16.7088 3.0016 16.9909 3.26021 17.2815C3.79586 17.8834 4.83738 18.375 6.02874 18.375L12.4096 18.375C13.601 18.375 14.6425 17.8834 15.1782 17.2815C15.4368 16.9909 15.5504 16.7088 15.5652 16.4633C15.5792 16.2316 15.5124 15.9352 15.2201 15.5785C15.0077 15.3193 14.7743 15.0726 14.5208 14.8409C13.1147 13.5555 11.2077 12.8333 9.21919 12.8333ZM18.9501 7.875C18.9501 7.15013 19.5929 6.5625 20.3858 6.5625H27.5643C28.3572 6.5625 29 7.15013 29 7.875C29 8.59988 28.3572 9.1875 27.5643 9.1875H20.3858C19.5929 9.1875 18.9501 8.59988 18.9501 7.875ZM20.3858 13.125C20.3858 12.4001 21.0286 11.8125 21.8215 11.8125H27.5643C28.3572 11.8125 29 12.4001 29 13.125C29 13.8499 28.3572 14.4375 27.5643 14.4375H21.8215C21.0286 14.4375 20.3858 13.8499 20.3858 13.125Z" fill="black" />
            </svg></h1>
        <?php
        // Include the database connection file
        include './app/database/connectDB.php';

        // Query to fetch data from data_registration table
        $sql = "SELECT * FROM data_registration";
        $stmt = $connection->query($sql);

        // Check if there are rows returned from the query
        if ($stmt->rowCount() > 0) {
            echo '<div class="row">';
            // Loop through each row of data_registration table
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (trim($row['name']) !== 'admin') {

                    echo '<div class="d-flex">';

                    echo '<div class="p-2 flex-shrink-1">';
                    echo '<p class="svg"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0104 2.7054C6.85576 2.7054 2.67708 6.88408 2.67708 12.0387C2.67708 14.4877 3.61982 16.7169 5.16441 18.3828C5.22272 18.1898 5.30028 18.0003 5.40146 17.8194C5.74445 17.2062 6.17714 16.6391 6.69052 16.1377C7.20574 15.6345 7.78702 15.2121 8.41398 14.8785C7.4591 13.9644 6.8621 12.687 6.8621 11.261C6.8621 8.44308 9.19316 6.2054 12.0104 6.2054C14.8277 6.2054 17.1587 8.44308 17.1587 11.261C17.1587 12.687 16.5617 13.9644 15.6069 14.8785C16.2338 15.2121 16.8151 15.6345 17.3303 16.1377C17.8437 16.6391 18.2764 17.2062 18.6194 17.8194C18.7206 18.0003 18.7981 18.1898 18.8564 18.3828C20.401 16.7169 21.3438 14.4877 21.3438 12.0387C21.3438 6.88408 17.1651 2.7054 12.0104 2.7054ZM16.6084 20.163C16.6537 19.93 16.6764 19.7112 16.6771 19.5174C16.6782 19.1972 16.6195 19.0238 16.5829 18.9584C16.3489 18.5401 16.0529 18.1517 15.7 17.8069C14.726 16.8557 13.3994 16.3165 12.0104 16.3165C10.6215 16.3165 9.29481 16.8557 8.32088 17.8069C7.96791 18.1517 7.67189 18.5401 7.43791 18.9584C7.40131 19.0238 7.34265 19.1972 7.34377 19.5174C7.34445 19.7112 7.36715 19.93 7.41244 20.163C8.76885 20.9326 10.3368 21.3721 12.0104 21.3721C13.684 21.3721 15.252 20.9326 16.6084 20.163ZM12.0104 13.9832C13.5912 13.9832 14.8254 12.7386 14.8254 11.261C14.8254 9.78329 13.5912 8.53874 12.0104 8.53874C10.4297 8.53874 9.19544 9.78329 9.19544 11.261C9.19544 12.7386 10.4297 13.9832 12.0104 13.9832ZM0.34375 12.0387C0.34375 5.59542 5.56709 0.37207 12.0104 0.37207C18.4537 0.37207 23.6771 5.59542 23.6771 12.0387C23.6771 16.1889 21.5093 19.8319 18.2497 21.8984C16.4446 23.0429 14.3031 23.7054 12.0104 23.7054C9.71775 23.7054 7.57625 23.0429 5.7711 21.8984C2.51157 19.8319 0.34375 16.1889 0.34375 12.0387Z" fill="#F6F6F6" />
                      </svg></p>';


                    echo '</div>';
                    echo '<div class="p-2 w-100">';
                    echo '<div class="name-edit"><p class="name-surname">' . $row['name'] . ' ' . $row['surname'] .  ' </p> <div class="update-delete"><a class="edit" href="admin_update_user.php?id=' .  $row['id_user'] . '"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="18" height="18" rx="3" fill="#FF7F55" />
                    <path d="M3.375 12.9051V14.2499C3.375 14.3493 3.41451 14.4447 3.48484 14.5151C3.55516 14.5854 3.65054 14.6249 3.75 14.6249H5.09475C5.19401 14.6249 5.28922 14.5855 5.3595 14.5154L11.7345 8.14039L9.8595 6.26539L3.4845 12.6404C3.4144 12.7107 3.37502 12.8059 3.375 12.9051ZM11.3175 4.80739L13.1925 6.68239L14.0948 5.78014C14.2354 5.63949 14.3143 5.44876 14.3143 5.24989C14.3143 5.05101 14.2354 4.86028 14.0948 4.71964L13.2803 3.90514C13.1396 3.76453 12.9489 3.68555 12.75 3.68555C12.5511 3.68555 12.3604 3.76453 12.2198 3.90514L11.3175 4.80739Z" stroke="white" />
                  </svg></a><a  class="delete" href="admin_delete_user.php?id=' .  $row['id_user'] . '"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="18" height="18" rx="3" fill="#EE2B2B" />
                  <path d="M5.71125 15.0004C5.37625 15.0004 5.0905 14.8824 4.854 14.6464C4.618 14.4104 4.5 14.1246 4.5 13.7891V4.50035H3.75V3.75035H6.75V3.17285H11.25V3.75035H14.25V4.50035H13.5V13.7891C13.5 14.1341 13.3845 14.4221 13.1535 14.6531C12.922 14.8846 12.6337 15.0004 12.2887 15.0004H5.71125ZM12.75 4.50035H5.25V13.7891C5.25 13.9236 5.29325 14.0341 5.37975 14.1206C5.46625 14.2071 5.57675 14.2504 5.71125 14.2504H12.2887C12.4038 14.2504 12.5095 14.2024 12.606 14.1064C12.702 14.0099 12.75 13.9041 12.75 13.7891V4.50035ZM7.356 12.7504H8.106V6.00035H7.356V12.7504ZM9.894 12.7504H10.644V6.00035H9.894V12.7504Z" fill="white" />
                </svg></a></div></div>';
                    echo '<p class="email">' . $row['email'] . '</p>';
                    echo '<hr class="custom-hr"> ';


                    // Query to fetch data from users_information_for_calculator table using JOIN
                    $sqlJoin = "SELECT * FROM users_information_for_calculator u JOIN data_registration d ON u.id_user = d.id_user WHERE d.id_user = :id_user";
                    $stmtJoin = $connection->prepare($sqlJoin);
                    $stmtJoin->bindParam(':id_user', $row['id_user']);
                    $stmtJoin->execute();

                    // Check if there are rows returned from the JOIN query
                    if ($stmtJoin->rowCount() > 0) {
                        while ($rowJoin = $stmtJoin->fetch(PDO::FETCH_ASSOC)) {
                            echo '<div class="flex">';
                            echo '<div class="col">';
                            echo '<p class="title">Body fat</p>';
                            echo '<p class="text">' . $rowJoin['bodyfat'] . '</p>';
                            echo '</div>';
                            echo '<div class="col">';
                            echo '<p class="title">Gender</p>';
                            echo '<p class="text">' . $rowJoin['gender'] . '</p>';
                            echo '</div>';
                            echo '<div class="col">';
                            echo '<p class="title">Goal</p>';
                            echo '<p class="text">' . $rowJoin['goal'] . '</p>';
                            echo '</div>';

                            echo '</div>';
                        }
                    } else {
                        echo '<p>No data found</p>';
                    }
                } else {
                    continue;
                }
                echo '</div>';
                echo '</div>';
            }
        }


        echo '</div>'; // Close the row div

        ?>
        <?php
        include './app/include/footer-admin.php'
        ?>
    </div>

    <!-- Подключение Bootstrap JS (необходимо для работы некоторых компонентов Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>