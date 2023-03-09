<?php
include __DIR__ . '/app/getClient.php';
/** @var SpinitronApiClient $client */
$result = $client->search('spins', ['count' => 3]);
?>

<?php foreach ($result['items'] as $spin): ?>
    <p><?= (new DateTime($spin['start']))
            ->setTimezone(new DateTimeZone($spin['timezone'] ?? 'America/New_York'))
            ->format('g:ia') ?>
        <b><?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></b>
        <em>“<?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?>”</em>
        from <?= htmlspecialchars($spin['release'], ENT_NOQUOTES) ?></p>
<?php endforeach ?>

<p>
    <small>(Updated <?= gmdate('H:i:s') ?> UTC)</small>
</p>
