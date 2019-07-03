<?php
if(!$news_main = cache()->get('news_main')) {
    $query = 'SELECT sid,title,`time`,hometext,bodytext FROM stories ORDER BY sid DESC LIMIT 0,10';
    $result = db()->query($query);
    if($result->rowCount()) {
        ob_start();
        ?>
        <table width="100%" style="border:1px solid #AAA;">
            <tr>
                <td bgcolor="#e1eaff" style="border:1px solid #AAA; height: 20px; padding: 5px;">
                    <h2>Статьи о свинге и свингерах</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <table border="0">
                        <?php while ($row = $result->fetch()) {?>
                            <tr>
                                <td height="1" bgcolor="#336699"></td>
                            </tr>
                            <tr>
                                <td valign="top" align="left" bgcolor="#e1eaff"  style="padding: 5px;">
                                    <h2><?=$row['title'];?></h2>
                                    <?=$row['time']?>
                                </td>
                            </tr>
                            <tr>
                                <td height="1" bgcolor="#336699"></td>
                            </tr>
                            <tr>
                                <td valign="top" align="left"><?php echo str_replace('http://swing-kiska.ru/','/',imgart($row['hometext']));?></td>
                            </tr>
                            <?php
                            if(!empty($row['bodytext'])) {?>
                                <tr>
                                    <td><a href="/viewstory_<?=$row['sid']?>"><b>Читать далее...</b></a></td>
                                </tr>
                            <?php	}}?>
                        <tr>
                            <td colspan="2" height="1" bgcolor="#336699"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <?php
        $news_main = ob_get_clean();
        cache()->set('news_main', compress($news_main));
    }else {
        $news_main = '<>Записей нет.';
    }
}
echo $news_main;