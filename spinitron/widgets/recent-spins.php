<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('spins', ['count' => 3]);
?>

<?php foreach ($result['items'] as $spin): ?>
    <p><?= (new DateTime($spin['start']))
            ->setTimezone(new DateTimeZone($spin['timezone'] ?? 'America/Los_Angeles'))
            ->format('g:ia') ?>
        <b><?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></b>
        <em>“<?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?>”</em>
<?php endforeach ?>
