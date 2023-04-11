<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('spins', ['count' => 3]);

foreach ($result['items'] as $spin): ?>
    <div class="row">
        <div class="col-sm-5">
            <img class="spinning-record">
            <!-- Todo: get picture of album art / artist photo -->
        </div>
        <div class="col-sm pt-5">
            <span class="recent-date">
            <?= (new DateTime($spin['start']))
                ->setTimezone(new DateTimeZone($spin['timezone'] ?? 'America/Los_Angeles'))
                ->format('g:ia') ?><br>
            </span>
            <hr class="my-1">
            <span class="recent-song">
                <?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?><br>
            </span>
            <span class="recent-artist">
                by <a style="color:var(--lpink);"><?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></a><br>
            </span>
            <br>
        </div>
    </div>
<?php endforeach ?>
