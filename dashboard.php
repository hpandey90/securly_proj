<?php
if(!isset($_COOKIE['user_name'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="js/dashboard_v1.js"></script>
    <link rel="stylesheet" href="./css/dashboard_v1.css">
</head>
<body>
<div class="login"><h1 align="center">ADMIN DASHBOARD</h1></div>
<div class="login">
    <div>
        <div style="float:left;width:33%">
            <h3>Search Email</h3>
                <div id="err_1"></div>
                <input type="text" name="email" id="email" placeholder="email"/>
                <button type="button" name ="search"  class="btn btn-primary btn-block btn-large" onclick="check_form(1);">Search</button>
        </div>
        <div style="float:left;width:33%">
            <h3>Search Club</h3>
            <div id="err_2"></div>
            <input type="text" name="club" id="club" placeholder="club"/>
            <button type="button" name ="search"  class="btn btn-primary btn-block btn-large" onclick="check_form(2);">Search</button>
        </div>
        <div style="float:left;">
            <h3>Find Connection</h3>
            <div id="err_3"></div>
            <input type="text" name="kid1" id="kid1" placeholder="Kid1 email"/>
            <input type="text" name="kid2" id="kid2" placeholder="Kid2 email"/>
            <button type="button" name ="search"  class="btn btn-primary btn-block btn-large" onclick="check_form(3);">Search</button>
        </div>
    </div>
    <div style="clear:both;margin-top:5%">
        <div style="float:left;width:50%;">
            <h3 align="center">Response of Search</h3>
            <div id="response"></div>
            <div id="loader" style="display:none"><img src="images/loader.gif" width="10%"/></div>
        </div>
        <div style="float:left;width:50%;">
            <h3 align="center">History of Queries</h3>
            <ul id="list_history"></ul>
        </div>
    </div>
</div>
</body>
</html>