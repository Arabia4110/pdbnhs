<?php
//require_once 'security.php';
require_once 'db.php';
require_once 'student_data.php';

if (empty($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['admin_username'] ?? 'Admin';

// Fetch dashboard data
$strandData = getStrandAndDocumentData($pdo);
$studentData = getAllStudents($pdo);
$city_data = getCityDistribution($pdo);

// Unpack fetched data
$strand_data = $strandData['strand_data'] ?? [];
$document_data = $strandData['document_data'] ?? [];

$totalStudents = array_sum($strand_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/pdb.png" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="img/pdb.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/pdb.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/pdb.png">
    <meta name="msapplication-TileColor" content="#0d265c">
    <meta name="msapplication-TileImage" content="img/pdb.png">

    <title>Dashboard - Paso De Blas National High School</title>

    <!-- Milligram CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/core.css">
</head>
<body>

<?php
    // Include the loading screen HTML structure first
    include 'load.html';
    ?>
        <?php
        // Include the sidebar HTML
        include 'sidebar.html';
        ?>
<?php include 'header.php'; ?>

<div class="container">
    <h1>Dashboard Overview</h1>
    <div class="row">
        <div class="column">
            <?php $totalStudents = array_sum($strand_data); ?>
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="card-content text-center">
                            <i class="fa-solid fa-users"></i>
                            <h5>TOTAL STUDENTS</h5>
                            <p class="large-number"><?= htmlspecialchars($totalStudents) ?></p>
                        </div>
                    </div>
                </div>
                <?php foreach ($strand_data as $strand => $count): ?>
                    <?php if (!empty($strand)): ?>
                        <div class="column">
                            <div class="card">
                                <div class="card-content text-center">
                                    <i class="fa-solid fa-user"></i>
                                    <h5><?= htmlspecialchars($strand) ?></h5>
                                    <p class="large-number"><?= htmlspecialchars($count) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                
                <?php foreach (($document_data ?? []) as $doc_type => $count): ?>
                    <div class="column">
                        <div class="card">
                            <div class="card-content text-center">
                                <i class="fa-solid fa-file"></i>
                                <h5><?= htmlspecialchars($doc_type) ?> Submitted</h5>
                                <p class="large-number"><?= htmlspecialchars($count) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>