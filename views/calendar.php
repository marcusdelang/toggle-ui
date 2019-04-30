<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/> 
    <title>Delicious pancakes! - Tasty recipe</title>
    <link rel="stylesheet" href="../../resources/css/reset.css">
    <link rel="stylesheet" href="../../resources/css/nav.css">
    <link rel="stylesheet" href="../../resources/css/calendar.css">
</head>
<body>
    <div class="wrapper">
        <?php include Tasty\Util\Constants::getViewFragmentsDir() . 'header.php' ?>
            <section class="top-container-text">
                <h1>Plan your meals with our meal calender!</h1>
                <h2>November</h2>

            </section>   
        </div>
        <div class="calendar-grid">
            <div id="grid-weekdays">
                <div class='weekday'>Mon</div>
                <div class='weekday'>Tue</div>
                <div class='weekday'>Wed</div>
                <div class='weekday'>Thu</div>
                <div class='weekday'>Fri</div>
                <div class='weekday'>Sat</div>
                <div class='weekday'>Sun</div>
            </div>
            
            <div id="grid-day">
                <a class="day" id="day1">1</a>
                <a class="day" id="day2">2</a>
                <a class="day" href="MeatballPage" id="day3">3
                    <img src="../../resources/img/meatballs.png" alt="Meatballs!" />
                    <p id="meatball-click">Click to visit our meatball recipe!</p>
                </a>
                <a class="day" id="day4">4</a>
                <a class="day" id="day5">5</a>
                <a class="day" id="day6">6</a>
                <a class="day" id="day7">7</a>
                <a class="day" id="day8">8</a>
                <a class="day" id="day9">9</a>
                <a class="day" id="day10">10</a>
                <a class="day" id="day11">11</a>
                <a class="day" id="day12" href="PancakePage">12
                    <img src="../../resources/img/pancake.png" alt="Pancakes!" />
                    <p id="pancake-click">Click to visit our pancake recipe!</p>
                </a>
                <a class="day" id="day13">13</a>
                <a class="day" id="day14">14</a>
                <a class="day" id="day15">15</a>
                <a class="day" id="day16">16</a>
                <a class="day" id="day17">17</a>
                <a class="day" id="day18">18</a>
                <a class="day" id="day19">19</a>
                <a class="day" id="day20">20</a>
                <a class="day" id="day21">21</a>
                <a class="day" id="day22">22</a>
                <a class="day" id="day23">23</a>
                <a class="day" id="day24">24</a>
                <a class="day" id="day25">25</a>
                <a class="day" id="day26">26</a>
                <a class="day" id="day27">27</a>
                <a class="day" id="day28">28</a>
                <a class="day" id="day29">29</a>
                <a class="day" id="day30">30</a>
            </div>
        </div>
</body>
</html>       