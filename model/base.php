<?php
/**
 * Created by PhpStorm.
 * User: wanqianjun
 * Date: 16/10/19
 * Time: 23:19:12
 */
//ini_set("display_errors","off");
$_host = "127.0.0.1";
$_sqlUser = "root";
$_sqlPwd = "wqj9705";
$_sqlDB = "Express";
$sql = new mysqli($_host, $_sqlUser, $_sqlPwd, $_sqlDB);
//$sql->query("set names utf8");
//header("Access-Control-Allow-Origin: *");
define("appId", "wx573174f0dbdb80b2");
define("AppSecret", "986759a218f79dbe22683dfedc94dfa2");
define("redirectURL", "http%3a%2f%2fdq.97qingnian.com%2fapi%2fgetAccess.php");
define("userLevel", [3, 10, 9999]);
define("tax", 1);
define("alertUser", [
    "o2NgYwdiseIwOhdKTGSXFrZawK4I",
    "o2NgYwZNncz3EtcAxEKvChgVt6GU",
    "o2NgYwVzsdtyXb4oONEla9PvzUNs",
    "o2NgYwQqKEx19Mca9T_dt14YYtqI",
    "o2NgYwbgl8vX8Jw_k7XGOIdtlj8M",
    "o2NgYwV2OmouJ3_vOLh0ZX-oqB3Y",
    "o2NgYwZzMC2Em6QciaxQexe2bn0Y",
    "o2NgYwbt5mX3KqwKtWYn3t9_EWZw",
    "o2NgYwdiksILdv24EGvVBNqxNwhE",
    "o2NgYwSziaufBv8PkGHlR0J2XrxU",
    "o2NgYwW2ET2Z0fAEXE6JAo51nS-M",
    "o2NgYwQr4popQw_fo2KZBNI_J9JQ"
]);
//define("alertUser",[]);
define("admin",[
    "o2NgYwdiseIwOhdKTGSXFrZawK4I",
    "o2NgYwZNncz3EtcAxEKvChgVt6GU",
    "o2NgYwVzsdtyXb4oONEla9PvzUNs",
    "o2NgYwQqKEx19Mca9T_dt14YYtqI",
    "o2NgYwbgl8vX8Jw_k7XGOIdtlj8M",
    "o2NgYwV2OmouJ3_vOLh0ZX-oqB3Y",
    "o2NgYwZzMC2Em6QciaxQexe2bn0Y",
    "o2NgYwdiksILdv24EGvVBNqxNwhE"
]);
define("expressLTD",
    "/中通|顺丰|申通|圆通|百事|韵达|天天|中国邮政|EMS|ems|宅急送|德邦|全峰|百世汇通|百世快递/"
);
define("position",
    "/小树林|菜鸟驿站|奥克米|软件园|京东|师大/"
);