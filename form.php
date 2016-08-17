<?php
// Moved this entire section up before any html
session_start();

$config = parse_ini_file("db.ini", true);

$host = $config['database']['host'];
$user = $config['database']['user'];
$pass = $config['database']['pass'];
$dbname = $config['database']['dbname'];

$link = mysql_connect($host, $user, $pass);
mysql_select_db($dbname, $link);

// The combination of explicitly setting a charset, using mysql_real_escape_string(),
// and using single quotes around the variables help protect from SQL injection attacks.
mysql_set_charset('utf8', $link);

$sqlstring = "SELECT name FROM companies";
$result = mysql_query($sqlstring);
while ($row = mysql_fetch_assoc($result)) {
    $companies[] = $row['name'];
}

$_SESSION['name'] = mysql_real_escape_string($_GET['name']);

$sqlstring = "SELECT description FROM companies WHERE name = '{$_SESSION['name']}'";
$result = mysql_query($sqlstring);
$row = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>
<body>
    <center>
    Edit company:
    <select id="company">
        <?php
        foreach ($companies as $company) {
            $selected = $company == $_SESSION['name']
                ? 'selected="selected"'
                : '';
            print "<option $selected>$company</option>";
        }
        ?>
    </select>
    <br><br>

    <form action="formhandler.php" method="post">
        <table border="1">
            <tr>
                <td valign="top">Edit description for company <?php print $_SESSION['name'] ?></td>
                <td><textarea id="description" name="description"><?php print $row['description'] ?></textarea></td>
            </tr>
            <tr><td>Add canned description 1</TD><TD><Img src="pencil.png" class="canned" data-num="1"></td>
            <tr><td>Add canned description 2</td><td><img src="pencil.png" class="canned" data-num="2"></td>
            <tr><td>Add canned description 3</td><td><img src="pencil.png" class="canned" data-num="3"></td>
            <tr><td colspan="2"><center><input type="submit"></td></tr>
        </table>
    </form>
    <script>
        // Define canned text
        var cannedText = [
            'This is an A+ rated company',
            'This is a B rated company',
            'This is a C rated company'
        ];

        // Set up event handlers
        $('#company').on('change', function(evt) {
            var el = $(evt.target);
            location.assign('form.php?name=' + el.val());
        });

        var cannedIcons = $('.canned');
        for (var i = 0; i < cannedIcons.length; i++) {
            cannedIcons.eq(i).on('click', function(evt) {
                addCannedText(evt);
            });
        }

        function addCannedText(evt) {
            var num = $(evt.target).data('num');
            var desc = $('#description');
            var text = cannedText[num-1];
            desc.val(desc.val() + " " + text);
        }
    </script>
</body>
</html>
