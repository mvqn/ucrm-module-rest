<?php
declare(strict_types=1);

namespace UCRM\REST;



final class Scraper
{

    private const PHANTOMJS_PATH = __DIR__."/../../../bin/phantomjs/phantomjs.exe";

    private const PHANTOMJS_SAVE = __DIR__ . "/../../../bin/phantomjs/download.js";

    //phantomjs.exe save_page.js "https://ucrmbeta.docs.apiary.io/#reference/services/clientsservices/get" > "../../src/UCRM/REST/Endpoints/.cache/test.html"


    public static function download(string $url, string $path = null): string
    {
        $exe = realpath(self::PHANTOMJS_PATH);
        $jss = realpath(self::PHANTOMJS_SAVE);

        $cmd = "$exe $jss \"$url\" > \"$path\"";

        echo $cmd."\n";

        exec($cmd);


        return "";

    }







}
