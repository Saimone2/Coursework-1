<?php
    session_start();
    require '../localhost/config/connect_to_stations.php';
?>
<!DOCTYPE html>
<html lang="uk" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Залізничні квитки. Купити квитки на поїзд онлайн | railroad</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <header>
    <div class="head">
      <div class="header-top">
        <a class="right1_5">Шукайте нас в соціальних мережах</a>
        <a class="icon-animation" href="https://web.telegram.org/" target="_blank"><img class="header-img" src="../images/telegram.png" alt="Facebook"></a>
        <a class="icon-animation" href="https://www.instagram.com/" target="_blank"><img class="header-img" src="../images/instagram.png" alt="Instagram"></a>
        <a class="icon-animation" href="https://www.facebook.com/" target="_blank"><img class="header-img" src="../images/facebook.png" alt="Facebook"></a>
        <a class="icon-animation" href="https://www.youtube.com/" target="_blank"><img class="header-img" src="../images/youtube.jpg" alt="Youtube"></a>
        <a class="icon-animation" href="https://www.viber.com/" target="_blank"><img class="header-img" src="../images/viber.png" alt="Viber"></a>
        <span>Жд квитки на потяги «Укрзалізниці»</span>
      </div>
      <a href="index.php"><img class="logo" src="../images/logo-top.png" alt="railroad.ua"></a>
      <nav class="menu">
        <div class="item">
          <a href="index.php">Головна</a>
        </div>
        <div class="item">
          <a href="news_1.php">Новини</a>
        </div>
        <div class="item">
          <a href="passengers-help.php">Пасажирам</a>
        </div>
        <div class="item">
          <a href="about-us.php">Про проєкт</a>
        </div>
        <div class="auth">
          <button id="dropdtnid" onclick="myFunction()" class="dropbtn">
            <?php
            if($_SESSION['ent-message'] == 'Адмін авторизація')
            {
              echo 'Admin';
            }
            else if($_SESSION['ent-message'] == 'Успішна авторизація')
            {
              echo  $_SESSION['user']['login'];
            }
            else
            {
              echo 'Авторизація';
            }
            ?>
          </button>
          <div id="myDropdown" class="dropdown-content">
            <div class="menu-auth">
              <?php
              if($_SESSION['ent-message'] == 'Успішна авторизація')
              {
                echo '<div class="regis">
                  <a href="profile.php?id=' . $_SESSION['user']['id'] . '">Профіль</a>
                </div>
                <div class="regis">
                  <a href="shopping_cart.php">Мої квитки</a>
                </div>
                <div class="regis">
                  <a href="../validation-form/exit.php">Вийти</a>
                </div>';
              }
              else if ($_SESSION['ent-message'] == 'Адмін авторизація')
              {
                echo '<div class="regis">
                  <a href="profile.php?id=' . $_SESSION['user']['id'] . '">Профіль</a>
                </div>
                <div class="regis">
                  <a href="admin.php">Адмін</a>
                </div>
                <div class="regis">
                  <a href="../validation-form/exit.php">Вийти</a>
                </div>';
              }
              else
              {
              ?>
              <form action="../validation-form/signin.php" method="post" novalidate>
                <?php
                  if($_SESSION['ent-message'] == 'Невірний логін або пароль')
                  {
                    echo '<div class="not-found-msg"> ' . $_SESSION['ent-message'] . '</div>';
                  }
                  unset($_SESSION['ent-message']);
                ?>
                <input type="email" name="ent-email" placeholder="E-mail" id="enter-email">
                <div class="span-enter-email"></div>
                <div class="password">
                  <input type="password" name="ent-password" placeholder="Пароль" id="enter-password">
                  <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
                </div>
                <div class="span-enter-password"></div>
                <div class="reset-pass">
                  <a href="reset.php">Забули пароль?</a>
                </div>
                <div class="submit">
                  <button class="btn btn-success" type="submit">Увійти</button>
                </div>
                <div class="regis">
                  <a href="registration.php">Зареєструватися</a>
                </div>
              </form>
              <?php
               }
              ?>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="main">
    <div id="search-block">
      <div class="search">
        <form action="" method="post">
          <div class="stations">
            <div class="station">
              <div class="title">Звідки</div>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <input type="text" name="station1" list="list-language1" id="id-language1" autocomplete="off">
              <div list="list-language1" style="display:none;">
                <?php
                  $stations = mysqli_query($connect, "SELECT * FROM `stations-list`");
                  $stations = mysqli_fetch_all($stations);
                  foreach($stations as $station)
                  {
                    ?>
                <span><?= $station[1] ?></span>
                <?php
              }
            ?>
          </div>
            </div>
            <a class="change-dir">
              <img src="../images/arrows.png" alt="поміняти місцями" id="switch_butt">
            </a>
            <div class="station">
              <div class="title">Куди</div>
              <input type="text" name="station2" list="list-language2" id="id-language2" autocomplete="off">
              <div list="list-language2" style="display:none;">
                <?php
                  foreach($stations as $station)
                  {
                    ?>
                <span><?= $station[1] ?></span>
                <?php
              }
            ?>
          </div>
            </div>
          </div>
          <div class="date">
            <div class="title">Дата відправки</div>
            <input type="date" max="2022-08-01" min="2022-06-01" id="dateupdate" name="date1">
            <div class="date-link">
              <a href="#" id="datetoday">Сьогодні</a>
              <a href="#" id="datetomor">Завтра</a>
              <a href="#" id="aftertomor">Післязавтра</a>
            </div>
          </div>
          <div class="button">
            <button type="submit">Пошук потягів</button>
          </div>
        </form>
      </div>
      <?php
        require '../localhost/config/connect_to_trains.php';

        if(!empty($_REQUEST['station1']) && !empty($_REQUEST['station2']))
        {
          $station1 = trim($_REQUEST['station1']);
          $station2 = trim($_REQUEST['station2']);
          $date = trim($_REQUEST['date1']);

          $sql = mysqli_query($connect, "SELECT * FROM `trains-info` WHERE `going_from`='$station1' AND `going_to`='$station2' AND `date_from`='$date'");

          if(mysqli_num_rows($sql) > 0)
          {
            $count = mysqli_num_rows($sql);
            echo "<div class='result'>Результати: $count</div>";
            while ($detail = mysqli_fetch_array($sql))
            {
              ?>
                <div class="trip-card">
                  <div class="trip-info">
                    <h3 class="trip-transport-name"><span class="trip-transport-name-number"><?= $detail[1] ?></span> <?= $detail[3] ?> — <?= $detail[4] ?></h3>
                      <div class="trip-description"><?= $detail[2] ?></div>
                      <hr class="grey">
                      <img src="../images/hyundai.jpg">
                  </div>
                  <div class="trip-details">
                    <div class="trip-top-wrapper">
                      <div class="trip-for-time">
                          <p><?= $detail[7] ?></p>
                          <div class="trip-hr"></div>
                          <p class="trip-duration"><?= $detail[9] ?></p>
                          <div class="trip-hr"></div>
                          <p><?= $detail[8] ?></p>
                      </div>
                      <div class="trip-for-stations">
                         <div class="come-from"><?= $detail[3] ?></div>
                         <div class="come-to"><?= $detail[4] ?></div>
                       </div>
                       <div class="trip-for-date">
                         <div class="come-from"><?= $detail[5] ?></div>
                         <div class="come-to"><?= $detail[6] ?></div>
                       </div>
                     </div>
                     <div class="trip-bottom-wrapper">
                       <div class="trip-type-1">
                         <div class="">1-й клас, <?= $detail[10] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[11] ?></span><span class="middle-UAH"> грн</span></span>
                          <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                       <div class="trip-type-2">
                         <div class="">2-й клас, <?= $detail[12] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[13] ?></span><span class="middle-UAH"> грн</span></span>
                           <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
        <?php
               }
          }
          else
          {
            echo '<div class="noplaces"><div class="noplaces-text">За заданим Вами напрямком місць немає.</div></div>';
          }
        }
        else if(empty($_REQUEST['station1']) && !empty($_REQUEST['station2']))
        {
          $station2 = trim($_REQUEST['station2']);
          $date = trim($_REQUEST['date1']);

          $sql = mysqli_query($connect, "SELECT * FROM `trains-info` WHERE `going_to`='$station2' AND `date_from`='$date'");

          if(mysqli_num_rows($sql) > 0)
          {
            $count = mysqli_num_rows($sql);
            echo "<div class='result'>Результати: $count</div>";
            while ($detail = mysqli_fetch_array($sql))
            {
              ?>
                <div class="trip-card">
                  <div class="trip-info">
                    <h3 class="trip-transport-name"><span class="trip-transport-name-number"><?= $detail[1] ?></span> <?= $detail[3] ?> — <?= $detail[4] ?></h3>
                      <div class="trip-description"><?= $detail[2] ?></div>
                      <hr class="grey">
                      <img src="../images/hyundai.jpg">
                  </div>
                  <div class="trip-details">
                    <div class="trip-top-wrapper">
                      <div class="trip-for-time">
                          <p><?= $detail[7] ?></p>
                          <div class="trip-hr"></div>
                          <p class="trip-duration"><?= $detail[9] ?></p>
                          <div class="trip-hr"></div>
                          <p><?= $detail[8] ?></p>
                      </div>
                      <div class="trip-for-stations">
                         <div class="come-from"><?= $detail[3] ?></div>
                         <div class="come-to"><?= $detail[4] ?></div>
                       </div>
                       <div class="trip-for-date">
                         <div class="come-from"><?= $detail[5] ?></div>
                         <div class="come-to"><?= $detail[6] ?></div>
                       </div>
                     </div>
                     <div class="trip-bottom-wrapper">
                       <div class="trip-type-1">
                         <div class="">1-й клас, <?= $detail[10] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[11] ?></span><span class="middle-UAH"> грн</span></span>
                          <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                       <div class="trip-type-2">
                         <div class="">2-й клас, <?= $detail[12] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[13] ?></span><span class="middle-UAH"> грн</span></span>
                           <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
          <?php
               }
          }
          else
          {
            echo '<div class="noplaces"><div class="noplaces-text">За заданим Вами напрямком місць немає.</div></div>';
          }
        }
        else if(!empty($_REQUEST['station1']) && empty($_REQUEST['station2']))
        {
          $station1 = trim($_REQUEST['station1']);
          $date = trim($_REQUEST['date1']);

          $sql = mysqli_query($connect, "SELECT * FROM `trains-info` WHERE `going_from`='$station1' AND `date_from`='$date'");

          if(mysqli_num_rows($sql) > 0)
          {
            $count = mysqli_num_rows($sql);
            echo "<div class='result'>Результати: $count</div>";
            while ($detail = mysqli_fetch_array($sql))
            {
              ?>
                <div class="trip-card">
                  <div class="trip-info">
                    <h3 class="trip-transport-name"><span class="trip-transport-name-number"><?= $detail[1] ?></span> <?= $detail[3] ?> — <?= $detail[4] ?></h3>
                      <div class="trip-description"><?= $detail[2] ?></div>
                      <hr class="grey">
                      <img src="../images/hyundai.jpg">
                  </div>
                  <div class="trip-details">
                    <div class="trip-top-wrapper">
                      <div class="trip-for-time">
                          <p><?= $detail[7] ?></p>
                          <div class="trip-hr"></div>
                          <p class="trip-duration"><?= $detail[9] ?></p>
                          <div class="trip-hr"></div>
                          <p><?= $detail[8] ?></p>
                      </div>
                      <div class="trip-for-stations">
                         <div class="come-from"><?= $detail[3] ?></div>
                         <div class="come-to"><?= $detail[4] ?></div>
                       </div>
                       <div class="trip-for-date">
                         <div class="come-from"><?= $detail[5] ?></div>
                         <div class="come-to"><?= $detail[6] ?></div>
                       </div>
                     </div>
                     <div class="trip-bottom-wrapper">
                       <div class="trip-type-1">
                         <div class="">1-й клас, <?= $detail[10] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[11] ?></span><span class="middle-UAH"> грн</span></span>
                          <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                       <div class="trip-type-2">
                         <div class="">2-й клас, <?= $detail[12] ?> місць</div>
                         <div>
                           <span class="ticket-cost"><span class="price-value"><?= $detail[13] ?></span><span class="middle-UAH"> грн</span></span>
                           <a href="ticketing.php?id=<?= $detail[0] ?>">Обрати</a>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
          <?php
               }
          }
          else
          {
            echo '<div class="noplaces"><div class="noplaces-text">За заданим Вами напрямком місць немає.</div></div>';
          }
        }
        else
        {
          echo '<div class="noplaces"><div class="noplaces-text">Введіть назви станцій та дату бажаної поїздки</div></div>';
        }
        ?>


  </div>
</div>
  <footer>
    <div class="footer">
      <div class="info">
        <div class="footer-logo">
          <a href="index.php"><img src="../images/footer-logo.png" alt="railroad.ua"></a>
        </div>
        <nav class="cl-effect-21">
          <ul class="site-links">
            <li class="site-link">
              <a href="index.php">НА ГОЛОВНУ</a>
            </li>
            <li class="site-link">
              <a href="news_1.php">НОВИНИ</a>
            </li>
            <li class="site-link">
              <a href="passengers-help.php">ПАСАЖИРАМ</a>
            </li>
            <li class="site-link">
              <a href="contacts.php">ЗВОРОТНІЙ ЗВ'ЯЗОК</a>
            </li>
          </ul>
          <p class="license">© 2022 – 2022 railroad.ua
            <img class="correct" style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Правильний CSS!"/>
          </p>
        </nav>
        <div class="contacts">
          <div class="phone-container">
            <a class="footer-phone" href="tel:(044)000-00-00">(044)<span class="contacts-phone">000-00-00</span>
            </a>
          </div>
          <div class="mail-container">
            <a class="footer-mail" href="mailto:1railroad.ua@gmail.com">1railroad.ua@gmail.com</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>

<script>
  function myFunction()
  {
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("dropdtnid").classList.toggle("active");
  }

  function show_hide_password(target)
  {
    var input = document.getElementById('enter-password');
    if (input.getAttribute('type') == 'password')
    {
      target.classList.add('view');
      input.setAttribute('type', 'text');
    }
    else
    {
      target.classList.remove('view');
      input.setAttribute('type', 'password');
    }
    return false;
  }

      let authinp1 = document.querySelector('#enter-email');
      let authinp2 = document.querySelector('#enter-password');
      let authspan1 = document.querySelector('.span-enter-email');
      let authspan2 = document.querySelector('.span-enter-password');
      let reg1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
      let reg3 = /[A-Za-z0-9]{6,25}/;

      document.querySelector('.btn.btn-success').onclick = function(e1)
      {
        if(document.getElementById("enter-email").value === '')
        {
          notValid(authinp1, authspan1, "Заповніть поле");
          e1.preventDefault();
        }
        else
        {
          if(!validate(reg1, authinp1.value))
          {
            notValid(authinp1, authspan1, 'Введіть коректний email');
            e1.preventDefault();
          }
          else
          {
            valid(authinp1, authspan1, '');
          }
        }

        if(document.getElementById("enter-password").value === '')
        {
          notValid(authinp2, authspan2, "Заповніть поле");
          e1.preventDefault();
        }
        else
        {
          if(!validate(reg3, authinp2.value))
          {
            notValid(authinp2, authspan2, 'Пароль містить мінімум 6 символів');
            e1.preventDefault();
          }
          else
          {
            valid(authinp2, authspan2, '');
          }
        }
      }

      function validate(regex, inp)
      {
        return regex.test(inp);
      }

      function notValid(inp, el, mess)
      {
        inp.classList.add('is-invalid');
        el.innerHTML = mess;
      }

      function valid(inp, el, mess)
      {
        inp.classList.remove('is-invalid');
        inp.classList.add('is-valid');
        el.innerHTML = mess;
      }

</script>
<script>

      $(document).on('dblclick', 'input[list]', function(event) {
      	event.preventDefault();
      	var str = $(this).val();
      	$('div[list=' + $(this).attr('list') + '] span').each(function(k, obj) {
      		if ($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0) {
      			$(this).hide();
      		}
      	});
      	$('div[list=' + $(this).attr('list') + ']').toggle(100);
      	$(this).focus();
      });

      $(document).on('blur', 'input[list]', function(event) {
      	event.preventDefault();
      	var list = $(this).attr('list');
      	setTimeout(function() {
      		$('div[list=' + list + ']').hide(100);
      	}, 100);
      });

      $(document).on('click', 'div[list] span', function(event) {
      	event.preventDefault();
      	var list = $(this).parent().attr('list');
      	var item = $(this).html();
      	$('input[list=' + list + ']').val(item);
      	$('div[list=' + list + ']').hide(100);
      });

      $(document).on('keyup', 'input[list]', function(event) {
      	event.preventDefault();
      	var list = $(this).attr('list');
      	var divList = $('div[list=' + $(this).attr('list') + ']');
      	if (event.which == 27) { // esc
      		$(divList).hide(200);
      		$(this).focus();
      	} else if (event.which == 13) { // enter
      		if ($('div[list=' + list + '] span:visible').length == 1) {
      			var str = $('div[list=' + list + '] span:visible').html();
      			$('input[list=' + list + ']').val(str);
      			$('div[list=' + list + ']').hide(100);
      		}
      	} else if (event.which == 9) { // tab
      		$('div[list]').hide();
      	} else {
      		$('div[list=' + list + ']').show(100);
      		var str1 = $(this).val();
      		$('div[list=' + $(this).attr('list') + '] span').each(function() {
      			if ($(this).html().toLowerCase().indexOf(str1.toLowerCase()) < 0) {
      				$(this).hide(200);
      			} else {
      				$(this).show(200);
      			}
      		});
      	}
      });

      $("#switch_butt").click(function() {
      	var temp = $('#id-language1').val();
      	$('#id-language1').val($('#id-language2').val());
      	$('#id-language2').val(temp);
      });

      var now = new Date();
      if(now.getMonth() + 1  < 10)
      {
        if(now.getDate() < 10)
        {
          var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + now.getDate();
          if(now.getDate() == 9)
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
            var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
          }
          else
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 1);
            if(now.getDate() == 8)
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
            }
            else
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 2);
            }
          }
        }
        else
        {
          var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + now.getDate();
          if(now.getDate() == 30)
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-01';
            var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-02';
          }
          else
          {
            if(now.getDate() == 29)
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-01';
            }
            else
            {
              var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
            }
          }
        }
      }
      else
      {
        if(now.getDate() < 10)
        {
          var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + now.getDate();
          if(now.getDate() == 9)
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
            var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
          }
          else
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 1);
            if(now.getDate() == 8)
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
            }
            else
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-0' + (now.getDate() + 2);
            }
          }
        }
        else
        {
          var date1 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + now.getDate();
          if(now.getDate() == 30)
          {
            var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-01';
            var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-02';
          }
          else
          {
            if(now.getDate() == 29)
            {
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-01';
            }
            else
            {
              var date2 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 1);
              var date3 = now.getFullYear() + '-0' + (now.getMonth() + 1) + '-' + (now.getDate() + 2);
            }
          }
        }
      }

      $('#dateupdate').val(date1);

      $("#datetoday").click(function() {
        $('#dateupdate').val(date1);
      });

      $("#datetomor").click(function() {
         $('#dateupdate').val(date2);
      });

      $("#aftertomor").click(function() {
         $('#dateupdate').val(date3);
      });

</script>

</body>
</html>
