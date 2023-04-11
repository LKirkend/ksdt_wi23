<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('shows', ['count' => 12]);

foreach ($result['items'] as $show): ?>
    <div class="row">
        <div class="col-sm-5">
            <span class="next-time">
                <?= (new DateTime($show['start']))
                ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))
                ->format('g:ia') ?>
            </span>
        </div>
        <div class="col-sm">
            <div class="row">
                <span class="next-show">
                    <b><a href="https://spinitron.com/KSDT/show/<?=$show['id']?>" target="_blank" rel="noreferrer noopener">
                        <?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?>
                    </a></b> 
                    <span class="next-with">with</span>
                </span>
            </div>
            <div class="row">
                <span class="next-dj">
                    <?= htmlspecialchars($client->getPersonaFromShow($show)['name'], ENT_NOQUOTES) ?>
                </span>
            </div>
        </div>
        <br>
        <hr class="my-2">
    </div>
<?php endforeach ?>
