<?php get_header();?>

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
        const resultsMap =  new Map();
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

    
</script>
<?php get_footer();?>