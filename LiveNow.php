<?php
require_once("Resources/config.php");
require_once("Api/ApiHelper.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}
$userName = $_SESSION['username'];

$response = makeApiRequest();
$groupedMatches = getMatchesGroupedByLege($response)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FB Stats</title>
    <link rel="stylesheet" href="Resources/css/menu.css">
    <?php require_once('TopMenu.html'); ?>
    <link rel="stylesheet" href="Resources/css/base_page.css">
    <link rel="stylesheet" href="Resources/css/left_side_menu.css">
    <link rel="stylesheet" href="Resources/css/LiveScore.css">
</head>
<body>
<?php require_once('left_side_menu.html'); ?>

<div class="main-content">
    <div class="website-info">
        <h2>Live Football Scores</h2>

        <?php if (!empty($groupedMatches)): ?>
            <?php foreach ($groupedMatches as $competitionName => $matches): ?>
                <div class="competition">
                    <h3><?= $competitionName; ?></h3>
                    <?php foreach ($matches as $match): ?>
                        <div class="match"><p>
                                <?= $match['homeTeam']['name']; ?>
                                <?= $match['score']['fullTime']['homeTeam']; ?>
                                  -   <?= $match['score']['fullTime']['awayTeam']; ?>
                                <?= $match['awayTeam']['name']; ?>
                                <?php if ($match['status'] === 'LIVE'): ?>
                                    <span class="live-indicator">(Live - <?= $match['minute']; ?>')</span>
                                <?php endif; ?>
                            </p></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No live matches available.</p>
        <?php endif; ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        &copy; Omer Naim 2024
    </div>
</footer>
<script src="Resources/js/base_page.js"></script>
</body>
</html>
