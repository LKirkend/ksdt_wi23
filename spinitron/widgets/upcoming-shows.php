<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$totalShows = 12;
$result = $client->search('shows', ['count' => $totalShows]);
$count = 1;
foreach ($result['items'] as $show): ?>
    <div class="row">
        <div class="col-sm-5 w-auto">
            <div class="row">
                <span class="next-time">
                    <?= (new DateTime($show['start']))
                    ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))
                    ->format('h:ia') ?>
                </span>
            </div>
            <?php if($count==1){ ?>
                <div class="row"><img id="broadcast-wave"></div>
            <?php } ?>
        </div>
        <div class="col-sm">
            <div class="row">
                <span class="next-show ms-4 w-auto">
                    <b><a href="https://spinitron.com/KSDT/show/<?=$show['id']?>" target="_blank" rel="noreferrer noopener">
                        <?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?>
                    </a></b> 
                    <span class="next-with">with</span>
                </span>
            </div>
            <div class="row">
                <span class="ms-4 next-dj">
                    <?= htmlspecialchars($client->getPersonaFromShow($show)['name'], ENT_NOQUOTES) ?>
                </span>
            </div>
        </div>
        <br>
        <?php if($count != $totalShows){ ?>
            <hr class="my-2">
        <?php } ?>
    </div>
    <?php $count += 1; ?>
<?php endforeach ?>
