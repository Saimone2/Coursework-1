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
    <div id="info-block">
          <h1>КУПИТИ КВИТОК НА ПОЇЗД ОНЛАЙН В УКРАЇНІ</h1>
          <div class="main-info">
            <p>Забудьте про черги в касах! Ми підготували актуальний розклад поїздів, де відображені актуальні відомості по відправленню поїздів і наявності вільних місць. Ми створили додаток ЖД квитки онлайн, за допомогою якого ви зможете запланувати поїздку в будь-якому напрямку на комфортну дату.</p>
            <p>Пересувайтесь по Україні або робіть подорожі закордон, бронюючи квитки в режимі онлайн, не залишаючи власного будинку. Після установки броні на вибрані місця і їх оплати вам залишиться пред'явити їх при відправленні в якості проїзного документа. Мінімум формальностей для вашого спокою!</p>
            <p>Для реєстрації на поїзд в Україні тепер достатньо роздрукувати електронний квиток і пред'явити його провіднику або просто показати його на екрані вашого смартфона. Економте свій час і бережіть нерви, відмовившись від простоювання в чергах в залізничні каси.</p>
          </div>
          <h2 class="h2">Основні переваги</h2>
          <div class="advantages-block-list-wrap">
            <ul class="advantages-block-list constructor-block-wrap">
              <li class="advantages-block-item li-hover-time-is-for-use">
                <div class="advantages-block-item-wrap">
                  <div class="advantages-block-item-img1">
                    <div class="advantages-block-item-img-wrap">
                      <img src="../images/team-management.png" alt="Висококваліфікований персонал">
                    </div>
                  </div>
                  <div class="advantages-block-item-text">
                    <div class="advantages-block-item-header">Висококваліфікований персонал</div>
                    <div class="advantages-block-item-content">Власні курси підвищення кваліфікації, які проходять всі наші фахівці – гарантія того, що з нами працюють професіонали в галузі туризму. Понад 400 співробітників, компетентна підтримка клієнтів в режимі 24/7, в усіх регіонах України.</div>
                  </div>
                </div>
              </li>
              <li class="advantages-block-item li-hover-time-is-for-use">
                <div class="advantages-block-item-wrap">
                  <div class="advantages-block-item-img1">
                    <div class="advantages-block-item-img-wrap">
                      <img src="../images/sertif.png" alt="Більше 20 років успішної роботи">
                    </div>
                  </div>
                  <div class="advantages-block-item-text">
                    <div class="advantages-block-item-header">Більше 20 років успішної роботи</div>
                    <div class="advantages-block-item-content">Повний портфель тревел-послуг, прямі контракти з надійними постачальниками – туроператорами, готелями, транспортними компаніями – дозволяють забезпечувати клієнтів ексклюзивними цінами і оперативно вирішувати будь-які питання.</div>
                  </div>
                </div>
              </li>
              <li class="advantages-block-item li-hover-time-is-for-use">
                <div class="advantages-block-item-wrap">
                  <div class="advantages-block-item-img1">
                    <div class="advantages-block-item-img-wrap">
                      <img src="../images/mitka.png" alt="Широке регіональне покриття">
                    </div>
                  </div>
                  <div class="advantages-block-item-text">
                    <div class="advantages-block-item-header">Широке регіональне покриття</div>
                    <div class="advantages-block-item-content">Ми подбали про те, щоб тревел-агент завжди знаходився поруч, і відкрили для вас 40+ офісів в Україні і не тільки. Переступивши поріг одного з них, можете бути впевненими, що запланована мандрівка пройде на вищому рівні, без зайвих турбот.</div>
                  </div>
                </div>
              </li>
              <li class="advantages-block-item li-hover-time-is-for-use">
                <div class="advantages-block-item-wrap">
                  <div class="advantages-block-item-img1">
                    <div class="advantages-block-item-img-wrap">
                      <img src="../images/support.png" alt="Надання супутніх послуг">
                    </div>
                  </div>
                  <div class="advantages-block-item-text">
                    <div class="advantages-block-item-header">Надання супутніх послуг</div>
                    <div class="advantages-block-item-content">Активне зростання мережі викликало необхідність у масштабуванні бізнесу. Щоб пропонувати клієнтам повний спектр тревел-послуг, ми відкрили супутні компанії, що займаються вантажоперевезеннями і страхуванням.</div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
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
