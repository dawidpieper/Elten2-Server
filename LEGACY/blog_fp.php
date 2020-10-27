<?php
require("header.php");
require("blog_base.php");
if($_GET['get'] == 1) {
$q = mquery("SELECT blog,postid FROM blogs_postsfollowed WHERE `owner`='" . $_GET['name'] . "'");
echo "0\r\n".mysql_num_rows($q);
while ($r = mysql_fetch_row($q))
echo "\r\n".$r[0]."\r\n".$r[1];
}
if($_GET['add'] == 1) {
if(mysql_num_rows(mquery("SELECT blog,postid FROM `blogs_postsfollowed` where `blog`='".mysql_real_escape_string($_GET['searchname'])."' and `owner`='" . $_GET['name'] . "' and postid=".(int)$_GET['postid']))>0)
die("-3");
mquery("INSERT INTO `blogs_postsfollowed` (owner, blog, postid) VALUES ('".$_GET['name']."','" . mysql_real_escape_string($_GET['searchname']) . "', ".(int)$_GET['postid'].")");
echo "0";
}
if($_GET['remove'] == 1) {
mquery("DELETE FROM `blogs_postsfollowed` WHERE `owner`='" . $_GET['name'] . "' AND `blog`='" . mysql_real_escape_string($_GET['searchname']) . "' and postid=".(int)$_GET['postid']);
echo "0";
}
if($_GET['check'] == 1) {
$c = mysql_num_rows(mquery("SELECT `blog` FROM `blogs_postsfollowed` where `owner`='" . $_GET['name'] . "' and blog='".mysql_real_escape_string($_GET['searchname'])."' and postid=".(int)$_GET['postid']));
echo "0\r\n".$c;
}
?>