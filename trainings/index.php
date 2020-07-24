<?php
function countDays ($startDate, $trainingCount, $schedule){
  $year = substr($startDate, 0, 4);
  $month = substr($startDate, 5, 2);
  $day = substr($startDate, 8, 2);
  $date = $year.'-'.$month.'-'.$day;
  # Вычисляем день недели
  $dayOfWeek = date('w', strtotime($date));
  # Вычисляем количество тренрововчных дней
  $length = count($schedule);
  $numbOfDays = $numbOfTrains = 0;
  # Крутим цикл и считаем дни, пока не истечет необходимое количество тренировок
  while ($trainingCount != 0){
    $dayOfWeek = $dayOfWeek%7;
    for ($i = 0; $i<$length; $i++){
      if ($dayOfWeek == $schedule[$i]){
        $trainingCount--;
      }
    }
    $dayOfWeek++;
    $numbOfDays++;
  } 
  return "С числа ".$startDate." пройдёт ".$numbOfDays." дней.";
}

echo countDays("2016.04-18", 6, [2,4,6])."<br>";
echo countDays("2016.04-18", 6, [1,3,5])."<br>";
echo countDays("2016-04-18", 6, [1,4])."<br>";
echo countDays("2016-04-19", 6, [2,4,6])."<br>";
echo countDays("2016*04-21", 1, [2,4,6])."<br>";
echo countDays("2016-05-01", 2, [2])."<br>";
echo countDays("2016-05-10", 12, [2,4,6])."<br>";
echo countDays("2016-05-30", 3, [2])."<br>";
echo countDays("2016-05-30", 3, [1,2,3,4,5,6])."<br>";
echo countDays("2016-10-12", 2, [1])."<br>";
echo countDays("2016-10-10", 200, [2,4,6])."<br>";

echo $_SERVER['QUERY_STRING']." ".__FILE__." ".__DIR__;