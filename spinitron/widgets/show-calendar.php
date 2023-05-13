<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$totalShows = 12;
$result = $client->search('shows', ['count' => $totalShows]);
$count = 1;
foreach ($result['items'] as $show): ?>
<?php
    //print_r($client->getPersonaFromShow($show));
?>
    <div class="row">
        <div class="col-sm-5 text-center text-sm-start w-100 w-sm-auto">
            <div class="row">
                <div class="col">
                    <span class="next-time">
                        <?= (new DateTime($show['start']))
                        ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))
                        ->format('h:ia') ?>
                    </span>
                </div> 
            </div>
            <?php if($count==1){ ?>
                <div class="row"><div class="col"><img id="broadcast-wave"></div></div>
            <?php } ?>
        </div>
        <div class="col-sm text-center text-sm-start">
            <div class="row">
                <div class="col">
                    <span class="next-show ms-2 w-auto">
                        <b><a href="https://spinitron.com/KSDT/show/<?=$show['id']?>" target="_blank" rel="noreferrer noopener">
                            <?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?>
                        </a></b> 
                        <span class="next-with">with</span>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="ms-2 next-dj">
                        <?= htmlspecialchars($client->getPersonaFromShow($show), ENT_NOQUOTES) ?>
                    </span>
                </div>
            </div>
        </div>
        <br>
        <?php if($count != $totalShows){ ?>
            <hr class="my-2">
        <?php } ?>
    </div>
    <?php $count += 1; ?>
<?php endforeach ?>

<script>
    //Time difference is wonky for the whole week for some reason; I think it has to do with timezone issues
    //Whole week coverage is YYYY-MM-DD(i)T15:00:00-0700 -> YYYY-MM-DD(i+4)T07:00:00-0700
    getTextData("http://localhost:8080/KSDT/calendar-feed?start=2023-05-09T15:00:00-0700&end=2023-05-13T07:00:00-0700").then((event=>{
        const calendarMap = mapProgramSchedule(JSON.parse(event))
        console.log(calendarMap)
    }));
    function mapProgramSchedule(json){
        calendar = new Map()
        var j = 0;
        for(var i = 0; i < 6; i++){
            const day = (new Date(json[j].start)).getDay()
            const dayShows = []
            calendar.set(day, dayShows)
            var tmpDay = day
            while(tmpDay == day){
                if(j >= json.length)
                    return calendar
                tmpDay=(new Date(json[j].start)).getDay()
                dayShows.push(json[j])
                j++
            }
        }
        return calendar;
    }
    async function getTextData(theUrl) {
        return await fetch(theUrl, 
        {
            method: 'GET',
            headers: {
                "Target-URL": "https://spinitron.com",
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
