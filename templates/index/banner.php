<div style="float: left;margin-right: 5px;">
    <?php
    $result = db()->query('SELECT img, link, target FROM banners WHERE activity = \'1\' order by RAND() LIMIT 1');
    if($result->rowCount()) {
        $baner = $result->fetch();
        if(empty($baner['link'])) {?>
            <img class="border-box" style="padding: 0;" src="<?php echo $baner['img'];?>" width="300" height="248" alt="board" />
        <?php }else{?>
            <a href="<?=$baner['link'];?>" target="<?=$baner['target']?>">
                <img class="border-box" style="padding: 0;" src="<?php echo $baner['img'];?>" width="300" height="248" alt="board" />
            </a>
        <?php	}}?>
</div>