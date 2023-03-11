<?php
  session_start();
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
<script type="text/javascript">
    var total_pics_num = 4;
    var interval = 5000;
    var time_out = 1;
    var i = 0;
    var timeout;
    var opacity = 100;
    function fade_to_next()
    {
      opacity--;
      var k = i + 1;
      var image_now = 'image_' + i;
      if (i == total_pics_num) k = 1;
      var image_next = 'image_' + k;
      document.getElementById(image_now).style.opacity = opacity/100;
      document.getElementById(image_now).style.filter = 'alpha(opacity='+ opacity +')';
      document.getElementById(image_next).style.opacity = (100-opacity)/100;
      document.getElementById(image_next).style.filter = 'alpha(opacity='+ (100-opacity) +')';
      timeout = setTimeout("fade_to_next()",time_out);
      if (opacity==1)
      {
        opacity = 100;
        clearTimeout(timeout);
      }
    }
    setInterval (function()
      {
        i++;
        if (i > total_pics_num) i = 1;
        fade_to_next();
      }, interval
    );
  </script>
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
      <div class="mySlides">
        <img src="../images/for_news1.jpg" id="image_1" style="position: absolute;">
        <img src="../images/for_news2.jpg" id="image_2" style="opacity: 0; filter: alpha(opacity=0); position: absolute;">
        <img src="../images/for_news3.jpg" id="image_3" style="opacity: 0; filter: alpha(opacity=0); position: absolute;">
        <img src="../images/for_news4.jpg" id="image_4" style="opacity: 0; filter: alpha(opacity=0); position: absolute;">
      </div>
      <div id="news-block">
      <hr class="top-hr">
      <h1>НОВИНИ КОМПАНІЇ</h1>
      <hr>
      <div class="block">
        <img src="../images/train1.jpg" alt="blockade of russia">
        <div class="date">27.03.2022</div>
        <h2>Залізна блокада росії: країна-агресор більше не має залізничного сполучення з ЄС</h2>
        <div class="text-news">
          Сьогодні, 27 березня, відбудуться останні рейси поїздів Allegro між Санкт-Петербургом і Гельсінкі, які забезпечував фінський оператор поїздів VR.
          «Ми продовжували експлуатувати Allegro відповідно до інструкцій влади, щоб забезпечити доступ до Фінляндії для фінів.
          Протягом цих тижнів люди, які хотіли виїхати з Росії, встигли покинути країну», - повідомив Старший віце-президент з обслуговування пасажирів VR Топі Сімола.
        </div>
      </div>
      <div class="block">
        <img src="../images/train.jpg" alt="evacuation flights">
        <div class="date">26.02.2022</div>
        <h2>Укрзалізниця призначила низку евакуаційних рейсів з Києва на захід України</h2>
        <div class="text-news">
          Просимо пасажирів зберігати спокій на об'єктах інфраструктури залізниці та очікувати наступного рейсу для евакуації з Києва.
          Також інформуємо про тимчасові зміни в розкладі руху приміських поїздів.
          Починаючи з 26 лютого цього року з технічних причин НЕ курсуватиме приміський поїзд №6011/6012 Львів – Трускавець – Львів.
          Починаючи з 27 лютого цього року, тимчасово НЕ курсуватимуть приміські поїзди №6131 Стрий – Самбір та №6134 Самбір – Стрий.
          Просимо пасажирів урахувати тимчасові зміни під час планування подорожей у вказаних сполученнях.
          Слідкуйте за актуальною інформацією на сайті АТ "Укрзалізниця".
        </div>
      </div>
      <div class="block">
        <img src="../images/train3.jpg" alt="evacuation to Сzech">
        <div class="date">26.03.2022</div>
        <h2>Укрзалізниця разом з чеською залізницею призначає додатковий евакуаційний рейс до Чехії</h2>
        <div class="text-news">
          Поїзд №911 Мостиська ІІ - Богумін відправлятиметься зі станції Мостиська 27 березня о 15:15 та прибуватиме в Богумін о 21:26. Проїзд безкоштовний.
          Дістатись станції Мостиська можна електричкою зі Львова - найзручніший рейс відправляється о 09:02, і прибуває на станції Мостиська ІІ об 11:03.
        </div>
      </div>
      <div class="block">
        <img src="../images/evacuation.jpeg" alt="">
        <div class="date">24.03.2022</div>
        <h2>Укрзалізниця здійснила 230 евакуаційних рейсів з Луганщини та Донеччини</h2>
        <div class="text-news">
          За місяць війни Укрзалізниця здійснила 230 евакуаційних рейсів з Луганщини та Донеччини.
          Також Укрзалізниця звертається до жителів українського Донбасу: вивозьте дітей з території бойових дій. Робіть це зараз.
          Дайте нашим захисникам робити свою роботу, не озираючись.
          А ми надійно довезем усіх до безпечного Львова, Ужгорода, Хмельницького або інших міст — ви всюди свої, на вас всюди чекають.
        </div>
      </div>
      <div class="block">
        <img src="../images/attack.jpg" alt="cyber attack">
        <div class="date">23.03.2022</div>
        <h2>Через масову атаку на провайдерів зв'язку онлайн-сервіси з продажу квитків та телефонія Укрзалізниці наразі тимчасово недоступні</h2>
        <div class="text-news">
          Пасажирські дані у безпеці, на рух поїздів ситуація також не вплине.
          Зв'язок із нами можливий через соцмережі та контактний центр
        </div>
      </div>
      <hr>
      <ul class="paging">
        <li><span>1</span></li> —
        <li><a href="news_2.php">2</a></li> —
        <li><a href="news_3.php">3</a></li>
      </ul>
      <hr>
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

</body>
</html>
