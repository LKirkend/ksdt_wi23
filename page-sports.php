<?php
/**
 * Sports broadcasting page
 * 
 * 
 * 
 * Authors: Logan Kirkendall, Zach Lawrence, Catherine Zhang, Christine Nguyen, Chloe Keggen
 * 
 * TODO:  
 *  Style 
 *  Refactor 
 * 
 * @author Logan Kirkendall
 */

get_header();
?>

<div class="container-flex overflow-x-hidden">
    <div class="row mx-auto w-100 text-center px-2">
        <div class="col-md mt-1 me-lg-5 mx-md-3 mt-sm-3 my-md-5 rainbox w-100" style= "background: var(--transblack2);">
            <h1 class="mt-3 mb-4">Sports Broadcasting</h1>
            <div class="row overflow-scroll flex-nowrap text-center gy-5" id="tabs">
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(0)"> 
                    <p > Men's<br>Baseball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(1)"> 
                    <p >Men's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(2)">  
                    <p >Women's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(3)"> 
                    <p >Men's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(4)"> 
                    <p >Women's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(5)"> 
                    <p >Men's<br>Soccer</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(6)"> 
                    <p >Women's<br>Soccer</p>
                </div>
            </div>
            <div class="container-flex text-center" id="info" style="min-height:750px"></div> 
            
        </div>
        <div class="col-md rainbox mx-auto me-md-3 my-2 my-sm-3 my-md-5 w-100" style= "background: var(--transblack2); max-width:250px; max-height:250px;"><h1>Listen</h1></div>
    </div>
</div>
<?php get_footer(); ?>

<script>
    const eventUrls = [372, 355, 360, 370, 359, 356, 357];
    const allEvents = new Map();
    const infoDiv = document.getElementById('info');
    { // Init
        let defer = $.Deferred(),
        filtered = defer.then(() => displaySchedule(0));
        getSchedules(defer);
    }

    /**
     * @desc
     */
    async function changeSchedule(eventInd){
        let defer = $.Deferred(),
        filtered = defer.then(() => displaySchedule(eventInd));
        clearSchedule(defer);
    }
    /** 
     * @desc Displays the desired schedule of the user, based on which game tab is clicked. Clears then inserts data into the schedule.
     * @param The given index (0-6) of the event
     * @return nothing
     */
    async function displaySchedule(eventInd){
        
        const event = allEvents.get(eventInd)[1];

        // Insert Overall score
        const overallText = document.createTextNode(allEvents.get(eventInd)[0]);
        const overallDiv = document.createElement("div");
        overallDiv.classList.add("event-overall");
        overallDiv.id = "overall-" + eventInd;
        overallDiv.appendChild(overallText); 
        infoDiv.appendChild(overallDiv);

        // Insert top tags

        insertRow(["Date", "Time", "Location", "Result"])

        // Add each game in the sport
        event.forEach((game) => {
            // Create div elements 
            insertRow(game);
        });
    }

    function insertRow(game){
        const rowDiv = document.createElement("div");
        rowDiv.classList.add("row");
        rowDiv.classList.add("mx-auto");
        rowDiv.classList.add("schedule-game");

        const dateDiv = document.createElement("div");
        dateDiv.classList.add("col"); dateDiv.classList.add("game-date"); dateDiv.classList.add("px-0");
        const timeDiv = document.createElement("div");
        timeDiv.classList.add("col"); timeDiv.classList.add("game-time");timeDiv.classList.add("px-0");
        const locationDiv = document.createElement("div");
        locationDiv.classList.add("col"); locationDiv.classList.add("game-location");locationDiv.classList.add("px-0");
        const resultDiv = document.createElement("div");
        resultDiv.classList.add("col"); resultDiv.classList.add("game-result");resultDiv.classList.add("px-0");

        // Get vals
        const date = game[0];
        const time = game[1];
        const location = game[2];
        const result = game[3];

        // Insert data into divs
        const dateText = wrapDiv(document.createTextNode(date), "span");
        const timeText = wrapDiv(document.createTextNode(time), "span");
        const locationText = wrapDiv(document.createTextNode(location), "span");
        const resultText = wrapDiv(document.createTextNode(result), "span");

        dateDiv.appendChild(dateText);
        timeDiv.appendChild(timeText);
        locationDiv.appendChild(locationText);
        resultDiv.appendChild(resultText);
        
        // Create the structure
        rowDiv.appendChild(dateDiv);
        rowDiv.appendChild(timeDiv);
        rowDiv.appendChild(locationDiv);
        rowDiv.appendChild(resultDiv);

        // Insert into document
        infoDiv.appendChild(rowDiv);
    }
    /**
     * @desc Gets the desired triton sports schedules, and stores them into the allEvents map
     * @param A synchronous deferred object, where deferred.then() runs after deferred.resolve() is executed. 
     * @return none
     */
    async function getSchedules(deferred){
        
        for(var i = 0; i < eventUrls.length; i++) {
            allEvents.set(i, await sortSchedule(i));
        }
        deferred.resolve();
    }
    /**
     * @desc Helper function that separates entries in a sports schedule page 
     */
    async function sortSchedule(eventInd){
        return await getTextData("http://localhost:8080/services/schedule_txt.ashx?schedule=" + eventUrls[eventInd]).then((event => {
                const entry = /[A-S][a-z]{2}\s[0-9]+.*/g;
                const overall = /Overall\s*[0-9]+-[0-9]+/g;
                const entries = Array.from(event.matchAll(entry), (m) => m[0]);
                const total = Array.from(event.matchAll(overall), (m) => m[0]);
                return [total[0].replace(/  +/g, ' '), splitEntry(entries)];
            }));
    }
    /**
     * @desc Runs regEx on each line of the plaintext page to sort individual event data 
     * @param entries: An array of entries for each sporting event 
     * @return a Map with stores each game of an event with their corresponding data.
     */
    function splitEntry(entries){
        const eventMap = new Map();
        var date = /[A-S][a-z]+\s[0-9]+\s\([A-Za-z]+\)/g;
        var time = /[1-9]+:*[0-9]*\s[APM]+|TBD/g;
        var loc = /(Home|Away|Neutral)\s+([A-Za-z‘:,.']+\s)+/g
        var results = /[WLT]\s[0-9]+-[0-9]+|Postponed|Cancelled/g;

        entries.forEach((entry, i) => {
            // Reset the regex index, as it will otherwise return null the second time (iterative index)
            date.lastIndex=0;
            time.lastIndex=0;
            loc.lastIndex=0;
            results.lastIndex=0;

            // Run regex on entry to get data
            var dateEntry = date.exec(entry);
            var timeEntry = time.exec(entry);
            var locEntry = loc.exec(entry);
            var resultsEntry = results.exec(entry);
            
            // Parse to TBD if null
            (dateEntry == null) ? dateEntry = "TBD" : dateEntry = dateEntry[0]; 
            (timeEntry == null) ? timeEntry = "TBD" : timeEntry = timeEntry[0]; 
            (locEntry == null) ? locEntry = "TBD" : locEntry = locEntry[0].toString().replace(/(Home|Away|Neutral)\s+/,'').trim(); 
            (resultsEntry == null) ? resultsEntry = "TBD" : resultsEntry = resultsEntry[0];
        
            // Add data to event map
            eventMap.set(i, [dateEntry, timeEntry, locEntry, resultsEntry]);
        });

        return eventMap;
    }

    /**
     * @desc Pulls plaintext data from the UCSD Tritons sports page requested (Using a nodejs local proxy server)
     * @param theUrl: a string containing the page in which to request plaintext from
     * @return The plaintext received from the queried page
     */
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

    /**
     * @desc Helper function that clears the overall results and each game entry from the calendar.
     */
    async function clearSchedule(deferred){
        const overallDiv = (document.getElementsByClassName("event-overall").length != 0) ? document.querySelectorAll(".event-overall")[0] : null;
        const rowDivs = (document.getElementsByClassName("schedule-game").length != 0) ? document.querySelectorAll(".schedule-game") : null;

        if(overallDiv){overallDiv.remove();} // Null check
        if(rowDivs){
            for(let row of rowDivs){
                await row.remove();
            }
        } // Null check
        if(deferred){deferred.resolve();}
    }

    function wrapDiv(child, type){
        const parent = document.createElement(type);
        parent.appendChild(child);
        return parent;
    }
</script>