<?php
  $message = '';
  $ticket = 700;
  $ticketBack = 1200;
  $sum = 0;  
  function calculate($post) {
    $back = ((int) substr($post, 0, 2) * 60 * 60) + (int)substr($post, 3, 2) * 60 + (50 * 60);
    return $back = sprintf('%02d:%02d', ($back / 3600), ($back / 60 % 60));
  };

  function message($num, $sum, $dir, $calTime, $route, $calBack = '') {
    $BA = '';
    $back = '';
    $traveltTime = '50 минут';
    $routeDir = ($route === 'BA') ? 'В в А' : 'А в В';
    if($route === 'ABA') {
      $back = 'и обратно';
      $traveltTime = '1 час 40 минут';
      $BA = "<p> Обратно теплоход отправляется в {$_POST['time2']}, а прибудет в $calBack.</p>";
    }
    return  "<p>Вы выбрали $num билета по маршруту из $routeDir $back стоимостью $sum.<p>
    <p>Это путешествие займет у вас $traveltTime.</p> 
    <p>Теплоход отправляется в $dir, а прибудет в $calTime.</p>
    $BA";
  };
  if(isset($_POST['submit'])) {
    if($_POST['route'] === 'AB') {
      $sum = $_POST['num'] * $ticket;
      $cal = calculate($_POST['timeAB']);
      $message = message($_POST['num'],  $sum, $_POST['timeAB'],  $cal, $_POST['route']);
    } 
    if($_POST['route'] === 'BA') {
      $sum = $_POST['num'] * $ticket;
      $cal = calculate($_POST['timeBA']);
      $message = message($_POST['num'],  $sum, $_POST['timeBA'],  $cal, $_POST['route']);
    }
    if($_POST['route']  === 'ABA') {
      $sum = $_POST['num'] * $ticketBack;
      $cal = calculate($_POST['timeAB']);
      $calBack = calculate($_POST['time2']);
      $message = message($_POST['num'],  $sum,  $_POST['timeAB'],  $cal, $_POST['route'], $calBack );
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./style2.css">
  <script defer src="./script.js"></script>
</head>
<body>
  <h1>Задание №1</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">event_id</th>
        <th scope="col">event_date</th>
        
        <th scope="col">ticket_adult_quantity</th>
        
        <th scope="col">ticket_kid_quantity</th>
        <th scope="col">id_type</th>
        <th scope="col">barcode</th>
        <th scope="col">user_id</th>
        <th scope="col">equal_price</th>
        <th scope="col">created</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>003</td>
        <td>2021-08-21 13:00:00</td>
       
        <td>1</td>
        
        <td>1</td>
        <td>1</td>
        <td>31436111</td>
        <td>00451</td>
        <td>700</td>
        <td>2021-01-11 13:22:09</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>006</td>
        <td>2021-08-21 13:00:00</td>
       
        <td>4</td>
        
        <td>2</td>
        <td>2</td>
        <td>41436111</td>
        <td>00451</td>
        <td>700</td>
        <td>2021-01-11 13:22:09</td>
      </tr>
      <tr>
        <th scope="row">1</th>
        <td>009</td>
        <td>2021-08-21 13:00:00</td>
       
        <td>0</td>
        
        <td>1</td>
        <td>3</td>
        <td>21111111</td>
        <td>00451</td>
        <td>700</td>
        <td>2021-01-11 13:22:09</td>
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="margin-top: 60px;">
    <thead>
      <tr>
        <th scope="col">id_type</th>
        <th scope="col">type</th>
        <th scope="col">id_price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>usual</td>
        <td>1</td>
        
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>group</td>
        <td>2</td>
        
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>preferential</td>
        <td>3</td>
        
      </tr>
    </tbody>
  </table>
  <table class="table table-striped" style="margin-top: 60px;">
    <thead>
      <tr>
        <th scope="col">id_price</th>
        <th scope="col">ticket_adult_price</th>
        <th scope="col">ticket_kid_price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>1000</td>
        <td>800</td>
        
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>700</td>
        <td>450</td>
        
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>600</td>
        <td>300</td>
        
      </tr>
    </tbody>
  </table>
  <div class="container">
    <h1>Задача №2</h1>
    <form class="form" action="" name="form" method="post">
      <h3>Выберите направление</h3>
      <select class="route" name="route" class="form-select" aria-label="Default select example">
        <option value="AB">из A в B</option>
        <option value="BA">из B в A</option>
        <option value="ABA">из A в B и обратно в А</option>
      </select>
      <br/>
      <h3>Подходящее для вас время</h3>
      <select class="time" name="timeAB" class="form-select1" aria-label="Default select example">
        <option value="18:00">18:00(из A в B)</option>
        <option value="18:30">18:30(из A в B)</option>
        <option value="18:45">18:45(из A в B)</option>
        <option value="19:00">19:00(из A в B)</option>
        <option value="19:15">19:15(из A в B)</option>
        <option value="21:00">21:00(из A в B)</option>
      </select>
      <br />
      <h3 class="h3">Обратное подходящее для вас время</h3>
      <select class="time2" name="time2" class="form-select2" aria-label="Default select example">
        <option value="18:30">18:30(из B в A)</option>
        <option value="18:45">18:45(из B в A)</option>
        <option value="19:00">19:00(из B в A)</option>
        <option value="19:15">19:15(из B в A)</option>
        <option value="19:35">19:35(из B в A)</option>
        <option value="21:50">21:50(из B в A)</option>
        <option value="21:55">21:55(из B в A)</option>
      </select>
      <label for="num">Количество билетов</label>
      <br/>
      <input name='num' id="num"  type="number" min="1" value="1">
      <br/>
      <input type="submit" name="submit" value="ПОСЧИТАТЬ">
      <?php
        echo $message;
      ?>
    </form>
  </div>
</body>
</html>