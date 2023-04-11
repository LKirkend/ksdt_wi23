<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('shows', ['count' => 12]);
$dj = $client->getPersonaFromShow($show);
?>

<?php foreach ($result['items'] as $show): ?>
    <p><?= (new DateTime($show['start']))
            ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))
            ->format('g:ia') ?>
        <b><a href="https://spinitron.com/KSDT/show/<?=$show['id']?>"><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?></a></b> 
        with <?= htmlspecialchars($dj['name'], ENT_NOQUOTES) ?>
<?php endforeach ?>
