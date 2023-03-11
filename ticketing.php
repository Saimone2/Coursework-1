<?php
    session_start();
    require '../localhost/config/connect_to_trains.php';
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
    <div id="ticketing-block">
      <table class="train-table">
        <tr>
          <th>№ потягу</th><th>Звідки/Куди</th><th>Дата</th><th style="line-height: 1.9rem; text-align: left;">Відправлення<br>Прибуття</th><th>Тривалість</th><th>Вільних місць</th>
        </tr>
        <?php
          $train_id = $_GET['id'];
          $details = mysqli_query($connect, "SELECT * FROM `trains-info` WHERE `id` = '$train_id'");
          $details = mysqli_fetch_all($details);
          foreach($details as $detail)
          {
            ?>
        <tr>
          <td><div class="number-child"><?= $detail[1] ?></div></td>
          <td>
            <div class="place"><?= $detail[3] ?></div>
            <div class="place" style="border-top: 1px solid rgba(49,49,49,.1);"><?= $detail[4] ?></div>
          </td>
          <td>
            <div class="when"><span>Відправлення</span><span><?= $detail[5] ?></span></div>
            <div class="when" style="border-top: 1px solid rgba(49,49,49,.1);"><span>Прибуття</span><span><?= $detail[6] ?></span></div>
          </td>
          <td class="time">
            <div class="time_to"><?= $detail[7] ?></div>
            <div  class="time_to" style="border-top: 1px solid rgba(49,49,49,.1);"><?= $detail[8] ?></div>
          </td>
          <td class="duration"><?= $detail[9] ?></td>
          <td class="time">
            <div class="choose"><span>К1 - <?= $detail[10] ?></span><span><button id="add-item-btn">Додати</button></span></div>
            <div class="choose" style="border-top: 1px solid rgba(49,49,49,.1);"><span>К2 - <?= $detail[12] ?></span><span><button id="add-item-btn1">Додати</button></span></div>
          </td>
        </tr>
        <?php
           }
        ?>
      </table>
      <div class="input-person"><span>Введіть дані пасажирів</span></div>
      <form class="place-data" action="index.php" method="post">
      <div class="container">
        <?php
          $i = 1;
          for($i = 1; $i <= 1; $i++)
          {

        ?>

        <div class="separate-form">
        <div class="title">
          <span>Пасажир <?= $i ?></span>
        </div>
        <div class="form">
          <div class="top-name">
            <div class="surname">
              <div class="titl">Прізвище</div>
              <input type="text">
            </div>
            <div class="name">
              <div class="titl">Ім'я</div>
              <input type="text">
            </div>
            <div class="cancel">
              <a href="#">Відмінити</a>
            </div>
          </div>
          <div class="document">

              <div class="operation" role="radiogroup">
                <div>
                  <label class="g-form-radio">
                    <input type="radio" name="operation<?= $i ?>" value="buy" checked="checked">
                    <span>Купити</span>
                  </label>
                </div>
              </div>

              <div class="type" role="radiogroup">
                <div class="headline"><span>Тип документу</span></div>
                <div>
                  <label class="g-form-radio">
                    <input type="radio" name="type<?= $i ?>" value="full" checked="checked">
                    <span>Повний</span>
                  </label>
                </div>
                <div class="child">
                  <label class="g-form-radio">
                    <input type="radio" name="type<?= $i ?>" value="child">
                    <span>Дитячий</span>
                  </label>
                </div>
                <div class="student">
                  <label class="g-form-radio">
                    <input type="radio" name="type<?= $i ?>" value="student">
                    <span>Студентський</span>
                  </label>
                </div>
                  <div class="privilege">
                    <label class="g-form-radio">
                      <input type="radio" name="type<?= $i ?>" value="privilege">
                      <span>Пільговий</span>
                    </label>
                  </div>
                </div>

                <div class="cost">
                  <div class="sum">
                    <span><span class="js-cost"><?= $detail[13] ?></span> грн</span>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <?php
         }
      ?>
      </div>
      <div class="bottom-place">
        <div class="total-cost">
          <div>Загальна вартість: <span><span class="sum"><?= $detail[13]*1 ?></span> грн</span></div>
        </div>
        <button type="submit">Оплатити</button>
      </div>
    </form>
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

</script>
<script>

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

      document.getElementById("add-item-btn").addEventListener("click", btn_click);
      document.getElementById("add-item-btn1").addEventListener("click", btn_click);

      function btn_click()
      {
          count++;
      }
</script>

</body>
</html>
