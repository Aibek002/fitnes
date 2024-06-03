<?php
include './app/controllers/source_user.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anything food</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/print-filter-food.css">
</head>

<body>
    <?php
    if ($_SESSION['name'] == '') {
        header('Location: /');
        exit;
    }
    ?>
    <p class="title">Today‘s Meal Plan</p>
    <div class="flex">
        <div class="first-flex-item">
            <div class="first-items"><svg width="104" height="104" viewBox="0 0 104 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M77.7957 56.554C77.1078 60.8801 75.3571 64.9597 72.7009 68.4259C70.0448 71.892 66.5667 74.636 62.5794 76.4108C58.5922 78.1857 54.2209 78.9357 49.859 78.5935C45.4971 78.2513 41.2813 76.8276 37.591 74.4504C33.9007 72.0732 30.8517 68.8172 28.7182 64.9753C26.5847 61.1333 25.4338 56.8261 25.3689 52.441C25.304 48.0559 26.3273 43.7306 28.3466 39.8542C30.3659 35.9778 33.3178 32.6719 36.9369 30.2341L51.7451 52.222L77.7957 56.554Z" fill="#1BA3F0" />
                    <path d="M59.324 26.4158C65.5093 28.1945 70.8496 32.171 74.3431 37.5993C77.8366 43.0277 79.2431 49.5348 78.2987 55.8998L52.2063 51.8395L59.324 26.4158Z" fill="#BE5DE0" />
                    <path d="M38.1087 29.268C41.1841 27.3971 44.615 26.1829 48.1899 25.7003C51.7647 25.2176 55.4076 25.4768 58.8939 26.4618L51.9763 52.0197L38.1087 29.268Z" fill="#FBBC05" />
                </svg></div>
            <div class="text">
                <div class="firsts-text"><?php echo (int)  $_SESSION['dayKcall']; ?> Calories </div>

                <div class="second-text">
                    <p><?php echo (int) $_SESSION['Carbohydrates']; ?> <span> g Carbs ,</span> <?php echo (int) $_SESSION['Fat']; ?> <span> g Fat ,</span> <?php echo (int) $_SESSION['Protein']; ?> <span> g Protein</span></p>
                </div>
            </div>
            <div class="more"><a href="more-information.php"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10Z" fill="black" />
                        <path d="M6 10C7.10457 10 8 10.8954 8 12C8 13.1046 7.10457 14 6 14C4.89543 14 4 13.1046 4 12C4 10.8954 4.89543 10 6 10Z" fill="black" />
                        <path d="M18 10C19.1046 10 20 10.8954 20 12C20 13.1046 19.1046 14 18 14C16.8954 14 16 13.1046 16 12C16 10.8954 16.8954 10 18 10Z" fill="black" />
                    </svg></a></div>
        </div>
        <p class="subtitle">Breakfast </p>
        <p class="comment">350 Kcalories</p>
        <div class="second-flex-item">
            <div class="first-items">
                <img src="assets\images\print-food-plan\Rectangle 11.png" alt="">
            </div>
            <div class="text">

                <div class="first-text"><?php

                                        foreach ($food as $item) {
                                            if ($item['timeeating'] == 'Breakfast') {
                                                echo $item['dish_name'] . "<br>";
                                                $id = $item['id'];
                                            }
                                        } ?></div>
                <div class="second-text">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5" clip-path="url(#clip0_349_1318)">
                            <path d="M8.35021 6.11746C8.53564 5.93372 8.68637 5.7634 8.85893 5.6189C9.06784 5.44063 9.28877 5.27693 9.52027 5.12897C9.81819 4.94242 10.0589 5.03611 10.1462 5.3812C10.2674 5.86011 10.3646 6.34531 10.4603 6.83017C10.6396 7.74 10.6836 8.64894 10.3822 9.54468C9.83961 11.158 8.74154 12.1823 7.08516 12.5833C6.46187 12.7349 5.831 12.8535 5.19519 12.9386C2.00292 13.3617 0.2461 10.8601 0.0505069 8.90148C-0.0961466 7.43393 0.363984 6.14263 1.16658 4.97292C1.69269 4.20615 2.35327 3.53171 2.94881 2.81197C3.31057 2.37477 3.67882 1.9416 4.01468 1.48499C4.27856 1.12619 4.39887 0.699508 4.47492 0.260613C4.49236 0.158603 4.54769 0.0669208 4.62985 0.00387385C4.66842 -0.0205673 4.78967 0.076699 4.86892 0.126132C5.00092 0.208373 5.12888 0.297109 5.25928 0.381937C6.73299 1.34043 7.6198 2.71002 8.04246 4.39134C8.16707 4.88677 8.22664 5.39871 8.31576 5.90306C8.32612 5.96218 8.33477 6.02185 8.35021 6.11746ZM4.88028 0.677818C4.74189 1.44898 4.37181 2.06634 3.90749 2.63201C3.45959 3.17792 3.00028 3.71442 2.54373 4.25317C1.81983 5.10735 1.24914 6.04067 0.914113 7.12214C0.169493 9.52581 1.7408 12.5312 4.90778 12.3269C5.76478 12.2718 6.61835 12.2654 7.42283 11.8636C8.71635 11.2177 9.59156 10.2605 9.89654 8.82624C10.1175 7.78701 9.80745 6.8005 9.61196 5.7601C9.07951 6.17846 8.67864 6.64086 8.44571 7.23725C8.39911 7.35654 8.35885 7.47908 8.3028 7.59384C8.23193 7.73884 8.11145 7.82174 7.94535 7.78783C7.76216 7.75035 7.69475 7.61377 7.70103 7.44032C7.70765 7.25717 7.72733 7.07458 7.73735 6.89154C7.82598 5.27282 7.47397 3.7606 6.61687 2.37825C6.18727 1.67705 5.59069 1.09289 4.88028 0.677818Z" fill="black" />
                            <path d="M10.3269 0.624229C10.3921 0.819814 10.4557 1.01595 10.5229 1.21087C10.6623 1.61537 10.848 2.01 10.9349 2.42533C11.1135 3.27912 10.6658 3.95016 9.82721 4.1709C9.54381 4.24538 9.34648 4.13897 9.23984 3.86918C9.19324 3.75259 9.13379 3.64155 9.06258 3.53812C8.60621 2.8737 8.49747 2.18517 8.87592 1.44318C9.12203 0.960577 9.4836 0.573425 9.86315 0.201138C9.93309 0.132603 10.0927 0.0877367 10.1769 0.120105C10.2633 0.153133 10.3213 0.288878 10.366 0.390882C10.3929 0.45237 10.3709 0.535277 10.3709 0.608545L10.3269 0.624229ZM9.79152 1.04259C9.16175 1.66028 8.7906 2.63215 9.61653 3.51764C10.1316 3.36324 10.3308 3.06394 10.2867 2.54291C10.241 2.00251 9.99716 1.5317 9.79152 1.0427V1.04259Z" fill="black" />
                            <path d="M5.83335 7.91202C5.9735 7.58041 6.10246 7.27942 6.22784 6.97688C6.29442 6.8162 6.38028 6.67902 6.57725 6.67411C6.75796 6.66983 6.85943 6.78657 6.93763 6.92942C7.32078 7.62924 7.68804 8.33765 7.85277 9.1262C8.12993 10.4524 7.30788 11.7098 5.99328 12.0265C5.08983 12.2441 4.23597 12.0994 3.43304 11.6867C2.51586 11.2153 2.10709 10.3864 2.04807 9.39752C1.93525 7.50505 3.18801 5.59187 4.96031 4.88633C5.09638 4.83216 5.22656 4.75466 5.36737 4.72378C5.48156 4.69872 5.6491 4.68183 5.71772 4.74403C5.76099 4.79278 5.79349 4.85009 5.8131 4.91223C5.8327 4.97436 5.83899 5.03992 5.83153 5.10464C5.79775 5.33799 5.70565 5.56248 5.64414 5.79236C5.42607 6.61125 5.47754 7.23312 5.83335 7.91202ZM5.04788 5.42998C5.00237 5.44705 4.95775 5.46639 4.91418 5.48794C3.52089 6.24584 2.83601 7.47803 2.68764 8.99846C2.5589 10.3156 3.38983 11.3224 4.69192 11.5802C4.75405 11.5962 4.81903 11.5979 4.88188 11.585C5.29418 11.4649 5.71326 11.361 6.11326 11.208C6.88147 10.9139 7.3092 10.1473 7.19214 9.33772C7.10303 8.72269 6.84868 8.16618 6.58111 7.61438C6.5756 7.60337 6.55085 7.60216 6.48345 7.57739C6.39014 7.8938 6.2872 8.20372 6.20911 8.51973C6.14148 8.79356 5.8819 8.90738 5.65246 8.74064C5.6006 8.70273 5.55569 8.65618 5.5197 8.60301C5.16699 8.07673 4.91011 7.50604 4.91237 6.86661C4.91402 6.39606 4.99801 5.92601 5.04788 5.43009V5.42998Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_1318">
                                <rect width="11" height="13" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <h6 class='span'> k/day </h6>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.01688 0.296875C5.68779 0.296875 4.38854 0.690996 3.28345 1.4294C2.17835 2.1678 1.31703 3.21732 0.808407 4.44524C0.299787 5.67316 0.166708 7.02433 0.426001 8.32788C0.685294 9.63143 1.32531 10.8288 2.26512 11.7686C3.20493 12.7084 4.40232 13.3485 5.70587 13.6077C7.00942 13.867 8.36059 13.734 9.58851 13.2253C10.8164 12.7167 11.8659 11.8554 12.6044 10.7503C13.3428 9.64521 13.7369 8.34596 13.7369 7.01687C13.7349 5.23522 13.0263 3.5271 11.7665 2.26728C10.5067 1.00746 8.79853 0.298832 7.01688 0.296875ZM7.01688 13.1993C5.79411 13.1993 4.59881 12.8367 3.58212 12.1573C2.56543 11.478 1.77302 10.5125 1.30508 9.38278C0.837154 8.25309 0.714722 7.01002 0.953271 5.81075C1.19182 4.61148 1.78064 3.50988 2.64526 2.64526C3.50988 1.78063 4.61148 1.19182 5.81075 0.953268C7.01002 0.714719 8.25309 0.837151 9.38278 1.30508C10.5125 1.77301 11.478 2.56543 12.1574 3.58212C12.8367 4.59881 13.1993 5.79411 13.1993 7.01687C13.1975 8.656 12.5456 10.2275 11.3865 11.3865C10.2275 12.5456 8.65601 13.1975 7.01688 13.1993ZM11.0489 7.01687C11.0489 7.08816 11.0206 7.15653 10.9701 7.20694C10.9197 7.25735 10.8514 7.28567 10.7801 7.28567H7.01688C6.94559 7.28567 6.87722 7.25735 6.82681 7.20694C6.7764 7.15653 6.74808 7.08816 6.74808 7.01687V3.25367C6.74808 3.18238 6.7764 3.11401 6.82681 3.0636C6.87722 3.01319 6.94559 2.98487 7.01688 2.98487C7.08817 2.98487 7.15654 3.01319 7.20695 3.0636C7.25736 3.11401 7.28568 3.18238 7.28568 3.25367V6.74807H10.7801C10.8514 6.74807 10.9197 6.77639 10.9701 6.8268C11.0206 6.87721 11.0489 6.94558 11.0489 7.01687Z" fill="#828080" />
                    </svg>
                    <h6 class='span'> k/day </h6>


                </div>
            </div>
            <div class="more">
                <a href='more-information.php?id=<?php echo    $id; ?>'>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10Z" fill="black" />
                        <path d="M6 10C7.10457 10 8 10.8954 8 12C8 13.1046 7.10457 14 6 14C4.89543 14 4 13.1046 4 12C4 10.8954 4.89543 10 6 10Z" fill="black" />
                        <path d="M18 10C19.1046 10 20 10.8954 20 12C20 13.1046 19.1046 14 18 14C16.8954 14 16 13.1046 16 12C16 10.8954 16.8954 10 18 10Z" fill="black" />
                    </svg>
                </a>
            </div>
        </div>

        <p class="subtitle">Lunch </p>
        <p class="comment">150 Kcalories</p>
        <div class="second-flex-item">
            <div class="first-items"><img src="assets\images\print-food-plan\Rectangle 5.png" alt=""></div>
            <div class="text">
                <div class="first-text"> <?php foreach ($food as $item) {
                                                if ($item['timeeating'] == 'Lunch') {
                                                    echo $item['dish_name'] . "<br>";
                                                    $idLunch = $item['id'];
                                                } // Выводим id каждого блюда и добавляем перенос строки для разделения
                                            } ?></div>

                <div class="second-text">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5" clip-path="url(#clip0_349_1318)">
                            <path d="M8.35021 6.11746C8.53564 5.93372 8.68637 5.7634 8.85893 5.6189C9.06784 5.44063 9.28877 5.27693 9.52027 5.12897C9.81819 4.94242 10.0589 5.03611 10.1462 5.3812C10.2674 5.86011 10.3646 6.34531 10.4603 6.83017C10.6396 7.74 10.6836 8.64894 10.3822 9.54468C9.83961 11.158 8.74154 12.1823 7.08516 12.5833C6.46187 12.7349 5.831 12.8535 5.19519 12.9386C2.00292 13.3617 0.2461 10.8601 0.0505069 8.90148C-0.0961466 7.43393 0.363984 6.14263 1.16658 4.97292C1.69269 4.20615 2.35327 3.53171 2.94881 2.81197C3.31057 2.37477 3.67882 1.9416 4.01468 1.48499C4.27856 1.12619 4.39887 0.699508 4.47492 0.260613C4.49236 0.158603 4.54769 0.0669208 4.62985 0.00387385C4.66842 -0.0205673 4.78967 0.076699 4.86892 0.126132C5.00092 0.208373 5.12888 0.297109 5.25928 0.381937C6.73299 1.34043 7.6198 2.71002 8.04246 4.39134C8.16707 4.88677 8.22664 5.39871 8.31576 5.90306C8.32612 5.96218 8.33477 6.02185 8.35021 6.11746ZM4.88028 0.677818C4.74189 1.44898 4.37181 2.06634 3.90749 2.63201C3.45959 3.17792 3.00028 3.71442 2.54373 4.25317C1.81983 5.10735 1.24914 6.04067 0.914113 7.12214C0.169493 9.52581 1.7408 12.5312 4.90778 12.3269C5.76478 12.2718 6.61835 12.2654 7.42283 11.8636C8.71635 11.2177 9.59156 10.2605 9.89654 8.82624C10.1175 7.78701 9.80745 6.8005 9.61196 5.7601C9.07951 6.17846 8.67864 6.64086 8.44571 7.23725C8.39911 7.35654 8.35885 7.47908 8.3028 7.59384C8.23193 7.73884 8.11145 7.82174 7.94535 7.78783C7.76216 7.75035 7.69475 7.61377 7.70103 7.44032C7.70765 7.25717 7.72733 7.07458 7.73735 6.89154C7.82598 5.27282 7.47397 3.7606 6.61687 2.37825C6.18727 1.67705 5.59069 1.09289 4.88028 0.677818Z" fill="black" />
                            <path d="M10.3269 0.624229C10.3921 0.819814 10.4557 1.01595 10.5229 1.21087C10.6623 1.61537 10.848 2.01 10.9349 2.42533C11.1135 3.27912 10.6658 3.95016 9.82721 4.1709C9.54381 4.24538 9.34648 4.13897 9.23984 3.86918C9.19324 3.75259 9.13379 3.64155 9.06258 3.53812C8.60621 2.8737 8.49747 2.18517 8.87592 1.44318C9.12203 0.960577 9.4836 0.573425 9.86315 0.201138C9.93309 0.132603 10.0927 0.0877367 10.1769 0.120105C10.2633 0.153133 10.3213 0.288878 10.366 0.390882C10.3929 0.45237 10.3709 0.535277 10.3709 0.608545L10.3269 0.624229ZM9.79152 1.04259C9.16175 1.66028 8.7906 2.63215 9.61653 3.51764C10.1316 3.36324 10.3308 3.06394 10.2867 2.54291C10.241 2.00251 9.99716 1.5317 9.79152 1.0427V1.04259Z" fill="black" />
                            <path d="M5.83335 7.91202C5.9735 7.58041 6.10246 7.27942 6.22784 6.97688C6.29442 6.8162 6.38028 6.67902 6.57725 6.67411C6.75796 6.66983 6.85943 6.78657 6.93763 6.92942C7.32078 7.62924 7.68804 8.33765 7.85277 9.1262C8.12993 10.4524 7.30788 11.7098 5.99328 12.0265C5.08983 12.2441 4.23597 12.0994 3.43304 11.6867C2.51586 11.2153 2.10709 10.3864 2.04807 9.39752C1.93525 7.50505 3.18801 5.59187 4.96031 4.88633C5.09638 4.83216 5.22656 4.75466 5.36737 4.72378C5.48156 4.69872 5.6491 4.68183 5.71772 4.74403C5.76099 4.79278 5.79349 4.85009 5.8131 4.91223C5.8327 4.97436 5.83899 5.03992 5.83153 5.10464C5.79775 5.33799 5.70565 5.56248 5.64414 5.79236C5.42607 6.61125 5.47754 7.23312 5.83335 7.91202ZM5.04788 5.42998C5.00237 5.44705 4.95775 5.46639 4.91418 5.48794C3.52089 6.24584 2.83601 7.47803 2.68764 8.99846C2.5589 10.3156 3.38983 11.3224 4.69192 11.5802C4.75405 11.5962 4.81903 11.5979 4.88188 11.585C5.29418 11.4649 5.71326 11.361 6.11326 11.208C6.88147 10.9139 7.3092 10.1473 7.19214 9.33772C7.10303 8.72269 6.84868 8.16618 6.58111 7.61438C6.5756 7.60337 6.55085 7.60216 6.48345 7.57739C6.39014 7.8938 6.2872 8.20372 6.20911 8.51973C6.14148 8.79356 5.8819 8.90738 5.65246 8.74064C5.6006 8.70273 5.55569 8.65618 5.5197 8.60301C5.16699 8.07673 4.91011 7.50604 4.91237 6.86661C4.91402 6.39606 4.99801 5.92601 5.04788 5.43009V5.42998Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_1318">
                                <rect width="11" height="13" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <h6 class='span'> k/day </h6>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.01688 0.296875C5.68779 0.296875 4.38854 0.690996 3.28345 1.4294C2.17835 2.1678 1.31703 3.21732 0.808407 4.44524C0.299787 5.67316 0.166708 7.02433 0.426001 8.32788C0.685294 9.63143 1.32531 10.8288 2.26512 11.7686C3.20493 12.7084 4.40232 13.3485 5.70587 13.6077C7.00942 13.867 8.36059 13.734 9.58851 13.2253C10.8164 12.7167 11.8659 11.8554 12.6044 10.7503C13.3428 9.64521 13.7369 8.34596 13.7369 7.01687C13.7349 5.23522 13.0263 3.5271 11.7665 2.26728C10.5067 1.00746 8.79853 0.298832 7.01688 0.296875ZM7.01688 13.1993C5.79411 13.1993 4.59881 12.8367 3.58212 12.1573C2.56543 11.478 1.77302 10.5125 1.30508 9.38278C0.837154 8.25309 0.714722 7.01002 0.953271 5.81075C1.19182 4.61148 1.78064 3.50988 2.64526 2.64526C3.50988 1.78063 4.61148 1.19182 5.81075 0.953268C7.01002 0.714719 8.25309 0.837151 9.38278 1.30508C10.5125 1.77301 11.478 2.56543 12.1574 3.58212C12.8367 4.59881 13.1993 5.79411 13.1993 7.01687C13.1975 8.656 12.5456 10.2275 11.3865 11.3865C10.2275 12.5456 8.65601 13.1975 7.01688 13.1993ZM11.0489 7.01687C11.0489 7.08816 11.0206 7.15653 10.9701 7.20694C10.9197 7.25735 10.8514 7.28567 10.7801 7.28567H7.01688C6.94559 7.28567 6.87722 7.25735 6.82681 7.20694C6.7764 7.15653 6.74808 7.08816 6.74808 7.01687V3.25367C6.74808 3.18238 6.7764 3.11401 6.82681 3.0636C6.87722 3.01319 6.94559 2.98487 7.01688 2.98487C7.08817 2.98487 7.15654 3.01319 7.20695 3.0636C7.25736 3.11401 7.28568 3.18238 7.28568 3.25367V6.74807H10.7801C10.8514 6.74807 10.9197 6.77639 10.9701 6.8268C11.0206 6.87721 11.0489 6.94558 11.0489 7.01687Z" fill="#828080" />
                    </svg>
                    <h6 class='span'> k/day </h6>


                </div>
            </div>

            <div class="more"> <a href='more-information.php?id=<?php echo    $idLunch; ?>'>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10Z" fill="black" />
                        <path d="M6 10C7.10457 10 8 10.8954 8 12C8 13.1046 7.10457 14 6 14C4.89543 14 4 13.1046 4 12C4 10.8954 4.89543 10 6 10Z" fill="black" />
                        <path d="M18 10C19.1046 10 20 10.8954 20 12C20 13.1046 19.1046 14 18 14C16.8954 14 16 13.1046 16 12C16 10.8954 16.8954 10 18 10Z" fill="black" />
                    </svg></a></div>
        </div>
        <p class="subtitle">Dinner </p>
        <p class="comment">350 Kcalories</p>
        <div class="second-flex-item">
            <div class="first-items"><img src="assets\images\print-food-plan\Rectangle 6.png" alt=""></div>
            <div class="text">
                <div class="first-text"> <?php foreach ($food as $item) {
                                                if ($item['timeeating'] == 'Dinner') {
                                                    echo $item['dish_name'] . "<br>";
                                                    $idDinner = $item['id'];
                                                }
                                            } ?></div>

                <div class="second-text">
                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.5" clip-path="url(#clip0_349_1318)">
                            <path d="M8.35021 6.11746C8.53564 5.93372 8.68637 5.7634 8.85893 5.6189C9.06784 5.44063 9.28877 5.27693 9.52027 5.12897C9.81819 4.94242 10.0589 5.03611 10.1462 5.3812C10.2674 5.86011 10.3646 6.34531 10.4603 6.83017C10.6396 7.74 10.6836 8.64894 10.3822 9.54468C9.83961 11.158 8.74154 12.1823 7.08516 12.5833C6.46187 12.7349 5.831 12.8535 5.19519 12.9386C2.00292 13.3617 0.2461 10.8601 0.0505069 8.90148C-0.0961466 7.43393 0.363984 6.14263 1.16658 4.97292C1.69269 4.20615 2.35327 3.53171 2.94881 2.81197C3.31057 2.37477 3.67882 1.9416 4.01468 1.48499C4.27856 1.12619 4.39887 0.699508 4.47492 0.260613C4.49236 0.158603 4.54769 0.0669208 4.62985 0.00387385C4.66842 -0.0205673 4.78967 0.076699 4.86892 0.126132C5.00092 0.208373 5.12888 0.297109 5.25928 0.381937C6.73299 1.34043 7.6198 2.71002 8.04246 4.39134C8.16707 4.88677 8.22664 5.39871 8.31576 5.90306C8.32612 5.96218 8.33477 6.02185 8.35021 6.11746ZM4.88028 0.677818C4.74189 1.44898 4.37181 2.06634 3.90749 2.63201C3.45959 3.17792 3.00028 3.71442 2.54373 4.25317C1.81983 5.10735 1.24914 6.04067 0.914113 7.12214C0.169493 9.52581 1.7408 12.5312 4.90778 12.3269C5.76478 12.2718 6.61835 12.2654 7.42283 11.8636C8.71635 11.2177 9.59156 10.2605 9.89654 8.82624C10.1175 7.78701 9.80745 6.8005 9.61196 5.7601C9.07951 6.17846 8.67864 6.64086 8.44571 7.23725C8.39911 7.35654 8.35885 7.47908 8.3028 7.59384C8.23193 7.73884 8.11145 7.82174 7.94535 7.78783C7.76216 7.75035 7.69475 7.61377 7.70103 7.44032C7.70765 7.25717 7.72733 7.07458 7.73735 6.89154C7.82598 5.27282 7.47397 3.7606 6.61687 2.37825C6.18727 1.67705 5.59069 1.09289 4.88028 0.677818Z" fill="black" />
                            <path d="M10.3269 0.624229C10.3921 0.819814 10.4557 1.01595 10.5229 1.21087C10.6623 1.61537 10.848 2.01 10.9349 2.42533C11.1135 3.27912 10.6658 3.95016 9.82721 4.1709C9.54381 4.24538 9.34648 4.13897 9.23984 3.86918C9.19324 3.75259 9.13379 3.64155 9.06258 3.53812C8.60621 2.8737 8.49747 2.18517 8.87592 1.44318C9.12203 0.960577 9.4836 0.573425 9.86315 0.201138C9.93309 0.132603 10.0927 0.0877367 10.1769 0.120105C10.2633 0.153133 10.3213 0.288878 10.366 0.390882C10.3929 0.45237 10.3709 0.535277 10.3709 0.608545L10.3269 0.624229ZM9.79152 1.04259C9.16175 1.66028 8.7906 2.63215 9.61653 3.51764C10.1316 3.36324 10.3308 3.06394 10.2867 2.54291C10.241 2.00251 9.99716 1.5317 9.79152 1.0427V1.04259Z" fill="black" />
                            <path d="M5.83335 7.91202C5.9735 7.58041 6.10246 7.27942 6.22784 6.97688C6.29442 6.8162 6.38028 6.67902 6.57725 6.67411C6.75796 6.66983 6.85943 6.78657 6.93763 6.92942C7.32078 7.62924 7.68804 8.33765 7.85277 9.1262C8.12993 10.4524 7.30788 11.7098 5.99328 12.0265C5.08983 12.2441 4.23597 12.0994 3.43304 11.6867C2.51586 11.2153 2.10709 10.3864 2.04807 9.39752C1.93525 7.50505 3.18801 5.59187 4.96031 4.88633C5.09638 4.83216 5.22656 4.75466 5.36737 4.72378C5.48156 4.69872 5.6491 4.68183 5.71772 4.74403C5.76099 4.79278 5.79349 4.85009 5.8131 4.91223C5.8327 4.97436 5.83899 5.03992 5.83153 5.10464C5.79775 5.33799 5.70565 5.56248 5.64414 5.79236C5.42607 6.61125 5.47754 7.23312 5.83335 7.91202ZM5.04788 5.42998C5.00237 5.44705 4.95775 5.46639 4.91418 5.48794C3.52089 6.24584 2.83601 7.47803 2.68764 8.99846C2.5589 10.3156 3.38983 11.3224 4.69192 11.5802C4.75405 11.5962 4.81903 11.5979 4.88188 11.585C5.29418 11.4649 5.71326 11.361 6.11326 11.208C6.88147 10.9139 7.3092 10.1473 7.19214 9.33772C7.10303 8.72269 6.84868 8.16618 6.58111 7.61438C6.5756 7.60337 6.55085 7.60216 6.48345 7.57739C6.39014 7.8938 6.2872 8.20372 6.20911 8.51973C6.14148 8.79356 5.8819 8.90738 5.65246 8.74064C5.6006 8.70273 5.55569 8.65618 5.5197 8.60301C5.16699 8.07673 4.91011 7.50604 4.91237 6.86661C4.91402 6.39606 4.99801 5.92601 5.04788 5.43009V5.42998Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_349_1318">
                                <rect width="11" height="13" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <h6 class='span'> k/day </h6>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.01688 0.296875C5.68779 0.296875 4.38854 0.690996 3.28345 1.4294C2.17835 2.1678 1.31703 3.21732 0.808407 4.44524C0.299787 5.67316 0.166708 7.02433 0.426001 8.32788C0.685294 9.63143 1.32531 10.8288 2.26512 11.7686C3.20493 12.7084 4.40232 13.3485 5.70587 13.6077C7.00942 13.867 8.36059 13.734 9.58851 13.2253C10.8164 12.7167 11.8659 11.8554 12.6044 10.7503C13.3428 9.64521 13.7369 8.34596 13.7369 7.01687C13.7349 5.23522 13.0263 3.5271 11.7665 2.26728C10.5067 1.00746 8.79853 0.298832 7.01688 0.296875ZM7.01688 13.1993C5.79411 13.1993 4.59881 12.8367 3.58212 12.1573C2.56543 11.478 1.77302 10.5125 1.30508 9.38278C0.837154 8.25309 0.714722 7.01002 0.953271 5.81075C1.19182 4.61148 1.78064 3.50988 2.64526 2.64526C3.50988 1.78063 4.61148 1.19182 5.81075 0.953268C7.01002 0.714719 8.25309 0.837151 9.38278 1.30508C10.5125 1.77301 11.478 2.56543 12.1574 3.58212C12.8367 4.59881 13.1993 5.79411 13.1993 7.01687C13.1975 8.656 12.5456 10.2275 11.3865 11.3865C10.2275 12.5456 8.65601 13.1975 7.01688 13.1993ZM11.0489 7.01687C11.0489 7.08816 11.0206 7.15653 10.9701 7.20694C10.9197 7.25735 10.8514 7.28567 10.7801 7.28567H7.01688C6.94559 7.28567 6.87722 7.25735 6.82681 7.20694C6.7764 7.15653 6.74808 7.08816 6.74808 7.01687V3.25367C6.74808 3.18238 6.7764 3.11401 6.82681 3.0636C6.87722 3.01319 6.94559 2.98487 7.01688 2.98487C7.08817 2.98487 7.15654 3.01319 7.20695 3.0636C7.25736 3.11401 7.28568 3.18238 7.28568 3.25367V6.74807H10.7801C10.8514 6.74807 10.9197 6.77639 10.9701 6.8268C11.0206 6.87721 11.0489 6.94558 11.0489 7.01687Z" fill="#828080" />
                    </svg>
                    <h6 class='span'> k/day </h6>


                </div>
            </div>
            <div class="more"><a href='more-information.php?id=<?php echo    $idDinner; ?>'>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10Z" fill="black" />
                        <path d="M6 10C7.10457 10 8 10.8954 8 12C8 13.1046 7.10457 14 6 14C4.89543 14 4 13.1046 4 12C4 10.8954 4.89543 10 6 10Z" fill="black" />
                        <path d="M18 10C19.1046 10 20 10.8954 20 12C20 13.1046 19.1046 14 18 14C16.8954 14 16 13.1046 16 12C16 10.8954 16.8954 10 18 10Z" fill="black" />
                    </svg></a></div>
        </div>

    </div>
    <div class="end"></div>
    <?php
    include './app/include/footer.php'
    ?>
</body>

</html>