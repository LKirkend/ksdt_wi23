<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];

$start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/LosAngeles'))->format('g:ia');
$end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/LosAngeles'))->format('g:ia');
?>

<b><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?></b>
<?= $start . ' - ' . $end?>
<br></br>
<em><?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?></em>
by <?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></p>
