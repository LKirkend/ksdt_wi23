<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('shows', ['count' => 12]);
?>

<?php foreach ($result['items'] as $show): ?>
    <p><?= (new DateTime($show['start']))
            ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/LosAngeles'))
            ->format('g:ia') ?>
        <b><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?></b>
        with <?= htmlspecialchars($client->getPersonaFromShow($show)['name'], ENT_NOQUOTES) ?>
<?php endforeach ?>
