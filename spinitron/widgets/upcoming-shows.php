<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
//date_default_timezone_set('America/New_York');
$result = $client->search('shows', ['count' => 12]);
?>

<?php foreach ($result['items'] as $show): ?>
    <?php
    $personaId = explode('/', $show['_links']['personas'][0]['href'])[5];
    $persona = $client->search('personas/' . $personaId,'');
    ?>
    <p><?= (new DateTime($show['start']))
            ->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/New_York'))
            ->format('g:ia') ?>
        <b><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?></b>
        with <?= htmlspecialchars($persona['name'], ENT_NOQUOTES) ?>
<?php endforeach ?>
