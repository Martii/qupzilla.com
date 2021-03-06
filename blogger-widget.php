<?php
require_once('app/bootstrap.php');
?>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
<style>
.feedTitle { font-size: 12pt; font-weight: bold; }
.feedTitle a { text-decoration: none; }
.feedContent { margin-top: 5px; margin-bottom: 10px; }
</style>
</head>
<body style="background: #e5e5e5; width:320px; margin:3px; padding:0;" class="blw">
<div style="background: #e5e5e5; font-size:85%;">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
$.get("blogger-feed.php", function (data) {
    var out = "";
    var i = 0;
    $(data).find("item").each(function () {
        if (i++ > 4) {
            return false;
        }
        var el = $(this);
        out += "<div class='feedTitle'>";
        out += "<a href='" + el.find("link").get()[0].nextSibling.data + "' target='_blank'>";
        out += el.find("title").text();
        out += "</a></div>";

        out += "<div class='feedContent'>";
        out += $("<div/>").html(el.find("description").text().substr(0, 200)).text();
        out += "</div>";
    });
    $('#feedControl').html(out);
});
</script>

<span id="feedControl"><?php echo $LANG["feed_loading"]; ?></span>
</div>
</body>
</html>
