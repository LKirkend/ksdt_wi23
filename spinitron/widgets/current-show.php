<?php
include __DIR__ . '/../getClient.php';
/** @var SpinitronApiClient $client */
$show = $client->search('shows', ['count' => 1])['items'][0];
$spin = $client->search('spins', ['count' => 1])['items'][0];

if($show['title'] ?? false){
    $start = (new DateTime($show['start']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
    $end = (new DateTime($show['end']))->setTimezone(new DateTimeZone($show['timezone'] ?? 'America/Los_Angeles'))->format('g:ia');
    // echo '<span id="show">' . htmlspecialchars($show['title'], ENT_NOQUOTES) . '<br></span>';
    // echo '<span id="time">' . $start . ' - ' . $end . '<br></span>';
    // echo '<span id="song">' . htmlspecialchars($spin['song'], ENT_NOQUOTES) . ' by ' . htmlspecialchars($spin['artist'], ENT_NOQUOTES) . '<br></span>';
}
else{
    // echo '<span id="show">OFF THE AIR<br></span>';
    //TODO: COME BACK TO THIS AND FIGURE OUT WHAT WE WANT TO DO FOR WEEKENDS
}
?>

<span class="spinitron pt-sm-4 pt-md-0 mw-fit" id="show" onclick="redirectClick(this)" href="https://spinitron.com/KSDT/show/<?=$show['id']?>"><?= htmlspecialchars($show['title'], ENT_NOQUOTES) ?><br></span>
<span class="spinitron" id="time"><?= $start . ' - ' . $end?><br></span>
<span class="spinitron" id="song"><?= htmlspecialchars($spin['song'], ENT_NOQUOTES) ?>
 by <?= htmlspecialchars($spin['artist'], ENT_NOQUOTES) ?></span>

 <script>
     function redirectClick(obj){
         var href = obj.getAttribute('href');
         window.location.href = href;
     }
 </script>