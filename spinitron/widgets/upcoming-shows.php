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
