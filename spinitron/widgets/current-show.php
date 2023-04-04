<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];

if($show['title'] ?? false){
    $start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
    $end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
    echo htmlspecialchars($show['title'], ENT_NOQUOTES);
    echo $start . ' - ' . $end;
    echo htmlspecialchars($spin['song'], ENT_NOQUOTES);
    echo 'by' . htmlspecialchars($spin['artist'], ENT_NOQUOTES);
}
else{
    echo 'OFF THE AIR';
}
?>
