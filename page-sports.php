<?php
/**
 * Sports broadcasting page
 * 
 * Proxy server required to work. Code for it is located in /js/proxydist/, README shows how to use. 
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
        <div class="col-md-8 order-md-1 order-5 mt-1 px-0 e-lg-5 my-2 mx-md-3 mt-sm-3 my-md-5 rainbox" style= "background: var(--transblack2);">
            <h1 class="mt-3 mb-4">Sports Schedule</h1>
            <div class="row overflow-x-auto w-100 mx-auto overflow-y-none flex-nowrap text-center gy-5" id="tabs">
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(0)"> 
                    <p id="tab-0" class="">Men's<br>Baseball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(1)"> 
                    <p id="tab-1" class="">Men's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(2)">  
                    <p id="tab-2" class="">Women's<br>Basketball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(3)"> 
                    <p id="tab-3" class="">Men's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(4)"> 
                    <p id="tab-4" class="">Women's<br>Volleyball</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(5)"> 
                    <p id="tab-5" class="">Men's<br>Soccer</p>
                </div>
                <div class="col-3 col-sm-2 col-md sports-tab" onclick="changeSchedule(6)"> 
                    <p id="tab-6" class="">Women's<br>Soccer</p>
                </div>
            </div>
            <div class="container-flex text-center mb-3" id="info" style="min-height:750px"></div> 
        </div>
        <div class="col-md-3 order-md-5 order-1 rainbox px-0 mx-auto me-md-3 my-2 my-sm-3 my-md-5" style= "background: var(--transblack2); max-width:250px; max-height:285px;">
            <div class="row">
                <div class="col">
                    <h1>Listen</h1>
                </div>                      
                <div class="play-btn col-5 m-auto w-100">
                    <img id="radio-toggle" src='<?php echo get_stylesheet_directory_uri() . "/img/logos/playbutton.svg"?>' onclick="togglePlay()" class="play-button mb-3 my-auto mx-auto w-100" onerror="this.classList.add('play-button2');">
                </div>
            </div>
        </div>
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
     * @desc Changes which schedule is displayed
     */
    async function changeSchedule(eventInd){
        let defer = $.Deferred(),
        filtered = defer.then(() => displaySchedule(eventInd));
        clearSchedule(defer);
    }

    function changeColor(eventInd){
        for(var i = 0; i < 7; i++){
            var tab = document.getElementById("tab-" + i);
            (i == eventInd) ? tab.classList.add("tab-pink") : tab.classList.remove("tab-pink");
        }
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
        changeColor(eventInd);
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
	console.log("Hitting local");
        return await getTextData("http://localhost:406/services/schedule_txt.ashx?schedule=" + eventUrls[eventInd]).then((event => {
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
        const overallDiv = (document.getElementsByClassName("event-overall").length != 0) ? document.querySelectorAll(".event-overall") : null;
        const rowDivs = (document.getElementsByClassName("schedule-game").length != 0) ? document.querySelectorAll(".schedule-game") : null;

        if(overallDiv){for(const overall of overallDiv){overall.remove();}} // Null check
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
