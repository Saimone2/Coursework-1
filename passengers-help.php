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
    <div id="passengers-help-block">
      <h1>ДОВІДКА ПАСАЖИРАМ</h1>
      <h2>Популярні питання користувачів з короткими відповідями.</h2>
      <hr>
      <div class="help">
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Залізничні квитки онлайн</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">Квитки, які Ви отримуєте після оплати на сайті - це повноцінні проїзні документи, які дають право проїзду на потягу Укрзалізниці. Квитки бувають 2 видів: електронні та з відкладеним друком.</div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Документи, необхідні для поїздки</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">
  <p>Обмін квитка відкладеної друку:
  <li> без документа, який підтверджує особу.</li>
  </p>
  <p>Посадка в поїзд - з документом, який підтверджує особу:
  <li> паспорт;</li>
  <li> закордонний паспорт;</li>
  <li> свідоцтво про народження (для дітей до 14 років);</li>
  <li> посвідчення водія;</li>
  <li> військовий квиток (на час служби);</li>
  <li> посвідчення біженця.</li>
  </p>
          </div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Перевезення багажу</span>
            <a class="arrow-to-down"></a>
          </div>
            <div class="cl-answer-text hidden">Пасажир має право перевозити з собою багаж вагою до 36 кг.</div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Перевезення тварин</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">
<p>Собаки:
<li> перевезення тварин здійснюється за наявності ветеринарного документа та електронного квитка для перевезення тварини (потрібно поставити відмітку про перевезення тварини під даними пасажира);</li>
<li> собак малих порід необхідно перевозити в сумці з водонепроникним дном. Також тварин можна перевозити в вагонах СВ при умові викупу всіх місць в купе;</li>
<li> собак великих порід (вище 45 см) перевозять в наморднику та на повідку, в окремому купе, в якому власнику тварини необхідно викупити всі 4 місця.</li>
</p>
<p>Кішки:
<li> котів перевозять в спеціальних ящиках, корзинах, клітках з водонепроникним дном. Для перевезення необхідно оформити квитанцію на перевезення тварини (поставити відмітку про перевезення тварини під даними пасажира). Один пасажир може перевозити одного кота.</li>
</p>
<p>Птахи:
<li> дрібні кімнатні тварини та кімнатні декоративні птахи (не більше двох особин) перевозяться в ящиках, корзинах, клітках або контейнерах із водонепроникним дном (не більше одного місця ручної поклажі).</li>
</p>
        </div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Оплата</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">Оплата здійснюється онлайн банківськими картками VISA / MASTER CARD / MAESTRO.</div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Електронний квиток</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">Це проїзний документ, який не потрібно обмінювати у касі. З ним необхідно відразу йти на посадку до вагону потяга.</div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Проїзд дітей</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">Для проїзду дітей УкрЗалізниця впровадила знижки. Розмір знижки залежить від віку дитини, який саме - можна побачити після того, як Ви вкажете вік дитини і додасте квиток в кошик. Квиток на дитину дійсний тільки у випадку, якщо Ви надасте документ, який підтверджує вік дитини, при посадці в поїзд. Проїзд дітей до 6 років - безкоштовний, без надання окремого місця. Від 6 до 14 - знижка. Від 14 років - повна вартість квитка. При проїзді більше 2-х дітей до 6-ти років на одного дорослого пасажира - необхідно купити квиток на окреме місце.</div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Правила посадки в потяги з 21.10.2021</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">
<p>Відповідно до постанови Кабінету міністрів України, з 21.10.2021 пасажири віком від 18 років при посадці в потяг, автобус або літак повинні пред'явити один з наступних документів:
<li> негативний ПЛР-тест (зроблений не раніше як за 72 год до здійснення поїздки);</li>
<li> негативний експрес-тест на визначення антигена (зроблений не раніше як за 72 год до здійснення поїздки);</li>
<li> документ, що підтверджує отримання повного курсу вакцинації;</li>
<li> документ, що підтверджує отримання однієї дози дводозної вакцини;</li>
<li> міжнародний, внутрішній чи іноземний сертифікат, що підтверджує вакцинацію від COVID-19 однією дозою дводозної вакцини (жовті сертифікати) або однією дозою однодозної вакцини чи двома дозами дводозної вакцини (зелені сертифікати);</li>
<li> документ про одужання, чинність якого підтверджена за допомогою Єдиного державного веб порталу електронних послуг, зокрема з використанням мобільного додатка Порталу Дія (Дія).</li></p></div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Повернення проїзних документів</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">
<p>Якщо пасажир відмовився від поїздки з особистих причин у термін:

<li> не менше ніж за 24 години до відправлення поїзда, то йому виплачується повна вартість квитка і плацкарти;</li>

<li> від 24 до 9 годин до відправлення поїзда, то йому виплачується повна вартість квитка і 50 відсотків вартості плацкарти;</li>

<li> менше ніж за 9 годин до відправлення поїзда виплачується повна вартість квитка, а вартість плацкарти не виплачується;</li>

<li> після відправлення поїзда, але не більше ніж через годину після його відправлення, виплачується 10 відсотків вартості квитка і плацкарти.</li>

<li> Пізніше 1 години після відправлення поїзда, на який оформлено проїзний документ, повернення платежів не проводиться.</li></p></div>
        </div>
        <div class="help-item">
          <div class="help-item-list">
            <span class="question-text">Верхнє/нижнє місце</span>
            <a class="arrow-to-down"></a>
          </div>
          <div class="cl-answer-text hidden">У поїздах УкрЗалізниці верхнє/нижнє місце нумерується таким чином: парні номери - верхні, не парні - нижні.</div>
        </div>
      </div>
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

    Array.from(document.querySelectorAll('.help-item-list'), function (elem)
    {
      elem.addEventListener('click', function hideContent(cont)
      {
        cont.currentTarget.parentNode.querySelector('.help-item-list').classList.toggle('active');
        cont.currentTarget.parentNode.querySelector('.cl-answer-text').classList.toggle('hidden');
      });
    });

</script>

</body>
</html>
