<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];
$start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'));
$end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'));
$currentTime = (new DateTime('now', new DateTimeZone($show['timezone'])))->format('d:ga');
?>

<?php if(strcmp($currentTime, $start->format('d:ga')) == 0) { ?>
    <a href="https://spinitron.com/KSDT/show/<?=$show['id']?>" target="_blank" rel="noreferrer noopener">
        <span class="spinitron pt-sm-4 pb-0 pt-md-0 mw-fit" id="show"><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?><br></span>
    </a>
    <span class="spinitron pb-0" id="time"><?= $start->format('g:ia') . ' - ' . $end->format('g:ia')?><br></span>
    <span class="spinitron pb-0 pe-3" id="song"><?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?> by <?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></span>
<?php } else { ?>
    <span class="spinitron pt-sm-4 pb-0 pt-md-0 mw-fit pt-5 mt-2" id="show-off-air">Off The Air<br></span>
    <a href="https://spinitron.com/KSDT/show/<?=$show['id']?>" target="_blank" rel="noreferrer noopener">
        <span class="spinitron" id="show-upcoming">Tune in from <?= $start->format('g:ia') . ' - ' . $end->format('g:ia')?> for <?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?>
    </a>
</span>
<?php } ?>

<script>
    function redirectClick(obj){
        var href = obj.getAttribute('href');
        window.location.href = href;
    }
</script>