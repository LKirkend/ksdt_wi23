<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];

$start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
$end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
?>

<span class="spinitron pt-sm-4 pt-md-0 mw-fit" id="show"><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?><br></span>
<span class="spinitron" id="time"><?= $start . ' - ' . $end?><br></span>
<span class="spinitron" id="song"><?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?>
 by <?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></span>
