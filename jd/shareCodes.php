<?php
    // todo... 是否验证IP白名单...
    if (false) {
        // todo... 不是白名单...
        exit();
    }
    else{
        require_once '../mysqlDB/MMysql.php';
        // 开启错误
//        ini_set("display_errors", "On");
//        error_reporting(E_ALL | E_STRICT);

        // 连接数据库
        $shareCodeType = $_GET['shareCodeType'];
        $shareCodesNum = $_GET['shareCodesNum'] ? $_GET['shareCodesNum'] : 10;
        $tableName = "tableName";
        $conf = [
            'host'=>'localhost',
            'port'=>3306,
            'user'=>'',
            'passwd'=>'',
            'dbname'=>'',
        ];
        $mysql = new MMysql($conf);
        switch ($shareCodeType) {
            case "JD_SHARES_CFDL" :
                $tableName = "jd_share_codes_cfdl";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_QDLXJ" :
                $tableName = "jd_share_codes_qdlxj";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_NRJSG" :
                $tableName = "jd_share_codes_nrjsg";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_DDSJ" :
                // 获取字段
                $tableName = "jd_share_codes_ddsj";
                $res = $mysql->field(array('share_code', 'pt_pin'))
                    ->limit($shareCodesNum)
                    ->select($tableName);
                $objArr = [];
                for ($i = 0; $i < sizeof($res); $i++) {
                    $obj['use'] = $res[$i]['pt_pin'];
                    $obj['code'] = $res[$i]['share_code'];
                    $obj['max'] = false;
                    array_push($objArr, $obj);
                }
                $jsonStr = json_encode($objArr);
                echo $jsonStr;
                break;
            case "JD_SHARES_JXGC" :
                $tableName = "jd_share_codes_jxgc";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JXGC_TUAN" :
                $tableName = "jd_share_codes_jxgc_tuan";
                // 执行sql查询我的资料
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_FRUIT" :
                $tableName = "jd_share_codes_fruit";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_HEALTHY" :
                $tableName = "jd_share_codes_healthy";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_DDFACTORY" :
                $tableName = "jd_share_codes_ddfactory";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JDZZ" :
                $tableName = "jd_share_codes_jdzz";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JXHB" :
                $tableName = "jd_share_codes_jxhb";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JXMC" :
                $tableName = "jd_share_codes_jxmc";
                $res = null;
                $type = null;
                $rsName = null;
                if ($_GET['type'] == 'hb') {
                    $type = 'share_red_code';
                    $rsName = 'use';
                } else {
                    $type = 'share_code';
                    $rsName = 'name';
                }
                $res = $mysql->field(array($type, 'pt_pin'))
                    ->limit($shareCodesNum)
                    ->select($tableName);
                $objArr = [];
                for ($i = 0; $i < sizeof($res); $i++) {
                    $obj[$rsName] = $res[$i]['pt_pin'];
                    $obj['code'] = $res[$i][$type];
                    $obj['max'] = false;
                    array_push($objArr, $obj);
                }
                $jsonStr = json_encode($objArr);
                echo $jsonStr;
                break;
            case "JD_SHARES_JXNC" :
                $tableName = "jd_share_codes_jxnc";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_PETS" :
                $tableName = "jd_share_codes_pets";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_PLANT_BEAN" :
                $tableName = "jd_share_codes_plant_bean";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JLHB" :
                $tableName = "jd_share_codes_jlhb";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_SGMH" :
                $tableName = "jd_share_codes_sgmh";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_JDXW" :
                $tableName = "jd_share_codes_jdxw";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_SUPERMARKET" :
                $tableName = "jd_share_codes_supermarket";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            case "JD_SHARES_WISH" :
                $tableName = "jd_share_codes_wish";
                $res = $mysql->field('share_code')
                    ->limit($shareCodesNum)
                    ->select($tableName);

                // 获取字段
                $shareCodes = array_map('array_shift', $res);
                $jsonStr = json_encode($shareCodes);
                echo $jsonStr;
                break;
            default :
        }
        $mysql->close();
    }