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
        switch ($shareCodeType) {
            case "JD_SHARES_CFDL" :
                $tableName = "jd_share_codes_cfdl";
                break;
            case "JD_SHARES_QDLXJ" :
                $tableName = "jd_share_codes_qdlxj";
                break;
            case "JD_SHARES_NRJSG" :
                $tableName = "jd_share_codes_nrjsg";
                break;
            case "JD_SHARES_DDSJ" :
                // 这里开始没有
                $tableName = "jd_share_codes_ddsj";
                break;
            case "JD_SHARES_JXGC" :
                $tableName = "jd_share_codes_jxgc";
                break;
            case "JD_SHARES_JXGC_TUAN" :
                $tableName = "jd_share_codes_jxgc_tuan";
                break;
            case "JD_SHARES_FRUIT" :
                $tableName = "jd_share_codes_fruit";
                break;
            case "JD_SHARES_HEALTHY" :
                $tableName = "jd_share_codes_healthy";
                break;
            case "JD_SHARES_DDFACTORY" :
                $tableName = "jd_share_codes_ddfactory";
                break;
            case "JD_SHARES_JDZZ" :
                $tableName = "jd_share_codes_jdzz";
                break;
            case "JD_SHARES_JXHB" :
                $tableName = "jd_share_codes_jxhb";
                break;
            case "JD_SHARES_JXMC" :
                $tableName = "jd_share_codes_jxmc";
                break;
            case "JD_SHARES_JXNC" :
                $tableName = "jd_share_codes_jxnc";
                break;
            case "JD_SHARES_PETS" :
                $tableName = "jd_share_codes_pets";
                break;
            case "JD_SHARES_PLANT_BEAN" :
                $tableName = "jd_share_codes_plant_bean";
                break;
            case "JD_SHARES_JLHB" :
                $tableName = "jd_share_codes_jlhb";
                break;
            case "JD_SHARES_SGMH" :
                $tableName = "jd_share_codes_sgmh";
                break;
            case "JD_SHARES_JDXW" :
                $tableName = "jd_share_codes_jdxw";
                break;
            case "JD_SHARES_SUPERMARKET" :
                $tableName = "jd_share_codes_supermarket";
                break;
            case "JD_SHARES_WISH" :
                $tableName = "jd_share_codes_wish";
                break;
            default :
                exit();
        }

        $conf = [
            'host'=>'localhost',
            'port'=>3306,
            'user'=>'zhu3woshicao',
            'passwd'=>'nyjnyj8866',
            'dbname'=>'jdsharecodes',
        ];

        $mysql = new MMysql($conf);
        // 执行sql查询我的资料
        $sql = "SELECT share_code FROM $tableName order by id;";
        $all = $mysql->doSql($sql);

        $res = $mysql->field('share_code')
            ->limit($shareCodesNum)
            ->select($tableName);

        // 获取字段
        $shareCodes = array_map('array_shift', $res);
        $jsonStr = json_encode($shareCodes);
        echo $jsonStr;
        // 关闭数据库
        $mysql->close();
    }