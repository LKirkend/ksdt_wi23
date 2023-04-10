<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];
$start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
$end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
?>

<?php if($show['title'] ?? false) : ?>
    <span class="spinitron pt-sm-4 pt-md-0 mw-fit" id="show" onclick="redirectClick(this)" href="https://spinitron.com/KSDT/show/<?=$show['id']?>"><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?><br></span>
    <span class="spinitron" id="time"><?= $start . ' - ' . $end?><br></span>
    <span class="spinitron" id="song"><?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?> by <?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></span>
<?php else : ?>
    <span class="spinitron pt-sm-4 pt-md-0 mw-fit" id="show">Off The Air<br></span>
<?php endif; ?>

<script>
    function redirectClick(obj){
        var href = obj.getAttribute('href');
        window.location.href = href;
    }
</script>