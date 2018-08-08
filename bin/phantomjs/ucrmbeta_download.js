

var WebPage = require("webpage"),
    page = WebPage.create(),
    fs = require("fs");

page.open("https://ucrmbeta.docs.apiary.io/#reference", function (status) {

    if (status !== 'success') {

        console.log("ERROR?");

    } else {

        //var content = page.content;
        //console.log(content);
        //<h3 class="row machineColumnTitleText">


        //page.  ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {

            var results = page.evaluate(function () {


                jQuery("h3.row.machineColumnTitleText").forEach(function() {
                    console.log(this.text);
                })

            });
        //});

        console.log(results);

        //var output = "C:\\Users\\rspaeth\\Documents\\PhpStorm\\Projects\\ucrm-plugin-rest\\src\\UCRM\\REST\\Endpoints\\.cache\\test.html";
        //fs.write(output, content, "w");

        console.log("DONE!");
    }

    phantom.exit();
});