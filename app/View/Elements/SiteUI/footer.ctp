    <div class="row">
        <div class="col-sm-3">
            <div class="name">Свяжитесь с нами</div>
            <?=Configure::read('Settings.title')?><br />
            <?=nl2br(Configure::read('Settings.address'))?><br />
            <?=Configure::read('Settings.phone')?><br />
            Skype: <?=Configure::read('Settings.skype')?><br />
            <a href="mailto:<?=Configure::read('Settings.email')?>"><?=Configure::read('Settings.email')?></a>
        </div>
        <div class="col-sm-3">
            <div class="name">Виртуальные пакеты</div>
            <ul class="packets">
                <li><a href="#">Virtual START</a></li>
                <li><a href="#">Virtual Start PLUS</a></li>
                <li><a href="#">Virtual HOME</a></li>
                <li><a href="#">Virtual Home PLUS</a></li>
                <li><a href="#">Virtual CLUB</a></li>
                <li><a href="#">Virtual CLUB PLUS</a></li>
                <li><a href="#">Virtual FULL</a></li>
                <li><a href="#">Virtual FULL PLUS</a></li>
            </ul>
        </div>
        <div class="col-sm-2">
            <div class="name">Караоке системы</div>
            <a href="#">Lite</a><br />
            <a href="#">Home</a><br />
            <a href="#">Professional</a>
        </div>
        <div class="col-sm-2">
            <div class="name">Приложения</div>
            <div class="link"><a href="<?=Configure::read('Settings.app_apple')?>"><img src="/img/apple.png" class="img-responsive" alt="App Store" width="140" /></a></div>
            <div class="link"><a href="<?=Configure::read('Settings.app_google')?>"><img src="/img/google.png" class="img-responsive" alt="Play Market" width="140" /></a></div>
        </div>
        <div class="col-sm-2 developer">
            <div class="dev">Разработка сайта</div>
            <a href="http://kakadu.bz"><img alt="Разработка сайта: kakadu.bz" src="/img/kakadu.png"></a>
        </div>
    </div>
    <div class="copyright">© 2016 Your Day Karaoke</div>