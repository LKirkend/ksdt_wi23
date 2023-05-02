<?php
/**
 * Sports Broadcasting Page
 * col-lg mb-2 mt-5 my-lg-5 ms-lg-5 rainbox my-5 ms-1 me-3 w-100
 */


get_header();
?>

<div class="container-flex overflow-x-hidden">
    <div class="row mx-auto w-100 text-center px-2">
        <div class="col-md mt-1 me-lg-5 mx-md-3 mt-sm-3 my-md-5 rainbox w-100" style= "background: var(--transblack2);">
            <h1>Sports Broadcasting</h1>
            <div class="row overflow-scroll flex-nowrap text-center gy-5">
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 "> Men's<br>Baseball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md">  
                    <p class="fs-6 lh-1 ">Women's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Women's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Men's<br>Soccer</p>
                </div>
                <div class="col-3 col-sm-2 col-md"> 
                    <p class="fs-6 lh-1 ">Women's<br>Soccer</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="row">
                    
                </div>
            </div> 
        </div>
        <div class="col-md rainbox mx-auto me-md-3 ms-lg-5 my-2 my-sm-3 my-md-5 w-100" style= "background: var(--transblack2); max-width:600px;"><h1>Video</h1></div>
    </div>
</div>
<?php get_footer(); ?>

<script>
    const eventUrls = [372, 355, 360, 370, 359, 356, 357];
    const allEvents = new Map();

    eventUrls.forEach((eventN, i) => {
        getTextData("http://localhost:8080/services/schedule_txt.ashx?schedule=" + eventN).then((baseball => {
        const entry = /[A-S][a-z]{2}\s[0-9]+.*/g;
        const overall = /Overall\s*[0-9]+-[0-9]+/g;
        const entries = Array.from(baseball.matchAll(entry), (m) => m[0]);
        const total = Array.from(baseball.matchAll(overall), (m) => m[0]);
        allEvents.set(i, [total[0].replace(/  +/g, ' '), splitEntry(entries)]);
        console.log([...allEvents]);
    }));
    });

    function splitEntry(entries){
        const dateMap = new Map();
        const timeMap = new Map();
        const locMap = new Map();
        const resultsMap = new Map();
        const eventMap = new Map();
        var date = /[A-S][a-z]+\s[0-9]+\s\([A-Za-z]+\)/g;
        var time = /[1-9]+:*[0-9]*\s[APM]+|TBD/g;
        var loc = /(Home|Away|Neutral)\s+([A-Za-z‘:,.']+\s)+/g
        var results = /[WLT]\s[0-9]+-[0-9]+|Postponed|Cancelled/g;
        entries.forEach((entry, i) => {
            date.lastIndex=0;
            time.lastIndex=0;
            loc.lastIndex=0;
            results.lastIndex=0;
            dateEntry = date.exec(entry);
            timeEntry = time.exec(entry);
            locEntry = [loc.exec(entry)[0].toString().replace(/(Home|Away|Neutral)\s+/,'').trim()];
            resultsEntry = results.exec(entry);
            
            (dateEntry == null) ? dateMap.set(i, "TBD") : dateMap.set(i, dateEntry[0]); 
            (timeEntry == null) ? timeMap.set(i, "TBD") : timeMap.set(i, timeEntry[0]); 
            (locEntry == null) ? locMap.set(i, "TBD") : locMap.set(i, locEntry[0]); 
            (resultsEntry == null) ? resultsMap.set(i, "TBD") : resultsMap.set(i, resultsEntry[0]); 
            eventMap.set(i, [dateMap.get(i), timeMap.get(i), locMap.get(i), resultsMap.get(i)]);
        });

        return eventMap;
    }

    async function getTextData(theUrl) {
        return await fetch(theUrl, 
        {
            method: 'GET',
            headers: {
                "Target-URL": "https://ucsdtritons.com",
            },
        }).then(response => {
            if (!response.ok) {
                throw new Error("HTTP error " + response.status);
            }
            return response.text();
        }).then(text => {
            return text;
        });
    }

    function displaySchedule(eventMap){

    }
</script>