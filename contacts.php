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
    <div id="contacts-block">
      <h1>АВІАКВИТКИ. ДОПОМОГА ПАСАЖИРАМ</h1>
      <div class="main-info">
        <p>Звернення, які містять заклики до розпалювання національної, расової, релігійної ворожнечі чи застосована  ненормативна лексика та у разі якщо заявник вдається до образ <b>НЕ РОЗГЛЯДАЮТЬСЯ</b>.</p>
        <p>Питання, в тому числі стандартні, відповіді на які є на сайті, <b>НЕ РОЗГЛЯДАЮТЬСЯ</b>.
        <p>Для отримання оперативної відповіді з питань <b>ПРОДАЖУ ТА ПОВЕРНЕННЯ КВИТКІВ ЧЕРЕЗ ІНТЕРНЕТ</b> та щодо роботи систем необхідно звернутися на «гарячу» лінію чи на е-mаil: <a href="mailto:1railroad.ua@gmail.com">1railroad.ua@gmail.com</a>.</p>
        <p>Розміщена Вами інформація розглядається фахівцями. На розгляд інформації потрібен деякий час. Відповідь буде відправлена на вказану Вами електронну адресу.</p>
      </div>
      <div class="contacts-block-wrap">
        <div class="contacts-info">
          <h2 class="h2">Наші Контакти</h2>
          <div class="contacts-info-div">
            <p class="contacts-info-departments">Call центр</p>
            <img src="../images/phone.jpg" alt="phone">
            <p class="contacts-block-tel">Телефон:
              <a href="tel:380444904975">+38(044)000-00-00</a>
            </p>
          </div>
        </div>
        <div class="contacts-block-contactform">
          <div class="contacts-block-contactform-wrap">
            <h2 class="h2">Зв'яжіться з нами</h2>
            <p class="contacts-block-descriptiontext">Залишилися питання? Заповніть форму зворотнього зв'язку і наші фахівці зв'яжуться з вами найближчим часом:</p>
            <form action="../validation-form/feedback.php" method="post">
              <div class="contactform">
                <input type="text" name="name" placeholder="Ім'я*" id="name-input">
                <div class="for-input-span1"></div>
              </div>
              <div class="contactform">
                <input type="phone" name="phone" placeholder="Телефон">
              </div>
              <div class="contactform">
                <input type="email" name="email" placeholder="E-mail*" id="email-input">
                <div class="for-input-span2"></div>
              </div>
              <div class="contactform">
                <textarea class="field-textarea" rows="3" name="message" colls="30" placeholder="Текст повідомлення*" id="text-input"></textarea>
                <div class="for-input-span3"></div>
              </div>
              <div class="contactform-button">
                <button type="submit" class="reg-btn">Відправити</button>
              </div>
            </form>
          </div>
        </div>
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
    };

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

    let reg2 = /[А-яа-яa-zA-Z0-9]{2,25}/;
    let reg4 = /.{1,500}/;

    let inp1 = document.querySelector('#name-input');
    let inp2 = document.querySelector('#email-input');
    let inp3 = document.querySelector('#text-input');
    let span1 = document.querySelector('.for-input-span1');
    let span2 = document.querySelector('.for-input-span2');
    let span3 = document.querySelector('.for-input-span3');

    document.querySelector('.reg-btn').onclick = function(e)
    {
      if(document.getElementById("name-input").value === '')
      {
        notValid(inp1, span1, "*Заповніть обов'язкове поле");
        e.preventDefault();
      }
      else
      {
        if(!validate(reg2, inp1.value))
        {
          notValid(inp1, span1, 'Введіть не менше 2 символів');
          e.preventDefault();
        }
        else
        {
          valid(inp1, span1, '');
        }
      }

      if(document.getElementById("email-input").value === '')
      {
        notValid(inp2, span2, "*Заповніть обов'язкове поле");
        e.preventDefault();
      }
      else
      {
        if(!validate(reg1, inp2.value))
        {
          notValid(inp2, span2, 'Будь ласка, ведіть коректну адресу електронної пошти');
          e.preventDefault();
        }
        else
        {
          valid(inp2, span2, '');
        }
      }

      if(!validate(reg4, inp3.value))
      {
        notValid(inp3, span3, "*Заповніть обов'язкове поле");
        e.preventDefault();
      }
      else
      {
        valid(inp3, span3, '');
      }
    };

</script>

</body>
</html>
