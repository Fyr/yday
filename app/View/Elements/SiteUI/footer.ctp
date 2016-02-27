    <div class="row">
        <div class="col-sm-4">
            <div class="name">Свяжитесь с нами</div>
            <?=Configure::read('Settings.title')?><br />
            <?=nl2br(Configure::read('Settings.address'))?><br />
            <?=Configure::read('Settings.phone')?><br />
            Skype: <?=Configure::read('Settings.skype')?><br />
            <a href="mailto:<?=Configure::read('Settings.email')?>"><?=Configure::read('Settings.email')?></a>
        </div>
<?
    foreach($aCategories as $category) {
        $cat_id = $category['Category']['id'];
?>
        <div class="col-sm-2">
            <div class="name"><?=$category['Category']['title']?></div>
<?
            foreach($aProducts[$cat_id] as $article) {
                $this->ArticleVars->init($article, $url, $title);
                echo $this->Html->link($title, $url).'<br />';
            }
?>
        </div>
<?
    }
?>
        <div class="col-sm-2">
            <div class="name">Приложения</div>
            <div class="link"><a href="<?=Configure::read('Settings.app_apple')?>"><img src="/img/apple.png" class="img-responsive" alt="App Store" width="140" /></a></div>
            <div class="link"><a href="<?=Configure::read('Settings.app_google')?>"><img src="/img/google.png" class="img-responsive" alt="Play Market" width="140" /></a></div>
        </div>
        <div class="col-sm-2 developer">
            <div class="dev">Разработка сайта</div>
            <a href="http://kakadu.bz" title="Перейти на сайт разработчика kakadu.bz"><img alt="Разработка сайта: kakadu.bz" src="/img/kakadu.png"></a></div>
    </div>
    <div class="copyright">© 2016 Your Day Karaoke</div>